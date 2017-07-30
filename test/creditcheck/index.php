<?php

/**
 * Created by PhpStorm.
 * User: razaman2
 * Date: 4/26/2017
 * Time: 8:25 PM
 */

require_once "vendor/autoload.php";

use credit\credit\pullNewCredit;

$client = array(

    //Power Home
    //"username" => "PowerH0me",
    //"password" => "DjEDhQ#@4TyxdE7KjFyt",

    //Alpha One
    //"username" => "Alpha1pro",
    //"password" => "ON(0enhJOtMaNK4ArnNh",

    //GuardMe
    "username" => "GU@RDMEm0ni",
    "password" => "uV9CtPlvE74*NTdpTBxb",

    //Clear Protection
    //"username" => "ClearPr0t",
    //"password" => "KC2ffi)CVFUwDC1Ijy#M",

    "bureau" => "Equifax",
    "firstname" => "Johnny",
    "lastname" => "Blaze",
    "ssn" => "000-00-0000",
    "address" => "29 Elm Ave",
    "city" => "Middletown",
    "state" => "NJ",
    "zip" => "08857",
    "birthdate" => "03/29/1985"
);

try{

    $pullNewCredit = new pullNewCredit($client);

    print_r($pullNewCredit->pullNew());

} catch(Exception $ex) {

    echo $ex->getMessage();
}