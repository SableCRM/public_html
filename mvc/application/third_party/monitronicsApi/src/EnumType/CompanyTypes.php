<?php

namespace EnumType;

/**
 * This class stands for CompanyTypes EnumType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:CompanyTypes
 * @subpackage Enumerations
 */
class CompanyTypes
{
    /**
     * Constant for value 'Corporation'
     * @return string 'Corporation'
     */
    const VALUE_CORPORATION = 'Corporation';
    /**
     * Constant for value 'Proprietorship'
     * @return string 'Proprietorship'
     */
    const VALUE_PROPRIETORSHIP = 'Proprietorship';
    /**
     * Constant for value 'LLC'
     * @return string 'LLC'
     */
    const VALUE_LLC = 'LLC';
    /**
     * Constant for value 'Partnership'
     * @return string 'Partnership'
     */
    const VALUE_PARTNERSHIP = 'Partnership';
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
     * @uses self::VALUE_CORPORATION
     * @uses self::VALUE_PROPRIETORSHIP
     * @uses self::VALUE_LLC
     * @uses self::VALUE_PARTNERSHIP
     * @return string[]
     */
    public static function getValidValues()
    {
        return array(
            self::VALUE_CORPORATION,
            self::VALUE_PROPRIETORSHIP,
            self::VALUE_LLC,
            self::VALUE_PARTNERSHIP,
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
