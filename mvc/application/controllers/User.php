<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
        $this->load->model('credit_check_model');
        $this->load->model('zoho_model');
    }  
	 
	public function index()
	{
		
		
		
		if(!$this->session->userdata('sable_user_account'))
     	{
     		redirect(base_url().'user/login' , 'refresh'); 
     	}
     	
     	if($this->session->userdata('sable_zoho_deal_id'))
     	{
     		redirect(base_url().'salesportal/newaccount' , 'refresh'); 
     	}


		$data['user'] = $this->session->userdata('sable_user_account');

		if($data['user']['USER_SECURITY_LEVEL_ID'] == 2){
			$redirect_url = base_url().'user/salesportal';
			redirect($redirect_url, 'refresh');
		}
     	
     	$this->load->view('frontend/templates/portal_header',$data);
		$this->load->view('frontend/pages/portal_view',$data);
		$this->load->view('frontend/templates/portal_footer',$data);
	}
	public function portals()
	{
		
		
		$data['page_cls'] = 'portal';
		if(!$this->session->userdata('sable_user_account'))
     	{
     		redirect(base_url().'user/login' , 'refresh'); 
     	}
     	if($this->session->userdata('sable_zoho_deal_id'))
     	{
     		redirect(base_url().'salesportal/newaccount' , 'refresh'); 
     	}
     	$data['user'] = $this->session->userdata('sable_user_account');

		if($data['user']['USER_SECURITY_LEVEL_ID'] == 2){
			$redirect_url = base_url().'user/salesportal';
			redirect($redirect_url, 'refresh');
		}
     	
     	$this->load->view('frontend/templates/portal_header',$data);
		$this->load->view('frontend/pages/portal_view',$data);
		$this->load->view('frontend/templates/portal_footer',$data);
	}
	public function salesportal()
	{
		$data['page_cls'] = 'portal';
		if(!$this->session->userdata('sable_user_account'))
     	{
     		redirect(base_url().'user/login' , 'refresh'); 
     	}
     	$data['user'] = $this->session->userdata('sable_user_account');
     	$this->load->view('frontend/templates/portal_header',$data);
		$this->load->view('frontend/pages/sales_portal_view',$data);
		$this->load->view('frontend/templates/portal_footer',$data);
	}
	
	public function setting()
	{
		$data['page_cls'] = 'portal';
		if(!$this->session->userdata('sable_user_account'))
     	{
     		redirect(base_url().'user/login' , 'refresh'); 
     	}
     	$user = $this->session->userdata('sable_user_account');
     	$data['user'] =  $this->user_model->get_user_by_id($user['USER_ID']);
     	
     	$this->load->view('frontend/templates/portal_header',$data);
		$this->load->view('frontend/pages/setting_view',$data);
		$this->load->view('frontend/templates/setting_footer',$data);
	}
	
	public function thankyou()
	{
		$data['page_cls'] = 'portal';
		if(!$this->session->userdata('sable_user_account'))
     	{
     		redirect(base_url().'user/login' , 'refresh'); 
     	}
     	$data['user'] = $this->session->userdata('sable_user_account');
     	$this->load->view('frontend/templates/portal_header',$data);
		$this->load->view('frontend/pages/thankyou_view',$data);
		$this->load->view('frontend/templates/portal_footer',$data);
	}
	
	
	
	public function techportal()
	{
		$data['page_cls'] = 'portal';
		if(!$this->session->userdata('sable_user_account'))
     	{
     		redirect(base_url().'user/login' , 'refresh'); 
     	}
     	$user = $this->session->userdata('sable_user_account');
     	$data['user'] =  $this->user_model->get_user_by_id($user['USER_ID']);
     	
     	$this->load->view('frontend/templates/portal_header',$data);
		$this->load->view('frontend/pages/tech_portal_view',$data);
		$this->load->view('frontend/templates/portal_footer',$data);
	}
	public function login()
	{
		
		$data['page_cls'] = 'portal';
		if($this->session->userdata('sable_user_account'))
         {
         	redirect(base_url().'user' , 'refresh'); 
         }
		$this->load->view('frontend/templates/login_header',$data);
		$this->load->view('frontend/pages/login_view',$data);
		$this->load->view('frontend/templates/login_footer',$data);
		
	}
	public function ajaxlogin()
    {
         $result = $this->user_model->ajaxlogin();
		 echo json_encode($result);
		 exit;
    }
    public function logout()
    {
        $this->session->unset_userdata('sable_user_account');
	    $this->session->unset_userdata('sable_zoho_deal_id');
	    $this->session->unset_userdata('sable_zoho_deal');
	    $this->session->unset_userdata('sable_zoho_contact');
	    $this->session->unset_userdata('sable_zoho_run_spouse');
        // session_destroy();
         redirect(base_url(), 'refresh'); 
    }
    
    public function ajaxsendcontract()
    {
         $result = $this->user_model->ajaxsendcontract();
		 echo json_encode($result);
		 exit;
    }
    public function ajaxresetuserpwd()
    {
         $result = $this->user_model->ajaxresetuserpwd();
		 echo json_encode($result);
		 exit;
    }
     public function ajaxsaveuserpersonal()
    {
         $result = $this->user_model->ajaxsaveuserpersonal();
		 echo json_encode($result);
		 exit;
    }
    
    public function checkcreditscore()
    {
         $result = $this->credit_check_model->checkcreditscore();
		 echo json_encode($result);
		 exit;
    }

	public function creditconfirmdecline()
	{
		$result = $this->credit_check_model->creditconfirmdecline();
		echo json_encode($result);
		exit;
	}

	public function runspouseprocess()
	{
		$result = $this->credit_check_model->runspouseprocess();
		echo json_encode($result);
		exit;
	}
    
     public function ajaxgetappointmentlist()
    {
         $result = $this->user_model->ajaxgetappointmentlist();
		 echo json_encode($result);
		 exit;
    }

	public function creditdealwithcontactexists()
	{
		$result = $this->credit_check_model->creditdealwithcontactexists();
		echo json_encode($result);
		exit;
	}
}
