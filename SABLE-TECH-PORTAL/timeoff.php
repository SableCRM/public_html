<?php

	use CristianPontes\ZohoCRMClient\ZohoCRMClient;

	require_once "../../wsdl2php_generated/vendor/autoload.php";
	require_once "../../Integration/Connection.php";

	// create an instance of the database connection...
	$dbConn = new Connection();

	// create an error array to store errors...
	$error = [];

	require_once "../../Integration/ZOHO-API/zoho.php";

	// connect to database and get zoho auth token...
	$sql = $dbConn->prepare("SELECT ZOHO_USER.ZOHO_AUTH_ID FROM sablrcrm_test.ZOHO_USER WHERE ZOHO_USER.COMPANY_ID = ?");

	try
	{
		$sql->execute(
			[
				$_POST["company"]
			]
		);

		if($sql->rowCount() > 0)
		{
			$rows = $sql->fetchAll(PDO::FETCH_OBJ);
			$dbQuery = $rows[0];
		}
		else
		{
			$error = "Sable was unable to Authenticate with Zoho CRM."; print_r($error); exit;
		}
	}
	catch(PDOException $e)
	{
		$error = $e->getMessage(); print_r($error); exit;
	}

	$zohoApi = new ZohoCRMClient("CustomModule10", $dbQuery->ZOHO_AUTH_ID);

	$timeoff = $zohoApi->getRecordById($_POST["timeoffId"])->request();

	//print_r($timeoff[1]->getData());

	if(count($timeoff) > 0)
	{
		// evaluate scheduled date and determine how many days are in block.
		$timeoffStart = new DateTime($timeoff[1]->get("Start Date"));

		$timeoffEnd = new DateTime($timeoff[1]->get("End Date"));

		$difference = $timeoffStart->diff($timeoffEnd)->d + 1;
	}
	else
	{
		$error = "Sable was unable to retrieve Time Off Module from Zoho CRM."; print_r($error); exit;
	}

	// check if timeoff id already exists in database to determine if we should perform an update or an insert.
	$sql = $dbConn->prepare("SELECT TIMEOFF_ID FROM sablrcrm_test.SCHEDULED_JOBS WHERE SCHEDULED_JOBS.COMPANY_ID = ? AND SCHEDULED_JOBS.TIMEOFF_ID = ?");

	try
	{
		$sql->execute(
			[
				$_POST["company"],
				$_POST["timeoffId"]
			]
		);

		if($sql->rowCount() > 0)
		{
			$sql = $dbConn->prepare("DELETE FROM SCHEDULED_JOBS WHERE SCHEDULED_JOBS.COMPANY_ID = :COMPANY_ID AND SCHEDULED_JOBS.TIMEOFF_ID = :TIMEOFF_ID");

			try
			{
				$sql->execute(
					[
						":COMPANY_ID" => $_POST["company"],
						":TIMEOFF_ID" => $_POST["timeoffId"]
					]
				);
			}
			catch(PDOException $e)
			{
				$error = $e->getMessage(); print_r($error);
			}

			// timeoff already exists, perform update.
			$sql = $dbConn->prepare("INSERT INTO sablrcrm_test.SCHEDULED_JOBS SET SCHEDULED_JOBS.USER_ID = :USER_ID, SCHEDULED_JOBS.SCHEDULED_DATE_TIME = :SCHEDULED_DATE_TIME, SCHEDULED_JOBS.COMPANY_ID = :COMPANY_ID, SCHEDULED_JOBS.DATA_1 = :DATA_1, SCHEDULED_JOBS.TIMEOFF_ID = :TIMEOFF_ID, SCHEDULED_JOBS.END_DATE_TIME = :END_DATE_TIME, SCHEDULED_JOBS.DATA_4 = :DATA_4");

			$error[] = "Successfully updated timeoff on calendar.";
		}
		else
		{
			// timeoff doesn't exist, perform insert.
			$sql = $dbConn->prepare("INSERT INTO sablrcrm_test.SCHEDULED_JOBS SET SCHEDULED_JOBS.USER_ID = :USER_ID, SCHEDULED_JOBS.SCHEDULED_DATE_TIME = :SCHEDULED_DATE_TIME, SCHEDULED_JOBS.COMPANY_ID = :COMPANY_ID, SCHEDULED_JOBS.DATA_1 = :DATA_1, SCHEDULED_JOBS.TIMEOFF_ID = :TIMEOFF_ID, SCHEDULED_JOBS.END_DATE_TIME = :END_DATE_TIME, SCHEDULED_JOBS.DATA_4 = :DATA_4");

			$error[] = "Successfully added timeoff to calendar.";
		}
	}
	catch(Exception $e)
	{
		$error = $e->getMessage(); print_r($error); exit;
	}

	// loop through days and add timeoff to schedule.
	if($difference > 0)
	{
		for($i = 0; $i < $difference; $i++)
		{
			if($i > 0)
			{
				$date = $timeoffStart->add(new DateInterval("P1D"));
			}
			else
			{
				$date = $timeoffStart;
			}

			$params = [
				":USER_ID" => $timeoff[1]->get("Tech Name_ID"),
				":SCHEDULED_DATE_TIME" => $date->format("Y-m-d H:i:s"),
				":COMPANY_ID" => $_POST["company"],
				":DATA_1" => $timeoff[1]->get("Time Off Name"),
				":TIMEOFF_ID" => $_POST["timeoffId"],
				":END_DATE_TIME" => $timeoff[1]->get("End Date"),
				":DATA_4" => $_POST["csr"]
			];

			try
			{
				$sql->execute
				(
					$params
				);
			}
			catch(Exception $e)
			{
				$error = $e->getMessage(); print_r($error);
			}
		}
		print_r($error);
	}
	else
	{
		$error = "Sable was unable to add Time Off to calendar."; print_r($error); exit;
	}