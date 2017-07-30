<?php

    if($_SERVER['REQUEST_URI'] == '/portals/profile-settings.php'){
        switch ($_SESSION['user']->USER_SECURITY_LEVEL_ID){
            case 1:
                $location = 'portals.php';
                break;
            case 2:
                $location = '../salesportal/index.php';
                break;
            case 4:
                $location = '../SABLE-TECH-PORTAL/index.php';
                break;
        }
    }else{
        $location = 'index.php';
    }

?>
<header>
    <div id="logged_out_header">
    </div>
    <div id="logged_in_header">
<!--        <a href="index.php"><img src="../images/sable-logo.png"/></a>-->
        <a href="<?php echo $location ?>"><img src="../images/sable-logo.png"/></a>
        <div>
            <div id="tech_name"><?php echo $_SESSION['user']->USER_FIRST_NAME.' '.$_SESSION['user']->USER_LAST_NAME ?></div>
            <div id="tech_nav">
                <div id="tech_icon"><img src="../<?php echo $_SESSION['user']->USER_IMAGE_URL ?>"/></div>
                <img src="../images/tech-nav-arrow.png"/>
            </div>
            <div id="dropdown_nav">
                <a href="../portals/profile-settings.php">Profile Settings</a>
                <a id="login" href="../portals/login.php">Log Out</a>
            </div>
        </div>
    </div>
</header>
