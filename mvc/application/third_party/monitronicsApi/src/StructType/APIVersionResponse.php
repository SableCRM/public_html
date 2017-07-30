<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for APIVersionResponse StructType
 * @subpackage Structs
 */
class APIVersionResponse extends AbstractStructBase
{
    /**
     * The APIVersionResult
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $APIVersionResult;
    /**
     * Constructor method for APIVersionResponse
     * @uses APIVersionResponse::setAPIVersionResult()
     * @param string $aPIVersionResult
     */
    public function __construct($aPIVersionResult = null)
    {
        $this
            ->setAPIVersionResult($aPIVersionResult);
    }
    /**
     * Get APIVersionResult value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getAPIVersionResult()
    {
        return isset($this->APIVersionResult) ? $this->APIVersionResult : null;
    }
    /**
     * Set APIVersionResult value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $aPIVersionResult
     * @return \StructType\APIVersionResponse
     */
    public function setAPIVersionResult($aPIVersionResult = null)
    {
        // validation for constraint: string
        if (!is_null($aPIVersionResult) && !is_string($aPIVersionResult)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($aPIVersionResult)), __LINE__);
        }
        if (is_null($aPIVersionResult) || (is_array($aPIVersionResult) && empty($aPIVersionResult))) {
            unset($this->APIVersionResult);
        } else {
            $this->APIVersionResult = $aPIVersionResult;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\APIVersionResponse
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
