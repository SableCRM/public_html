<?php

namespace EnumType;

/**
 * This class stands for CountryEnum EnumType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:CountryEnum
 * @subpackage Enumerations
 */
class CountryEnum
{
    /**
     * Constant for value 'US'
     * @return string 'US'
     */
    const VALUE_US = 'US';
    /**
     * Constant for value 'CA'
     * @return string 'CA'
     */
    const VALUE_CA = 'CA';
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
     * @uses self::VALUE_US
     * @uses self::VALUE_CA
     * @return string[]
     */
    public static function getValidValues()
    {
        return array(
            self::VALUE_US,
            self::VALUE_CA,
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
