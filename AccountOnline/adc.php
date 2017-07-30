<?php

function ADC()
{
	$_SESSION[Deal] = $_SESSION[Zoho]->Get('Potentials', $_POST['deal_id'], 'array');

	require_once('../../Integration/ADC/adc.php');

	if($_SESSION[Deal]['Monitoring Center'] == 'Moni PUR' || $_SESSION[Deal]['Monitoring Center'] == 'Moni CM')
	  	{
		    $_adcprovider = 'moni_adc';
	  	} else if($_SESSION[Deal]['Monitoring Center'] == 'Rapid')
	  	{
		    $_adcprovider = 'rapid_adc';
	  	}

	$_SESSION[Post]->url = 'https://alarmadmin.alarm.com/WebServices/CustomerManagement.asmx';

	$_SESSION[Post]->soapAction = 'http://www.alarm.com/WebServices/';

	$adc = new ADC(Credentials::$sable[$_adcprovider][username], Credentials::$sable[$_adcprovider][password]);

	switch($_POST['method'])
	    {
		case 'create':
			$_SESSION[Deal]['ADC Serial Number'] = $_POST['serial_number'];//replaces alarm.com serial number from the deal, with the serial number on the form.

			$_SESSION[Deal]['Contact Phone'] = $_POST['phone'];

			$xml = $adc->Create($_SESSION[Deal]);//populates the alarm.com xml with the data from the deal.

			$result = $_SESSION[Post]->Post('CreateCustomer', $xml);//post create customer request to alarm.com api.

			$result = $adc->Result($result);//parse alarm.com xml result into an associative array.

			if($result['Success'] == 'true')
	            {
		            $_SESSION[Zoho]->Set('Potentials', $_POST['deal_id'], '{"ADC Customer Id":"'.$result['CustomerId'].'"}');//update alarm.com customer id in zoho deal.
	            }
			die(json_encode($result));//returns json formatted data to the caller.

	        case 'terminate':
		        $xml = $adc->Terminate($_SESSION[Deal]);//populates the alarm.com xml with the data from the deal.

		        $result = $_SESSION[Post]->Post('TerminateCustomer', $xml);//post terminate customer request to alarm.com api.

		        $result = $adc->Result($result);//parse alarm.com xml result into an associative array.

		        if($result['terminateStatus'] == 'true'){
			        $_SESSION[Zoho]->Set('Potentials', $_POST['deal_id'], '{"ADC Customer Id":""}');//update alarm.com customer id in zoho deal.
		        }
		        die(json_encode($result));//returns json formatted data to the caller.

	        case 'zones':
		        $xml = $adc->GetZones($_SESSION[Deal]);

		        $zones = $_SESSION[Post]->Post('GetDeviceList', $xml);

		        die($adc->ZoneParser($zones, 'json'));
	    }
}