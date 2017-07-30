<?php

session_start();

if (!$_SESSION['user']->USER_ID){
    die(header('location: ../portals/login.php'));
} else {
    //print_r($_POST);
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Thank You | Sales Portal</title>

<?php require_once '../portals/head.php' ?>

</head>
<body>

<div id="portal_container" class="logged_in">

    <?php require_once '../portals/header.php' ?>

    <section id="thank_you" class="page success_page">

        <img id="moni_logo" src="../images/moni-logo.png"/>
        <img src="../images/green-check.png"/>
        <h1>You're Done!</h1>
        <p><strong><?php echo ucfirst($_SESSION['customer-info']['fname']).' '.ucfirst($_SESSION['customer-info']['lname']) ?>,
            </strong>&nbsp;Thank you for your time. A team member will be contacting you shortly to confirm your installation.</p>
        <div id="check_email">Check your e-mail for updates and information on getting started.</div>
        <a href="index.php"><input type="button" class="button" value="Home"/></a>

    </section>

    <?php require_once '../portals/footer.php' ?>

</div>

</body>
</html>