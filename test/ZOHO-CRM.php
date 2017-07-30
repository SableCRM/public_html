<?php

/**
 * Created by PhpStorm.
 * User: razaman2
 * Date: 4/11/2017
 * Time: 1:13 AM
 */

abstract class ZohoApi implements ZohoActions, ZohoResponse{
    /**
     * required
     * @var null
     */
    private $authToken = false;//"5b69810dc50fa3a7d24aeafdd2b738a3";

    /**
     * required
     * @var null
     */
    private $scope = "crmapi";

    private $format = ZohoFormatTypes::FORMAT_JSON;

    private $module = null;

    private $method = null;

    private $url = null;


    function __construct($module, $method, $url = null){
        self::setModule($module);
        self::setMethod($method);
        $this->setUrl($url);
    }

    public function setUrl($url){
        if(!is_null($url)){
            $this->url = $url;
        } else {
            $this->url = "https://crm.zoho.com/crm/private/$this->format/$this->module/$this->method";
        }
    }

//    public function setScope($scope){
//        $this->scope = $scope;
//    }

//    public function setAuthtoken($authToken = null){
//        if(empty($authToken) || is_null($authToken)){
//            unset($this->authToken);
//        } else {
//            $this->authToken = $authToken;
//        }
//    }

    protected function makeRequest($params = array()){
        if(is_array($params)){
            //if(isset($params['authtoken'])){
                $params['authtoken'] = $this->authToken;
            //}
            //if(isset($params['crmapi'])){
                $params['crmapi'] = $this->scope;
            //}
            $result = $this->connection($params);
            if(is_null($result)){
                return $this->getResponse($result);
            } else {
                return $result;
            }

        } else {
            throw new InvalidArgumentException('Invalid Parameter Type, Must Be An Associative Array');
        }
    }

    /**
     * @param $result
     * @return mixed
     */
    public function getResponse($result){
        $zoho = array();

        $result = json_decode($result)->response->result->$this->module->row->FL;

        for($i = 0; $i < sizeof($result); $i ++)
        {
            $zoho[$result[$i]->val] = $result[$i]->content;
        }
        return $zoho;
    }

    /**
     * @param $format
     * @return mixed
     */
    public function setReturnFormat($format){
        if(ZohoFormatTypes::valueIsValid($format)){
            $this->format = $format;
            return $format;
        } else {
            throw new InvalidArgumentException(sprintf("Invalid format type %s, selected. Plese use one of the following formats: %s",
                $format, implode(', ', ZohoFormatTypes::getValidValues())));
        }
    }

    /**
     * @param $module
     * @return mixed
     */
    public function setModule($module){
        if(ZohoApiModules::valueIsValid($module)){
            $this->module = $module;
            return $module;
        } else {
            throw new InvalidArgumentException(sprintf("Invalid module %s, selected for Zoho CRM. Please use one of the following modules: %s",
                $module, implode(', ', ZohoApiModules::getValidValues())));
        }
    }

    /**
     * @param $method
     * @return mixed
     */
    public function setMethod($method){
        if(ZohoApiMethods::valueIsValid($method)){
            $this->method = $method;
            return $method;
        } else {
            throw new InvalidArgumentException(sprintf("Invalid method %s, selected for Zoho CRM. Please use one of the following methods: %s",
                $method, implode(', ', ZohoApiMethods::getValidValues())));
        }
    }

    public function setAuthToken($authToken){
        $this->authToken = $authToken;
    }

    /**
     * @param $params
     * @return mixed
     */
    protected function connection(array $params){
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}




class FileUpload extends ZohoApi{
    //private $url = "https://crm.zoho.com/crm/private/json/Leads/uploadFile?authtoken=Auth Token&scope=crmapi&id=Record Id&content=File Input Stream";

    public function __construct($module){
        parent::__construct($module, ZohoApiMethods::METHOD_UPLOAD_FILE);
    }

