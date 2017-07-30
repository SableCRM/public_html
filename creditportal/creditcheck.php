<?php

session_start();

//print_r($_POST);exit;

require_once "../../Integration/ZOHO-API/zoho.php";
require_once "../../Integration/DATABASE_CONNECTION.php";

$bureau = isset($_POST["credit-bureau"]) ? $_POST["credit-bureau"] : false;

if($_POST['credit']){
    
    //unset($_SESSION["customer-info"]);

    /**
     * if a contact is marked credit approval true redirect to package page. do not run credit
     */
    $zohoApi = new Zoho($_SESSION["user"]->ZOHO_AUTH_ID);

    $contact = $zohoApi->getRelatedRecords("Contacts", "Potentials", $_SESSION["deal-id"], "array");

    if($contact["Credit Approved"] == "true"){

        $_SESSION['customer-info'] = $_POST;

        die('{"redirect":"security-system.php"}');
    }

    $result = database('SELECT HART_USER, HART_PASSWORD, PROVIDER FROM HART_USER WHERE COMPANY_ID = ? LIMIT 1', array($_SESSION['company-id']));










    
    if($_POST['pull-prev']){

        if(strtolower($_POST['test']) == 'pass'){

            echo '{"fname":{"0":"from pull-prev"},"lname":{"0":"SOWELL"},"address":{"house_number":{"0":"1241"},"predirectional":{"0":"E"},"street_name":{"0":"YELLOWSTONE"},"postdirectional":{},"street_type":{"0":"PL"},"apt_unit_number":{}},"city":{"0":"CHANDLER"},"state":{"0":"AZ"},"zip":{"0":"85249"},"transid":{"0":"308920035"},"token":{"0":"R8YErzfSkDmY1P8VU2U5zprOsiGV5OdCjkY99701mHkS3n0Cg1JpSFNsIBTWVhUQE4JfU\/0kk0QFfH3r4WizNem0LleO\/H4AyBbyYtg7MOGh3A=="},"score":{"0":"0644"},"file_hit":{"@attributes":{"code":"Y"},"0":"Regular hit on file -- all files are returned"},"indicator_flag":{"@attributes":{"code":""}}}';

        } elseif(strtolower($_POST['test']) == 'fail') {

            echo '{"fname":{"0":"from pull-prev"},"lname":{"0":"SOWELL"},"address":{"house_number":{"0":"1241"},"predirectional":{"0":"E"},"street_name":{"0":"YELLOWSTONE"},"postdirectional":{},"street_type":{"0":"PL"},"apt_unit_number":{}},"city":{"0":"CHANDLER"},"state":{"0":"AZ"},"zip":{"0":"85249"},"transid":{"0":"308920035"},"token":{"0":"R8YErzfSkDmY1P8VU2U5zprOsiGV5OdCjkY99701mHkS3n0Cg1JpSFNsIBTWVhUQE4JfU\/0kk0QFfH3r4WizNem0LleO\/H4AyBbyYtg7MOGh3A=="},"score":{"0":"514"},"file_hit":{"@attributes":{"code":"Y"},"0":"Regular hit on file -- all files are returned"},"indicator_flag":{"@attributes":{"code":""}}}';

        } elseif (strtolower($_POST['test']) == 'not found') {

            echo '{"fname":{"0":"from pull-prev"},"lname":{"0":"SOWELL"},"address":{"house_number":{"0":"1241"},"predirectional":{"0":"E"},"street_name":{"0":"YELLOWSTONE"},"postdirectional":{},"street_type":{"0":"PL"},"apt_unit_number":{}},"city":{"0":"CHANDLER"},"state":{"0":"AZ"},"zip":{"0":"85249"},"transid":{"0":"308920035"},"token":{"0":"R8YErzfSkDmY1P8VU2U5zprOsiGV5OdCjkY99701mHkS3n0Cg1JpSFNsIBTWVhUQE4JfU\/0kk0QFfH3r4WizNem0LleO\/H4AyBbyYtg7MOGh3A=="},"score":{"0":"0"},"file_hit":null,"indicator_flag":{"@attributes":{"code":""}}}';

        } else {

            echo json_encode(pull_previous($result));
        }
    }











    elseif($_POST['pull-new']) {

        $_SESSION['customer-info'] = $_POST;

        if(strtolower($_POST['test']) == 'pass'){

            echo '{"fname":{"0":"from pull-new"},"lname":{"0":"SOWELL"},"address":{"house_number":{"0":"1241"},"predirectional":{"0":"E"},"street_name":{"0":"YELLOWSTONE"},"postdirectional":{},"street_type":{"0":"PL"},"apt_unit_number":{}},"city":{"0":"CHANDLER"},"state":{"0":"AZ"},"zip":{"0":"85249"},"transid":{"0":"308920035"},"token":{"0":"R8YErzfSkDmY1P8VU2U5zprOsiGV5OdCjkY99701mHkS3n0Cg1JpSFNsIBTWVhUQE4JfU\/0kk0QFfH3r4WizNem0LleO\/H4AyBbyYtg7MOGh3A=="},"score":{"0":"644"},"file_hit":{"@attributes":{"code":"Y"},"0":"Regular hit on file -- all files are returned"},"indicator_flag":{"@attributes":{"code":""}}}';

        } elseif(strtolower($_POST['test']) == 'fail') {

            echo '{"fname":{"0":"from pull-new"},"lname":{"0":"SOWELL"},"address":{"house_number":{"0":"1241"},"predirectional":{"0":"E"},"street_name":{"0":"YELLOWSTONE"},"postdirectional":{},"street_type":{"0":"PL"},"apt_unit_number":{}},"city":{"0":"CHANDLER"},"state":{"0":"AZ"},"zip":{"0":"85249"},"transid":{"0":"308920035"},"token":{"0":"R8YErzfSkDmY1P8VU2U5zprOsiGV5OdCjkY99701mHkS3n0Cg1JpSFNsIBTWVhUQE4JfU\/0kk0QFfH3r4WizNem0LleO\/H4AyBbyYtg7MOGh3A=="},"score":{"0":"514"},"file_hit":{"@attributes":{"code":"Y"},"0":"Regular hit on file -- all files are returned"},"indicator_flag":{"@attributes":{"code":""}}}';

        } elseif (strtolower($_POST['test']) == 'not found') {

            echo '{"fname":{"0":"from pull-new"},"lname":{"0":"SOWELL"},"address":{"house_number":{"0":"1241"},"predirectional":{"0":"E"},"street_name":{"0":"YELLOWSTONE"},"postdirectional":{},"street_type":{"0":"PL"},"apt_unit_number":{}},"city":{"0":"CHANDLER"},"state":{"0":"AZ"},"zip":{"0":"85249"},"transid":{"0":"308920035"},"token":{"0":"R8YErzfSkDmY1P8VU2U5zprOsiGV5OdCjkY99701mHkS3n0Cg1JpSFNsIBTWVhUQE4JfU\/0kk0QFfH3r4WizNem0LleO\/H4AyBbyYtg7MOGh3A=="},"score":{"0":"0"},"file_hit":null,"indicator_flag":{"@attributes":{"code":""}}}';

        } else {

            echo json_encode(pull_new($result));
        }
    }
}








