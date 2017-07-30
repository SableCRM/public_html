<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model

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
		$this->load->model('zoho_model');
	}

	function get_user_by_id($user_id)
	{
		$q = $this->db->conn_id->prepare("SELECT 
											U.*,
											C.*,
											ZU.*
											FROM USR AS U 
											INNER JOIN COMPANY AS C ON U.COMPANY_ID = C.COMPANY_ID 
											INNER JOIN MONI_USER AS MU ON MU.COMPANY_ID = U.COMPANY_ID 
											INNER JOIN ZOHO_USER AS ZU ON ZU.COMPANY_ID = U.COMPANY_ID 
											WHERE U.USER_ID = :USER_ID");
		$q->bindParam(':USER_ID', $user_id, PDO::PARAM_STR);
		$ret = array();
		if ($q->execute())
		{
			$ret = $q->fetch(PDO::FETCH_ASSOC);
		}

		return $ret;
	}

	function get_zoho_user_by_company($company_id)
	{
		$q = $this->db->conn_id->prepare("SELECT * FROM ZOHO_USER WHERE COMPANY_ID = :COMPANY_ID");
		$q->bindParam(':COMPANY_ID', $company_id, PDO::PARAM_STR);
		$ret = array();
		if($q->execute()){
			$ret = $q->fetch(PDO::FETCH_ASSOC);
		}

		return $ret;
	}

	function get_econtract_by_email($email)
	{
		$q = $this->db->conn_id->prepare("SELECT 
											ES.*,
											ZU.ZOHO_AUTH_ID
											FROM E_CONTRACT_SENT AS ES 
											INNER JOIN ZOHO_USER AS ZU ON ZU.COMPANY_ID = ES.COMPANY_ID 
											WHERE ES.EMAIL = :EMAIL");
		$q->bindParam(':EMAIL', $email, PDO::PARAM_STR);
		$ret = array();
		if($q->execute()){
			$ret = $q->fetch(PDO::FETCH_ASSOC);
		}

		return $ret;
	}

	function eContractCallback($email)
	{
		// try
		// {
		$econtract = $this->get_econtract_by_email($email);
		if(!$econtract){
			throw new Exception("No e-Contract Envelope Id was found.");
		}

		$envelope_id = $econtract['ENVELOPE_ID'];
		$ZOHO_AUTH_ID = $econtract['ZOHO_AUTH_ID'];
		$deal_id = $econtract['JOB_ID'];

		$this->load->library('monitronics');
		//E-contract Api
		$options = array(
			\WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_URL      => 'https://mimasweb.monitronics.net/eContractAPI?wsdl',
			\WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_CLASSMAP => ClassMap::get(),
		);
		//Get Service Type
		$get = new \ServiceType\Get($options);
		//Get Struct Type
		$get_contract = new \StructType\GetContract($envelope_id);
		if($get->GetContract($get_contract) !== false){
			$contractResponse = $get->getResult();
			$pdf_bytes = $contractResponse->getGetContractResult()->getPDFBytes();

			$file_path = 'pdf/'.$envelope_id.'.pdf';
			file_put_contents($file_path, $pdf_bytes);

			$this->load->library('zohocrm');
			$client = new CristianPontes\ZohoCRMClient\ZohoCRMClient('Deals', $ZOHO_AUTH_ID);
			$record = $client->uploadFile()
				->id($deal_id)
				->uploadFromPath($file_path)
				->request();
			$zoho_time_format = '%Y-%m-%d %H:%M:%S';
			$update_deal_array = array(
				"Id"                    => $deal_id,
				"Stage"                 => "Sold",
				"Agreement Signed Date" => strftime($zoho_time_format),
				"Moni_Envelope_Id"      => $envelope_id,
				"E-Contract ID"         => $econtract['CONTRACT_ID']
			);

			$deal_records = $this->zoho_model->zohoUpdateDeal($update_deal_array, $ZOHO_AUTH_ID);
			redirect('http://www.sablecrm.com', 'refresh');

		} else{
			throw new Exception(print_r($get->getLastError()));
		}
		// }
		/*catch(Exception $e)
		 {
			 $data = array(
				 'success' => false,
				 'message' => $e->getMessage()
			 );
		 }
		 */

		return $data;
	}


	function ajaxsaveuserpersonal()
	{
		try
		{
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$email_address= $this->input->post('email_address');
			$mobile_number = $this->input->post('mobile_number');
			$work_number = $this->input->post('work_number');
			$user_id = $this->input->post('user_id');
			
			
			if (trim($first_name) == "" || trim($last_name) == "" || trim($email_address) == "" || trim($mobile_number) == "" || trim($work_number) == "")
			{
				throw new Exception('Invalid data');
			}

			$sql = "UPDATE USR SET
					USER_FIRST_NAME = :USER_FIRST_NAME, 
					USER_LAST_NAME = :USER_LAST_NAME, 
					USER_EMAIL = :USER_EMAIL,
					USER_MOBILE = :USER_MOBILE,
					USER_PHONE = :USER_PHONE
					WHERE USER_ID = :USER_ID";
			$stmt = $this->db->conn_id->prepare($sql);

			$stmt->bindParam(':USER_FIRST_NAME', $first_name, PDO::PARAM_STR);
			$stmt->bindParam(':USER_LAST_NAME', $last_name, PDO::PARAM_STR);
			$stmt->bindParam(':USER_EMAIL', $email_address, PDO::PARAM_STR);
			$stmt->bindParam(':USER_MOBILE', $mobile_number, PDO::PARAM_STR);
			$stmt->bindParam(':USER_PHONE', $work_number, PDO::PARAM_STR);
			$stmt->bindParam(':USER_ID', $user_id, PDO::PARAM_STR);
			if (!$stmt->execute()) {
						throw new Exception('Problem in update personal data <br/>' . implode(":", $stmt->errorInfo()));
					}

					$data = array(
						'success' => true,
						'message' => 'Updated Sucessfully'
					);
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
	
	function check_current_pwd_exist($password, $user_id)
	{
		$q = $this->db->conn_id->prepare("SELECT COUNT(*) FROM USR WHERE USER_PASSWORD = :USER_PASSWORD AND USER_ID = :USER_ID");
        $q->bindParam(':USER_PASSWORD', $password, PDO::PARAM_STR);
        $q->bindParam(':USER_ID', $user_id, PDO::PARAM_STR);
        
		 if ($q->execute())
         {

			if($q->fetchColumn() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		 }
	}
	
	function ajaxresetuserpwd()
	{
		try
		{
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password');
			$confirm_password = $this->input->post('confirm_password');
			$user_id = $this->input->post('user_id');
			
			if (trim($current_password) == "" || trim($new_password) == "" || trim($confirm_password) == "")
			{
				throw new Exception('Invalid data');
			}
			
			if(!$this->check_current_pwd_exist($current_password , $user_id))
			{
				throw new Exception('Invalid current password');
			}

			$sql = "UPDATE USR SET
					USER_PASSWORD = :USER_PASSWORD
					WHERE USER_ID = :USER_ID";
			$stmt = $this->db->conn_id->prepare($sql);

			$stmt->bindParam(':USER_PASSWORD', $new_password, PDO::PARAM_STR);
			$stmt->bindParam(':USER_ID', $user_id, PDO::PARAM_STR);
			
			if (!$stmt->execute()) {
						throw new Exception('Problem in reset pwd <br/>' . implode(":", $stmt->errorInfo()));
					}

					$data = array(
						'success' => true,
						'message' => 'Reset Sucessfully'
					);
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

	function ajaxlogin()
	{
		try
		{
			$user_name = $this->input->post('user_name');
			$user_pwd = $this->input->post('user_password');
			if (trim($user_name) == "" || trim($user_pwd) == "")
			{
				throw new Exception('Invalid data');
			}

			//$user_pwd = custom_encrypt($user_pwd);
			
			$sql = "SELECT 
					U.USER_FIRST_NAME, 
					U.USER_LAST_NAME, 
					U.USER_SECURITY_LEVEL_ID, 
					U.USER_STATUS, 
					U.USER_PHONE, 
					U.USER_MOBILE, 
					U.MONI_NET_USER, 
					U.MONI_NET_PASSWORD, 
              		U.USER_EMAIL,
              		U.USER_ADDRESS1,
              		U.USER_ADDRESS2,
              		U.USER_CITY,
              		U.USER_STATE,
              		U.USER_ZIP,
              		U.USER_COUNTRY,
              		U.USER_ID, 
              		U.USER_IMAGE_URL, 
              		U.COMPANY_ID, 
              		C.COMPANY_NAME, 
              		ZU.ZOHO_AUTH_ID, 
             		MU.MONI_USER, 
             		MU.MONI_PASSWORD
					FROM USR AS U 
					INNER JOIN COMPANY AS C ON U.COMPANY_ID = C.COMPANY_ID 
					INNER JOIN MONI_USER AS MU ON MU.COMPANY_ID = U.COMPANY_ID 
					INNER JOIN ZOHO_USER AS ZU ON ZU.COMPANY_ID = U.COMPANY_ID 
					WHERE U.USER_NAME = :USER_NAME 
					AND USER_PASSWORD = :USER_PASSWORD
					AND USER_SECURITY_LEVEL_ID IN (1,2,4,9) 
					AND U.USER_STATUS = 'false'";
			$stmt = $this->db->conn_id->prepare($sql);
			
			
			$stmt->bindParam(':USER_NAME', $user_name, PDO::PARAM_STR);
			$stmt->bindParam(':USER_PASSWORD', $user_pwd, PDO::PARAM_STR);
			if ($stmt->execute())
			{
				$user = $stmt->fetch(PDO::FETCH_ASSOC);
			}

			if (!$user)
			{
				throw new Exception('Invalid email or password');
			}

			$redirect_url = "";
			if($user['USER_SECURITY_LEVEL_ID'] == 1 || $user['USER_SECURITY_LEVEL_ID'] == 9)
			{
				$redirect_url = base_url().'user/portals';
			} else if($user['USER_SECURITY_LEVEL_ID'] == 2){
				$redirect_url = base_url().'user/salesportal';
			}
			
			
			$this->session->set_userdata('sable_user_account', $user);
			$data = array(
				'success' => true,
				'message' => 'Logged in Sucessfully',
				'redirect_url' => $redirect_url
			);
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
	
	 public function ajaxsendcontract()
    {
    	try
    	{
	    	$user = $this->session->userdata('sable_user_account');
     		$user_details =  $this->get_user_by_id($user['USER_ID']);
	    	
	    	$this->load->library('monitronics');
	    	
	    	$first_name = $this->input->post('first_name');
	    	$last_name  = $this->input->post('last_name');
	    	$address1 = $this->input->post('address1');
	    	$address2 = $this->input->post('address2');
	    	$city = $this->input->post('city');
	    	$state = $this->input->post('state');
	    	$state = strtoupper($state);
	    	$county = $this->input->post('county');
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
	    	$zip = $this->input->post('zip');
	    	
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
    	
	    	
	    	$package_detail = $this->input->post('package_detail');
	    	$level_of_service = $this->input->post('level_of_service');
	    	$communication_type = $this->input->post('communication_type');
	    	$length_of_contract = $this->input->post('length_of_contract');
	    	$panel_type = $this->input->post('panel_type');
	    	$door_window = $this->input->post('door_window');
	    	$motion = $this->input->post('motion');
	    	$smoke = $this->input->post('smoke');
	    	$glass_break = $this->input->post('glass_break');
	    	$alarm_other = $this->input->post('alarm_other');
	    	$thermostat = $this->input->post('thermostat');
	    	$lock = $this->input->post('lock');
	    	$light = $this->input->post('light');
	    	$indoor = $this->input->post('indoor');
	    	$outdoor = $this->input->post('outdoor');
	    	$sky_bell = $this->input->post('sky_bell');
	    	$existing_panel_type = $this->input->post('existing_panel_type');
	    	$wired_wireless = $this->input->post('wired_wireless');
	    	$rmr = $this->input->post('rmr');
	    	$install_charges = $this->input->post('install_charges');
	    	$activation_charge = $this->input->post('activation_charge');
	    	$first_install_date = $this->input->post('first_install_date');
	    	
	    	$first_install_date = date('Y-m-d',strtotime($first_install_date));
	    	
	    	$first_install_time = $this->input->post('first_install_time');
	    	$second_install_date = $this->input->post('second_install_date');
	    	$second_install_time = $this->input->post('second_install_time');
	    	$chkpaymenttype = $this->input->post('chkpaymenttype');
	    	$routing_number = $this->input->post('routing_number');
	    	$account_number = $this->input->post('account_number');
	    	$cc_number = $this->input->post('cc_number');
	    	$cc_exp_date = $this->input->post('cc_exp_date');
	    	$cc_cvv = $this->input->post('cc_cvv');
	    	$chkprimaryaddress = $this->input->post('chkprimaryaddress');
	    	$billing_first_name = $this->input->post('billing_first_name');
	    	$billing_last_name = $this->input->post('billing_last_name');
	    	$billing_address1 = $this->input->post('billing_address1');
	    	$billing_address2 = $this->input->post('billing_address2');
	    	$billing_city = $this->input->post('billing_city');
	    	$billing_state = $this->input->post('billing_state');
	    	$billing_state = strtoupper($billing_state);
	    	$billing_zip = $this->input->post('billing_zip');
	    	$billing_county = $this->input->post('billing_county');
	    	$billing_country = $this->input->post('billing_country');
	    	$additional_notes = $this->input->post('additional_notes');


		    if($chkpaymenttype == "CC"){
			    if(!$this->getCreditCardExpiration($cc_exp_date)){
				    throw new Exception('Credit Card Expiration Date Invalid Format');
			    }
		    }
	    	
	    	
	    	$takeover = $this->input->post('chktakeover');
	    	$twoway = $this->input->post('chktwoway');
	    	$adc_video = $this->input->post('chkvideo');
	    	
	    	
	    	$stage = $this->input->post('stage');
	    	$contact_id = $this->input->post('contact_id');
	    	//Zoho Create Deal
	    	$this->load->library('zohocrm');
     	    $deal_id = "";
			 if($this->session->userdata('sable_zoho_deal_id'))
     		{
				$deal_id = $this->session->userdata('sable_zoho_deal_id');
     		}
    	
    		//E-contract Api
	    	$options = array(
			    \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_URL => 'https://mimasweb.monitronics.net/eContractAPI?wsdl',
			    \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_CLASSMAP => ClassMap::get(),
			);
			
			$createService = new \ServiceType\Create($options);
			//Equipment
			$equipmentList =  new \ArrayType\ArrayOfEquipmentItem();
			$equipmentItem = new \StructType\EquipmentItem();
			$equipmentItem_points = "0";
			$equipmentItem_quantity = "1";
			$equipmentItem_price = $install_charges;
			$equipmentItem_total = $install_charges;
			$equipmentItem
			    ->setName($package_detail)
			    ->setPoints($equipmentItem_points)
			    ->setPrice($equipmentItem_price)
			    ->setQuantity($equipmentItem_quantity)
			    ->setTotal($equipmentItem_total);
			    
			$equipmentList->setEquipmentItem(array($equipmentItem));
			
			//Payment Type
			$paymentInitial = $this->setPaymentType(
								    $chkpaymenttype,
								    array(
								        'bank-routing' => $routing_number,
								        'bank-account' => $account_number,
								        'cc-number' => $cc_number,
								        'expiration-date' => $cc_exp_date
								    ));
		    
			$paymentMonthly = $this->setPaymentType(
			    $chkpaymenttype,
			    array(
			        'bank-routing' => $routing_number,
			        'bank-account' => $account_number,
			        'cc-number' => $cc_number,
			        'expiration-date' => $cc_exp_date
			    ));
			
			$bill_start_date = $this->getBillStartDate($first_install_date);
			$draft_day = $this->getDraftDay($first_install_date);
			$draft_day = (int) $draft_day;
			$networkIncluded = $this->alarmNetworkIncluded($communication_type);
			$deal_redirect_url = "http://sable-crm.com/test/contractcallback.php";
			$contractDocument2 = new \StructType\ContractDocument2(); 
			 
			$contractDocument2
		    ->setBillStartDate($bill_start_date)
		    ->setBillingAddress1($billing_address1)
		    ->setBillingAddress2($billing_address2)
		    ->setBillingCity($billing_city)
		    ->setBillingCounty($billing_county)
		    ->setBillingState($billing_state)
		    ->setBillingZip($billing_zip)
		    ->setCompanyName($company_name)
		    ->setCompanyType($company_type)
		    ->setCountryOfSale($billing_country)
		    ->setCustomerType($property_type)
		    ->setDealerPassword($user_details['MONI_NET_PASSWORD'])
		    ->setDealerRedirectionURL($deal_redirect_url)
		    ->setDealerUsername($user_details['MONI_NET_USER'])
		    ->setDraftDay($draft_day)
		    ->setEquipmentAlarmNetwork($communication_type)
		    ->setEquipmentAlarmNetworkIncluded($networkIncluded)
		    ->setEquipmentList($equipmentList) 
		    ->setEquipmentSubtotalAmount($install_charges)
		    ->setEquipmentTotalAmount($install_charges)
		    ->setInstallationFinish($first_install_date)
		    ->setInstallationStart($first_install_date)
		    ->setLanguage("English")
		    ->setMonthsPaidUpFront(1)
		    ->setPaymentCount((int)$length_of_contract)
		    ->setPaymentEffectiveDate(date( 'Y-m-d' ))
		    ->setPaymentExtendedServiceOption(true)
		    ->setPaymentInitial($paymentInitial)
		    ->setPaymentMonthly($paymentMonthly)
		    ->setPaymentMonthlyMonitoringRate($rmr)
		    ->setPaymentOneTimeActivationFee($activation_charge)
		    ->setPremiseAddress1($billing_address1)
		    ->setPremiseAddress2($billing_address2)
		    ->setPremiseCity($billing_city)
		    ->setPremiseCounty($billing_county)
		    ->setPremiseState($billing_state)
		    ->setPremiseZip($billing_zip)
		    ->setPrimaryEmail($email_address)
		    ->setPrimaryFirstName($billing_first_name)
		    ->setPrimaryLastName($billing_last_name)
		    ->setPrimaryPassword("TBD")
		    ->setPrimaryPhone($main_phone_no)
		    ->setSurveyCancellingService(true)
		    ->setSurveyConfirmContractLength(true)
		    ->setSurveyFamiliarizationPeriod(true)
		    ->setSurveyHomeowner(true)
		    ->setSurveyNewConstruction(false)
		    ->setSurveyUnderContract(false);
		    
		    
		    if(strtolower($property_type) == "commercial")
		    {
		        $PGrequired = true;
		        $PGTitle = $com_first_name.' '.$com_last_name;
		        $com_state = strtoupper($com_state);
		        $contractDocument2
			    ->setFullPriceRMR($rmr)
			    ->setPGHomeAdddress1($com_address1)
			    ->setPGHomeAdddress2($com_address2)
			    ->setPGHomeCity($com_city)
			    ->setPGHomeState($com_state)
			    ->setPGHomeZip($com_zip)
			    ->setPGTitle($PGTitle)
			    ->setPersonalGuaranteeRequired($PGrequired);
		       
		    } 
		    else 
		    {
		        $PGrequired = false;
		           $contractDocument2
			    ->setFullPriceRMR($rmr)
			    ->setPersonalGuaranteeRequired($PGrequired);
		    }
		    
		     if(strtolower($state) == 'pa'){
		        $contractDocument2
		            ->setInsurancePersonalInjuryAmount(1000000)
		            ->setInsurancePropertyDamageAmount(1000000);
		    }
		    if(strtolower($state) == 'pa' || strtolower($state) == 'ca'){
		        $contractDocument2->setInstallationWorkDescription($additional_notes);
		    }
		    
		    //print_r($contractDocument2);
		    //exit;
		    
			$createContract2 = new \StructType\CreateContract2(
			    $contractDocument2,
			    'Embedded',
			    'None'
			);
			  $deal_name = $first_name.' '.$last_name.' '.$city.' '.$state;
		    $contact_name = $first_name.' '.$last_name;
			  $zoho_time_format = '%Y-%m-%d %H:%M:%S';
		    if($billing_country == "US"){
			    $billing_country_full_name = "USA";
		    } else if($billing_country == "CA"){
			    $billing_country_full_name = "CANADA";
		    }
			  $deal_array = array(
				  'Deal Name'               => $deal_name,
				  /*'Contact Name' => $contact_name,
				  'CONTACTID' => $contact_id,*/
				  'Email'                   => $email_address,
				  'Contact Phone'           => $main_phone_no,
				  'Address'                 => $address1,
				  'City'                    => $city,
				  'State'                   => $state,
				  'Province'                => $state,
				  'Zip'                     => $zip,
				  'Postal Code'             => $zip,
				  'County'                  => $county,
				  'Country'                 => $country_full_name,
				  'Residential/Commercial'  => $property_type,
				  'Contract Term'           => $length_of_contract,
				  "Stage"                   => "Lead",
				  'Closing Date'            => strftime($zoho_time_format),
				  'Package Type'            => $package_detail,
				  'Monitoring Level'        => $level_of_service,
				  'Takeover'                => $takeover,
				  'Two Way Voice'           => $twoway,
				  'ADC Video'               => $adc_video,
				  'Panel Type'              => $panel_type,
				  'Door(s) / Window(s)'     => $door_window,
				  'Motion(s)'               => $motion,
				  'Smoke(s)' => $smoke,
				  'Glass Break(s)' => $glass_break,
				  'Other' => $alarm_other,
				  'Thermostat(s)' => $thermostat,
				  'Lock(s)' => $lock,
				  'Light(s)' => $light,
				  'Indoor Camera(s)' => $indoor,
				  'Outdoor Camera(s)'       => $outdoor,
				  'Sky Bell'                => $sky_bell,
				  'Existing Panel Type'     => $existing_panel_type,
				  'Wired / Wireless'        => $wired_wireless,
				  'RMR'                     => $rmr,
				  'Amount'                  => $install_charges,
				  'Activation Fee'          => $activation_charge,
				  'ACH Routing Number'      => $routing_number,
				  'ACH Account'             => $account_number,
				  'Card Number'             => $cc_number,
				  'Expiration Date'         => $cc_exp_date,
				  'CID'                     => $cc_cvv,
				  'Easy Pay Method'         => $chkpaymenttype,
				  '1st Choice Install Date' => $first_install_date,
				  '1st Choice Install Time' => $first_install_time,
				  '2nd Choice Install Date' => $second_install_date,
				  '2nd Choice Install Time' => $second_install_time,
				  'Billing First Name'      => $billing_first_name,
				  'Billing Last Name'       => $billing_last_name,
				  'Billing Address 1'       => $billing_address1,
				  'Billing Address 2'       => $billing_address2,
				  'Billing City'            => $billing_city,
				  'Billing State'           => $billing_state,
				  'Billing Zip'             => $billing_zip,
				  'Billing County'          => $billing_county,
				  'Billing Country'         => $billing_country_full_name
			            );
			            
			             if($property_type == 'Commercial')
			            {
							$deal_array['Business Type'] = $company_type;
							$deal_array['Account Name'] = $company_name;

				            $deal_array['PG First Name'] = $com_first_name;
				            $deal_array['PG Last Name'] = $com_last_name;
				            $deal_array['PG Address1'] = $com_address1;
				            $deal_array['PG Address 2'] = $com_address2;
				            $deal_array['PG City'] = $com_city;
				            $deal_array['PG State'] = $com_state;
				            $deal_array['PG Zip'] = $com_zip;
				            $deal_array['PG County'] = $com_county;
				            $deal_array['PG Country'] = $com_country;
						}

		    if($additional_notes != ""){
			    $deal_array['Alarm Notes'] = $additional_notes;
		    }
						
     	    			if($deal_id == "")
     	    			{
				            $deal_array['Sales Person_ID'] = $user_details['USER_ID'];
				            $deal_array['Deal Owner'] = $user_details['USER_ID'];
				            $deal_array['CONTACTID'] = $contact_id;
							 $deal_records = $this->zoho_model->zohoCreateDeal($deal_array, $user_details['ZOHO_AUTH_ID']);

			            }
				        else
				        {
							 $deal_array['Id'] = $deal_id;
							 $deal_records = $this->zoho_model->zohoUpdateDeal($deal_array, $user_details['ZOHO_AUTH_ID']);
						}
				         
						 foreach ($deal_records as $record) {
						 $deal_id = $record->id;
						 }
						 
			
			 if ($createService->CreateContract2($createContract2) !== false)
			 {
			        $contract2Response = $createService->getResult();
			       
			        if($contract2Response->getCreateContract2Result()->getResult())
			        {
						$contract_id = $contract2Response->getCreateContract2Result()->getResultData();
				        $envelope_id = $contract2Response->getCreateContract2Result()->getEnvelopeID();
				        $signing_url = $contract2Response->getCreateContract2Result()->getSigningURL()->getString_1();
				       
				        //Send Contract Link to Email
				        $subject = "Security System Agreement";
				       
				        if (strpos($_SERVER['HTTP_HOST'], 'localhost') === false)
						{
							$config['protocol'] = 'smtp';
					        $config['smtp_host'] = 'mail.sable-crm.com';
					        $config['smtp_port'] = '25';
					        $config['smtp_user'] = 'e-contract@sable-crm.com';
					        $config['smtp_from_name'] = 'e-Contract';
					        $config['smtp_pass'] = 'sable@2017';
					        $config['wordwrap'] = TRUE;
					        $config['newline'] = "\r\n";
					        $config['mailtype'] = 'html'; 
					        
					    	$email_data['signing_url'] = $signing_url[0];
					    	$msg = $this->load->view('email/template/econtract', $email_data, TRUE);
					    	
					    	$this->load->library('email');
					    	$this->email->set_newline("\r\n");  
				  			$this->email->initialize($config);
							$this->email->from($config['smtp_user'], $config['smtp_from_name']);
							$this->email->to($email_address);
							$this->email->subject($subject);
							$this->email->message( $msg );
							$this->email->send();
				        }
				        
			     	    
			     	    
			     	    

			     	    if($this->session->userdata('sable_zoho_contact_id'))
			     	    {
							$contact_id = $this->session->userdata('sable_zoho_contact_id');
						}
						
						
			     	   
			     	    
			     	    $deal_array = array(
			         		"Id" =>  $deal_id,
			                "E-Contract Signing Link" =>  $signing_url[0],
							"Agreement Sent Date" => strftime($zoho_time_format),
							"Moni_Envelope_Id" => $envelope_id,
							"E-Contract ID" => $contract_id,
							"Stage" => "Agreement Sent"
			            );
			            
				        $deal_records = $this->zoho_model->zohoUpdateDeal($deal_array, $user_details['ZOHO_AUTH_ID']);
				        
						 foreach ($deal_records as $record) {
						 $deal_id = $record->id;
						 }


				        $this->session->unset_userdata('sable_user_credit_score');
				        $this->session->unset_userdata('sable_zoho_deal_id');
				        $this->session->unset_userdata('sable_zoho_deal');
				        $this->session->unset_userdata('sable_zoho_contact');
				        $this->session->unset_userdata('sable_zoho_run_spouse');


				        //Replace Econtract Sent Table
				        //Replace
				        $sql = "REPLACE INTO E_CONTRACT_SENT SET
								EMAIL = :EMAIL,
								USER_ID = :USER_ID,
								COMPANY_ID = :COMPANY_ID,
								CONTRACT_ID = :CONTRACT_ID,
								ENVELOPE_ID = :ENVELOPE_ID,
								STATUS = :STATUS,
								JOB_ID = :JOB_ID
								";

				        $stmt = $this->db->conn_id->prepare($sql);
				        $stmt->bindParam(':EMAIL', $email_address, PDO::PARAM_STR);
				        $stmt->bindParam(':USER_ID', $user_details['USER_ID'], PDO::PARAM_STR);
				        $stmt->bindParam(':COMPANY_ID', $user_details['COMPANY_ID'], PDO::PARAM_STR);
				        $stmt->bindParam(':CONTRACT_ID', $contract_id, PDO::PARAM_STR);
				        $stmt->bindParam(':ENVELOPE_ID', $envelope_id, PDO::PARAM_STR);
				        $stmt->bindParam(':STATUS', $contract_status, PDO::PARAM_STR);
				        $stmt->bindParam(':JOB_ID', $deal_id, PDO::PARAM_STR);

				        if(!$stmt->execute()){
					        throw new Exception('Problem in insert contract sent <br/>'.implode(":", $stmt->errorInfo()));
							}
				         
				         
				        $redirect_url = base_url().'user/thankyou';
				    	$data = array(
								'success' => true,
								'message' => 'Thank you for your time. A team member will be contacting you shortly to confirm your installation',
								'redirect_url' => $redirect_url,
								'signing_url' => $signing_url
							);
					}
					else
					{
						$err_msg = $contract2Response->getCreateContract2Result()->getResultData();
						//$err_msg .= " ". var_dump($contract2Response->getCreateContract2Result()->getFaultFields()->getKeyValueOfstringstring());
						 throw new Exception($err_msg);
					}
			        
			        
			        
					
			        
		    } 
		    else 
		    {
		        throw new Exception($createService->getLastError());
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
