<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for ContractDocument StructType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:ContractDocument
 * @subpackage Structs
 */
class ContractDocument extends AbstractStructBase
{
    /**
     * The BillStartDate
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $BillStartDate;
    /**
     * The BillingAddress1
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $BillingAddress1;
    /**
     * The BillingAddress2
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $BillingAddress2;
    /**
     * The BillingCity
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $BillingCity;
    /**
     * The BillingCounty
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $BillingCounty;
    /**
     * The BillingState
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $BillingState;
    /**
     * The BillingZip
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $BillingZip;
    /**
     * The CompanyName
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $CompanyName;
    /**
     * The CompanyType
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $CompanyType;
    /**
     * The ContactList
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \ArrayType\ArrayOfContactItem
     */
    public $ContactList;
    /**
     * The ContractID
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var int
     */
    public $ContractID;
    /**
     * The CountryOfSale
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $CountryOfSale;
    /**
     * The CustomerType
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $CustomerType;
    /**
     * The DealerPassword
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $DealerPassword;
    /**
     * The DealerPersonID
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $DealerPersonID;
    /**
     * The DealerRedirectionURL
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $DealerRedirectionURL;
    /**
     * The DealerUsername
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $DealerUsername;
    /**
     * The DraftDay
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var int
     */
    public $DraftDay;
    /**
     * The EnvelopeID
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $EnvelopeID;
    /**
     * The EquipmentAlarmNetwork
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $EquipmentAlarmNetwork;
    /**
     * The EquipmentAlarmNetworkIncluded
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var bool
     */
    public $EquipmentAlarmNetworkIncluded;
    /**
     * The EquipmentList
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \ArrayType\ArrayOfEquipmentItem
     */
    public $EquipmentList;
    /**
     * The EquipmentOtherAmount
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var float
     */
    public $EquipmentOtherAmount;
    /**
     * The EquipmentPermitAmount
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var float
     */
    public $EquipmentPermitAmount;
    /**
     * The EquipmentSubtotalAmount
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var float
     */
    public $EquipmentSubtotalAmount;
    /**
     * The EquipmentTaxAmount
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var float
     */
    public $EquipmentTaxAmount;
    /**
     * The EquipmentTotalAmount
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var float
     */
    public $EquipmentTotalAmount;
    /**
     * The GuardAddendumRequired
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var bool
     */
    public $GuardAddendumRequired;
    /**
     * The InstallationDate
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $InstallationDate;
    /**
     * The InstallationFinish
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $InstallationFinish;
    /**
     * The InstallationStart
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $InstallationStart;
    /**
     * The InstallationWorkDescription
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $InstallationWorkDescription;
    /**
     * The InsurancePersonalInjuryAmount
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var float
     */
    public $InsurancePersonalInjuryAmount;
    /**
     * The InsurancePropertyDamageAmount
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var float
     */
    public $InsurancePropertyDamageAmount;
    /**
     * The Language
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $Language;
    /**
     * The MonthsPaidUpFront
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var int
     */
    public $MonthsPaidUpFront;
    /**
     * The PaymentCount
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var int
     */
    public $PaymentCount;
    /**
     * The PaymentEffectiveDate
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $PaymentEffectiveDate;
    /**
     * The PaymentExtendedServiceOption
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var bool
     */
    public $PaymentExtendedServiceOption;
    /**
     * The PaymentInitial
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \StructType\PaymentItem
     */
    public $PaymentInitial;
    /**
     * The PaymentMonthly
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \StructType\PaymentItem
     */
    public $PaymentMonthly;
    /**
     * The PaymentMonthlyMonitoringRate
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var float
     */
    public $PaymentMonthlyMonitoringRate;
    /**
     * The PaymentOneTimeActivationFee
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var float
     */
    public $PaymentOneTimeActivationFee;
    /**
     * The PremiseAddress1
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $PremiseAddress1;
    /**
     * The PremiseAddress2
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $PremiseAddress2;
    /**
     * The PremiseCity
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $PremiseCity;
    /**
     * The PremiseCounty
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $PremiseCounty;
    /**
     * The PremiseGateCode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $PremiseGateCode;
    /**
     * The PremiseState
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $PremiseState;
    /**
     * The PremiseZip
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $PremiseZip;
    /**
     * The PrimaryBirthDate
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $PrimaryBirthDate;
    /**
     * The PrimaryEmail
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $PrimaryEmail;
    /**
     * The PrimaryFirstName
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $PrimaryFirstName;
    /**
     * The PrimaryLastName
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $PrimaryLastName;
    /**
     * The PrimaryPassword
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $PrimaryPassword;
    /**
     * The PrimaryPhone
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $PrimaryPhone;
    /**
     * The PrimaryTaxIDNumber
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $PrimaryTaxIDNumber;
    /**
     * The PromotionPeriod
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var int
     */
    public $PromotionPeriod;
    /**
     * The SecondaryBirthDate
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $SecondaryBirthDate;
    /**
     * The SecondaryEmail
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $SecondaryEmail;
    /**
     * The SecondaryFirstName
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $SecondaryFirstName;
    /**
     * The SecondaryLastName
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $SecondaryLastName;
    /**
     * The SecondaryPhone
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $SecondaryPhone;
    /**
     * The SecondaryTaxIDNumber
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $SecondaryTaxIDNumber;
    /**
     * The SurveyCancellingService
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var bool
     */
    public $SurveyCancellingService;
    /**
     * The SurveyConfirmContractLength
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var bool
     */
    public $SurveyConfirmContractLength;
    /**
     * The SurveyFamiliarizationPeriod
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var bool
     */
    public $SurveyFamiliarizationPeriod;
    /**
     * The SurveyHomeowner
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var bool
     */
    public $SurveyHomeowner;
    /**
     * The SurveyNewConstruction
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var bool
     */
    public $SurveyNewConstruction;
    /**
     * The SurveyUnderContract
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var bool
     */
    public $SurveyUnderContract;
    /**
     * Constructor method for ContractDocument
     * @uses ContractDocument::setBillStartDate()
     * @uses ContractDocument::setBillingAddress1()
     * @uses ContractDocument::setBillingAddress2()
     * @uses ContractDocument::setBillingCity()
     * @uses ContractDocument::setBillingCounty()
     * @uses ContractDocument::setBillingState()
     * @uses ContractDocument::setBillingZip()
     * @uses ContractDocument::setCompanyName()
     * @uses ContractDocument::setCompanyType()
     * @uses ContractDocument::setContactList()
     * @uses ContractDocument::setContractID()
     * @uses ContractDocument::setCountryOfSale()
     * @uses ContractDocument::setCustomerType()
     * @uses ContractDocument::setDealerPassword()
     * @uses ContractDocument::setDealerPersonID()
     * @uses ContractDocument::setDealerRedirectionURL()
     * @uses ContractDocument::setDealerUsername()
     * @uses ContractDocument::setDraftDay()
     * @uses ContractDocument::setEnvelopeID()
     * @uses ContractDocument::setEquipmentAlarmNetwork()
     * @uses ContractDocument::setEquipmentAlarmNetworkIncluded()
     * @uses ContractDocument::setEquipmentList()
     * @uses ContractDocument::setEquipmentOtherAmount()
     * @uses ContractDocument::setEquipmentPermitAmount()
     * @uses ContractDocument::setEquipmentSubtotalAmount()
     * @uses ContractDocument::setEquipmentTaxAmount()
     * @uses ContractDocument::setEquipmentTotalAmount()
     * @uses ContractDocument::setGuardAddendumRequired()
     * @uses ContractDocument::setInstallationDate()
     * @uses ContractDocument::setInstallationFinish()
     * @uses ContractDocument::setInstallationStart()
     * @uses ContractDocument::setInstallationWorkDescription()
     * @uses ContractDocument::setInsurancePersonalInjuryAmount()
     * @uses ContractDocument::setInsurancePropertyDamageAmount()
     * @uses ContractDocument::setLanguage()
     * @uses ContractDocument::setMonthsPaidUpFront()
     * @uses ContractDocument::setPaymentCount()
     * @uses ContractDocument::setPaymentEffectiveDate()
     * @uses ContractDocument::setPaymentExtendedServiceOption()
     * @uses ContractDocument::setPaymentInitial()
     * @uses ContractDocument::setPaymentMonthly()
     * @uses ContractDocument::setPaymentMonthlyMonitoringRate()
     * @uses ContractDocument::setPaymentOneTimeActivationFee()
     * @uses ContractDocument::setPremiseAddress1()
     * @uses ContractDocument::setPremiseAddress2()
     * @uses ContractDocument::setPremiseCity()
     * @uses ContractDocument::setPremiseCounty()
     * @uses ContractDocument::setPremiseGateCode()
     * @uses ContractDocument::setPremiseState()
     * @uses ContractDocument::setPremiseZip()
     * @uses ContractDocument::setPrimaryBirthDate()
     * @uses ContractDocument::setPrimaryEmail()
     * @uses ContractDocument::setPrimaryFirstName()
     * @uses ContractDocument::setPrimaryLastName()
     * @uses ContractDocument::setPrimaryPassword()
     * @uses ContractDocument::setPrimaryPhone()
     * @uses ContractDocument::setPrimaryTaxIDNumber()
     * @uses ContractDocument::setPromotionPeriod()
     * @uses ContractDocument::setSecondaryBirthDate()
     * @uses ContractDocument::setSecondaryEmail()
     * @uses ContractDocument::setSecondaryFirstName()
     * @uses ContractDocument::setSecondaryLastName()
     * @uses ContractDocument::setSecondaryPhone()
     * @uses ContractDocument::setSecondaryTaxIDNumber()
     * @uses ContractDocument::setSurveyCancellingService()
     * @uses ContractDocument::setSurveyConfirmContractLength()
     * @uses ContractDocument::setSurveyFamiliarizationPeriod()
     * @uses ContractDocument::setSurveyHomeowner()
     * @uses ContractDocument::setSurveyNewConstruction()
     * @uses ContractDocument::setSurveyUnderContract()
     * @param string $billStartDate
     * @param string $billingAddress1
     * @param string $billingAddress2
     * @param string $billingCity
     * @param string $billingCounty
     * @param string $billingState
     * @param string $billingZip
     * @param string $companyName
     * @param string $companyType
     * @param \ArrayType\ArrayOfContactItem $contactList
     * @param int $contractID
     * @param string $countryOfSale
     * @param string $customerType
     * @param string $dealerPassword
     * @param string $dealerPersonID
     * @param string $dealerRedirectionURL
     * @param string $dealerUsername
     * @param int $draftDay
     * @param string $envelopeID
     * @param string $equipmentAlarmNetwork
     * @param bool $equipmentAlarmNetworkIncluded
     * @param \ArrayType\ArrayOfEquipmentItem $equipmentList
     * @param float $equipmentOtherAmount
     * @param float $equipmentPermitAmount
     * @param float $equipmentSubtotalAmount
     * @param float $equipmentTaxAmount
     * @param float $equipmentTotalAmount
     * @param bool $guardAddendumRequired
     * @param string $installationDate
     * @param string $installationFinish
     * @param string $installationStart
     * @param string $installationWorkDescription
     * @param float $insurancePersonalInjuryAmount
     * @param float $insurancePropertyDamageAmount
     * @param string $language
     * @param int $monthsPaidUpFront
     * @param int $paymentCount
     * @param string $paymentEffectiveDate
     * @param bool $paymentExtendedServiceOption
     * @param \StructType\PaymentItem $paymentInitial
     * @param \StructType\PaymentItem $paymentMonthly
     * @param float $paymentMonthlyMonitoringRate
     * @param float $paymentOneTimeActivationFee
     * @param string $premiseAddress1
     * @param string $premiseAddress2
     * @param string $premiseCity
     * @param string $premiseCounty
     * @param string $premiseGateCode
     * @param string $premiseState
     * @param string $premiseZip
     * @param string $primaryBirthDate
     * @param string $primaryEmail
     * @param string $primaryFirstName
     * @param string $primaryLastName
     * @param string $primaryPassword
     * @param string $primaryPhone
     * @param string $primaryTaxIDNumber
     * @param int $promotionPeriod
     * @param string $secondaryBirthDate
     * @param string $secondaryEmail
     * @param string $secondaryFirstName
     * @param string $secondaryLastName
     * @param string $secondaryPhone
     * @param string $secondaryTaxIDNumber
     * @param bool $surveyCancellingService
     * @param bool $surveyConfirmContractLength
     * @param bool $surveyFamiliarizationPeriod
     * @param bool $surveyHomeowner
     * @param bool $surveyNewConstruction
     * @param bool $surveyUnderContract
     */
    public function __construct($billStartDate = null, $billingAddress1 = null, $billingAddress2 = null, $billingCity = null, $billingCounty = null, $billingState = null, $billingZip = null, $companyName = null, $companyType = null, \ArrayType\ArrayOfContactItem $contactList = null, $contractID = null, $countryOfSale = null, $customerType = null, $dealerPassword = null, $dealerPersonID = null, $dealerRedirectionURL = null, $dealerUsername = null, $draftDay = null, $envelopeID = null, $equipmentAlarmNetwork = null, $equipmentAlarmNetworkIncluded = null, \ArrayType\ArrayOfEquipmentItem $equipmentList = null, $equipmentOtherAmount = null, $equipmentPermitAmount = null, $equipmentSubtotalAmount = null, $equipmentTaxAmount = null, $equipmentTotalAmount = null, $guardAddendumRequired = null, $installationDate = null, $installationFinish = null, $installationStart = null, $installationWorkDescription = null, $insurancePersonalInjuryAmount = null, $insurancePropertyDamageAmount = null, $language = null, $monthsPaidUpFront = null, $paymentCount = null, $paymentEffectiveDate = null, $paymentExtendedServiceOption = null, \StructType\PaymentItem $paymentInitial = null, \StructType\PaymentItem $paymentMonthly = null, $paymentMonthlyMonitoringRate = null, $paymentOneTimeActivationFee = null, $premiseAddress1 = null, $premiseAddress2 = null, $premiseCity = null, $premiseCounty = null, $premiseGateCode = null, $premiseState = null, $premiseZip = null, $primaryBirthDate = null, $primaryEmail = null, $primaryFirstName = null, $primaryLastName = null, $primaryPassword = null, $primaryPhone = null, $primaryTaxIDNumber = null, $promotionPeriod = null, $secondaryBirthDate = null, $secondaryEmail = null, $secondaryFirstName = null, $secondaryLastName = null, $secondaryPhone = null, $secondaryTaxIDNumber = null, $surveyCancellingService = null, $surveyConfirmContractLength = null, $surveyFamiliarizationPeriod = null, $surveyHomeowner = null, $surveyNewConstruction = null, $surveyUnderContract = null)
    {
        $this
            ->setBillStartDate($billStartDate)
            ->setBillingAddress1($billingAddress1)
            ->setBillingAddress2($billingAddress2)
            ->setBillingCity($billingCity)
            ->setBillingCounty($billingCounty)
            ->setBillingState($billingState)
            ->setBillingZip($billingZip)
            ->setCompanyName($companyName)
            ->setCompanyType($companyType)
            ->setContactList($contactList)
            ->setContractID($contractID)
            ->setCountryOfSale($countryOfSale)
            ->setCustomerType($customerType)
            ->setDealerPassword($dealerPassword)
            ->setDealerPersonID($dealerPersonID)
            ->setDealerRedirectionURL($dealerRedirectionURL)
            ->setDealerUsername($dealerUsername)
            ->setDraftDay($draftDay)
            ->setEnvelopeID($envelopeID)
            ->setEquipmentAlarmNetwork($equipmentAlarmNetwork)
            ->setEquipmentAlarmNetworkIncluded($equipmentAlarmNetworkIncluded)
            ->setEquipmentList($equipmentList)
            ->setEquipmentOtherAmount($equipmentOtherAmount)
            ->setEquipmentPermitAmount($equipmentPermitAmount)
            ->setEquipmentSubtotalAmount($equipmentSubtotalAmount)
            ->setEquipmentTaxAmount($equipmentTaxAmount)
            ->setEquipmentTotalAmount($equipmentTotalAmount)
            ->setGuardAddendumRequired($guardAddendumRequired)
            ->setInstallationDate($installationDate)
            ->setInstallationFinish($installationFinish)
            ->setInstallationStart($installationStart)
            ->setInstallationWorkDescription($installationWorkDescription)
            ->setInsurancePersonalInjuryAmount($insurancePersonalInjuryAmount)
            ->setInsurancePropertyDamageAmount($insurancePropertyDamageAmount)
            ->setLanguage($language)
            ->setMonthsPaidUpFront($monthsPaidUpFront)
            ->setPaymentCount($paymentCount)
            ->setPaymentEffectiveDate($paymentEffectiveDate)
            ->setPaymentExtendedServiceOption($paymentExtendedServiceOption)
            ->setPaymentInitial($paymentInitial)
            ->setPaymentMonthly($paymentMonthly)
            ->setPaymentMonthlyMonitoringRate($paymentMonthlyMonitoringRate)
            ->setPaymentOneTimeActivationFee($paymentOneTimeActivationFee)
            ->setPremiseAddress1($premiseAddress1)
            ->setPremiseAddress2($premiseAddress2)
            ->setPremiseCity($premiseCity)
            ->setPremiseCounty($premiseCounty)
            ->setPremiseGateCode($premiseGateCode)
            ->setPremiseState($premiseState)
            ->setPremiseZip($premiseZip)
            ->setPrimaryBirthDate($primaryBirthDate)
            ->setPrimaryEmail($primaryEmail)
            ->setPrimaryFirstName($primaryFirstName)
            ->setPrimaryLastName($primaryLastName)
            ->setPrimaryPassword($primaryPassword)
            ->setPrimaryPhone($primaryPhone)
            ->setPrimaryTaxIDNumber($primaryTaxIDNumber)
            ->setPromotionPeriod($promotionPeriod)
            ->setSecondaryBirthDate($secondaryBirthDate)
            ->setSecondaryEmail($secondaryEmail)
            ->setSecondaryFirstName($secondaryFirstName)
            ->setSecondaryLastName($secondaryLastName)
            ->setSecondaryPhone($secondaryPhone)
            ->setSecondaryTaxIDNumber($secondaryTaxIDNumber)
            ->setSurveyCancellingService($surveyCancellingService)
            ->setSurveyConfirmContractLength($surveyConfirmContractLength)
            ->setSurveyFamiliarizationPeriod($surveyFamiliarizationPeriod)
            ->setSurveyHomeowner($surveyHomeowner)
            ->setSurveyNewConstruction($surveyNewConstruction)
            ->setSurveyUnderContract($surveyUnderContract);
    }
    /**
     * Get BillStartDate value
     * @return string|null
     */
    public function getBillStartDate()
    {
        return $this->BillStartDate;
    }
    /**
     * Set BillStartDate value
     * @param string $billStartDate
     * @return \StructType\ContractDocument
     */
    public function setBillStartDate($billStartDate = null)
    {
        // validation for constraint: string
        if (!is_null($billStartDate) && !is_string($billStartDate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($billStartDate)), __LINE__);
        }
        $this->BillStartDate = $billStartDate;
        return $this;
    }
    /**
     * Get BillingAddress1 value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getBillingAddress1()
    {
        return isset($this->BillingAddress1) ? $this->BillingAddress1 : null;
    }
    /**
     * Set BillingAddress1 value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $billingAddress1
     * @return \StructType\ContractDocument
     */
    public function setBillingAddress1($billingAddress1 = null)
    {
        // validation for constraint: string
        if (!is_null($billingAddress1) && !is_string($billingAddress1)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($billingAddress1)), __LINE__);
        }
        if (is_null($billingAddress1) || (is_array($billingAddress1) && empty($billingAddress1))) {
            unset($this->BillingAddress1);
        } else {
            $this->BillingAddress1 = $billingAddress1;
        }
        return $this;
    }
    /**
     * Get BillingAddress2 value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getBillingAddress2()
    {
        return isset($this->BillingAddress2) ? $this->BillingAddress2 : null;
    }
    /**
     * Set BillingAddress2 value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $billingAddress2
     * @return \StructType\ContractDocument
     */
    public function setBillingAddress2($billingAddress2 = null)
    {
        // validation for constraint: string
        if (!is_null($billingAddress2) && !is_string($billingAddress2)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($billingAddress2)), __LINE__);
        }
        if (is_null($billingAddress2) || (is_array($billingAddress2) && empty($billingAddress2))) {
            unset($this->BillingAddress2);
        } else {
            $this->BillingAddress2 = $billingAddress2;
        }
        return $this;
    }
    /**
     * Get BillingCity value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getBillingCity()
    {
        return isset($this->BillingCity) ? $this->BillingCity : null;
    }
    /**
     * Set BillingCity value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $billingCity
     * @return \StructType\ContractDocument
     */
    public function setBillingCity($billingCity = null)
    {
        // validation for constraint: string
        if (!is_null($billingCity) && !is_string($billingCity)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($billingCity)), __LINE__);
        }
        if (is_null($billingCity) || (is_array($billingCity) && empty($billingCity))) {
            unset($this->BillingCity);
        } else {
            $this->BillingCity = $billingCity;
        }
        return $this;
    }
    /**
     * Get BillingCounty value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getBillingCounty()
    {
        return isset($this->BillingCounty) ? $this->BillingCounty : null;
    }
    /**
     * Set BillingCounty value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $billingCounty
     * @return \StructType\ContractDocument
     */
    public function setBillingCounty($billingCounty = null)
    {
        // validation for constraint: string
        if (!is_null($billingCounty) && !is_string($billingCounty)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($billingCounty)), __LINE__);
        }
        if (is_null($billingCounty) || (is_array($billingCounty) && empty($billingCounty))) {
            unset($this->BillingCounty);
        } else {
            $this->BillingCounty = $billingCounty;
        }
        return $this;
    }
    /**
     * Get BillingState value
     * @return string|null
     */
    public function getBillingState()
    {
        return $this->BillingState;
    }
    /**
     * Set BillingState value
     * @uses \EnumType\StateProvinceEnum::valueIsValid()
     * @uses \EnumType\StateProvinceEnum::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $billingState
     * @return \StructType\ContractDocument
     */
    public function setBillingState($billingState = null)
    {
        // validation for constraint: enumeration
        if (!\EnumType\StateProvinceEnum::valueIsValid($billingState)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" is invalid, please use one of: %s', $billingState, implode(', ', \EnumType\StateProvinceEnum::getValidValues())), __LINE__);
        }
        $this->BillingState = $billingState;
        return $this;
    }
    /**
     * Get BillingZip value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getBillingZip()
    {
        return isset($this->BillingZip) ? $this->BillingZip : null;
    }
    /**
     * Set BillingZip value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $billingZip
     * @return \StructType\ContractDocument
     */
    public function setBillingZip($billingZip = null)
    {
        // validation for constraint: string
        if (!is_null($billingZip) && !is_string($billingZip)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($billingZip)), __LINE__);
        }
        if (is_null($billingZip) || (is_array($billingZip) && empty($billingZip))) {
            unset($this->BillingZip);
        } else {
            $this->BillingZip = $billingZip;
        }
        return $this;
    }
    /**
     * Get CompanyName value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getCompanyName()
    {
        return isset($this->CompanyName) ? $this->CompanyName : null;
    }
    /**
     * Set CompanyName value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $companyName
     * @return \StructType\ContractDocument
     */
    public function setCompanyName($companyName = null)
    {
        // validation for constraint: string
        if (!is_null($companyName) && !is_string($companyName)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($companyName)), __LINE__);
        }
        if (is_null($companyName) || (is_array($companyName) && empty($companyName))) {
            unset($this->CompanyName);
        } else {
            $this->CompanyName = $companyName;
        }
        return $this;
    }
    /**
     * Get CompanyType value
     * @return string|null
     */
    public function getCompanyType()
    {
        return $this->CompanyType;
    }
    /**
     * Set CompanyType value
     * @uses \EnumType\CompanyTypes::valueIsValid()
     * @uses \EnumType\CompanyTypes::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $companyType
     * @return \StructType\ContractDocument
     */
    public function setCompanyType($companyType = null)
    {
        // validation for constraint: enumeration
        if (!\EnumType\CompanyTypes::valueIsValid($companyType)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" is invalid, please use one of: %s', $companyType, implode(', ', \EnumType\CompanyTypes::getValidValues())), __LINE__);
        }
        $this->CompanyType = $companyType;
        return $this;
    }
    /**
     * Get ContactList value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \ArrayType\ArrayOfContactItem|null
     */
    public function getContactList()
    {
        return isset($this->ContactList) ? $this->ContactList : null;
    }
    /**
     * Set ContactList value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \ArrayType\ArrayOfContactItem $contactList
     * @return \StructType\ContractDocument
     */
    public function setContactList(\ArrayType\ArrayOfContactItem $contactList = null)
    {
        if (is_null($contactList) || (is_array($contactList) && empty($contactList))) {
            unset($this->ContactList);
        } else {
            $this->ContactList = $contactList;
        }
        return $this;
    }
    /**
     * Get ContractID value
     * @return int|null
     */
    public function getContractID()
    {
        return $this->ContractID;
    }
    /**
     * Set ContractID value
     * @param int $contractID
     * @return \StructType\ContractDocument
     */
    public function setContractID($contractID = null)
    {
        // validation for constraint: int
        if (!is_null($contractID) && !is_numeric($contractID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($contractID)), __LINE__);
        }
        $this->ContractID = $contractID;
        return $this;
    }
    /**
     * Get CountryOfSale value
     * @return string|null
     */
    public function getCountryOfSale()
    {
        return $this->CountryOfSale;
    }
    /**
     * Set CountryOfSale value
     * @uses \EnumType\CountryEnum::valueIsValid()
     * @uses \EnumType\CountryEnum::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $countryOfSale
     * @return \StructType\ContractDocument
     */
    public function setCountryOfSale($countryOfSale = null)
    {
        // validation for constraint: enumeration
        if (!\EnumType\CountryEnum::valueIsValid($countryOfSale)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" is invalid, please use one of: %s', $countryOfSale, implode(', ', \EnumType\CountryEnum::getValidValues())), __LINE__);
        }
        $this->CountryOfSale = $countryOfSale;
        return $this;
    }
    /**
     * Get CustomerType value
     * @return string|null
     */
    public function getCustomerType()
    {
        return $this->CustomerType;
    }
    /**
     * Set CustomerType value
     * @uses \EnumType\CustomerTypeEnum::valueIsValid()
     * @uses \EnumType\CustomerTypeEnum::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $customerType
     * @return \StructType\ContractDocument
     */
    public function setCustomerType($customerType = null)
    {
        // validation for constraint: enumeration
        if (!\EnumType\CustomerTypeEnum::valueIsValid($customerType)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" is invalid, please use one of: %s', $customerType, implode(', ', \EnumType\CustomerTypeEnum::getValidValues())), __LINE__);
        }
        $this->CustomerType = $customerType;
        return $this;
    }
    /**
     * Get DealerPassword value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getDealerPassword()
    {
        return isset($this->DealerPassword) ? $this->DealerPassword : null;
    }
    /**
     * Set DealerPassword value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $dealerPassword
     * @return \StructType\ContractDocument
     */
    public function setDealerPassword($dealerPassword = null)
    {
        // validation for constraint: string
        if (!is_null($dealerPassword) && !is_string($dealerPassword)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($dealerPassword)), __LINE__);
        }
        if (is_null($dealerPassword) || (is_array($dealerPassword) && empty($dealerPassword))) {
            unset($this->DealerPassword);
        } else {
            $this->DealerPassword = $dealerPassword;
        }
        return $this;
    }
    /**
     * Get DealerPersonID value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getDealerPersonID()
    {
        return isset($this->DealerPersonID) ? $this->DealerPersonID : null;
    }
    /**
     * Set DealerPersonID value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $dealerPersonID
     * @return \StructType\ContractDocument
     */
    public function setDealerPersonID($dealerPersonID = null)
    {
        // validation for constraint: string
        if (!is_null($dealerPersonID) && !is_string($dealerPersonID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($dealerPersonID)), __LINE__);
        }
        if (is_null($dealerPersonID) || (is_array($dealerPersonID) && empty($dealerPersonID))) {
            unset($this->DealerPersonID);
        } else {
            $this->DealerPersonID = $dealerPersonID;
        }
        return $this;
    }
    /**
     * Get DealerRedirectionURL value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getDealerRedirectionURL()
    {
        return isset($this->DealerRedirectionURL) ? $this->DealerRedirectionURL : null;
    }
    /**
     * Set DealerRedirectionURL value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $dealerRedirectionURL
     * @return \StructType\ContractDocument
     */
    public function setDealerRedirectionURL($dealerRedirectionURL = null)
    {
        // validation for constraint: string
        if (!is_null($dealerRedirectionURL) && !is_string($dealerRedirectionURL)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($dealerRedirectionURL)), __LINE__);
        }
        if (is_null($dealerRedirectionURL) || (is_array($dealerRedirectionURL) && empty($dealerRedirectionURL))) {
            unset($this->DealerRedirectionURL);
        } else {
            $this->DealerRedirectionURL = $dealerRedirectionURL;
        }
        return $this;
    }
    /**
     * Get DealerUsername value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getDealerUsername()
    {
        return isset($this->DealerUsername) ? $this->DealerUsername : null;
    }
    /**
     * Set DealerUsername value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $dealerUsername
     * @return \StructType\ContractDocument
     */
    public function setDealerUsername($dealerUsername = null)
    {
        // validation for constraint: string
        if (!is_null($dealerUsername) && !is_string($dealerUsername)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($dealerUsername)), __LINE__);
        }
        if (is_null($dealerUsername) || (is_array($dealerUsername) && empty($dealerUsername))) {
            unset($this->DealerUsername);
        } else {
            $this->DealerUsername = $dealerUsername;
        }
        return $this;
    }
    /**
     * Get DraftDay value
     * @return int|null
     */
    public function getDraftDay()
    {
        return $this->DraftDay;
    }
    /**
     * Set DraftDay value
     * @param int $draftDay
     * @return \StructType\ContractDocument
     */
    public function setDraftDay($draftDay = null)
    {
        // validation for constraint: int
        if (!is_null($draftDay) && !is_numeric($draftDay)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($draftDay)), __LINE__);
        }
        $this->DraftDay = $draftDay;
        return $this;
    }
    /**
     * Get EnvelopeID value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getEnvelopeID()
    {
        return isset($this->EnvelopeID) ? $this->EnvelopeID : null;
    }
    /**
     * Set EnvelopeID value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $envelopeID
     * @return \StructType\ContractDocument
     */
    public function setEnvelopeID($envelopeID = null)
    {
        // validation for constraint: string
        if (!is_null($envelopeID) && !is_string($envelopeID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($envelopeID)), __LINE__);
        }
        if (is_null($envelopeID) || (is_array($envelopeID) && empty($envelopeID))) {
            unset($this->EnvelopeID);
        } else {
            $this->EnvelopeID = $envelopeID;
        }
        return $this;
    }
    /**
     * Get EquipmentAlarmNetwork value
     * @return string|null
     */
    public function getEquipmentAlarmNetwork()
    {
        return $this->EquipmentAlarmNetwork;
    }
    /**
     * Set EquipmentAlarmNetwork value
     * @uses \EnumType\AlarmNetworkEnum::valueIsValid()
     * @uses \EnumType\AlarmNetworkEnum::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $equipmentAlarmNetwork
     * @return \StructType\ContractDocument
     */
    public function setEquipmentAlarmNetwork($equipmentAlarmNetwork = null)
    {
        // validation for constraint: enumeration
        if (!\EnumType\AlarmNetworkEnum::valueIsValid($equipmentAlarmNetwork)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" is invalid, please use one of: %s', $equipmentAlarmNetwork, implode(', ', \EnumType\AlarmNetworkEnum::getValidValues())), __LINE__);
        }
        $this->EquipmentAlarmNetwork = $equipmentAlarmNetwork;
        return $this;
    }
    /**
     * Get EquipmentAlarmNetworkIncluded value
     * @return bool|null
     */
    public function getEquipmentAlarmNetworkIncluded()
    {
        return $this->EquipmentAlarmNetworkIncluded;
    }
    /**
     * Set EquipmentAlarmNetworkIncluded value
     * @param bool $equipmentAlarmNetworkIncluded
     * @return \StructType\ContractDocument
     */
    public function setEquipmentAlarmNetworkIncluded($equipmentAlarmNetworkIncluded = null)
    {
        // validation for constraint: boolean
        if (!is_null($equipmentAlarmNetworkIncluded) && !is_bool($equipmentAlarmNetworkIncluded)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($equipmentAlarmNetworkIncluded)), __LINE__);
        }
        $this->EquipmentAlarmNetworkIncluded = $equipmentAlarmNetworkIncluded;
        return $this;
    }
    /**
     * Get EquipmentList value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \ArrayType\ArrayOfEquipmentItem|null
     */
    public function getEquipmentList()
    {
        return isset($this->EquipmentList) ? $this->EquipmentList : null;
    }
    /**
     * Set EquipmentList value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \ArrayType\ArrayOfEquipmentItem $equipmentList
     * @return \StructType\ContractDocument
     */
    public function setEquipmentList(\ArrayType\ArrayOfEquipmentItem $equipmentList = null)
    {
        if (is_null($equipmentList) || (is_array($equipmentList) && empty($equipmentList))) {
            unset($this->EquipmentList);
        } else {
            $this->EquipmentList = $equipmentList;
        }
        return $this;
    }
    /**
     * Get EquipmentOtherAmount value
     * @return float|null
     */
    public function getEquipmentOtherAmount()
    {
        return $this->EquipmentOtherAmount;
    }
    /**
     * Set EquipmentOtherAmount value
     * @param float $equipmentOtherAmount
     * @return \StructType\ContractDocument
     */
    public function setEquipmentOtherAmount($equipmentOtherAmount = null)
    {
        $this->EquipmentOtherAmount = $equipmentOtherAmount;
        return $this;
    }
    /**
     * Get EquipmentPermitAmount value
     * @return float|null
     */
    public function getEquipmentPermitAmount()
    {
        return $this->EquipmentPermitAmount;
    }
    /**
     * Set EquipmentPermitAmount value
     * @param float $equipmentPermitAmount
     * @return \StructType\ContractDocument
     */
    public function setEquipmentPermitAmount($equipmentPermitAmount = null)
    {
        $this->EquipmentPermitAmount = $equipmentPermitAmount;
        return $this;
    }
    /**
     * Get EquipmentSubtotalAmount value
     * @return float|null
     */
    public function getEquipmentSubtotalAmount()
    {
        return $this->EquipmentSubtotalAmount;
    }
    /**
     * Set EquipmentSubtotalAmount value
     * @param float $equipmentSubtotalAmount
     * @return \StructType\ContractDocument
     */
    public function setEquipmentSubtotalAmount($equipmentSubtotalAmount = null)
    {
        $this->EquipmentSubtotalAmount = $equipmentSubtotalAmount;
        return $this;
    }
    /**
     * Get EquipmentTaxAmount value
     * @return float|null
     */
    public function getEquipmentTaxAmount()
    {
        return $this->EquipmentTaxAmount;
    }
    /**
     * Set EquipmentTaxAmount value
     * @param float $equipmentTaxAmount
     * @return \StructType\ContractDocument
     */
    public function setEquipmentTaxAmount($equipmentTaxAmount = null)
    {
        $this->EquipmentTaxAmount = $equipmentTaxAmount;
        return $this;
    }
    /**
     * Get EquipmentTotalAmount value
     * @return float|null
     */
    public function getEquipmentTotalAmount()
    {
        return $this->EquipmentTotalAmount;
    }
    /**
     * Set EquipmentTotalAmount value
     * @param float $equipmentTotalAmount
     * @return \StructType\ContractDocument
     */
    public function setEquipmentTotalAmount($equipmentTotalAmount = null)
    {
        $this->EquipmentTotalAmount = $equipmentTotalAmount;
        return $this;
    }
    /**
     * Get GuardAddendumRequired value
     * @return bool|null
     */
    public function getGuardAddendumRequired()
    {
        return $this->GuardAddendumRequired;
    }
    /**
     * Set GuardAddendumRequired value
     * @param bool $guardAddendumRequired
     * @return \StructType\ContractDocument
     */
    public function setGuardAddendumRequired($guardAddendumRequired = null)
    {
        // validation for constraint: boolean
        if (!is_null($guardAddendumRequired) && !is_bool($guardAddendumRequired)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($guardAddendumRequired)), __LINE__);
        }
        $this->GuardAddendumRequired = $guardAddendumRequired;
        return $this;
    }
    /**
     * Get InstallationDate value
     * @return string|null
     */
    public function getInstallationDate()
    {
        return $this->InstallationDate;
    }
    /**
     * Set InstallationDate value
     * @param string $installationDate
     * @return \StructType\ContractDocument
     */
    public function setInstallationDate($installationDate = null)
    {
        // validation for constraint: string
        if (!is_null($installationDate) && !is_string($installationDate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($installationDate)), __LINE__);
        }
        $this->InstallationDate = $installationDate;
        return $this;
    }
    /**
     * Get InstallationFinish value
     * @return string|null
     */
    public function getInstallationFinish()
    {
        return $this->InstallationFinish;
    }
    /**
     * Set InstallationFinish value
     * @param string $installationFinish
     * @return \StructType\ContractDocument
     */
    public function setInstallationFinish($installationFinish = null)
    {
        // validation for constraint: string
        if (!is_null($installationFinish) && !is_string($installationFinish)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($installationFinish)), __LINE__);
        }
        $this->InstallationFinish = $installationFinish;
        return $this;
    }
    /**
     * Get InstallationStart value
     * @return string|null
     */
    public function getInstallationStart()
    {
        return $this->InstallationStart;
    }
    /**
     * Set InstallationStart value
     * @param string $installationStart
     * @return \StructType\ContractDocument
     */
    public function setInstallationStart($installationStart = null)
    {
        // validation for constraint: string
        if (!is_null($installationStart) && !is_string($installationStart)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($installationStart)), __LINE__);
        }
        $this->InstallationStart = $installationStart;
        return $this;
    }
    /**
     * Get InstallationWorkDescription value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getInstallationWorkDescription()
    {
        return isset($this->InstallationWorkDescription) ? $this->InstallationWorkDescription : null;
    }
    /**
     * Set InstallationWorkDescription value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $installationWorkDescription
     * @return \StructType\ContractDocument
     */
    public function setInstallationWorkDescription($installationWorkDescription = null)
    {
        // validation for constraint: string
        if (!is_null($installationWorkDescription) && !is_string($installationWorkDescription)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($installationWorkDescription)), __LINE__);
        }
        if (is_null($installationWorkDescription) || (is_array($installationWorkDescription) && empty($installationWorkDescription))) {
            unset($this->InstallationWorkDescription);
        } else {
            $this->InstallationWorkDescription = $installationWorkDescription;
        }
        return $this;
    }
    /**
     * Get InsurancePersonalInjuryAmount value
     * @return float|null
     */
    public function getInsurancePersonalInjuryAmount()
    {
        return $this->InsurancePersonalInjuryAmount;
    }
    /**
     * Set InsurancePersonalInjuryAmount value
     * @param float $insurancePersonalInjuryAmount
     * @return \StructType\ContractDocument
     */
    public function setInsurancePersonalInjuryAmount($insurancePersonalInjuryAmount = null)
    {
        $this->InsurancePersonalInjuryAmount = $insurancePersonalInjuryAmount;
        return $this;
    }
    /**
     * Get InsurancePropertyDamageAmount value
     * @return float|null
     */
    public function getInsurancePropertyDamageAmount()
    {
        return $this->InsurancePropertyDamageAmount;
    }
    /**
     * Set InsurancePropertyDamageAmount value
     * @param float $insurancePropertyDamageAmount
     * @return \StructType\ContractDocument
     */
    public function setInsurancePropertyDamageAmount($insurancePropertyDamageAmount = null)
    {
        $this->InsurancePropertyDamageAmount = $insurancePropertyDamageAmount;
        return $this;
    }
    /**
     * Get Language value
     * @return string|null
     */
    public function getLanguage()
    {
        return $this->Language;
    }
    /**
     * Set Language value
     * @uses \EnumType\ContractLanguageEnum::valueIsValid()
     * @uses \EnumType\ContractLanguageEnum::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $language
     * @return \StructType\ContractDocument
     */
    public function setLanguage($language = null)
    {
        // validation for constraint: enumeration
        if (!\EnumType\ContractLanguageEnum::valueIsValid($language)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" is invalid, please use one of: %s', $language, implode(', ', \EnumType\ContractLanguageEnum::getValidValues())), __LINE__);
        }
        $this->Language = $language;
        return $this;
    }
    /**
     * Get MonthsPaidUpFront value
     * @return int|null
     */
    public function getMonthsPaidUpFront()
    {
        return $this->MonthsPaidUpFront;
    }
    /**
     * Set MonthsPaidUpFront value
     * @param int $monthsPaidUpFront
     * @return \StructType\ContractDocument
     */
    public function setMonthsPaidUpFront($monthsPaidUpFront = null)
    {
        // validation for constraint: int
        if (!is_null($monthsPaidUpFront) && !is_numeric($monthsPaidUpFront)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($monthsPaidUpFront)), __LINE__);
        }
        $this->MonthsPaidUpFront = $monthsPaidUpFront;
        return $this;
    }
    /**
     * Get PaymentCount value
     * @return int|null
     */
    public function getPaymentCount()
    {
        return $this->PaymentCount;
    }
    /**
     * Set PaymentCount value
     * @param int $paymentCount
     * @return \StructType\ContractDocument
     */
    public function setPaymentCount($paymentCount = null)
    {
        // validation for constraint: int
        if (!is_null($paymentCount) && !is_numeric($paymentCount)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($paymentCount)), __LINE__);
        }
        $this->PaymentCount = $paymentCount;
        return $this;
    }
    /**
     * Get PaymentEffectiveDate value
     * @return string|null
     */
    public function getPaymentEffectiveDate()
    {
        return $this->PaymentEffectiveDate;
    }
    /**
     * Set PaymentEffectiveDate value
     * @param string $paymentEffectiveDate
     * @return \StructType\ContractDocument
     */
    public function setPaymentEffectiveDate($paymentEffectiveDate = null)
    {
        // validation for constraint: string
        if (!is_null($paymentEffectiveDate) && !is_string($paymentEffectiveDate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($paymentEffectiveDate)), __LINE__);
        }
        $this->PaymentEffectiveDate = $paymentEffectiveDate;
        return $this;
    }
    /**
     * Get PaymentExtendedServiceOption value
     * @return bool|null
     */
    public function getPaymentExtendedServiceOption()
    {
        return $this->PaymentExtendedServiceOption;
    }
    /**
     * Set PaymentExtendedServiceOption value
     * @param bool $paymentExtendedServiceOption
     * @return \StructType\ContractDocument
     */
    public function setPaymentExtendedServiceOption($paymentExtendedServiceOption = null)
    {
        // validation for constraint: boolean
        if (!is_null($paymentExtendedServiceOption) && !is_bool($paymentExtendedServiceOption)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($paymentExtendedServiceOption)), __LINE__);
        }
        $this->PaymentExtendedServiceOption = $paymentExtendedServiceOption;
        return $this;
    }
    /**
     * Get PaymentInitial value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \StructType\PaymentItem|null
     */
    public function getPaymentInitial()
    {
        return isset($this->PaymentInitial) ? $this->PaymentInitial : null;
    }
    /**
     * Set PaymentInitial value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \StructType\PaymentItem $paymentInitial
     * @return \StructType\ContractDocument
     */
    public function setPaymentInitial(\StructType\PaymentItem $paymentInitial = null)
    {
        if (is_null($paymentInitial) || (is_array($paymentInitial) && empty($paymentInitial))) {
            unset($this->PaymentInitial);
        } else {
            $this->PaymentInitial = $paymentInitial;
        }
        return $this;
    }
    /**
     * Get PaymentMonthly value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \StructType\PaymentItem|null
     */
    public function getPaymentMonthly()
    {
        return isset($this->PaymentMonthly) ? $this->PaymentMonthly : null;
    }
    /**
     * Set PaymentMonthly value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \StructType\PaymentItem $paymentMonthly
     * @return \StructType\ContractDocument
     */
    public function setPaymentMonthly(\StructType\PaymentItem $paymentMonthly = null)
    {
        if (is_null($paymentMonthly) || (is_array($paymentMonthly) && empty($paymentMonthly))) {
            unset($this->PaymentMonthly);
        } else {
            $this->PaymentMonthly = $paymentMonthly;
        }
        return $this;
    }
    /**
     * Get PaymentMonthlyMonitoringRate value
     * @return float|null
     */
    public function getPaymentMonthlyMonitoringRate()
    {
        return $this->PaymentMonthlyMonitoringRate;
    }
    /**
     * Set PaymentMonthlyMonitoringRate value
     * @param float $paymentMonthlyMonitoringRate
     * @return \StructType\ContractDocument
     */
    public function setPaymentMonthlyMonitoringRate($paymentMonthlyMonitoringRate = null)
    {
        $this->PaymentMonthlyMonitoringRate = $paymentMonthlyMonitoringRate;
        return $this;
    }
    /**
     * Get PaymentOneTimeActivationFee value
     * @return float|null
     */
    public function getPaymentOneTimeActivationFee()
    {
        return $this->PaymentOneTimeActivationFee;
    }
    /**
     * Set PaymentOneTimeActivationFee value
     * @param float $paymentOneTimeActivationFee
     * @return \StructType\ContractDocument
     */
    public function setPaymentOneTimeActivationFee($paymentOneTimeActivationFee = null)
    {
        $this->PaymentOneTimeActivationFee = $paymentOneTimeActivationFee;
        return $this;
    }
    /**
     * Get PremiseAddress1 value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPremiseAddress1()
    {
        return isset($this->PremiseAddress1) ? $this->PremiseAddress1 : null;
    }
    /**
     * Set PremiseAddress1 value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $premiseAddress1
     * @return \StructType\ContractDocument
     */
    public function setPremiseAddress1($premiseAddress1 = null)
    {
        // validation for constraint: string
        if (!is_null($premiseAddress1) && !is_string($premiseAddress1)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($premiseAddress1)), __LINE__);
        }
        if (is_null($premiseAddress1) || (is_array($premiseAddress1) && empty($premiseAddress1))) {
            unset($this->PremiseAddress1);
        } else {
            $this->PremiseAddress1 = $premiseAddress1;
        }
        return $this;
    }
    /**
     * Get PremiseAddress2 value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPremiseAddress2()
    {
        return isset($this->PremiseAddress2) ? $this->PremiseAddress2 : null;
    }
    /**
     * Set PremiseAddress2 value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $premiseAddress2
     * @return \StructType\ContractDocument
     */
    public function setPremiseAddress2($premiseAddress2 = null)
    {
        // validation for constraint: string
        if (!is_null($premiseAddress2) && !is_string($premiseAddress2)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($premiseAddress2)), __LINE__);
        }
        if (is_null($premiseAddress2) || (is_array($premiseAddress2) && empty($premiseAddress2))) {
            unset($this->PremiseAddress2);
        } else {
            $this->PremiseAddress2 = $premiseAddress2;
        }
        return $this;
    }
    /**
     * Get PremiseCity value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPremiseCity()
    {
        return isset($this->PremiseCity) ? $this->PremiseCity : null;
    }
    /**
     * Set PremiseCity value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $premiseCity
     * @return \StructType\ContractDocument
     */
    public function setPremiseCity($premiseCity = null)
    {
        // validation for constraint: string
        if (!is_null($premiseCity) && !is_string($premiseCity)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($premiseCity)), __LINE__);
        }
        if (is_null($premiseCity) || (is_array($premiseCity) && empty($premiseCity))) {
            unset($this->PremiseCity);
        } else {
            $this->PremiseCity = $premiseCity;
        }
        return $this;
    }
    /**
     * Get PremiseCounty value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPremiseCounty()
    {
        return isset($this->PremiseCounty) ? $this->PremiseCounty : null;
    }
    /**
     * Set PremiseCounty value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $premiseCounty
     * @return \StructType\ContractDocument
     */
    public function setPremiseCounty($premiseCounty = null)
    {
        // validation for constraint: string
        if (!is_null($premiseCounty) && !is_string($premiseCounty)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($premiseCounty)), __LINE__);
        }
        if (is_null($premiseCounty) || (is_array($premiseCounty) && empty($premiseCounty))) {
            unset($this->PremiseCounty);
        } else {
            $this->PremiseCounty = $premiseCounty;
        }
        return $this;
    }
    /**
     * Get PremiseGateCode value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPremiseGateCode()
    {
        return isset($this->PremiseGateCode) ? $this->PremiseGateCode : null;
    }
    /**
     * Set PremiseGateCode value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $premiseGateCode
     * @return \StructType\ContractDocument
     */
    public function setPremiseGateCode($premiseGateCode = null)
    {
        // validation for constraint: string
        if (!is_null($premiseGateCode) && !is_string($premiseGateCode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($premiseGateCode)), __LINE__);
        }
        if (is_null($premiseGateCode) || (is_array($premiseGateCode) && empty($premiseGateCode))) {
            unset($this->PremiseGateCode);
        } else {
            $this->PremiseGateCode = $premiseGateCode;
        }
        return $this;
    }
    /**
     * Get PremiseState value
     * @return string|null
     */
    public function getPremiseState()
    {
        return $this->PremiseState;
    }
    /**
     * Set PremiseState value
     * @uses \EnumType\StateProvinceEnum::valueIsValid()
     * @uses \EnumType\StateProvinceEnum::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $premiseState
     * @return \StructType\ContractDocument
     */
    public function setPremiseState($premiseState = null)
    {
        // validation for constraint: enumeration
        if (!\EnumType\StateProvinceEnum::valueIsValid($premiseState)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" is invalid, please use one of: %s', $premiseState, implode(', ', \EnumType\StateProvinceEnum::getValidValues())), __LINE__);
        }
        $this->PremiseState = $premiseState;
        return $this;
    }
    /**
     * Get PremiseZip value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPremiseZip()
    {
        return isset($this->PremiseZip) ? $this->PremiseZip : null;
    }
    /**
     * Set PremiseZip value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $premiseZip
     * @return \StructType\ContractDocument
     */
    public function setPremiseZip($premiseZip = null)
    {
        // validation for constraint: string
        if (!is_null($premiseZip) && !is_string($premiseZip)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($premiseZip)), __LINE__);
        }
        if (is_null($premiseZip) || (is_array($premiseZip) && empty($premiseZip))) {
            unset($this->PremiseZip);
        } else {
            $this->PremiseZip = $premiseZip;
        }
        return $this;
    }
    /**
     * Get PrimaryBirthDate value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPrimaryBirthDate()
    {
        return isset($this->PrimaryBirthDate) ? $this->PrimaryBirthDate : null;
    }
    /**
     * Set PrimaryBirthDate value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $primaryBirthDate
     * @return \StructType\ContractDocument
     */
    public function setPrimaryBirthDate($primaryBirthDate = null)
    {
        // validation for constraint: string
        if (!is_null($primaryBirthDate) && !is_string($primaryBirthDate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($primaryBirthDate)), __LINE__);
        }
        if (is_null($primaryBirthDate) || (is_array($primaryBirthDate) && empty($primaryBirthDate))) {
            unset($this->PrimaryBirthDate);
        } else {
            $this->PrimaryBirthDate = $primaryBirthDate;
        }
        return $this;
    }
    /**
     * Get PrimaryEmail value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPrimaryEmail()
    {
        return isset($this->PrimaryEmail) ? $this->PrimaryEmail : null;
    }
    /**
     * Set PrimaryEmail value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $primaryEmail
     * @return \StructType\ContractDocument
     */
    public function setPrimaryEmail($primaryEmail = null)
    {
        // validation for constraint: string
        if (!is_null($primaryEmail) && !is_string($primaryEmail)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($primaryEmail)), __LINE__);
        }
        if (is_null($primaryEmail) || (is_array($primaryEmail) && empty($primaryEmail))) {
            unset($this->PrimaryEmail);
        } else {
            $this->PrimaryEmail = $primaryEmail;
        }
        return $this;
    }
    /**
     * Get PrimaryFirstName value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPrimaryFirstName()
    {
        return isset($this->PrimaryFirstName) ? $this->PrimaryFirstName : null;
    }
    /**
     * Set PrimaryFirstName value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $primaryFirstName
     * @return \StructType\ContractDocument
     */
    public function setPrimaryFirstName($primaryFirstName = null)
    {
        // validation for constraint: string
        if (!is_null($primaryFirstName) && !is_string($primaryFirstName)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($primaryFirstName)), __LINE__);
        }
        if (is_null($primaryFirstName) || (is_array($primaryFirstName) && empty($primaryFirstName))) {
            unset($this->PrimaryFirstName);
        } else {
            $this->PrimaryFirstName = $primaryFirstName;
        }
        return $this;
    }
    /**
     * Get PrimaryLastName value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPrimaryLastName()
    {
        return isset($this->PrimaryLastName) ? $this->PrimaryLastName : null;
    }
    /**
     * Set PrimaryLastName value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $primaryLastName
     * @return \StructType\ContractDocument
     */
    public function setPrimaryLastName($primaryLastName = null)
    {
        // validation for constraint: string
        if (!is_null($primaryLastName) && !is_string($primaryLastName)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($primaryLastName)), __LINE__);
        }
        if (is_null($primaryLastName) || (is_array($primaryLastName) && empty($primaryLastName))) {
            unset($this->PrimaryLastName);
        } else {
            $this->PrimaryLastName = $primaryLastName;
        }
        return $this;
    }
    /**
     * Get PrimaryPassword value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPrimaryPassword()
    {
        return isset($this->PrimaryPassword) ? $this->PrimaryPassword : null;
    }
    /**
     * Set PrimaryPassword value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $primaryPassword
     * @return \StructType\ContractDocument
     */
    public function setPrimaryPassword($primaryPassword = null)
    {
        // validation for constraint: string
        if (!is_null($primaryPassword) && !is_string($primaryPassword)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($primaryPassword)), __LINE__);
        }
        if (is_null($primaryPassword) || (is_array($primaryPassword) && empty($primaryPassword))) {
            unset($this->PrimaryPassword);
        } else {
            $this->PrimaryPassword = $primaryPassword;
        }
        return $this;
    }
    /**
     * Get PrimaryPhone value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPrimaryPhone()
    {
        return isset($this->PrimaryPhone) ? $this->PrimaryPhone : null;
    }
    /**
     * Set PrimaryPhone value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $primaryPhone
     * @return \StructType\ContractDocument
     */
    public function setPrimaryPhone($primaryPhone = null)
    {
        // validation for constraint: string
        if (!is_null($primaryPhone) && !is_string($primaryPhone)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($primaryPhone)), __LINE__);
        }
        if (is_null($primaryPhone) || (is_array($primaryPhone) && empty($primaryPhone))) {
            unset($this->PrimaryPhone);
        } else {
            $this->PrimaryPhone = $primaryPhone;
        }
        return $this;
    }
    /**
     * Get PrimaryTaxIDNumber value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPrimaryTaxIDNumber()
    {
        return isset($this->PrimaryTaxIDNumber) ? $this->PrimaryTaxIDNumber : null;
    }
    /**
     * Set PrimaryTaxIDNumber value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $primaryTaxIDNumber
     * @return \StructType\ContractDocument
     */
    public function setPrimaryTaxIDNumber($primaryTaxIDNumber = null)
    {
        // validation for constraint: string
        if (!is_null($primaryTaxIDNumber) && !is_string($primaryTaxIDNumber)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($primaryTaxIDNumber)), __LINE__);
        }
        if (is_null($primaryTaxIDNumber) || (is_array($primaryTaxIDNumber) && empty($primaryTaxIDNumber))) {
            unset($this->PrimaryTaxIDNumber);
        } else {
            $this->PrimaryTaxIDNumber = $primaryTaxIDNumber;
        }
        return $this;
    }
    /**
     * Get PromotionPeriod value
     * @return int|null
     */
    public function getPromotionPeriod()
    {
        return $this->PromotionPeriod;
    }
    /**
     * Set PromotionPeriod value
     * @param int $promotionPeriod
     * @return \StructType\ContractDocument
     */
    public function setPromotionPeriod($promotionPeriod = null)
    {
        // validation for constraint: int
        if (!is_null($promotionPeriod) && !is_numeric($promotionPeriod)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($promotionPeriod)), __LINE__);
        }
        $this->PromotionPeriod = $promotionPeriod;
        return $this;
    }
    /**
     * Get SecondaryBirthDate value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getSecondaryBirthDate()
    {
        return isset($this->SecondaryBirthDate) ? $this->SecondaryBirthDate : null;
    }
    /**
     * Set SecondaryBirthDate value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $secondaryBirthDate
     * @return \StructType\ContractDocument
     */
    public function setSecondaryBirthDate($secondaryBirthDate = null)
    {
        // validation for constraint: string
        if (!is_null($secondaryBirthDate) && !is_string($secondaryBirthDate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($secondaryBirthDate)), __LINE__);
        }
        if (is_null($secondaryBirthDate) || (is_array($secondaryBirthDate) && empty($secondaryBirthDate))) {
            unset($this->SecondaryBirthDate);
        } else {
            $this->SecondaryBirthDate = $secondaryBirthDate;
        }
        return $this;
    }
    /**
     * Get SecondaryEmail value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getSecondaryEmail()
    {
        return isset($this->SecondaryEmail) ? $this->SecondaryEmail : null;
    }
    /**
     * Set SecondaryEmail value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $secondaryEmail
     * @return \StructType\ContractDocument
     */
    public function setSecondaryEmail($secondaryEmail = null)
    {
        // validation for constraint: string
        if (!is_null($secondaryEmail) && !is_string($secondaryEmail)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($secondaryEmail)), __LINE__);
        }
        if (is_null($secondaryEmail) || (is_array($secondaryEmail) && empty($secondaryEmail))) {
            unset($this->SecondaryEmail);
        } else {
            $this->SecondaryEmail = $secondaryEmail;
        }
        return $this;
    }
    /**
     * Get SecondaryFirstName value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getSecondaryFirstName()
    {
        return isset($this->SecondaryFirstName) ? $this->SecondaryFirstName : null;
    }
    /**
     * Set SecondaryFirstName value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $secondaryFirstName
     * @return \StructType\ContractDocument
     */
    public function setSecondaryFirstName($secondaryFirstName = null)
    {
        // validation for constraint: string
        if (!is_null($secondaryFirstName) && !is_string($secondaryFirstName)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($secondaryFirstName)), __LINE__);
        }
        if (is_null($secondaryFirstName) || (is_array($secondaryFirstName) && empty($secondaryFirstName))) {
            unset($this->SecondaryFirstName);
        } else {
            $this->SecondaryFirstName = $secondaryFirstName;
        }
        return $this;
    }
    /**
     * Get SecondaryLastName value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getSecondaryLastName()
    {
        return isset($this->SecondaryLastName) ? $this->SecondaryLastName : null;
    }
    /**
     * Set SecondaryLastName value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $secondaryLastName
     * @return \StructType\ContractDocument
     */
    public function setSecondaryLastName($secondaryLastName = null)
    {
        // validation for constraint: string
        if (!is_null($secondaryLastName) && !is_string($secondaryLastName)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($secondaryLastName)), __LINE__);
        }
        if (is_null($secondaryLastName) || (is_array($secondaryLastName) && empty($secondaryLastName))) {
            unset($this->SecondaryLastName);
        } else {
            $this->SecondaryLastName = $secondaryLastName;
        }
        return $this;
    }
    /**
     * Get SecondaryPhone value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getSecondaryPhone()
    {
        return isset($this->SecondaryPhone) ? $this->SecondaryPhone : null;
    }
    /**
     * Set SecondaryPhone value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $secondaryPhone
     * @return \StructType\ContractDocument
     */
    public function setSecondaryPhone($secondaryPhone = null)
    {
        // validation for constraint: string
        if (!is_null($secondaryPhone) && !is_string($secondaryPhone)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($secondaryPhone)), __LINE__);
        }
        if (is_null($secondaryPhone) || (is_array($secondaryPhone) && empty($secondaryPhone))) {
            unset($this->SecondaryPhone);
        } else {
            $this->SecondaryPhone = $secondaryPhone;
        }
        return $this;
    }
    /**
     * Get SecondaryTaxIDNumber value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getSecondaryTaxIDNumber()
    {
        return isset($this->SecondaryTaxIDNumber) ? $this->SecondaryTaxIDNumber : null;
    }
    /**
     * Set SecondaryTaxIDNumber value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $secondaryTaxIDNumber
     * @return \StructType\ContractDocument
     */
    public function setSecondaryTaxIDNumber($secondaryTaxIDNumber = null)
    {
        // validation for constraint: string
        if (!is_null($secondaryTaxIDNumber) && !is_string($secondaryTaxIDNumber)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($secondaryTaxIDNumber)), __LINE__);
        }
        if (is_null($secondaryTaxIDNumber) || (is_array($secondaryTaxIDNumber) && empty($secondaryTaxIDNumber))) {
            unset($this->SecondaryTaxIDNumber);
        } else {
            $this->SecondaryTaxIDNumber = $secondaryTaxIDNumber;
        }
        return $this;
    }
    /**
     * Get SurveyCancellingService value
     * @return bool|null
     */
    public function getSurveyCancellingService()
    {
        return $this->SurveyCancellingService;
    }
    /**
     * Set SurveyCancellingService value
     * @param bool $surveyCancellingService
     * @return \StructType\ContractDocument
     */
    public function setSurveyCancellingService($surveyCancellingService = null)
    {
        // validation for constraint: boolean
        if (!is_null($surveyCancellingService) && !is_bool($surveyCancellingService)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($surveyCancellingService)), __LINE__);
        }
        $this->SurveyCancellingService = $surveyCancellingService;
        return $this;
    }
    /**
     * Get SurveyConfirmContractLength value
     * @return bool|null
     */
    public function getSurveyConfirmContractLength()
    {
        return $this->SurveyConfirmContractLength;
    }
    /**
     * Set SurveyConfirmContractLength value
     * @param bool $surveyConfirmContractLength
     * @return \StructType\ContractDocument
     */
    public function setSurveyConfirmContractLength($surveyConfirmContractLength = null)
    {
        // validation for constraint: boolean
        if (!is_null($surveyConfirmContractLength) && !is_bool($surveyConfirmContractLength)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($surveyConfirmContractLength)), __LINE__);
        }
        $this->SurveyConfirmContractLength = $surveyConfirmContractLength;
        return $this;
    }
    /**
     * Get SurveyFamiliarizationPeriod value
     * @return bool|null
     */
    public function getSurveyFamiliarizationPeriod()
    {
        return $this->SurveyFamiliarizationPeriod;
    }
    /**
     * Set SurveyFamiliarizationPeriod value
     * @param bool $surveyFamiliarizationPeriod
     * @return \StructType\ContractDocument
     */
    public function setSurveyFamiliarizationPeriod($surveyFamiliarizationPeriod = null)
    {
        // validation for constraint: boolean
        if (!is_null($surveyFamiliarizationPeriod) && !is_bool($surveyFamiliarizationPeriod)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($surveyFamiliarizationPeriod)), __LINE__);
        }
        $this->SurveyFamiliarizationPeriod = $surveyFamiliarizationPeriod;
        return $this;
    }
    /**
     * Get SurveyHomeowner value
     * @return bool|null
     */
    public function getSurveyHomeowner()
    {
        return $this->SurveyHomeowner;
    }
    /**
     * Set SurveyHomeowner value
     * @param bool $surveyHomeowner
     * @return \StructType\ContractDocument
     */
    public function setSurveyHomeowner($surveyHomeowner = null)
    {
        // validation for constraint: boolean
        if (!is_null($surveyHomeowner) && !is_bool($surveyHomeowner)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($surveyHomeowner)), __LINE__);
        }
        $this->SurveyHomeowner = $surveyHomeowner;
        return $this;
    }
    /**
     * Get SurveyNewConstruction value
     * @return bool|null
     */
    public function getSurveyNewConstruction()
    {
        return $this->SurveyNewConstruction;
    }
    /**
     * Set SurveyNewConstruction value
     * @param bool $surveyNewConstruction
     * @return \StructType\ContractDocument
     */
    public function setSurveyNewConstruction($surveyNewConstruction = null)
    {
        // validation for constraint: boolean
        if (!is_null($surveyNewConstruction) && !is_bool($surveyNewConstruction)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($surveyNewConstruction)), __LINE__);
        }
        $this->SurveyNewConstruction = $surveyNewConstruction;
        return $this;
    }
    /**
     * Get SurveyUnderContract value
     * @return bool|null
     */
    public function getSurveyUnderContract()
    {
        return $this->SurveyUnderContract;
    }
    /**
     * Set SurveyUnderContract value
     * @param bool $surveyUnderContract
     * @return \StructType\ContractDocument
     */
    public function setSurveyUnderContract($surveyUnderContract = null)
    {
        // validation for constraint: boolean
        if (!is_null($surveyUnderContract) && !is_bool($surveyUnderContract)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($surveyUnderContract)), __LINE__);
        }
        $this->SurveyUnderContract = $surveyUnderContract;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\ContractDocument
     */
    public static function __set_state(array $array)
    {
        return parent::__set_state($array);
    }
    /**
     * Method returning the class name
     * @return string __CLASS__
     */
    public function __toString()
    {
        return __CLASS__;
    }
}
