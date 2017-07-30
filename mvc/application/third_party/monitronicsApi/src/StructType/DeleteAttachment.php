<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for DeleteAttachment StructType
 * @subpackage Structs
 */
class DeleteAttachment extends AbstractStructBase
{
    /**
     * The AttachmentGUID
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $AttachmentGUID;
    /**
     * Constructor method for DeleteAttachment
     * @uses DeleteAttachment::setAttachmentGUID()
     * @param string $attachmentGUID
     */
    public function __construct($attachmentGUID = null)
    {
        $this
            ->setAttachmentGUID($attachmentGUID);
    }
    /**
     * Get AttachmentGUID value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getAttachmentGUID()
    {
        return isset($this->AttachmentGUID) ? $this->AttachmentGUID : null;
    }
    /**
     * Set AttachmentGUID value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $attachmentGUID
     * @return \StructType\DeleteAttachment
     */
    public function setAttachmentGUID($attachmentGUID = null)
    {
        // validation for constraint: string
        if (!is_null($attachmentGUID) && !is_string($attachmentGUID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($attachmentGUID)), __LINE__);
        }
        if (is_null($attachmentGUID) || (is_array($attachmentGUID) && empty($attachmentGUID))) {
            unset($this->AttachmentGUID);
        } else {
            $this->AttachmentGUID = $attachmentGUID;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\DeleteAttachment
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
