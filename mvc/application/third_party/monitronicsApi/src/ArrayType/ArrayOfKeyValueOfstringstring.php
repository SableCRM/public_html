<?php

namespace ArrayType;

use \WsdlToPhp\PackageBase\AbstractStructArrayBase;

/**
 * This class stands for ArrayOfKeyValueOfstringstring ArrayType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:ArrayOfKeyValueOfstringstring
 * @subpackage Arrays
 */
class ArrayOfKeyValueOfstringstring extends AbstractStructArrayBase
{
    /**
     * The KeyValueOfstringstring
     * Meta informations extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var \StructType\KeyValueOfstringstring[]
     */
    public $KeyValueOfstringstring;
    /**
     * Constructor method for ArrayOfKeyValueOfstringstring
     * @uses ArrayOfKeyValueOfstringstring::setKeyValueOfstringstring()
     * @param \StructType\KeyValueOfstringstring[] $keyValueOfstringstring
     */
    public function __construct(array $keyValueOfstringstring = array())
    {
        $this
            ->setKeyValueOfstringstring($keyValueOfstringstring);
    }
    /**
     * Get KeyValueOfstringstring value
     * @return \StructType\KeyValueOfstringstring[]|null
     */
    public function getKeyValueOfstringstring()
    {
        return $this->KeyValueOfstringstring;
    }
    /**
     * Set KeyValueOfstringstring value
     * @throws \InvalidArgumentException
     * @param \StructType\KeyValueOfstringstring[] $keyValueOfstringstring
     * @return \ArrayType\ArrayOfKeyValueOfstringstring
     */
    public function setKeyValueOfstringstring(array $keyValueOfstringstring = array())
    {
        foreach ($keyValueOfstringstring as $arrayOfKeyValueOfstringstringKeyValueOfstringstringItem) {
            // validation for constraint: itemType
            if (!$arrayOfKeyValueOfstringstringKeyValueOfstringstringItem instanceof \StructType\KeyValueOfstringstring) {
                throw new \InvalidArgumentException(sprintf('The KeyValueOfstringstring property can only contain items of \StructType\KeyValueOfstringstring, "%s" given', is_object($arrayOfKeyValueOfstringstringKeyValueOfstringstringItem) ? get_class($arrayOfKeyValueOfstringstringKeyValueOfstringstringItem) : gettype($arrayOfKeyValueOfstringstringKeyValueOfstringstringItem)), __LINE__);
            }
        }
        $this->KeyValueOfstringstring = $keyValueOfstringstring;
        return $this;
    }
    /**
     * Add item to KeyValueOfstringstring value
     * @throws \InvalidArgumentException
     * @param \StructType\KeyValueOfstringstring $item
     * @return \ArrayType\ArrayOfKeyValueOfstringstring
     */
    public function addToKeyValueOfstringstring(\StructType\KeyValueOfstringstring $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\KeyValueOfstringstring) {
            throw new \InvalidArgumentException(sprintf('The KeyValueOfstringstring property can only contain items of \StructType\KeyValueOfstringstring, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
        }
        $this->KeyValueOfstringstring[] = $item;
        return $this;
    }
    /**
     * Returns the current element
     * @see AbstractStructArrayBase::current()
     * @return \StructType\KeyValueOfstringstring|null
     */
    public function current()
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see AbstractStructArrayBase::item()
     * @param int $index
     * @return \StructType\KeyValueOfstringstring|null
     */
    public function item($index)
    {
        return parent::item($index);
    }
    /**
     * Returns the first element
     * @see AbstractStructArrayBase::first()
     * @return \StructType\KeyValueOfstringstring|null
     */
    public function first()
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see AbstractStructArrayBase::last()
     * @return \StructType\KeyValueOfstringstring|null
     */
    public function last()
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see AbstractStructArrayBase::offsetGet()
     * @param int $offset
     * @return \StructType\KeyValueOfstringstring|null
     */
    public function offsetGet($offset)
    {
        return parent::offsetGet($offset);
    }
    /**
     * Returns the attribute name
     * @see AbstractStructArrayBase::getAttributeName()
     * @return string KeyValueOfstringstring
     */
    public function getAttributeName()
    {
        return 'KeyValueOfstringstring';
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructArrayBase::__set_state()
     * @uses AbstractStructArrayBase::__set_state()
     * @param array $array the exported values
     * @return \ArrayType\ArrayOfKeyValueOfstringstring
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
