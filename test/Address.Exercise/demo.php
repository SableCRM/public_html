<?php
/**
 * Created by PhpStorm.
 * User: razaman2
 * Date: 3/29/2017
 * Time: 10:31 PM
 */

require 'Address.inc.php';
require 'Database.inc.php';
/**
 * Define autoloader.
 * @param string $class_name
 */
//function __autoload($class_name){
//    include $class_name . '.inc';
//}

echo '<h2>Instantiating Address.inc</h2>';
$address = new Address;

echo '<h2>Setting properties...</h2>';
$address->street_address_1 = '602 East 24th Street';
$address->street_address_2 = 'first floor';
$address->city_name = 'Paterson';
$address->subdivision_name = 'NJ';
$address->postal_code = '07514';
$address->country_name = 'United States of America';
$address->address_type_id = 1;
echo $address;

echo '<h2>Testing Address.inc __construct with an array</h2>';
$address_2 = new Address(array(
    'street_address_1' => '602 East 24th Street',
    'city_name' => 'Paterson',
    'subdivision_name' => 'NJ',
    'postal_code' => '07514',
    'country_name' => 'USA'
));
echo $address_2;