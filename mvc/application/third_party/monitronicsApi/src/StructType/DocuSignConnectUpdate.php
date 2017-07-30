<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for DocuSignConnectUpdate StructType
 * @subpackage Structs
 */
class DocuSignConnectUpdate extends AbstractStructBase
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
     * The ContractID
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var int
     */
    public $ContractID;
    /**
     * The Status
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Status;
    /**
     * Constructor method for DocuSignConnectUpdate
     * @uses DocuSignConnectUpdate::setEnvelopeID()
     * @uses DocuSignConnectUpdate::setContractID()
     * @uses DocuSignConnectUpdate::setStatus()
     * @param string $envelopeID
     * @param int $contractID
     * @param string $status
     */
    public function __construct($envelopeID = null, $contractID = null, $status = null)
    {
        $this
            ->setEnvelopeID($envelopeID)
            ->setContractID($contractID)
            ->setStatus($status);
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
     * @return \StructType\DocuSignConnectUpdate
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
     * @return \StructType\DocuSignConnectUpdate
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
     * Get Status value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getStatus()
    {
        return isset($this->Status) ? $this->Status : null;
    }
    /**
     * Set Status value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $status
     * @return \StructType\DocuSignConnectUpdate
     */
    public function setStatus($status = null)
    {
        // validation for constraint: string
        if (!is_null($status) && !is_string($status)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($status)), __LINE__);
        }
        if (is_null($status) || (is_array($status) && empty($status))) {
            unset($this->Status);
        } else {
            $this->Status = $status;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\DocuSignConnectUpdate
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
