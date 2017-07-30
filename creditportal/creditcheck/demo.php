<?php
/**
 * Created by PhpStorm.
 * User: razaman2
 * Date: 4/27/2017
 * Time: 8:35 AM
 */
require_once "vendor/autoload.php";

use credit\credit;

$client = array(

    //Power Home
//    "username" => "PowerH0me",
//    "password" => "DjEDhQ#@4TyxdE7KjFyt",

    //Alpha One
    //"username" => "Alpha1pro",
    //"password" => "ON(0enhJOtMaNK4ArnNh",

//    GuardMe
//    "username" => "GU@RDMEm0ni",
//    "password" => "uV9CtPlvE74*NTdpTBxb",

    //Clear Protection
    "username" => "ClearPr0t",
    "password" => "KC2ffi)CVFUwDC1Ijy#M",

//    "username"  => $hartUser,
//    "password"  => $hartPass,
    "bureau"    => "TransUnion",
    "firstname" => "Johnny",
    "lastname"  => "Cash",
    "ssn"       => "111-11-1111",
    "address"   => "32 Mountain Ave",
    "city"      => "Kinnelon",
    "state"     => "NJ",
    "zip"       => "10145",
    "birthdate" => "1980-03-24"
);

try{

    $pullNewCredit = new credit\pullNewCredit($client);

    echo $pullNewCredit->pullNew();

    echo $pullNewCredit->fullParse();

} catch(Exception $ex) {

    echo $ex->getMessage();
}