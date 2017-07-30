<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for SendQuoteEmail2Response StructType
 * @subpackage Structs
 */
class SendQuoteEmail2Response extends AbstractStructBase
{
    /**
     * The SendQuoteEmail2Result
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var bool
     */
    public $SendQuoteEmail2Result;
    /**
     * Constructor method for SendQuoteEmail2Response
     * @uses SendQuoteEmail2Response::setSendQuoteEmail2Result()
     * @param bool $sendQuoteEmail2Result
     */
    public function __construct($sendQuoteEmail2Result = null)
    {
        $this
            ->setSendQuoteEmail2Result($sendQuoteEmail2Result);
    }
    /**
     * Get SendQuoteEmail2Result value
     * @return bool|null
     */
    public function getSendQuoteEmail2Result()
    {
        return $this->SendQuoteEmail2Result;
    }
    /**
     * Set SendQuoteEmail2Result value
     * @param bool $sendQuoteEmail2Result
     * @return \StructType\SendQuoteEmail2Response
     */
    public function setSendQuoteEmail2Result($sendQuoteEmail2Result = null)
    {
        // validation for constraint: boolean
        if (!is_null($sendQuoteEmail2Result) && !is_bool($sendQuoteEmail2Result)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($sendQuoteEmail2Result)), __LINE__);
        }
        $this->SendQuoteEmail2Result = $sendQuoteEmail2Result;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\SendQuoteEmail2Response
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
