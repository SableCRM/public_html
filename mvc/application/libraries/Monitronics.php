<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 error_reporting(E_ALL ^ E_DEPRECATED);
 require_once APPPATH.'/third_party/monitronicsApi/vendor/autoload.php';
 class Monitronics
  {
    
     function __construct()
	  {
	    $CI = & get_instance();
	  }
  }