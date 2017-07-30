<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for UploadAttachmentResponse StructType
 * @subpackage Structs
 */
class UploadAttachmentResponse extends AbstractStructBase
{
    /**
     * The UploadAttachmentResult
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $UploadAttachmentResult;
    /**
     * Constructor method for UploadAttachmentResponse
     * @uses UploadAttachmentResponse::setUploadAttachmentResult()
     * @param string $uploadAttachmentResult
     */
    public function __construct($uploadAttachmentResult = null)
    {
        $this
            ->setUploadAttachmentResult($uploadAttachmentResult);
    }
    /**
     * Get UploadAttachmentResult value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getUploadAttachmentResult()
    {
        return isset($this->UploadAttachmentResult) ? $this->UploadAttachmentResult : null;
    }
    /**
     * Set UploadAttachmentResult value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $uploadAttachmentResult
     * @return \StructType\UploadAttachmentResponse
     */
    public function setUploadAttachmentResult($uploadAttachmentResult = null)
    {
        // validation for constraint: string
        if (!is_null($uploadAttachmentResult) && !is_string($uploadAttachmentResult)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($uploadAttachmentResult)), __LINE__);
        }
        if (is_null($uploadAttachmentResult) || (is_array($uploadAttachmentResult) && empty($uploadAttachmentResult))) {
            unset($this->UploadAttachmentResult);
        } else {
            $this->UploadAttachmentResult = $uploadAttachmentResult;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\UploadAttachmentResponse
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
