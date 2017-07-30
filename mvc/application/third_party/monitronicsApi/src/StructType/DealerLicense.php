<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for DealerLicense StructType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:DealerLicense
 * @subpackage Structs
 */
class DealerLicense extends AbstractStructBase
{
    /**
     * The ExpireDate
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $ExpireDate;
    /**
     * The LicenseNumber
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $LicenseNumber;
    /**
     * The LicenseType
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $LicenseType;
    /**
     * The LicensedState
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $LicensedState;
    /**
     * Constructor method for DealerLicense
     * @uses DealerLicense::setExpireDate()
     * @uses DealerLicense::setLicenseNumber()
     * @uses DealerLicense::setLicenseType()
     * @uses DealerLicense::setLicensedState()
     * @param string $expireDate
     * @param string $licenseNumber
     * @param string $licenseType
     * @param string $licensedState
     */
    public function __construct($expireDate = null, $licenseNumber = null, $licenseType = null, $licensedState = null)
    {
        $this
            ->setExpireDate($expireDate)
            ->setLicenseNumber($licenseNumber)
            ->setLicenseType($licenseType)
            ->setLicensedState($licensedState);
    }
    /**
     * Get ExpireDate value
     * @return string|null
     */
    public function getExpireDate()
    {
        return $this->ExpireDate;
    }
    /**
     * Set ExpireDate value
     * @param string $expireDate
     * @return \StructType\DealerLicense
     */
    public function setExpireDate($expireDate = null)
    {
        // validation for constraint: string
        if (!is_null($expireDate) && !is_string($expireDate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($expireDate)), __LINE__);
        }
        $this->ExpireDate = $expireDate;
        return $this;
    }
    /**
     * Get LicenseNumber value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getLicenseNumber()
    {
        return isset($this->LicenseNumber) ? $this->LicenseNumber : null;
    }
    /**
     * Set LicenseNumber value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $licenseNumber
     * @return \StructType\DealerLicense
     */
    public function setLicenseNumber($licenseNumber = null)
    {
        // validation for constraint: string
        if (!is_null($licenseNumber) && !is_string($licenseNumber)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($licenseNumber)), __LINE__);
        }
        if (is_null($licenseNumber) || (is_array($licenseNumber) && empty($licenseNumber))) {
            unset($this->LicenseNumber);
        } else {
            $this->LicenseNumber = $licenseNumber;
        }
        return $this;
    }
    /**
     * Get LicenseType value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getLicenseType()
    {
        return isset($this->LicenseType) ? $this->LicenseType : null;
    }
    /**
     * Set LicenseType value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $licenseType
     * @return \StructType\DealerLicense
     */
    public function setLicenseType($licenseType = null)
    {
        // validation for constraint: string
        if (!is_null($licenseType) && !is_string($licenseType)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($licenseType)), __LINE__);
        }
        if (is_null($licenseType) || (is_array($licenseType) && empty($licenseType))) {
            unset($this->LicenseType);
        } else {
            $this->LicenseType = $licenseType;
        }
        return $this;
    }
    /**
     * Get LicensedState value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getLicensedState()
    {
        return isset($this->LicensedState) ? $this->LicensedState : null;
    }
    /**
     * Set LicensedState value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $licensedState
     * @return \StructType\DealerLicense
     */
    public function setLicensedState($licensedState = null)
    {
        // validation for constraint: string
        if (!is_null($licensedState) && !is_string($licensedState)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($licensedState)), __LINE__);
        }
        if (is_null($licensedState) || (is_array($licensedState) && empty($licensedState))) {
            unset($this->LicensedState);
        } else {
            $this->LicensedState = $licensedState;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\DealerLicense
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
