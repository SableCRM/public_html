<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for CreateContract StructType
 * @subpackage Structs
 */
class CreateContract extends AbstractStructBase
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
     * The PrimarySigningType
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $PrimarySigningType;
    /**
     * The SecondarySigningType
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $SecondarySigningType;
    /**
     * Constructor method for CreateContract
     * @uses CreateContract::setContractData()
     * @uses CreateContract::setPrimarySigningType()
     * @uses CreateContract::setSecondarySigningType()
     * @param \StructType\ContractDocument $contractData
     * @param string $primarySigningType
     * @param string $secondarySigningType
     */
    public function __construct(\StructType\ContractDocument $contractData = null, $primarySigningType = null, $secondarySigningType = null)
    {
        $this
            ->setContractData($contractData)
            ->setPrimarySigningType($primarySigningType)
            ->setSecondarySigningType($secondarySigningType);
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
     * @return \StructType\CreateContract
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
     * Get PrimarySigningType value
     * @return string|null
     */
    public function getPrimarySigningType()
    {
        return $this->PrimarySigningType;
    }
    /**
     * Set PrimarySigningType value
     * @uses \EnumType\SigningType::valueIsValid()
     * @uses \EnumType\SigningType::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $primarySigningType
     * @return \StructType\CreateContract
     */
    public function setPrimarySigningType($primarySigningType = null)
    {
        // validation for constraint: enumeration
        if (!\EnumType\SigningType::valueIsValid($primarySigningType)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" is invalid, please use one of: %s', $primarySigningType, implode(', ', \EnumType\SigningType::getValidValues())), __LINE__);
        }
        $this->PrimarySigningType = $primarySigningType;
        return $this;
    }
    /**
     * Get SecondarySigningType value
     * @return string|null
     */
    public function getSecondarySigningType()
    {
        return $this->SecondarySigningType;
    }
    /**
     * Set SecondarySigningType value
     * @uses \EnumType\SigningType::valueIsValid()
     * @uses \EnumType\SigningType::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $secondarySigningType
     * @return \StructType\CreateContract
     */
    public function setSecondarySigningType($secondarySigningType = null)
    {
        // validation for constraint: enumeration
        if (!\EnumType\SigningType::valueIsValid($secondarySigningType)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" is invalid, please use one of: %s', $secondarySigningType, implode(', ', \EnumType\SigningType::getValidValues())), __LINE__);
        }
        $this->SecondarySigningType = $secondarySigningType;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\CreateContract
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
