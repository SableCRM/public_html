<?php
/**
 * Created by PhpStorm.
 * User: razam
 * Date: 3/17/2017
 * Time: 9:54 AM
 */

//$wsdl = 'https://senti.monitronics.net/eContractAPISIT?wsdl';
//$eContractObj = new SoapClient($wsdl, array('trace' => true));
//
//echo '<pre>';
//
//print_r($eContractObj->__getFunctions());
//
//class WSSESecurityHeader extends SoapHeader {
//
//    public function __construct($username, $password)
//    {
//        $wsseNamespace = 'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd';
//        $security = new SoapVar(
//            array(new SoapVar(
//                array(
//                    new SoapVar($username, XSD_STRING, null, null, 'Username', $wsseNamespace),
//                    new SoapVar($password, XSD_STRING, null, null, 'Password', $wsseNamespace)
//                ),
//                SOAP_ENC_OBJECT,
//                null,
//                null,
//                'UsernameToken',
//                $wsseNamespace
//            )),
//            SOAP_ENC_OBJECT
//        );
//        parent::SoapHeader($wsseNamespace, 'Security', $security, true);
//    }
//
//}
//
//$vars = array(
//    new SoapVar(
//    array(
//        new SoapVar('Monitest', SOAP_LITERAL, null, 'http://tempuri.org/', 'Login'),
//        new SoapVar('password', SOAP_LITERAL, null, 'http://tempuri.org/', 'Password')
//    ),
//    SOAP_ENC_OBJECT,
//    null,
//    'http://tempuri.org/',
//    'AuthenticateUser2'
//));
//
//
////new SoapVar("mystring", XSD_STRING, "string", "http://www.w3.org/2001/XMLSchema");
////$vars = array(
////    new SoapVar(
////        array(
////            new SoapVar('Monitest', XSD_STRING, 'string', 'http://www.w3.org/2001/XMLSchema'),
////            new SoapVar('password', XSD_STRING, 'string', 'http://www.w3.org/2001/XMLSchema')
////        ),
////            SOAP_ENCODED,
////            null,
////            'http://www.w3.org/2001/XMLSchema',
////            'AuthenticateUser2')
////);
//
//try{
//    $eContractObj->__setSoapHeaders(new WSSESecurityHeader('eContractAPIDealer', 'test7*9'));
//
//    print_r($eContractObj->AuthenticateUser2($vars));
//
//    print_r($eContractObj->__getLastRequest());
//}catch (SoapFault $ex){
//    print_r($eContractObj->__getLastRequest());
//    echo 'something went wrong. '.$ex->getMessage();
//};

/*
$getApiVersion = '<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" SOAP-ENV:encodingStyle ="http://www.w3.org/2001/12/soap-encoding"
                   xmlns:ns1="http://tempuri.org/"
                   xmlns:ns2="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
    <SOAP-ENV:Header>
        <ns2:Security SOAP-ENV:mustUnderstand="1">
            <ns2:UsernameToken>
                <ns2:Username>eContractAPIDealer</ns2:Username>
                <ns2:Password>test7*9</ns2:Password>
            </ns2:UsernameToken>
        </ns2:Security>
    </SOAP-ENV:Header>
    <SOAP-ENV:Body>
        <ns1:AuthenticateUser>
            <ns1:Login>guardme</ns1:Login>
            <ns1:Password>31Stamas!</ns1:Password>
        </ns1:AuthenticateUser>
    </SOAP-ENV:Body>
</SOAP-ENV:Envelope>';
*/

class eContract2{

    // START ENUMS //

    /**
     * datatype, enum
     * Description, List of all possible states for US and Canada.
     */
    public $StateProvinceEnum = [
        'AL' => 'Alabama',
        'AK' => 'Alaska',
        'AZ' => 'Arizona',
        'AR' => 'Arkansas',
        'CA' => 'California',
        'CO' => 'Colorado',
        'CT' => 'Connecticut',
        'DE' => 'Delaware',
        'FL' => 'Florida',
        'GA' => 'Georgia',
        'HI' => 'Hawaii',
        'ID' => 'Idaho',
        'IL' => 'Illinois',
        'IN' => 'Indiana',
        'IA' => 'Iowa',
        'KS' => 'Kansas',
        'KY' => 'Kentucky',
        'LA' => 'Louisiana',
        'ME' => 'Maine',
        'MD' => 'Maryland',
        'MA' => 'Massachusetts',
        'MI' => 'Michigan',
        'MN' => 'Minnesota',
        'MS' => 'Mississippi',
        'MO' => 'Missouri',
        'MT' => 'Montana',
        'NE' => 'Nebraska',
        'NV' => 'Nevada',
        'NH' => 'New Hampshire',
        'NJ' => 'New Jersey',
        'NM' => 'New Mexico',
        'NY' => 'New York',
        'NC' => 'North Carolina',
        'ND' => 'North Dakota',
        'OH' => 'Ohio',
        'OK' => 'Oklahoma',
        'OR' => 'Oregon',
        'PA' => 'Pennsylvania',
        'RI' => 'Rhode Island',
        'SC' => 'South Carolina',
        'SD' => 'South Dakota',
        'TN' => 'Tennessee',
        'TX' => 'Texas',
        'UT' => 'Utah',
        'VT' => 'Vermont',
        'VA' => 'Virginia',
        'WA' => 'Washington',
        'WV' => 'West Virginia',
        'WI' => 'Wisconsin',
        'WY' => 'Wyoming',
        'AS' => 'American Samoa',
        'DC' => 'District of Columbia',
        'FM' => 'Federated States of Micronesia',
        'GU' => 'Guam',
        'MH' => 'Marshall Islands',
        'MP' => 'Northern Mariana Islands',
        'PW' => 'Palau',
        'PR' => 'Puerto Rico',
        'VI' => 'Virgin Islands',
        'AB' => 'Alberta',
        'BC' => 'British Columbia',
        'MB' => 'Manitoba',
        'NB' => 'New Brunswick',
        'NL' => 'Newfoundland and Labrador',
        'NS' => 'Nova Scotia',
        'NT' => 'Northwest Territories',
        'NU' => 'Nunavut',
        'ON' => 'Ontario',
        'PE' => 'Prince Edward Island',
        'QC' => 'Quebec',
        'SK' => 'Saskatchewan',
        'YT' => 'Yukon'
    ];

