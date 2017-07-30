<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for OptionListing StructType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:OptionListing
 * @subpackage Structs
 */
class OptionListing extends AbstractStructBase
{
    /**
     * The Code
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Code;
    /**
     * The CodeDescription
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $CodeDescription;
    /**
     * The Country
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Country;
    /**
     * The Description
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Description;
    /**
     * The FilterIndex
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $FilterIndex;
    /**
     * The GroupOrState
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $GroupOrState;
    /**
     * The Language
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Language;
    /**
     * The OptionID
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var int
     */
    public $OptionID;
    /**
     * The Value
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Value;
    /**
     * Constructor method for OptionListing
     * @uses OptionListing::setCode()
     * @uses OptionListing::setCodeDescription()
     * @uses OptionListing::setCountry()
     * @uses OptionListing::setDescription()
     * @uses OptionListing::setFilterIndex()
     * @uses OptionListing::setGroupOrState()
     * @uses OptionListing::setLanguage()
     * @uses OptionListing::setOptionID()
     * @uses OptionListing::setValue()
     * @param string $code
     * @param string $codeDescription
     * @param string $country
     * @param string $description
     * @param string $filterIndex
     * @param string $groupOrState
     * @param string $language
     * @param int $optionID
     * @param string $value
     */
    public function __construct($code = null, $codeDescription = null, $country = null, $description = null, $filterIndex = null, $groupOrState = null, $language = null, $optionID = null, $value = null)
    {
        $this
            ->setCode($code)
            ->setCodeDescription($codeDescription)
            ->setCountry($country)
            ->setDescription($description)
            ->setFilterIndex($filterIndex)
            ->setGroupOrState($groupOrState)
            ->setLanguage($language)
            ->setOptionID($optionID)
            ->setValue($value);
    }
    /**
     * Get Code value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getCode()
    {
        return isset($this->Code) ? $this->Code : null;
    }
    /**
     * Set Code value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $code
     * @return \StructType\OptionListing
     */
    public function setCode($code = null)
    {
        // validation for constraint: string
        if (!is_null($code) && !is_string($code)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($code)), __LINE__);
        }
        if (is_null($code) || (is_array($code) && empty($code))) {
            unset($this->Code);
        } else {
            $this->Code = $code;
        }
        return $this;
    }
    /**
     * Get CodeDescription value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getCodeDescription()
    {
        return isset($this->CodeDescription) ? $this->CodeDescription : null;
    }
    /**
     * Set CodeDescription value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $codeDescription
     * @return \StructType\OptionListing
     */
    public function setCodeDescription($codeDescription = null)
    {
        // validation for constraint: string
        if (!is_null($codeDescription) && !is_string($codeDescription)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($codeDescription)), __LINE__);
        }
        if (is_null($codeDescription) || (is_array($codeDescription) && empty($codeDescription))) {
            unset($this->CodeDescription);
        } else {
            $this->CodeDescription = $codeDescription;
        }
        return $this;
    }
    /**
     * Get Country value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getCountry()
    {
        return isset($this->Country) ? $this->Country : null;
    }
    /**
     * Set Country value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $country
     * @return \StructType\OptionListing
     */
    public function setCountry($country = null)
    {
        // validation for constraint: string
        if (!is_null($country) && !is_string($country)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($country)), __LINE__);
        }
        if (is_null($country) || (is_array($country) && empty($country))) {
            unset($this->Country);
        } else {
            $this->Country = $country;
        }
        return $this;
    }
    /**
     * Get Description value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getDescription()
    {
        return isset($this->Description) ? $this->Description : null;
    }
    /**
     * Set Description value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $description
     * @return \StructType\OptionListing
     */
    public function setDescription($description = null)
    {
        // validation for constraint: string
        if (!is_null($description) && !is_string($description)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($description)), __LINE__);
        }
        if (is_null($description) || (is_array($description) && empty($description))) {
            unset($this->Description);
        } else {
            $this->Description = $description;
        }
        return $this;
    }
    /**
     * Get FilterIndex value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getFilterIndex()
    {
        return isset($this->FilterIndex) ? $this->FilterIndex : null;
    }
    /**
     * Set FilterIndex value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $filterIndex
     * @return \StructType\OptionListing
     */
    public function setFilterIndex($filterIndex = null)
    {
        // validation for constraint: string
        if (!is_null($filterIndex) && !is_string($filterIndex)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($filterIndex)), __LINE__);
        }
        if (is_null($filterIndex) || (is_array($filterIndex) && empty($filterIndex))) {
            unset($this->FilterIndex);
        } else {
            $this->FilterIndex = $filterIndex;
        }
        return $this;
    }
    /**
     * Get GroupOrState value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getGroupOrState()
    {
        return isset($this->GroupOrState) ? $this->GroupOrState : null;
    }
    /**
     * Set GroupOrState value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $groupOrState
     * @return \StructType\OptionListing
     */
    public function setGroupOrState($groupOrState = null)
    {
        // validation for constraint: string
        if (!is_null($groupOrState) && !is_string($groupOrState)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($groupOrState)), __LINE__);
        }
        if (is_null($groupOrState) || (is_array($groupOrState) && empty($groupOrState))) {
            unset($this->GroupOrState);
        } else {
            $this->GroupOrState = $groupOrState;
        }
        return $this;
    }
    /**
     * Get Language value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getLanguage()
    {
        return isset($this->Language) ? $this->Language : null;
    }
    /**
     * Set Language value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $language
     * @return \StructType\OptionListing
     */
    public function setLanguage($language = null)
    {
        // validation for constraint: string
        if (!is_null($language) && !is_string($language)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($language)), __LINE__);
        }
        if (is_null($language) || (is_array($language) && empty($language))) {
            unset($this->Language);
        } else {
            $this->Language = $language;
        }
        return $this;
    }
    /**
     * Get OptionID value
     * @return int|null
     */
    public function getOptionID()
    {
        return $this->OptionID;
    }
    /**
     * Set OptionID value
     * @param int $optionID
     * @return \StructType\OptionListing
     */
    public function setOptionID($optionID = null)
    {
        // validation for constraint: int
        if (!is_null($optionID) && !is_numeric($optionID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($optionID)), __LINE__);
        }
        $this->OptionID = $optionID;
        return $this;
    }
    /**
     * Get Value value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getValue()
    {
        return isset($this->Value) ? $this->Value : null;
    }
    /**
     * Set Value value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $value
     * @return \StructType\OptionListing
     */
    public function setValue($value = null)
    {
        // validation for constraint: string
        if (!is_null($value) && !is_string($value)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($value)), __LINE__);
        }
        if (is_null($value) || (is_array($value) && empty($value))) {
            unset($this->Value);
        } else {
            $this->Value = $value;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\OptionListing
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
