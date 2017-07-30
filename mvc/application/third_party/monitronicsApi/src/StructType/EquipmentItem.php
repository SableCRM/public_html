<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for EquipmentItem StructType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:EquipmentItem
 * @subpackage Structs
 */
class EquipmentItem extends AbstractStructBase
{
    /**
     * The Name
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Name;
    /**
     * The Points
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var int
     */
    public $Points;
    /**
     * The Price
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var float
     */
    public $Price;
    /**
     * The Quantity
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var int
     */
    public $Quantity;
    /**
     * The Total
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var float
     */
    public $Total;
    /**
     * Constructor method for EquipmentItem
     * @uses EquipmentItem::setName()
     * @uses EquipmentItem::setPoints()
     * @uses EquipmentItem::setPrice()
     * @uses EquipmentItem::setQuantity()
     * @uses EquipmentItem::setTotal()
     * @param string $name
     * @param int $points
     * @param float $price
     * @param int $quantity
     * @param float $total
     */
    public function __construct($name = null, $points = null, $price = null, $quantity = null, $total = null)
    {
        $this
            ->setName($name)
            ->setPoints($points)
            ->setPrice($price)
            ->setQuantity($quantity)
            ->setTotal($total);
    }
    /**
     * Get Name value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getName()
    {
        return isset($this->Name) ? $this->Name : null;
    }
    /**
     * Set Name value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $name
     * @return \StructType\EquipmentItem
     */
    public function setName($name = null)
    {
        // validation for constraint: string
        if (!is_null($name) && !is_string($name)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($name)), __LINE__);
        }
        if (is_null($name) || (is_array($name) && empty($name))) {
            unset($this->Name);
        } else {
            $this->Name = $name;
        }
        return $this;
    }
    /**
     * Get Points value
     * @return int|null
     */
    public function getPoints()
    {
        return $this->Points;
    }
    /**
     * Set Points value
     * @param int $points
     * @return \StructType\EquipmentItem
     */
    public function setPoints($points = null)
    {
        // validation for constraint: int
        if (!is_null($points) && !is_numeric($points)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($points)), __LINE__);
        }
        $this->Points = $points;
        return $this;
    }
    /**
     * Get Price value
     * @return float|null
     */
    public function getPrice()
    {
        return $this->Price;
    }
    /**
     * Set Price value
     * @param float $price
     * @return \StructType\EquipmentItem
     */
    public function setPrice($price = null)
    {
        $this->Price = $price;
        return $this;
    }
    /**
     * Get Quantity value
     * @return int|null
     */
    public function getQuantity()
    {
        return $this->Quantity;
    }
    /**
     * Set Quantity value
     * @param int $quantity
     * @return \StructType\EquipmentItem
     */
    public function setQuantity($quantity = null)
    {
        // validation for constraint: int
        if (!is_null($quantity) && !is_numeric($quantity)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($quantity)), __LINE__);
        }
        $this->Quantity = $quantity;
        return $this;
    }
    /**
     * Get Total value
     * @return float|null
     */
    public function getTotal()
    {
        return $this->Total;
    }
    /**
     * Set Total value
     * @param float $total
     * @return \StructType\EquipmentItem
     */
    public function setTotal($total = null)
    {
        $this->Total = $total;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\EquipmentItem
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
