<?php

	use Helpers\helpers\classes\CompanyIds;
	use Sable\FUNCTIONS;

	require_once dirname(__DIR__, 2)."/vendor/autoload.php";

	//require_once "../FUNCTIONS.php";

//  print_r(FUNCTIONS::AUTO_GEN_CS('e64ac83c400fcae7e64efa9b6296acf9', '2144870000000459009', '1486524000029065017'));

	echo FUNCTIONS::UPLOAD_CS_NUMBERS(762221112, 762221111, 8442011545, CompanyIds::POWER_HOME);

	//	echo '<h1 style="color: red">REMAINING CS_NUMBERS IN BLOCK: ' . FUNCTIONS::GET_AVAILABLE_CS_NUMBERS(CompanyIds::POWER_HOME)[0]->AVAILABLE_CS_NUMBERS . '</h1>';

	//	require_once '../../Integration/ZOHO-API/zoho.php';
	//
	//	$zohoApi = new Zoho("5b69810dc50fa3a7d24aeafdd2b738a3");
	//
	//	$result = $zohoApi->getRelatedRecords("Contacts", "Potentials", "1486524000029065017", "array");
	//	echo $result["Mailing City"];
	//	print_r($zohoApi->Set("Potentials", "1486524000029065017", json_encode(array("Address"=>"address test ing"))));
	//	Get('contacts', "1486524000029065011", "json");
	//
	//	require_once '../../Integration/ZOHO-API/zoho.php';
	//
	//	    $zohoApi = new Zoho("5b69810dc50fa3a7d24aeafdd2b738a3");
	//
	//	    $contact = $zohoApi->getRelatedRecords("Contacts", "Potentials", "1486524000029065017", "array");
	//
	//	    if($contact["Credit Approved"] == "true"){
	//	        die('{"redirect":"security-system.php"}');
	//	    }


	//	echo '<pre>';
	//	print_r($_SERVER);
	//	print_r($_COOKIE);
	//	print_r($_SESSION);
	//	print_r($_ENV);
	//	echo '</pre>'
	//
	//
	//	github branch test 01
	//
	//	github branch test 02
	//
	//	github branch test 03