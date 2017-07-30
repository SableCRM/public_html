<?php

namespace ServiceType;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Unique ServiceType
 * @subpackage Services
 */
class Unique extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named UniqueDealerNames
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\UniqueDealerNames $parameters
     * @return \StructType\UniqueDealerNamesResponse|bool
     */
    public function UniqueDealerNames(\StructType\UniqueDealerNames $parameters)
    {
        try {
            $this->setResult(self::getSoapClient()->UniqueDealerNames($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \StructType\UniqueDealerNamesResponse
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
