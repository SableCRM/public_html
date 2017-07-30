<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for VerifyDependenciesResponse StructType
 * @subpackage Structs
 */
class VerifyDependenciesResponse extends AbstractStructBase
{
    /**
     * The VerifyDependenciesResult
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \ArrayType\ArrayOfstring_1
     */
    public $VerifyDependenciesResult;
    /**
     * Constructor method for VerifyDependenciesResponse
     * @uses VerifyDependenciesResponse::setVerifyDependenciesResult()
     * @param \ArrayType\ArrayOfstring_1 $verifyDependenciesResult
     */
    public function __construct(\ArrayType\ArrayOfstring_1 $verifyDependenciesResult = null)
    {
        $this
            ->setVerifyDependenciesResult($verifyDependenciesResult);
    }
    /**
     * Get VerifyDependenciesResult value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \ArrayType\ArrayOfstring_1|null
     */
    public function getVerifyDependenciesResult()
    {
        return isset($this->VerifyDependenciesResult) ? $this->VerifyDependenciesResult : null;
    }
    /**
     * Set VerifyDependenciesResult value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \ArrayType\ArrayOfstring_1 $verifyDependenciesResult
     * @return \StructType\VerifyDependenciesResponse
     */
    public function setVerifyDependenciesResult(\ArrayType\ArrayOfstring_1 $verifyDependenciesResult = null)
    {
        if (is_null($verifyDependenciesResult) || (is_array($verifyDependenciesResult) && empty($verifyDependenciesResult))) {
            unset($this->VerifyDependenciesResult);
        } else {
            $this->VerifyDependenciesResult = $verifyDependenciesResult;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\VerifyDependenciesResponse
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
