<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for ValidateContract2Response StructType
 * @subpackage Structs
 */
class ValidateContract2Response extends AbstractStructBase
{
    /**
     * The ValidateContract2Result
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \StructType\CreateContractResult
     */
    public $ValidateContract2Result;
    /**
     * Constructor method for ValidateContract2Response
     * @uses ValidateContract2Response::setValidateContract2Result()
     * @param \StructType\CreateContractResult $validateContract2Result
     */
    public function __construct(\StructType\CreateContractResult $validateContract2Result = null)
    {
        $this
            ->setValidateContract2Result($validateContract2Result);
    }
    /**
     * Get ValidateContract2Result value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \StructType\CreateContractResult|null
     */
    public function getValidateContract2Result()
    {
        return isset($this->ValidateContract2Result) ? $this->ValidateContract2Result : null;
    }
    /**
     * Set ValidateContract2Result value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \StructType\CreateContractResult $validateContract2Result
     * @return \StructType\ValidateContract2Response
     */
    public function setValidateContract2Result(\StructType\CreateContractResult $validateContract2Result = null)
    {
        if (is_null($validateContract2Result) || (is_array($validateContract2Result) && empty($validateContract2Result))) {
            unset($this->ValidateContract2Result);
        } else {
            $this->ValidateContract2Result = $validateContract2Result;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\ValidateContract2Response
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