    /**
     * datatype, enum
     * Description, The CompanyTypes enumerator is to be used when the CustomerType = Commercial.
     */
    public $CompanyTypes = [
        'Corporation' => 'When the business is any type of corporation',
        'Proprietorship' => 'When the business is a single person',
        'LLC' => 'When the business is a limited liability corporation',
        'Partnership' => 'When the business is a partnership'
    ];

    /**
     * datatype, enum
     * Description, List of valid countries for eContract.
     */
    public $CountryEnum = [
        'US' => 'United States',
        'CA' => 'Canada (NOTE: Only English contracts are valid in Canada)'
    ];

    /**
     * datatype, enum
     * Description, The customer types will be used to determine some of the business rules based on Residential versus Commercial/Business.
     */
    public $CustomerTypeEnum = [
        'Commercial' => 'If the customer is not a home the contract should be tagged as a Business customer',
        'Residential' => 'If the customer is monitoring a home this value should be used for the CustomerType'
    ];

    /**
     * datatype, enum
     * Description, The alarm network enumerator is used to define the available alarm "networks" that a customer can link to during the installation.
     * Only one alarm network can be selected per installation.
     */
    public $AlarmNetworkEnum = [
        'AlarmDotcom' => 'Alarm.com value',
        'AlarmNet' => 'Alarmnet value',
        'Tellular' => 'Tellular value',
        'DSC' => 'Digital Security Controls value',
        'icontrol' => 'icontrol value',
        'None' => 'When no alarm network is selected then this value should be selected.  It indicates that the user selected something and that something is None.'
    ];

    /**
     * datatype, enum
     * Description, Language the contract will be created.
     */
    public $ContactLanguageEnum = [
        'English' => 'Will use the English language',
        'Spanish' => 'Will use the Spanish language.  NOTE: Spanish contracts are not valid in Canada.'
    ];

    /**
     * datatype, enum
     * Description, The CreditCardTypeEnum will be used to select the type of credit card being used for payment when the PaymentType is CreditCard.
     */
    public $CreditCardTypeEnum = [
        'Visa' => 'Credit card type of Visa (begins with 4)',
        'MasterCard' => 'Credit card type of MasterCard (begins with 5)',
        'Discover' => 'Credit card type of Discover (begins with 6)',
        'AmericanExpress' => 'Credit card type of American Express (begins with 3)'
    ];

    /**
     * datatype, enum
     * Description, The PaymentTypeEnum determines the type of payment that is being used both for the initial and monthly payments.
     */
    public $PaymentTypeEnum = [
        'Invoice' => 'This would be used for a monthly invoice payment',
        'BankAccount' => 'This would be used for a checking or savings account',
        'CreditCard' => 'This would be used when a credit card will be used for payment.'
    ];

    /**
     * datatype, enum
     * Description, The PhoneTypeEnum describes the types of phone numbers that can be specified in the ContactList.
     */
    public $PhoneTypeEnum = [
        'Home' => 'Home phone number',
        'Cell' => 'Cell or mobile phone number',
        'Work' => 'Work or business phone number'
    ];

    /**
     * datatype, enum
     * Description, Signing type to implement within the signing room.
     */
    public $SigningType = [
        'Embedded' => 'Embedded Signing (Within the browser)',
        'Remote' => 'Remote Signing (via email)',
        'None' => 'No Signing'
    ];

    // END ENUMS //

    /**
     * datatype, dateTime
     * example, 2018-03-01T00:00:00.000-05:00
     * notes, (REQ) The InstallationStartDate for (non PA/WV states) or InstallationEndDate for all others + the number of Months Paid Up Front + the Promotion Period.
     */
    private $BillStartDate;

    /**
     * datatype, string
     * notes, (REQ) The first line of the street address to be used for billing purposes.
     */
    private $BillingAddress1;

    /**
     * datatype, string
     * notes, The second line of the street address to be used for billing purposes.
     */
    private $BillingAddress2;

    /**
     * datatype, string
     * notes, (REQ) The city to be used for billing purposes.
     */
    private $BillingCity;

    /**
     * datatype, string
     * notes, The county to be used for billing purposes.  This is required for US contracts, but not Canadian contracts.
     */
    private $BillingCounty;

    /**
     * datatype, uses $StateProvinceEnum
     * notes, (REQ) The state to be used for billing purposes.
     */
    private $BillingState;

    /**
     * datatype, string
     * notes, (REQ) The zip code or postal code to be used for billing purposes.
     */
    private $BillingZip;

    /**
     * datatype, string
     * notes, (REQ, when the CustomerType = Commerical) Name of the company to use on the contract.
     */
    private $CompanyName;

    /**
     * datatype, uses $CompanyTypes
     * notes, (REQ when the CustomerType = Commerical) Needs to be set to one of the enumerated values of CompanyTypes.
     */
    private $CompanyType;

    /**
     * datatype, uses the AddContact() function
     * notes, An array of the ContactItem type.
     */
    private $ContactList = [];

    /**
     * datatype, int
     * notes, (READONLY) This will be supplied upon the creation of a contract.
     */
    private $ContractID;

