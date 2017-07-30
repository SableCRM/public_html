<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for VerifyDependencies StructType
 * @subpackage Structs
 */
class VerifyDependencies extends AbstractStructBase
{
    /**
     * The username
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $username;
    /**
     * The password
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $password;
    /**
     * The dealernumber
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var int
     */
    public $dealernumber;
    /**
     * Constructor method for VerifyDependencies
     * @uses VerifyDependencies::setUsername()
     * @uses VerifyDependencies::setPassword()
     * @uses VerifyDependencies::setDealernumber()
     * @param string $username
     * @param string $password
     * @param int $dealernumber
     */
    public function __construct($username = null, $password = null, $dealernumber = null)
    {
        $this
            ->setUsername($username)
            ->setPassword($password)
            ->setDealernumber($dealernumber);
    }
    /**
     * Get username value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getUsername()
    {
        return isset($this->username) ? $this->username : null;
    }
    /**
     * Set username value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $username
     * @return \StructType\VerifyDependencies
     */
    public function setUsername($username = null)
    {
        // validation for constraint: string
        if (!is_null($username) && !is_string($username)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($username)), __LINE__);
        }
        if (is_null($username) || (is_array($username) && empty($username))) {
            unset($this->username);
        } else {
            $this->username = $username;
        }
        return $this;
    }
    /**
     * Get password value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPassword()
    {
        return isset($this->password) ? $this->password : null;
    }
    /**
     * Set password value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $password
     * @return \StructType\VerifyDependencies
     */
    public function setPassword($password = null)
    {
        // validation for constraint: string
        if (!is_null($password) && !is_string($password)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($password)), __LINE__);
        }
        if (is_null($password) || (is_array($password) && empty($password))) {
            unset($this->password);
        } else {
            $this->password = $password;
        }
        return $this;
    }
    /**
     * Get dealernumber value
     * @return int|null
     */
    public function getDealernumber()
    {
        return $this->dealernumber;
    }
    /**
     * Set dealernumber value
     * @param int $dealernumber
     * @return \StructType\VerifyDependencies
     */
    public function setDealernumber($dealernumber = null)
    {
        // validation for constraint: int
        if (!is_null($dealernumber) && !is_numeric($dealernumber)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($dealernumber)), __LINE__);
        }
        $this->dealernumber = $dealernumber;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\VerifyDependencies
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