    /**
     * The total file size should not exceed 20 MB.
     * Your program can request only up to 60 uploadFile calls per min. If API User requests more than 60 calls, system will block the API access for 5 min.
     * If the size exceeds 20 MB, you will receive the following error message: "File size should not exceed 20 MB". This limit does not apply to URLs attached via attachmentUrl.
     * The attached file will be available under the Attachments section in the Record Details Page.
     * Files can be attached to records in all modules except Reports, Dashboards and Forecasts.
     * In the case of the parameter attachmentUrl, content is not required as the attachment is from a URL.
     * Example for attachmentUrl: crm/private/xml/Leads/uploadFile?authtoken=*****&scope=crmapi&id=<entity_id>&attachmentUrl=<insert_ URL>
     * @param $recordId, id of the module record, where the file is to be attached.
     * @param $file, location of the file to be attached.
     * @return mixed, result from the server with the status of the request.
     */
    public function uploadFile($recordId, $file){
        $params = self::setContent($recordId, $file);
        return parent::makeRequest($params);
    }

    public function attachUrl($recordId, $fileUrl){
        $params = self::setAttachmentUrl($recordId, $fileUrl);
        return parent::makeRequest($params);
    }

    private function setContent($recordId, $file){
        return array(
            "id" => $recordId,
            "content" => curl_file_create($file)
        );
    }

    private function setAttachmentUrl($recordId, $fileUrl){
        return array(
            "id" => $recordId,
            "attachmentUrl" => $fileUrl
        );
    }
}




class GetModules extends ZohoApi{
    //private $url = "https://crm.zoho.com/crm/private/json/Info/getModules?authtoken=Auth Token&scope=crmapi";

    const VAR_API = "api";
    const VAR_ALL = null;

    public function __construct(){
        parent::__construct(ZohoApiModules::MODULES_INFO, ZohoApiMethods::METHOD_GET_MODULES);
    }

    public function getModules(string $type = null){
        $params = array();
        if(!is_null($type) && $type == self::VAR_API){
            $params["type"] = $type;
        } elseif($type == self::VAR_ALL) {
            unset($type);
        } else {
            throw new Error(sprintf('Invalid value for function parameter, Must be const value from %s.', __CLASS__));
        }
        $result = parent::makeRequest($params);
        if(is_null($result)){
            return $this->getResponse($result);
        } else {
            return $result;
        }
    }

    public function getResponse($result){
        $zoho = array();
        $result = json_decode($result)->response->result->row;
        for($i = 0; $i < sizeof($result); $i ++) {
            $zoho[] = $result[$i];
        }
        return $zoho;
    }
}




class GetFields extends ZohoApi{
    //private $url = "https://crm.zoho.com/crm/private/json/Tasks/getFields?authtoken=Auth Token&scope=crmapi";

    const GET_ALL_FIELDS = 0;
    const GET_SUMMARY_VIEW_FIELDS = 1;
    const GET_MANDATORY_FIELDS = 2;

    public function __construct($module = null){
        parent::__construct($module, ZohoApiMethods::METHOD_GET_FIELDS);
    }

    public function getFields($type = 0){
        $params = array();
        if($type == 1 || $type == 2){
            $params['type'] = $type;
        } elseif($type == 0){
            unset($type);
        } else {
            throw new Error(sprintf('Invalid value for function parameter, Must be const value from %s.', __CLASS__));
        }
        $result = parent::makeRequest($params);
        if(is_null($result)){
            return $this->getResponse($result);
        } else  {
            return $result;
        }
    }

    public function getResponse($result){
        $zoho = array();
        $result = json_decode($result)->Potentials;
        for($i = 0; $i < sizeof($result); $i ++){
            $zoho[] = $result[$i];
        }
        return $zoho;
    }

}




class GenerateAuthtoken extends ZohoApi{
    //private $url = "https://accounts.zoho.com/apiauthtoken/nb/create?SCOPE=ZohoCRM/crmapi&EMAIL_ID=[Username/EmailID]&PASSWORD=[Password]&DISPLAY_NAME=[ApplicationName]";