    /**
     * datatype, uses $CountryEnum
     * notes, (REQ) The country in which the contract is being sold.
     */
    private $CountryOfSale;

    /**
     * datatype, uses $CustomerTypeEnum
     * notes, (REQ) The customer types will be used to determine some of the business rules based on Residential versus Commercial/Business.
     */
    private $CustomerType;

    /**
     * datatype, string
     * notes, (REQ) The password of the dealer or sales rep creating the contract.
     */
    private $DealerPassword;

    /**
     * datatype, string
     * notes, This is the State ID for the dealer that is logged in and using the eContract system.  It is not required.
     */
    private $DealerPersonID;

    /**
     * datatype, string
     * notes, This option allows for specification as to where the embedded signing returns.  It be specified as an URL like http://monitronics.com/.
     * Additional parameters will be added to the end of the URL in order to assist in showing the right messages as returned from the signing room.
     * The events that are possible are: OnSigningComplete = "?eventname=signcomplete" OnViewingComplete = "?eventname=viewcomplete"
     * OnCancel = "?eventname=cancel" OnDecline = "?eventname=decline" OnSessionTimeout = "?eventname=timeout" OnTTLExpired = "?eventname=ttlexpired"
     * OnIdCheckFailed = "?eventname=idcheck" OnAccessCodeFailed = "?eventname=accesscode"; OnException = "?eventname=exception"
     * These are DocuSign events.  Some additional information can be found about these events at this link: http://bit.ly/DSEventCodes
     */
    private $DealerRedirectionURL;

    /**
     * datatype, string
     * notes, (REQ) The username of the dealer (or sales rep) that is creating the contract.
     */
    private $DealerUsername;

    /**
     * datatype, int
     * notes, (REQ) Day of the month that the monthly payment will be made.  Valid values for this field are 1 through 28.
     */
    private $DraftDay;

    /**
     * datatype, string
     * notes, (READONLY) Returns the DocuSign envelopeID just created.
     */
    private $EnvelopeID;

    /**
     * datatype, uses $AlarmNetworkEnum
     * notes, (REQ, when EquipmentAlarmNetworkIncluded = true) The alarm network to be created with this account.  It is possible to specify None here.
     */
    private $EquipmentAlarmNetwork;

    /**
     * datatype, boolean
     * notes, (REQ) Whether an alarm network is needed.
     */
    private $EquipmentAlarmNetworkIncluded;

    /**
     * datatype, uses AddEquipment() function
     * notes, List of equipment to be installed and monitored.
     */
    private $EquipmentList = [];

    /**
     * datatype, decimal
     * notes, Any additional amount to be charged to the customer would be supplied here.
     */
    private $EquipmentOtherAmount;

    /**
     * datatype, decimal
     * notes, Any additional amount for permits needed during the installation.
     */
    private $EquipmentPermitAmount;

    /**
     * datatype, decimal
     * notes, Subtotal of the equipment cost (this will likely be a calculated field).
     */
    private $EquipmentSubtotalAmount;

    /**
     * datatype, decimal
     * notes, The amount of tax to charge for the equipment for the installation.
     */
    private $EquipmentTaxAmount;

    /**
     * datatype, decimal
     * notes, The total amount to charge for the equipment for the installation (includes all other subtotals and totals).
     */
    private $EquipmentTotalAmount;

    /**
     * datatype, boolean
     * notes, When this is true it will include the GuardAddendum document in the contract envelope.
     */
    private $GuardAddendumRequired;

    /**
     * datatype, dateTime
     * example, 2017-05-03T00:00:00.000-05:00
     * notes, (not currently used).
     */
    private $InstallationDate;

    /**
     * datatype, dateTime
     * example, 2017-05-03T00:00:00.000-05:00
     * notes, (REQ for PA and CA) Finish date of the installation.
     */
    private $InstallationFinish;

    /**
     * datatype, dateTime
     * example, 2017-05-03T00:00:00.000-05:00
     * notes, (REQ) Start date for the installation for PA and CA.  For all other states it defines when the billing can be started (effectively the installation date).
     */
    private $InstallationStart;

    /**
     * datatype, string
     * notes, (REQ for PA and CA) Description of the work to be performed during installation.
     */
    private $InstallationWorkDescription;

    /**
     * datatype, decimal
     * notes, (REQ for PA) The amount of the personal injury coverage being supplied.
     */
    private $InsurancePersonalInjuryAmount;

    /**
     * datatype, decimal
     * notes, (REQ for PA) The amount of the property damage coverage being supplied.
     */
    private $InsurancePropertyDamageAmount;

    /**
     * datatype, use ContractLanguageEnum
     * notes, (REQ) Contract language.
     */
    private $Language;

    /**
     * datatype, int
     * notes, (REQ) The number of months that are being paid up front on the monitoring agreement.
     * For ADP dealers the value can be from 0 to 6.  For MOD dealers it has to be zero.
     */
    private $MonthsPaidUpFront;

    /**
     * datatype, int
     * notes, (REQ, see rules at end of description) The number of payments for the contract (typically 36 or 60).
     * When state = NY or WV this field must be 36.  For all other states it must be 36 or 60.
     */
    private $PaymentCount;

    /**
     * datatype, dateTime
     * example, 2017-05-03T00:00:00.000-05:00
     * notes, (READONLY) When the payments should start.  This is set to be the date of the contract creation.
     */
    private $PaymentEffectiveDate;

    /**
     * datatype, boolean
     * notes, (REQ) If the customer wants the Extended Service Option.
     */
    private $PaymentExtendedServiceOption;

    /**
     * datatype, use $PaymentItem
     * notes, (REQ, see rules on PaymentItem type) The payment information for the initial payment.
     */
    private $PaymentInitial;

