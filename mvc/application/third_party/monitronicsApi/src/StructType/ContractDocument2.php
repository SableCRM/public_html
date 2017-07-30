<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for ContractDocument2 StructType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:ContractDocument2
 * @subpackage Structs
 */
class ContractDocument2 extends ContractDocument
{
    /**
     * The AttachmentGUIDListing
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \ArrayType\ArrayOfstring_1
     */
    public $AttachmentGUIDListing;
    /**
     * The DiscountAmount
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var float
     */
    public $DiscountAmount;
    /**
     * The DiscountMemberID
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $DiscountMemberID;
    /**
     * The DiscountName
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $DiscountName;
    /**
     * The DiscountProgramID
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var int
     */
    public $DiscountProgramID;
    /**
     * The FullPriceRMR
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var float
     */
    public $FullPriceRMR;
    /**
     * The PGHomeAdddress1
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $PGHomeAdddress1;
    /**
     * The PGHomeAdddress2
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $PGHomeAdddress2;
    /**
     * The PGHomeCity
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $PGHomeCity;
    /**
     * The PGHomeState
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $PGHomeState;
    /**
     * The PGHomeZip
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $PGHomeZip;
    /**
     * The PGTitle
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $PGTitle;
    /**
     * The PersonalGuaranteeRequired
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var bool
     */
    public $PersonalGuaranteeRequired;
    /**
     * The SigningLocation
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $SigningLocation;
    /**
     * The SourceIPAddress
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $SourceIPAddress;
    /**
     * Constructor method for ContractDocument2
     * @uses ContractDocument2::setAttachmentGUIDListing()
     * @uses ContractDocument2::setDiscountAmount()
     * @uses ContractDocument2::setDiscountMemberID()
     * @uses ContractDocument2::setDiscountName()
     * @uses ContractDocument2::setDiscountProgramID()
     * @uses ContractDocument2::setFullPriceRMR()
     * @uses ContractDocument2::setPGHomeAdddress1()
     * @uses ContractDocument2::setPGHomeAdddress2()
     * @uses ContractDocument2::setPGHomeCity()
     * @uses ContractDocument2::setPGHomeState()
     * @uses ContractDocument2::setPGHomeZip()
     * @uses ContractDocument2::setPGTitle()
     * @uses ContractDocument2::setPersonalGuaranteeRequired()
     * @uses ContractDocument2::setSigningLocation()
     * @uses ContractDocument2::setSourceIPAddress()
     * @param \ArrayType\ArrayOfstring_1 $attachmentGUIDListing
     * @param float $discountAmount
     * @param string $discountMemberID
     * @param string $discountName
     * @param int $discountProgramID
     * @param float $fullPriceRMR
     * @param string $pGHomeAdddress1
     * @param string $pGHomeAdddress2
     * @param string $pGHomeCity
     * @param string $pGHomeState
     * @param string $pGHomeZip
     * @param string $pGTitle
     * @param bool $personalGuaranteeRequired
     * @param string $signingLocation
     * @param string $sourceIPAddress
     */
    public function __construct(\ArrayType\ArrayOfstring_1 $attachmentGUIDListing = null, $discountAmount = null, $discountMemberID = null, $discountName = null, $discountProgramID = null, $fullPriceRMR = null, $pGHomeAdddress1 = null, $pGHomeAdddress2 = null, $pGHomeCity = null, $pGHomeState = null, $pGHomeZip = null, $pGTitle = null, $personalGuaranteeRequired = null, $signingLocation = null, $sourceIPAddress = null)
    {
        $this
            ->setAttachmentGUIDListing($attachmentGUIDListing)
            ->setDiscountAmount($discountAmount)
            ->setDiscountMemberID($discountMemberID)
            ->setDiscountName($discountName)
            ->setDiscountProgramID($discountProgramID)
            ->setFullPriceRMR($fullPriceRMR)
            ->setPGHomeAdddress1($pGHomeAdddress1)
            ->setPGHomeAdddress2($pGHomeAdddress2)
            ->setPGHomeCity($pGHomeCity)
            ->setPGHomeState($pGHomeState)
            ->setPGHomeZip($pGHomeZip)
            ->setPGTitle($pGTitle)
            ->setPersonalGuaranteeRequired($personalGuaranteeRequired)
            ->setSigningLocation($signingLocation)
            ->setSourceIPAddress($sourceIPAddress);
    }
    /**
     * Get AttachmentGUIDListing value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \ArrayType\ArrayOfstring_1|null
     */
    public function getAttachmentGUIDListing()
    {
        return isset($this->AttachmentGUIDListing) ? $this->AttachmentGUIDListing : null;
    }
    /**
     * Set AttachmentGUIDListing value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \ArrayType\ArrayOfstring_1 $attachmentGUIDListing
     * @return \StructType\ContractDocument2
     */
    public function setAttachmentGUIDListing(\ArrayType\ArrayOfstring_1 $attachmentGUIDListing = null)
    {
        if (is_null($attachmentGUIDListing) || (is_array($attachmentGUIDListing) && empty($attachmentGUIDListing))) {
            unset($this->AttachmentGUIDListing);
        } else {
            $this->AttachmentGUIDListing = $attachmentGUIDListing;
        }
        return $this;
    }
    /**
     * Get DiscountAmount value
     * @return float|null
     */
    public function getDiscountAmount()
    {
        return $this->DiscountAmount;
    }
    /**
     * Set DiscountAmount value
     * @param float $discountAmount
     * @return \StructType\ContractDocument2
     */
    public function setDiscountAmount($discountAmount = null)
    {
        $this->DiscountAmount = $discountAmount;
        return $this;
    }
    /**
     * Get DiscountMemberID value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getDiscountMemberID()
    {
        return isset($this->DiscountMemberID) ? $this->DiscountMemberID : null;
    }
    /**
     * Set DiscountMemberID value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $discountMemberID
     * @return \StructType\ContractDocument2
     */
    public function setDiscountMemberID($discountMemberID = null)
    {
        // validation for constraint: string
        if (!is_null($discountMemberID) && !is_string($discountMemberID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($discountMemberID)), __LINE__);
        }
        if (is_null($discountMemberID) || (is_array($discountMemberID) && empty($discountMemberID))) {
            unset($this->DiscountMemberID);
        } else {
            $this->DiscountMemberID = $discountMemberID;
        }
        return $this;
    }
    /**
     * Get DiscountName value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getDiscountName()
    {
        return isset($this->DiscountName) ? $this->DiscountName : null;
    }
    /**
     * Set DiscountName value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $discountName
     * @return \StructType\ContractDocument2
     */
    public function setDiscountName($discountName = null)
    {
        // validation for constraint: string
        if (!is_null($discountName) && !is_string($discountName)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($discountName)), __LINE__);
        }
        if (is_null($discountName) || (is_array($discountName) && empty($discountName))) {
            unset($this->DiscountName);
        } else {
            $this->DiscountName = $discountName;
        }
        return $this;
    }
    /**
     * Get DiscountProgramID value
     * @return int|null
     */
    public function getDiscountProgramID()
    {
        return $this->DiscountProgramID;
    }
    /**
     * Set DiscountProgramID value
     * @param int $discountProgramID
     * @return \StructType\ContractDocument2
     */
    public function setDiscountProgramID($discountProgramID = null)
    {
        // validation for constraint: int
        if (!is_null($discountProgramID) && !is_numeric($discountProgramID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($discountProgramID)), __LINE__);
        }
        $this->DiscountProgramID = $discountProgramID;
        return $this;
    }
    /**
     * Get FullPriceRMR value
     * @return float|null
     */
    public function getFullPriceRMR()
    {
        return $this->FullPriceRMR;
    }
    /**
     * Set FullPriceRMR value
     * @param float $fullPriceRMR
     * @return \StructType\ContractDocument2
     */
    public function setFullPriceRMR($fullPriceRMR = null)
    {
        $this->FullPriceRMR = $fullPriceRMR;
        return $this;
    }
    /**
     * Get PGHomeAdddress1 value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPGHomeAdddress1()
    {
        return isset($this->PGHomeAdddress1) ? $this->PGHomeAdddress1 : null;
    }
    /**
     * Set PGHomeAdddress1 value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $pGHomeAdddress1
     * @return \StructType\ContractDocument2
     */
    public function setPGHomeAdddress1($pGHomeAdddress1 = null)
    {
        // validation for constraint: string
        if (!is_null($pGHomeAdddress1) && !is_string($pGHomeAdddress1)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($pGHomeAdddress1)), __LINE__);
        }
        if (is_null($pGHomeAdddress1) || (is_array($pGHomeAdddress1) && empty($pGHomeAdddress1))) {
            unset($this->PGHomeAdddress1);
        } else {
            $this->PGHomeAdddress1 = $pGHomeAdddress1;
        }
        return $this;
    }
    /**
     * Get PGHomeAdddress2 value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPGHomeAdddress2()
    {
        return isset($this->PGHomeAdddress2) ? $this->PGHomeAdddress2 : null;
    }
    /**
     * Set PGHomeAdddress2 value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $pGHomeAdddress2
     * @return \StructType\ContractDocument2
     */
    public function setPGHomeAdddress2($pGHomeAdddress2 = null)
    {
        // validation for constraint: string
        if (!is_null($pGHomeAdddress2) && !is_string($pGHomeAdddress2)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($pGHomeAdddress2)), __LINE__);
        }
        if (is_null($pGHomeAdddress2) || (is_array($pGHomeAdddress2) && empty($pGHomeAdddress2))) {
            unset($this->PGHomeAdddress2);
        } else {
            $this->PGHomeAdddress2 = $pGHomeAdddress2;
        }
        return $this;
    }
    /**
     * Get PGHomeCity value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPGHomeCity()
    {
        return isset($this->PGHomeCity) ? $this->PGHomeCity : null;
    }
    /**
     * Set PGHomeCity value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $pGHomeCity
     * @return \StructType\ContractDocument2
     */
    public function setPGHomeCity($pGHomeCity = null)
    {
        // validation for constraint: string
        if (!is_null($pGHomeCity) && !is_string($pGHomeCity)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($pGHomeCity)), __LINE__);
        }
        if (is_null($pGHomeCity) || (is_array($pGHomeCity) && empty($pGHomeCity))) {
            unset($this->PGHomeCity);
        } else {
            $this->PGHomeCity = $pGHomeCity;
        }
        return $this;
    }
    /**
     * Get PGHomeState value
     * @return string|null
     */
    public function getPGHomeState()
    {
        return $this->PGHomeState;
    }
    /**
     * Set PGHomeState value
     * @uses \EnumType\StateProvinceEnum::valueIsValid()
     * @uses \EnumType\StateProvinceEnum::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $pGHomeState
     * @return \StructType\ContractDocument2
     */
    public function setPGHomeState($pGHomeState = null)
    {
        // validation for constraint: enumeration
        if (!\EnumType\StateProvinceEnum::valueIsValid($pGHomeState)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" is invalid, please use one of: %s', $pGHomeState, implode(', ', \EnumType\StateProvinceEnum::getValidValues())), __LINE__);
        }
        $this->PGHomeState = $pGHomeState;
        return $this;
    }
    /**
     * Get PGHomeZip value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPGHomeZip()
    {
        return isset($this->PGHomeZip) ? $this->PGHomeZip : null;
    }
    /**
     * Set PGHomeZip value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $pGHomeZip
     * @return \StructType\ContractDocument2
     */
    public function setPGHomeZip($pGHomeZip = null)
    {
        // validation for constraint: string
        if (!is_null($pGHomeZip) && !is_string($pGHomeZip)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($pGHomeZip)), __LINE__);
        }
        if (is_null($pGHomeZip) || (is_array($pGHomeZip) && empty($pGHomeZip))) {
            unset($this->PGHomeZip);
        } else {
            $this->PGHomeZip = $pGHomeZip;
        }
        return $this;
    }
    /**
     * Get PGTitle value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPGTitle()
    {
        return isset($this->PGTitle) ? $this->PGTitle : null;
    }
    /**
     * Set PGTitle value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $pGTitle
     * @return \StructType\ContractDocument2
     */
    public function setPGTitle($pGTitle = null)
    {
        // validation for constraint: string
        if (!is_null($pGTitle) && !is_string($pGTitle)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($pGTitle)), __LINE__);
        }
        if (is_null($pGTitle) || (is_array($pGTitle) && empty($pGTitle))) {
            unset($this->PGTitle);
        } else {
            $this->PGTitle = $pGTitle;
        }
        return $this;
    }
    /**
     * Get PersonalGuaranteeRequired value
     * @return bool|null
     */
    public function getPersonalGuaranteeRequired()
    {
        return $this->PersonalGuaranteeRequired;
    }
    /**
     * Set PersonalGuaranteeRequired value
     * @param bool $personalGuaranteeRequired
     * @return \StructType\ContractDocument2
     */
    public function setPersonalGuaranteeRequired($personalGuaranteeRequired = null)
    {
        // validation for constraint: boolean
        if (!is_null($personalGuaranteeRequired) && !is_bool($personalGuaranteeRequired)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($personalGuaranteeRequired)), __LINE__);
        }
        $this->PersonalGuaranteeRequired = $personalGuaranteeRequired;
        return $this;
    }
    /**
     * Get SigningLocation value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getSigningLocation()
    {
        return isset($this->SigningLocation) ? $this->SigningLocation : null;
    }
    /**
     * Set SigningLocation value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $signingLocation
     * @return \StructType\ContractDocument2
     */
    public function setSigningLocation($signingLocation = null)
    {
        // validation for constraint: string
        if (!is_null($signingLocation) && !is_string($signingLocation)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($signingLocation)), __LINE__);
        }
        if (is_null($signingLocation) || (is_array($signingLocation) && empty($signingLocation))) {
            unset($this->SigningLocation);
        } else {
            $this->SigningLocation = $signingLocation;
        }
        return $this;
    }
    /**
     * Get SourceIPAddress value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getSourceIPAddress()
    {
        return isset($this->SourceIPAddress) ? $this->SourceIPAddress : null;
    }
    /**
     * Set SourceIPAddress value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $sourceIPAddress
     * @return \StructType\ContractDocument2
     */
    public function setSourceIPAddress($sourceIPAddress = null)
    {
        // validation for constraint: string
        if (!is_null($sourceIPAddress) && !is_string($sourceIPAddress)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($sourceIPAddress)), __LINE__);
        }
        if (is_null($sourceIPAddress) || (is_array($sourceIPAddress) && empty($sourceIPAddress))) {
            unset($this->SourceIPAddress);
        } else {
            $this->SourceIPAddress = $sourceIPAddress;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\ContractDocument2
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
