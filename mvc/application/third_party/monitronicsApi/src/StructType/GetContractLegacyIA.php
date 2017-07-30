<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for GetContractLegacyIA StructType
 * @subpackage Structs
 */
class GetContractLegacyIA extends AbstractStructBase
{
    /**
     * The ContractID
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var int
     */
    public $ContractID;
    /**
     * Constructor method for GetContractLegacyIA
     * @uses GetContractLegacyIA::setContractID()
     * @param int $contractID
     */
    public function __construct($contractID = null)
    {
        $this
            ->setContractID($contractID);
    }
    /**
     * Get ContractID value
     * @return int|null
     */
    public function getContractID()
    {
        return $this->ContractID;
    }
    /**
     * Set ContractID value
     * @param int $contractID
     * @return \StructType\GetContractLegacyIA
     */
    public function setContractID($contractID = null)
    {
        // validation for constraint: int
        if (!is_null($contractID) && !is_numeric($contractID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($contractID)), __LINE__);
        }
        $this->ContractID = $contractID;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\GetContractLegacyIA
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
