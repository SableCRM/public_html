<?php

namespace ServiceType;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Authenticate ServiceType
 * @subpackage Services
 */
class Authenticate extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named AuthenticateUser
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\AuthenticateUser $parameters
     * @return \StructType\AuthenticateUserResponse|bool
     */
    public function AuthenticateUser(\StructType\AuthenticateUser $parameters)
    {
        try {
            $this->setResult(self::getSoapClient()->AuthenticateUser($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named AuthenticateUser2
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\AuthenticateUser2 $parameters
     * @return \StructType\AuthenticateUser2Response|bool
     */
    public function AuthenticateUser2(\StructType\AuthenticateUser2 $parameters)
    {
        try {
            $this->setResult(self::getSoapClient()->AuthenticateUser2($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \StructType\AuthenticateUser2Response|\StructType\AuthenticateUserResponse
     */
    public function getResult()
    {
        return parent::getResult();
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
