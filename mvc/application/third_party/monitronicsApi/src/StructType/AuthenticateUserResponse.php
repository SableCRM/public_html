<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for AuthenticateUserResponse StructType
 * @subpackage Structs
 */
class AuthenticateUserResponse extends AbstractStructBase
{
    /**
     * The AuthenticateUserResult
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \StructType\AuthenticationResult
     */
    public $AuthenticateUserResult;
    /**
     * Constructor method for AuthenticateUserResponse
     * @uses AuthenticateUserResponse::setAuthenticateUserResult()
     * @param \StructType\AuthenticationResult $authenticateUserResult
     */
    public function __construct(\StructType\AuthenticationResult $authenticateUserResult = null)
    {
        $this
            ->setAuthenticateUserResult($authenticateUserResult);
    }
    /**
     * Get AuthenticateUserResult value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \StructType\AuthenticationResult|null
     */
    public function getAuthenticateUserResult()
    {
        return isset($this->AuthenticateUserResult) ? $this->AuthenticateUserResult : null;
    }
    /**
     * Set AuthenticateUserResult value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \StructType\AuthenticationResult $authenticateUserResult
     * @return \StructType\AuthenticateUserResponse
     */
    public function setAuthenticateUserResult(\StructType\AuthenticationResult $authenticateUserResult = null)
    {
        if (is_null($authenticateUserResult) || (is_array($authenticateUserResult) && empty($authenticateUserResult))) {
            unset($this->AuthenticateUserResult);
        } else {
            $this->AuthenticateUserResult = $authenticateUserResult;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\AuthenticateUserResponse
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
