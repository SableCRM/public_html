<?php

namespace ArrayType;

use \WsdlToPhp\PackageBase\AbstractStructArrayBase;

/**
 * This class stands for ArrayOfDealerDBA ArrayType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:ArrayOfDealerDBA
 * @subpackage Arrays
 */
class ArrayOfDealerDBA extends AbstractStructArrayBase
{
    /**
     * The DealerDBA
     * Meta informations extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * - nillable: true
     * @var \StructType\DealerDBA[]
     */
    public $DealerDBA;
    /**
     * Constructor method for ArrayOfDealerDBA
     * @uses ArrayOfDealerDBA::setDealerDBA()
     * @param \StructType\DealerDBA[] $dealerDBA
     */
    public function __construct(array $dealerDBA = array())
    {
        $this
            ->setDealerDBA($dealerDBA);
    }
    /**
     * Get DealerDBA value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \StructType\DealerDBA[]|null
     */
    public function getDealerDBA()
    {
        return isset($this->DealerDBA) ? $this->DealerDBA : null;
    }
    /**
     * Set DealerDBA value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @throws \InvalidArgumentException
     * @param \StructType\DealerDBA[] $dealerDBA
     * @return \ArrayType\ArrayOfDealerDBA
     */
    public function setDealerDBA(array $dealerDBA = array())
    {
        foreach ($dealerDBA as $arrayOfDealerDBADealerDBAItem) {
            // validation for constraint: itemType
            if (!$arrayOfDealerDBADealerDBAItem instanceof \StructType\DealerDBA) {
                throw new \InvalidArgumentException(sprintf('The DealerDBA property can only contain items of \StructType\DealerDBA, "%s" given', is_object($arrayOfDealerDBADealerDBAItem) ? get_class($arrayOfDealerDBADealerDBAItem) : gettype($arrayOfDealerDBADealerDBAItem)), __LINE__);
            }
        }
        if (is_null($dealerDBA) || (is_array($dealerDBA) && empty($dealerDBA))) {
            unset($this->DealerDBA);
        } else {
            $this->DealerDBA = $dealerDBA;
        }
        return $this;
    }
    /**
     * Add item to DealerDBA value
     * @throws \InvalidArgumentException
     * @param \StructType\DealerDBA $item
     * @return \ArrayType\ArrayOfDealerDBA
     */
    public function addToDealerDBA(\StructType\DealerDBA $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\DealerDBA) {
            throw new \InvalidArgumentException(sprintf('The DealerDBA property can only contain items of \StructType\DealerDBA, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
        }
        $this->DealerDBA[] = $item;
        return $this;
    }
    /**
     * Returns the current element
     * @see AbstractStructArrayBase::current()
     * @return \StructType\DealerDBA|null
     */
    public function current()
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see AbstractStructArrayBase::item()
     * @param int $index
     * @return \StructType\DealerDBA|null
     */
    public function item($index)
    {
        return parent::item($index);
    }
    /**
     * Returns the first element
     * @see AbstractStructArrayBase::first()
     * @return \StructType\DealerDBA|null
     */
    public function first()
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see AbstractStructArrayBase::last()
     * @return \StructType\DealerDBA|null
     */
    public function last()
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see AbstractStructArrayBase::offsetGet()
     * @param int $offset
     * @return \StructType\DealerDBA|null
     */
    public function offsetGet($offset)
    {
        return parent::offsetGet($offset);
    }
    /**
     * Returns the attribute name
     * @see AbstractStructArrayBase::getAttributeName()
     * @return string DealerDBA
     */
    public function getAttributeName()
    {
        return 'DealerDBA';
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructArrayBase::__set_state()
     * @uses AbstractStructArrayBase::__set_state()
     * @param array $array the exported values
     * @return \ArrayType\ArrayOfDealerDBA
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
