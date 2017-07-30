<?php

namespace ArrayType;

use \WsdlToPhp\PackageBase\AbstractStructArrayBase;

/**
 * This class stands for ArrayOfDealerListing ArrayType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:ArrayOfDealerListing
 * @subpackage Arrays
 */
class ArrayOfDealerListing extends AbstractStructArrayBase
{
    /**
     * The DealerListing
     * Meta informations extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * - nillable: true
     * @var \StructType\DealerListing[]
     */
    public $DealerListing;
    /**
     * Constructor method for ArrayOfDealerListing
     * @uses ArrayOfDealerListing::setDealerListing()
     * @param \StructType\DealerListing[] $dealerListing
     */
    public function __construct(array $dealerListing = array())
    {
        $this
            ->setDealerListing($dealerListing);
    }
    /**
     * Get DealerListing value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \StructType\DealerListing[]|null
     */
    public function getDealerListing()
    {
        return isset($this->DealerListing) ? $this->DealerListing : null;
    }
    /**
     * Set DealerListing value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @throws \InvalidArgumentException
     * @param \StructType\DealerListing[] $dealerListing
     * @return \ArrayType\ArrayOfDealerListing
     */
    public function setDealerListing(array $dealerListing = array())
    {
        foreach ($dealerListing as $arrayOfDealerListingDealerListingItem) {
            // validation for constraint: itemType
            if (!$arrayOfDealerListingDealerListingItem instanceof \StructType\DealerListing) {
                throw new \InvalidArgumentException(sprintf('The DealerListing property can only contain items of \StructType\DealerListing, "%s" given', is_object($arrayOfDealerListingDealerListingItem) ? get_class($arrayOfDealerListingDealerListingItem) : gettype($arrayOfDealerListingDealerListingItem)), __LINE__);
            }
        }
        if (is_null($dealerListing) || (is_array($dealerListing) && empty($dealerListing))) {
            unset($this->DealerListing);
        } else {
            $this->DealerListing = $dealerListing;
        }
        return $this;
    }
    /**
     * Add item to DealerListing value
     * @throws \InvalidArgumentException
     * @param \StructType\DealerListing $item
     * @return \ArrayType\ArrayOfDealerListing
     */
    public function addToDealerListing(\StructType\DealerListing $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\DealerListing) {
            throw new \InvalidArgumentException(sprintf('The DealerListing property can only contain items of \StructType\DealerListing, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
        }
        $this->DealerListing[] = $item;
        return $this;
    }
    /**
     * Returns the current element
     * @see AbstractStructArrayBase::current()
     * @return \StructType\DealerListing|null
     */
    public function current()
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see AbstractStructArrayBase::item()
     * @param int $index
     * @return \StructType\DealerListing|null
     */
    public function item($index)
    {
        return parent::item($index);
    }
    /**
     * Returns the first element
     * @see AbstractStructArrayBase::first()
     * @return \StructType\DealerListing|null
     */
    public function first()
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see AbstractStructArrayBase::last()
     * @return \StructType\DealerListing|null
     */
    public function last()
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see AbstractStructArrayBase::offsetGet()
     * @param int $offset
     * @return \StructType\DealerListing|null
     */
    public function offsetGet($offset)
    {
        return parent::offsetGet($offset);
    }
    /**
     * Returns the attribute name
     * @see AbstractStructArrayBase::getAttributeName()
     * @return string DealerListing
     */
    public function getAttributeName()
    {
        return 'DealerListing';
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructArrayBase::__set_state()
     * @uses AbstractStructArrayBase::__set_state()
     * @param array $array the exported values
     * @return \ArrayType\ArrayOfDealerListing
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
