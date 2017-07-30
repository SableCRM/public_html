<?php

/**
 * Created by PhpStorm.
 * User: razaman2
 * Date: 3/29/2017
 * Time: 10:15 PM
 */

class Address{

    const ADDRESS_TYPE_RESIDENCE = 1;
    const ADDRESS_TYPE_BUSINESS = 2;
    const ADDRESS_TYPE_PARK = 3;

    // Address.inc types
    static public $valid_address_types = array(
        Address::ADDRESS_TYPE_RESIDENCE => 'Residence',
        Address::ADDRESS_TYPE_BUSINESS => 'Business',
        Address::ADDRESS_TYPE_PARK => 'Park',
    );

    // Street address.
    public $street_address_1;
    public $street_address_2;

    // Name of city.
    public $city_name;

    // Name of subdivision.
    public $subdivision_name;

    // Postal code.
    protected $_postal_code;

    // name of the Country.
    public $country_name;

    // Primary key of an address.
    protected $_address_id;

    // Address.inc type id.
    protected  $_address_type_id;

    // When the record was created and last updated.
    protected $_time_created;
    protected $_time_updated;

    /**
     * Address.inc constructor.
     * @param array $data Optional array of property names and values.
     */
    function __construct($data = array()){
        $this->_time_created = time();

        // Ensure thet the Address.inc can be populated.
        if(!is_array($data)){
            trigger_error('Unable to construct address with a ' . get_class($name));
        }

        // If there is at least one value, populate the Address.inc with it.
        if(count($data) > 0){
            foreach($data as $name => $value){
                // Special case for protected properties.
                if(in_array($name, array(
                    'time_created',
                    'time_updated',
                ))){
                    $name = '_' . $name;
                }
                $this->$name = $value;
            }
        }
    }

    /**
     * Magic __get.
     * @param string $name
     * @return mixed
     */
    function __get($name){
        // Postal code lookup if unset.
        if(!$this->_postal_code){
            $this->_postal_code = $this->_postal_code_guess();
        }

        // Attempt to return a protected property by name.
        $protected_property_name = '_' . $name;
        if(property_exists($this, $protected_property_name)){
            return $this->$protected_property_name;
        }

        // Unable to access property; trigger error.
        trigger_error('Undefined property via __get: ' . $name);
        return null;
    }

    /**
     * Magic __set.
     * @param string $name
     * @param mixed $value
     */
    function __set($name, $value){
        // Only set valid address type id.
        if('address_type_id' == $name){
            $this->_setAddressTypeId($value);
            return;
        }

        // Allow anything to set the postal code.
        if('postal_code' == $name){
            $this->$name = $value;
            return;
        }

        // Unable to access property; trigger error.
        trigger_error('Undefined or unallowed property via __set(): ' . $name);
    }

    /**
     * Magic __toString.
     * @return string
     */
    function __toString(){
        return $this->display();
    }

    /**
     * Guess the postal code given the subdivision and city name.
     * @todo Replace with a database lookup.
     * @return string
     */
    protected function _postal_code_guess(){
        $db = Database::getInstance();
        $mysqli = $db->getConnection();

        $sql_query = 'SELECT postal_code ';
        $sql_query .= 'FROM location ';

        $city_name = $mysqli->real_escape_string($this->city_name);
        $sql_query .= 'WHERE city_name = "' . $city_name . '" ';

        $this->subdivision_name = $mysqli->real_escape_string($this->subdivision_name);
        $sql_query .= 'AND subdivision_name = "' . $this->subdivision_name . '" ';

        $result = $mysqli->query($sql_query);

        if($row = $result->fetch_assoc()){
            return $row['postal_code'];
        }
    }

    function display(){
        $output = '';

        // Street address.
        $output .= $this->street_address_1;
        if($this->street_address_2){
            $output .= '<br>' . $this->street_address_2;
        }

        // City, Subdivision Postal.
        $output .= '<br>';
        $output .= $this->city_name . ', ' . $this->subdivision_name;
        $output .= ' ' . $this->postal_code;

        // Country.
        $output .= '<br>';
        $output .= $this->country_name;

        return $output;
    }

    /**
     * Determine if an address type is valid.
     * @param int $address_type_id
     * @return boolean
     */
    static public function isValidAddressTypeId($address_type_id){
        return array_key_exists($address_type_id, self::$valid_address_types);
    }

    /**
     * If valid, set the address type id.
     * @param int $address_type_id
     */
    protected function _setAddressTypeId($address_type_id){
        if(self::isValidAddressTypeId($address_type_id)){
            $this->_address_type_id = $address_type_id;
        }
    }

}