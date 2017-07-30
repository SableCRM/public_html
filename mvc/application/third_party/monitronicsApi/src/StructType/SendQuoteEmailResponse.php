<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for SendQuoteEmailResponse StructType
 * @subpackage Structs
 */
class SendQuoteEmailResponse extends AbstractStructBase
{
    /**
     * The SendQuoteEmailResult
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var bool
     */
    public $SendQuoteEmailResult;
    /**
     * Constructor method for SendQuoteEmailResponse
     * @uses SendQuoteEmailResponse::setSendQuoteEmailResult()
     * @param bool $sendQuoteEmailResult
     */
    public function __construct($sendQuoteEmailResult = null)
    {
        $this
            ->setSendQuoteEmailResult($sendQuoteEmailResult);
    }
    /**
     * Get SendQuoteEmailResult value
     * @return bool|null
     */
    public function getSendQuoteEmailResult()
    {
        return $this->SendQuoteEmailResult;
    }
    /**
     * Set SendQuoteEmailResult value
     * @param bool $sendQuoteEmailResult
     * @return \StructType\SendQuoteEmailResponse
     */
    public function setSendQuoteEmailResult($sendQuoteEmailResult = null)
    {
        // validation for constraint: boolean
        if (!is_null($sendQuoteEmailResult) && !is_bool($sendQuoteEmailResult)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($sendQuoteEmailResult)), __LINE__);
        }
        $this->SendQuoteEmailResult = $sendQuoteEmailResult;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\SendQuoteEmailResponse
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
