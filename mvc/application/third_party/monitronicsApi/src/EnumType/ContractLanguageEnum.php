<?php

namespace EnumType;

/**
 * This class stands for ContractLanguageEnum EnumType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:ContractLanguageEnum
 * @subpackage Enumerations
 */
class ContractLanguageEnum
{
    /**
     * Constant for value 'English'
     * @return string 'English'
     */
    const VALUE_ENGLISH = 'English';
    /**
     * Constant for value 'Spanish'
     * @return string 'Spanish'
     */
    const VALUE_SPANISH = 'Spanish';
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
     * @uses self::VALUE_ENGLISH
     * @uses self::VALUE_SPANISH
     * @return string[]
     */
    public static function getValidValues()
    {
        return array(
            self::VALUE_ENGLISH,
            self::VALUE_SPANISH,
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
