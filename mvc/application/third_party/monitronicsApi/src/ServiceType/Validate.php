<?php

namespace ServiceType;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Validate ServiceType
 * @subpackage Services
 */
class Validate extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named ValidateContract2
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ValidateContract2 $parameters
     * @return \StructType\ValidateContract2Response|bool
     */
    public function ValidateContract2(\StructType\ValidateContract2 $parameters)
    {
        try {
            self::setWsseSoapHeader('eContractAPIDealer', 'test7*9');
            $this->setResult(self::getSoapClient()->ValidateContract2($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \StructType\ValidateContract2Response
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
