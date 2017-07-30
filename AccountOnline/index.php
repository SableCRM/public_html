<?php

    session_start();

     //$_POST['src'] = 'guardme';
     //$_POST['deal_id'] = 1486524000033124057;
     //$_POST['action'] = 'adc';
     //$_POST['method'] = 'create';

	//CONNECT TO DATABASE AND GRAB CREDENTIALS FOR SRC
	if(isset($_GET['src']) || isset($_POST['src']))
	{
	    require_once('../../Integration/credentials.php');
	    require_once('../../Integration/apiendpoints.php');

	    $_endpoint = 'moni';
	    $_actionendpoint = 'moni';

	    if($_GET['src'] == 'guardme' || $_POST['src'] == 'guardme')
	    {
	        Credentials::$sable = Credentials::$guardme;
	    }

	    elseif($_GET['src'] == 'liberty' || $_POST['src'] == 'liberty')
        {
            Credentials::$sable = Credentials::$liberty;
        }
        elseif($_GET['src'] == 'power_home' || $_POST['src'] == 'power_home')
        {
            Credentials::$sable = Credentials::$powerHome;
        }
        elseif($_GET['src'] == 'clear_protection' || $_POST['src'] == 'clear_protection')
        {
            Credentials::$sable = Credentials::$clearProtection;
        }
        elseif($_GET['src'] == 'alpha_one' || $_POST['src'] == 'alpha_one')
        {
            Credentials::$sable = Credentials::$alphaOne;
        }

        elseif($_GET['src'] == 'test' || $_POST['src'] == 'test')
        {
            Credentials::$sable = Credentials::$test;
            $_endpoint = 'moniTest';
            $_actionendpoint = 'moni';
        } else if($_GET['src'] == 'capital_connect' || $_POST['src'] == 'capital_connect'){
		    Credentials::$sable = Credentials::$capitalConnect;
	    }
	}
	else
	{
	    die('{"error":"user not found!"}');
	}

    require_once('../../Integration/post.php');
    require_once('../../Integration/Zoho/zoho.php');
	require_once('../../Integration/Monitronics API/Get Data/getdata.php');

	$_SESSION[Post] = new Post($endpoint[$_endpoint], $actionendpoint[$_actionendpoint]);

    $_SESSION[Zoho] = new Zoho(Credentials::$sable[authToken]);

    $_SESSION[GetData] = new GetData(Credentials::$sable[wsiUsername], Credentials::$sable[wsiPassword]);

    $_SESSION[Deal] = $_SESSION[Zoho]->Get('Potentials', $_GET[deal_id], 'array');

    if(isset($_POST[deal_id]))
    //if($_SESSION['Deal']['POTENTIALID'] != $_POST['deal_id'])
    {
        $_SESSION[Deal] = $_SESSION[Zoho]->Get('Potentials', $_POST[deal_id], 'array');
    }

    switch($_POST['action'])
    {
        case 'adc':
            include_once('adc.php');
            //$comm = new ADC(Credentials::$sable['wsiUsername'], Credentials::$sable['wsiPassword']);
            //$comm->Create()
            include_once ('../../Integration/this.php');
            include_once ('../../Integration/validation.php');
            $header = "From:notifications@sablecrm.com \r\n";
            if($_POST['method'] == 'terminate')
            {
                $errors = '';

                if(!AdcTerminateCustomerValidation($_SESSION[Deal], $errors))
                {
                    die($errors);
                }
                else
                {
                    die(ADC());
                }
            }
            elseif($_POST['method'] == 'create')
            {
                $errors = '';

                if(!AdcCreateCustomerValidation($_SESSION[Deal], $errors))
                {
                    mail("ainsley.clarke@guardme.com", 'Cell Registration', $result, $header);
                    
                    die($errors);
                }
                else
                {
                    $tech = $_SESSION[Zoho]->Get('CustomModule2', $_SESSION[Deal]['Technician Name_ID'], 'array');

                    $tech_email = $tech['Email'];

                    $result = ADC();

                    //SendMail($result, 'Cell Registration', $tech_email);

                    //mail('ainsley.clarke@guardme.com','Cell-Registration-Debug', $result. '     '. $tech_email);

                    mail("ainsley.clarke@guardme.com", 'Cell Registration', $result, $header);

                    die($result);
                }
            }
            elseif($_POST['method'] == 'zones')
            {
                die(ADC());
            }

        case 'alarm_events':
            include_once 'eventhistory.php';

            /**
             * set start-date for event-history
             */
            $_SESSION[GetData]->start_date = $_POST['start-date'];

            /**
             * set end-date for event-history
             */
            $_SESSION[GetData]->end_date = $_POST['end-date'];

            /**
             * get event-history from moni api
             */
            $xml = $_SESSION[GetData]->Get('eventhistories', $_SESSION[Deal]['CS Number']);

            /**
             * post event-history request to moni api
             */
            $eventhistories = $_SESSION[Post]->Post('GetData', $xml, 'array');

            if($_POST['method'] == 'get-events')
            {
                /**
                 * return raw event-history
                 */
                die(json_encode($eventhistories));
            }
            else
            {
                /**
                 * return zone alarm only, event-history
                 */
                $eventhistories = AlarmEvents($eventhistories);
                die(json_encode($eventhistories));
            }

        case 'test':
            include_once('test.php');

            die(Test());

        case 'twoway':
            include_once('twoway.php');

            die(Twoway());

        case 'init':
            include_once('init.php');

            die(Init());

        case 'zones':
            include_once('zones.php');

            die(Zones());

        case 'zoho-update':
            die($_SESSION[Zoho]->Set($_POST['zoho-module'], $_POST['deal_id'], $_POST['zoho-data']));

        case 'online':
            include_once('online.php');

            /**
             * calls the Online function and stores the result in $online_result.
             */
            //$online_result = Online();
//            $online_result = json_decode($online_result);
            //$online_result['confirm#'] = 5446;
//            $online_result = 'hey there';
//            die($online_result);


            /**
             * check each element of the result array for a confirmation number. if confirmation number is found, store it in
             * $confirmation_number.
             */
//             foreach ($online_result as $_result)
//             {
//                 if($_result[entry_id] == 'Confirm#')
//                 {
//                     $confirmation_number = $_result;
//                 }
//             }

//             /**
//              * if account is successfully placed online and client is subscribed to funding.
//              */
//             if($confirmation_number && $_POST[src] == 'guardme')
//             {
//                 /**
//                  * include funding class into project.
//                  */
//                 include_once '../../Integration/Monitronics API/Funding/fundingclass.php';

//                 /**
//                  * create an instance of the funding class and initialize it with sable credentials for moni api and funding api.
//                  */
//                 $_SESSION[Funding] = new Funding(Credentials::$sable[wsiUsername], Credentials::$sable[wsiPassword], Credentials::$sable[fundingUsername], Credentials::$sable[fundingPassword]);

//                 /**
//                  * call UpdateFunding Method and insert cs number and e-contract-id and returns an xml string that includes
//                  * Monitronics API username & password and Monitronics Funding API username & password and cs number and e-contract-id.
//                  */
//                 $xml = $_SESSION[Funding]->UpdateFunding($_SESSION[Deal]['CS Number'], $_SESSION[Deal]['E-Contract ID']);

//                 /**
//                  * updates Post object with Funding API url endpoint and soapAction endpoint.
//                  */
//                 $_SESSION[Post]->url = $endpoint[funding];
//                 $_SESSION[Post]->soapAction = $actionendpoint[funding];

//                 /**
//                  * post xml to Funding API and stores the xml returned result in $result.
//                  */
//                 $funding_result = $_SESSION[Post]->Post('UpsertCommonFundingDataFromThirdPartyCRM', $xml);

//                 /**
//                  * call FundingResult and passes the xml returned result to the function and specify if the returned data should be
//                  * json or array format.
//                  */
//                 $funding_result = $_SESSION[Funding]->FundingResult($funding_result, 'array');

//                 /**
//                  * call UpdateCRM to update fields in CRM after successful online.
//                  */

//                 UpdateCRM();

//                 /**
//                  * merge funding and online arrays.
//                  */
//                 $online_result = [funding => $funding_result, online => $online_result];

//                 /**
//                  * return both arrays.
//                  */
//                 die(json_encode($online_result));
//             }

//             /**
//              * if account is successfully placed online and client is not subscribed to funding.
//              */
//             elseif ($confirmation_number)
//             {
//                 /**
//                  * call UpdateCRM to update fields in CRM after successful online.
//                  */
//                 UpdateCRM();

//                 /**
//                  * returns an array with the online result.
//                  */
//                 die($confirmation_number);
//             }

//             else
//             {
//                 /**
//                  * returns the online failure array.
//                  */
//                 die($online_result);
//             }
            die(Online());

        case 'contactlist':
            include_once('contactlist.php');

            die(MoniContactList($_POST[type]));

        case 'funding':
	        include_once '../../Integration/Monitronics API/FUNDING/fundingclass.php';

            $_SESSION[Funding] = new Funding(Credentials::$sable[wsiUsername], Credentials::$sable[wsiPassword],
                Credentials::$sable[fundingUsername], Credentials::$sable[fundingPassword]);

            $xml = $_SESSION[Funding]->UpdateFunding($_SESSION[Deal]['CS Number'], $_SESSION[Deal]['E-Contract ID']);

            $_SESSION[Post]->url = $endpoint[funding];

            $_SESSION[Post]->soapAction = $actionendpoint[funding];

            $result = $_SESSION[Post]->Post('UpsertCommonFundingDataFromThirdPartyCRM', $xml);

            $result = $_SESSION[Funding]->FundingResult($result, 'json');

            die($result);
    }

    /**
     * function to update fields in crm.
     */
