<?php

	session_start();

	if(!$_SESSION["user"]->USER_ID){
		header("location: ../portals/login.php");exit;
	}

?>

<!DOCTYPE html>
<html>
<head>

<title>Credit Approved | Sales Portal</title>

<?php require_once "../portals/head.php" ?>

</head>
<body>

<div id="portal_container" class="logged_in">

    <?php require_once "../portals/header.php" ?>

    <section id="credit_approved" class="page success_page">

        <img id="moni_logo" src="../images/moni-logo.png"/>
        <img src="../images/green-check.png"/>
        <h1>Success!</h1>
        <div id="credit_score">Your credit score:&nbsp;<strong><?php echo $_SESSION["credit"]["score"] ?></strong></div>
        <a href="security-system.php"><input type="button" class="button" value="Next Step: Build A Package"/></a>

    </section>

    <?php require_once "../portals/footer.php" ?>

</div>

</body>
</html>
