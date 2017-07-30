<?php

	// when posting to this script, we are expecting a company id

	use CristianPontes\ZohoCRMClient\Response\Record;
	use CristianPontes\ZohoCRMClient\ZohoCRMClient;

	// errors array to store errors that occur in the application.
	$errors = [];

	require_once "../../../Integration/Connection.php";
	require_once "../../../wsdl2php_generated/vendor/autoload.php";

	if(!isset($_POST["company"]))
	{
		echo "Company id is required to continue..."; exit;
	}

	if(!isValidCompanyConstraint($_POST["company"], new Connection(), $errors))
	{
		echo "This is not a valid company in Sable's database."; exit;
	}

	// create instance of database connection.
	$dbConn = new Connection();

	// get zoho authToken from database.
	$sql = $dbConn->prepare("SELECT ZOHO_AUTH_ID FROM sablrcrm_test.ZOHO_USER WHERE ZOHO_USER.COMPANY_ID = :COMPANY_ID");

	try
	{
		$sql->execute(
			[
				":COMPANY_ID" => $_POST["company"]
			]
		);

		if($sql->rowCount() > 0)
		{
			$dbQuery = $sql->fetchAll(PDO::FETCH_OBJ)[0];
		}
		else
		{
			print_r("Sable was unable to Authenticate with CRM."); exit;
		}
	}
	catch(PDOException $e)
	{
		print_r($e->getMessage()); exit;
	}

	// create instance of zoho crm client.
	$zohoApi = new ZohoCRMClient("Potentials", $dbQuery->ZOHO_AUTH_ID);

//	$deals = $zohoApi->searchRecords()
//		->fromIndex(0)
//		->toIndex(200)
//		->selectColumns
//		(
//			[
//				"POTENTIALID",
//				"RMR",
//				"Sales Person",
//				"Easy Pay Method"
//			]
//		)
//		->where("Install Status", "Completed")
//		->withEmptyFields()
//		->request();
//
//	foreach($deals as $deal)
//	{
//		if($deal->get("Sales Person") != "null")
//		{
//			addRecordToLeaderboard($_POST["company"], $deal, new Connection(), $errors);
//		}
//	}

	$allRecords = [];
	$fromIndex = 601;
	$toIndex = 800;
	$cycles     = 0;

	do
	{
		$deals = $zohoApi->searchRecords()
			->fromIndex($fromIndex)
			->toIndex($toIndex)
			->selectColumns
			(
				[
					"POTENTIALID",
					"RMR",
					"Sales Person",
					"Easy Pay Method",
					"Install Date and Time"
				]
			)
			->where("Install Status", "Completed")
			->withEmptyFields()
			->request();

		foreach($deals as $deal)
		{
			if($deal->get("Sales Person") != "null" && $deal->get("Easy Pay Method") != "null")
			{
				array_push($allRecords, $deal);
			}
		}

		foreach($allRecords as $record)
		{
			addRecordToLeaderboard($_POST["company"], $record, new Connection(), $errors);
		}

		echo "cycle: ".$cycles."\r\n";

//		$fromIndex = $fromIndex + $toIndex;
//		$toIndex   = $toIndex + 200;
		$cycles++;
	} while($cycles < 1);

	// prints any errors that occurred during the current application cycle.
	checkRecordsAddedSuccessfully($errors);

	function addRecordToLeaderboard($company, Record $record, Connection $dbConn, &$errors)
	{
		errorsArrayConstraint($errors);

		if(checkForDuplicateRecords($company, $errors, $record, $dbConn))
		{
			$sql = $dbConn->prepare("INSERT INTO sablrcrm_test.LEADER_BOARD SET LEADER_BOARD.USER_ID = :USER_ID, LEADER_BOARD.COMPANY_ID = :COMPANY_ID, LEADER_BOARD.JOB_ID = :JOB_ID, LEADER_BOARD.ACH = :ACH, RMR = :RMR, LEADER_BOARD.INSTALL_DATE = :INSTALL_DATE");

			try
			{
				$sql->execute(
					[
						":COMPANY_ID"   => $company,
						":JOB_ID"       => $record->get("POTENTIALID"),
						":USER_ID"      => $record->get("Sales Person_ID"),
						":RMR"          => $record->get("RMR"),
						":ACH"          => $record->get("Easy Pay Method"),
						":INSTALL_DATE" => $record->get("Install Date and Time")
					]
				);
			}
			catch(PDOException $e)
			{
				array_push($errors, "Sable was unable to add record id: ".$record->get("POTENTIALID")." to leaderboard."."\r\n".$e->getMessage()."\r\n");
			}
		}
		else
		{
			array_push($errors, "Duplicate record ".$record->get("POTENTIALID")." could not be added to leaderboard for your company."."\r\n");
		}
	}

	function checkRecordsAddedSuccessfully(&$errors)
	{
		errorsArrayConstraint($errors);

		if(count($errors) > 0)
		{
			foreach($errors as $error)
			{
				echo $error;
			}
		}
		else
		{
			echo "All records were successfully added to the leaderboard."."\r\n";
		}
	}

	function errorsArrayConstraint(&$errors)
	{
		if(!is_array($errors))
		{
			throw new InvalidArgumentException("Argument 3 must be of type array, ".gettype($errors)." was passed."."\r\n");
		}
	}

	function isValidCompanyConstraint($company, Connection $dbConn, &$errors)
	{
		$companyExists = false;

		$sql = $dbConn->prepare("SELECT COMPANY.COMPANY_ID FROM sablrcrm_test.COMPANY WHERE COMPANY.COMPANY_ID = :COMPANY_ID");

		try
		{
			$sql->execute(
				[
					":COMPANY_ID" => $company
				]
			);

			if($sql->rowCount() > 0)
			{
				$companyExists = true;
			}
		}
		catch(PDOException $e)
		{
			array_push($errors, "Sable was not able to validate the existance of your company ".$e->getMessage()."\r\n");
		}

		return $companyExists;
	}

	function checkForDuplicateRecords($company, &$errors, Record $record, Connection $dbConn)
	{
		$addRecord = true;

		errorsArrayConstraint($errors);

		// check that we dont already have a deal id and company id matching the ones we are trying to insert.
		$sql = $dbConn->prepare("SELECT LEADER_BOARD.COMPANY_ID, LEADER_BOARD.JOB_ID FROM sablrcrm_test.LEADER_BOARD WHERE LEADER_BOARD.COMPANY_ID = :COMPANY_ID AND  LEADER_BOARD.JOB_ID = :JOB_ID");

		try
		{
			$sql->execute(
				[
					":COMPANY_ID" => $company,
					":JOB_ID" => $record->get("POTENTIALID")
				]
			);

			if($sql->rowCount() > 0)
			{
				$addRecord = false;
			}
		}
		catch(PDOException $e)
		{
			array_push($errors, "There was an error while trying to add record ".$record->get("POTENTIALID")." to leaderboard"."\r\n".$e->getMessage()."\r\n");
		}

		return $addRecord;
	}