//    function UpdateCRM()
//    {
//        $data = '{
//            "Confirmation Number":'.$confirmation_number.',
//            "Install Status":"Completed",
//            "Account Online":"true",
//            "E-Contract Updated":'.$funding_result[message].',
//            "Codeword":'.$_POST[passcode].',
//            "Cross Street":'.$_POST[crossStreet].',
//            "Panel Phone":'.$_POST[panelPhone].',
//            "Panel Location":'.$_POST[panelLocation].',
//            "Transformer Location":'.$_POST[transformerLocation].',
//            "Contact Phone":'.$_POST['homePhone'].'
//        }';
//        return $_SESSION[Zoho]->Set('Potentials', $_POST[deal_id], $data);
//    }

?>

<!DOCTYPE html>
<html>
<head>

<title>Account Online</title>

<link href="style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,900" rel="stylesheet">

</head>
<body>

<?php include 'header.php'; ?>

<section id="modules">
    <div class="module-column">
        <?php include 'modules/site-details.php'; ?>
        <?php include 'modules/site-test.php'; ?>
        <?php include 'modules/alarmcom-services.php'; ?>
        <?php include 'modules/site-contacts.php'; ?>
    </div>
    <div class="module-column">
        <?php include 'modules/agencies.php'; ?>
        <?php include 'modules/zone-list.php'; ?>
        <?php include 'modules/event-history.php'; ?>
    </div>
</section>

<?php include 'footer.php'; ?>

<div id="message"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script type="text/javascript"><?php include('../../Integration/ajax.js') ?><?php include('../../Integration/strtohtml.js') ?><?php include('../../Integration/urlsplit.js') ?></script>

<script type="text/javascript" src="accountonline.js"></script>

<script type="text/javascript" src="accountonline_tx.js"></script>

</body>
</html>