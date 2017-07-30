<?php

	// debug
	//printError($_POST);

	require_once "../../../Integration/ZOHO-API/zoho.php";
	require_once "../../../Integration/Connection.php";

	$dbConn = new Connection();

	// query database to get zoho authtoken by company.
	$sql = $dbConn->prepare("SELECT * FROM sablrcrm_test.ZOHO_USER WHERE ZOHO_USER.COMPANY_ID = ?");

	try
	{
		$sql->execute(
			[
				$_POST["company"]
			]
		);
	}
	catch(Exception $e)
	{
		printError($e->getMessage());
	}

	// if query was successful, assign authtoken to variable.
	if($sql->rowCount() > 0)
	{
		$rows = $sql->fetchAll(PDO::FETCH_OBJ);
		$authToken = $rows[0]->ZOHO_AUTH_ID;
	}
	else
	{
		printError("Sable was unable to Authenticate with CRM.");
	}

	// create an instance of the zoho api.
	$zohoApi = new Zoho($authToken);

	// create contact from info passed in from the lead.
	$contact = $zohoApi->Insert("Contacts",
		json_encode(
			[
//				"First Name"   => $_POST["First_Name"],
//				"Last Name"    => $_POST["Last_Name"],
				"Contact Name" => $_POST["First_Name"]." ".$_POST["Last_Name"],
				"Phone"        => $_POST["Phone"],
				"Email"        => $_POST["Email"],
				"Mailing Zip"  => $_POST["Mailing_Zip"]
			]
		)
	);

	// get contact id from result.
	$contactId = getId($contact);

	// debug...
	//print_r(status($contact)); exit;

	// check if contact was successfully created.
	if(checkSuccess($contact))
	{
		// contact was successfully created and we have a contact id stored in the contactId variable.
		// create deal and link to contact, using the contact id that was stored in the contactId variable.
		$deal = $zohoApi->Insert("Deals",
			json_encode(
				[
					"Deal Name"     => $_POST["First_Name"]." ".$_POST["Last_Name"]." ".$_POST["Mailing_Zip"],
					"Division"      => "GMS",
					"Source"        => "PPC",
					"Stage"         => "Lead",
					"Residential/Commercial" => "Residential",
					"Closing Date"  => strftime($zoho->zoho_time_format),
					"CONTACTID"     => $contactId,
//					"Contact Name"  => $_POST["First_Name"]." ".$_POST["Last_Name"],
					"Contact Phone" => $_POST["Phone"],
					"Email"         => $_POST["Email"],
					"Zip"           => $_POST["Mailing_Zip"]
				]
			)
		);

		// get deal id from result.
		$dealId = getId($deal);

		// debug...
		//print_r(status($deal));

		// check if deal was successfully created.
		if(checkSuccess($deal))
		{
			// create success result with contact id and deal id.
			$status = [
				"status"     => "Successfully created contact and deal in CRM.",
				"contact id" => $contactId,
				"deal id"    => $dealId
			];

			// print success message to output.
			printError($status);
		}
		else
		{
			$status = [
				"status" => "Sable was unable to successfully create a deal in CRM.",
				"error"  => getError($deal)
			];

			printError($status);
		}
	}
	else
	{
		$status = [
			"status" => "Sable was unable to successfully create a contact in CRM.",
			"error"  => getError($contact)
		];

		printError($status);
	}

	function printError($message)
	{
		$status = [
			"post variables" => $_POST,
			"output"         => $message
		];

		// send error message to dev.
		mail("ainsley.clarke@guardme.com", "Sable_PPC-Lead", json_encode($status));

		// print error message to output.
		print_r($message); exit;
	}

	function checkSuccess($message)
	{
		$status = false;

		$message = json_decode($message)->response->result->message;

		if(strtolower($message) == "record(s) updated successfully")
		{
			$status = true;
		}

		return $status;
	}

	function getId($message)
	{
		return json_decode($message)->response->result->recorddetail->FL[0]->content;
	}

	function getError($message)
	{
		return json_decode($message)->response->error->message;
	}
