<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for SearchContracts StructType
 * @subpackage Structs
 */
class SearchContracts extends AbstractStructBase
{
    /**
     * The SearchCriteria
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \StructType\StatusSearch
     */
    public $SearchCriteria;
    /**
     * The StartDate
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $StartDate;
    /**
     * The EndDate
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $EndDate;
    /**
     * Constructor method for SearchContracts
     * @uses SearchContracts::setSearchCriteria()
     * @uses SearchContracts::setStartDate()
     * @uses SearchContracts::setEndDate()
     * @param \StructType\StatusSearch $searchCriteria
     * @param string $startDate
     * @param string $endDate
     */
    public function __construct(\StructType\StatusSearch $searchCriteria = null, $startDate = null, $endDate = null)
    {
        $this
            ->setSearchCriteria($searchCriteria)
            ->setStartDate($startDate)
            ->setEndDate($endDate);
    }
    /**
     * Get SearchCriteria value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \StructType\StatusSearch|null
     */
    public function getSearchCriteria()
    {
        return isset($this->SearchCriteria) ? $this->SearchCriteria : null;
    }
    /**
     * Set SearchCriteria value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \StructType\StatusSearch $searchCriteria
     * @return \StructType\SearchContracts
     */
    public function setSearchCriteria(\StructType\StatusSearch $searchCriteria = null)
    {
        if (is_null($searchCriteria) || (is_array($searchCriteria) && empty($searchCriteria))) {
            unset($this->SearchCriteria);
        } else {
            $this->SearchCriteria = $searchCriteria;
        }
        return $this;
    }
    /**
     * Get StartDate value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getStartDate()
    {
        return isset($this->StartDate) ? $this->StartDate : null;
    }
    /**
     * Set StartDate value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $startDate
     * @return \StructType\SearchContracts
     */
    public function setStartDate($startDate = null)
    {
        // validation for constraint: string
        if (!is_null($startDate) && !is_string($startDate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($startDate)), __LINE__);
        }
        if (is_null($startDate) || (is_array($startDate) && empty($startDate))) {
            unset($this->StartDate);
        } else {
            $this->StartDate = $startDate;
        }
        return $this;
    }
    /**
     * Get EndDate value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getEndDate()
    {
        return isset($this->EndDate) ? $this->EndDate : null;
    }
    /**
     * Set EndDate value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $endDate
     * @return \StructType\SearchContracts
     */
    public function setEndDate($endDate = null)
    {
        // validation for constraint: string
        if (!is_null($endDate) && !is_string($endDate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($endDate)), __LINE__);
        }
        if (is_null($endDate) || (is_array($endDate) && empty($endDate))) {
            unset($this->EndDate);
        } else {
            $this->EndDate = $endDate;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\SearchContracts
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