    /**
     * datatype, use $PaymentItem
     * notes, (REQ, see rules on PaymentItem type) The payment information for the monthly payment.
     */
    private $PaymentMonthly;

    /**
     * datatype, decimal
     * notes, (REQ) The amount to charge for the monthly monitoring.
     */
    private $PaymentMonthlyMonitoringRate;

    /**
     * datatype, decimal
     * notes, (REQ) The amount to charge for activation.  If no charge, must be zero.
     */
    private $PaymentOneTimeActivationFee;

    /**
     * datatype, string
     * notes, (REQ) Street address of the premise to be monitored and installed.
     */
    private $PremiseAddress1;

    /**
     * datatype, string
     * notes, Second line of street address of the premise to be monitored and installed.
     */
    private $PremiseAddress2;

    /**
     * datatype, string
     * notes, (REQ) City of the premise to be monitored and installed.
     */
    private $PremiseCity;

    /**
     * datatype, string
     * notes, (REQ if the country = US) County of the premise to be monitored and installed.
     */
    private $PremiseCounty;

    /**
     * datatype, string
     * notes, Used for the Guard Addendum (typically this is required for US contracts).
     */
    private $PremiseGateCode;

    /**
     * datatype, use $StateProvinceEnum
     * notes, (REQ) State of the premise to be monitored and installed.
     */
    private $PremiseState;

    /**
     * datatype, string
     * notes, (REQ) Zip of the premise to be monitored and installed.
     */
    private $PremiseZip;

    /**
     * datatype, string
     * notes, Birthdate of the primary signer.
     */
    private $PrimaryBirthDate;

    /**
     * datatype, string
     * notes, (REQ) Email address of the primary signer.
     */
    private $PrimaryEmail;

    /**
     * datatype, string
     * notes, (REQ) First name of the primary signer.
     */
    private $PrimaryFirstName;

    /**
     * datatype, string
     * notes, (REQ) Last name of the primary signer.
     */
    private $PrimaryLastName;

    /**
     * datatype, string
     * notes, (REQ) Password to be used for the alarm system.
     */
    private $PrimaryPassword;

    /**
     * datatype, string
     * notes, (REQ) Phone for the primary signer.
     */
    private $PrimaryPhone;

    /**
     * datatype, string
     * notes, Tax ID / SSN for the primary signer.
     */
    private $PrimaryTaxIDNumber;

    /**
     * datatype, int
     * notes, (REQ) The number of months which are being offered as a promotional period.
     * Valid values are 0, 1, 2, 3.  This number combined with MonthsPaidUpFront cannot be greater than 6.
     */
    private $PromotionPeriod;

    /**
     * datatype, string
     * notes, Birthdate of the secondary signer.
     */
    private $SecondaryBirthDate;

    /**
     * datatype, string
     * notes, (REQ if there is a secondary signer) Email address of the secondary signer.
     */
    private $SecondaryEmail;

    /**
     * datatype, string
     * notes, (REQ if there is a secondary signer)First name of the secondary signer.
     */
    private $SecondaryFirstName;

    /**
     * datatype, string
     * notes, (REQ if there is a secondary signer)The last name of the secondary signer.
     */
    private $SecondaryLastName;

    /**
     * datatype, string
     * notes, The phone number for the secondary signer.
     */
    private $SecondaryPhone;

    /**
     * datatype, string
     * The Tax ID/SSN for the secondary signer.
     */
    private $SecondaryTaxIDNumber;

    /**
     * datatype, boolean
     * notes, (REQ) Answer to the question about cancelling existing service during the creation of contract.
     */
    private $SurveyCancellingService;

    /**
     * datatype, boolean
     * notes, (REQ) Answer to the question confirming knowledge of the length of the contract.
     */
    private $SurveyConfirmContractLength;

    /**
     * datatype, boolean
     * notes, (REQ but only in Canada) Answer to the question about the desire to have a familiarization period.
     */
    private $SurveyFamiliarizationPeriod;

    /**
     * datatype, boolean
     * notes, (REQ) Answer to question about the primary signer being the homeowner.
     */
    private $SurveyHomeowner;

    /**
     * datatype, boolean
     * notes, (REQ) Answer to question about the installation being in a newly constructed home.
     */
    private $SurveyNewConstruction;

    /**
     * datatype, boolean
     * notes, (REQ) Answer to the question about being under and existing contract.
     */
    private $SurveyUnderContract;

    /**
     * datatype, decimal
     * notes, The amount deducted from the full RMR in dollars.
     * Even if the discount type is Percent this value will be the dollars deducted from the full RMR amount.
     */
    private $DiscountAmount;

    /**
     * datatype, string
     * notes, The member ID or promo code for the program (for example if the AARP discount is selected this would be the AARP member number).
     */
    private $DiscountMemberID;

    /**
     * datatype, string
     * notes, Name of the discount as retrieved from the AuthenticateUser2 method.
     */
    private $DiscountName;

    /**
     * datatype, int
     * notes, Discount Program ID of the discount as retrieved from the AuthenticateUser2 method.
     */
    private $DiscountProgramID;

    /**
     * datatype, decimal
     * notes, RMR price before any discounts were taken.
     */
    private $FullPriceRMR;



    function __construct($data = array()){
//        $this->_time_created = time();
//
//        // Ensure thet the Address.inc can be populated.
//        if(!is_array($data)){
//            trigger_error('Unable to construct address with a ' . get_class($name));
//        }
//
//        // If there is at least one value, populate the Address.inc with it.
//        if(count($data) > 0){
//            foreach($data as $name => $value){
//                // Special case for protected properties.
//                if(in_array($name, array(
//                    'time_created',
//                    'time_updated',
//                ))){
//                    $name = '_' . $name;
//                }
//                $this->$name = $value;
//            }
//        }
    }

