<?php

namespace ArrayType;

use \WsdlToPhp\PackageBase\AbstractStructArrayBase;

/**
 * This class stands for ArrayOfProgramDiscounts ArrayType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:ArrayOfProgramDiscounts
 * @subpackage Arrays
 */
class ArrayOfProgramDiscounts extends AbstractStructArrayBase
{
    /**
     * The ProgramDiscounts
     * Meta informations extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * - nillable: true
     * @var \StructType\ProgramDiscounts[]
     */
    public $ProgramDiscounts;
    /**
     * Constructor method for ArrayOfProgramDiscounts
     * @uses ArrayOfProgramDiscounts::setProgramDiscounts()
     * @param \StructType\ProgramDiscounts[] $programDiscounts
     */
    public function __construct(array $programDiscounts = array())
    {
        $this
            ->setProgramDiscounts($programDiscounts);
    }
    /**
     * Get ProgramDiscounts value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \StructType\ProgramDiscounts[]|null
     */
    public function getProgramDiscounts()
    {
        return isset($this->ProgramDiscounts) ? $this->ProgramDiscounts : null;
    }
    /**
     * Set ProgramDiscounts value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @throws \InvalidArgumentException
     * @param \StructType\ProgramDiscounts[] $programDiscounts
     * @return \ArrayType\ArrayOfProgramDiscounts
     */
    public function setProgramDiscounts(array $programDiscounts = array())
    {
        foreach ($programDiscounts as $arrayOfProgramDiscountsProgramDiscountsItem) {
            // validation for constraint: itemType
            if (!$arrayOfProgramDiscountsProgramDiscountsItem instanceof \StructType\ProgramDiscounts) {
                throw new \InvalidArgumentException(sprintf('The ProgramDiscounts property can only contain items of \StructType\ProgramDiscounts, "%s" given', is_object($arrayOfProgramDiscountsProgramDiscountsItem) ? get_class($arrayOfProgramDiscountsProgramDiscountsItem) : gettype($arrayOfProgramDiscountsProgramDiscountsItem)), __LINE__);
            }
        }
        if (is_null($programDiscounts) || (is_array($programDiscounts) && empty($programDiscounts))) {
            unset($this->ProgramDiscounts);
        } else {
            $this->ProgramDiscounts = $programDiscounts;
        }
        return $this;
    }
    /**
     * Add item to ProgramDiscounts value
     * @throws \InvalidArgumentException
     * @param \StructType\ProgramDiscounts $item
     * @return \ArrayType\ArrayOfProgramDiscounts
     */
    public function addToProgramDiscounts(\StructType\ProgramDiscounts $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ProgramDiscounts) {
            throw new \InvalidArgumentException(sprintf('The ProgramDiscounts property can only contain items of \StructType\ProgramDiscounts, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
        }
        $this->ProgramDiscounts[] = $item;
        return $this;
    }
    /**
     * Returns the current element
     * @see AbstractStructArrayBase::current()
     * @return \StructType\ProgramDiscounts|null
     */
    public function current()
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see AbstractStructArrayBase::item()
     * @param int $index
     * @return \StructType\ProgramDiscounts|null
     */
    public function item($index)
    {
        return parent::item($index);
    }
    /**
     * Returns the first element
     * @see AbstractStructArrayBase::first()
     * @return \StructType\ProgramDiscounts|null
     */
    public function first()
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see AbstractStructArrayBase::last()
     * @return \StructType\ProgramDiscounts|null
     */
    public function last()
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see AbstractStructArrayBase::offsetGet()
     * @param int $offset
     * @return \StructType\ProgramDiscounts|null
     */
    public function offsetGet($offset)
    {
        return parent::offsetGet($offset);
    }
    /**
     * Returns the attribute name
     * @see AbstractStructArrayBase::getAttributeName()
     * @return string ProgramDiscounts
     */
    public function getAttributeName()
    {
        return 'ProgramDiscounts';
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructArrayBase::__set_state()
     * @uses AbstractStructArrayBase::__set_state()
     * @param array $array the exported values
     * @return \ArrayType\ArrayOfProgramDiscounts
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
