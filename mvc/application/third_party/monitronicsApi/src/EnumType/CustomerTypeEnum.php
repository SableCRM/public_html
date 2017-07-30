<?php

namespace EnumType;

/**
 * This class stands for CustomerTypeEnum EnumType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:CustomerTypeEnum
 * @subpackage Enumerations
 */
class CustomerTypeEnum
{
    /**
     * Constant for value 'Commercial'
     * @return string 'Commercial'
     */
    const VALUE_COMMERCIAL = 'Commercial';
    /**
     * Constant for value 'Residential'
     * @return string 'Residential'
     */
    const VALUE_RESIDENTIAL = 'Residential';
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
     * @uses self::VALUE_COMMERCIAL
     * @uses self::VALUE_RESIDENTIAL
     * @return string[]
     */
    public static function getValidValues()
    {
        return array(
            self::VALUE_COMMERCIAL,
            self::VALUE_RESIDENTIAL,
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
