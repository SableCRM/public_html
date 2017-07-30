<?php

session_start();
/**
 * Created by PhpStorm.
 * User: razaman2
 * Date: 4/13/2017
 * Time: 8:47 AM
 */

//production endpoint and user password
//Endpoint: https://mimasweb.monitronics.net/eContractAPI
//Username: econtractapi
//Password: qh0`%Q$:51

//TestEndpoint: https://senti.monitronics.net/eContractAPISIT?wsdl;

require_once '../../eContractApi/vendor/autoload.php';
$options = array(
    \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_URL => 'https://mimasweb.monitronics.net/eContractAPI?wsdl',
    \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_CLASSMAP => ClassMap::get(),
);

$error = array();

$eContractResult = array();

$personalGuarantee = createPersonalGuarantee($_SESSION['customer-info']);

$createService = new \ServiceType\Create($options);

$soldEquipment = array(
    'Door(s) / Window(s)' => $_SESSION['post-variables']['doors-windows'],
    'Motion(s)' => $_SESSION['post-variables']['motions'],
    'Smoke(s)' => $_SESSION['post-variables']['smokes'],
    'Glass Break(s)' => $_SESSION['post-variables']['glass-breaks'],
    'Thermostat(s)' => $_SESSION['post-variables']['thermostats'],
    'Lock(s)' => $_SESSION['post-variables']['locks'],
    'Light(s)' => $_SESSION['post-variables']['lights'],
    'Indoor Camera(s)' => $_SESSION['post-variables']['indoor-cameras'],
    'Outdoor Camera(s)' => $_SESSION['post-variables']['outdoor-cameras'],
    'Sky Bell' => ($_SESSION['post-variables']['sky-bell']),
    'Other' => $_SESSION['post-variables']['other']
);

$equipmentList =  new \ArrayType\ArrayOfEquipmentItem(
    addPackage($_SESSION['post-variables']['package-type'], $_SESSION['post-variables']['amount'])
);

/**
 * verify that the expiration date is in the correct format mm/yyyy, else log error and return false.
 * @param string $var
 * @return bool|mixed
 */
function getCreditCardExpiration($expirationDate)
{
	global $error;

	$date = array();

	if(preg_match('/^\d{2}\/\d{4}$/', $expirationDate))
	{
		$creditCardExpirationMonthyear = explode('/', $expirationDate);
		$date['month'] = $creditCardExpirationMonthyear[0];
		$date['year'] = $creditCardExpirationMonthyear[1];
	}
	else
	{
		$error[] = "Invalid Credit Card expiration date format. Must be mm/yyyy";
		$date = false;
	}

	return $date;
}

