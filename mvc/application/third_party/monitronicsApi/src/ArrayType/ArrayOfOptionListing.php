<?php

namespace ArrayType;

use \WsdlToPhp\PackageBase\AbstractStructArrayBase;

/**
 * This class stands for ArrayOfOptionListing ArrayType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:ArrayOfOptionListing
 * @subpackage Arrays
 */
class ArrayOfOptionListing extends AbstractStructArrayBase
{
    /**
     * The OptionListing
     * Meta informations extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * - nillable: true
     * @var \StructType\OptionListing[]
     */
    public $OptionListing;
    /**
     * Constructor method for ArrayOfOptionListing
     * @uses ArrayOfOptionListing::setOptionListing()
     * @param \StructType\OptionListing[] $optionListing
     */
    public function __construct(array $optionListing = array())
    {
        $this
            ->setOptionListing($optionListing);
    }
    /**
     * Get OptionListing value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \StructType\OptionListing[]|null
     */
    public function getOptionListing()
    {
        return isset($this->OptionListing) ? $this->OptionListing : null;
    }
    /**
     * Set OptionListing value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @throws \InvalidArgumentException
     * @param \StructType\OptionListing[] $optionListing
     * @return \ArrayType\ArrayOfOptionListing
     */
    public function setOptionListing(array $optionListing = array())
    {
        foreach ($optionListing as $arrayOfOptionListingOptionListingItem) {
            // validation for constraint: itemType
            if (!$arrayOfOptionListingOptionListingItem instanceof \StructType\OptionListing) {
                throw new \InvalidArgumentException(sprintf('The OptionListing property can only contain items of \StructType\OptionListing, "%s" given', is_object($arrayOfOptionListingOptionListingItem) ? get_class($arrayOfOptionListingOptionListingItem) : gettype($arrayOfOptionListingOptionListingItem)), __LINE__);
            }
        }
        if (is_null($optionListing) || (is_array($optionListing) && empty($optionListing))) {
            unset($this->OptionListing);
        } else {
            $this->OptionListing = $optionListing;
        }
        return $this;
    }
    /**
     * Add item to OptionListing value
     * @throws \InvalidArgumentException
     * @param \StructType\OptionListing $item
     * @return \ArrayType\ArrayOfOptionListing
     */
    public function addToOptionListing(\StructType\OptionListing $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\OptionListing) {
            throw new \InvalidArgumentException(sprintf('The OptionListing property can only contain items of \StructType\OptionListing, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
        }
        $this->OptionListing[] = $item;
        return $this;
    }
    /**
     * Returns the current element
     * @see AbstractStructArrayBase::current()
     * @return \StructType\OptionListing|null
     */
    public function current()
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see AbstractStructArrayBase::item()
     * @param int $index
     * @return \StructType\OptionListing|null
     */
    public function item($index)
    {
        return parent::item($index);
    }
    /**
     * Returns the first element
     * @see AbstractStructArrayBase::first()
     * @return \StructType\OptionListing|null
     */
    public function first()
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see AbstractStructArrayBase::last()
     * @return \StructType\OptionListing|null
     */
    public function last()
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see AbstractStructArrayBase::offsetGet()
     * @param int $offset
     * @return \StructType\OptionListing|null
     */
    public function offsetGet($offset)
    {
        return parent::offsetGet($offset);
    }
    /**
     * Returns the attribute name
     * @see AbstractStructArrayBase::getAttributeName()
     * @return string OptionListing
     */
    public function getAttributeName()
    {
        return 'OptionListing';
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructArrayBase::__set_state()
     * @uses AbstractStructArrayBase::__set_state()
     * @param array $array the exported values
     * @return \ArrayType\ArrayOfOptionListing
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
