<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salesportal extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->helper('url');
        $this->load->library(array('session', 'encrypt'));
        $this->load->helper('form');
        $this->load->model('user_model');
        $this->load->model('zoho_model');
    }  
	 
	
	public function newaccount()
	{
		/*$this->load->library('monitronics');
		$options = array(
		    \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_URL => 'https://mimasweb.monitronics.net/eContractAPI?wsdl',
		    \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_CLASSMAP => ClassMap::get(),
		);
		
		$get = new \ServiceType\Get($options);
		$envelope_id = "76a182b6-9f78-4753-ba1d-ff9b2d46d27b";
		$get_contract = new \StructType\GetContract($envelope_id);
		$get->GetContract($get_contract);
		if ($get->GetContract($get_contract) !== false) 
		{
		     print_r($get->getResult());
		} 
		else 
		{
		    print_r($get->getLastError());
		}
		*/
		$deal_id = $this->input->get('deal_id');
		if($deal_id != "")
     	{
			$this->session->set_userdata('sable_zoho_deal_id', $deal_id);
		}
		$data['page_cls'] = 'portal';
		if(!$this->session->userdata('sable_user_account'))
     	{
     		redirect(base_url().'user/login' , 'refresh'); 
     	}
     	$user = $this->session->userdata('sable_user_account');
     	$data['user'] =  $this->user_model->get_user_by_id($user['USER_ID']);
     	$deal_arr = array();
     	$contact_arr = array();
     	if($deal_id != "")
     	{
			$this->session->set_userdata('sable_zoho_deal_id', $deal_id);
			
			$deal_records = $this->zoho_model->zohoGetDeal($deal_id,$user['ZOHO_AUTH_ID']);
			$contact_records = $this->zoho_model->zohoGetDealRelatedContacts($deal_id,$user['ZOHO_AUTH_ID']);
			
			  foreach ($deal_records as $record){
		          $deal_arr = $record->getData();
		      }
		      
		      $this->session->set_userdata('sable_zoho_deal', $deal_arr);
		      
		      foreach ($contact_records as $record){
		          $contact_arr = $record->getData();
		      }
		      
		      $this->session->set_userdata('sable_zoho_contact', $contact_arr);
		      
		}
		else if($this->session->userdata('sable_zoho_deal_id'))
     	{
			$deal_id = $this->session->userdata('sable_zoho_deal_id');
			if(!$this->session->userdata('sable_zoho_deal'))
			{
				$deal_records = $this->zoho_model->zohoGetDeal($deal_id,$user['ZOHO_AUTH_ID']);
				foreach ($deal_records as $record)
				{
		          $deal_arr = $record->getData();
		        }
				$this->session->set_userdata('sable_zoho_deal', $deal_arr);
			}
			else
			{
				$deal_arr = $this->session->userdata('sable_zoho_deal');
			}
			if(!$this->session->userdata('sable_zoho_contact'))
			{
				$contact_records = $this->zoho_model->zohoGetDealRelatedContacts($deal_id,$user['ZOHO_AUTH_ID']);
				 foreach ($contact_records as $record){
		          $contact_arr = $record->getData();
		      }
			    $this->session->set_userdata('sable_zoho_contact', $contact_arr);
			}
			else
			{
				$contact_arr = $this->session->userdata('sable_zoho_contact');
			}
			
		}
		//print_r($deal_arr);
		//exit;
     	$data['deal_data'] = $deal_arr;
     	$data['contact_data'] = $contact_arr;
     	//print_r($contact_arr);
     	//exit;
     	
     	$this->load->view('frontend/templates/portal_header',$data);
		$this->load->view('frontend/pages/sales_portal/new_account_view',$data);
		$this->load->view('frontend/templates/sales_portal_footer',$data);
	}

	public function contract_callback()
	{
		$eventname = $this->input->get('eventname');
		$email = $this->input->get('email');
		if($eventname == "signcomplete" && $email != ""){
			$result = $this->user_model->eContractCallback($email);
			echo json_encode($result);
			exit;
		} else{
			$result = array(
				'success' => false,
				'message' => 'Invalid Data'
			);
			echo json_encode($result);
			exit;
		}
	}
}
