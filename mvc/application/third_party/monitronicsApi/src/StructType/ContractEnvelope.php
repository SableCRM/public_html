<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for ContractEnvelope StructType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:ContractEnvelope
 * @subpackage Structs
 */
class ContractEnvelope extends AbstractStructBase
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
     * The PDFBytes
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $PDFBytes;
    /**
     * Constructor method for ContractEnvelope
     * @uses ContractEnvelope::setEnvelopeID()
     * @uses ContractEnvelope::setPDFBytes()
     * @param string $envelopeID
     * @param string $pDFBytes
     */
    public function __construct($envelopeID = null, $pDFBytes = null)
    {
        $this
            ->setEnvelopeID($envelopeID)
            ->setPDFBytes($pDFBytes);
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
     * @return \StructType\ContractEnvelope
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
     * Get PDFBytes value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPDFBytes()
    {
        return isset($this->PDFBytes) ? $this->PDFBytes : null;
    }
    /**
     * Set PDFBytes value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $pDFBytes
     * @return \StructType\ContractEnvelope
     */
    public function setPDFBytes($pDFBytes = null)
    {
        // validation for constraint: string
        if (!is_null($pDFBytes) && !is_string($pDFBytes)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($pDFBytes)), __LINE__);
        }
        if (is_null($pDFBytes) || (is_array($pDFBytes) && empty($pDFBytes))) {
            unset($this->PDFBytes);
        } else {
            $this->PDFBytes = $pDFBytes;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\ContractEnvelope
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