function getCreditCardType($creditCardNumber)
{
	global $error;

	$cardType = false;

    if(is_numeric($creditCardNumber))
    {
        if(preg_match('/^4/', $creditCardNumber))
        {
            $cardType = "Visa";
        }
        elseif (preg_match('/^5/', $creditCardNumber))
        {
            $cardType = "MasterCard";
        }
        elseif(preg_match('/^6/', $creditCardNumber))
        {
            $cardType = "Discover";
        }
        elseif(preg_match('/^3/', $creditCardNumber))
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

function alarmNetworkIncluded($var)
{
    if(strtolower($var) == "none")
    {
        return false;
    }
    else
    {
        return true;
    }
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
    date_add($billStartDate, date_interval_create_from_date_string('1 month'));

    return date_format($billStartDate, 'Y-m-d');
}

function addPackage(string $packageName, string $price)
{
    $equipmentList = [];
    $equipmentList[] = new \StructType\EquipmentItem($packageName, '0', $price, '1', $price);

    return $equipmentList;
}

function createPersonalGuarantee(array $customerInfo)
{
    global $personalGuarantee;

    if(strtolower($customerInfo['property-type']) == "commercial")
    {
        $personalGuarantee['required'] = true;
        $personalGuarantee['title'] = $customerInfo['pg-fname'].' '.$customerInfo['pg-lname'];
        $personalGuarantee['address1'] = $customerInfo['pg-address1'];
        $personalGuarantee['address2'] = $customerInfo['pg-address2'];
        $personalGuarantee['city'] = $customerInfo['pg-city'];
        $personalGuarantee['state'] = $customerInfo['pg-state'];
        //$personalGuarantee['province'] = customerInfo[]';
        $personalGuarantee['zip'] = $customerInfo['pg-zip'];
        //$personalGuarantee['postal-code'] = customerInfo[]';
        $personalGuarantee['county'] = $customerInfo['pg-county'];
        $personalGuarantee['country'] = $customerInfo['pg-country'];
    }
    else
    {
        $personalGuarantee['required'] = false;
    }

	return $personalGuarantee;
}

function setPaymentType($easyPayMethod, array $paymentInfo)
{
	$paymentType = new \StructType\PaymentItem();

    $easyPayMethod = strtolower($easyPayMethod);
    if($easyPayMethod == "ach")
    {
        $paymentType
            ->setBankRoutingNumber($paymentInfo['bank-routing'])
            ->setBankAccountNumber($paymentInfo['bank-account'])
            ->setPaymentType("BankAccount");
    }
    elseif ($easyPayMethod == "cc")
    {
        $creditCardExpiration = getCreditCardExpiration($paymentInfo['expiration-date']);
        $paymentType
            ->setCreditCardExpireMonth($creditCardExpiration['month'])
            ->setCreditCardExpireYear($creditCardExpiration['year'])
            ->setCreditCardNumber($paymentInfo['cc-number'])
            ->setCreditCardType(getCreditCardType($paymentInfo['cc-number']))
            ->setPaymentType("CreditCard");
    }
    elseif ($easyPayMethod == "inv")
    {
        $paymentType->setPaymentType('Invoice');
    }

    return $paymentType;
}

$paymentInitial = setPaymentType
(
    $_SESSION['post-variables']['easy-pay-method'],
    [
        'bank-routing' => $_SESSION['post-variables']['ach-routing-number'],
        'bank-account' => $_SESSION['post-variables']['ach-account'],
        'cc-number' => $_SESSION['post-variables']['card-number'],
        'expiration-date' => $_SESSION['post-variables']['expiration']
    ]
);

$paymentMonthly = setPaymentType
(
    $_SESSION['post-variables']['easy-pay-method'],
    [
        'bank-routing' => $_SESSION['post-variables']['ach-routing-number'],
        'bank-account' => $_SESSION['post-variables']['ach-account'],
        'cc-number' => $_SESSION['post-variables']['card-number'],
        'expiration-date' => $_SESSION['post-variables']['expiration']
    ]
);

$contractDocument2 = new \StructType\ContractDocument2();

$contractDocument2
    ->setBillStartDate(getBillStartDate($_SESSION['post-variables']['first-choice-date']))
    ->setBillingAddress1($_SESSION['customer-info']['address1'])
    ->setBillingAddress2($_SESSION['customer-info']['address2'])
    ->setBillingCity($_SESSION['customer-info']['city'])
    ->setBillingCounty($_SESSION['customer-info']['county'])
    ->setBillingState($_SESSION['customer-info']['state'])
    ->setBillingZip($_SESSION['customer-info']['zip'])
    ->setCompanyName($_SESSION['customer-info']['company-name'])
    ->setCompanyType($_SESSION['customer-info']['company-type'])
    ->setCountryOfSale($_SESSION['customer-info']['country'])
    ->setCustomerType($_SESSION['customer-info']['property-type'])
    ->setDealerPassword($_SESSION["user"]->MONI_NET_PASSWORD)
    ->setDealerRedirectionURL("http://Sable-crm.com/test/contractcallback.php")
    ->setDealerUsername($_SESSION["user"]->MONI_NET_USER)
    ->setDraftDay(getDraftDay($_SESSION['post-variables']['first-choice-date']))
    ->setEquipmentAlarmNetwork($_SESSION['post-variables']['communication-type'])
    ->setEquipmentAlarmNetworkIncluded(alarmNetworkIncluded($_SESSION['post-variables']['communication-type']))
    ->setEquipmentList($equipmentList)
    ->setEquipmentSubtotalAmount($_SESSION['post-variables']['amount'])
    ->setEquipmentTotalAmount($_SESSION['post-variables']['amount'])
    ->setInstallationFinish($_SESSION['post-variables']['first-choice-date'])
    ->setInstallationStart($_SESSION['post-variables']['first-choice-date'])
    ->setLanguage("English")
    ->setMonthsPaidUpFront(1)
    ->setPaymentCount($_SESSION['post-variables']['contract-term'])
    ->setPaymentEffectiveDate(date( 'Y-m-d' ))
    ->setPaymentExtendedServiceOption(true)
    ->setPaymentInitial($paymentInitial)
    ->setPaymentMonthly($paymentMonthly)
    ->setPaymentMonthlyMonitoringRate($_SESSION['post-variables']['rmr'])
    ->setPaymentOneTimeActivationFee($_SESSION['post-variables']['activation-fee'])
    ->setPremiseAddress1($_SESSION['customer-info']['address1'])
    ->setPremiseAddress2($_SESSION['customer-info']['address2'])
    ->setPremiseCity($_SESSION['customer-info']['city'])
    ->setPremiseCounty($_SESSION['customer-info']['county'])
    ->setPremiseState($_SESSION['customer-info']['state'])
    ->setPremiseZip($_SESSION['customer-info']['zip'])
    ->setPrimaryEmail($_SESSION['customer-info']['email'])
    ->setPrimaryFirstName($_SESSION['customer-info']['fname'])
    ->setPrimaryLastName($_SESSION['customer-info']['lname'])
    ->setPrimaryPassword("TBD")
    ->setPrimaryPhone($_SESSION['customer-info']['phone'])
    ->setSurveyCancellingService(true)
    ->setSurveyConfirmContractLength(true)
    ->setSurveyFamiliarizationPeriod(true)
    ->setSurveyHomeowner(true)
    ->setSurveyNewConstruction(false)
    ->setSurveyUnderContract(false);

$contractDocument2
//    ->setFullPriceRMR($_SESSION['post-variables']['rmr'])
//    ->setPGHomeAdddress1("22 test street")//$personalGuarantee['address1'])
//    ->setPGHomeAdddress2("first flr")//$personalGuarantee['address2'])
//    ->setPGHomeCity("elmwood park")//$personalGuarantee['city'])
//    ->setPGHomeState("NY")//$personalGuarantee['state'])
//    ->setPGHomeZip("11042")//$personalGuarantee['zip'])
//    ->setPGTitle("Garey Watson")//$personalGuarantee['title'])
//    ->setPersonalGuaranteeRequired(true);//$personalGuarantee['required']);

	->setFullPriceRMR($_SESSION["post-variables"]["rmr"])
	->setPGHomeAdddress1($personalGuarantee["address1"])
	->setPGHomeAdddress2($personalGuarantee["address2"])
	->setPGHomeCity($personalGuarantee["city"])
	->setPGHomeState($personalGuarantee["state"])
	->setPGHomeZip($personalGuarantee["zip"])
	->setPGTitle($personalGuarantee["title"])
	->setPersonalGuaranteeRequired($personalGuarantee["required"]);

$createContract2 = new \StructType\CreateContract2
(
    $contractDocument2,
    "Embedded",
    "None"
);

if(count($error) == 0)
{
    /**
     * inserts value for InsurancePersonalInjuryAmount & InsurancePropertyDamageAmount, if state = PA.
     */
    insuranceExclusion($_SESSION["customer-info"]["state"]);

    /**
     * inserts value for InstallationWorkDescription if state = PA or CA
     */
    installationWorkDescription($_SESSION["customer-info"]["state"], $_SESSION["post-variables"]["additional-notes"]);

    if ($createService->CreateContract2($createContract2) !== false)
    {
        $contract2Response = $createService->getResult();
        $eContractResult["contract-id"] = $contract2Response->getCreateContract2Result()->getResultData();
        $eContractResult["envelope-id"] = $contract2Response->getCreateContract2Result()->getEnvelopeID();
        $eContractResult["signing-urls"] = $contract2Response->getCreateContract2Result()->getSigningURL()->string;
        //print_r($eContractResult);
        //print_r($createContract2);
        //print_r($_SESSION["user"]);
    }
    else
    {
        $error["create-contract"] = $createService->getLastError();
    }
}