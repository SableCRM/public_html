<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for GetContractLegacyAMAResponse StructType
 * @subpackage Structs
 */
class GetContractLegacyAMAResponse extends AbstractStructBase
{
    /**
     * The GetContractLegacyAMAResult
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \StructType\ContractEnvelope
     */
    public $GetContractLegacyAMAResult;
    /**
     * Constructor method for GetContractLegacyAMAResponse
     * @uses GetContractLegacyAMAResponse::setGetContractLegacyAMAResult()
     * @param \StructType\ContractEnvelope $getContractLegacyAMAResult
     */
    public function __construct(\StructType\ContractEnvelope $getContractLegacyAMAResult = null)
    {
        $this
            ->setGetContractLegacyAMAResult($getContractLegacyAMAResult);
    }
    /**
     * Get GetContractLegacyAMAResult value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \StructType\ContractEnvelope|null
     */
    public function getGetContractLegacyAMAResult()
    {
        return isset($this->GetContractLegacyAMAResult) ? $this->GetContractLegacyAMAResult : null;
    }
    /**
     * Set GetContractLegacyAMAResult value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \StructType\ContractEnvelope $getContractLegacyAMAResult
     * @return \StructType\GetContractLegacyAMAResponse
     */
    public function setGetContractLegacyAMAResult(\StructType\ContractEnvelope $getContractLegacyAMAResult = null)
    {
        if (is_null($getContractLegacyAMAResult) || (is_array($getContractLegacyAMAResult) && empty($getContractLegacyAMAResult))) {
            unset($this->GetContractLegacyAMAResult);
        } else {
            $this->GetContractLegacyAMAResult = $getContractLegacyAMAResult;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\GetContractLegacyAMAResponse
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
