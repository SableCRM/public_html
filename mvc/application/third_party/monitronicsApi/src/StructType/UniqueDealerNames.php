<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for UniqueDealerNames StructType
 * @subpackage Structs
 */
class UniqueDealerNames extends AbstractStructBase
{
    /**
     * The NameSearch
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $NameSearch;
    /**
     * Constructor method for UniqueDealerNames
     * @uses UniqueDealerNames::setNameSearch()
     * @param string $nameSearch
     */
    public function __construct($nameSearch = null)
    {
        $this
            ->setNameSearch($nameSearch);
    }
    /**
     * Get NameSearch value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getNameSearch()
    {
        return isset($this->NameSearch) ? $this->NameSearch : null;
    }
    /**
     * Set NameSearch value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $nameSearch
     * @return \StructType\UniqueDealerNames
     */
    public function setNameSearch($nameSearch = null)
    {
        // validation for constraint: string
        if (!is_null($nameSearch) && !is_string($nameSearch)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($nameSearch)), __LINE__);
        }
        if (is_null($nameSearch) || (is_array($nameSearch) && empty($nameSearch))) {
            unset($this->NameSearch);
        } else {
            $this->NameSearch = $nameSearch;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\UniqueDealerNames
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
