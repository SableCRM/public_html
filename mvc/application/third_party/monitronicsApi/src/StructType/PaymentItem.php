<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for PaymentItem StructType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:PaymentItem
 * @subpackage Structs
 */
class PaymentItem extends AbstractStructBase
{
    /**
     * The BankAccountNumber
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $BankAccountNumber;
    /**
     * The BankRoutingNumber
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $BankRoutingNumber;
    /**
     * The CanadaRoutingBranch
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $CanadaRoutingBranch;
    /**
     * The CanadaRoutingInstitution
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $CanadaRoutingInstitution;
    /**
     * The CreditCardExpireMonth
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var int
     */
    public $CreditCardExpireMonth;
    /**
     * The CreditCardExpireYear
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var int
     */
    public $CreditCardExpireYear;
    /**
     * The CreditCardNumber
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $CreditCardNumber;
    /**
     * The CreditCardType
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $CreditCardType;
    /**
     * The PaymentType
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $PaymentType;
    /**
     * Constructor method for PaymentItem
     * @uses PaymentItem::setBankAccountNumber()
     * @uses PaymentItem::setBankRoutingNumber()
     * @uses PaymentItem::setCanadaRoutingBranch()
     * @uses PaymentItem::setCanadaRoutingInstitution()
     * @uses PaymentItem::setCreditCardExpireMonth()
     * @uses PaymentItem::setCreditCardExpireYear()
     * @uses PaymentItem::setCreditCardNumber()
     * @uses PaymentItem::setCreditCardType()
     * @uses PaymentItem::setPaymentType()
     * @param string $bankAccountNumber
     * @param string $bankRoutingNumber
     * @param string $canadaRoutingBranch
     * @param string $canadaRoutingInstitution
     * @param int $creditCardExpireMonth
     * @param int $creditCardExpireYear
     * @param string $creditCardNumber
     * @param string $creditCardType
     * @param string $paymentType
     */
    public function __construct($bankAccountNumber = null, $bankRoutingNumber = null, $canadaRoutingBranch = null, $canadaRoutingInstitution = null, $creditCardExpireMonth = null, $creditCardExpireYear = null, $creditCardNumber = null, $creditCardType = null, $paymentType = null)
    {
        $this
            ->setBankAccountNumber($bankAccountNumber)
            ->setBankRoutingNumber($bankRoutingNumber)
            ->setCanadaRoutingBranch($canadaRoutingBranch)
            ->setCanadaRoutingInstitution($canadaRoutingInstitution)
            ->setCreditCardExpireMonth($creditCardExpireMonth)
            ->setCreditCardExpireYear($creditCardExpireYear)
            ->setCreditCardNumber($creditCardNumber)
            ->setCreditCardType($creditCardType)
            ->setPaymentType($paymentType);
    }
    /**
     * Get BankAccountNumber value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getBankAccountNumber()
    {
        return isset($this->BankAccountNumber) ? $this->BankAccountNumber : null;
    }
    /**
     * Set BankAccountNumber value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $bankAccountNumber
     * @return \StructType\PaymentItem
     */
    public function setBankAccountNumber($bankAccountNumber = null)
    {
        // validation for constraint: string
        if (!is_null($bankAccountNumber) && !is_string($bankAccountNumber)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($bankAccountNumber)), __LINE__);
        }
        if (is_null($bankAccountNumber) || (is_array($bankAccountNumber) && empty($bankAccountNumber))) {
            unset($this->BankAccountNumber);
        } else {
            $this->BankAccountNumber = $bankAccountNumber;
        }
        return $this;
    }
    /**
     * Get BankRoutingNumber value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getBankRoutingNumber()
    {
        return isset($this->BankRoutingNumber) ? $this->BankRoutingNumber : null;
    }
    /**
     * Set BankRoutingNumber value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $bankRoutingNumber
     * @return \StructType\PaymentItem
     */
    public function setBankRoutingNumber($bankRoutingNumber = null)
    {
        // validation for constraint: string
        if (!is_null($bankRoutingNumber) && !is_string($bankRoutingNumber)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($bankRoutingNumber)), __LINE__);
        }
        if (is_null($bankRoutingNumber) || (is_array($bankRoutingNumber) && empty($bankRoutingNumber))) {
            unset($this->BankRoutingNumber);
        } else {
            $this->BankRoutingNumber = $bankRoutingNumber;
        }
        return $this;
    }
    /**
     * Get CanadaRoutingBranch value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getCanadaRoutingBranch()
    {
        return isset($this->CanadaRoutingBranch) ? $this->CanadaRoutingBranch : null;
    }
    /**
     * Set CanadaRoutingBranch value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $canadaRoutingBranch
     * @return \StructType\PaymentItem
     */
    public function setCanadaRoutingBranch($canadaRoutingBranch = null)
    {
        // validation for constraint: string
        if (!is_null($canadaRoutingBranch) && !is_string($canadaRoutingBranch)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($canadaRoutingBranch)), __LINE__);
        }
        if (is_null($canadaRoutingBranch) || (is_array($canadaRoutingBranch) && empty($canadaRoutingBranch))) {
            unset($this->CanadaRoutingBranch);
        } else {
            $this->CanadaRoutingBranch = $canadaRoutingBranch;
        }
        return $this;
    }
    /**
     * Get CanadaRoutingInstitution value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getCanadaRoutingInstitution()
    {
        return isset($this->CanadaRoutingInstitution) ? $this->CanadaRoutingInstitution : null;
    }
    /**
     * Set CanadaRoutingInstitution value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $canadaRoutingInstitution
     * @return \StructType\PaymentItem
     */
    public function setCanadaRoutingInstitution($canadaRoutingInstitution = null)
    {
        // validation for constraint: string
        if (!is_null($canadaRoutingInstitution) && !is_string($canadaRoutingInstitution)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($canadaRoutingInstitution)), __LINE__);
        }
        if (is_null($canadaRoutingInstitution) || (is_array($canadaRoutingInstitution) && empty($canadaRoutingInstitution))) {
            unset($this->CanadaRoutingInstitution);
        } else {
            $this->CanadaRoutingInstitution = $canadaRoutingInstitution;
        }
        return $this;
    }
    /**
     * Get CreditCardExpireMonth value
     * @return int|null
     */
    public function getCreditCardExpireMonth()
    {
        return $this->CreditCardExpireMonth;
    }
    /**
     * Set CreditCardExpireMonth value
     * @param int $creditCardExpireMonth
     * @return \StructType\PaymentItem
     */
    public function setCreditCardExpireMonth($creditCardExpireMonth = null)
    {
        // validation for constraint: int
        if (!is_null($creditCardExpireMonth) && !is_numeric($creditCardExpireMonth)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($creditCardExpireMonth)), __LINE__);
        }
        $this->CreditCardExpireMonth = $creditCardExpireMonth;
        return $this;
    }
    /**
     * Get CreditCardExpireYear value
     * @return int|null
     */
    public function getCreditCardExpireYear()
    {
        return $this->CreditCardExpireYear;
    }
    /**
     * Set CreditCardExpireYear value
     * @param int $creditCardExpireYear
     * @return \StructType\PaymentItem
     */
    public function setCreditCardExpireYear($creditCardExpireYear = null)
    {
        // validation for constraint: int
        if (!is_null($creditCardExpireYear) && !is_numeric($creditCardExpireYear)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($creditCardExpireYear)), __LINE__);
        }
        $this->CreditCardExpireYear = $creditCardExpireYear;
        return $this;
    }
    /**
     * Get CreditCardNumber value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getCreditCardNumber()
    {
        return isset($this->CreditCardNumber) ? $this->CreditCardNumber : null;
    }
    /**
     * Set CreditCardNumber value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $creditCardNumber
     * @return \StructType\PaymentItem
     */
    public function setCreditCardNumber($creditCardNumber = null)
    {
        // validation for constraint: string
        if (!is_null($creditCardNumber) && !is_string($creditCardNumber)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($creditCardNumber)), __LINE__);
        }
        if (is_null($creditCardNumber) || (is_array($creditCardNumber) && empty($creditCardNumber))) {
            unset($this->CreditCardNumber);
        } else {
            $this->CreditCardNumber = $creditCardNumber;
        }
        return $this;
    }
    /**
     * Get CreditCardType value
     * @return string|null
     */
    public function getCreditCardType()
    {
        return $this->CreditCardType;
    }
    /**
     * Set CreditCardType value
     * @uses \EnumType\CreditCardTypeEnum::valueIsValid()
     * @uses \EnumType\CreditCardTypeEnum::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $creditCardType
     * @return \StructType\PaymentItem
     */
    public function setCreditCardType($creditCardType = null)
    {
        // validation for constraint: enumeration
        if (!\EnumType\CreditCardTypeEnum::valueIsValid($creditCardType)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" is invalid, please use one of: %s', $creditCardType, implode(', ', \EnumType\CreditCardTypeEnum::getValidValues())), __LINE__);
        }
        $this->CreditCardType = $creditCardType;
        return $this;
    }
    /**
     * Get PaymentType value
     * @return string|null
     */
    public function getPaymentType()
    {
        return $this->PaymentType;
    }
    /**
     * Set PaymentType value
     * @uses \EnumType\PaymentTypeEnum::valueIsValid()
     * @uses \EnumType\PaymentTypeEnum::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $paymentType
     * @return \StructType\PaymentItem
     */
    public function setPaymentType($paymentType = null)
    {
        // validation for constraint: enumeration
        if (!\EnumType\PaymentTypeEnum::valueIsValid($paymentType)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" is invalid, please use one of: %s', $paymentType, implode(', ', \EnumType\PaymentTypeEnum::getValidValues())), __LINE__);
        }
        $this->PaymentType = $paymentType;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\PaymentItem
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
