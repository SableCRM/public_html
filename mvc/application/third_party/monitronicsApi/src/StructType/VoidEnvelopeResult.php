<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for VoidEnvelopeResult StructType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:VoidEnvelopeResult
 * @subpackage Structs
 */
class VoidEnvelopeResult extends AbstractStructBase
{
    /**
     * The Result
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var bool
     */
    public $Result;
    /**
     * The ResultData
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $ResultData;
    /**
     * Constructor method for VoidEnvelopeResult
     * @uses VoidEnvelopeResult::setResult()
     * @uses VoidEnvelopeResult::setResultData()
     * @param bool $result
     * @param string $resultData
     */
    public function __construct($result = null, $resultData = null)
    {
        $this
            ->setResult($result)
            ->setResultData($resultData);
    }
    /**
     * Get Result value
     * @return bool|null
     */
    public function getResult()
    {
        return $this->Result;
    }
    /**
     * Set Result value
     * @param bool $result
     * @return \StructType\VoidEnvelopeResult
     */
    public function setResult($result = null)
    {
        // validation for constraint: boolean
        if (!is_null($result) && !is_bool($result)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($result)), __LINE__);
        }
        $this->Result = $result;
        return $this;
    }
    /**
     * Get ResultData value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getResultData()
    {
        return isset($this->ResultData) ? $this->ResultData : null;
    }
    /**
     * Set ResultData value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $resultData
     * @return \StructType\VoidEnvelopeResult
     */
    public function setResultData($resultData = null)
    {
        // validation for constraint: string
        if (!is_null($resultData) && !is_string($resultData)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($resultData)), __LINE__);
        }
        if (is_null($resultData) || (is_array($resultData) && empty($resultData))) {
            unset($this->ResultData);
        } else {
            $this->ResultData = $resultData;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\VoidEnvelopeResult
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
