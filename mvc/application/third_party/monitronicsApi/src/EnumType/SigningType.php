<?php

namespace EnumType;

/**
 * This class stands for SigningType EnumType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:SigningType
 * @subpackage Enumerations
 */
class SigningType
{
    /**
     * Constant for value 'Embedded'
     * @return string 'Embedded'
     */
    const VALUE_EMBEDDED = 'Embedded';
    /**
     * Constant for value 'Remote'
     * @return string 'Remote'
     */
    const VALUE_REMOTE = 'Remote';
    /**
     * Constant for value 'None'
     * @return string 'None'
     */
    const VALUE_NONE = 'None';
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
     * @uses self::VALUE_EMBEDDED
     * @uses self::VALUE_REMOTE
     * @uses self::VALUE_NONE
     * @return string[]
     */
    public static function getValidValues()
    {
        return array(
            self::VALUE_EMBEDDED,
            self::VALUE_REMOTE,
            self::VALUE_NONE,
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
