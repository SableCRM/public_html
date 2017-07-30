<?php

session_start();

if (!$_SESSION['user']->USER_ID) {
    die(header('location: ../portals/login.php'));
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Portals</title>

<?php require_once 'head.php' ?>

</head>
<body>

<div id="portal_container" class="logged_in">

    <?php require_once 'header.php' ?>

    <section id="portal_list" class="page">

        <a id="tech_portal" href="../SABLE-TECH-PORTAL/index.php"><img src="../images/tech-portal.png"/></a>
        <a id="sales_portal" href="../salesportal/index.php"><img src="../images/sales-portal.png"/></a>

    </section>

    <?php require_once 'footer.php' ?>

</div>

</body>
</html>
