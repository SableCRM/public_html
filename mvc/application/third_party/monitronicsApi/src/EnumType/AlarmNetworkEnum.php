<?php

namespace EnumType;

/**
 * This class stands for AlarmNetworkEnum EnumType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:AlarmNetworkEnum
 * @subpackage Enumerations
 */
class AlarmNetworkEnum
{
    /**
     * Constant for value 'AlarmDotcom'
     * @return string 'AlarmDotcom'
     */
    const VALUE_ALARM_DOTCOM = 'AlarmDotcom';
    /**
     * Constant for value 'AlarmNet'
     * @return string 'AlarmNet'
     */
    const VALUE_ALARM_NET = 'AlarmNet';
    /**
     * Constant for value 'Tellular'
     * @return string 'Tellular'
     */
    const VALUE_TELLULAR = 'Tellular';
    /**
     * Constant for value 'DSC'
     * @return string 'DSC'
     */
    const VALUE_DSC = 'DSC';
    /**
     * Constant for value 'icontrol'
     * @return string 'icontrol'
     */
    const VALUE_ICONTROL = 'icontrol';
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
     * @uses self::VALUE_ALARM_DOTCOM
     * @uses self::VALUE_ALARM_NET
     * @uses self::VALUE_TELLULAR
     * @uses self::VALUE_DSC
     * @uses self::VALUE_ICONTROL
     * @uses self::VALUE_NONE
     * @return string[]
     */
    public static function getValidValues()
    {
        return array(
            self::VALUE_ALARM_DOTCOM,
            self::VALUE_ALARM_NET,
            self::VALUE_TELLULAR,
            self::VALUE_DSC,
            self::VALUE_ICONTROL,
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
