<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for SearchContractsResponse StructType
 * @subpackage Structs
 */
class SearchContractsResponse extends AbstractStructBase
{
    /**
     * The SearchContractsResult
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \ArrayType\ArrayOfStatusSearch
     */
    public $SearchContractsResult;
    /**
     * Constructor method for SearchContractsResponse
     * @uses SearchContractsResponse::setSearchContractsResult()
     * @param \ArrayType\ArrayOfStatusSearch $searchContractsResult
     */
    public function __construct(\ArrayType\ArrayOfStatusSearch $searchContractsResult = null)
    {
        $this
            ->setSearchContractsResult($searchContractsResult);
    }
    /**
     * Get SearchContractsResult value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \ArrayType\ArrayOfStatusSearch|null
     */
    public function getSearchContractsResult()
    {
        return isset($this->SearchContractsResult) ? $this->SearchContractsResult : null;
    }
    /**
     * Set SearchContractsResult value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \ArrayType\ArrayOfStatusSearch $searchContractsResult
     * @return \StructType\SearchContractsResponse
     */
    public function setSearchContractsResult(\ArrayType\ArrayOfStatusSearch $searchContractsResult = null)
    {
        if (is_null($searchContractsResult) || (is_array($searchContractsResult) && empty($searchContractsResult))) {
            unset($this->SearchContractsResult);
        } else {
            $this->SearchContractsResult = $searchContractsResult;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\SearchContractsResponse
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
