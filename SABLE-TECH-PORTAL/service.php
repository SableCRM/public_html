<?php

	session_start();

	require_once "../../Integration/Connection.php";

	// create an instance of the database connection...
	$dbconn = new Connection();

	// create an error array to store errors...
	$error = [];

	// schedule service in portal

	require_once "../../Integration/ZOHO-API/zoho.php";

	// connect to database and get zoho auth token...
	$sql = $dbconn->prepare("SELECT * FROM sablrcrm_test.ZOHO_USER WHERE ZOHO_USER.COMPANY_ID = ?");

	try{
		$sql->execute([

			$_POST["company"]
		]);

	} catch(Exception $e) {

		$error[] = $e->getMessage();

		print_r($error);exit;
	}

	$authToken = false;
	if($sql->rowCount() > 0){

		$rows = $sql->fetchAll(PDO::FETCH_OBJ);

		$authToken = $rows[0]->ZOHO_AUTH_ID;

	} else {

		$error[] = "Sable was unable to Authenticate with Zoho CRM.";

		print_r($error);exit;
	}

	$zohoApi = new Zoho($authToken);

	$service = $zohoApi->Get("CustomModule9", $_POST["service"], "array");

	if(count($service) > 0){

		$deal = $zohoApi->Get("Potentials", $service["Deal Name_ID"], "array");

		if(count($deal) > 0){

			$name = explode(" ", $deal["Contact Name"]);

			$tech = explode(" ", $service["Service Technician Name"]);

			$state = (!is_null($deal["State"]) || !empty($deal["State"])) ? $deal["State"] : $deal["Province"];

			$zipcode = (!is_null($deal["Zip"]) || !empty($deal["Zip"])) ? $deal["Zip"] : $deal["Postal Code"];

		} else {

			$error[] = "Sable was unable to retrieve Potentials Module from Zoho CRM.";

			print_r($error);exit;
		}

	} else {

		$error[] = "Sable was unable to retrieve Service Module from Zoho CRM.";

		print_r($error);exit;
	}

//	$_SESSION["company"] = $_POST["company"];
//
//	$_SESSION["csr"] = $_POST["csr"];
//
//	$_SESSION["service"]["service id"] = $service["CUSTOMMODULE9_ID"];
//	$_SESSION["service"]["tech id"] = $service["Service Technician Name_ID"];
//    $_SESSION["service"]["deal id"] = $service["Deal Name_ID"];
//    $_SESSION["service"]["service date"] = $service["Service Date"];
//
//	$_SESSION["deal"]["contact name"] = $deal["Contact Name"];
//	$_SESSION["deal"]["city"] = $deal["City"];
//	$_SESSION["deal"]["state"] = (!is_null($deal["State"]) || !empty($deal["State"])) ? $deal["State"] : $deal["Province"];

	if(strtolower($service["Service Status"]) == "service scheduled"){

		// check if service is already scheduled
		$sql = $dbconn->prepare("SELECT COMPANY_ID, JOB_ID FROM sablrcrm_test.SCHEDULED_JOBS WHERE SCHEDULED_JOBS.COMPANY_ID = ? AND SCHEDULED_JOBS.JOB_ID = ?");

		try{
			$sql->execute([
				$_POST["company"],
				$service["Deal Name_ID"],
			]);

		} catch(Exception $e) {

			$error[] = $e->getMessage();

			print_r($error);exit;
		}

		if($sql->rowCount() > 0){

			// job is already scheduled update
			$sql = $dbconn->prepare("UPDATE sablrcrm_test.SCHEDULED_JOBS SET SCHEDULED_JOBS.JOB_ID = ?, SCHEDULED_JOBS.USER_ID = ?, SCHEDULED_JOBS.SCHEDULED_DATE_TIME = ?, SCHEDULED_JOBS.COMPANY_ID = ?, SCHEDULED_JOBS.DATA_1 = ?, SCHEDULED_JOBS.DATA_2 = ?, SCHEDULED_JOBS.DATA_3 = ?, SCHEDULED_JOBS.ZIP = ?, SCHEDULED_JOBS.DATA_4 = ?, SCHEDULED_JOBS.SERVICE_ID = ?, SCHEDULED_JOBS.END_DATE_TIME = ? WHERE SCHEDULED_JOBS.COMPANY_ID = ? AND SCHEDULED_JOBS.JOB_ID = ?; SELECT DATA_1 FROM sablrcrm_test.SCHEDULED_JOBS WHERE SCHEDULED_JOBS.ID = last_insert_id()");

			try{
				$sql->execute([
					$service["Deal Name_ID"],
					$service["Service Technician Name_ID"],
					$service["Service Date"],
					$_POST["company"],
					$deal["Contact Name"],
					$deal["City"],
					(!is_null($deal["State"]) || !empty($deal["State"])) ? $deal["State"] : $deal["Province"],
					$deal["Zip"],
					$_POST["csr"],
					$service["CUSTOMMODULE9_ID"],
					$service["Service End Date/Time"],
					$_POST["company"],
					$service["Deal Name_ID"]
				]);

			} catch(Exception $e) {

				$error[] = $e->getMessage();

				print_r($error);exit;
			}
			die("Service was successfully updated on technicians schedule.");

		} else {

			// job is not schedule insert
			$sql = $dbconn->prepare("INSERT INTO sablrcrm_test.SCHEDULED_JOBS SET SCHEDULED_JOBS.JOB_ID = ?, SCHEDULED_JOBS.USER_ID = ?, SCHEDULED_JOBS.SCHEDULED_DATE_TIME = ?, SCHEDULED_JOBS.COMPANY_ID = ?, SCHEDULED_JOBS.DATA_1 = ?, SCHEDULED_JOBS.DATA_2 = ?, SCHEDULED_JOBS.DATA_3 = ?, SCHEDULED_JOBS.ZIP = ?, SCHEDULED_JOBS.DATA_4 = ?, SCHEDULED_JOBS.SERVICE_ID = ?, SCHEDULED_JOBS.END_DATE_TIME = ?; SELECT DATA_1 FROM sablrcrm_test.SCHEDULED_JOBS WHERE SCHEDULED_JOBS.ID = last_insert_id()");

			try{
				$sql->execute([
					$service["Deal Name_ID"],
					$service["Service Technician Name_ID"],
					$service["Service Date"],
					$_POST["company"],
					$deal["Contact Name"],
					$deal["City"],
					(!is_null($deal["State"]) || !empty($deal["State"])) ? $deal["State"] : $deal["Province"],
					$deal["Zip"],
					$_POST["csr"],
					$service["CUSTOMMODULE9_ID"],
					$service["Service End Date/Time"]
				]);

			} catch(Exception $e) {

				$error[] = $e->getMessage();

				print_r($error);exit;
			}
		}
		die("Service was successfully added to technicians schedule.");
	}

	// remove service from portal
    else{

		$sql = $dbconn->prepare("DELETE FROM sablrcrm_test.SCHEDULED_JOBS WHERE SCHEDULED_JOBS.COMPANY_ID = ? AND SCHEDULED_JOBS.JOB_ID = ? LIMIT 1");

		try{
			$sql->execute([
				$_POST["company"],
				$service["Deal Name_ID"]
			]);

		} catch(Exception $e) {

			$error[] = $e->getMessage();

			print_r($error);exit;
		}
		die("Service was successfully removed from technicians schedule.");
	}

	//echo "<pre>";print_r($deal);echo "</pre>";exit;

?>