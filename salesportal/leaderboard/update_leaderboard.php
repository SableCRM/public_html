<?php

	// when posting to this script from crm, we are expecting a company id and a deal id.

	use CristianPontes\ZohoCRMClient\ZohoCRMClient;

	require_once "../../../Integration/Connection.php";
	require_once "../../../wsdl2php_generated/vendor/autoload.php";

	$error = [];

	$dbConn = new Connection();

	// get auth token from database.
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
			$error[] = "Sable was unable to Authenticate with CRM.";
			message($error);
		}
	}
	catch(PDOException $e)
	{
		$error[] = $e->getMessage();
		message($error);
	}

	// create instance of zoho crm client and provide authToken from database.
	$zohoApi = new ZohoCRMClient("Potentials", $dbQuery->ZOHO_AUTH_ID);

	// retrieve deal information from crm.
	$deal = $zohoApi->getRecordById($_POST["id"])->request();

	if(count($deal[1]->getData()) > 0)
	{
		// check that we dont already have a deal id and company id matching the ones we are trying to insert.
		$sql = $dbConn->prepare("SELECT LEADER_BOARD.COMPANY_ID, LEADER_BOARD.JOB_ID FROM sablrcrm_test.LEADER_BOARD WHERE LEADER_BOARD.COMPANY_ID = :COMPANY_ID AND  LEADER_BOARD.JOB_ID = :JOB_ID");

		try
		{
			$sql->execute(
				[
					":COMPANY_ID" => $_POST["company"],
					":JOB_ID" => $_POST["id"]
				]
			);

			if($sql->rowCount() > 0)
			{
				$error[] = "This record already exist in the leaderboard";
				message($error);
			}
		}
		catch(PDOException $e)
		{
			$error[] = $e->getMessage();
			message($error);
		}

		// insert new record into leaderboard.
		$sql = $dbConn->prepare("INSERT INTO sablrcrm_test.LEADER_BOARD SET LEADER_BOARD.USER_ID = :USER_ID, LEADER_BOARD.COMPANY_ID = :COMPANY_ID, LEADER_BOARD.JOB_ID = :JOB_ID, LEADER_BOARD.INSTALL_DATE = :INSTALL_DATE, LEADER_BOARD.ACH = :ACH, RMR = :RMR, LEADER_BOARD.CONTRACT_TERM = :CONTRACT_TERM");

		try
		{
			$sql->execute(
				[
					":COMPANY_ID"    => $_POST["company"],
					":JOB_ID"        => $_POST["id"],
					":USER_ID"       => $deal[1]->get("Sales Person_ID"),
					":RMR"           => $deal[1]->get("RMR"),
					":ACH"           => $deal[1]->get("Easy Pay Method"),
					":INSTALL_DATE"  => $deal[1]->get("Install Date and Time"),
					":CONTRACT_TERM" => $deal[1]->get("Contract Term"),
				]
			);

			$error[] = "Successfully added record to Leaderboard...";
			message($error);
		}
		catch(PDOException $e)
		{
			$error[] = $e->getMessage();
			message($error);
		}
	}
	else
	{
		$error[] = "Sable was unable to retrieve requested deal from CRM.";
		message($error);
	}

	print_r($deal);

	function message($messages)
	{
		if(count($messages) > 0)
		{
			foreach($messages as $message)
			{
				print_r($message); exit;
			}
		}
	}