elseif($_POST['init-page']) {

    $_SESSION['contact-id'] = $_POST['contact-id'];
    
    $_SESSION['company-id'] = $_POST['company-id'];
    
    $_SESSION['zoho-auth-id'] = database('SELECT ZOHO_AUTH_ID FROM ZOHO_USER WHERE COMPANY_ID = ? LIMIT 1', array($_SESSION['company-id']));
    
    $contact = new Zoho($_SESSION['zoho-auth-id']->ZOHO_AUTH_ID);
    
    echo $contact->Get('Contacts', $_SESSION['contact-id'], 'json');

}











elseif($_POST['update-contact']) {
    
    $zohoApi = new Zoho($_SESSION['zoho-auth-id']->ZOHO_AUTH_ID);

    echo $zohoApi->Set('Contacts', $_SESSION['contact-id'], json_encode(array(

        "Credit Score" => $_POST['score'],

        "Credit Token" => $_POST['token'],

        "Transaction Number" => $_POST['transid'],

        "Credit Approved" => $_POST["credit-approved"],

        "Approval Reason" => $_POST["approval-reason"]
        )
    ));
}

//CONNECT TO DATABASE AND MAKE REQUEST
function database($query, $params){

    $rows = Connect($query, $params, "array");
    
    return $rows[0];
}

