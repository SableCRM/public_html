<?php

namespace EnumType;

/**
 * This class stands for PaymentTypeEnum EnumType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:PaymentTypeEnum
 * @subpackage Enumerations
 */
class PaymentTypeEnum
{
    /**
     * Constant for value 'Invoice'
     * @return string 'Invoice'
     */
    const VALUE_INVOICE = 'Invoice';
    /**
     * Constant for value 'BankAccount'
     * @return string 'BankAccount'
     */
    const VALUE_BANK_ACCOUNT = 'BankAccount';
    /**
     * Constant for value 'CreditCard'
     * @return string 'CreditCard'
     */
    const VALUE_CREDIT_CARD = 'CreditCard';
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
     * @uses self::VALUE_INVOICE
     * @uses self::VALUE_BANK_ACCOUNT
     * @uses self::VALUE_CREDIT_CARD
     * @return string[]
     */
    public static function getValidValues()
    {
        return array(
            self::VALUE_INVOICE,
            self::VALUE_BANK_ACCOUNT,
            self::VALUE_CREDIT_CARD,
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
