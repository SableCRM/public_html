<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for CreateContractResponse StructType
 * @subpackage Structs
 */
class CreateContractResponse extends AbstractStructBase
{
    /**
     * The CreateContractResult
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \StructType\CreateContractResult
     */
    public $CreateContractResult;
    /**
     * Constructor method for CreateContractResponse
     * @uses CreateContractResponse::setCreateContractResult()
     * @param \StructType\CreateContractResult $createContractResult
     */
    public function __construct(\StructType\CreateContractResult $createContractResult = null)
    {
        $this
            ->setCreateContractResult($createContractResult);
    }
    /**
     * Get CreateContractResult value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \StructType\CreateContractResult|null
     */
    public function getCreateContractResult()
    {
        return isset($this->CreateContractResult) ? $this->CreateContractResult : null;
    }
    /**
     * Set CreateContractResult value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \StructType\CreateContractResult $createContractResult
     * @return \StructType\CreateContractResponse
     */
    public function setCreateContractResult(\StructType\CreateContractResult $createContractResult = null)
    {
        if (is_null($createContractResult) || (is_array($createContractResult) && empty($createContractResult))) {
            unset($this->CreateContractResult);
        } else {
            $this->CreateContractResult = $createContractResult;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\CreateContractResponse
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
