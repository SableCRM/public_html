<?php

	require_once "../../Integration/Connection.php";
	require_once "../FUNCTIONS.php";

	$error = [];

	// create an instance of the database object...
	$dbConn = new Connection();

	// check if job is already uploaded by passing the Deal Id and the Company Id...
	$sql = $dbConn->prepare("SELECT JOB_ID, COMPANY_ID FROM SCHEDULED_JOBS WHERE JOB_ID = ? AND COMPANY_ID = ?");

	try{
		$sql->execute([
			$_POST["deal-id"],
			$_POST["company-id"]
		]);
	} catch(Exception $e){

		array_push($error, $e->getMessage());
	}

	// if job already exist, update
	if($sql->rowCount() > 0){

		if($_POST["install-status"] == "Install Scheduled" || $_POST["install-status"] == "Incomplete Install" || $_POST["install-status"] == "Call For Survey"){

			$sql = $dbConn->prepare("UPDATE SCHEDULED_JOBS SET SCHEDULED_JOBS.END_DATE_TIME = ?, JOB_ID = ?, DEAL_ID = ?, USER_ID = ?, SCHEDULED_DATE_TIME = ?, COMPANY_ID = ?, DATA_1 = ?, DATA_2 = ?, DATA_3 = ?, SCHEDULED_JOBS.ZIP = ?, DATA_4 = ? WHERE JOB_ID = ? AND COMPANY_ID = ? LIMIT 1");

			try{
				$sql->execute([
					$_POST['end-time'],
					$_POST['deal-id'],
					$_POST['deal-id'],
					$_POST['tech-id'],
					$_POST['date-time'],
					$_POST['company-id'],
					$_POST['contact-name'],
					$_POST['city'],
					$_POST['state'],
					$_POST["zip"],
					$_POST['operator'],
					$_POST['deal-id'],
					$_POST['company-id']
				]);
			} catch(Exception $e){

				array_push($error, $e->getMessage());
			}

		} else{

			$sql = $dbConn->prepare("DELETE FROM SCHEDULED_JOBS WHERE COMPANY_ID = ? AND DEAL_ID = ? LIMIT 1");

			try{
				$sql->execute([

					$_POST['company-id'],
					$_POST['deal-id']
				]);
			} catch(Exception $e){

				array_push($error, $e->getMessage());
			}

		}
	}
	// if job doesnt already exist, insert
	else{

		// CONNECT TO DATABASE AND GET ZOHO_AUTH_ID FOR COMPANY
		$zohoAuthId = false;

		$sql = $dbConn->prepare("SELECT ZOHO_AUTH_ID FROM ZOHO_USER WHERE COMPANY_ID = ?");

		try{
			$sql->execute([

				$_POST["company-id"]
			]);
		} catch(Exception $e){

			array_push($error, $e->getMessage());
		}


		if($sql->rowCount() > 0){

			$zohoAuthId = $sql->fetchAll(PDO::FETCH_OBJ);

			// ASSIGN CS_NUMBER AND REC_NUMBER TO JOB IF NONE IS ALREADY ASSIGNED AND JOB IS MONI PUR OR MONI CM
			if($_POST["monitoring-center"] == "Moni PUR" || $_POST["monitoring-center"] == 'Moni CM'){

				array_push($error, FUNCTIONS::AUTO_GEN_CS($zohoAuthId[0]->ZOHO_AUTH_ID, $_POST["company-id"], $_POST["deal-id"]));
			}

			// DATABASE QUERY TO UPLOAD JOB INFORMATION TO SERVER
			$sql = $dbConn->prepare("INSERT INTO SCHEDULED_JOBS (END_DATE_TIME, JOB_ID, DEAL_ID, USER_ID, SCHEDULED_DATE_TIME, INSERTION_DATE, COMPANY_ID, DATA_1, DATA_2, DATA_3, SCHEDULED_JOBS.ZIP, DATA_4) VALUES(?,?,?,?,?, NOW(), ?,?,?,?,?,?)");

			// PARAMS TO PASS TO UPLOAD JOB QUERY
			try{
				$sql->execute([
					$_POST['end-time'],
					$_POST['deal-id'],
					$_POST['deal-id'],
					$_POST['tech-id'],
					$_POST['date-time'],
					$_POST['company-id'],
					$_POST['contact-name'],
					$_POST['city'],
					$_POST['state'],
					$_POST["zip"],
					$_POST['operator']
				]);
			} catch(Exception $e){

				array_push($error, $e->getMessage());
			}

		} else{

			array_push($error, "Sable was unable to Authenticate with Zoho CRM");
			exit;
		}
	}

	mail("ainsley.clarke@guardme.com", "Schedule Job", json_encode($_POST)." Errors: ".json_encode($error));