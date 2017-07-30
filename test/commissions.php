<?php

session_start();

/**
 * Created by PhpStorm.
 * User: razam
 * Date: 3/21/2017
 * Time: 11:36 AM
 */

/**
 * when this file runs, we need to grab the logged in user and retrieve all the sales for the selected date-range from
 * the server and run it through the commissions calculator and add each job to an array with all the info that is needed
 * to populate the form along with the amount of each job and the total for all jobs for the logged in user
 */

require_once '../../Integration/DATABASE_CONNECTION.php';
require_once '../../Integration/ZOHO-API/zoho.php';

$zohoApi = new Zoho('e64ac83c400fcae7e64efa9b6296acf9');

$deal = $zohoApi->Get('potentials', '1486524000029065017', 'array');

$sql = 'CALL COMM_CALC_1(:dealId, :customerId, :customerName, :salesPersonId, :salesPerson, :installDate,
:fundedDate, :firstNotice, :paymentMethod, :resiComm, :selfGenFlag, :monitoringLevel, :pointsGiveCommCalc1n,
:invoiceAmount, :activation, :vRmr, @OUTPUT)';
$params = array(
    ':dealId' => '1486524000029065017', //DEALID
    ':customerId' => '1486524000029065011', //CONTACTID
    ':customerName' => $deal['Contact Name'],
    ':salesPersonId' => 'steve',
    ':salesPerson' => NULL,
    ':installDate' => $deal['Install Date and Time'],
    ':fundedDate' => $deal['Funded Date'],
    ':firstNotice' => NULL, //DONT CARE ABOUT THIS FIELD, CAN BE REMOVED
    ':paymentMethod' => $deal['Easy Pay Method'],
    ':resiComm' => $deal['Residential/Commercial'],
    ':selfGenFlag' => $deal['Referred By'],
    ':monitoringLevel' => $deal['Package Type'],
    ':pointsGiveCommCalc1n' => $deal['Total Points'],
    ':invoiceAmount' => $deal['Invoice Amount'],
    ':activation' => $deal['Activation Fee'],
    ':vRmr' => $deal['Invoice RMR']
);

$result = Connect(array([$sql, $params], ['SELECT @OUTPUT AS OUTPUT', null]), null, 'array');
$params = array($_SESSION['user']->USER_ID, $_SESSION['user']->COMPANY_ID, $_POST['date-fr'], $_POST['date-to']);
$result = Connect('SELECT * FROM USR_COMMISSIONS WHERE USER_ID = ? AND COMPANY_ID = ? AND (INSTALL_DATE BETWEEN ? AND ?)', $params, 'array');

if (!isset($result->status)){
    foreach ($result as $entry){
        $entry->USER_NAME = $_SESSION['user']->USER_FIRST_NAME.' '.$_SESSION['user']->USER_LAST_NAME;
        //print_r($entry);
    }
}

//echo '<pre>';
//print_r($result);
//echo '</pre>';
//$result->USER = $_SESSION['user']->USER_ID;

echo json_encode($result);

//print_r($result);
//print_r($_SESSION);