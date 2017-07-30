<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for CreateContractResult StructType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:CreateContractResult
 * @subpackage Structs
 */
class CreateContractResult extends AbstractStructBase
{
    /**
     * The EnvelopeID
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $EnvelopeID;
    /**
     * The FaultFields
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \ArrayType\ArrayOfKeyValueOfstringstring
     */
    public $FaultFields;
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
     * The SigningURL
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \ArrayType\ArrayOfstring_1
     */
    public $SigningURL;
    /**
     * Constructor method for CreateContractResult
     * @uses CreateContractResult::setEnvelopeID()
     * @uses CreateContractResult::setFaultFields()
     * @uses CreateContractResult::setResult()
     * @uses CreateContractResult::setResultData()
     * @uses CreateContractResult::setSigningURL()
     * @param string $envelopeID
     * @param \ArrayType\ArrayOfKeyValueOfstringstring $faultFields
     * @param bool $result
     * @param string $resultData
     * @param \ArrayType\ArrayOfstring_1 $signingURL
     */
    public function __construct($envelopeID = null, \ArrayType\ArrayOfKeyValueOfstringstring $faultFields = null, $result = null, $resultData = null, \ArrayType\ArrayOfstring_1 $signingURL = null)
    {
        $this
            ->setEnvelopeID($envelopeID)
            ->setFaultFields($faultFields)
            ->setResult($result)
            ->setResultData($resultData)
            ->setSigningURL($signingURL);
    }
    /**
     * Get EnvelopeID value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getEnvelopeID()
    {
        return isset($this->EnvelopeID) ? $this->EnvelopeID : null;
    }
    /**
     * Set EnvelopeID value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $envelopeID
     * @return \StructType\CreateContractResult
     */
    public function setEnvelopeID($envelopeID = null)
    {
        // validation for constraint: string
        if (!is_null($envelopeID) && !is_string($envelopeID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($envelopeID)), __LINE__);
        }
        if (is_null($envelopeID) || (is_array($envelopeID) && empty($envelopeID))) {
            unset($this->EnvelopeID);
        } else {
            $this->EnvelopeID = $envelopeID;
        }
        return $this;
    }
    /**
     * Get FaultFields value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \ArrayType\ArrayOfKeyValueOfstringstring|null
     */
    public function getFaultFields()
    {
        return isset($this->FaultFields) ? $this->FaultFields : null;
    }
    /**
     * Set FaultFields value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \ArrayType\ArrayOfKeyValueOfstringstring $faultFields
     * @return \StructType\CreateContractResult
     */
    public function setFaultFields(\ArrayType\ArrayOfKeyValueOfstringstring $faultFields = null)
    {
        if (is_null($faultFields) || (is_array($faultFields) && empty($faultFields))) {
            unset($this->FaultFields);
        } else {
            $this->FaultFields = $faultFields;
        }
        return $this;
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
     * @return \StructType\CreateContractResult
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
     * @return \StructType\CreateContractResult
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
     * Get SigningURL value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \ArrayType\ArrayOfstring_1|null
     */
    public function getSigningURL()
    {
        return isset($this->SigningURL) ? $this->SigningURL : null;
    }
    /**
     * Set SigningURL value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \ArrayType\ArrayOfstring_1 $signingURL
     * @return \StructType\CreateContractResult
     */
    public function setSigningURL(\ArrayType\ArrayOfstring_1 $signingURL = null)
    {
        if (is_null($signingURL) || (is_array($signingURL) && empty($signingURL))) {
            unset($this->SigningURL);
        } else {
            $this->SigningURL = $signingURL;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\CreateContractResult
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