    public function __construct(){
        parent::__construct(null, null);
        parent::setUrl("https://accounts.zoho.com/apiauthtoken/nb/create");
    }

    public function generateAuthtoken($username = null, $password = null){
        $params = array();
        $error = array();
        if(!is_null($username)){
            $params['EMAIL_ID'] = $username;
        } else {
            $error[] = "username";
        }
        if(!is_null($password)){
            $params['PASSWORD'] = $password;
        } else {
            $error[] = "password";
        }
        if(isset($params['EMAIL_ID']) && isset($params['PASSWORD'])){
            $params['DISPLAY_NAME'] = "Sable-CRM+";
            $params['SCOPE'] = "ZohoCRM/crmapi";
            $result = parent::makeRequest($params);
            return $this->getResponse($result);
        } else {
            throw new Error(sprintf("Invalid %s entered, please try again later.", implode(' & ', $error)));
        }
    }

    public function getResponse($result){
        if(preg_match('/=(.{32})/', $result, $authToken)) {
            return $authToken[1];
        }else{
            return $result;
        }
    }

}




interface ZohoActions{
    function setReturnFormat($format);
    function setModule($module);
    function setMethod($method);
    function setUrl($url);
}

interface ZohoResponse{
    function getResponse($format);
}

interface ZohoEnumTypes{
    static function valueIsValid($value);
    static function getValidValues();
}

class ZohoFormatTypes implements ZohoEnumTypes{
    const FORMAT_XML = "xml";
    const FORMAT_JSON = "json";

    public static function valueIsValid($value){
        return ($value === null) || in_array($value, self::getValidValues(), true);
    }

    public static function getValidValues(){
        return array(
            self::FORMAT_XML,
            self::FORMAT_JSON
        );
    }
}

class ZohoApiMethods implements ZohoEnumTypes{
    const METHOD_GET_MY_RECORDS = 'getMyRecords';
    const METHOD_GET_RECORDS = 'getRecords';
    const METHOD_GET_RECORD_BY_ID = 'getRecordById';
    const METHOD_GET_DELETED_RECORD_IDS = 'getDeletedRecordIds';
    const METHOD_INSERT_RECORDS = 'insertRecords';
    const METHOD_UPDATE_RECORDS = 'updateRecords';
    const METHOD_GET_SEARCH_RECORDS_BY_PDC = 'getSearchRecordsByPDC';
    const METHOD_DELETE_RECORDS = 'deleteRecords';
    const METHOD_CONVERT_LEAD = 'convertLead';
    const METHOD_GET_RELATED_RECORDS = 'getRelatedRecords';
    const METHOD_GET_FIELDS = 'getFields';
    const METHOD_UPDATE_RELATED_RECORDS = 'updateRelatedRecords';
    const METHOD_GET_USERS = 'getUsers';
    const METHOD_UPLOAD_FILE = 'uploadFile';
    const METHOD_DELINK = 'delink';
    const METHOD_DOWNLOAD_FILE = 'downloadFile';
    const METHOD_DELETE_FILE = 'deleteFile';
    const METHOD_UPLOAD_PHOTO = 'uploadPhoto';
    const METHOD_DOWNLOAD_PHOTO = 'downloadPhoto';
    const METHOD_DELETE_PHOTO = 'deletePhoto';
    const METHOD_GET_MODULES = 'getModules';
    const METHOD_SEARCH_RECORDS = 'searchRecords';