    /**
     * Description, This ContactItem defines the fields needed for each contact assigned to the monitoring account.
     * Remarks, The current system supports up to 6 contacts even though the data model technically allows for an unlimited number of contacts.
     * @param array $contact
     * @return string
     */
    public function AddContact(array $contact){
        /**
         * empty array to store and return errors.
         */
        $error = [];

        /**
         * null variable to represent error or a contact object.
         */
        $output = null;

        /**
         * datatype, string
         * notes, Phone number extension if necessary.
         */
        $Ext = null;

        /**
         * datatype, string
         * notes, Full name of the contact to be added.
         */
        $Name = null;

        /**
         * datatype, string
         * notes, Password this contact will be using.
         */
        $Password = null;

        /**
         * datatype, string
         * notes, Phone number that this contact can be reached at.
         */
        $Phone = null;

        /**
         * datatype, use $PhoneTypeEnum
         * notes, Type of phone number (ex. Work, Mobile, etc).
         */
        $PhoneType = null;

        /**
         * datatype, string
         * notes, Defines the order the contacts appear on the agreement.  1 being the first.
         */
        $UserNumber = null;

        /**
         * changes the case of the array keys to lowercase. this enables a case insensitive comparison.
         */
        $contact = array_change_key_case($contact);

        if(array_key_exists('ext', $contact)){
            $Ext = $contact['ext'];
        } else {
            $error[] = 'required field Ext cannot be null';
        }

        if(array_key_exists('name', $contact)){
            $Name = $contact['name'];
        } else {
            $error[] = 'required field Name cannot be null';
        }

        if(array_key_exists('password', $contact)){
            $Password = $contact['password'];
        } else {
            $error[] = 'required field Password cannot be null';
        }

        if(array_key_exists('phone', $contact)){
            $Phone = $contact['phone'];
        } else {
            $error[] = 'required field Phone cannot be null';
        }

        if(array_key_exists('phonetype', $contact)){
            $phonetype = strtolower($contact['phonetype']);
            if(array_key_exists($phonetype, array_change_key_case($this->PhoneTypeEnum))){
                $PhoneType = ucfirst($phonetype);
            } else {
                $error[] = 'invalid phonetype selected';
            }
        } else {
            $error[] = 'required field PhoneType cannot be null';
        }

        if(array_key_exists('usernumber', $contact)){
            $UserNumber = $contact['usernumber'];
        } else {
            $error[] = 'required field UserNumber cannot be null';
        }

        if(count($error) > 0){
            $output = $error;
        } else {
            $output = "
            <ser:ContactItem>
                  
                <ser:Ext>$Ext</ser:Ext>
                  
                <ser:Name>$Name</ser:Name>
                  
                <ser:Password>$Password</ser:Password>
                  
                <ser:Phone>$Phone</ser:Phone>
                  
                <ser:PhoneType>$PhoneType</ser:PhoneType>
                  
                <ser:UserNumber>$UserNumber</ser:UserNumber>
                  
            </ser:ContactItem>";
        }

        return $output;
    }

    /**
     * Description, The equipment item is used to define the equipment sold and installed for the customer.
     * @param array $device
     * @return string
     */
    public function AddEquipment(array $device){
        /**
         * empty array to store and return errors.
         */
        $error = [];

        /**
         * null variable to represent error or a contact object.
         */
        $output = null;

        /**
         * datatype, string
         * notes, Name of the equipment to be installed.
         */
        $Name = null;

        /**
         * datatype, int
         * notes, Number of points for that piece of equipment.
         */
        $Points = null;

        /**
         * datatype, decimal
         * notes, Price of the equipment to be charged to the customer.
         */
        $Price = null;

        /**
         * datatype, int
         * notes, Number of the items to be installed for the customer.
         */
        $Quantity = null;

        /**
         * datatype, decimal
         * notes, Total cost of the equipment line (this field will typically be calculated automatically and returned within the completed object).
         */
        $Total = null;

        /**
         * changes the case of the array keys to lowercase. this enables a case insensitive comparison.
         */
        $device = array_change_key_case($device);

        if(array_key_exists('name', $device)){
            $Name = $device['name'];
        } else {
            $error[] = 'required field Name cannot be null';
        }

        if(array_key_exists('points', $device)){
            $points = intval($device['points']);
            if(is_numeric($points) && is_int($points) && ($points == $device['points'])){
                $Points = $points;
            } else {
                $error[] = 'invalid datatype for Points, must be integer';
            }
        } else {
            $error[] = 'required field Points cannot be null';
        }

        if(array_key_exists('price', $device)){
            $price = $device['price'];
            if(is_numeric($price) && is_float(floatval($price)) && (floatval($price) == $device['price'])){
                $Price = $price;
            } else {
                $error[] = 'invalid datatype for Price, must be decimal';
            }
        } else {
            $error[] = 'required field Price cannot be null';
        }

        if(array_key_exists('quantity', $device)){
            $quantity = intval($device['quantity']);
            if(is_numeric($quantity) && is_int($quantity) && ($quantity == $device['quantity'])){
                $Quantity = $quantity;
            } else {
                $error[] = 'invalid datatype for quantity, must be integer';
            }
        } else {
            $error[] = 'required field Quantity cannot be null';
        }

        if($Quantity > 0 && $Price > 0){
            $Total = $Quantity * $Price;
        }

//        if(array_key_exists('total', $device)){
//            $total = $device['total'];
//            if(is_float($total)){
//                $Total = $Quantity * $Price;
//            } else {
//                $error[] = 'invalid datatype for total, must be decimal';
//            }
//        } else {
//            $error[] = 'required field Total cannot be null';
//        }

        if(count($error) > 0){
            $output = $error;
        } else {
            $output = "
            <ser:EquipmentItem>
                  
                <ser:Name>$Name</ser:Name>
                  
                <ser:Points>$Points</ser:Points>
                  
                <ser:Price>$Price</ser:Price>
                  
                <ser:Quantity>$Quantity</ser:Quantity>
                  
                <ser:Total>$Total</ser:Total>
                  
            </ser:EquipmentItem>";
        }

        return $output;
    }

