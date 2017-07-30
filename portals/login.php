<?php

session_start();

if($_POST['login'] == 'true'){
    require_once '../../Integration/DATABASE_CONNECTION.php';
    
    $sql = "SELECT USER_FIRST_NAME, USER_LAST_NAME, USER_SECURITY_LEVEL_ID, USER_STATUS, USER_PHONE, USER_MOBILE, MONI_NET_USER, MONI_NET_PASSWORD, 
              USER_EMAIL, USER_ID, USER_IMAGE_URL, USR.COMPANY_ID, COMPANY.COMPANY_NAME, ZOHO_USER.ZOHO_AUTH_ID, 
              MONI_USER.MONI_USER, MONI_USER.MONI_PASSWORD FROM USR JOIN COMPANY ON USR.COMPANY_ID = COMPANY.COMPANY_ID 
              JOIN MONI_USER ON USR.COMPANY_ID = MONI_USER.COMPANY_ID JOIN ZOHO_USER ON USR.COMPANY_ID = ZOHO_USER.COMPANY_ID 
              WHERE USER_NAME = ? AND USER_PASSWORD = ? AND (USER_SECURITY_LEVEL_ID = 4 OR USER_SECURITY_LEVEL_ID = 2 OR 
              USER_SECURITY_LEVEL_ID = 1 OR USER_SECURITY_LEVEL_ID = 9) AND USER_STATUS = 'false' LIMIT 1";

    $params = array($_POST['username'], $_POST['password']);
    
    $row = Connect($sql, $params, 'array');
    
    if(!isset($row->status)){
        $_SESSION['user'] = $row[0];
        
        $result = new stdClass();
        
        if($_SESSION['user']->USER_SECURITY_LEVEL_ID == 1 || $_SESSION['user']->USER_SECURITY_LEVEL_ID == 9){
            if(isset($_SESSION['commissions'])){
                $result->redirect = $_SESSION['commissions'];
            } elseif ($_SESSION["new-account"]) {
                $result->redirect = $_SESSION["new-account"];
            } else {
                $result->redirect = 'portals.php';
            }
        }

        elseif($_SESSION['user']->USER_SECURITY_LEVEL_ID == 2){
            //$result->redirect = '../salesportal/index.php';
	        $result->redirect = 'http://www.sable-crm.com/mvc/user/salesportal';
        }

        elseif($_SESSION['user']->USER_SECURITY_LEVEL_ID == 4){
            $result->redirect = '../SABLE-TECH-PORTAL/index.php';
        }
        
        $result->login = true;
        
        die(json_encode($result));
    }

    else{
        $result = new stdClass();
        
        $result->login = false;
        
        $result->message = 'INVALID USERNAME OR PASSWORD ENTERED, NO USER FOUND.';

        die(json_encode($result));
    }
}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Login | Sable Portal</title>

    <?php require_once 'head.php' ?>

</head>
<body>

<div id="tech_portal_container" class="logged_out">
    
    <?php require_once 'header.php' ?>

    <section id="login_page" class="page">

        <div id="login_heading">
            <img src="../images\sable-logo.png"/>
            <div>Log in to access your SableCRM+ account</div>
        </div>

        <div id="login_form_container">
            <div id="login_form">
                <label>Username:</label>
                <input type="text"/>
                <label>Password:</label>
                <input type="password"/>
                <a href="/forgot-password">Forgot Password?</a>
                <div><input type="checkbox"/><label>Keep me signed in</label></div>
                <input id="log_in" type="button" class="button purple-button" value="Log In" onclick=""/>
            </div>
        </div>

    </section>

    <?php require_once 'footer.php' ?>

</div>

</body>
</html>