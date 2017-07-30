<?php
/**
 * Created by PhpStorm.
 * User: razaman2
 * Date: 4/10/2017
 * Time: 10:05 AM
 */
//'https://senti.monitronics.net/eContractAPISIT?wsdl'

date_default_timezone_set('America/Los_Angeles');
require_once '../../eContractApi/vendor/autoload.php';
$options = array(
    \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_URL => 'https://mimasweb.monitronics.net/eContractAPI?wsdl',
    \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_CLASSMAP => ClassMap::get(),

);

$createService = new \ServiceType\Create($options);

$contactList = new \ArrayType\ArrayOfContactItem(

    array(

        new \StructType\ContactItem(

            '123',
            'My Friend',
            'shhhh',
            '(732) 425-2814',
            'Home',
            '5446'
        )
    )
);

$equipmentList =  new \ArrayType\ArrayOfEquipmentItem(

    array(

        new \StructType\EquipmentItem(

            'Door Sensors',
            '5',
            '30.00',
            '5',
            '150.00'
        ),
        new \StructType\EquipmentItem(

            'Window Sensors',
            '5',
            '30.00',
            '2',
            '60.00'
        ),
        new \StructType\EquipmentItem(

            'Motion Detector',
            '5',
            '60.00',
            '3',
            '180.00'
        )
    )
);

$paymentInitial = new \StructType\PaymentItem(

    '102001017',
    '102001017',
    '55555',
    '333',
    02,
    2018,
    '4111111111111111',
    'Visa',
    'BankAccount'
);

$paymentMonthly = new \StructType\PaymentItem(

    '102001017',
    '102001017',
    '55555',
    '333',
    02,
    2018,
    '4111111111111111',
    'Visa',
    'BankAccount'
);

$contractDocument2 = new \StructType\ContractDocument2();

$contractDocument2
    ->setBillStartDate("2017-06-03")
    ->setBillingAddress1("602 East 24th Street")
    ->setBillingAddress2("First Flr")
    ->setBillingCity("Paterson")
    ->setBillingCounty("Passaic")
    ->setBillingState("NJ")
    ->setBillingZip("07514")
    ->setCompanyName("accessories +")
    ->setCompanyType("Corporation")
    ->setContactList($contactList)
    ->setContractID(null)
    ->setCountryOfSale("US")
    ->setCustomerType("Commercial")
    ->setDealerPassword("31Stamas!")
    //->setDealerPersonID("805450004")
    ->setDealerRedirectionURL("http://sable-crm.com/test/contractcallback.php")
    ->setDealerUsername("guardme")
    ->setDraftDay(21)
    ->setEnvelopeID("")
    ->setEquipmentAlarmNetwork("AlarmDotcom")
    ->setEquipmentAlarmNetworkIncluded(true)
    ->setEquipmentList($equipmentList)
    ->setEquipmentOtherAmount(5.00)
    ->setEquipmentPermitAmount(5.00)
    ->setEquipmentSubtotalAmount(390.00)
    ->setEquipmentTaxAmount(5.00)
    ->setEquipmentTotalAmount(405.00)
    ->setGuardAddendumRequired(false)
    ->setInstallationDate("2017-05-03")
    ->setInstallationFinish("2017-05-03")
    ->setInstallationStart("2017-05-03")
    //->setInstallationWorkDescription("Install basic alarm system")
    //->setInsurancePersonalInjuryAmount()
    //->setInsurancePropertyDamageAmount()
    ->setLanguage("English")
    ->setMonthsPaidUpFront(1)
    ->setPaymentCount(42)
    ->setPaymentEffectiveDate("2017-05-30")
    ->setPaymentExtendedServiceOption(true)
    ->setPaymentInitial($paymentInitial)
    ->setPaymentMonthly($paymentMonthly)
    ->setPaymentMonthlyMonitoringRate(25.00)
    ->setPaymentOneTimeActivationFee(99.00)
    ->setPremiseAddress1("953 Main Street")
    ->setPremiseAddress2("Apt 15")
    ->setPremiseCity("Hackensack")
    ->setPremiseCounty("Bergen")
    ->setPremiseGateCode("")
    ->setPremiseState("NJ")
    ->setPremiseZip("07601")
    ->setPrimaryBirthDate("07/14/1983")
    ->setPrimaryEmail("ainsley.clarke@guardme.com")
    ->setPrimaryFirstName("Ainsley")
    ->setPrimaryLastName("Clarke")
    ->setPrimaryPassword("$@B!3crm")
    ->setPrimaryPhone("(201) 982-8191")
    ->setPrimaryTaxIDNumber("")
    ->setPromotionPeriod(0)
    ->setSecondaryBirthDate("")
    ->setSecondaryEmail("")
    ->setSecondaryFirstName("")
    ->setSecondaryLastName("")
    ->setSecondaryPhone("")
    ->setSecondaryTaxIDNumber("")
    ->setSurveyCancellingService(true)
    ->setSurveyConfirmContractLength(true)
    ->setSurveyFamiliarizationPeriod(true)
    ->setSurveyHomeowner(true)
    ->setSurveyNewConstruction(true)
    ->setSurveyUnderContract(true);

$contractDocument2
    ->setDiscountAmount(0)
    ->setDiscountMemberID("0")
    ->setDiscountName("")
    ->setDiscountProgramID("0")
    ->setFullPriceRMR(25.00)
    ->setPGHomeAdddress1("602 East 24th Street")
    ->setPGHomeAdddress2("First Flr")
    ->setPGHomeCity("Paterson")
    ->setPGHomeState("NJ")
    ->setPGHomeZip("80121")
    ->setPGTitle("Ainsley Clarke")
    ->setPersonalGuaranteeRequired(true)
    ->setSigningLocation("")
    ->setSourceIPAddress("");

$createContract2 = new \StructType\CreateContract2(
    $contractDocument2,
    'Embedded',
    'None'
);

if ($createService->CreateContract2($createContract2) !== false){

    $contract2Response = $createService->getResult();
    $result_data = $contract2Response->getCreateContract2Result()->getResultData();
    $envelope_id = $contract2Response->getCreateContract2Result()->getEnvelopeID();
    $SigningURL = $contract2Response->getCreateContract2Result()->getSigningURL()->string;

    if(mail('ainsley.clarke@guardme.com', 'GuardMeAgreement', $SigningURL[0])){

        echo "Contract ID: ".$result_data.'<br/>';
        echo "Envelope ID: ".$envelope_id.'<br/>';
        print_r($SigningURL);

    } else {

        echo '<h1>UNABLE TO SEND AGREEMENT EMAIL TO CLIENT</h1>';
    }

} else {

    echo '<pre>';
    print_r($createService->getLastError());
    echo '</pre>';
}