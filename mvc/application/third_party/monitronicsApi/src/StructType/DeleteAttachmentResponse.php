<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for DeleteAttachmentResponse StructType
 * @subpackage Structs
 */
class DeleteAttachmentResponse extends AbstractStructBase
{
    /**
     * The DeleteAttachmentResult
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var bool
     */
    public $DeleteAttachmentResult;
    /**
     * Constructor method for DeleteAttachmentResponse
     * @uses DeleteAttachmentResponse::setDeleteAttachmentResult()
     * @param bool $deleteAttachmentResult
     */
    public function __construct($deleteAttachmentResult = null)
    {
        $this
            ->setDeleteAttachmentResult($deleteAttachmentResult);
    }
    /**
     * Get DeleteAttachmentResult value
     * @return bool|null
     */
    public function getDeleteAttachmentResult()
    {
        return $this->DeleteAttachmentResult;
    }
    /**
     * Set DeleteAttachmentResult value
     * @param bool $deleteAttachmentResult
     * @return \StructType\DeleteAttachmentResponse
     */
    public function setDeleteAttachmentResult($deleteAttachmentResult = null)
    {
        // validation for constraint: boolean
        if (!is_null($deleteAttachmentResult) && !is_bool($deleteAttachmentResult)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($deleteAttachmentResult)), __LINE__);
        }
        $this->DeleteAttachmentResult = $deleteAttachmentResult;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\DeleteAttachmentResponse
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
