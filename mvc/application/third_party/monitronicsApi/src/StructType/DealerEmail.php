<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for DealerEmail StructType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:DealerEmail
 * @subpackage Structs
 */
class DealerEmail extends AbstractStructBase
{
    /**
     * The ExtensionData
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \StructType\ExtensionDataObject
     */
    public $ExtensionData;
    /**
     * The EmailAddress
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $EmailAddress;
    /**
     * The Type_ID
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Type_ID;
    /**
     * Constructor method for DealerEmail
     * @uses DealerEmail::setExtensionData()
     * @uses DealerEmail::setEmailAddress()
     * @uses DealerEmail::setType_ID()
     * @param \StructType\ExtensionDataObject $extensionData
     * @param string $emailAddress
     * @param string $type_ID
     */
    public function __construct(\StructType\ExtensionDataObject $extensionData = null, $emailAddress = null, $type_ID = null)
    {
        $this
            ->setExtensionData($extensionData)
            ->setEmailAddress($emailAddress)
            ->setType_ID($type_ID);
    }
    /**
     * Get ExtensionData value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \StructType\ExtensionDataObject|null
     */
    public function getExtensionData()
    {
        return isset($this->ExtensionData) ? $this->ExtensionData : null;
    }
    /**
     * Set ExtensionData value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \StructType\ExtensionDataObject $extensionData
     * @return \StructType\DealerEmail
     */
    public function setExtensionData(\StructType\ExtensionDataObject $extensionData = null)
    {
        if (is_null($extensionData) || (is_array($extensionData) && empty($extensionData))) {
            unset($this->ExtensionData);
        } else {
            $this->ExtensionData = $extensionData;
        }
        return $this;
    }
    /**
     * Get EmailAddress value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getEmailAddress()
    {
        return isset($this->EmailAddress) ? $this->EmailAddress : null;
    }
    /**
     * Set EmailAddress value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $emailAddress
     * @return \StructType\DealerEmail
     */
    public function setEmailAddress($emailAddress = null)
    {
        // validation for constraint: string
        if (!is_null($emailAddress) && !is_string($emailAddress)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($emailAddress)), __LINE__);
        }
        if (is_null($emailAddress) || (is_array($emailAddress) && empty($emailAddress))) {
            unset($this->EmailAddress);
        } else {
            $this->EmailAddress = $emailAddress;
        }
        return $this;
    }
    /**
     * Get Type_ID value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getType_ID()
    {
        return isset($this->Type_ID) ? $this->Type_ID : null;
    }
    /**
     * Set Type_ID value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $type_ID
     * @return \StructType\DealerEmail
     */
    public function setType_ID($type_ID = null)
    {
        // validation for constraint: string
        if (!is_null($type_ID) && !is_string($type_ID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($type_ID)), __LINE__);
        }
        if (is_null($type_ID) || (is_array($type_ID) && empty($type_ID))) {
            unset($this->Type_ID);
        } else {
            $this->Type_ID = $type_ID;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\DealerEmail
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
