<?php
	/**
	 * Created by PhpStorm.
	 * User: razaman2
	 * Date: 5/1/2017
	 * Time: 2:24 AM
	 */

	session_start();

	//print_r($_SESSION);exit;

	require_once "../../../Integration/ZOHO-API/zoho.php";
	$zohoApi = new Zoho($_SESSION["user"]->ZOHO_AUTH_ID);

	$country = false;
	if($_SESSION['customer-info']['country'] == "US"){

		$country = "USA";
	}
	elseif($_SESSION['customer-info']['country'] == "CA"){

		$country = "CANADA";
	}

	$stage = false;
	if($_SESSION["credit"]["score"] > 599){

		$stage = "Lead";
	}
	else{

		$stage = "Sold and Failed";
	}

	$dealName = false;
	if(isset($_SESSION["deal"])){

		$dealName = $_SESSION["deal"]["Deal Name"];
	}
	else{

		$dealName = $_SESSION['customer-info']['fname']." ".$_SESSION['customer-info']['lname']. ' '.$_SESSION['customer-info']['city'].' '.$_SESSION['customer-info']['state'];
	}

	$createDealResult = $zohoApi->Insert("Deals",
		json_encode(
			array(
				'Deal Name'               => $dealName,
				'CONTACTID'               => $_SESSION['contact-id'],
				'Email'                   => $_SESSION['customer-info']['email'],
				'Contact Phone'           => $_SESSION['customer-info']['phone'],
				'Address'                 => $_SESSION['customer-info']['address1'],
				'City'                    => $_SESSION['customer-info']['city'],
				'State'                   => $_SESSION['customer-info']['state'],
				'Province'                => $_SESSION['customer-info']['state'],
				'Zip'                     => $_SESSION['customer-info']['zip'],
				'Postal Code'             => $_SESSION['customer-info']['zip'],
				'County'                  => $_SESSION['customer-info']['county'],
				'Country'                 => $country,
				'Residential/Commercial'  => $_SESSION['customer-info']['property-type'],
				'Sales Person_ID'         => $_SESSION['user']->USER_ID,
				'Stage'                   => $stage,
				'Closing Date'            => strftime($zoho->zoho_time_format),
				'Package Type'            => $_POST['package-type'],
				'Monitoring Level'        => $_POST['monitoring-level'],
				'Takeover'                => $_POST['takeover'],
				'Two Way Voice'           => $_POST['twoway'],
				'ADC Video'               => $_POST['adc-video'],
				'Panel Type'              => $_POST['panel-type'],
				'Door(s) / Window(s)'     => $_POST['doors-windows'],
				'Motion(s)'               => $_POST['motions'],
				'Smoke(s)'                => $_POST['smokes'],
				'Glass Break(s)'          => $_POST['glass-breaks'],
				'Other'                   => $_POST['other'],
				'Thermostat(s)'           => $_POST['thermostats'],
				'Lock(s)'                 => $_POST['locks'],
				'Light(s)'                => $_POST['lights'],
				'Indoor Camera(s)'        => $_POST['indoor-cameras'],
				'Outdoor Camera(s)'       => $_POST['outdoor-cameras'],
				'Sky Bell'                => $_POST['sky-bell'],
				'Existing Panel Type'     => $_POST['existing-panel-type'],
				'Wired / Wireless'        => $_POST['wired-wireless'],
				'RMR'                     => $_POST['rmr'],
				'Amount'                  => $_POST['amount'],
				'Activation Fee'          => $_POST['activation-fee'],
				'ACH Routing Number'      => $_POST['ach-routing-number'],
				'ACH Account'             => $_POST['ach-account'],
				'Card Number'             => $_POST['card-number'],
				'Expiration Date'         => $_POST['expiration'],
				'CID'                     => $_POST['cvv'],
				'Easy Pay Method'         => $_POST['easy-pay-method'],
				'1st Choice Install Date' => $_POST['first-choice-date'],
				'1st Choice Install Time' => $_POST['first-choice-time'],
				'2nd Choice Install Date' => $_POST['second-choice-date'],
				'2nd Choice Install Time' => $_POST['second-choice-time']
			)
		)
	);

	$_SESSION["deal-id"] = json_decode($createDealResult)->response->result->recorddetail->FL[0]->content;

	$_SESSION["post-variables"] = $_POST;

	if($_SESSION["customer-info"]["property-type"] == "Commercial"){
		//create account and link to deal
	}

	echo $createDealResult;