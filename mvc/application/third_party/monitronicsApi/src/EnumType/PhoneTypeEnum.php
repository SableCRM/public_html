<?php

namespace EnumType;

/**
 * This class stands for PhoneTypeEnum EnumType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:PhoneTypeEnum
 * @subpackage Enumerations
 */
class PhoneTypeEnum
{
    /**
     * Constant for value 'Home'
     * @return string 'Home'
     */
    const VALUE_HOME = 'Home';
    /**
     * Constant for value 'Cell'
     * @return string 'Cell'
     */
    const VALUE_CELL = 'Cell';
    /**
     * Constant for value 'Work'
     * @return string 'Work'
     */
    const VALUE_WORK = 'Work';
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
     * @uses self::VALUE_HOME
     * @uses self::VALUE_CELL
     * @uses self::VALUE_WORK
     * @return string[]
     */
    public static function getValidValues()
    {
        return array(
            self::VALUE_HOME,
            self::VALUE_CELL,
            self::VALUE_WORK,
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
