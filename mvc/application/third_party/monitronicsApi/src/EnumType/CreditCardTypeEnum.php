<?php

namespace EnumType;

/**
 * This class stands for CreditCardTypeEnum EnumType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:CreditCardTypeEnum
 * @subpackage Enumerations
 */
class CreditCardTypeEnum
{
    /**
     * Constant for value 'Visa'
     * @return string 'Visa'
     */
    const VALUE_VISA = 'Visa';
    /**
     * Constant for value 'MasterCard'
     * @return string 'MasterCard'
     */
    const VALUE_MASTER_CARD = 'MasterCard';
    /**
     * Constant for value 'Discover'
     * @return string 'Discover'
     */
    const VALUE_DISCOVER = 'Discover';
    /**
     * Constant for value 'AmericanExpress'
     * @return string 'AmericanExpress'
     */
    const VALUE_AMERICAN_EXPRESS = 'AmericanExpress';
    /**
     * Return true if value is allowed
     * @uses self::getValidValues()
     * @param mixed $value value
     * @return bool true|false
     */
    public static function valueIsValid($value)
    {
        return ($value === null) || in_array($value, self::getValidValues(), true);
    }
    /**
     * Return allowed values
     * @uses self::VALUE_VISA
     * @uses self::VALUE_MASTER_CARD
     * @uses self::VALUE_DISCOVER
     * @uses self::VALUE_AMERICAN_EXPRESS
     * @return string[]
     */
    public static function getValidValues()
    {
        return array(
            self::VALUE_VISA,
            self::VALUE_MASTER_CARD,
            self::VALUE_DISCOVER,
            self::VALUE_AMERICAN_EXPRESS,
        );
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