    public static function getValidValues(){
        return array(
            self::METHOD_GET_MY_RECORDS,
            self::METHOD_GET_RECORDS,
            self::METHOD_GET_RECORD_BY_ID,
            self::METHOD_GET_DELETED_RECORD_IDS,
            self::METHOD_INSERT_RECORDS,
            self::METHOD_UPDATE_RECORDS,
            self::METHOD_GET_SEARCH_RECORDS_BY_PDC,
            self::METHOD_DELETE_RECORDS,
            self::METHOD_CONVERT_LEAD,
            self::METHOD_GET_RELATED_RECORDS,
            self::METHOD_GET_FIELDS,
            self::METHOD_UPDATE_RELATED_RECORDS,
            self::METHOD_GET_USERS,
            self::METHOD_UPLOAD_FILE,
            self::METHOD_DELINK,
            self::METHOD_DOWNLOAD_FILE,
            self::METHOD_DELETE_FILE,
            self::METHOD_UPLOAD_PHOTO,
            self::METHOD_DOWNLOAD_PHOTO,
            self::METHOD_DELETE_PHOTO,
            self::METHOD_GET_MODULES,
            self::METHOD_SEARCH_RECORDS
        );
    }

    public static function valueIsValid($value){
        return ($value === null) || in_array($value, self::getValidValues(), true);
    }
}

class ZohoApiModules implements ZohoEnumTypes{
    const MODULES_LEADS = "Leads";
    const MODULES_ACCOUNTS = "Accounts";
    const MODULES_CONTACTS = "Contacts";
    const MODULES_POTENTIALS = "Potentials";
    const MODULES_CAMPAIGNS = "Campaigns";
    const MODULES_CASES = "Cases";
    const MODULES_SOLUTIONS = "Solutions";
    const MODULES_PRODUCTS = "Products";
    const MODULES_PRICE_BOOKS = "Price Books";
    const MODULES_QUOTES = "Quotes";
    const MODULES_INVOICES = "Invoices";
    const MODULES_SALES_ORDERS = "Sales Orders";
    const MODULES_VENDORS = "Vendors";
    const MODULES_PURCHASE_ORDERS = "Purchase Orders";
    const MODULES_EVENTS = "Events";
    const MODULES_TASKS = "Tasks";
    const MODULES_CALLS = "Calls";
    const MODULES_INFO = "Info";

    public static function getValidValues(){
        return array(
            self::MODULES_LEADS,
            self::MODULES_ACCOUNTS,
            self::MODULES_CONTACTS,
            self::MODULES_POTENTIALS,
            self::MODULES_CAMPAIGNS,
            self::MODULES_CASES,
            self::MODULES_SOLUTIONS,
            self::MODULES_PRODUCTS,
            self::MODULES_PRICE_BOOKS,
            self::MODULES_QUOTES,
            self::MODULES_INVOICES,
            self::MODULES_SALES_ORDERS,
            self::MODULES_VENDORS,
            self::MODULES_PURCHASE_ORDERS,
            self::MODULES_EVENTS,
            self::MODULES_TASKS,
            self::MODULES_CALLS,
            self::MODULES_INFO
        );
    }

    public static function valueIsValid($value){
        return ($value === null) || in_array($value, self::getValidValues(), true);
    }
}

class ZohoApiErrors{
    const ERROR_4000 = "Please use Authtoken, instead of API ticket and APIkey";
    const ERROR_4500 = "Internal server error while processing this request";
    const ERROR_4501 = "API Key is inactive";
    const ERROR_4502 = "This module is not supported in your edition";
    const ERROR_4401 = "Mandatory field missing";
    const ERROR_4600 = "Incorrect API parameter or API parameter value. Also check the method name and/or spelling errors in the API url";
    const ERROR_4820 = "API call cannot be completed as you have exceeded the rate limit";
    const ERROR_4831 = "Missing parameters error";
    const ERROR_4832 = "Text value given for an Integer field";
    const ERROR_4834 = "Invalid ticket. Also check if ticket has expired";
    const ERROR_4835 = "XML parsing error";
    const ERROR_4890 = "Wrong API Key";
    const ERROR_4487 = "No permission to convert lead";
    const ERROR_4001 = "No API permission";
    const ERROR_401 = "No module permission";
    const ERROR_401_1 = "No permission to create a record";
    const ERROR_401_2 = "No permission to edit a record";
    const ERROR_401_3 = "No permission to delete a record";
    const ERROR_4101 = "Zoho CRM disabled";
    const ERROR_4102 = "No CRM account";
    const ERROR_4103 = "No record available with the specified record ID";
    const ERROR_4422 = "No records available in the module";
    const ERROR_4420 = "Wrong value for search parameter and/or search parameter value";
    const ERROR_4421 = "Number of API calls exceeded";
    const ERROR_4423 = "Exceeded record search limit";
    const ERROR_4807 = "Exceeded file size limit";
    const ERROR_4424 = "Invalid File Type";
    const ERROR_4809 = "Exceeded storage space limit";

