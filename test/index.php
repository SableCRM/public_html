<?php
//date_default_timezone_set('America/Los_Angeles');
//require_once '../../eContractApi/vendor/autoload.php';
//$options = array(
//    \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_URL => 'https://mimasweb.monitronics.net/eContractAPI?wsdl',
//    \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_CLASSMAP => ClassMap::get(),
//
//);
//
//
///*
//$authenticate = new \ServiceType\Authenticate($options);
//$user_login = "Monitest";
//$user_password = "password";
//$authenticateUser2 = new \StructType\AuthenticateUser2($user_login,$user_password);
//$authenticate->AuthenticateUser2($authenticateUser2);
//if ($authenticate->AuthenticateUser2($authenticateUser2) !== false)
//{
//     print_r($authenticate->getResult());
//}
//else
//{
//    print_r($authenticate->getLastError());
//}
//
//exit;
//*/
//$createService = new \ServiceType\Create($options);
//$contractDocument2 = new \StructType\ContractDocument2();
//$contactItem = new \StructType\ContactItem();
//$contactItem_ext = "123";
//$contactItem_name = "My Friend";
//$contactItem_password = "shhhh";
//$contactItem_phone = "(573) 999-1722";
//$contactItem_phoneType = "Home";
//$contactItem_userNumber = "1234567890";
//$contactItem
//    ->setExt($contactItem_ext)
//    ->setName($contactItem_name)
//    ->setPassword($contactItem_password)
//    ->setPhone($contactItem_phone)
//    ->setPhoneType($contactItem_phoneType)
//    ->setUserNumber($contactItem_userNumber);
//
//$contactList = new \ArrayType\ArrayOfContactItem();
//$contactList->setContactItem(array($contactItem));
//$billStartDate = "2018-03-01";
//$billingAddress1 = "602 East 24th Street";
//$billingAddress2 = "First Flr";
//$billingCity = "Paterson";
//$billingCounty = "Passaic";
//$billingState = "NJ";
//$billingZip = "07514";
//$companyName = "Sable+";
//$companyType = "Corporation";
//
//$equipmentList =  new \ArrayType\ArrayOfEquipmentItem();
//$equipmentItem1 = new \StructType\EquipmentItem();
//$equipmentItem1_name = "Door Sensors";
//$equipmentItem1_points = "5";
//$equipmentItem1_price = "30.00";
//$equipmentItem1_quantity = "5";
//$equipmentItem1_total = "150.00";
//$equipmentItem1
//    ->setName($equipmentItem1_name)
//    ->setPoints($equipmentItem1_points)
//    ->setPrice($equipmentItem1_price)
//    ->setQuantity($equipmentItem1_quantity)
//    ->setTotal($equipmentItem1_total);
//
//$equipmentItem2 = new \StructType\EquipmentItem();
//$equipmentItem2_name = "Window Sensors";
//$equipmentItem2_points = "5";
//$equipmentItem2_price = "30.00";
//$equipmentItem2_quantity = "2";
//$equipmentItem2_total = "60.00";
//$equipmentItem2
//    ->setName($equipmentItem2_name)
//    ->setPoints($equipmentItem2_points)
//    ->setPrice($equipmentItem2_price)
//    ->setQuantity($equipmentItem2_quantity)
//    ->setTotal($equipmentItem2_total);
//
//$equipmentItem3 = new \StructType\EquipmentItem();
//$equipmentItem3_name = "Motion Detector";
//$equipmentItem3_points = "5";
//$equipmentItem3_price = "60.00";
//$equipmentItem3_quantity = "3";
//$equipmentItem3_total = "180.00";
//$equipmentItem3
//    ->setName($equipmentItem3_name)
//    ->setPoints($equipmentItem3_points)
//    ->setPrice($equipmentItem3_price)
//    ->setQuantity($equipmentItem3_quantity)
//    ->setTotal($equipmentItem3_total);
//
//$equipmentList->setEquipmentItem(array($equipmentItem1, $equipmentItem2, $equipmentItem3));
//
//
//$paymentInitial = new \StructType\PaymentItem();
//
//$bankAccountNumber = "102001017";
//$bankRoutingNumber = "102001017";
//$canadaRoutingBranch = "55555";
//$canadaRoutingInstitution = "333";
//$creditCardExpireMonth = 02;
//$creditCardExpireYear = 2018;
//$creditCardNumber = "4111111111111111";
//$creditCardType = "Visa";
//$paymentType = "BankAccount";
//
//
//$paymentInitial
//->setBankAccountNumber($bankAccountNumber)
//->setBankRoutingNumber($bankRoutingNumber)
//->setCanadaRoutingBranch($canadaRoutingBranch)
//->setCanadaRoutingInstitution($canadaRoutingInstitution)
//->setCreditCardExpireMonth($creditCardExpireMonth)
//->setCreditCardExpireYear($creditCardExpireYear)
//->setCreditCardNumber($creditCardNumber)
//->setCreditCardType($creditCardType)
//->setPaymentType($paymentType);
//
//
//$paymentMonthly = new \StructType\PaymentItem();
//
//$monthly_bankAccountNumber = "102001017";
//$monthly_bankRoutingNumber = "102001017";
//$monthly_canadaRoutingBranch = "55555";
//$monthly_canadaRoutingInstitution = "333";
//$monthly_creditCardExpireMonth = 02;
//$monthly_creditCardExpireYear = 2018;
//$monthly_creditCardNumber = "4111111111111111";
//$monthly_creditCardType = "Visa";
//$monthly_paymentType = "BankAccount";
//
//$paymentMonthly
//->setBankAccountNumber($monthly_bankAccountNumber)
//->setBankRoutingNumber($monthly_bankRoutingNumber)
//->setCanadaRoutingBranch($monthly_canadaRoutingBranch)
//->setCanadaRoutingInstitution($monthly_canadaRoutingInstitution)
//->setCreditCardExpireMonth($monthly_creditCardExpireMonth)
//->setCreditCardExpireYear($monthly_creditCardExpireYear)
//->setCreditCardNumber($monthly_creditCardNumber)
//->setCreditCardType($monthly_creditCardType)
//->setPaymentType($monthly_paymentType);
//
//
//
//$contractID = null;
//$countryOfSale = "US";
//$customerType = "Commercial";
//$dealerPassword = "31Stamas!";
//$dealerPersonID = "805450004";
//$dealerRedirectionURL = "http://sable-crm.com/test/contractcallback.php";
//$dealerUsername = "guardme";
//$draftDay = 21;
//$envelopeID = "";
//$equipmentAlarmNetwork = "AlarmDotcom";
//$equipmentAlarmNetworkIncluded = true;
//$equipmentOtherAmount = 5.00;
//$equipmentPermitAmount = 5.00;
//$equipmentSubtotalAmount = 5.00;
//$equipmentTaxAmount = 5.00;
//$equipmentTotalAmount = 5.00;
//$guardAddendumRequired = false;
//$installationDate = "2017-05-03";
//$installationFinish = "2017-05-03";
//$installationStart = "2017-05-03";
//$installationWorkDescription = "This is needed for CA";
//$insurancePersonalInjuryAmount = 60000;
//$insurancePropertyDamageAmount = 60000;
//$language = "English";
//$monthsPaidUpFront = 1;
//$paymentCount = 42;
//$paymentEffectiveDate = "2017-05-30";
//$paymentExtendedServiceOption = true;
//$paymentMonthlyMonitoringRate = 25.00;
//$paymentOneTimeActivationFee = 25.00;
//$premiseAddress1 = "953 Main Street";
//$premiseAddress2 = "Apt 25";
//$premiseCity = "Hackensack";
//$premiseCounty = "Bergen";
//$premiseGateCode = "";
//$premiseState = "NJ";
//$premiseZip = "07601";
//$primaryBirthDate = "07/14/1983";
//$primaryEmail = "ainsley.clarke@guardme.com";
//$primaryFirstName = "SABLE";
//$primaryLastName = "CRM";
//$primaryPassword = "Music";
//$primaryPhone = "(732) 425-2814";
//$primaryTaxIDNumber = "";
//$promotionPeriod = 0;
//$secondaryBirthDate = "";
//$secondaryEmail = "";
//$secondaryFirstName = "";
//$secondaryLastName = "";
//$secondaryPhone = "";
//$secondaryTaxIDNumber = "";
//$surveyCancellingService = true;
//$surveyConfirmContractLength = true;
//$surveyFamiliarizationPeriod = true;
//$surveyHomeowner = true;
//$surveyNewConstruction = true;
//$surveyUnderContract = true;
//
//
//$contractDocument2
//			->setBillStartDate($billStartDate)
//            ->setBillingAddress1($billingAddress1)
//            ->setBillingAddress2($billingAddress2)
//            ->setBillingCity($billingCity)
//            ->setBillingCounty($billingCounty)
//            ->setBillingState($billingState)
//            ->setBillingZip($billingZip)
//            ->setCompanyName($companyName)
//            ->setCompanyType($companyType)
//            ->setContactList($contactList)
//            ->setContractID($contractID)
//            ->setCountryOfSale($countryOfSale)
//            ->setCustomerType($customerType)
//            ->setDealerPassword($dealerPassword)
//            ->setDealerPersonID($dealerPersonID)
//            ->setDealerRedirectionURL($dealerRedirectionURL)
//            ->setDealerUsername($dealerUsername)
//            ->setDraftDay($draftDay)
//            ->setEnvelopeID($envelopeID)
//            ->setEquipmentAlarmNetwork($equipmentAlarmNetwork)
//            ->setEquipmentAlarmNetworkIncluded($equipmentAlarmNetworkIncluded)
//            ->setEquipmentList($equipmentList)
//            ->setEquipmentOtherAmount($equipmentOtherAmount)
//            ->setEquipmentPermitAmount($equipmentPermitAmount)
//            ->setEquipmentSubtotalAmount($equipmentSubtotalAmount)
//            ->setEquipmentTaxAmount($equipmentTaxAmount)
//            ->setEquipmentTotalAmount($equipmentTotalAmount)
//            ->setGuardAddendumRequired($guardAddendumRequired)
//            ->setInstallationDate($installationDate)
//            ->setInstallationFinish($installationFinish)
//            ->setInstallationStart($installationStart)
//            ->setInstallationWorkDescription($installationWorkDescription)
//            ->setInsurancePersonalInjuryAmount($insurancePersonalInjuryAmount)
//            ->setInsurancePropertyDamageAmount($insurancePropertyDamageAmount)
//            ->setLanguage($language)
//            ->setMonthsPaidUpFront($monthsPaidUpFront)
//            ->setPaymentCount($paymentCount)
//            ->setPaymentEffectiveDate($paymentEffectiveDate)
//            ->setPaymentExtendedServiceOption($paymentExtendedServiceOption)
//            ->setPaymentInitial($paymentInitial)
//            ->setPaymentMonthly($paymentMonthly)
//            ->setPaymentMonthlyMonitoringRate($paymentMonthlyMonitoringRate)
//            ->setPaymentOneTimeActivationFee($paymentOneTimeActivationFee)
//            ->setPremiseAddress1($premiseAddress1)
//            ->setPremiseAddress2($premiseAddress2)
//            ->setPremiseCity($premiseCity)
//            ->setPremiseCounty($premiseCounty)
//            ->setPremiseGateCode($premiseGateCode)
//            ->setPremiseState($premiseState)
//            ->setPremiseZip($premiseZip)
//            ->setPrimaryBirthDate($primaryBirthDate)
//            ->setPrimaryEmail($primaryEmail)
//            ->setPrimaryFirstName($primaryFirstName)
//            ->setPrimaryLastName($primaryLastName)
//            ->setPrimaryPassword($primaryPassword)
//            ->setPrimaryPhone($primaryPhone)
//            ->setPrimaryTaxIDNumber($primaryTaxIDNumber)
//            ->setPromotionPeriod($promotionPeriod)
//            ->setSecondaryBirthDate($secondaryBirthDate)
//            ->setSecondaryEmail($secondaryEmail)
//            ->setSecondaryFirstName($secondaryFirstName)
//            ->setSecondaryLastName($secondaryLastName)
//            ->setSecondaryPhone($secondaryPhone)
//            ->setSecondaryTaxIDNumber($secondaryTaxIDNumber)
//            ->setSurveyCancellingService($surveyCancellingService)
//            ->setSurveyConfirmContractLength($surveyConfirmContractLength)
//            ->setSurveyFamiliarizationPeriod($surveyFamiliarizationPeriod)
//            ->setSurveyHomeowner($surveyHomeowner)
//            ->setSurveyNewConstruction($surveyNewConstruction)
//            ->setSurveyUnderContract($surveyUnderContract);
//
//
//
//
//$discountAmount = 0;
//$discountMemberID = '0';
//$discountName = "";
//$discountProgramID = '0';
//$fullPriceRMR = 25.00;
//$pGHomeAdddress1 ="PG home Address 1";
//$pGHomeAdddress2 ="PG home Address 2";
//$pGHomeCity = "PG Home City";
//$pGHomeState = "CO";
//$pGHomeZip = '80121';
//$pGTitle = "Great Testing";
//$personalGuaranteeRequired = true;
//$signingLocation = "";
//$sourceIPAddress = "";
//
//$contractDocument2
//	->setDiscountAmount($discountAmount)
//	->setDiscountMemberID($discountMemberID)
//	->setDiscountName($discountName)
//	->setDiscountProgramID($discountProgramID)
//	->setFullPriceRMR($fullPriceRMR)
//	->setPGHomeAdddress1($pGHomeAdddress1)
//	->setPGHomeAdddress2($pGHomeAdddress2)
//	->setPGHomeCity($pGHomeCity)
//	->setPGHomeState($pGHomeState)
//	->setPGHomeZip($pGHomeZip)
//	->setPGTitle($pGTitle)
//	->setPersonalGuaranteeRequired($personalGuaranteeRequired)
//	->setSigningLocation($signingLocation)
//	->setSourceIPAddress($sourceIPAddress);
//
//
//
//$createContract2 = new \StructType\CreateContract2($contractDocument2,'Embedded','None');
//if ($createService->CreateContract2($createContract2) !== false)
//{
//    $contract2Response  = $createService->getResult();
//    var_dump($contract2Response->getCreateContract2Result());
//    $envelope_id = $contract2Response->getCreateContract2Result()->getEnvelopeID();
//    $SigningURL = $contract2Response->getCreateContract2Result()->getSigningURL()->getString_1();
//   // echo "Envelope ID:".$envelope_id.'<br/>';
//   // echo "SigningURL:".$SigningURL[0].'<br/>';
//}
//else
//{
//    print_r($createService->getLastError());
//}
//
//

print_r($_SERVER);