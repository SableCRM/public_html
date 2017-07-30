<?php

//print_r($_POST);die();

require_once "../Integration/Connection.php";

$dbConn = new Connection();

$name = explode(' ', $_POST['name']);

$sql = $dbConn->prepare("SELECT USER_ID, COMPANY_ID FROM USR WHERE USER_ID = ? AND COMPANY_ID = ?");
$sql->execute(array($_POST['id'], $_POST['company-id']));

$securityLevel = false;
if($_POST['security-level'] == 'Sales Portal'){
    $securityLevel = 2;
} elseif($_POST['security-level'] == 'Tech Portal') {
    $securityLevel = 4;
} elseif($_POST['security-level'] == 'Both') {
    $securityLevel = 1;
}

$adminUser = explode(',', $_POST['adminUser']);

if($sql->rowCount() > 0){

    $action = "Update existing user";

    $sql = $dbConn->prepare("UPDATE USR SET USER_ID = ?, USER_SECURITY_LEVEL_ID = ?, USER_NAME = ?, USER_FIRST_NAME = ?, USER_LAST_NAME = ?,
                            USER_STATUS = ?, USER_PHONE = ?, USER_ADDRESS1 = ?, USER_CITY = ?, USER_STATE = ?, USER_ZIP = ?, USER_EMAIL = ?,
                            MONI_NET_USER = ?, MONI_NET_PASSWORD = ?, USER_MOBILE = ?, COMPANY_ID = ? WHERE USER_ID = ? AND COMPANY_ID = ? LIMIT 1");

    $sql->execute(array($_POST['id'], $securityLevel, $_POST['email'], $name[0], $name[1], $_POST['status'], $_POST['phone'], $_POST['address'],
        $_POST['city'], $_POST['state'], $_POST['zip'], $_POST['email'], $_POST["moninet-user"], $_POST["moninet-pass"], $_POST['phone'],
        $_POST['company-id'], $_POST['id'], $_POST['company-id']));


} else {

    $action = "Creating new user";

    $sql = $dbConn->prepare("CALL ADMIN_ADD_USER(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,@ERROR_CODE);
    UPDATE USR SET MONI_NET_USER = ?, MONI_NET_PASSWORD = ? WHERE USER_ID = ?");

    $sql->execute(
    	array(
    		$adminUser[0],
		    $adminUser[1],
		    $_POST['company-id'],
		    $_POST['id'],
		    $securityLevel,
		    $_POST['email'],
		    NULL,
		    $name[0],
		    $name[1],
		    NULL,
		    'images/tech-icon.png',
		    NULL,
		    NULL, NULL, NULL, $_POST['password'], $_POST['status'], $_POST['phone'], $_POST['address'], NULL, NULL, $_POST['city'], $_POST['state'], $_POST['zip'], NULL, $_POST['email'], $_POST['phone'], NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $_POST["moninet-user"], $_POST["moninet-pass"], $_POST['id']));

}

//$sql = $dbConn->prepare("UPDATE USR SET MONI_NET_USER = ?, MONI_NET_PASSWORD = ? WHERE USER_ID = ?; SELECT last_insert_id()");
//
//$sql->execute(array($_POST["moninet-user"], $_POST["moninet-pass"], $_POST['id']));
//
//$status = $sql->fetchAll(PDO::FETCH_OBJ);

mail("ainsley.clarke@guardme.com", "User Upload To Sable", json_encode($_POST)." ".$action);

//if(isset($result->status)){
//    $insertNewUser = true;
//
//    /**
//     * CHECKS THAT CLIENT HAS AVAILABLE TECH AND SALES PORTAL BEFORE ADDING USER
//     */
////    $sql = 'SELECT * FROM SABLE_SUBSCRIPTIONS WHERE COMPANY_ID = ?';
////
////    $params = array($_POST['company-id']);
////
////    $result = Connect($sql, $params, 'array');
////    $subscriptions = Connect('SELECT CHECK_AVAILABLE_SUBSCRIPTIONS(?,?) AS OUTPUT', array($securityLevel, $_POST['company-id']), 'array');
////
////    if($subscriptions[0]->OUTPUT == 'B'){// sales and tech portal
////
////    }elseif($subscriptions[0]->OUTPUT == 'S'){// sales portal
////
////    }elseif($subscriptions[0]->OUTPUT == 'T'){// tech portal
////
////    }else{
////        //send mail to company admin to make them aware they have no available subscriptions.
////    }
//
//    $sql = 'CALL ADMIN_ADD_USER(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,@ERROR_CODE)';
//    $params = array($adminUser[0], $adminUser[1], $_POST['company-id'], $_POST['id'], $securityLevel, $_POST['email'],
//        NULL, $name[0], $name[1], NULL, 'images/tech-icon.png', NULL, NULL, NULL, NULL, $_POST['password'], $_POST['status'],
//        $_POST['phone'], $_POST['Address.inc'], NULL, NULL, $_POST['city'], $_POST['state'], $_POST['zip'], NULL, $_POST['email'],
//        $_POST['phone'], NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL
//    );
//}
//
//else{
//    $updateUser = true;
//    $sql = 'UPDATE USR SET USER_ID = ?, USER_SECURITY_LEVEL_ID = ?, USER_NAME = ?, USER_FIRST_NAME = ?, USER_LAST_NAME = ?,
//              USER_STATUS = ?, USER_PHONE = ?, USER_ADDRESS1 = ?, USER_CITY = ?, USER_STATE = ?, USER_ZIP = ?, USER_EMAIL = ?,
//              USER_MOBILE = ?, COMPANY_ID = ? WHERE USER_ID = ? AND COMPANY_ID = ? LIMIT 1';
//    $params = array($_POST['id'], $securityLevel, $_POST['email'], $name[0], $name[1], $_POST['status'],
//        $_POST['phone'], $_POST['Address.inc'], $_POST['city'], $_POST['state'], $_POST['zip'], $_POST['email'],
//        $_POST['phone'], $_POST['company-id'], $_POST['id'], $_POST['company-id']
//    );
//}

//$result = Connect($sql, $params, 'array');

//CALL  ADMIN_ADD_USER
//(
//    IN V_USER_NAME VARCHAR(100),*
// IN V_PASSWORD VARCHAR(100),*
//IN V_COMPANY_ID VARCHAR(50),*
//IN V_USER_ID VARCHAR(50),*
//IN V_USER_SECURITY_LEVEL VARCHAR(50),*
//IN V_USER_NAME_USR VARCHAR(50),*
//IN V_USER_COMMON_NAME VARCHAR(50),*
//IN V_USER_FIRST_NAME  VARCHAR(50),*
//IN V_USER_LAST_NAME VARCHAR(50),*
//IN V_USER_MIDDLE_NAME VARCHAR(50),*
//IN V_USER_IMAGE_URL VARCHAR(50),
//IN V_USER_ACCESS_CODE  VARCHAR(50),
//IN V_USER_PIN  VARCHAR(50),
//IN V_USER_SOCIAL  VARCHAR(50),
//IN V_USER_PASSWORD_SALT VARCHAR(50),*
//IN V_USER_PASSWORD VARCHAR(50),*
//IN V_USER_STATUS VARCHAR(50),
//IN V_USER_PHONE VARCHAR(50),
//IN V_USER_ADDRESS1 VARCHAR(100),
//IN V_USER_ADDRESS2 VARCHAR(100),
//IN V_USER_ADDRESS3 VARCHAR(100),
//IN V_USER_CITY VARCHAR(50),
//IN V_USER_STATE VARCHAR(50),
//IN V_USER_ZIP  VARCHAR(50),
//IN V_USER_COUNTRY VARCHAR(50),
//IN V_USER_EMAIL VARCHAR(50),
//IN V_USER_MOBILE VARCHAR(50),
//IN V_USER_URL VARCHAR(50),
//IN V_USER_SKYPE VARCHAR(50),
//IN V_USER_FB VARCHAR(50),
//IN V_USER_TW VARCHAR(50),
//IN V_POINTS_BANK VARCHAR(50),
//IN V_COMMISSION_LEVEL_ID  VARCHAR(50),
//IN V_USER_BANK_NAME VARCHAR(50),
//IN V_USER_BANK_ACCOUT VARCHAR(50),
//IN V_USER_BANK_ROUTING VARCHAR(50),
//OUT ERROR_CODE INT)