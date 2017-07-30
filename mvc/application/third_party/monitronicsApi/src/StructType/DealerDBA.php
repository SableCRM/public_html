<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for DealerDBA StructType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:DealerDBA
 * @subpackage Structs
 */
class DealerDBA extends AbstractStructBase
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
     * The DBAName
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $DBAName;
    /**
     * Constructor method for DealerDBA
     * @uses DealerDBA::setExtensionData()
     * @uses DealerDBA::setDBAName()
     * @param \StructType\ExtensionDataObject $extensionData
     * @param string $dBAName
     */
    public function __construct(\StructType\ExtensionDataObject $extensionData = null, $dBAName = null)
    {
        $this
            ->setExtensionData($extensionData)
            ->setDBAName($dBAName);
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
     * @return \StructType\DealerDBA
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
     * Get DBAName value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getDBAName()
    {
        return isset($this->DBAName) ? $this->DBAName : null;
    }
    /**
     * Set DBAName value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $dBAName
     * @return \StructType\DealerDBA
     */
    public function setDBAName($dBAName = null)
    {
        // validation for constraint: string
        if (!is_null($dBAName) && !is_string($dBAName)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($dBAName)), __LINE__);
        }
        if (is_null($dBAName) || (is_array($dBAName) && empty($dBAName))) {
            unset($this->DBAName);
        } else {
            $this->DBAName = $dBAName;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\DealerDBA
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
