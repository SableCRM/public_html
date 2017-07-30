<?php

	require_once '../Integration/DATABASE_CONNECTION.php';

	$query = 'CALL SUPER_ADD_ADMIN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,@ERROR_CODE)';
	$ERROR_CODE = 'SELECT MODULE_ERRO_MSG FROM ERROR_LOG WHERE MODULE_ERROR_CODE = @ERROR_CODE LIMIT 1';
	$params = array(
		'sablecrmpro', '$@b!eCRMpr0', '2144870000000372023', '2148988000000107007', 'twolsey@libertysecurity.ca', null, 'Taylor', 'Wolsey', null,
		'images/tech-icon.png', null, null, null, 'salt', 'Liberty9797!', null, '7324252814', '5640 104th Street NW', null, null, 'Edmonton', 'AB',
		'T6H 2K2', 'CA', 'twolsey@libertysecurity.ca', '7808625078', null, null, null, null, null, null, null, null, null
	);

	$result = Connect(array(array($query, $params), array($ERROR_CODE, null)), null, 'array');

	if(!isset($result->status)){
		print_r($result[0]->MODULE_ERRO_MSG);
	} else{
		print_r($result);
	}


	//const USER_NAME = '';
	//const PASSWORD = '';
	//const COMPANY_ID = '';
	//const USER_ID = '2148988000000107007';
	//const USER_NAME_ADMIN = 'twolsey@libertysecurity.ca';
	//const USER_COMMON_NAME = 'null';
	//const USER_FIRST_NAME = 'Taylor';
	//const USER_LAST_NAME = 'Wolsey';
	//const USER_MIDDLE_NAME = 'null';
	//const USER_IMAGE_URL = 'images/tech-icon.png';
	//const USER_ACCESS_CODE = 'null';
	//const USER_PIN = 'null';
	//const USER_SOCIAL = 'null';
	//const USER_PASSWORD_SALT = 'null';
	//const USER_PASSWORD = 'sablecrm';
	//const USER_STATUS = 'null';
	//const USER_PHONE = '7324252814';
	//const USER_ADDRESS1 = '5640 104th Street NW';
	//const USER_ADDRESS2 = 'null';
	//const USER_ADDRESS3 = 'null';
	//const USER_CITY = 'Edmonton';
	//const USER_STATE = 'AB';
	//const USER_ZIP = 'T6H 2K2';
	//const USER_COUNTRY = 'CA';
	//const USER_EMAIL = 'twolsey@libertysecurity.ca';
	//const USER_MOBILE = '7808625078';
	//const USER_URL = 'null';
	//const USER_SKYPE = 'null';
	//const USER_FB = 'null';
	//const USER_TW = 'null';
	//const POINTS_BANK = 'null';
	//const COMMISSION_LEVEL_ID = 'null';
	//const USER_BANK_NAME = 'null';
	//const USER_BANK_ACCOUT = 'null';
	//const USER_BANK_ROUTING = 'null';