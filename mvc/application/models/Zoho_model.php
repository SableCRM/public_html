<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Zoho_model extends CI_Model

{
	function __construct()
	{

		// Call the Model constructor

		parent::__construct();
		$this->load->library(array(
			'session',
			'encrypt'
		));
		$this->load->database();
		$this->load->helper('custom');
		$this->load->library('zohocrm');
		$this->load->model('user_model');
	}

	
	 public function zohoCreateContact($contact_arr, $ZOHO_AUTH_ID)
    {
    	$client = new CristianPontes\ZohoCRMClient\ZohoCRMClient('Contacts', $ZOHO_AUTH_ID); 
		$records = $client->insertRecords()
							->addRecord($contact_arr)
							->triggerWorkflow()
							->onDuplicateError()
							->request();
							
		return $records;			
    	
    }
    
     public function zohoUpdateContact($contact_arr, $ZOHO_AUTH_ID)
    {
    	$client = new CristianPontes\ZohoCRMClient\ZohoCRMClient('Contacts', $ZOHO_AUTH_ID); 
		$records = $client->updateRecords()
							->addRecord($contact_arr)
							->triggerWorkflow()
							->request();
							
		return $records;			
    	
    }
    
     public function zohoCreateDeal($deal_arr, $ZOHO_AUTH_ID)
    {
    	$client = new CristianPontes\ZohoCRMClient\ZohoCRMClient('Deals', $ZOHO_AUTH_ID); 
		$records = $client->insertRecords()
							->addRecord($deal_arr)
							->triggerWorkflow()
							->onDuplicateError()
							->request();
							
		return $records;			
    	
    }
    
     public function zohoUpdateDeal($deal_arr, $ZOHO_AUTH_ID)
    {
    	$client = new CristianPontes\ZohoCRMClient\ZohoCRMClient('Deals', $ZOHO_AUTH_ID); 
		$records = $client->updateRecords()
							->addRecord($deal_arr)
							->triggerWorkflow()
							->onDuplicateUpdate()
							->request();
							
		return $records;			
    	
    }
    
     public function zohoGetDeal($deal_id, $ZOHO_AUTH_ID)
    {
    	$client = new CristianPontes\ZohoCRMClient\ZohoCRMClient('Deals', $ZOHO_AUTH_ID); 
		$records = $client->getRecordById()
							->id($deal_id)
							->request();
							
		return $records;			
    	
    }
     public function zohoGetContact($contact_id, $ZOHO_AUTH_ID)
    {
    	$client = new CristianPontes\ZohoCRMClient\ZohoCRMClient('Contacts', $ZOHO_AUTH_ID); 
		$records = $client->getRecordById()
							->id($contact_id)
							->request();
							
		return $records;			
    	
    }
    
      public function zohoGetDealRelatedContacts($deal_id, $ZOHO_AUTH_ID)
    {
    	$client = new CristianPontes\ZohoCRMClient\ZohoCRMClient('Contacts', $ZOHO_AUTH_ID); 
		$records = $client->getRelatedRecords()
							->id($deal_id)
							 ->parentModule('Deals')
					          ->fromIndex(1)
					          ->toIndex(200)
					          ->request();

							
		return $records;			
    	
    }
    

}