    /**
     * Description, This object defines the necessary fields for capturing payment information.
     * It encapsulates both banking information and credit card information within the same object.
     * Depending on the value of the PaymentType field will determine which fields are required.
     * Remarks, If PaymentType is CreditCard then all the credit card fields are required.
     * If PaymentType is BankAccount then all the bank fields are required.
     * @param array $payment
     * @return string
     */
    public function PaymentItem(array $payment){
        /**
         * empty array to store and return errors.
         */
        $error = [];

        /**
         * null variable to represent error or a contact object.
         */
        $output = null;

        /**
         * datatype, string
         * notes, (REQ if PaymentType = BankAccount) The account number of the checking or savings account to be used for payment.
         */
        $BankAccountNumber = '';

        /**
         * datatype, string
         * notes, (REQ if PaymentType = BankAccount) The ABA rouing number of the bank to be used for payment.
         * This is used in conjuction with BankAccountNumber to process the payment.  This field must be at least 9 characters long.
         */
        $BankRoutingNumber = '';

        /**
         * datatype, string
         * notes, Reserved for future use.
         */
        $CanadaRoutingBranch = null;

        /**
         * datatype, string
         * notes, Reserved for future use.
         */
        $CanadaRoutingInstitution = null;

        /**
         * datatype, int
         * notes, (REQ if PaymentType = CreditCard) Credit Card expiration month in numerical form (1 = Jan, 2 = Feb, etc).
         */
        $CreditCardExpireMonth = '';

        /**
         * datatype, int
         * notes, (REQ if PaymentType = CreditCard)Credit Card expirtion year in 4 digit representation (2016, 2017, etc).
         */
        $CreditCardExpireYear = '';

        /**
         * datatype, string
         * notes, (REQ if PaymentType = CreditCard)15 or 16 digit credit card number depending on the CreditCardType field.
         */
        $CreditCardNumber = '';

        /**
         * datatype, use $CreditCardTypeEnum
         * notes, (REQ if PaymentType = CreditCard)Credit card type to be used for payment (Visa, Mastercard,
         * etc... see CreditCardTypeEnum for valid values).
         */
        $CreditCardType = '';

        /**
         * datatype, use $PaymentTypeEnum
         * notes, (REQ) Payment method to be used.  See PaymentTypeEnum for valid options.
         */
        $PaymentType = '';

        /**
         * changes the case of the array keys to lowercase. this enables a case insensitive comparison.
         */
        $payment = array_change_key_case($payment);

        if(array_key_exists('paymenttype', $payment)){
            $paymenttype = strtolower($payment['paymenttype']);
            if(array_key_exists($paymenttype, array_change_key_case($this->PaymentTypeEnum))){
                $PaymentType = ucfirst($paymenttype);
            } else {
                $error[] = 'invalid phonetype selected';
            }
        } else {
            $error[] = 'required field PaymentType cannot be null';
        }

        $Payment = '
        <ser:PaymentInitial>
               
            <ser:BankAccountNumber>' . $BankAccountNumber . '</ser:BankAccountNumber>
               
            <ser:BankRoutingNumber>' . $BankRoutingNumber . '</ser:BankRoutingNumber>
               
            <ser:CanadaRoutingBranch>' . $CanadaRoutingBranch . '</ser:CanadaRoutingBranch>
               
            <ser:CanadaRoutingInstitution>' . $CanadaRoutingInstitution . '</ser:CanadaRoutingInstitution>
            
            <ser:CreditCardExpireMonth>' . $CreditCardExpireMonth . '</ser:CreditCardExpireMonth>
            
            <ser:CreditCardExpireYear>' . $CreditCardExpireYear . '</ser:CreditCardExpireYear>
               
            <ser:CreditCardNumber xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
            
            <ser:CreditCardNumber>' . $CreditCardNumber . '</ser:CreditCardNumber>
            
            <ser:CreditCardType>' . $CreditCardType . '</ser:CreditCardType>
               
            <ser:PaymentType>' . $PaymentType . '</ser:PaymentType>
               
        </ser:PaymentInitial>';

        return $Payment;
    }

    /**
     * Description, helper function to check if $val is numeric in the first stage
     * then checks if its an int, or float.
     * returns true if $val is numeric && int && its value didnt change during the conversion
     * or if $val is numeric && float && its value didnt change during the conversion.
     * @param $val, numeric or string representation of a numeric value
     * @return bool
     */
    private function NumericConversion($val){
        $status = false;
        if(is_numeric($val)){
            if(intval($val) == $val){
                echo 'this is an int';
            } elseif (floatval($val) == $val) {
                echo 'this is a float';
            } else {
                echo 'this is not an int or float';
            }
        } else {
            $status = false;
        }
        return $status;
    }
}

