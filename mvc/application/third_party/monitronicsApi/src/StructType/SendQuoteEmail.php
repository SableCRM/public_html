<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for SendQuoteEmail StructType
 * @subpackage Structs
 */
class SendQuoteEmail extends AbstractStructBase
{
    /**
     * The ContractData
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \StructType\ContractDocument
     */
    public $ContractData;
    /**
     * Constructor method for SendQuoteEmail
     * @uses SendQuoteEmail::setContractData()
     * @param \StructType\ContractDocument $contractData
     */
    public function __construct(\StructType\ContractDocument $contractData = null)
    {
        $this
            ->setContractData($contractData);
    }
    /**
     * Get ContractData value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \StructType\ContractDocument|null
     */
    public function getContractData()
    {
        return isset($this->ContractData) ? $this->ContractData : null;
    }
    /**
     * Set ContractData value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \StructType\ContractDocument $contractData
     * @return \StructType\SendQuoteEmail
     */
    public function setContractData(\StructType\ContractDocument $contractData = null)
    {
        if (is_null($contractData) || (is_array($contractData) && empty($contractData))) {
            unset($this->ContractData);
        } else {
            $this->ContractData = $contractData;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\SendQuoteEmail
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
