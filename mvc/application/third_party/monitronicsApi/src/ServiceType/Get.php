<?php

namespace ServiceType;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Get ServiceType
 * @subpackage Services
 */
class Get extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named GetContract
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\GetContract $parameters
     * @return \StructType\GetContractResponse|bool
     */
    public function GetContract(\StructType\GetContract $parameters)
    {
        try {
            $this->setResult(self::getSoapClient()->GetContract($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetContractAsPrimary
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\GetContractAsPrimary $parameters
     * @return \StructType\GetContractAsPrimaryResponse|bool
     */
    public function GetContractAsPrimary(\StructType\GetContractAsPrimary $parameters)
    {
        try {
            $this->setResult(self::getSoapClient()->GetContractAsPrimary($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetContractLegacyAMA
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\GetContractLegacyAMA $parameters
     * @return \StructType\GetContractLegacyAMAResponse|bool
     */
    public function GetContractLegacyAMA(\StructType\GetContractLegacyAMA $parameters)
    {
        try {
            $this->setResult(self::getSoapClient()->GetContractLegacyAMA($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetContractLegacyIA
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\GetContractLegacyIA $parameters
     * @return \StructType\GetContractLegacyIAResponse|bool
     */
    public function GetContractLegacyIA(\StructType\GetContractLegacyIA $parameters)
    {
        try {
            $this->setResult(self::getSoapClient()->GetContractLegacyIA($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetContractID
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\GetContractID $parameters
     * @return \StructType\GetContractIDResponse|bool
     */
    public function GetContractID(\StructType\GetContractID $parameters)
    {
        try {
            $this->setResult(self::getSoapClient()->GetContractID($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \StructType\GetContractAsPrimaryResponse|\StructType\GetContractIDResponse|\StructType\GetContractLegacyAMAResponse|\StructType\GetContractLegacyIAResponse|\StructType\GetContractResponse
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
