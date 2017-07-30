<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Credit_check_model extends CI_Model

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
		$this->load->model('zoho_model');
		
	}

	function get_hart_user_by_company_id($company_id)
	{
		$q = $this->db->conn_id->prepare("SELECT 
											HU.*,
											C.*
											FROM HART_USER AS HU 
											INNER JOIN COMPANY AS C ON C.COMPANY_ID = HU.COMPANY_ID 
											WHERE HU.COMPANY_ID = :COMPANY_ID");
		$q->bindParam(':COMPANY_ID', $company_id, PDO::PARAM_STR);
		$ret = array();
		if ($q->execute())
		{
			$ret = $q->fetch(PDO::FETCH_ASSOC);
		}

		return $ret;
	}
	
	public function credit_score_success($credit_score_arr, $contact_arr, $user_details)
	{
		$this->session->set_userdata('sable_user_credit_score', $credit_score_arr);
		if(!isset($contact_arr['CONTACTID']))
		{
			$contact_records = $this->zoho_model->zohoCreateContact($contact_arr, $user_details['ZOHO_AUTH_ID']);
		}
		else
		{
			$contact_records = $this->zoho_model->zohoUpdateContact($contact_arr, $user_details['ZOHO_AUTH_ID']);
		}
		$contact_id = "";
    	if(count($contact_records) > 0)
    	{
			foreach ($contact_records as $record) {
				$contact_id = $record->id;
			}
		}
		$this->session->set_userdata('sable_zoho_contact_id', $contact_id);
		
		$data = array(
						'success' => true,
						'score' => $credit_score_arr['credit_score']
					);
		return $data;
	}
	
	public function credit_score_failure($credit_score_arr, $contact_arr, $deal_array, $user_details)
	{
		$this->session->set_userdata('sable_user_credit_score', $credit_score_arr);
		
		if(!isset($contact_arr['Id']))
		{
			$contact_records = $this->zoho_model->zohoCreateContact($contact_arr, $user_details['ZOHO_AUTH_ID']);
		}
		else
		{
		
			$contact_records = $this->zoho_model->zohoUpdateContact($contact_arr, $user_details['ZOHO_AUTH_ID']);
		}
				
		$contact_id = "";
    	if(count($contact_records) > 0)
    	{
			foreach ($contact_records as $record) {
				$contact_id = $record->id;
			}
		}
		$deal_array['CONTACTID'] = $contact_id;
		$this->session->set_userdata('sable_zoho_contact_id', $contact_id);
		$deal_records = $this->zoho_model->zohoCreateDeal($deal_array, $user_details['ZOHO_AUTH_ID']);
		$data = array(
						'success' => false,
						'score' => $credit_score_arr['credit_score']
					);
		return $data;
	}
	
	public function checkcreditscore()
    {
    	try
    	{
	    	if($this->session->userdata('sable_zoho_contact'))
	    	{
				$contact_arr = $this->session->userdata('sable_zoho_contact');
				if($contact_arr["Credit Approved"] == "true"){
					$data = array(
					'success' => true,
					'score' => $contact_arr['Credit Score'],
					'exist' => true
					);
					return $data;
				}
			}
	    	
	    	$user = $this->session->userdata('sable_user_account');
     		$user_details =  $this->user_model->get_user_by_id($user['USER_ID']);
	    	$first_name = $this->input->post('first_name');
	    	$last_name  = $this->input->post('last_name');
	    	$address1 = $this->input->post('address1');
	    	$address2 = $this->input->post('address2');
	    	$city = $this->input->post('city');
	    	$state = $this->input->post('state');
	    	$county = $this->input->post('county');
	    	$zip = $this->input->post('zip');
	    	$country = $this->input->post('country');
	    	$country_full_name = $country;
	    	if($country == "US")
	    	{
				$country_full_name = "USA";
			}
			else if($country == "CA")
	    	{
				$country_full_name = "CANADA";
			}
	    	
	    	$email_address = $this->input->post('email_address');
	    	$main_phone_no = $this->input->post('main_phone_no');
	    	$social_security_no = $this->input->post('social_security_no');
	    	$property_type = $this->input->post('property_type');
	    	
	    	$chksameaddress = $this->input->post('chksameaddress');
	    	$company_name = $this->input->post('company_name');
	    	$company_type = $this->input->post('company_type');
	    	
	    	$com_first_name = $this->input->post('com_first_name');
	    	$com_last_name = $this->input->post('com_last_name');
	    	$com_address1 = $this->input->post('com_address1');
	    	$com_address2 = $this->input->post('com_address2');
	    	$com_city = $this->input->post('com_city');
	    	$com_state = $this->input->post('com_state');
	    	$com_county = $this->input->post('com_county');
	    	$com_zip = $this->input->post('com_zip');
	    	$com_country = $this->input->post('com_country');
	    	
	    	$contact_id = $this->input->post('contact_id');
    	
	    	if($chksameaddress == 1)
	    	{
				
				$com_first_name = $first_name;
		    	$com_last_name = $this->input->post('com_last_name');
		    	$com_address1 = $this->input->post('com_address1');
		    	$com_address2 = $this->input->post('com_address2');
		    	$com_city = $this->input->post('com_city');
		    	$com_state = $this->input->post('com_state');
		    	$com_county = $this->input->post('com_county');
		    	$com_zip = $this->input->post('com_zip');
		    	$com_country = $this->input->post('com_country');
			}
	    
	        $company_id = $this->input->post('company_id'); 
	        if($company_id == "")
	        {
				$company_id = $user_details['COMPANY_ID'];
			}
			
			
			$this->session->set_userdata('sable_customer_info', $this->input->post());
			
	        $credit_score = "";
	        $credit_token = "";
	        $credit_transid = "";
	        $address = ($address2 != "") ? $address1.' '.$address2: $address1;
	         
	        $contact_arr = array(
                'Country Zbooks' => '',
                'First Name' => $first_name,
                'Last Name' => $last_name,
                'Email' => $email_address,
                'Phone' => $main_phone_no,
                'Mobile' => $main_phone_no,
                'Phone 2' => '',
                'Phone Work' => '',
                'Mailing Street' => $address,
                'Mailing City' => $city,
                'Mailing State' => $state,
                'Mailing Province' => $state,
                'Mailing Zip' => $zip,
                'Mailing Postal Code' => $zip,
                'Mailing County' => $county,
                'Mailing Country' => $country_full_name,
                'Credit Score' => $credit_score,
                'Credit Token' => $credit_token,
                'Transaction Number' => $credit_transid,
                'Account Name' => '',
                'Title' => '',
                'Social Security Number' => $social_security_no,
                'Monitoring Center' => '',
                'CS Number' => ''
            );
            if($contact_id != "")
            {
				 $contact_arr['Id'] = $contact_id;
			}
           
            
            //Create Zoho Deal with Stage
        	$deal_name = $first_name.' '.$last_name.' '.$city.' '.$state;
     	    $zoho_time_format = '%Y-%m-%d %H:%M:%S';
     	    $deal_array = array(
                'Deal Name' => $deal_name,
                'Email' => $email_address,
                'Contact Phone' => $main_phone_no,
                'Address' => $address1,
                'City' => $city,
                'State' => $state,
                'Province' => $state,
                'Zip' => $zip,
                'Postal Code' => $zip,
                'County' => $county,
                'Country' => $country_full_name,
                'Residential/Commercial' => $property_type,
                'Sales Person_ID' => $user_details['USER_ID'],
                "Stage" => "Sold and Failed",
                'Closing Date' => strftime($zoho_time_format),
                
            );
            
            if($property_type == 'Commercial')
            {
				$deal_array['Business Type'] = $company_type;
				$deal_array['Account Name'] = $company_name;
			}
	        
	        if($first_name == strtolower("%pass%"))
	        {
	        	$credit_score = 755;
	        	$credit_token = "";
	        	$credit_transid = "";
	        	$credit_score_arr = array(
	        	  	'credit_score' => $credit_score,
	                'credit_token' => $credit_token,
	                'credit_transid' => $credit_transid
	        	);
	        	
	        	$contact_arr['Credit Score'] = $credit_score;
	        	$contact_arr['Credit Approved'] = 'true';
	        	$contact_arr['Approval Reason'] = 'Score';
	        	$data = $this->credit_score_success($credit_score_arr,$contact_arr,$user_details);        	
				return $data;
	        }
	        else if($first_name == strtolower("%fail%"))
	        {
	        	$credit_score = 555;
	        	$credit_token = "";
	        	$credit_transid = "";
	        	$credit_score_arr = array(
	        	  	'credit_score' => $credit_score,
	                'credit_token' => $credit_token,
	                'credit_transid' => $credit_transid,
	        	);
	        	$contact_arr['Credit Score'] = $credit_score;
	        	$contact_arr['Credit Approved'] = 'true';
	        	$contact_arr['Approval Reason'] = 'Score';
	        	$data = $this->credit_score_failure($credit_score_arr,$contact_arr,$deal_array,$user_details); 
	        	$data['message']  = "Alert: Credit Declined Score: ".$credit_score;            	
				return $data;
	        }
	        else if ($first_name == strtolower("%unknown%"))
	        {
	        	$credit_score = 0;
	        	$credit_token = "";
	        	$credit_transid = "";
	        	$credit_score_arr = array(
	        	  	'credit_score' => $credit_score,
	                'credit_token' => $credit_token,
	                'credit_transid' => $credit_transid,
	        	);
	        	/*$contact_arr['Credit Score'] = $credit_score;
	        	$contact_arr['Credit Approved'] = false;
	        	$contact_arr['Approval Reason'] = 'Manual Score Unknow';
	        	*/
	        	$data = $this->credit_score_failure($credit_score_arr,$contact_arr,$deal_array,$user_details); 
	        	
	        	$data['message']  = "Alert: No Subject Found";      	
				return $data;
	        	
	        }
	        
	        
	        $hart_user = $this->get_hart_user_by_company_id($company_id);
	        
	        $bureau = $this->input->post('bureau'); 
	        if($bureau == "")
	        {
				$bureau = $hart_user['PROVIDER'];
			}
	        
	        $birthdate = $this->input->post('birthdate'); 
	        // print_r($hart_user);
	       
	        $param = array(
			    "username"  => $hart_user['HART_USER'],
			    "password"  => $hart_user['HART_PASSWORD'],
			    "bureau"    => $bureau,
			    "firstname" => $first_name,
			    "lastname"  => $last_name,
			    "ssn"       => $social_security_no,
			    "address"   => $address1,
			    "city"      => $city,
			    "state"     => $state,
			    "zip"       => $zip,
			    "birthdate" => $birthdate
			);
			
	        $this->load->library('credit_check', $param);
	        $credit_result = $this->credit_check->creditCheckRequest();
	       
	        if(!$credit_result)
	        {
				$credit_score = 0;
	        	$credit_token = "";
	        	$credit_transid = "";
	        	$credit_score_arr = array(
	        	  	'credit_score' => $credit_score,
	                'credit_token' => $credit_token,
	                'credit_transid' => $credit_transid,
	        	);
	        	//$contact_arr['Credit Score'] = $credit_score;
	        	//$contact_arr['Credit Approved'] = 'true';
	        	//$contact_arr['Approval Reason'] = 'Score';

	        	$data = $this->credit_score_failure($credit_score_arr,$contact_arr, $deal_array, $user_details); 
	        	$data['message']  = "Alert: No Subject Found";        	
				return $data;
			}
			else
			{
				if(isset($credit_result['score']))
				{
					
					$credit_score = $credit_result["score"];
					$credit_token = $credit_result["token"];
					$credit_transid = $credit_result["transid"];
					$credit_score_arr = array(
					'credit_score' => $credit_score,
					'credit_token' => $credit_token,
					'credit_transid' => $credit_transid,
					);
					$contact_arr['Credit Score'] = $credit_score;
					$contact_arr['Credit Token'] = $credit_token;
					$contact_arr['Transaction Number'] = $credit_transid;
					
					if($credit_result["score"] >= 600)
					{
	
			        	$contact_arr['Credit Approved'] = 'true';
			        	$contact_arr['Approval Reason'] = 'Score';
			        	$data = $this->credit_score_failure($credit_score_arr,$contact_arr, $deal_array, $user_details);        	
						return $data;
						
					}
					elseif($credit_result["score"] <= 599 && $credit_result["score"] > 0) {
						
						$contact_arr['Credit Approved'] = 'true';
			        	$contact_arr['Approval Reason'] = 'Score';
			        	$data = $this->credit_score_failure($credit_score_arr,$contact_arr, $deal_array, $user_details);  
			        	$data['message']  = "Alert: Credit Declined Score: ".$credit_score;         	
						return $data;
					}
					else
					{
						$contact_arr['Credit Score'] = "";
						//$contact_arr['Credit Approved'] = 'true';
			        	//$contact_arr['Approval Reason'] = 'Score';
			        	$data = $this->credit_score_failure($credit_score_arr,$contact_arr, $deal_array, $user_details);  
			        	$data['message']  = "Alert: No Subject Found";         	
						return $data;
					}
				}
				else
				{
					$credit_score = 0;
		        	$credit_token = "";
		        	$credit_transid = "";
		        	$credit_score_arr = array(
		        	  	'credit_score' => $credit_score,
		                'credit_token' => $credit_token,
		                'credit_transid' => $credit_transid,
		        	);
		        	$contact_arr['Credit Score'] = "";
		        	//$contact_arr['Credit Approved'] = 'true';
		        	//$contact_arr['Approval Reason'] = 'Score';
		        	$data = $this->credit_score_failure($credit_score_arr,$contact_arr,$deal_array,$user_details);
		        	$data['message']  = "Alert: No Subject Found";         	
					return $data;
					
				}
			}
	    
	    	
    	
		}
		catch(Exception $e)
		{
			
			$data = array(
				'success' => false,
				'message' => $e->getMessage()
			);
		}

		return $data;
    	
    	
    	
    }
    
    function alarmNetworkIncluded($var){
	    if(strtolower($var) == "none"){
	        return false;
	    } else {
	        return true;
	    }
	}
	function insuranceExclusion($state){
	    global $contractDocument2;
	    if(strtolower($state) == 'pa'){
	        $contractDocument2
	            ->setInsurancePersonalInjuryAmount(1000000)
	            ->setInsurancePropertyDamageAmount(1000000);
	    }
	}
	function installationWorkDescription($state, $additionalNotes){
	    global $contractDocument2;
	    $state = strtolower($state);
	    if($state == 'pa' || $state == 'ca'){
	        $contractDocument2->setInstallationWorkDescription($additionalNotes);
	    }
	}
	function getDraftDay($date){
	    $draftDay = null;
	    $date_parse = date_parse($date);
	    $day = $date_parse['day'];
	    if($day > 28){
	        $draftDay = 28;
	    } else {
	        $draftDay = $day;
	    }
	    return $draftDay;
	}
    
    function getBillStartDate($date)
    {
	    $billStartDate = date_create($date);
	    date_add($billStartDate, date_interval_create_from_date_string('1 month'));
	    return date_format($billStartDate, 'Y-m-d');
	}
    function getCreditCardExpiration($expirationDate)
    {
        $date = array();
        if(preg_match('/^\d{2}\/\d{4}$/', $expirationDate)){
            $creditCardExpirationMonthyear = explode('/', $expirationDate);
        } 
        else 
        {
            return false;
        }
        $date['month'] = $creditCardExpirationMonthyear[0];
        $date['year'] = $creditCardExpirationMonthyear[1];
        return $date;
   }
    
    function getCreditCardType($creditCardNumber)
    {
	    if(is_numeric($creditCardNumber))
	    {

	        if(preg_match('/^4/', $creditCardNumber))
	        {
	            return "Visa";
	        } 
	        elseif (preg_match('/^5/', $creditCardNumber))
	        {
	            return "MasterCard";
	        } 
	        elseif(preg_match('/^6/', $creditCardNumber))
	        {
	            return "Discover";
	        } 
	        elseif(preg_match('/^3/', $creditCardNumber))
	        {
	            return "AmericanExpress";
	        } 
	        else 
	        {
	            return false;
	        }
	    } 
	    else 
	    {
	        return false;
	    }
	}
	
	
    
    function setPaymentType($payment_type, array $payment_info)
    {
	 
	    $payment_type = strtolower($payment_type);
	    if($payment_type == "ach"){
	        $paymentType = new \StructType\PaymentItem();
	        $paymentType
	            ->setBankRoutingNumber((string)$payment_info['bank-routing'])
	            ->setBankAccountNumber((string)$payment_info['bank-account'])
	            ->setPaymentType("BankAccount");
	            return $paymentType;
	    } elseif ($payment_type == "cc"){
	        $creditCardExpiration = $this->getCreditCardExpiration($payment_info['expiration-date']);
	        $paymentType = new \StructType\PaymentItem();
	        $paymentType
	            ->setCreditCardExpireMonth((string)$creditCardExpiration['month'])
	            ->setCreditCardExpireYear((string)$creditCardExpiration['year'])
	            ->setCreditCardNumber((string)$payment_info['cc-number'])
	            ->setCreditCardType($this->getCreditCardType($payment_info['cc-number']))
	            ->setPaymentType("CreditCard");
	            return $paymentType;
	    } elseif ($payment_type == "inv"){
	        $paymentType = new \StructType\PaymentItem();
	        $paymentType->setPaymentType('Invoice');
	        return $paymentType;
	    }
	}
	
}