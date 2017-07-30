<?php

session_start();

if($_POST['update-user']){
    
    header('Access-Control-Allow-Origin: *');
    //header('Access-Control-Allow-Methods: GET, POST');
    require_once '../../Integration/DATABASE_CONNECTION.php';
    
    if($_POST['update-user-info']){
        $query = 'UPDATE USR SET USER_FIRST_NAME = ?, USER_LAST_NAME = ?, USER_MOBILE = ?, USER_PHONE = ?, USER_EMAIL = ?
              WHERE COMPANY_ID = ? AND USER_ID = ?';
        
        $params = array(
            $_POST['first-name'], $_POST['last-name'], $_POST['mobile-phone'], $_POST['work-phone'], $_POST['email'],
            $_SESSION['user']->COMPANY_ID, $_SESSION['user']->USER_ID
        );
        
        die(Connect($query, $params, 'array'));
    }
    
    elseif($_POST['update-user-password']){
        $query = 'UPDATE USR SET USER_PASSWORD = ? WHERE USER_PASSWORD = ? AND COMPANY_ID = ? AND USER_ID = ?';
        
        $params = array(
            $_POST['new-password'], $_POST['current-password'], $_SESSION['user']->COMPANY_ID, $_SESSION['user']->USER_ID
        );
        
        die(Connect($query, $params, 'array'));
    }
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Profile Settings | Sable Portal</title>

    <?php require_once 'head.php' ?>

</head>
<body>

<div id="tech_portal_container" class="logged_in">

    <?php require_once 'header.php' ?>

    <section id="profile_settings" class="page">

        <div id="page_heading">
            <img src="../images\icon-tech-portal-profile-settings.png"/>
            <div>
                <h1>Profile Settings</h1>
                <div>Personal Information / Change Password</div>
            </div>
        </div>

        <div id="profile_modules">
            <?php require_once 'personal-info.php' ?>
            <?php require_once 'change-password.php' ?>
        </div>

    </section>

</div>

    <?php require_once 'footer.php' ?>

</body>
</html>