//PULL NEW CREDIT REQUEST
function pull_new($credentials)
{
    global $bureau;

    if($bureau == "Equifax"){
        $bureau = "EFX";
    } elseif($bureau == "Experian") {
        $bureau = "XPN";
    } elseif($bureau == "Transunion") {
        $bureau = "TU";
    } else {
        $bureau = $credentials->PROVIDER;
    }

    $creditRequest =
        "ACCOUNT=".$credentials->HART_USER.
        "&PASSWD=".$credentials->HART_PASSWORD.
        "&PASS=2
        &PROCESS=PCCRREDIT
        &BUREAU=".$bureau.
        "&PRODUCT=CREDIT
        &NAME=".$_POST["fname"]." ".$_POST["lname"].
        "&SSN=".$_POST["ssn"].
        "&ADDRESS=".$_POST["address1"].
        "&CITY=".$_POST["city"].
        "&STATE=".$_POST["state"].
        "&ZIP=".$_POST["zip"].
        "&DOB=".$_POST["birth-date"];

        //print_r($creditRequest);

    return parse_credit($creditRequest);
}

//RETRIEVE PREVIOUSLY PULLED CREDIT REPORT
function pull_previous($credentials)
{
    global $bureau;

    if($bureau == "Equifax"){
        $bureau = "EFX";
    } elseif($bureau == "Experian") {
        $bureau = "XPN";
    } elseif($bureau == "Transunion") {
        $bureau = "TU";
    } else {
        $bureau = $credentials->PROVIDER;
    }

    $creditRequest =
        "ACCOUNT=".$credentials->HART_USER.
        "&PASSWD=".$credentials->HART_PASSWORD.
        "&PASS=109
        &PROCESS=PCCRREDIT
        &TOKEN=".$_POST["token"];

        //print_r($creditRequest);

    return parse_credit($creditRequest);
}

function parse_credit($creditRequest)
{
    global $bureau;

    $credit = simplexml_load_string(get_credit($creditRequest));
    $Transid = $credit->HX5_transaction_information->Transid;
    $Token = $credit->HX5_transaction_information->Token;

    if($bureau == "EFX"){
        $var = 0;
        $score = new stdClass();
        $score->$var = ((int)$credit->bureau_xml_data->EFX_Report->subject_segments->beacon->score);
        $file_hit = $credit->bureau_xml_data->EFX_Report->subject_segments->transaction_control->hit_designator_code;
    } else {
        $score = $credit->bureau_xml_data->TU_Report->subject_segments->scoring_segments->scoring->score;
        $file_hit = $credit->bureau_xml_data->TU_Report->subject_segments->subject_header->file_hit;
    }
    //$score = $credit->bureau_xml_data->EFX_Report->subject_segments->beacon->score;
    //$score = $credit->bureau_xml_data->TU_Report->subject_segments->scoring_segments->scoring->score;
    $indicator_flag = $credit->bureau_xml_data->TU_Report->subject_segments->scoring_segments->scoring->indicator_flag;
    $fname = $credit->bureau_xml_data->TU_Report->subject_segments->name_information->fname;
    $lname = $credit->bureau_xml_data->TU_Report->subject_segments->name_information->lname;
    $address["house_number"] = $credit->bureau_xml_data->TU_Report->subject_segments->address_information->house_number;
    $address["predirectional"] = $credit->bureau_xml_data->TU_Report->subject_segments->address_information->predirectional;
    $address["street_name"] = $credit->bureau_xml_data->TU_Report->subject_segments->address_information->street_name;
    $address["postdirectional"] = $credit->bureau_xml_data->TU_Report->subject_segments->address_information->postdirectional;
    $address["street_type"] = $credit->bureau_xml_data->TU_Report->subject_segments->address_information->street_type;
    $address["apt_unit_number"] = $credit->bureau_xml_data->TU_Report->subject_segments->address_information->apt_unit_number;
    $city = $credit->bureau_xml_data->TU_Report->subject_segments->address_information->city;
    $state = $credit->bureau_xml_data->TU_Report->subject_segments->address_information->state;
    $zip = $credit->bureau_xml_data->TU_Report->subject_segments->address_information->zip;
    //$file_hit = $credit->bureau_xml_data->TU_Report->subject_segments->subject_header->file_hit;
    $printed_doc = $credit->HTML_Reports->HTML_Report->CDATA;

    return

        array(
            "fname"          => $fname,
            "lname"          => $lname,
            "address"        => $address,
            "city"           => $city,
            "state"          => $state,
            "zip"            => $zip,
            "transid"        => $Transid,
            "token"          => $Token,
            "score"          => $score,
            "file_hit"       => $file_hit,
            "indicator_flag" => $indicator_flag,
            "report-doc"     => $printed_doc
        );
}

function get_credit($postfields)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.creditsystem.com/cgi-bin/pccreditxml");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
    curl_setopt($ch, CURLOPT_POST, true);
    $response = curl_exec($ch);
    curl_close($ch);
    
    return $response;
}