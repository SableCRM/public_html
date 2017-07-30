<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for AuthenticationResult2 StructType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:AuthenticationResult2
 * @subpackage Structs
 */
class AuthenticationResult2 extends AuthenticationResult
{
    /**
     * The Discounts
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \ArrayType\ArrayOfProgramDiscounts
     */
    public $Discounts;
    /**
     * Constructor method for AuthenticationResult2
     * @uses AuthenticationResult2::setDiscounts()
     * @param \ArrayType\ArrayOfProgramDiscounts $discounts
     */
    public function __construct(\ArrayType\ArrayOfProgramDiscounts $discounts = null)
    {
        $this
            ->setDiscounts($discounts);
    }
    /**
     * Get Discounts value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \ArrayType\ArrayOfProgramDiscounts|null
     */
    public function getDiscounts()
    {
        return isset($this->Discounts) ? $this->Discounts : null;
    }
    /**
     * Set Discounts value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \ArrayType\ArrayOfProgramDiscounts $discounts
     * @return \StructType\AuthenticationResult2
     */
    public function setDiscounts(\ArrayType\ArrayOfProgramDiscounts $discounts = null)
    {
        if (is_null($discounts) || (is_array($discounts) && empty($discounts))) {
            unset($this->Discounts);
        } else {
            $this->Discounts = $discounts;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\AuthenticationResult2
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