$CreateContract2 = '<soapenv:Envelope
xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/"
xmlns:tem="http://tempuri.org/"
xmlns:ser="http://schemas.datacontract.org/2004/07/Service.eContract"
xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">

   <soapenv:Header>
      <wsse:Security soapenv:mustUnderstand="1">
         <wsse:UsernameToken>
            <wsse:Username>eContractAPIDealer</wsse:Username>
            <wsse:Password>test7*9</wsse:Password>
         </wsse:UsernameToken>
      </wsse:Security>
   </soapenv:Header>

   <soapenv:Body>
   
      <tem:CreateContract2>
         
         <tem:ContractData>
            
            <ser:BillStartDate>2018-03-01T00:00:00.000-05:00</ser:BillStartDate>
            
            <ser:BillingAddress1>602 East 24th Street</ser:BillingAddress1>
            
            <ser:BillingAddress2>First Flr</ser:BillingAddress2>
            
            <ser:BillingCity>Paterson</ser:BillingCity>
            
            <ser:BillingCounty>Passaic</ser:BillingCounty>
            
            <ser:BillingState>NJ</ser:BillingState>
            
            <ser:BillingZip>07514</ser:BillingZip>
            
            <ser:CompanyName xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
            
            <ser:CompanyType>Corporation</ser:CompanyType>
            
            <ser:ContactList>
            
               <!--Zero or more repetitions:-->
               <ser:ContactItem>
                  
                  <ser:Ext>123</ser:Ext>
                  
                  <ser:Name>My Friend</ser:Name>
                  
                  <ser:Password>shhhh</ser:Password>
                  
                  <ser:Phone>(573) 999-1722</ser:Phone>
                  
                  <ser:PhoneType>Home</ser:PhoneType>
                  
                  <ser:UserNumber>1234567890</ser:UserNumber>
                  
               </ser:ContactItem>
               
            </ser:ContactList>
            
            <ser:CountryOfSale>US</ser:CountryOfSale>
            
            <ser:CustomerType>Residential</ser:CustomerType>
            
            <ser:DealerPassword>password</ser:DealerPassword>
            
            <ser:DealerPersonID xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
            
            <ser:DealerRedirectionURL>http://sable-crm.com/test/contractcallback.php</ser:DealerRedirectionURL>
            
            <ser:DealerUsername>Monitest</ser:DealerUsername>
            
            <ser:DraftDay>21</ser:DraftDay>
            
            <ser:EnvelopeID xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
            
            <ser:EquipmentAlarmNetwork>AlarmDotcom</ser:EquipmentAlarmNetwork>
            
            <ser:EquipmentAlarmNetworkIncluded>true</ser:EquipmentAlarmNetworkIncluded>
            
            <ser:EquipmentList>
            
               <!--Zero or more repetitions:-->
               <ser:EquipmentItem>
                  
                  <ser:Name>Door Sensors</ser:Name>
                  
                  <ser:Points>5</ser:Points>
                  
                  <ser:Price>30.00</ser:Price>
                  
                  <ser:Quantity>5</ser:Quantity><ser:Total>150.00</ser:Total>
                  
               </ser:EquipmentItem>
               
               <ser:EquipmentItem>
                  
                  <ser:Name>Window Sensors</ser:Name>
                  
                  <ser:Points>5</ser:Points>
                  
                  <ser:Price>30.00</ser:Price>
                  
                  <ser:Quantity>2</ser:Quantity><ser:Total>60.00</ser:Total>
                  
               </ser:EquipmentItem>
               
               <ser:EquipmentItem>
                  
                  <ser:Name>Motion Detector</ser:Name>
                  
                  <ser:Points>5</ser:Points>
                  
                  <ser:Price>60.00</ser:Price>
                  
                  <ser:Quantity>3</ser:Quantity><ser:Total>180.00</ser:Total>
                  
               </ser:EquipmentItem>
               
            </ser:EquipmentList>
            
            <ser:EquipmentOtherAmount>5.00</ser:EquipmentOtherAmount>
            
            <ser:EquipmentPermitAmount>5.00</ser:EquipmentPermitAmount>
            
            <ser:EquipmentSubtotalAmount>5.00</ser:EquipmentSubtotalAmount>
            
            <ser:EquipmentTaxAmount>5.00</ser:EquipmentTaxAmount>
            
            <ser:EquipmentTotalAmount>5.00</ser:EquipmentTotalAmount>
            
            <ser:GuardAddendumRequired>false</ser:GuardAddendumRequired>
            
            <ser:InstallationDate>2017-05-03T00:00:00.000-05:00</ser:InstallationDate>
            
            <ser:InstallationFinish>2017-05-03T00:00:00.000-05:00</ser:InstallationFinish>
            
            <ser:InstallationStart>2017-05-03T00:00:00.000-05:00</ser:InstallationStart>
            
            <ser:InstallationWorkDescription>This is needed for CA</ser:InstallationWorkDescription>
            
            <ser:InsurancePersonalInjuryAmount>60000</ser:InsurancePersonalInjuryAmount>
            
            <ser:InsurancePropertyDamageAmount>60000</ser:InsurancePropertyDamageAmount>
            
            <ser:Language>English</ser:Language>
            
            <ser:MonthsPaidUpFront>1</ser:MonthsPaidUpFront>
            
            <ser:PaymentCount>42</ser:PaymentCount>
            
            <ser:PaymentEffectiveDate>2017-05-30T00:00:00.000-05:00</ser:PaymentEffectiveDate>
            
            <ser:PaymentExtendedServiceOption>true</ser:PaymentExtendedServiceOption>
            
            <ser:PaymentInitial>
               
               <ser:BankAccountNumber>102001017</ser:BankAccountNumber>
               
               <ser:BankRoutingNumber>102001017</ser:BankRoutingNumber>
               
               <ser:CanadaRoutingBranch>55555</ser:CanadaRoutingBranch>
               
               <ser:CanadaRoutingInstitution>333</ser:CanadaRoutingInstitution>
               
               <ser:CreditCardNumber xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
               
               <ser:PaymentType>BankAccount</ser:PaymentType>
               
            </ser:PaymentInitial>
            
            <ser:PaymentMonthly>
               
               <ser:BankAccountNumber>102001017</ser:BankAccountNumber>
               
               <ser:BankRoutingNumber>102001017</ser:BankRoutingNumber>
               
               <ser:CanadaRoutingBranch>55555</ser:CanadaRoutingBranch>
               
               <ser:CanadaRoutingInstitution>333</ser:CanadaRoutingInstitution>
               
               <ser:CreditCardNumber xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
                              
               <ser:PaymentType>BankAccount</ser:PaymentType>
               
            </ser:PaymentMonthly>
            
            <ser:PaymentMonthlyMonitoringRate>25.00</ser:PaymentMonthlyMonitoringRate>
            
            <ser:PaymentOneTimeActivationFee>25.00</ser:PaymentOneTimeActivationFee>
            
            <ser:PremiseAddress1>953 Main Street</ser:PremiseAddress1>
            
            <ser:PremiseAddress2>Apt 25</ser:PremiseAddress2>
            
            <ser:PremiseCity>Hackensack</ser:PremiseCity>
            
            <ser:PremiseCounty>Bergen</ser:PremiseCounty>
            
            <ser:PremiseGateCode xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
            
            <ser:PremiseState>NJ</ser:PremiseState>
            
            <ser:PremiseZip>07601</ser:PremiseZip>
            
            <ser:PrimaryBirthDate>07/14/1983</ser:PrimaryBirthDate>
            
            <ser:PrimaryEmail>ainsley.clarke@guardme.com</ser:PrimaryEmail>
            
            <ser:PrimaryFirstName>SABLE</ser:PrimaryFirstName>
            
            <ser:PrimaryLastName>CRM</ser:PrimaryLastName>
            
            <ser:PrimaryPassword>Music</ser:PrimaryPassword>
            
            <ser:PrimaryPhone>(732) 425-2814</ser:PrimaryPhone>
            
            <ser:PrimaryTaxIDNumber xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
            
            <ser:PromotionPeriod>0</ser:PromotionPeriod>
            
            <ser:SecondaryBirthDate xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
            
            <ser:SecondaryEmail xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
            
            <ser:SecondaryFirstName xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
            
            <ser:SecondaryLastName xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
            
            <ser:SecondaryPhone xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
            
            <ser:SecondaryTaxIDNumber xsi:nil="true" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
            
            <ser:SurveyCancellingService>true</ser:SurveyCancellingService>
            
            <ser:SurveyConfirmContractLength>true</ser:SurveyConfirmContractLength>
            
            <ser:SurveyFamiliarizationPeriod>true</ser:SurveyFamiliarizationPeriod>
            
            <ser:SurveyHomeowner>true</ser:SurveyHomeowner>
            
            <ser:SurveyNewConstruction>true</ser:SurveyNewConstruction>
            
            <ser:SurveyUnderContract>true</ser:SurveyUnderContract>
            
            <ser:DiscountAmount>0</ser:DiscountAmount>
            
            <ser:DiscountMemberID>0</ser:DiscountMemberID>
            
            <ser:DiscountProgramID>0</ser:DiscountProgramID>
            
            <ser:FullPriceRMR>25.00</ser:FullPriceRMR>
            
            <ser:PGHomeAdddress1>PG home Address 1</ser:PGHomeAdddress1>
            
            <ser:PGHomeAdddress2>PG Home Address 2</ser:PGHomeAdddress2>
            
            <ser:PGHomeCity>PG Home City</ser:PGHomeCity>
            
            <ser:PGHomeState>CO</ser:PGHomeState>
            
            <ser:PGHomeZip>80121</ser:PGHomeZip>
            
            <ser:PGTitle>Great Testing</ser:PGTitle>
            
            <ser:PersonalGuaranteeRequired>false</ser:PersonalGuaranteeRequired>
            
            <ser:DiscountProgramName>?</ser:DiscountProgramName>
            
         </tem:ContractData>
         
         <tem:PrimarySigningType>Embedded</tem:PrimarySigningType>
         
         <tem:SecondarySigningType>None</tem:SecondarySigningType>
         
      </tem:CreateContract2>
      
   </soapenv:Body>
   
