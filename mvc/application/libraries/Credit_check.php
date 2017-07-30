<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 	class Credit_check
  {
	protected $ci;
	private $creditUrl = "https://www.creditsystem.com/cgi-bin/pccreditxml";
    private $transId;
    private $token;
    private $score;
    private $fileHit;
    protected $creditResult = false;
    protected $ACCOUNT;
    protected $PASSWD;
    protected $PASS = 2;
    protected $TOKEN;
    protected $PROCESS = "PCCRREDIT";
    protected $BUREAU;
    protected $PRODUCT = "CREDIT";
    protected $FIRST_NAME;
    protected $LAST_NAME;
    protected $SSN;
    protected $ADDRESS;
    protected $CITY;
    protected $STATE;
    protected $ZIP;
    protected $DOB;
    
	public function __construct($params = array())
	{
	    $this->ci =& get_instance();
	    if(is_array($params) && (count($params) > 0)){
            $this->verifyBureau($params["bureau"]);
            $this->verifyPassword($params["password"]);
            $this->verifyUsername($params["username"]);
            $this->setSocialSecurity($params["ssn"]);
            $this->setFirstname($params["firstname"]);
            $this->setLastname($params["lastname"]);
            $this->setAddress($params["address"]);
            $this->setCity($params["city"]);
            $this->setState($params["state"]);
            $this->setZip($params["zip"]);
            $this->setDateOfBirth($params["birthdate"]);
            
        } else {
            throw new \InvalidArgumentException("Invalid datatype, expecting array of at least 3 parameter");
        }
	    
	}
	
	 private function verifyBureau($bureau){
        if(empty($bureau) || is_null($bureau)){
            throw new \InvalidArgumentException("Required field Credit Bureau cannot be empty.");
        } else {
            switch($bureau){
                case "TransUnion":
                    $this->BUREAU = "TU";
                    break;
	            case "TU":
		            $this->BUREAU = "TU";
		            break;
                case "Equifax":
                    $this->BUREAU = "EFX";
                    break;
	            case "EFX":
		            $this->BUREAU = "EFX";
		            break;
                case "Experian":
                    $this->BUREAU = "XPN";
                    break;
	            case "XPN":
		            $this->BUREAU = "XPN";
		            break;
            }
        }
    }
    protected function verifyPassword($password){
        if(empty($password) || is_null($password)){
            throw new \InvalidArgumentException("Required field Password cannot be empty.");
        } else {
            $this->PASSWD = $password;
        }
    }
    protected function verifyUsername($username){
        if(empty($username) || is_null($username)){
            throw new \InvalidArgumentException("Required field Username cannot be empty.");
        } else {
            $this->ACCOUNT = $username;
        }
    }
    private function setSocialSecurity($ssn){
        if(empty($ssn) || is_null($ssn)){
            unset($ssn);
        } else {
            $this->SSN = $ssn;
        }
    }
    private function setFirstname($firstname){
        if(empty($firstname) || is_null($firstname)){
            throw new \InvalidArgumentException("Required field First Name cannot be empty.");
        } else {
            $this->FIRST_NAME = $firstname;
        }
    }
    private function setLastname($lastname){
        if(empty($lastname) || is_null($lastname)){
            throw new \InvalidArgumentException("Required field Last Name cannot be empty.");
        } else {
            $this->LAST_NAME = $lastname;
        }
    }
    private function setAddress($address){
        if(empty($address) || is_null($address)){
            throw new \InvalidArgumentException("Required field Address cannot be empty.");
        } else {
            $this->ADDRESS = $address;
        }
    }
    private function setCity($city){
        if(empty($city) || is_null($city)){
            throw new \InvalidArgumentException("Required field City cannot be empty.");
        } else {
            $this->CITY = $city;
        }
    }
    private function setState($state){
        if(empty($state) || is_null($state)){
            throw new \InvalidArgumentException("Required field State cannot be empty.");
        } else {
            $this->STATE = $state;
        }
    }
    private function setZip($zip){
        if(empty($zip) || is_null($zip)){
            throw new \InvalidArgumentException("Required field Zip cannot be empty.");
        } else {
            $this->ZIP = $zip;
        }
    }
    private function setDateOfBirth($dateOfBirth){
        if(empty($dateOfBirth) || is_null($dateOfBirth)){
            unset($dateOfBirth);
        } else {
            $this->DOB = $dateOfBirth;
        }
    }
    protected function makeRequest($params){
 
        $ch = curl_init($this->creditUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
    protected function parseResult(){
        libxml_use_internal_errors(true);
        $credit = simplexml_load_string($this->creditResult);
       
        if (!$credit) {
         return false;
        }
        $this->transId = $credit->HX5_transaction_information->Transid;
        $this->token = $credit->HX5_transaction_information->Token;
        if($this->BUREAU == "EFX"){
            $var = 0;
            $this->score = new \stdClass();
            $this->score->$var = ((int)$credit->bureau_xml_data->EFX_Report->subject_segments->beacon->score);
            $this->fileHit = $credit->bureau_xml_data->EFX_Report->subject_segments->transaction_control->hit_designator_code;
        } elseif($this->BUREAU == "TU") {
            $this->score = $credit->bureau_xml_data->TU_Report->subject_segments->scoring_segments->scoring->score;
            $this->fileHit = $credit->bureau_xml_data->TU_Report->subject_segments->subject_header->file_hit;
        }
        //$indicator_flag = $credit->bureau_xml_data->TU_Report->subject_segments->scoring_segments->scoring->indicator_flag;
        //$fname = $credit->bureau_xml_data->TU_Report->subject_segments->name_information->fname;
        //$lname = $credit->bureau_xml_data->TU_Report->subject_segments->name_information->lname;
        //$address["house_number"] = $credit->bureau_xml_data->TU_Report->subject_segments->address_information->house_number;
        //$address["predirectional"] = $credit->bureau_xml_data->TU_Report->subject_segments->address_information->predirectional;
        //$address["street_name"] = $credit->bureau_xml_data->TU_Report->subject_segments->address_information->street_name;
        //$address["postdirectional"] = $credit->bureau_xml_data->TU_Report->subject_segments->address_information->postdirectional;
        //$address["street_type"] = $credit->bureau_xml_data->TU_Report->subject_segments->address_information->street_type;
        //$address["apt_unit_number"] = $credit->bureau_xml_data->TU_Report->subject_segments->address_information->apt_unit_number;
        //$city = $credit->bureau_xml_data->TU_Report->subject_segments->address_information->city;
        //$state = $credit->bureau_xml_data->TU_Report->subject_segments->address_information->state;
        //$zip = $credit->bureau_xml_data->TU_Report->subject_segments->address_information->zip;
        //$printed_doc = $credit->HTML_Reports->HTML_Report->CDATA;
        return
            array(
                "transid"  => $this->transId,
                "token"    => $this->token,
                "score"    => $this->score,
                "file_hit" => $this->fileHit,
            );
    }
    
    public function fullParse()
	{
		$credit = false;
		try
			{
				$credit_result = $this->parseResult();
				if(!$credit_result){
					return false;
				}
				$creditResult = json_encode($credit_result);
			$creditResult = json_decode($creditResult);
			$score = (array)$creditResult->score;
			$score = array_shift($score);
			if (is_null($score) || empty($score))
				{
				$score = 0;
				}

			$transid = (array)$creditResult->transid;
			$transid = array_shift($transid);
			$token = (array)$creditResult->token;
			$token = array_shift($token);
			$credit = array(
				"score" => $score,
				"transid" => $transid,
				"token" => $token
			);
			}

		catch(Exception $ex)
			{
			echo $ex->getMessage();
			}

		return $credit;
	}
  
  	public function creditCheckRequest(){
        $this->creditResult = $this->makeRequest(
            "ACCOUNT=".$this->ACCOUNT.
            "&PASSWD=".$this->PASSWD.
            "&PASS=".$this->PASS.
            "&PROCESS=".$this->PROCESS.
            "&BUREAU=".$this->BUREAU.
            "&PRODUCT=".$this->PRODUCT.
            "&NAME=".$this->FIRST_NAME." ".$this->LAST_NAME.
            "&SSN=".$this->SSN.
            "&ADDRESS=".$this->ADDRESS.
            "&CITY=".$this->CITY.
            "&STATE=".$this->STATE.
            "&ZIP=".$this->ZIP.
            "&DOB=".$this->DOB
        );
       // print_r($this->fullParse());
       // exit;
        return $this->fullParse();
    }
    public function getParsedResult(){
        return $this->parseResult();
    }
  }
