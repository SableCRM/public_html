<?php

namespace ServiceType;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Verify ServiceType
 * @subpackage Services
 */
class Verify extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named VerifyDependencies
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\VerifyDependencies $parameters
     * @return \StructType\VerifyDependenciesResponse|bool
     */
    public function VerifyDependencies(\StructType\VerifyDependencies $parameters)
    {
        try {
            $this->setResult(self::getSoapClient()->VerifyDependencies($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \StructType\VerifyDependenciesResponse
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
