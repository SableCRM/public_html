<?php

/**
 * Created by PhpStorm.
 * User: razaman2
 * Date: 4/26/2017
 * Time: 8:25 PM
 */

//print_r($_POST);exit;

session_start();

$_SESSION['customer-info'] = $_POST;

require_once "vendor/autoload.php";
require_once "../../../Integration/Connection.php";
require_once "../../../Integration/ZOHO-API/zoho.php";

/**
 * get an instance of the database connection
 */
$dbConn = new Connection();

/**
 * post from sales portal or creditportal
 */
if(isset($_POST["credit"])){

    /**
     * checks the firstname field to see if a test condition was passed
     * user can use this field to simulate tests
     */
    if($_POST["fname"] == strtolower("%pass%")){

        echo '{"status":"pass", "score":"755"}';
	    $_SESSION['credit']['score'] = "755";exit;
    }
    elseif($_POST["fname"] == strtolower("%fail%")) {

        echo '{"status":"fail", "score":"555"}';
	    $_SESSION['credit']['score'] = "555";exit;
    }
    elseif($_POST["fname"] == strtolower("%unknown%")) {

        echo '{"status":"unknown", "score":"0"}';exit;
    }

    /**
     * check the contact if credit was already ran
     */
    $zohoApi = new Zoho($_SESSION["user"]->ZOHO_AUTH_ID);

    if(isset($_POST["contact-id"])){

        $contact = $zohoApi->Get("Contacts", $_POST["contact-id"], "array");
    }
    else{

        $contact = $zohoApi->getRelatedRecords("Contacts", "Potentials", $_SESSION["deal-id"], "array");
    }

    if($contact["Credit Approved"] == "true"){

        if(isset($_POST["salesportal"])){

            echo '{"redirect":"security-system.php"}';exit;
        }
        elseif(isset($_POST["creditportal"])){

            echo '{"error":"Contact has already had credit pull..."}';exit;
        }
    }

    /**
     * set company-id based on the location of the request. creditportal or sales portal
     */
    $companyId = isset($_POST["company-id"]) ? $_POST["company-id"] : $_SESSION["user"]->COMPANY_ID;

    /**
     * set contact-id based on the location of the request. creditportal or sales portal
     */
    $contactId = isset($_POST["contact-id"]) ? $_POST["contact-id"] : $contact["CONTACTID"];

    /**
     * connect to database and get hart credentials
     */
    $sql = $dbConn->prepare("SELECT * FROM sablrcrm_test.HART_USER WHERE HART_USER.COMPANY_ID = ?");

    $sql->execute(array($companyId));

    if($sql->rowCount() > 0){

        $rows = $sql->fetchAll(PDO::FETCH_OBJ);

        $row  = array_shift($rows);

        $hartUser  = $row->HART_USER;
        $hartPass  = $row->HART_PASSWORD;
        $bureau    = (!empty($_POST["bureau"])) ? $_POST["bureau"] : $row->PROVIDER;
        $firstname = $_POST["fname"];
        $lastname  = $_POST["lname"];
        $ssn       = $_POST["ssn"];
        $address   = $_POST["address1"];
        $city      = $_POST["city"];
        $state     = $_POST["state"];
        $zip       = $_POST["zip"];
        $birthdate = $_POST["birthdate"];

    } else {

        echo "Sable was unable to locate Hart Credentials...";exit;
    }

} else {

    echo "Sable was unable to access Credit Application...";exit;
}

use credit\credit;

$client = array(

    //Power Home
    //"username" => "PowerH0me",
    //"password" => "DjEDhQ#@4TyxdE7KjFyt",

    //Alpha One
    //"username" => "Alpha1pro",
    //"password" => "ON(0enhJOtMaNK4ArnNh",

    //GuardMe
    //"username" => "GU@RDMEm0ni",
    //"password" => "uV9CtPlvE74*NTdpTBxb",

    //Clear Protection
    //"username" => "ClearPr0t",
    //"password" => "KC2ffi)CVFUwDC1Ijy#M",

    "username"  => $hartUser,
    "password"  => $hartPass,
    "bureau"    => $bureau,
    "firstname" => $firstname,
    "lastname"  => $lastname,
    "ssn"       => $ssn,
    "address"   => $address,
    "city"      => $city,
    "state"     => $state,
    "zip"       => $zip,
    "birthdate" => $birthdate
);

//print_r($client);exit;

try{

    $pullNewCredit = new credit\pullNewCredit($client);

    $pullNewCredit->pullNew();

    $result = $pullNewCredit->fullParse();

    $params = array("company-id" => $companyId, "contact-id" => $contactId);

    //print_r($result);exit;

    if($result["score"] >= 600){

        updateContact($params, $result["score"], $result["token"], $result["transid"]);
	    $_SESSION["credit"]["score"] = $result["score"];
	    $_SESSION["credit"]["approved"] = "true";
	    $_SESSION["credit"]["reason"] = "Score";

        echo '{"status":"pass", "score":"'.$result["score"].'"}';

    } elseif($result["score"] <= 599 && $result["score"] > 0) {

        updateContact($params, $result["score"], $result["token"], $result["transid"]);
	    $_SESSION["credit"]["score"] = $result["score"];
	    $_SESSION["credit"]["approved"] = "true";
	    $_SESSION["credit"]["reason"] = "Score";

        echo '{"status":"fail", "score":"'.$result["score"].'"}';

    } else {

        echo '{"status":"unknown", "score":"'.$result["score"].'"}';
    }

	$_SESSION["credit"]["score"] = $result["score"];

	$_SESSION["credit"]["token"] = $result["token"];

	$_SESSION["credit"]["transid"] = $result["transid"];

} catch(Exception $ex) {

    echo '{"error":"'.$ex->getMessage().'"}';
}


/**
 * update contact with credit information if credit pull is successfull and score is above 599...
 * @param array $params
 */
function updateContact(array $params, $score, $token, $transid){

    $dbConn = new Connection();

    $sql = $dbConn->prepare("SELECT * FROM sablrcrm_test.ZOHO_USER WHERE ZOHO_USER.COMPANY_ID = ?");

    $sql->execute(array($params["company-id"]));

    $zohoAuthId = false;

    if($sql->rowCount() > 0){

        $rows = $sql->fetchAll(PDO::FETCH_OBJ);

        $row = array_shift($rows);

        $zohoAuthId = $row->ZOHO_AUTH_ID;

    } else {

        echo "Unable to bet authToken from zoho crm...";
    }

    $zohoApi = new Zoho($zohoAuthId);

    $zohoApi->Set("Contacts", $params["contact-id"],

        json_encode(

            array(

                "Credit Score"       => $score,
                "Credit Token"       => $token,
                "Transaction Number" => $transid,
                "Credit Approved"    => "true",
                "Approval Reason"    => "Score"
            )
        )
    );
}

function databaseQuery($query, $params){

    $row = false;

    $dbConn = new Connection();

    $sql = $dbConn->prepare($query);

    $sql->execute($params);

    if($sql->rowCount() > 0){

        $rows = $sql->fetchAll(PDO::FETCH_OBJ);

        $row = array_shift($rows);
    }

    return $row;
}