</soapenv:Envelope>';

//$econtractXml1 = '<soapenv:Envelope
//xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/"
//xmlns:tem="http://tempuri.org/"
//xmlns:ser="http://schemas.datacontract.org/2004/07/Service.eContract"
//xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
//
//<soapenv:Header>
//   <wsse:Security soapenv:mustUnderstand="1">
//      <wsse:UsernameToken>
//        <wsse:Username>eContractAPIDealer</wsse:Username>
//          <wsse:Password>test7*9</wsse:Password>
//        </wsse:UsernameToken>
//      </wsse:Security>
//   </soapenv:Header>
//
//   <soapenv:Body>
//      <tem:AuthenticateUser2>
//        <tem:Login>Monitest</tem:Login>
//        <tem:Password>password</tem:Password>
//      </tem:AuthenticateUser2>
//   </soapenv:Body>
//</soapenv:Envelope>';

//require_once '../../Integration/apiendpoints.php';
//require_once '../../Integration/post.php';
//
//echo '<pre>';
//
//$post = new Post($endpoint['e-contract'], $actionendpoint['e-contract']);
//
//$result = $post->Post('CreateContract2', $CreateContract2);
//print_r($result);
//
//echo '</pre>';

$eContractTest = new eContract2(array());

$AddContact = $eContractTest->AddContact(
    array(
        'Ext' => '5446',
        'name' => 'Ainsley Clarke',
        'password' => 'Butch',
        'phone' => '(732) 425-2814',
        'phonetype' => 'CELL',
        'usernumber' => '1'
    )
);


$AddEquipment = $eContractTest->AddEquipment(
    array(
        'name' => 'Wireless Contacts',
        'points' => 'king',
        'price' => '10',
        'quantity' => 2
    )
);

echo '<pre>';

print_r($AddContact);
print_r($AddEquipment);

echo '</pre>';