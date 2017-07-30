<?php

namespace ServiceType;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Docu ServiceType
 * @subpackage Services
 */
class Docu extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named DocuSignConnectUpdate
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\DocuSignConnectUpdate $parameters
     * @return \StructType\DocuSignConnectUpdateResponse|bool
     */
    public function DocuSignConnectUpdate(\StructType\DocuSignConnectUpdate $parameters)
    {
        try {
            $this->setResult(self::getSoapClient()->DocuSignConnectUpdate($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \StructType\DocuSignConnectUpdateResponse
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
