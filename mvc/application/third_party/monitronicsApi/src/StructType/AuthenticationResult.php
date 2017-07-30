<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for AuthenticationResult StructType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:AuthenticationResult
 * @subpackage Structs
 */
class AuthenticationResult extends AbstractStructBase
{
    /**
     * The OptionList
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \ArrayType\ArrayOfOptionListing
     */
    public $OptionList;
    /**
     * The Result
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var bool
     */
    public $Result;
    /**
     * The ResultData
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $ResultData;
    /**
     * The dealerDBAs
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \ArrayType\ArrayOfDealerDBA
     */
    public $dealerDBAs;
    /**
     * The dealerEmails
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \ArrayType\ArrayOfDealerEmail
     */
    public $dealerEmails;
    /**
     * The dealerInfo
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \StructType\DealerInfo
     */
    public $dealerInfo;
    /**
     * The dealerLicenseExpirationWarning
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $dealerLicenseExpirationWarning;
    /**
     * The dealerLicenseExpired
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $dealerLicenseExpired;
    /**
     * The dealerLicenseValid
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $dealerLicenseValid;
    /**
     * The dealerLicenses
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \ArrayType\ArrayOfDealerLicense
     */
    public $dealerLicenses;
    /**
     * The userInfo
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \StructType\MoniNetUserInfo
     */
    public $userInfo;
    /**
     * Constructor method for AuthenticationResult
     * @uses AuthenticationResult::setOptionList()
     * @uses AuthenticationResult::setResult()
     * @uses AuthenticationResult::setResultData()
     * @uses AuthenticationResult::setDealerDBAs()
     * @uses AuthenticationResult::setDealerEmails()
     * @uses AuthenticationResult::setDealerInfo()
     * @uses AuthenticationResult::setDealerLicenseExpirationWarning()
     * @uses AuthenticationResult::setDealerLicenseExpired()
     * @uses AuthenticationResult::setDealerLicenseValid()
     * @uses AuthenticationResult::setDealerLicenses()
     * @uses AuthenticationResult::setUserInfo()
     * @param \ArrayType\ArrayOfOptionListing $optionList
     * @param bool $result
     * @param string $resultData
     * @param \ArrayType\ArrayOfDealerDBA $dealerDBAs
     * @param \ArrayType\ArrayOfDealerEmail $dealerEmails
     * @param \StructType\DealerInfo $dealerInfo
     * @param string $dealerLicenseExpirationWarning
     * @param string $dealerLicenseExpired
     * @param string $dealerLicenseValid
     * @param \ArrayType\ArrayOfDealerLicense $dealerLicenses
     * @param \StructType\MoniNetUserInfo $userInfo
     */
    public function __construct(\ArrayType\ArrayOfOptionListing $optionList = null, $result = null, $resultData = null, \ArrayType\ArrayOfDealerDBA $dealerDBAs = null, \ArrayType\ArrayOfDealerEmail $dealerEmails = null, \StructType\DealerInfo $dealerInfo = null, $dealerLicenseExpirationWarning = null, $dealerLicenseExpired = null, $dealerLicenseValid = null, \ArrayType\ArrayOfDealerLicense $dealerLicenses = null, \StructType\MoniNetUserInfo $userInfo = null)
    {
        $this
            ->setOptionList($optionList)
            ->setResult($result)
            ->setResultData($resultData)
            ->setDealerDBAs($dealerDBAs)
            ->setDealerEmails($dealerEmails)
            ->setDealerInfo($dealerInfo)
            ->setDealerLicenseExpirationWarning($dealerLicenseExpirationWarning)
            ->setDealerLicenseExpired($dealerLicenseExpired)
            ->setDealerLicenseValid($dealerLicenseValid)
            ->setDealerLicenses($dealerLicenses)
            ->setUserInfo($userInfo);
    }
    /**
     * Get OptionList value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \ArrayType\ArrayOfOptionListing|null
     */
    public function getOptionList()
    {
        return isset($this->OptionList) ? $this->OptionList : null;
    }
    /**
     * Set OptionList value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \ArrayType\ArrayOfOptionListing $optionList
     * @return \StructType\AuthenticationResult
     */
    public function setOptionList(\ArrayType\ArrayOfOptionListing $optionList = null)
    {
        if (is_null($optionList) || (is_array($optionList) && empty($optionList))) {
            unset($this->OptionList);
        } else {
            $this->OptionList = $optionList;
        }
        return $this;
    }
    /**
     * Get Result value
     * @return bool|null
     */
    public function getResult()
    {
        return $this->Result;
    }
    /**
     * Set Result value
     * @param bool $result
     * @return \StructType\AuthenticationResult
     */
    public function setResult($result = null)
    {
        // validation for constraint: boolean
        if (!is_null($result) && !is_bool($result)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($result)), __LINE__);
        }
        $this->Result = $result;
        return $this;
    }
    /**
     * Get ResultData value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getResultData()
    {
        return isset($this->ResultData) ? $this->ResultData : null;
    }
    /**
     * Set ResultData value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $resultData
     * @return \StructType\AuthenticationResult
     */
    public function setResultData($resultData = null)
    {
        // validation for constraint: string
        if (!is_null($resultData) && !is_string($resultData)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($resultData)), __LINE__);
        }
        if (is_null($resultData) || (is_array($resultData) && empty($resultData))) {
            unset($this->ResultData);
        } else {
            $this->ResultData = $resultData;
        }
        return $this;
    }
    /**
     * Get dealerDBAs value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \ArrayType\ArrayOfDealerDBA|null
     */
    public function getDealerDBAs()
    {
        return isset($this->dealerDBAs) ? $this->dealerDBAs : null;
    }
    /**
     * Set dealerDBAs value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \ArrayType\ArrayOfDealerDBA $dealerDBAs
     * @return \StructType\AuthenticationResult
     */
    public function setDealerDBAs(\ArrayType\ArrayOfDealerDBA $dealerDBAs = null)
    {
        if (is_null($dealerDBAs) || (is_array($dealerDBAs) && empty($dealerDBAs))) {
            unset($this->dealerDBAs);
        } else {
            $this->dealerDBAs = $dealerDBAs;
        }
        return $this;
    }
    /**
     * Get dealerEmails value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \ArrayType\ArrayOfDealerEmail|null
     */
    public function getDealerEmails()
    {
        return isset($this->dealerEmails) ? $this->dealerEmails : null;
    }
    /**
     * Set dealerEmails value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \ArrayType\ArrayOfDealerEmail $dealerEmails
     * @return \StructType\AuthenticationResult
     */
    public function setDealerEmails(\ArrayType\ArrayOfDealerEmail $dealerEmails = null)
    {
        if (is_null($dealerEmails) || (is_array($dealerEmails) && empty($dealerEmails))) {
            unset($this->dealerEmails);
        } else {
            $this->dealerEmails = $dealerEmails;
        }
        return $this;
    }
    /**
     * Get dealerInfo value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \StructType\DealerInfo|null
     */
    public function getDealerInfo()
    {
        return isset($this->dealerInfo) ? $this->dealerInfo : null;
    }
    /**
     * Set dealerInfo value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \StructType\DealerInfo $dealerInfo
     * @return \StructType\AuthenticationResult
     */
    public function setDealerInfo(\StructType\DealerInfo $dealerInfo = null)
    {
        if (is_null($dealerInfo) || (is_array($dealerInfo) && empty($dealerInfo))) {
            unset($this->dealerInfo);
        } else {
            $this->dealerInfo = $dealerInfo;
        }
        return $this;
    }
    /**
     * Get dealerLicenseExpirationWarning value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getDealerLicenseExpirationWarning()
    {
        return isset($this->dealerLicenseExpirationWarning) ? $this->dealerLicenseExpirationWarning : null;
    }
    /**
     * Set dealerLicenseExpirationWarning value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $dealerLicenseExpirationWarning
     * @return \StructType\AuthenticationResult
     */
    public function setDealerLicenseExpirationWarning($dealerLicenseExpirationWarning = null)
    {
        // validation for constraint: string
        if (!is_null($dealerLicenseExpirationWarning) && !is_string($dealerLicenseExpirationWarning)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($dealerLicenseExpirationWarning)), __LINE__);
        }
        if (is_null($dealerLicenseExpirationWarning) || (is_array($dealerLicenseExpirationWarning) && empty($dealerLicenseExpirationWarning))) {
            unset($this->dealerLicenseExpirationWarning);
        } else {
            $this->dealerLicenseExpirationWarning = $dealerLicenseExpirationWarning;
        }
        return $this;
    }
    /**
     * Get dealerLicenseExpired value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getDealerLicenseExpired()
    {
        return isset($this->dealerLicenseExpired) ? $this->dealerLicenseExpired : null;
    }
    /**
     * Set dealerLicenseExpired value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $dealerLicenseExpired
     * @return \StructType\AuthenticationResult
     */
    public function setDealerLicenseExpired($dealerLicenseExpired = null)
    {
        // validation for constraint: string
        if (!is_null($dealerLicenseExpired) && !is_string($dealerLicenseExpired)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($dealerLicenseExpired)), __LINE__);
        }
        if (is_null($dealerLicenseExpired) || (is_array($dealerLicenseExpired) && empty($dealerLicenseExpired))) {
            unset($this->dealerLicenseExpired);
        } else {
            $this->dealerLicenseExpired = $dealerLicenseExpired;
        }
        return $this;
    }
    /**
     * Get dealerLicenseValid value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getDealerLicenseValid()
    {
        return isset($this->dealerLicenseValid) ? $this->dealerLicenseValid : null;
    }
    /**
     * Set dealerLicenseValid value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $dealerLicenseValid
     * @return \StructType\AuthenticationResult
     */
    public function setDealerLicenseValid($dealerLicenseValid = null)
    {
        // validation for constraint: string
        if (!is_null($dealerLicenseValid) && !is_string($dealerLicenseValid)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($dealerLicenseValid)), __LINE__);
        }
        if (is_null($dealerLicenseValid) || (is_array($dealerLicenseValid) && empty($dealerLicenseValid))) {
            unset($this->dealerLicenseValid);
        } else {
            $this->dealerLicenseValid = $dealerLicenseValid;
        }
        return $this;
    }
    /**
     * Get dealerLicenses value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \ArrayType\ArrayOfDealerLicense|null
     */
    public function getDealerLicenses()
    {
        return isset($this->dealerLicenses) ? $this->dealerLicenses : null;
    }
    /**
     * Set dealerLicenses value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \ArrayType\ArrayOfDealerLicense $dealerLicenses
     * @return \StructType\AuthenticationResult
     */
    public function setDealerLicenses(\ArrayType\ArrayOfDealerLicense $dealerLicenses = null)
    {
        if (is_null($dealerLicenses) || (is_array($dealerLicenses) && empty($dealerLicenses))) {
            unset($this->dealerLicenses);
        } else {
            $this->dealerLicenses = $dealerLicenses;
        }
        return $this;
    }
    /**
     * Get userInfo value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \StructType\MoniNetUserInfo|null
     */
    public function getUserInfo()
    {
        return isset($this->userInfo) ? $this->userInfo : null;
    }
    /**
     * Set userInfo value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \StructType\MoniNetUserInfo $userInfo
     * @return \StructType\AuthenticationResult
     */
    public function setUserInfo(\StructType\MoniNetUserInfo $userInfo = null)
    {
        if (is_null($userInfo) || (is_array($userInfo) && empty($userInfo))) {
            unset($this->userInfo);
        } else {
            $this->userInfo = $userInfo;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\AuthenticationResult
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
