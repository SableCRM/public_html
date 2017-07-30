<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for MoniNetUserInfo StructType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:MoniNetUserInfo
 * @subpackage Structs
 */
class MoniNetUserInfo extends AbstractStructBase
{
    /**
     * The DealerNumber
     * @var int
     */
    public $DealerNumber;
    /**
     * The Branches
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Branches;
    /**
     * The EmailAddress
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $EmailAddress;
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
     * The Roles
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \ArrayType\ArrayOfString
     */
    public $Roles;
    /**
     * The IsValidUser
     * @var bool
     */
    public $IsValidUser;
    /**
     * The ContactNo
     * @var int
     */
    public $ContactNo;
    /**
     * The APP_ID
     * @var int
     */
    public $APP_ID;
    /**
     * The DealerType
     * @var int
     */
    public $DealerType;
    /**
     * Constructor method for MoniNetUserInfo
     * @uses MoniNetUserInfo::setDealerNumber()
     * @uses MoniNetUserInfo::setBranches()
     * @uses MoniNetUserInfo::setEmailAddress()
     * @uses MoniNetUserInfo::setFirstName()
     * @uses MoniNetUserInfo::setLastName()
     * @uses MoniNetUserInfo::setRoles()
     * @uses MoniNetUserInfo::setIsValidUser()
     * @uses MoniNetUserInfo::setContactNo()
     * @uses MoniNetUserInfo::setAPP_ID()
     * @uses MoniNetUserInfo::setDealerType()
     * @param int $dealerNumber
     * @param string $branches
     * @param string $emailAddress
     * @param string $firstName
     * @param string $lastName
     * @param \ArrayType\ArrayOfString $roles
     * @param bool $isValidUser
     * @param int $contactNo
     * @param int $aPP_ID
     * @param int $dealerType
     */
    public function __construct($dealerNumber = null, $branches = null, $emailAddress = null, $firstName = null, $lastName = null, \ArrayType\ArrayOfString $roles = null, $isValidUser = null, $contactNo = null, $aPP_ID = null, $dealerType = null)
    {
        $this
            ->setDealerNumber($dealerNumber)
            ->setBranches($branches)
            ->setEmailAddress($emailAddress)
            ->setFirstName($firstName)
            ->setLastName($lastName)
            ->setRoles($roles)
            ->setIsValidUser($isValidUser)
            ->setContactNo($contactNo)
            ->setAPP_ID($aPP_ID)
            ->setDealerType($dealerType);
    }
    /**
     * Get DealerNumber value
     * @return int|null
     */
    public function getDealerNumber()
    {
        return $this->DealerNumber;
    }
    /**
     * Set DealerNumber value
     * @param int $dealerNumber
     * @return \StructType\MoniNetUserInfo
     */
    public function setDealerNumber($dealerNumber = null)
    {
        // validation for constraint: int
        if (!is_null($dealerNumber) && !is_numeric($dealerNumber)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($dealerNumber)), __LINE__);
        }
        $this->DealerNumber = $dealerNumber;
        return $this;
    }
    /**
     * Get Branches value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getBranches()
    {
        return isset($this->Branches) ? $this->Branches : null;
    }
    /**
     * Set Branches value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $branches
     * @return \StructType\MoniNetUserInfo
     */
    public function setBranches($branches = null)
    {
        // validation for constraint: string
        if (!is_null($branches) && !is_string($branches)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($branches)), __LINE__);
        }
        if (is_null($branches) || (is_array($branches) && empty($branches))) {
            unset($this->Branches);
        } else {
            $this->Branches = $branches;
        }
        return $this;
    }
    /**
     * Get EmailAddress value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getEmailAddress()
    {
        return isset($this->EmailAddress) ? $this->EmailAddress : null;
    }
    /**
     * Set EmailAddress value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $emailAddress
     * @return \StructType\MoniNetUserInfo
     */
    public function setEmailAddress($emailAddress = null)
    {
        // validation for constraint: string
        if (!is_null($emailAddress) && !is_string($emailAddress)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($emailAddress)), __LINE__);
        }
        if (is_null($emailAddress) || (is_array($emailAddress) && empty($emailAddress))) {
            unset($this->EmailAddress);
        } else {
            $this->EmailAddress = $emailAddress;
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
     * @return \StructType\MoniNetUserInfo
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
     * @return \StructType\MoniNetUserInfo
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
     * Get Roles value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \ArrayType\ArrayOfString|null
     */
    public function getRoles()
    {
        return isset($this->Roles) ? $this->Roles : null;
    }
    /**
     * Set Roles value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \ArrayType\ArrayOfString $roles
     * @return \StructType\MoniNetUserInfo
     */
    public function setRoles(\ArrayType\ArrayOfString $roles = null)
    {
        if (is_null($roles) || (is_array($roles) && empty($roles))) {
            unset($this->Roles);
        } else {
            $this->Roles = $roles;
        }
        return $this;
    }
    /**
     * Get IsValidUser value
     * @return bool|null
     */
    public function getIsValidUser()
    {
        return $this->IsValidUser;
    }
    /**
     * Set IsValidUser value
     * @param bool $isValidUser
     * @return \StructType\MoniNetUserInfo
     */
    public function setIsValidUser($isValidUser = null)
    {
        // validation for constraint: boolean
        if (!is_null($isValidUser) && !is_bool($isValidUser)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($isValidUser)), __LINE__);
        }
        $this->IsValidUser = $isValidUser;
        return $this;
    }
    /**
     * Get ContactNo value
     * @return int|null
     */
    public function getContactNo()
    {
        return $this->ContactNo;
    }
    /**
     * Set ContactNo value
     * @param int $contactNo
     * @return \StructType\MoniNetUserInfo
     */
    public function setContactNo($contactNo = null)
    {
        // validation for constraint: int
        if (!is_null($contactNo) && !is_numeric($contactNo)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($contactNo)), __LINE__);
        }
        $this->ContactNo = $contactNo;
        return $this;
    }
    /**
     * Get APP_ID value
     * @return int|null
     */
    public function getAPP_ID()
    {
        return $this->APP_ID;
    }
    /**
     * Set APP_ID value
     * @param int $aPP_ID
     * @return \StructType\MoniNetUserInfo
     */
    public function setAPP_ID($aPP_ID = null)
    {
        // validation for constraint: int
        if (!is_null($aPP_ID) && !is_numeric($aPP_ID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($aPP_ID)), __LINE__);
        }
        $this->APP_ID = $aPP_ID;
        return $this;
    }
    /**
     * Get DealerType value
     * @return int|null
     */
    public function getDealerType()
    {
        return $this->DealerType;
    }
    /**
     * Set DealerType value
     * @param int $dealerType
     * @return \StructType\MoniNetUserInfo
     */
    public function setDealerType($dealerType = null)
    {
        // validation for constraint: int
        if (!is_null($dealerType) && !is_numeric($dealerType)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($dealerType)), __LINE__);
        }
        $this->DealerType = $dealerType;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\MoniNetUserInfo
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
