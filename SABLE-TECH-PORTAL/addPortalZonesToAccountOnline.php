<?php
	/**
	 * Created by PhpStorm.
	 * User: razaman2
	 * Date: 5/4/2017
	 * Time: 10:47 PM
	 */

	header('Access-Control-Allow-Origin: *');
//header('Access-Control-Allow-Methods: GET, POST');

require_once "../../Integration/ZOHO-API/zoho.php";
require_once "../../Integration/Connection.php";

$dbConn = new Connection();

$sql = $dbConn->prepare("SELECT * FROM sablrcrm_test.ZOHO_USER WHERE ZOHO_USER.COMPANY_ID = ?");

$sql->execute([

	$_POST["company"]
]);

$authId = $dbConn->getSingleRecord($sql)->ZOHO_AUTH_ID;
//echo $authId;exit;

$zohoApi = new Zoho($authId);

$deal = $zohoApi->Get("Potentials", $_POST["deal"], "array");

echo $deal["Zone Data"];