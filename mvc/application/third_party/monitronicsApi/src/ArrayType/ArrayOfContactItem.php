<?php

namespace ArrayType;

use \WsdlToPhp\PackageBase\AbstractStructArrayBase;

/**
 * This class stands for ArrayOfContactItem ArrayType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:ArrayOfContactItem
 * @subpackage Arrays
 */
class ArrayOfContactItem extends AbstractStructArrayBase
{
    /**
     * The ContactItem
     * Meta informations extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * - nillable: true
     * @var \StructType\ContactItem[]
     */
    public $ContactItem;
    /**
     * Constructor method for ArrayOfContactItem
     * @uses ArrayOfContactItem::setContactItem()
     * @param \StructType\ContactItem[] $contactItem
     */
    public function __construct(array $contactItem = array())
    {
        $this
            ->setContactItem($contactItem);
    }
    /**
     * Get ContactItem value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \StructType\ContactItem[]|null
     */
    public function getContactItem()
    {
        return isset($this->ContactItem) ? $this->ContactItem : null;
    }
    /**
     * Set ContactItem value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @throws \InvalidArgumentException
     * @param \StructType\ContactItem[] $contactItem
     * @return \ArrayType\ArrayOfContactItem
     */
    public function setContactItem(array $contactItem = array())
    {
        foreach ($contactItem as $arrayOfContactItemContactItemItem) {
            // validation for constraint: itemType
            if (!$arrayOfContactItemContactItemItem instanceof \StructType\ContactItem) {
                throw new \InvalidArgumentException(sprintf('The ContactItem property can only contain items of \StructType\ContactItem, "%s" given', is_object($arrayOfContactItemContactItemItem) ? get_class($arrayOfContactItemContactItemItem) : gettype($arrayOfContactItemContactItemItem)), __LINE__);
            }
        }
        if (is_null($contactItem) || (is_array($contactItem) && empty($contactItem))) {
            unset($this->ContactItem);
        } else {
            $this->ContactItem = $contactItem;
        }
        return $this;
    }
    /**
     * Add item to ContactItem value
     * @throws \InvalidArgumentException
     * @param \StructType\ContactItem $item
     * @return \ArrayType\ArrayOfContactItem
     */
    public function addToContactItem(\StructType\ContactItem $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ContactItem) {
            throw new \InvalidArgumentException(sprintf('The ContactItem property can only contain items of \StructType\ContactItem, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
        }
        $this->ContactItem[] = $item;
        return $this;
    }
    /**
     * Returns the current element
     * @see AbstractStructArrayBase::current()
     * @return \StructType\ContactItem|null
     */
    public function current()
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see AbstractStructArrayBase::item()
     * @param int $index
     * @return \StructType\ContactItem|null
     */
    public function item($index)
    {
        return parent::item($index);
    }
    /**
     * Returns the first element
     * @see AbstractStructArrayBase::first()
     * @return \StructType\ContactItem|null
     */
    public function first()
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see AbstractStructArrayBase::last()
     * @return \StructType\ContactItem|null
     */
    public function last()
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see AbstractStructArrayBase::offsetGet()
     * @param int $offset
     * @return \StructType\ContactItem|null
     */
    public function offsetGet($offset)
    {
        return parent::offsetGet($offset);
    }
    /**
     * Returns the attribute name
     * @see AbstractStructArrayBase::getAttributeName()
     * @return string ContactItem
     */
    public function getAttributeName()
    {
        return 'ContactItem';
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructArrayBase::__set_state()
     * @uses AbstractStructArrayBase::__set_state()
     * @param array $array the exported values
     * @return \ArrayType\ArrayOfContactItem
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
