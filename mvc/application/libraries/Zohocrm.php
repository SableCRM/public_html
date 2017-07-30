<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 error_reporting(E_ALL ^ E_DEPRECATED);
 require_once APPPATH.'/third_party/zohocrm/vendor/autoload.php';

 class Zohocrm
  {
    
     function __construct()
	  {
	    $CI = & get_instance();
	    
	  }
  }