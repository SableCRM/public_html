<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for GetContractIDResponse StructType
 * @subpackage Structs
 */
class GetContractIDResponse extends AbstractStructBase
{
    /**
     * The GetContractIDResult
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var int
     */
    public $GetContractIDResult;
    /**
     * Constructor method for GetContractIDResponse
     * @uses GetContractIDResponse::setGetContractIDResult()
     * @param int $getContractIDResult
     */
    public function __construct($getContractIDResult = null)
    {
        $this
            ->setGetContractIDResult($getContractIDResult);
    }
    /**
     * Get GetContractIDResult value
     * @return int|null
     */
    public function getGetContractIDResult()
    {
        return $this->GetContractIDResult;
    }
    /**
     * Set GetContractIDResult value
     * @param int $getContractIDResult
     * @return \StructType\GetContractIDResponse
     */
    public function setGetContractIDResult($getContractIDResult = null)
    {
        // validation for constraint: int
        if (!is_null($getContractIDResult) && !is_numeric($getContractIDResult)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($getContractIDResult)), __LINE__);
        }
        $this->GetContractIDResult = $getContractIDResult;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\GetContractIDResponse
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
