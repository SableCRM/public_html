<?php

	session_start();

	/**
	 * check to see if user is logged in
	 */
	if(isset($_SESSION["user"]->USER_ID)){
		/**
		 * creates an instance of the zohoApi Class.
		 */
		require_once "../../Integration/ZOHO-API/zoho.php";
		$zohoApi = new Zoho($_SESSION["user"]->ZOHO_AUTH_ID);

		if(isset($_SESSION["deal-id"])){

			$_SESSION["deal"] = $zohoApi->Get("Potentials", $_SESSION["deal-id"], "array");

			$deal = $_SESSION["deal"];
		}
	}
	else{

		if(isset($_GET["deal-id"])){

			$_SESSION["deal-id"] = $_GET["deal-id"];

			$_SESSION["new-account"] = "../salesportal/new-account.php";
		}
		header("location: ../portals/login.php");exit;
	}

?>

<!DOCTYPE html>
<html>
<head>

<title>New Account | Sales Portal</title>

<?php require_once "../portals/head.php" ?>

</head>
<body>

<div id="portal_container" class="logged_in">

    <?php require_once "../portals/header.php" ?>

    <section id="new_account" class="page">

        <div id="sales_heading">
            <div>
                <img src="../images/package-icon.png"/>
                <div>
                    <h1>New Account</h1>
                    <div><strong>Step 1:</strong> Customer Information</div>
                </div>
            </div>
            <img src="../images/moni-logo.png"/>
        </div>

        <div id="error_message">
            <div id="credit_declined" class="hide-response">
                <img src="../images/warning-icon.png"/>
                <div>
                    <h2>Credit Declined</h2>
                    <p><strong>There was a problem with the credit information provided.</strong> Sometimes this may be caused by not living at an address long enough.  As an additional option, we recommend:</p>
                    <div class="error_buttons">
                        <input id="run_spouse" type="button" class="button" value="Run Spouse"/>
                        <a href="index.php"><input id="confirm_decline" type="button" class="button" value="Confirm Decline (Send Email)"/></a>
                    </div>
                </div>
            </div>
            <div id="no_subject_found" class="hide-response">
                <img src="../images/warning-icon.png"/>
                <div>
                    <h2><span>Alert:</span> No Subject Found</h2>
                    <p><strong>We couldn't locate the customer with the information provided.</strong> Sometimes this may be caused by not living at an address long enough.  As an additional option, we recommend:</p>
                    <div class="error_buttons">
                        <input id="run_previous_address" type="button" class="button" value="Run Previous Address"/>
                        <a href="index.php"><input id="confirm_not_found" type="button" class="button" value="Confirm Decline (Send Email)"/></a>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once "modules/customer-info.php" ?>

        <a href="#"><input id="submit_account_info" type="button" class="button" value="Next Step: Credit Check"/></a>

    </section>

    <?php require_once "../portals/footer.php" ?>

</div>

<script>
    <?php
        require_once '../../Integration/urlsplit.js';
        require_once '../../Integration/ParseJson.js';
    ?>

    $(document).ready(function() {

        $('#property_type').change(function() {
            let propertyType = $(this).find("option:selected").val();

            if (propertyType == 'Commercial') {
                $('#commercial').css("display", "flex").hide().slideDown();
                $('#company_name').focus();
            } else {
                $('#commercial').slideUp();
            }
        });

        $('#com_address_toggle').change(function() {
            if ($('#commercial #com_first_name').css('display') == 'none') {
                $('#commercial .com_address').css("display", "flex").hide().fadeIn();
            } else {
                $('#commercial .com_address').fadeOut();
            }
        });

    });

</script>

</body>
</html>
