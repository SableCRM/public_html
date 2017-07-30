<?php

session_start();

if (!$_SESSION['user']->USER_ID) {
    die(header('location: ../portals/login.php'));
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Sales Portal Dashboard</title>

<?php require_once '../portals/head.php' ?>

</head>
<body>

<div id="portal_container" class="logged_in">

    <?php require_once '../portals/header.php' ?>

    <section id="sales_dashboard" class="page">

        <div id="dashboard_heading">
            <img src="../images/moni-logo.png"/>
            <div>Welcome,&nbsp;<strong><?php echo ucfirst($_SESSION['user']->USER_FIRST_NAME).' '.ucfirst($_SESSION['user']->USER_LAST_NAME) ?></strong></div>
            <a href="new-account.php"><input type="button" class="button" value="New Sale"/></a>
            <a href="lead-info.php"><input type="button" class="button" value="New Lead"/></a>
        </div>

        <div id="dashboard_links">
            <div id="sales_tools_links">
                <div class="dashboard_subheading">
                    <img src="../images/sales-tools-icon.png"/>
                    <h2>Sales <strong>Tools</strong></h2>
                </div>
                <ul>
                    <a href="http://www.sablecrm.com/portal-walkthrough-videos/" target="_blank">
                        <li>Portal Walkthrough Videos</li>
                        <span>http://www.sablecrm.com/portal-walkthrough-videos/</span>
                    </a>
                </ul>
            </div>
            <div id="sable_dashboard_links">
                <div class="dashboard_subheading">
                    <img src="../images/dashboard-icon.png"/>
                    <h2>Sable <strong>Dashboard</strong></h2>
                </div>
                <ul>
                    <a href="commissions.php">
                        <li>Sales Commissions</li>
                        <span>http://www.sable-crm.com/salesportal/commissions.php</span>
                    </a>
                </ul>
            </div>
        </div>

    </section>

    <?php require_once '../portals/footer.php' ?>

</div>

</body>
</html>
