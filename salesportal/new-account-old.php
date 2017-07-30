<?php

session_start();

/**
 * check to see if user is logged in
 */
if ($_SESSION['user']->USER_ID) {
    if($_POST['create-contact']){

        $_SESSION['credit'] = $_POST;

        /**
         * create a contact in crm reguardless of client's credit status
         */
        require_once '../../Integration/ZOHO-API/zoho.php';

        $zohoApi = new Zoho($_SESSION['user']->ZOHO_AUTH_ID);

        $createContactResult = $zohoApi->Insert('contacts', json_encode(array(
            'Country Zbooks' => '',
            'First Name' => $_SESSION['customer-info']['fname'],
            'Last Name' => $_SESSION['customer-info']['lname'],
            'Email' => $_SESSION['customer-info']['email'],
            'Phone' => $_SESSION['customer-info']['phone'],
            'Mobile' => '',
            'Phone 2' => '',
            'Phone Work' => '',

            'Mailing Street' => $_SESSION['customer-info']['address1'].=($_SESSION['customer-info']['address2']) ?
                ', '.$_SESSION['customer-info']['address2'] : '',

            'Mailing City' => $_SESSION['customer-info']['city'],
            'Mailing State' => $_SESSION['customer-info']['state'],
            'Mailing Province' => $_SESSION['customer-info']['state'],
            'Mailing Zip' => $_SESSION['customer-info']['zip'],
            'Mailing Postal Code' => $_SESSION['customer-info']['zip'],
            'Mailing County' => $_SESSION['customer-info']['county'],
            'Mailing Country' => $_SESSION['customer-info']['country'],
            'Credit Score' => $_SESSION['credit']['score'],
            'Credit Token' => $_SESSION['credit']['token'],
            'Transaction Number' => $_SESSION['credit']['transid'],
            'Account Name' => '',
            'Title' => '',
            'Social Security Number' => $_SESSION['customer-info']['ssn'],
            'Monitoring Center' => '',
            'CS Number' => ''
        )));

        $_SESSION['contact-id'] = json_decode($createContactResult)->response->result->recorddetail->FL[0]->content;
        die($createContactResult);
    }

    /**
     * add the company-id to the session so that it is accessible in creditcheck.php when the credit request is ran
     * from this page
     * @todo check to see if $_SESSION['user'] is already available in creditcheck.php
     */
    $_SESSION['company-id'] = $_SESSION['user']->COMPANY_ID;
}


/**
 * redirect to login page if user is not logged in
 */
else{
    die(header('location: ../portals/login.php'));
}

?>

<!DOCTYPE html>
<html>
<head>

<title>New Account | Sales Portal</title>

<?php require_once '../portals/head.php' ?>

</head>
<body>

<div id="portal_container" class="logged_in">

    <?php require_once '../portals/header.php' ?>

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

        <?php require_once 'modules/customer-info-old.php' ?>

        <a href="#"><input id="submit_account_info" type="button" class="button" value="Next Step: Credit Check"/></a>

    </section>

    <?php require_once '../portals/footer.php' ?>

</div>

<script>
    <?php
        require_once '../../Integration/urlsplit.js';
        require_once '../../Integration/ParseJson.js';
    ?>
</script>

</body>
</html>
