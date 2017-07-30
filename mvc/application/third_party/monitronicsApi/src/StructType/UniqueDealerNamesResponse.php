<?php

namespace StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for UniqueDealerNamesResponse StructType
 * @subpackage Structs
 */
class UniqueDealerNamesResponse extends AbstractStructBase
{
    /**
     * The UniqueDealerNamesResult
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \ArrayType\ArrayOfDealerListing
     */
    public $UniqueDealerNamesResult;
    /**
     * Constructor method for UniqueDealerNamesResponse
     * @uses UniqueDealerNamesResponse::setUniqueDealerNamesResult()
     * @param \ArrayType\ArrayOfDealerListing $uniqueDealerNamesResult
     */
    public function __construct(\ArrayType\ArrayOfDealerListing $uniqueDealerNamesResult = null)
    {
        $this
            ->setUniqueDealerNamesResult($uniqueDealerNamesResult);
    }
    /**
     * Get UniqueDealerNamesResult value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \ArrayType\ArrayOfDealerListing|null
     */
    public function getUniqueDealerNamesResult()
    {
        return isset($this->UniqueDealerNamesResult) ? $this->UniqueDealerNamesResult : null;
    }
    /**
     * Set UniqueDealerNamesResult value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \ArrayType\ArrayOfDealerListing $uniqueDealerNamesResult
     * @return \StructType\UniqueDealerNamesResponse
     */
    public function setUniqueDealerNamesResult(\ArrayType\ArrayOfDealerListing $uniqueDealerNamesResult = null)
    {
        if (is_null($uniqueDealerNamesResult) || (is_array($uniqueDealerNamesResult) && empty($uniqueDealerNamesResult))) {
            unset($this->UniqueDealerNamesResult);
        } else {
            $this->UniqueDealerNamesResult = $uniqueDealerNamesResult;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \StructType\UniqueDealerNamesResponse
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
