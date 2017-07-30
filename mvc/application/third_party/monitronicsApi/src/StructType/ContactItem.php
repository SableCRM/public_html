<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for ContactItem StructType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:ContactItem
 * @subpackage Structs
 */
class ContactItem extends AbstractStructBase
{
    /**
     * The Ext
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Ext;
    /**
     * The Name
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Name;
    /**
     * The Password
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Password;
    /**
     * The Phone
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Phone;
    /**
     * The PhoneType
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $PhoneType;
    /**
     * The UserNumber
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $UserNumber;
    /**
     * Constructor method for ContactItem
     * @uses ContactItem::setExt()
     * @uses ContactItem::setName()
     * @uses ContactItem::setPassword()
     * @uses ContactItem::setPhone()
     * @uses ContactItem::setPhoneType()
     * @uses ContactItem::setUserNumber()
     * @param string $ext
     * @param string $name
     * @param string $password
     * @param string $phone
     * @param string $phoneType
     * @param string $userNumber
     */
    public function __construct($ext = null, $name = null, $password = null, $phone = null, $phoneType = null, $userNumber = null)
    {
        $this
            ->setExt($ext)
            ->setName($name)
            ->setPassword($password)
            ->setPhone($phone)
            ->setPhoneType($phoneType)
            ->setUserNumber($userNumber);
    }
    /**
     * Get Ext value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getExt()
    {
        return isset($this->Ext) ? $this->Ext : null;
    }
    /**
     * Set Ext value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $ext
     * @return \StructType\ContactItem
     */
    public function setExt($ext = null)
    {
        // validation for constraint: string
        if (!is_null($ext) && !is_string($ext)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($ext)), __LINE__);
        }
        if (is_null($ext) || (is_array($ext) && empty($ext))) {
            unset($this->Ext);
        } else {
            $this->Ext = $ext;
        }
        return $this;
    }
    /**
     * Get Name value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getName()
    {
        return isset($this->Name) ? $this->Name : null;
    }
    /**
     * Set Name value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $name
     * @return \StructType\ContactItem
     */
    public function setName($name = null)
    {
        // validation for constraint: string
        if (!is_null($name) && !is_string($name)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($name)), __LINE__);
        }
        if (is_null($name) || (is_array($name) && empty($name))) {
            unset($this->Name);
        } else {
            $this->Name = $name;
        }
        return $this;
    }
    /**
     * Get Password value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPassword()
    {
        return isset($this->Password) ? $this->Password : null;
    }
    /**
     * Set Password value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $password
     * @return \StructType\ContactItem
     */
    public function setPassword($password = null)
    {
        // validation for constraint: string
        if (!is_null($password) && !is_string($password)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($password)), __LINE__);
        }
        if (is_null($password) || (is_array($password) && empty($password))) {
            unset($this->Password);
        } else {
            $this->Password = $password;
        }
        return $this;
    }
    /**
     * Get Phone value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPhone()
    {
        return isset($this->Phone) ? $this->Phone : null;
    }
    /**
     * Set Phone value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $phone
     * @return \StructType\ContactItem
     */
    public function setPhone($phone = null)
    {
        // validation for constraint: string
        if (!is_null($phone) && !is_string($phone)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($phone)), __LINE__);
        }
        if (is_null($phone) || (is_array($phone) && empty($phone))) {
            unset($this->Phone);
        } else {
            $this->Phone = $phone;
        }
        return $this;
    }
    /**
     * Get PhoneType value
     * @return string|null
     */
    public function getPhoneType()
    {
        return $this->PhoneType;
    }
    /**
     * Set PhoneType value
     * @uses \EnumType\PhoneTypeEnum::valueIsValid()
     * @uses \EnumType\PhoneTypeEnum::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $phoneType
     * @return \StructType\ContactItem
     */
    public function setPhoneType($phoneType = null)
    {
        // validation for constraint: enumeration
        if (!\EnumType\PhoneTypeEnum::valueIsValid($phoneType)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" is invalid, please use one of: %s', $phoneType, implode(', ', \EnumType\PhoneTypeEnum::getValidValues())), __LINE__);
        }
        $this->PhoneType = $phoneType;
        return $this;
    }
    /**
     * Get UserNumber value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getUserNumber()
    {
        return isset($this->UserNumber) ? $this->UserNumber : null;
    }
    /**
     * Set UserNumber value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $userNumber
     * @return \StructType\ContactItem
     */
    public function setUserNumber($userNumber = null)
    {
        // validation for constraint: string
        if (!is_null($userNumber) && !is_string($userNumber)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($userNumber)), __LINE__);
        }
        if (is_null($userNumber) || (is_array($userNumber) && empty($userNumber))) {
            unset($this->UserNumber);
        } else {
            $this->UserNumber = $userNumber;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\ContactItem
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
