<?php

session_start();

//require_once '../../Integration/DATABASE_CONNECTION.php';
///**
// * UPLOAD FORMATTED ZONES FOR COMPLETED JOB TO SABLE DATABASE
// */
//$sql = 'UPDATE SCHEDULED_JOBS SET zones = ? WHERE COMPANY_ID = ? AND JOB_ID = ?';
//$params = array($_POST['zones'], $_SESSION['user']->COMPANY_ID, $_SESSION['selected-job']);
//Connect($sql, $params, 'array');

//$state = ($_SESSION['deal-info']['State']) ? $_SESSION['deal-info']['State'] : $_SESSION['deal-info']['Province'];
//
//$message = $_SESSION['user']->USER_FIRST_NAME.' '.$_SESSION['user']->USER_LAST_NAME.' has completed install for '.
//    $_SESSION['deal-info']['Contact Name'].' in '.$_SESSION['deal-info']['City'].' '.$state.' & Uploaded Zones To Sable.';

require_once '../../Integration/ZOHO-API/zoho.php';
/**
 * CREATE AN INSTANCE OF THE ZOHO API
 */
$zohoApi = new Zoho($_SESSION['user']->ZOHO_AUTH_ID);
/**
 * UPDATE THE STATUS OF THE DEAL FOR THE COMPLETED JOB, SETS THE INSTALL STATUS TO CALL FOR SURVEY AND
 * SETTING THE TECH COMPLETE DATE-TIME TO THE CURRENT TIME.
 */
$updateDealStatus = $zohoApi->Set('Potentials', $_SESSION['selected-job'], json_encode([
	"Install Status" => "Call For Survey",
	"Tech Complete" => strftime($zohoApi->zoho_time_format),
	"Zone Data" => $_POST["zones"]
]));

/**
 * @todo, need to rework this fake output
 */
echo 1;





//  function should be updated to use this framework for zoho crm communications.

//  require_once "../../wsdl2php_generated/vendor/autoload.php";
//	$zohoApi = new ZohoCRMClient("Potentials", $_SESSION['user']->ZOHO_AUTH_ID);
//
//	$updateDealStatus = $zohoApi->updateRecords()
//		->addRecord(
//			[
//				"Id"             => $_SESSION['selected-job'],
//				"Install Status" => "Call For Survey",
//				"Tech Complete"  => strftime($zohoApi->zoho_time_format),
//				"Zone Data"      => $_POST["zones"]
//			]
//		)
//		->triggerWorkflow()
//		->request();