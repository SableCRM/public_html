<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for GetContractAsPrimaryResponse StructType
 * @subpackage Structs
 */
class GetContractAsPrimaryResponse extends AbstractStructBase
{
    /**
     * The GetContractAsPrimaryResult
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \StructType\ContractEnvelope
     */
    public $GetContractAsPrimaryResult;
    /**
     * Constructor method for GetContractAsPrimaryResponse
     * @uses GetContractAsPrimaryResponse::setGetContractAsPrimaryResult()
     * @param \StructType\ContractEnvelope $getContractAsPrimaryResult
     */
    public function __construct(\StructType\ContractEnvelope $getContractAsPrimaryResult = null)
    {
        $this
            ->setGetContractAsPrimaryResult($getContractAsPrimaryResult);
    }
    /**
     * Get GetContractAsPrimaryResult value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \StructType\ContractEnvelope|null
     */
    public function getGetContractAsPrimaryResult()
    {
        return isset($this->GetContractAsPrimaryResult) ? $this->GetContractAsPrimaryResult : null;
    }
    /**
     * Set GetContractAsPrimaryResult value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \StructType\ContractEnvelope $getContractAsPrimaryResult
     * @return \StructType\GetContractAsPrimaryResponse
     */
    public function setGetContractAsPrimaryResult(\StructType\ContractEnvelope $getContractAsPrimaryResult = null)
    {
        if (is_null($getContractAsPrimaryResult) || (is_array($getContractAsPrimaryResult) && empty($getContractAsPrimaryResult))) {
            unset($this->GetContractAsPrimaryResult);
        } else {
            $this->GetContractAsPrimaryResult = $getContractAsPrimaryResult;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\GetContractAsPrimaryResponse
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
