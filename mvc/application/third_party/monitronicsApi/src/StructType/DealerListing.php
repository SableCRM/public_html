<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for DealerListing StructType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:DealerListing
 * @subpackage Structs
 */
class DealerListing extends AbstractStructBase
{
    /**
     * The DealerName
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $DealerName;
    /**
     * The DealerNumber
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $DealerNumber;
    /**
     * Constructor method for DealerListing
     * @uses DealerListing::setDealerName()
     * @uses DealerListing::setDealerNumber()
     * @param string $dealerName
     * @param string $dealerNumber
     */
    public function __construct($dealerName = null, $dealerNumber = null)
    {
        $this
            ->setDealerName($dealerName)
            ->setDealerNumber($dealerNumber);
    }
    /**
     * Get DealerName value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getDealerName()
    {
        return isset($this->DealerName) ? $this->DealerName : null;
    }
    /**
     * Set DealerName value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $dealerName
     * @return \StructType\DealerListing
     */
    public function setDealerName($dealerName = null)
    {
        // validation for constraint: string
        if (!is_null($dealerName) && !is_string($dealerName)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($dealerName)), __LINE__);
        }
        if (is_null($dealerName) || (is_array($dealerName) && empty($dealerName))) {
            unset($this->DealerName);
        } else {
            $this->DealerName = $dealerName;
        }
        return $this;
    }
    /**
     * Get DealerNumber value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getDealerNumber()
    {
        return isset($this->DealerNumber) ? $this->DealerNumber : null;
    }
    /**
     * Set DealerNumber value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $dealerNumber
     * @return \StructType\DealerListing
     */
    public function setDealerNumber($dealerNumber = null)
    {
        // validation for constraint: string
        if (!is_null($dealerNumber) && !is_string($dealerNumber)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($dealerNumber)), __LINE__);
        }
        if (is_null($dealerNumber) || (is_array($dealerNumber) && empty($dealerNumber))) {
            unset($this->DealerNumber);
        } else {
            $this->DealerNumber = $dealerNumber;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\DealerListing
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
