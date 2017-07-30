<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for AuthenticateUser2Response StructType
 * @subpackage Structs
 */
class AuthenticateUser2Response extends AbstractStructBase
{
    /**
     * The AuthenticateUser2Result
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \StructType\AuthenticationResult2
     */
    public $AuthenticateUser2Result;
    /**
     * Constructor method for AuthenticateUser2Response
     * @uses AuthenticateUser2Response::setAuthenticateUser2Result()
     * @param \StructType\AuthenticationResult2 $authenticateUser2Result
     */
    public function __construct(\StructType\AuthenticationResult2 $authenticateUser2Result = null)
    {
        $this
            ->setAuthenticateUser2Result($authenticateUser2Result);
    }
    /**
     * Get AuthenticateUser2Result value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \StructType\AuthenticationResult2|null
     */
    public function getAuthenticateUser2Result()
    {
        return isset($this->AuthenticateUser2Result) ? $this->AuthenticateUser2Result : null;
    }
    /**
     * Set AuthenticateUser2Result value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \StructType\AuthenticationResult2 $authenticateUser2Result
     * @return \StructType\AuthenticateUser2Response
     */
    public function setAuthenticateUser2Result(\StructType\AuthenticationResult2 $authenticateUser2Result = null)
    {
        if (is_null($authenticateUser2Result) || (is_array($authenticateUser2Result) && empty($authenticateUser2Result))) {
            unset($this->AuthenticateUser2Result);
        } else {
            $this->AuthenticateUser2Result = $authenticateUser2Result;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\AuthenticateUser2Response
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
