<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for DealerInfo StructType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:DealerInfo
 * @subpackage Structs
 */
class DealerInfo extends AbstractStructBase
{
    /**
     * The ExtensionData
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \StructType\ExtensionDataObject
     */
    public $ExtensionData;
    /**
     * The CMDealerNo
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $CMDealerNo;
    /**
     * The DealerName
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $DealerName;
    /**
     * The InsuranceCompany
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $InsuranceCompany;
    /**
     * The InsuranceExpirationDate
     * @var string
     */
    public $InsuranceExpirationDate;
    /**
     * The InsurancePolicyNo
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $InsurancePolicyNo;
    /**
     * The InsuranceStatus
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $InsuranceStatus;
    /**
     * The MASDealerNo
     * @var int
     */
    public $MASDealerNo;
    /**
     * The MailingAddress
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $MailingAddress;
    /**
     * The MailingCity
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $MailingCity;
    /**
     * The MailingCounty
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $MailingCounty;
    /**
     * The MailingState
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $MailingState;
    /**
     * The MailingZip
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $MailingZip;
    /**
     * The MainFax
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $MainFax;
    /**
     * The MainPhone
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $MainPhone;
    /**
     * The PrimaryMASPin
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $PrimaryMASPin;
    /**
     * The PurchaseDealerNo
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $PurchaseDealerNo;
    /**
     * The PurchaseFundingTypeID
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $PurchaseFundingTypeID;
    /**
     * The ServiceDealerNo
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $ServiceDealerNo;
    /**
     * The ServiceFax
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $ServiceFax;
    /**
     * The ServiceFundingTypeID
     * @var int
     */
    public $ServiceFundingTypeID;
    /**
     * The ServicePhone
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $ServicePhone;
    /**
     * The ShippingAddress
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $ShippingAddress;
    /**
     * The ShippingCity
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $ShippingCity;
    /**
     * The ShippingCounty
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $ShippingCounty;
    /**
     * The ShippingState
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $ShippingState;
    /**
     * The ShippingZip
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $ShippingZip;
    /**
     * Constructor method for DealerInfo
     * @uses DealerInfo::setExtensionData()
     * @uses DealerInfo::setCMDealerNo()
     * @uses DealerInfo::setDealerName()
     * @uses DealerInfo::setInsuranceCompany()
     * @uses DealerInfo::setInsuranceExpirationDate()
     * @uses DealerInfo::setInsurancePolicyNo()
     * @uses DealerInfo::setInsuranceStatus()
     * @uses DealerInfo::setMASDealerNo()
     * @uses DealerInfo::setMailingAddress()
     * @uses DealerInfo::setMailingCity()
     * @uses DealerInfo::setMailingCounty()
     * @uses DealerInfo::setMailingState()
     * @uses DealerInfo::setMailingZip()
     * @uses DealerInfo::setMainFax()
     * @uses DealerInfo::setMainPhone()
     * @uses DealerInfo::setPrimaryMASPin()
     * @uses DealerInfo::setPurchaseDealerNo()
     * @uses DealerInfo::setPurchaseFundingTypeID()
     * @uses DealerInfo::setServiceDealerNo()
     * @uses DealerInfo::setServiceFax()
     * @uses DealerInfo::setServiceFundingTypeID()
     * @uses DealerInfo::setServicePhone()
     * @uses DealerInfo::setShippingAddress()
     * @uses DealerInfo::setShippingCity()
     * @uses DealerInfo::setShippingCounty()
     * @uses DealerInfo::setShippingState()
     * @uses DealerInfo::setShippingZip()
     * @param \StructType\ExtensionDataObject $extensionData
     * @param string $cMDealerNo
     * @param string $dealerName
     * @param string $insuranceCompany
     * @param string $insuranceExpirationDate
     * @param string $insurancePolicyNo
     * @param string $insuranceStatus
     * @param int $mASDealerNo
     * @param string $mailingAddress
     * @param string $mailingCity
     * @param string $mailingCounty
     * @param string $mailingState
     * @param string $mailingZip
     * @param string $mainFax
     * @param string $mainPhone
     * @param string $primaryMASPin
     * @param string $purchaseDealerNo
     * @param string $purchaseFundingTypeID
     * @param string $serviceDealerNo
     * @param string $serviceFax
     * @param int $serviceFundingTypeID
     * @param string $servicePhone
     * @param string $shippingAddress
     * @param string $shippingCity
     * @param string $shippingCounty
     * @param string $shippingState
     * @param string $shippingZip
     */
    public function __construct(\StructType\ExtensionDataObject $extensionData = null, $cMDealerNo = null, $dealerName = null, $insuranceCompany = null, $insuranceExpirationDate = null, $insurancePolicyNo = null, $insuranceStatus = null, $mASDealerNo = null, $mailingAddress = null, $mailingCity = null, $mailingCounty = null, $mailingState = null, $mailingZip = null, $mainFax = null, $mainPhone = null, $primaryMASPin = null, $purchaseDealerNo = null, $purchaseFundingTypeID = null, $serviceDealerNo = null, $serviceFax = null, $serviceFundingTypeID = null, $servicePhone = null, $shippingAddress = null, $shippingCity = null, $shippingCounty = null, $shippingState = null, $shippingZip = null)
    {
        $this
            ->setExtensionData($extensionData)
            ->setCMDealerNo($cMDealerNo)
            ->setDealerName($dealerName)
            ->setInsuranceCompany($insuranceCompany)
            ->setInsuranceExpirationDate($insuranceExpirationDate)
            ->setInsurancePolicyNo($insurancePolicyNo)
            ->setInsuranceStatus($insuranceStatus)
            ->setMASDealerNo($mASDealerNo)
            ->setMailingAddress($mailingAddress)
            ->setMailingCity($mailingCity)
            ->setMailingCounty($mailingCounty)
            ->setMailingState($mailingState)
            ->setMailingZip($mailingZip)
            ->setMainFax($mainFax)
            ->setMainPhone($mainPhone)
            ->setPrimaryMASPin($primaryMASPin)
            ->setPurchaseDealerNo($purchaseDealerNo)
            ->setPurchaseFundingTypeID($purchaseFundingTypeID)
            ->setServiceDealerNo($serviceDealerNo)
            ->setServiceFax($serviceFax)
            ->setServiceFundingTypeID($serviceFundingTypeID)
            ->setServicePhone($servicePhone)
            ->setShippingAddress($shippingAddress)
            ->setShippingCity($shippingCity)
            ->setShippingCounty($shippingCounty)
            ->setShippingState($shippingState)
            ->setShippingZip($shippingZip);
    }
    /**
     * Get ExtensionData value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \StructType\ExtensionDataObject|null
     */
    public function getExtensionData()
    {
        return isset($this->ExtensionData) ? $this->ExtensionData : null;
    }
    /**
     * Set ExtensionData value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \StructType\ExtensionDataObject $extensionData
     * @return \StructType\DealerInfo
     */
    public function setExtensionData(\StructType\ExtensionDataObject $extensionData = null)
    {
        if (is_null($extensionData) || (is_array($extensionData) && empty($extensionData))) {
            unset($this->ExtensionData);
        } else {
            $this->ExtensionData = $extensionData;
        }
        return $this;
    }
    /**
     * Get CMDealerNo value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getCMDealerNo()
    {
        return isset($this->CMDealerNo) ? $this->CMDealerNo : null;
    }
    /**
     * Set CMDealerNo value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $cMDealerNo
     * @return \StructType\DealerInfo
     */
    public function setCMDealerNo($cMDealerNo = null)
    {
        // validation for constraint: string
        if (!is_null($cMDealerNo) && !is_string($cMDealerNo)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($cMDealerNo)), __LINE__);
        }
        if (is_null($cMDealerNo) || (is_array($cMDealerNo) && empty($cMDealerNo))) {
            unset($this->CMDealerNo);
        } else {
            $this->CMDealerNo = $cMDealerNo;
        }
        return $this;
    }
    /**
     * Get DealerName value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getDealerName()
    {
        return isset($this->DealerName) ? $this->DealerName : null;
    }
    /**
     * Set DealerName value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $dealerName
     * @return \StructType\DealerInfo
     */
    public function setDealerName($dealerName = null)
    {
        // validation for constraint: string
        if (!is_null($dealerName) && !is_string($dealerName)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($dealerName)), __LINE__);
        }
        if (is_null($dealerName) || (is_array($dealerName) && empty($dealerName))) {
            unset($this->DealerName);
        } else {
            $this->DealerName = $dealerName;
        }
        return $this;
    }
    /**
     * Get InsuranceCompany value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getInsuranceCompany()
    {
        return isset($this->InsuranceCompany) ? $this->InsuranceCompany : null;
    }
    /**
     * Set InsuranceCompany value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $insuranceCompany
     * @return \StructType\DealerInfo
     */
    public function setInsuranceCompany($insuranceCompany = null)
    {
        // validation for constraint: string
        if (!is_null($insuranceCompany) && !is_string($insuranceCompany)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($insuranceCompany)), __LINE__);
        }
        if (is_null($insuranceCompany) || (is_array($insuranceCompany) && empty($insuranceCompany))) {
            unset($this->InsuranceCompany);
        } else {
            $this->InsuranceCompany = $insuranceCompany;
        }
        return $this;
    }
    /**
     * Get InsuranceExpirationDate value
     * @return string|null
     */
    public function getInsuranceExpirationDate()
    {
        return $this->InsuranceExpirationDate;
    }
    /**
     * Set InsuranceExpirationDate value
     * @param string $insuranceExpirationDate
     * @return \StructType\DealerInfo
     */
    public function setInsuranceExpirationDate($insuranceExpirationDate = null)
    {
        // validation for constraint: string
        if (!is_null($insuranceExpirationDate) && !is_string($insuranceExpirationDate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($insuranceExpirationDate)), __LINE__);
        }
        $this->InsuranceExpirationDate = $insuranceExpirationDate;
        return $this;
    }
    /**
     * Get InsurancePolicyNo value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getInsurancePolicyNo()
    {
        return isset($this->InsurancePolicyNo) ? $this->InsurancePolicyNo : null;
    }
    /**
     * Set InsurancePolicyNo value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $insurancePolicyNo
     * @return \StructType\DealerInfo
     */
    public function setInsurancePolicyNo($insurancePolicyNo = null)
    {
        // validation for constraint: string
        if (!is_null($insurancePolicyNo) && !is_string($insurancePolicyNo)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($insurancePolicyNo)), __LINE__);
        }
        if (is_null($insurancePolicyNo) || (is_array($insurancePolicyNo) && empty($insurancePolicyNo))) {
            unset($this->InsurancePolicyNo);
        } else {
            $this->InsurancePolicyNo = $insurancePolicyNo;
        }
        return $this;
    }
    /**
     * Get InsuranceStatus value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getInsuranceStatus()
    {
        return isset($this->InsuranceStatus) ? $this->InsuranceStatus : null;
    }
    /**
     * Set InsuranceStatus value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $insuranceStatus
     * @return \StructType\DealerInfo
     */
    public function setInsuranceStatus($insuranceStatus = null)
    {
        // validation for constraint: string
        if (!is_null($insuranceStatus) && !is_string($insuranceStatus)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($insuranceStatus)), __LINE__);
        }
        if (is_null($insuranceStatus) || (is_array($insuranceStatus) && empty($insuranceStatus))) {
            unset($this->InsuranceStatus);
        } else {
            $this->InsuranceStatus = $insuranceStatus;
        }
        return $this;
    }
    /**
     * Get MASDealerNo value
     * @return int|null
     */
    public function getMASDealerNo()
    {
        return $this->MASDealerNo;
    }
    /**
     * Set MASDealerNo value
     * @param int $mASDealerNo
     * @return \StructType\DealerInfo
     */
    public function setMASDealerNo($mASDealerNo = null)
    {
        // validation for constraint: int
        if (!is_null($mASDealerNo) && !is_numeric($mASDealerNo)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($mASDealerNo)), __LINE__);
        }
        $this->MASDealerNo = $mASDealerNo;
        return $this;
    }
    /**
     * Get MailingAddress value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getMailingAddress()
    {
        return isset($this->MailingAddress) ? $this->MailingAddress : null;
    }
    /**
     * Set MailingAddress value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $mailingAddress
     * @return \StructType\DealerInfo
     */
    public function setMailingAddress($mailingAddress = null)
    {
        // validation for constraint: string
        if (!is_null($mailingAddress) && !is_string($mailingAddress)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($mailingAddress)), __LINE__);
        }
        if (is_null($mailingAddress) || (is_array($mailingAddress) && empty($mailingAddress))) {
            unset($this->MailingAddress);
        } else {
            $this->MailingAddress = $mailingAddress;
        }
        return $this;
    }
    /**
     * Get MailingCity value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getMailingCity()
    {
        return isset($this->MailingCity) ? $this->MailingCity : null;
    }
    /**
     * Set MailingCity value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $mailingCity
     * @return \StructType\DealerInfo
     */
    public function setMailingCity($mailingCity = null)
    {
        // validation for constraint: string
        if (!is_null($mailingCity) && !is_string($mailingCity)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($mailingCity)), __LINE__);
        }
        if (is_null($mailingCity) || (is_array($mailingCity) && empty($mailingCity))) {
            unset($this->MailingCity);
        } else {
            $this->MailingCity = $mailingCity;
        }
        return $this;
    }
    /**
     * Get MailingCounty value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getMailingCounty()
    {
        return isset($this->MailingCounty) ? $this->MailingCounty : null;
    }
    /**
     * Set MailingCounty value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $mailingCounty
     * @return \StructType\DealerInfo
     */
    public function setMailingCounty($mailingCounty = null)
    {
        // validation for constraint: string
        if (!is_null($mailingCounty) && !is_string($mailingCounty)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($mailingCounty)), __LINE__);
        }
        if (is_null($mailingCounty) || (is_array($mailingCounty) && empty($mailingCounty))) {
            unset($this->MailingCounty);
        } else {
            $this->MailingCounty = $mailingCounty;
        }
        return $this;
    }
    /**
     * Get MailingState value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getMailingState()
    {
        return isset($this->MailingState) ? $this->MailingState : null;
    }
    /**
     * Set MailingState value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $mailingState
     * @return \StructType\DealerInfo
     */
    public function setMailingState($mailingState = null)
    {
        // validation for constraint: string
        if (!is_null($mailingState) && !is_string($mailingState)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($mailingState)), __LINE__);
        }
        if (is_null($mailingState) || (is_array($mailingState) && empty($mailingState))) {
            unset($this->MailingState);
        } else {
            $this->MailingState = $mailingState;
        }
        return $this;
    }
    /**
     * Get MailingZip value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getMailingZip()
    {
        return isset($this->MailingZip) ? $this->MailingZip : null;
    }
    /**
     * Set MailingZip value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $mailingZip
     * @return \StructType\DealerInfo
     */
    public function setMailingZip($mailingZip = null)
    {
        // validation for constraint: string
        if (!is_null($mailingZip) && !is_string($mailingZip)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($mailingZip)), __LINE__);
        }
        if (is_null($mailingZip) || (is_array($mailingZip) && empty($mailingZip))) {
            unset($this->MailingZip);
        } else {
            $this->MailingZip = $mailingZip;
        }
        return $this;
    }
    /**
     * Get MainFax value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getMainFax()
    {
        return isset($this->MainFax) ? $this->MainFax : null;
    }
    /**
     * Set MainFax value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $mainFax
     * @return \StructType\DealerInfo
     */
    public function setMainFax($mainFax = null)
    {
        // validation for constraint: string
        if (!is_null($mainFax) && !is_string($mainFax)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($mainFax)), __LINE__);
        }
        if (is_null($mainFax) || (is_array($mainFax) && empty($mainFax))) {
            unset($this->MainFax);
        } else {
            $this->MainFax = $mainFax;
        }
        return $this;
    }
    /**
     * Get MainPhone value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getMainPhone()
    {
        return isset($this->MainPhone) ? $this->MainPhone : null;
    }
    /**
     * Set MainPhone value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $mainPhone
     * @return \StructType\DealerInfo
     */
    public function setMainPhone($mainPhone = null)
    {
        // validation for constraint: string
        if (!is_null($mainPhone) && !is_string($mainPhone)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($mainPhone)), __LINE__);
        }
        if (is_null($mainPhone) || (is_array($mainPhone) && empty($mainPhone))) {
            unset($this->MainPhone);
        } else {
            $this->MainPhone = $mainPhone;
        }
        return $this;
    }
    /**
     * Get PrimaryMASPin value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPrimaryMASPin()
    {
        return isset($this->PrimaryMASPin) ? $this->PrimaryMASPin : null;
    }
    /**
     * Set PrimaryMASPin value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $primaryMASPin
     * @return \StructType\DealerInfo
     */
    public function setPrimaryMASPin($primaryMASPin = null)
    {
        // validation for constraint: string
        if (!is_null($primaryMASPin) && !is_string($primaryMASPin)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($primaryMASPin)), __LINE__);
        }
        if (is_null($primaryMASPin) || (is_array($primaryMASPin) && empty($primaryMASPin))) {
            unset($this->PrimaryMASPin);
        } else {
            $this->PrimaryMASPin = $primaryMASPin;
        }
        return $this;
    }
    /**
     * Get PurchaseDealerNo value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPurchaseDealerNo()
    {
        return isset($this->PurchaseDealerNo) ? $this->PurchaseDealerNo : null;
    }
    /**
     * Set PurchaseDealerNo value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $purchaseDealerNo
     * @return \StructType\DealerInfo
     */
    public function setPurchaseDealerNo($purchaseDealerNo = null)
    {
        // validation for constraint: string
        if (!is_null($purchaseDealerNo) && !is_string($purchaseDealerNo)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($purchaseDealerNo)), __LINE__);
        }
        if (is_null($purchaseDealerNo) || (is_array($purchaseDealerNo) && empty($purchaseDealerNo))) {
            unset($this->PurchaseDealerNo);
        } else {
            $this->PurchaseDealerNo = $purchaseDealerNo;
        }
        return $this;
    }
    /**
     * Get PurchaseFundingTypeID value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPurchaseFundingTypeID()
    {
        return isset($this->PurchaseFundingTypeID) ? $this->PurchaseFundingTypeID : null;
    }
    /**
     * Set PurchaseFundingTypeID value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $purchaseFundingTypeID
     * @return \StructType\DealerInfo
     */
    public function setPurchaseFundingTypeID($purchaseFundingTypeID = null)
    {
        // validation for constraint: string
        if (!is_null($purchaseFundingTypeID) && !is_string($purchaseFundingTypeID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($purchaseFundingTypeID)), __LINE__);
        }
        if (is_null($purchaseFundingTypeID) || (is_array($purchaseFundingTypeID) && empty($purchaseFundingTypeID))) {
            unset($this->PurchaseFundingTypeID);
        } else {
            $this->PurchaseFundingTypeID = $purchaseFundingTypeID;
        }
        return $this;
    }
    /**
     * Get ServiceDealerNo value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getServiceDealerNo()
    {
        return isset($this->ServiceDealerNo) ? $this->ServiceDealerNo : null;
    }
    /**
     * Set ServiceDealerNo value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $serviceDealerNo
     * @return \StructType\DealerInfo
     */
    public function setServiceDealerNo($serviceDealerNo = null)
    {
        // validation for constraint: string
        if (!is_null($serviceDealerNo) && !is_string($serviceDealerNo)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($serviceDealerNo)), __LINE__);
        }
        if (is_null($serviceDealerNo) || (is_array($serviceDealerNo) && empty($serviceDealerNo))) {
            unset($this->ServiceDealerNo);
        } else {
            $this->ServiceDealerNo = $serviceDealerNo;
        }
        return $this;
    }
    /**
     * Get ServiceFax value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getServiceFax()
    {
        return isset($this->ServiceFax) ? $this->ServiceFax : null;
    }
    /**
     * Set ServiceFax value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $serviceFax
     * @return \StructType\DealerInfo
     */
    public function setServiceFax($serviceFax = null)
    {
        // validation for constraint: string
        if (!is_null($serviceFax) && !is_string($serviceFax)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($serviceFax)), __LINE__);
        }
        if (is_null($serviceFax) || (is_array($serviceFax) && empty($serviceFax))) {
            unset($this->ServiceFax);
        } else {
            $this->ServiceFax = $serviceFax;
        }
        return $this;
    }
    /**
     * Get ServiceFundingTypeID value
     * @return int|null
     */
    public function getServiceFundingTypeID()
    {
        return $this->ServiceFundingTypeID;
    }
    /**
     * Set ServiceFundingTypeID value
     * @param int $serviceFundingTypeID
     * @return \StructType\DealerInfo
     */
    public function setServiceFundingTypeID($serviceFundingTypeID = null)
    {
        // validation for constraint: int
        if (!is_null($serviceFundingTypeID) && !is_numeric($serviceFundingTypeID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($serviceFundingTypeID)), __LINE__);
        }
        $this->ServiceFundingTypeID = $serviceFundingTypeID;
        return $this;
    }
    /**
     * Get ServicePhone value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getServicePhone()
    {
        return isset($this->ServicePhone) ? $this->ServicePhone : null;
    }
    /**
     * Set ServicePhone value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $servicePhone
     * @return \StructType\DealerInfo
     */
    public function setServicePhone($servicePhone = null)
    {
        // validation for constraint: string
        if (!is_null($servicePhone) && !is_string($servicePhone)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($servicePhone)), __LINE__);
        }
        if (is_null($servicePhone) || (is_array($servicePhone) && empty($servicePhone))) {
            unset($this->ServicePhone);
        } else {
            $this->ServicePhone = $servicePhone;
        }
        return $this;
    }
    /**
     * Get ShippingAddress value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getShippingAddress()
    {
        return isset($this->ShippingAddress) ? $this->ShippingAddress : null;
    }
    /**
     * Set ShippingAddress value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $shippingAddress
     * @return \StructType\DealerInfo
     */
    public function setShippingAddress($shippingAddress = null)
    {
        // validation for constraint: string
        if (!is_null($shippingAddress) && !is_string($shippingAddress)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($shippingAddress)), __LINE__);
        }
        if (is_null($shippingAddress) || (is_array($shippingAddress) && empty($shippingAddress))) {
            unset($this->ShippingAddress);
        } else {
            $this->ShippingAddress = $shippingAddress;
        }
        return $this;
    }
    /**
     * Get ShippingCity value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getShippingCity()
    {
        return isset($this->ShippingCity) ? $this->ShippingCity : null;
    }
    /**
     * Set ShippingCity value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $shippingCity
     * @return \StructType\DealerInfo
     */
    public function setShippingCity($shippingCity = null)
    {
        // validation for constraint: string
        if (!is_null($shippingCity) && !is_string($shippingCity)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($shippingCity)), __LINE__);
        }
        if (is_null($shippingCity) || (is_array($shippingCity) && empty($shippingCity))) {
            unset($this->ShippingCity);
        } else {
            $this->ShippingCity = $shippingCity;
        }
        return $this;
    }
    /**
     * Get ShippingCounty value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getShippingCounty()
    {
        return isset($this->ShippingCounty) ? $this->ShippingCounty : null;
    }
    /**
     * Set ShippingCounty value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $shippingCounty
     * @return \StructType\DealerInfo
     */
    public function setShippingCounty($shippingCounty = null)
    {
        // validation for constraint: string
        if (!is_null($shippingCounty) && !is_string($shippingCounty)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($shippingCounty)), __LINE__);
        }
        if (is_null($shippingCounty) || (is_array($shippingCounty) && empty($shippingCounty))) {
            unset($this->ShippingCounty);
        } else {
            $this->ShippingCounty = $shippingCounty;
        }
        return $this;
    }
    /**
     * Get ShippingState value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getShippingState()
    {
        return isset($this->ShippingState) ? $this->ShippingState : null;
    }
    /**
     * Set ShippingState value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $shippingState
     * @return \StructType\DealerInfo
     */
    public function setShippingState($shippingState = null)
    {
        // validation for constraint: string
        if (!is_null($shippingState) && !is_string($shippingState)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($shippingState)), __LINE__);
        }
        if (is_null($shippingState) || (is_array($shippingState) && empty($shippingState))) {
            unset($this->ShippingState);
        } else {
            $this->ShippingState = $shippingState;
        }
        return $this;
    }
    /**
     * Get ShippingZip value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getShippingZip()
    {
        return isset($this->ShippingZip) ? $this->ShippingZip : null;
    }
    /**
     * Set ShippingZip value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $shippingZip
     * @return \StructType\DealerInfo
     */
    public function setShippingZip($shippingZip = null)
    {
        // validation for constraint: string
        if (!is_null($shippingZip) && !is_string($shippingZip)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($shippingZip)), __LINE__);
        }
        if (is_null($shippingZip) || (is_array($shippingZip) && empty($shippingZip))) {
            unset($this->ShippingZip);
        } else {
            $this->ShippingZip = $shippingZip;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\DealerInfo
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
