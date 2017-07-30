<?php

namespace ArrayType;

use \WsdlToPhp\PackageBase\AbstractStructArrayBase;

/**
 * This class stands for ArrayOfStatusSearch ArrayType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:ArrayOfStatusSearch
 * @subpackage Arrays
 */
class ArrayOfStatusSearch extends AbstractStructArrayBase
{
    /**
     * The StatusSearch
     * Meta informations extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * - nillable: true
     * @var \StructType\StatusSearch[]
     */
    public $StatusSearch;
    /**
     * Constructor method for ArrayOfStatusSearch
     * @uses ArrayOfStatusSearch::setStatusSearch()
     * @param \StructType\StatusSearch[] $statusSearch
     */
    public function __construct(array $statusSearch = array())
    {
        $this
            ->setStatusSearch($statusSearch);
    }
    /**
     * Get StatusSearch value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \StructType\StatusSearch[]|null
     */
    public function getStatusSearch()
    {
        return isset($this->StatusSearch) ? $this->StatusSearch : null;
    }
    /**
     * Set StatusSearch value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @throws \InvalidArgumentException
     * @param \StructType\StatusSearch[] $statusSearch
     * @return \ArrayType\ArrayOfStatusSearch
     */
    public function setStatusSearch(array $statusSearch = array())
    {
        foreach ($statusSearch as $arrayOfStatusSearchStatusSearchItem) {
            // validation for constraint: itemType
            if (!$arrayOfStatusSearchStatusSearchItem instanceof \StructType\StatusSearch) {
                throw new \InvalidArgumentException(sprintf('The StatusSearch property can only contain items of \StructType\StatusSearch, "%s" given', is_object($arrayOfStatusSearchStatusSearchItem) ? get_class($arrayOfStatusSearchStatusSearchItem) : gettype($arrayOfStatusSearchStatusSearchItem)), __LINE__);
            }
        }
        if (is_null($statusSearch) || (is_array($statusSearch) && empty($statusSearch))) {
            unset($this->StatusSearch);
        } else {
            $this->StatusSearch = $statusSearch;
        }
        return $this;
    }
    /**
     * Add item to StatusSearch value
     * @throws \InvalidArgumentException
     * @param \StructType\StatusSearch $item
     * @return \ArrayType\ArrayOfStatusSearch
     */
    public function addToStatusSearch(\StructType\StatusSearch $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\StatusSearch) {
            throw new \InvalidArgumentException(sprintf('The StatusSearch property can only contain items of \StructType\StatusSearch, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
        }
        $this->StatusSearch[] = $item;
        return $this;
    }
    /**
     * Returns the current element
     * @see AbstractStructArrayBase::current()
     * @return \StructType\StatusSearch|null
     */
    public function current()
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see AbstractStructArrayBase::item()
     * @param int $index
     * @return \StructType\StatusSearch|null
     */
    public function item($index)
    {
        return parent::item($index);
    }
    /**
     * Returns the first element
     * @see AbstractStructArrayBase::first()
     * @return \StructType\StatusSearch|null
     */
    public function first()
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see AbstractStructArrayBase::last()
     * @return \StructType\StatusSearch|null
     */
    public function last()
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see AbstractStructArrayBase::offsetGet()
     * @param int $offset
     * @return \StructType\StatusSearch|null
     */
    public function offsetGet($offset)
    {
        return parent::offsetGet($offset);
    }
    /**
     * Returns the attribute name
     * @see AbstractStructArrayBase::getAttributeName()
     * @return string StatusSearch
     */
    public function getAttributeName()
    {
        return 'StatusSearch';
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructArrayBase::__set_state()
     * @uses AbstractStructArrayBase::__set_state()
     * @param array $array the exported values
     * @return \ArrayType\ArrayOfStatusSearch
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
