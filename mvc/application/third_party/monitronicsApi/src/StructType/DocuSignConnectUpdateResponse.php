<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for DocuSignConnectUpdateResponse StructType
 * @subpackage Structs
 */
class DocuSignConnectUpdateResponse extends AbstractStructBase
{
    /**
     * The DocuSignConnectUpdateResult
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $DocuSignConnectUpdateResult;
    /**
     * Constructor method for DocuSignConnectUpdateResponse
     * @uses DocuSignConnectUpdateResponse::setDocuSignConnectUpdateResult()
     * @param string $docuSignConnectUpdateResult
     */
    public function __construct($docuSignConnectUpdateResult = null)
    {
        $this
            ->setDocuSignConnectUpdateResult($docuSignConnectUpdateResult);
    }
    /**
     * Get DocuSignConnectUpdateResult value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getDocuSignConnectUpdateResult()
    {
        return isset($this->DocuSignConnectUpdateResult) ? $this->DocuSignConnectUpdateResult : null;
    }
    /**
     * Set DocuSignConnectUpdateResult value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $docuSignConnectUpdateResult
     * @return \StructType\DocuSignConnectUpdateResponse
     */
    public function setDocuSignConnectUpdateResult($docuSignConnectUpdateResult = null)
    {
        // validation for constraint: string
        if (!is_null($docuSignConnectUpdateResult) && !is_string($docuSignConnectUpdateResult)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($docuSignConnectUpdateResult)), __LINE__);
        }
        if (is_null($docuSignConnectUpdateResult) || (is_array($docuSignConnectUpdateResult) && empty($docuSignConnectUpdateResult))) {
            unset($this->DocuSignConnectUpdateResult);
        } else {
            $this->DocuSignConnectUpdateResult = $docuSignConnectUpdateResult;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\DocuSignConnectUpdateResponse
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
