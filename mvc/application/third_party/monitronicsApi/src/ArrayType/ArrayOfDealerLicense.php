<?php

namespace ArrayType;

use \WsdlToPhp\PackageBase\AbstractStructArrayBase;

/**
 * This class stands for ArrayOfDealerLicense ArrayType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:ArrayOfDealerLicense
 * @subpackage Arrays
 */
class ArrayOfDealerLicense extends AbstractStructArrayBase
{
    /**
     * The DealerLicense
     * Meta informations extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * - nillable: true
     * @var \StructType\DealerLicense[]
     */
    public $DealerLicense;
    /**
     * Constructor method for ArrayOfDealerLicense
     * @uses ArrayOfDealerLicense::setDealerLicense()
     * @param \StructType\DealerLicense[] $dealerLicense
     */
    public function __construct(array $dealerLicense = array())
    {
        $this
            ->setDealerLicense($dealerLicense);
    }
    /**
     * Get DealerLicense value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \StructType\DealerLicense[]|null
     */
    public function getDealerLicense()
    {
        return isset($this->DealerLicense) ? $this->DealerLicense : null;
    }
    /**
     * Set DealerLicense value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @throws \InvalidArgumentException
     * @param \StructType\DealerLicense[] $dealerLicense
     * @return \ArrayType\ArrayOfDealerLicense
     */
    public function setDealerLicense(array $dealerLicense = array())
    {
        foreach ($dealerLicense as $arrayOfDealerLicenseDealerLicenseItem) {
            // validation for constraint: itemType
            if (!$arrayOfDealerLicenseDealerLicenseItem instanceof \StructType\DealerLicense) {
                throw new \InvalidArgumentException(sprintf('The DealerLicense property can only contain items of \StructType\DealerLicense, "%s" given', is_object($arrayOfDealerLicenseDealerLicenseItem) ? get_class($arrayOfDealerLicenseDealerLicenseItem) : gettype($arrayOfDealerLicenseDealerLicenseItem)), __LINE__);
            }
        }
        if (is_null($dealerLicense) || (is_array($dealerLicense) && empty($dealerLicense))) {
            unset($this->DealerLicense);
        } else {
            $this->DealerLicense = $dealerLicense;
        }
        return $this;
    }
    /**
     * Add item to DealerLicense value
     * @throws \InvalidArgumentException
     * @param \StructType\DealerLicense $item
     * @return \ArrayType\ArrayOfDealerLicense
     */
    public function addToDealerLicense(\StructType\DealerLicense $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\DealerLicense) {
            throw new \InvalidArgumentException(sprintf('The DealerLicense property can only contain items of \StructType\DealerLicense, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
        }
        $this->DealerLicense[] = $item;
        return $this;
    }
    /**
     * Returns the current element
     * @see AbstractStructArrayBase::current()
     * @return \StructType\DealerLicense|null
     */
    public function current()
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see AbstractStructArrayBase::item()
     * @param int $index
     * @return \StructType\DealerLicense|null
     */
    public function item($index)
    {
        return parent::item($index);
    }
    /**
     * Returns the first element
     * @see AbstractStructArrayBase::first()
     * @return \StructType\DealerLicense|null
     */
    public function first()
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see AbstractStructArrayBase::last()
     * @return \StructType\DealerLicense|null
     */
    public function last()
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see AbstractStructArrayBase::offsetGet()
     * @param int $offset
     * @return \StructType\DealerLicense|null
     */
    public function offsetGet($offset)
    {
        return parent::offsetGet($offset);
    }
    /**
     * Returns the attribute name
     * @see AbstractStructArrayBase::getAttributeName()
     * @return string DealerLicense
     */
    public function getAttributeName()
    {
        return 'DealerLicense';
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructArrayBase::__set_state()
     * @uses AbstractStructArrayBase::__set_state()
     * @param array $array the exported values
     * @return \ArrayType\ArrayOfDealerLicense
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
