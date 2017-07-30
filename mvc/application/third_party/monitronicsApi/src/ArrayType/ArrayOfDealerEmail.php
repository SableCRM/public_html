<?php

namespace ArrayType;

use \WsdlToPhp\PackageBase\AbstractStructArrayBase;

/**
 * This class stands for ArrayOfDealerEmail ArrayType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:ArrayOfDealerEmail
 * @subpackage Arrays
 */
class ArrayOfDealerEmail extends AbstractStructArrayBase
{
    /**
     * The DealerEmail
     * Meta informations extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * - nillable: true
     * @var \StructType\DealerEmail[]
     */
    public $DealerEmail;
    /**
     * Constructor method for ArrayOfDealerEmail
     * @uses ArrayOfDealerEmail::setDealerEmail()
     * @param \StructType\DealerEmail[] $dealerEmail
     */
    public function __construct(array $dealerEmail = array())
    {
        $this
            ->setDealerEmail($dealerEmail);
    }
    /**
     * Get DealerEmail value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \StructType\DealerEmail[]|null
     */
    public function getDealerEmail()
    {
        return isset($this->DealerEmail) ? $this->DealerEmail : null;
    }
    /**
     * Set DealerEmail value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @throws \InvalidArgumentException
     * @param \StructType\DealerEmail[] $dealerEmail
     * @return \ArrayType\ArrayOfDealerEmail
     */
    public function setDealerEmail(array $dealerEmail = array())
    {
        foreach ($dealerEmail as $arrayOfDealerEmailDealerEmailItem) {
            // validation for constraint: itemType
            if (!$arrayOfDealerEmailDealerEmailItem instanceof \StructType\DealerEmail) {
                throw new \InvalidArgumentException(sprintf('The DealerEmail property can only contain items of \StructType\DealerEmail, "%s" given', is_object($arrayOfDealerEmailDealerEmailItem) ? get_class($arrayOfDealerEmailDealerEmailItem) : gettype($arrayOfDealerEmailDealerEmailItem)), __LINE__);
            }
        }
        if (is_null($dealerEmail) || (is_array($dealerEmail) && empty($dealerEmail))) {
            unset($this->DealerEmail);
        } else {
            $this->DealerEmail = $dealerEmail;
        }
        return $this;
    }
    /**
     * Add item to DealerEmail value
     * @throws \InvalidArgumentException
     * @param \StructType\DealerEmail $item
     * @return \ArrayType\ArrayOfDealerEmail
     */
    public function addToDealerEmail(\StructType\DealerEmail $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\DealerEmail) {
            throw new \InvalidArgumentException(sprintf('The DealerEmail property can only contain items of \StructType\DealerEmail, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
        }
        $this->DealerEmail[] = $item;
        return $this;
    }
    /**
     * Returns the current element
     * @see AbstractStructArrayBase::current()
     * @return \StructType\DealerEmail|null
     */
    public function current()
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see AbstractStructArrayBase::item()
     * @param int $index
     * @return \StructType\DealerEmail|null
     */
    public function item($index)
    {
        return parent::item($index);
    }
    /**
     * Returns the first element
     * @see AbstractStructArrayBase::first()
     * @return \StructType\DealerEmail|null
     */
    public function first()
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see AbstractStructArrayBase::last()
     * @return \StructType\DealerEmail|null
     */
    public function last()
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see AbstractStructArrayBase::offsetGet()
     * @param int $offset
     * @return \StructType\DealerEmail|null
     */
    public function offsetGet($offset)
    {
        return parent::offsetGet($offset);
    }
    /**
     * Returns the attribute name
     * @see AbstractStructArrayBase::getAttributeName()
     * @return string DealerEmail
     */
    public function getAttributeName()
    {
        return 'DealerEmail';
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructArrayBase::__set_state()
     * @uses AbstractStructArrayBase::__set_state()
     * @param array $array the exported values
     * @return \ArrayType\ArrayOfDealerEmail
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
