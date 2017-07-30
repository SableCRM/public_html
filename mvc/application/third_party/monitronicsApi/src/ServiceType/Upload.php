<?php

namespace ServiceType;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Upload ServiceType
 * @subpackage Services
 */
class Upload extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named UploadAttachment
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\UploadAttachment $parameters
     * @return \StructType\UploadAttachmentResponse|bool
     */
    public function UploadAttachment(\StructType\UploadAttachment $parameters)
    {
        try {
            $this->setResult(self::getSoapClient()->UploadAttachment($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \StructType\UploadAttachmentResponse
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