    public static function getErrorMessage(string $errorNumber = null){
        $errors = self::errorMessages();
        if(!array_key_exists($errorNumber, $errors)){
            throw new ErrorException("Invalid error number, $errorNumber not found");
        } else {
            return $errors[$errorNumber];
        }
    }

    public static function errorMessages(){
        return array(
            "4000" => self::ERROR_4000,
            "4500" => self::ERROR_4500,
            "4501" => self::ERROR_4501,
            "4502" => self::ERROR_4502,
            "4401" => self::ERROR_4401,
            "4600" => self::ERROR_4600,
            "4820" => self::ERROR_4820,
            "4831" => self::ERROR_4831,
            "4832" => self::ERROR_4832,
            "4834" => self::ERROR_4834,
            "4835" => self::ERROR_4835,
            "4890" => self::ERROR_4890,
            "4487" => self::ERROR_4487,
            "4001" => self::ERROR_4001,
            "401" => self::ERROR_401,
            "401.1" => self::ERROR_401_1,
            "401.2" => self::ERROR_401_2,
            "401.3" => self::ERROR_401_3,
            "4101" => self::ERROR_4101,
            "4102" => self::ERROR_4102,
            "4103" => self::ERROR_4103,
            "4422" => self::ERROR_4422,
            "4420" => self::ERROR_4420,
            "4421" => self::ERROR_4421,
            "4423" => self::ERROR_4423,
            "4807" => self::ERROR_4807,
            "4424" => self::ERROR_4424,
            "4809" => self::ERROR_4809
        );
    }
}


//echo '<h1>API TESTS</h1>';
//
//echo '<h4>Get Fields Type = empty</h4><pre>';
//$getFields = new GetFields(ZohoApiModules::MODULES_POTENTIALS);
//print_r($getFields->getFields(GetFields::GET_MANDATORY_FIELDS));
//echo '</pre>';
//
//echo '<h4>Get Fields Type = int 0</h4>';
//print_r($getFields->getFields(0));
//
//echo '<h4>Get Fields Type = int 1</h4>';
//print_r($getFields->getFields(1));
//
//echo '<h4>Get Fields Type = int 2</h4>';
//print_r($getFields->getFields(2));
//
////echo '<h4>Get Fields Type = int 3</h4>';
////print_r($getFields->getFields(3));
//
//echo '<h4>Get Fields Type = string 2</h4>';
//print_r($getFields->getFields(2));

//echo '<h1>API TESTS</h1>';
//
//echo '<h4>Get Modules Type = empty</h4><pre>';
//$getModules = new GetModules();
//print_r($getModules->getModules(GetModules::VAR_API));
//echo '</pre>';

//echo '<h4>Get Modules Type = null</h4>';
//print_r($getModules->getModules(GetModules::VAR_ALL));
//
//echo '<h4>Get Modules Type = api</h4>';
//print_r($getModules->getModules(GetModules::VAR_API));
//
//echo '<h4>Get Modules Invalid Type = jets</h4>';
//print_r($getModules->getModules("jets"));

//$authToken = new GenerateAuthtoken();
//print_r($authToken->generateAuthtoken("ainsley.clarke@guardme.com", "Afc5446000"));