<!DOCTYPE html>
<html>
<head>

	<title>Agreement Generating</title>

	<?php require_once "../portals/head.php" ?>

	<link href="./contractcallback.css" rel="stylesheet">

</head>
<body>

<div id="agreement-generating">
	<i class="icon-loop2"></i>
	<br><br>
	<p>Please wait while your agreement is being generated...</p>
</div>

</body>
</html>

<?php

	use CristianPontes\ZohoCRMClient\ZohoCRMClient;
	use eContract\ClassMap;
	use eContract\ServiceType\Create;
	use eContract\StructType\CreateContract2;
	use WsdlToPhp\PackageBase\AbstractSoapClientBase;
	use WsdlToPhp\WsSecurity\WsSecurity;

	require_once "../../wsdl2php_generated/vendor/autoload.php";

	$result = [];

	$options = [
		AbstractSoapClientBase::WSDL_URL => "https://mimasweb.monitronics.net/eContractAPI?wsdl",
		AbstractSoapClientBase::WSDL_CLASSMAP => ClassMap::get()
	];

	// create WsSecurity header for econtract request.
	$wsSecurity = WsSecurity::createWsSecuritySoapHeader("econtractapi", "qh0`%Q$:51");

	// create an instance of the create class.
	$createService = new Create($options);

	// get instance of created soap client.
	$soapClient = $createService::getSoapClient();

	// apply WsSecurity header to soap client
	$soapClient->__setSoapHeaders($wsSecurity);

	// get clients email address from post request.
	$email = $_GET["email"];

	// import and create instance of connection, then fetch clients deal id and companies zoho auth id from database.
	require_once "../../Integration/Connection.php";

	$dbConn = new Connection();

	$sql = $dbConn->prepare("SELECT ZOHO_USER.ZOHO_AUTH_ID, E_CONTRACT_SENT.JOB_ID, E_CONTRACT_SENT.STATUS, USR.MONI_NET_USER, USR.MONI_NET_PASSWORD FROM sablrcrm_test.E_CONTRACT_SENT JOIN sablrcrm_test.ZOHO_USER ON E_CONTRACT_SENT.COMPANY_ID = ZOHO_USER.COMPANY_ID JOIN sablrcrm_test.USR ON USR.COMPANY_ID = E_CONTRACT_SENT.COMPANY_ID WHERE E_CONTRACT_SENT.EMAIL = ? AND USR.USER_ID = E_CONTRACT_SENT.USER_ID");

	try
	{
		$sql->execute(
			[
				$email
			]
		);

		if($sql->rowCount() > 0)
		{
			$rows = $sql->fetchAll(PDO::FETCH_OBJ);
			$dbQuery = $rows[0];
		}
		else
		{
			print_r("No deal id was found for client email."); exit;
		}
	}
	catch(Exception $e)
	{
		print_r($e->getMessage()); exit;
	}

	// exits contract generation if contract is already signed.
	if(strtolower($dbQuery->STATUS) == "signed")
    {
        echo "<script>"."alert(\""."Your agreement has already been signed, click ok to exit."."\")"."</script>"; exit;
    }

	// pull deal from crm using the deal id pulled from the e contract table.
	$zohoApi = new ZohoCRMClient("Potentials", $dbQuery->ZOHO_AUTH_ID);

	$deal = $zohoApi->getRecordById($dbQuery->JOB_ID)->request();

	$deal = $deal[1]->getData();

	$error = [];

	//$personalGuarantee = createPersonalGuarantee($_SESSION["customer-info"]);

	$soldEquipment = [
		'Door(s) / Window(s)' => $deal["Door(s) / Window(s)"],
		'Motion(s)'           => $deal["Motion(s)"],
		'Smoke(s)'            => $deal["Smoke(s)"],
		'Glass Break(s)'      => $deal["Glass Break(s)"],
		'Thermostat(s)'       => $deal["Thermostat(s)"],
		'Lock(s)'             => $deal["Lock(s)"],
		'Light(s)'            => $deal["Light(s)"],
		'Indoor Camera(s)'    => $deal["Indoor Camera(s)"],
		'Outdoor Camera(s)'   => $deal["Outdoor Camera(s)"],
		'Sky Bell'            => $deal["Sky Bell"],
		'Other'               => $deal["Other"],
	];

	$equipmentList =  new eContract\ArrayType\ArrayOfEquipmentItem
	(
		addPackage($deal["Package Type"], $deal["Amount"])
	);

	/**
	 * verify that the expiration date is in the correct format mm/yyyy, else log error and return false.
	 * @param string $var
	 * @return bool|mixed
	 */
	function getCreditCardExpiration($expirationDate)
	{
		global $error;
		$date = false;

		if(preg_match("/^\\d{2}\\/\\d{4}\$/", $expirationDate))
		{
			$creditCardExpirationMonthyear = explode('/', $expirationDate);
			$date["month"] = $creditCardExpirationMonthyear[0];
			$date["year"] = $creditCardExpirationMonthyear[1];
		}
		else
		{
			$error[] = "Invalid Credit Card expiration date format. Must be mm/yyyy";
		}

		return $date;
	}

	function getCreditCardType($creditCardNumber)
	{
		global $error;
		$cardType = false;

		if(is_numeric($creditCardNumber))
		{
			if(preg_match("/^4/", $creditCardNumber))
			{
				$cardType = "Visa";
			}
			elseif (preg_match("/^5/", $creditCardNumber))
			{
				$cardType = "MasterCard";
			}
			elseif(preg_match("/^6/", $creditCardNumber))
			{
				$cardType = "Discover";
			}
			elseif(preg_match("/^3/", $creditCardNumber))
			{
				$cardType = "AmericanExpress";
			}
			else
			{
				$error[] = "Invalid Credit Card type. Must be Visa, MasterCard, Discover or AmericanExpress";
			}
		}
		else
		{
			$error[] = "Invalid input for Credit Card number. Must be of type integer";
		}

		return $cardType;
	}

	function insuranceExclusion($state)
	{
		global $contractDocument2;

		if(strtolower($state) == "pa")
		{
			$contractDocument2
				->setInsurancePersonalInjuryAmount(1000000)
				->setInsurancePropertyDamageAmount(1000000);
		}
	}

	function installationWorkDescription($state, $additionalNotes)
	{
		global $contractDocument2;

		$state = strtolower($state);

		if($state == "pa" || $state == "ca")
		{
			$contractDocument2->setInstallationWorkDescription($additionalNotes);
		}
	}

	function getDraftDay($date)
	{
		$date = date_parse($date);
		$day = $date["day"];

		if($day > 28)
		{
			$draftDay = 28;
		}
		else
		{
			$draftDay = $day;
		}

		return $draftDay;
	}

	function getBillStartDate($date)
	{
		$billStartDate = date_create($date);
		date_add($billStartDate, date_interval_create_from_date_string("1 month"));

		return date_format($billStartDate, "Y-m-d");
	}

	function addPackage(string $packageName, string $price)
	{
		$equipmentList[] = new eContract\StructType\EquipmentItem($packageName, "0", $price, "1", $price);

		return $equipmentList;
	}

	function createPersonalGuarantee(array $deal)
	{
		if(strtolower($deal["Residential/Commercial"]) == "commercial")
		{
			$personalGuarantee["required"] = true;
			//$personalGuarantee["title"] = $deal["PG First Name"].' '.$deal["PG Last Name"];
			$personalGuarantee["firstname"] = $deal["PG First Name"];
			$personalGuarantee["lastname"] = $deal["PG Last Name"];
			$personalGuarantee["address1"] = $deal["PG Address1"];
			$personalGuarantee["address2"] = $deal["PG Address2"];
			$personalGuarantee["city"] = $deal["PG City"];
			$personalGuarantee["state"] = ($deal["PG State"]) ? $deal["PG State"] : $deal["PG Province"];
			$personalGuarantee["zip"] = ($deal["PG Zip"]) ? $deal["PG Zip"] : $deal["Postal Code"];
			$personalGuarantee["county"] = $deal["PG County"];
			$personalGuarantee["country"] = $deal["PG Country"];
		}
		else
		{
			$personalGuarantee["required"] = false;
		}

		return $personalGuarantee;
	}

	function setPaymentType($easyPayMethod, array $paymentInfo)
	{
		$paymentType = new eContract\StructType\PaymentItem();
		$easyPayMethod = strtolower($easyPayMethod);

		if($easyPayMethod == "ach")
		{
			$paymentType
				->setBankRoutingNumber($paymentInfo["bank-routing"])
				->setBankAccountNumber($paymentInfo["bank-account"])
				->setPaymentType("BankAccount");
		}
		elseif ($easyPayMethod == "cc")
		{
			$creditCardExpiration = getCreditCardExpiration($paymentInfo["expiration-date"]);

			$paymentType
				->setCreditCardExpireMonth($creditCardExpiration["month"])
				->setCreditCardExpireYear($creditCardExpiration["year"])
				->setCreditCardNumber($paymentInfo["cc-number"])
				->setCreditCardType(getCreditCardType($paymentInfo["cc-number"]))
				->setPaymentType("CreditCard");
		}
		elseif ($easyPayMethod == "inv")
		{
			$paymentType->setPaymentType("Invoice");
		}

		return $paymentType;
	}

	function getAlarmNetwork($alarmNetwork)
    {
        $network["alarmNetwork"] = $alarmNetwork;

        if(strtolower($network["alarmNetwork"]) == "none")
        {
            $network["available"] = false;
        }
        else
        {
            $network["available"] = true;
        }

        return $network;
    }

	function getCountryEnum($country)
	{
		$country = strtolower($country);

		if($country == "usa")
		{
			$country = "US";
		}
		elseif($country == "canada")
		{
			$country = "CA";
		}

		return $country;
	}

	function splitName($fullName)
	{
	    $fullName = explode(" ", $fullName);
	    $name = $fullName;

		if(count($fullName) > 2)
        {
            $name["first"] = $fullName[1];
            $name["last"] = $fullName[2];
        }
        elseif(count($fullName) == 2)
        {
            $name["first"] = $fullName[0];
            $name["last"] = $fullName[1];
        }

        return $name;
	}

	function splitMonths($months)
    {
        $months = explode(" ", $months);

        if(count($months) > 0)
        {
            $months = $months[0];
        }
        else
        {
            $error[] = "Invalid contract term enterd, must be 36 or 60 months.";
        }

        return $months;
    }

	$paymentInitial = setPaymentType
	(
		$deal["Easy Pay Method"],

		[
			'bank-routing'    => $deal["ACH Routing Number"],
			'bank-account'    => $deal["ACH Account"],
			'cc-number'       => $deal["Card Number"],
			'expiration-date' => $deal["Expiration Date"]
		]
	);

	$paymentMonthly = setPaymentType
	(
		$deal["Easy Pay Method"],

		[
			'bank-routing'    => $deal["ACH Routing Number"],
			'bank-account'    => $deal["ACH Account"],
			'cc-number'       => $deal["Card Number"],
			'expiration-date' => $deal["Expiration Date"]
		]
	);

	$contractDocument2 = new eContract\StructType\ContractDocument2();

	$contractDocument2
		->setBillStartDate(getBillStartDate($deal["1st Choice Install Date"]))
		->setBillingAddress1($deal["Address"])
		->setBillingAddress2($deal["Address2"])
		->setBillingCity($deal["City"])
		->setBillingCounty($deal["County"])
		->setBillingState($deal["State"])
		->setBillingZip($deal["Zip"])
		->setCompanyName($deal["Account Name"])
		->setCompanyType($deal["Business Type"])
		->setCountryOfSale(getCountryEnum($deal["Country"]))
		->setCustomerType($deal["Residential/Commercial"])
		->setDealerPassword($dbQuery->MONI_NET_PASSWORD)
		->setDealerRedirectionURL("http://Sable-crm.com/test/contractcallback.php")
		->setDealerUsername($dbQuery->MONI_NET_USER)
		->setDraftDay(getDraftDay($deal["1st Choice Install Date"]))
		->setEquipmentAlarmNetwork(getAlarmNetwork($deal["Alarm Network"])["alarmNetwork"])
		->setEquipmentAlarmNetworkIncluded(getAlarmNetwork($deal["Alarm Network"])["available"])
		->setEquipmentList($equipmentList)
		->setEquipmentSubtotalAmount($deal["Amount"])
		->setEquipmentTotalAmount($deal["Amount"])
		->setInstallationFinish($deal["1st Choice Install Date"])
		->setInstallationStart($deal["1st Choice Install Date"])
		->setLanguage("English")
		->setMonthsPaidUpFront(1)
		->setPaymentCount(splitMonths($deal["Contract Term"]))
		->setPaymentEffectiveDate(date( 'Y-m-d' ))
		->setPaymentExtendedServiceOption(true)
		->setPaymentInitial($paymentInitial)
		->setPaymentMonthly($paymentMonthly)
		->setPaymentMonthlyMonitoringRate($deal["RMR"])
		->setPaymentOneTimeActivationFee($deal["Activation Fee"])
		->setPremiseAddress1($deal["Address"])
		->setPremiseAddress2($deal["Address2"])
		->setPremiseCity($deal["City"])
		->setPremiseCounty($deal["County"])
		->setPremiseState($deal["State"])
		->setPremiseZip($deal["Zip"])
		->setPrimaryEmail($deal["Email"])
		->setPrimaryFirstName(splitName($deal["Contact Name"])["first"])
		->setPrimaryLastName(splitName($deal["Contact Name"])["last"])
		->setPrimaryPassword("TBD")
		->setPrimaryPhone($deal["Contact Phone"])
		->setSurveyCancellingService(true)
		->setSurveyConfirmContractLength(true)
		->setSurveyFamiliarizationPeriod(true)
		->setSurveyHomeowner(true)
		->setSurveyNewConstruction(false)
		->setSurveyUnderContract(false);

	$contractDocument2
		->setFullPriceRMR($deal["RMR"])
        ->setPersonalGuaranteeRequired(createPersonalGuarantee($deal)["required"])
        ->setPGTitle("Mr/Ms")
        ->setPGHomeAdddress1(createPersonalGuarantee($deal)["address1"])
        ->setPGHomeAdddress2(createPersonalGuarantee($deal)["address2"])
        ->setPGHomeCity(createPersonalGuarantee($deal)["city"])
        ->setPGHomeState(createPersonalGuarantee($deal)["state"])
        ->setPGHomeZip(createPersonalGuarantee($deal)["zip"]);

	$createContract2 = new CreateContract2($contractDocument2,"Embedded","None");

	/**
	 * inserts value for InsurancePersonalInjuryAmount & InsurancePropertyDamageAmount, if state = PA.
	 */
	insuranceExclusion($deal["State"]);

	/**
	 * inserts value for InstallationWorkDescription if state = PA or CA
	 */
	installationWorkDescription($deal["State"], $deal["Alarm Notes"]);

	// debug
    mail("ainsley.clarke@guardme.com", "forever contract", json_encode($contractDocument2));

	if(count($error) == 0)
    {
	    if($createService->CreateContract2($createContract2) !== false)
	    {
		    $contract2Response  = $createService->getResult();

		    $result["contractId"] = $contract2Response->getCreateContract2Result()->getResultData();
		    $result["envelopeId"] = $contract2Response->getCreateContract2Result()->getEnvelopeID();
		    $result["signingUrl"] = $contract2Response->getCreateContract2Result()->getSigningURL()->getString_1();

		    if(!is_null($result["signingUrl"]) || !empty($result["signingUrl"]))
		    {
		        $sql = $dbConn->prepare("UPDATE sablrcrm_test.E_CONTRACT_SENT SET E_CONTRACT_SENT.CONTRACT_ID = ?, E_CONTRACT_SENT.ENVELOPE_ID = ? WHERE E_CONTRACT_SENT.EMAIL = ?");

		        try
                {
                    $sql->execute(
                        [
                            $result["contractId"],
                            $result["envelopeId"],
                            $email,
                        ]
                    );
                }
                catch(Exception $e)
                {
                    $error = $e->getMessage();
	                echo "<script>"."alert(\"".$error."\")"."</script>";
                }

//                $zohoApi->updateRecords()
//                    ->addRecord(
//                            [
//                                "Id" => $dbQuery->JOB_ID,
//                                "Moni_Envelope_Id"        => $result["envelopeId"],
//                                "E-Contract ID"           => $result["contractId"],
//                                "E-Contract Signing Link" => $result["signingUrl"],
//                            ]
//                    )
//                    ->triggerWorkflow()
//                    ->request();

			    echo "<script>"."window.location.href=\"".$result["signingUrl"][0]."\""."</script>";
		    }
		    else
		    {
			    echo "<script>"."alert(\"".$result["contractId"]."\")"."</script>";
		    }

	    }
	    else
	    {
		    echo "<script>"."alert(\"".$createService->getLastError()."\")"."</script>";
	    }
    }
    else
    {
	    echo "<script>"."alert(\"".$error."\")"."</script>";
    }