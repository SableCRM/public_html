<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for ProgramDiscounts StructType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:ProgramDiscounts
 * @subpackage Structs
 */
class ProgramDiscounts extends AbstractStructBase
{
    /**
     * The DisplayName
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $DisplayName;
    /**
     * The ProgramCode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $ProgramCode;
    /**
     * The ProgramID
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var int
     */
    public $ProgramID;
    /**
     * The RMRDiscountAmount
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var float
     */
    public $RMRDiscountAmount;
    /**
     * The RMRDiscountCode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $RMRDiscountCode;
    /**
     * The RMRIsPercent
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var bool
     */
    public $RMRIsPercent;
    /**
     * The ValidCountries
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $ValidCountries;
    /**
     * The ValidForCommercial
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var bool
     */
    public $ValidForCommercial;
    /**
     * The ValidForResidential
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var bool
     */
    public $ValidForResidential;
    /**
     * Constructor method for ProgramDiscounts
     * @uses ProgramDiscounts::setDisplayName()
     * @uses ProgramDiscounts::setProgramCode()
     * @uses ProgramDiscounts::setProgramID()
     * @uses ProgramDiscounts::setRMRDiscountAmount()
     * @uses ProgramDiscounts::setRMRDiscountCode()
     * @uses ProgramDiscounts::setRMRIsPercent()
     * @uses ProgramDiscounts::setValidCountries()
     * @uses ProgramDiscounts::setValidForCommercial()
     * @uses ProgramDiscounts::setValidForResidential()
     * @param string $displayName
     * @param string $programCode
     * @param int $programID
     * @param float $rMRDiscountAmount
     * @param string $rMRDiscountCode
     * @param bool $rMRIsPercent
     * @param string $validCountries
     * @param bool $validForCommercial
     * @param bool $validForResidential
     */
    public function __construct($displayName = null, $programCode = null, $programID = null, $rMRDiscountAmount = null, $rMRDiscountCode = null, $rMRIsPercent = null, $validCountries = null, $validForCommercial = null, $validForResidential = null)
    {
        $this
            ->setDisplayName($displayName)
            ->setProgramCode($programCode)
            ->setProgramID($programID)
            ->setRMRDiscountAmount($rMRDiscountAmount)
            ->setRMRDiscountCode($rMRDiscountCode)
            ->setRMRIsPercent($rMRIsPercent)
            ->setValidCountries($validCountries)
            ->setValidForCommercial($validForCommercial)
            ->setValidForResidential($validForResidential);
    }
    /**
     * Get DisplayName value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getDisplayName()
    {
        return isset($this->DisplayName) ? $this->DisplayName : null;
    }
    /**
     * Set DisplayName value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $displayName
     * @return \StructType\ProgramDiscounts
     */
    public function setDisplayName($displayName = null)
    {
        // validation for constraint: string
        if (!is_null($displayName) && !is_string($displayName)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($displayName)), __LINE__);
        }
        if (is_null($displayName) || (is_array($displayName) && empty($displayName))) {
            unset($this->DisplayName);
        } else {
            $this->DisplayName = $displayName;
        }
        return $this;
    }
    /**
     * Get ProgramCode value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getProgramCode()
    {
        return isset($this->ProgramCode) ? $this->ProgramCode : null;
    }
    /**
     * Set ProgramCode value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $programCode
     * @return \StructType\ProgramDiscounts
     */
    public function setProgramCode($programCode = null)
    {
        // validation for constraint: string
        if (!is_null($programCode) && !is_string($programCode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($programCode)), __LINE__);
        }
        if (is_null($programCode) || (is_array($programCode) && empty($programCode))) {
            unset($this->ProgramCode);
        } else {
            $this->ProgramCode = $programCode;
        }
        return $this;
    }
    /**
     * Get ProgramID value
     * @return int|null
     */
    public function getProgramID()
    {
        return $this->ProgramID;
    }
    /**
     * Set ProgramID value
     * @param int $programID
     * @return \StructType\ProgramDiscounts
     */
    public function setProgramID($programID = null)
    {
        // validation for constraint: int
        if (!is_null($programID) && !is_numeric($programID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($programID)), __LINE__);
        }
        $this->ProgramID = $programID;
        return $this;
    }
    /**
     * Get RMRDiscountAmount value
     * @return float|null
     */
    public function getRMRDiscountAmount()
    {
        return $this->RMRDiscountAmount;
    }
    /**
     * Set RMRDiscountAmount value
     * @param float $rMRDiscountAmount
     * @return \StructType\ProgramDiscounts
     */
    public function setRMRDiscountAmount($rMRDiscountAmount = null)
    {
        $this->RMRDiscountAmount = $rMRDiscountAmount;
        return $this;
    }
    /**
     * Get RMRDiscountCode value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getRMRDiscountCode()
    {
        return isset($this->RMRDiscountCode) ? $this->RMRDiscountCode : null;
    }
    /**
     * Set RMRDiscountCode value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $rMRDiscountCode
     * @return \StructType\ProgramDiscounts
     */
    public function setRMRDiscountCode($rMRDiscountCode = null)
    {
        // validation for constraint: string
        if (!is_null($rMRDiscountCode) && !is_string($rMRDiscountCode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($rMRDiscountCode)), __LINE__);
        }
        if (is_null($rMRDiscountCode) || (is_array($rMRDiscountCode) && empty($rMRDiscountCode))) {
            unset($this->RMRDiscountCode);
        } else {
            $this->RMRDiscountCode = $rMRDiscountCode;
        }
        return $this;
    }
    /**
     * Get RMRIsPercent value
     * @return bool|null
     */
    public function getRMRIsPercent()
    {
        return $this->RMRIsPercent;
    }
    /**
     * Set RMRIsPercent value
     * @param bool $rMRIsPercent
     * @return \StructType\ProgramDiscounts
     */
    public function setRMRIsPercent($rMRIsPercent = null)
    {
        // validation for constraint: boolean
        if (!is_null($rMRIsPercent) && !is_bool($rMRIsPercent)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($rMRIsPercent)), __LINE__);
        }
        $this->RMRIsPercent = $rMRIsPercent;
        return $this;
    }
    /**
     * Get ValidCountries value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getValidCountries()
    {
        return isset($this->ValidCountries) ? $this->ValidCountries : null;
    }
    /**
     * Set ValidCountries value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $validCountries
     * @return \StructType\ProgramDiscounts
     */
    public function setValidCountries($validCountries = null)
    {
        // validation for constraint: string
        if (!is_null($validCountries) && !is_string($validCountries)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($validCountries)), __LINE__);
        }
        if (is_null($validCountries) || (is_array($validCountries) && empty($validCountries))) {
            unset($this->ValidCountries);
        } else {
            $this->ValidCountries = $validCountries;
        }
        return $this;
    }
    /**
     * Get ValidForCommercial value
     * @return bool|null
     */
    public function getValidForCommercial()
    {
        return $this->ValidForCommercial;
    }
    /**
     * Set ValidForCommercial value
     * @param bool $validForCommercial
     * @return \StructType\ProgramDiscounts
     */
    public function setValidForCommercial($validForCommercial = null)
    {
        // validation for constraint: boolean
        if (!is_null($validForCommercial) && !is_bool($validForCommercial)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($validForCommercial)), __LINE__);
        }
        $this->ValidForCommercial = $validForCommercial;
        return $this;
    }
    /**
     * Get ValidForResidential value
     * @return bool|null
     */
    public function getValidForResidential()
    {
        return $this->ValidForResidential;
    }
    /**
     * Set ValidForResidential value
     * @param bool $validForResidential
     * @return \StructType\ProgramDiscounts
     */
    public function setValidForResidential($validForResidential = null)
    {
        // validation for constraint: boolean
        if (!is_null($validForResidential) && !is_bool($validForResidential)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($validForResidential)), __LINE__);
        }
        $this->ValidForResidential = $validForResidential;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\ProgramDiscounts
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
