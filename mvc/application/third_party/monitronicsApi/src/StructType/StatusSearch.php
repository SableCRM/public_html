<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for StatusSearch StructType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:StatusSearch
 * @subpackage Structs
 */
class StatusSearch extends AbstractStructBase
{
    /**
     * The ContractID
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var int
     */
    public $ContractID;
    /**
     * The CreatedDate
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $CreatedDate;
    /**
     * The DealerEmail
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $DealerEmail;
    /**
     * The DealerEmailSent
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $DealerEmailSent;
    /**
     * The DealerName
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $DealerName;
    /**
     * The DealerNumber
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $DealerNumber;
    /**
     * The EffectiveDate
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $EffectiveDate;
    /**
     * The EnvelopeID
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $EnvelopeID;
    /**
     * The FirstName
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $FirstName;
    /**
     * The LastName
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $LastName;
    /**
     * The LastUpdateDate
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $LastUpdateDate;
    /**
     * The PhoneNumber
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $PhoneNumber;
    /**
     * The PremiseAddress
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $PremiseAddress;
    /**
     * The PremiseCity
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $PremiseCity;
    /**
     * The PremiseState
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
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
     * The SalesRepName
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $SalesRepName;
    /**
     * The Status
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Status;
    /**
     * The StatusSearchID
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var int
     */
    public $StatusSearchID;
    /**
     * Constructor method for StatusSearch
     * @uses StatusSearch::setContractID()
     * @uses StatusSearch::setCreatedDate()
     * @uses StatusSearch::setDealerEmail()
     * @uses StatusSearch::setDealerEmailSent()
     * @uses StatusSearch::setDealerName()
     * @uses StatusSearch::setDealerNumber()
     * @uses StatusSearch::setEffectiveDate()
     * @uses StatusSearch::setEnvelopeID()
     * @uses StatusSearch::setFirstName()
     * @uses StatusSearch::setLastName()
     * @uses StatusSearch::setLastUpdateDate()
     * @uses StatusSearch::setPhoneNumber()
     * @uses StatusSearch::setPremiseAddress()
     * @uses StatusSearch::setPremiseCity()
     * @uses StatusSearch::setPremiseState()
     * @uses StatusSearch::setPremiseZip()
     * @uses StatusSearch::setSalesRepName()
     * @uses StatusSearch::setStatus()
     * @uses StatusSearch::setStatusSearchID()
     * @param int $contractID
     * @param string $createdDate
     * @param string $dealerEmail
     * @param string $dealerEmailSent
     * @param string $dealerName
     * @param string $dealerNumber
     * @param string $effectiveDate
     * @param string $envelopeID
     * @param string $firstName
     * @param string $lastName
     * @param string $lastUpdateDate
     * @param string $phoneNumber
     * @param string $premiseAddress
     * @param string $premiseCity
     * @param string $premiseState
     * @param string $premiseZip
     * @param string $salesRepName
     * @param string $status
     * @param int $statusSearchID
     */
    public function __construct($contractID = null, $createdDate = null, $dealerEmail = null, $dealerEmailSent = null, $dealerName = null, $dealerNumber = null, $effectiveDate = null, $envelopeID = null, $firstName = null, $lastName = null, $lastUpdateDate = null, $phoneNumber = null, $premiseAddress = null, $premiseCity = null, $premiseState = null, $premiseZip = null, $salesRepName = null, $status = null, $statusSearchID = null)
    {
        $this
            ->setContractID($contractID)
            ->setCreatedDate($createdDate)
            ->setDealerEmail($dealerEmail)
            ->setDealerEmailSent($dealerEmailSent)
            ->setDealerName($dealerName)
            ->setDealerNumber($dealerNumber)
            ->setEffectiveDate($effectiveDate)
            ->setEnvelopeID($envelopeID)
            ->setFirstName($firstName)
            ->setLastName($lastName)
            ->setLastUpdateDate($lastUpdateDate)
            ->setPhoneNumber($phoneNumber)
            ->setPremiseAddress($premiseAddress)
            ->setPremiseCity($premiseCity)
            ->setPremiseState($premiseState)
            ->setPremiseZip($premiseZip)
            ->setSalesRepName($salesRepName)
            ->setStatus($status)
            ->setStatusSearchID($statusSearchID);
    }
    /**
     * Get ContractID value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return int|null
     */
    public function getContractID()
    {
        return isset($this->ContractID) ? $this->ContractID : null;
    }
    /**
     * Set ContractID value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param int $contractID
     * @return \StructType\StatusSearch
     */
    public function setContractID($contractID = null)
    {
        // validation for constraint: int
        if (!is_null($contractID) && !is_numeric($contractID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($contractID)), __LINE__);
        }
        if (is_null($contractID) || (is_array($contractID) && empty($contractID))) {
            unset($this->ContractID);
        } else {
            $this->ContractID = $contractID;
        }
        return $this;
    }
    /**
     * Get CreatedDate value
     * @return string|null
     */
    public function getCreatedDate()
    {
        return $this->CreatedDate;
    }
    /**
     * Set CreatedDate value
     * @param string $createdDate
     * @return \StructType\StatusSearch
     */
    public function setCreatedDate($createdDate = null)
    {
        // validation for constraint: string
        if (!is_null($createdDate) && !is_string($createdDate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($createdDate)), __LINE__);
        }
        $this->CreatedDate = $createdDate;
        return $this;
    }
    /**
     * Get DealerEmail value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getDealerEmail()
    {
        return isset($this->DealerEmail) ? $this->DealerEmail : null;
    }
    /**
     * Set DealerEmail value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $dealerEmail
     * @return \StructType\StatusSearch
     */
    public function setDealerEmail($dealerEmail = null)
    {
        // validation for constraint: string
        if (!is_null($dealerEmail) && !is_string($dealerEmail)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($dealerEmail)), __LINE__);
        }
        if (is_null($dealerEmail) || (is_array($dealerEmail) && empty($dealerEmail))) {
            unset($this->DealerEmail);
        } else {
            $this->DealerEmail = $dealerEmail;
        }
        return $this;
    }
    /**
     * Get DealerEmailSent value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getDealerEmailSent()
    {
        return isset($this->DealerEmailSent) ? $this->DealerEmailSent : null;
    }
    /**
     * Set DealerEmailSent value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $dealerEmailSent
     * @return \StructType\StatusSearch
     */
    public function setDealerEmailSent($dealerEmailSent = null)
    {
        // validation for constraint: string
        if (!is_null($dealerEmailSent) && !is_string($dealerEmailSent)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($dealerEmailSent)), __LINE__);
        }
        if (is_null($dealerEmailSent) || (is_array($dealerEmailSent) && empty($dealerEmailSent))) {
            unset($this->DealerEmailSent);
        } else {
            $this->DealerEmailSent = $dealerEmailSent;
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
     * @return \StructType\StatusSearch
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
     * Get DealerNumber value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getDealerNumber()
    {
        return isset($this->DealerNumber) ? $this->DealerNumber : null;
    }
    /**
     * Set DealerNumber value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $dealerNumber
     * @return \StructType\StatusSearch
     */
    public function setDealerNumber($dealerNumber = null)
    {
        // validation for constraint: string
        if (!is_null($dealerNumber) && !is_string($dealerNumber)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($dealerNumber)), __LINE__);
        }
        if (is_null($dealerNumber) || (is_array($dealerNumber) && empty($dealerNumber))) {
            unset($this->DealerNumber);
        } else {
            $this->DealerNumber = $dealerNumber;
        }
        return $this;
    }
    /**
     * Get EffectiveDate value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getEffectiveDate()
    {
        return isset($this->EffectiveDate) ? $this->EffectiveDate : null;
    }
    /**
     * Set EffectiveDate value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $effectiveDate
     * @return \StructType\StatusSearch
     */
    public function setEffectiveDate($effectiveDate = null)
    {
        // validation for constraint: string
        if (!is_null($effectiveDate) && !is_string($effectiveDate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($effectiveDate)), __LINE__);
        }
        if (is_null($effectiveDate) || (is_array($effectiveDate) && empty($effectiveDate))) {
            unset($this->EffectiveDate);
        } else {
            $this->EffectiveDate = $effectiveDate;
        }
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
     * @return \StructType\StatusSearch
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
     * Get FirstName value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getFirstName()
    {
        return isset($this->FirstName) ? $this->FirstName : null;
    }
    /**
     * Set FirstName value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $firstName
     * @return \StructType\StatusSearch
     */
    public function setFirstName($firstName = null)
    {
        // validation for constraint: string
        if (!is_null($firstName) && !is_string($firstName)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($firstName)), __LINE__);
        }
        if (is_null($firstName) || (is_array($firstName) && empty($firstName))) {
            unset($this->FirstName);
        } else {
            $this->FirstName = $firstName;
        }
        return $this;
    }
    /**
     * Get LastName value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getLastName()
    {
        return isset($this->LastName) ? $this->LastName : null;
    }
    /**
     * Set LastName value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $lastName
     * @return \StructType\StatusSearch
     */
    public function setLastName($lastName = null)
    {
        // validation for constraint: string
        if (!is_null($lastName) && !is_string($lastName)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($lastName)), __LINE__);
        }
        if (is_null($lastName) || (is_array($lastName) && empty($lastName))) {
            unset($this->LastName);
        } else {
            $this->LastName = $lastName;
        }
        return $this;
    }
    /**
     * Get LastUpdateDate value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getLastUpdateDate()
    {
        return isset($this->LastUpdateDate) ? $this->LastUpdateDate : null;
    }
    /**
     * Set LastUpdateDate value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $lastUpdateDate
     * @return \StructType\StatusSearch
     */
    public function setLastUpdateDate($lastUpdateDate = null)
    {
        // validation for constraint: string
        if (!is_null($lastUpdateDate) && !is_string($lastUpdateDate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($lastUpdateDate)), __LINE__);
        }
        if (is_null($lastUpdateDate) || (is_array($lastUpdateDate) && empty($lastUpdateDate))) {
            unset($this->LastUpdateDate);
        } else {
            $this->LastUpdateDate = $lastUpdateDate;
        }
        return $this;
    }
    /**
     * Get PhoneNumber value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPhoneNumber()
    {
        return isset($this->PhoneNumber) ? $this->PhoneNumber : null;
    }
    /**
     * Set PhoneNumber value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $phoneNumber
     * @return \StructType\StatusSearch
     */
    public function setPhoneNumber($phoneNumber = null)
    {
        // validation for constraint: string
        if (!is_null($phoneNumber) && !is_string($phoneNumber)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($phoneNumber)), __LINE__);
        }
        if (is_null($phoneNumber) || (is_array($phoneNumber) && empty($phoneNumber))) {
            unset($this->PhoneNumber);
        } else {
            $this->PhoneNumber = $phoneNumber;
        }
        return $this;
    }
    /**
     * Get PremiseAddress value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPremiseAddress()
    {
        return isset($this->PremiseAddress) ? $this->PremiseAddress : null;
    }
    /**
     * Set PremiseAddress value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $premiseAddress
     * @return \StructType\StatusSearch
     */
    public function setPremiseAddress($premiseAddress = null)
    {
        // validation for constraint: string
        if (!is_null($premiseAddress) && !is_string($premiseAddress)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($premiseAddress)), __LINE__);
        }
        if (is_null($premiseAddress) || (is_array($premiseAddress) && empty($premiseAddress))) {
            unset($this->PremiseAddress);
        } else {
            $this->PremiseAddress = $premiseAddress;
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
     * @return \StructType\StatusSearch
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
     * Get PremiseState value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPremiseState()
    {
        return isset($this->PremiseState) ? $this->PremiseState : null;
    }
    /**
     * Set PremiseState value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $premiseState
     * @return \StructType\StatusSearch
     */
    public function setPremiseState($premiseState = null)
    {
        // validation for constraint: string
        if (!is_null($premiseState) && !is_string($premiseState)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($premiseState)), __LINE__);
        }
        if (is_null($premiseState) || (is_array($premiseState) && empty($premiseState))) {
            unset($this->PremiseState);
        } else {
            $this->PremiseState = $premiseState;
        }
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
     * @return \StructType\StatusSearch
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
     * Get SalesRepName value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getSalesRepName()
    {
        return isset($this->SalesRepName) ? $this->SalesRepName : null;
    }
    /**
     * Set SalesRepName value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $salesRepName
     * @return \StructType\StatusSearch
     */
    public function setSalesRepName($salesRepName = null)
    {
        // validation for constraint: string
        if (!is_null($salesRepName) && !is_string($salesRepName)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($salesRepName)), __LINE__);
        }
        if (is_null($salesRepName) || (is_array($salesRepName) && empty($salesRepName))) {
            unset($this->SalesRepName);
        } else {
            $this->SalesRepName = $salesRepName;
        }
        return $this;
    }
    /**
     * Get Status value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getStatus()
    {
        return isset($this->Status) ? $this->Status : null;
    }
    /**
     * Set Status value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $status
     * @return \StructType\StatusSearch
     */
    public function setStatus($status = null)
    {
        // validation for constraint: string
        if (!is_null($status) && !is_string($status)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($status)), __LINE__);
        }
        if (is_null($status) || (is_array($status) && empty($status))) {
            unset($this->Status);
        } else {
            $this->Status = $status;
        }
        return $this;
    }
    /**
     * Get StatusSearchID value
     * @return int|null
     */
    public function getStatusSearchID()
    {
        return $this->StatusSearchID;
    }
    /**
     * Set StatusSearchID value
     * @param int $statusSearchID
     * @return \StructType\StatusSearch
     */
    public function setStatusSearchID($statusSearchID = null)
    {
        // validation for constraint: int
        if (!is_null($statusSearchID) && !is_numeric($statusSearchID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($statusSearchID)), __LINE__);
        }
        $this->StatusSearchID = $statusSearchID;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\StatusSearch
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
