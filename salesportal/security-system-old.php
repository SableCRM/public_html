<?php

session_start();

if ($_SESSION['user']->USER_ID) {
    if ($_POST['create-deal']){

        require_once '../../Integration/ZOHO-API/zoho.php';
        $zohoApi = new Zoho($_SESSION['user']->ZOHO_AUTH_ID);

        $createDealResult = $zohoApi->Insert('Deals', json_encode(array(
            'Deal Name' => $_SESSION['customer-info']['fname'].
                $_SESSION['customer-info']['lname']. ' '.
                $_SESSION['customer-info']['city'].' '.
                $_SESSION['customer-info']['state'],

            'CONTACTID' => $_SESSION['contact-id'],
            'Email' => $_SESSION['customer-info']['email'],
            'Contact Phone' => $_SESSION['customer-info']['phone'],

            'Address' => $_SESSION['customer-info']['address1'],
            'City' => $_SESSION['customer-info']['city'],
            'State' => $_SESSION['customer-info']['state'],
            'Province' => $_SESSION['customer-info']['state'],
            'Zip' => $_SESSION['customer-info']['zip'],
            'Postal Code' => $_SESSION['customer-info']['zip'],
            'County' => $_SESSION['customer-info']['county'],
            'Country' => $_SESSION['customer-info']['country'],
            'Residential/Commercial' => $_SESSION['customer-info']['property-type'],
            'Sales Person' => $_SESSION['user']->USER_ID,
            'Stage' => $_POST['stage'],
            'Closing Date' => time(),
            'Package Type' => $_POST['package-type'],
            'Monitoring Level' => $_POST['monitoring-level'],
            'Takeover' => $_POST['takeover'],
            'Two Way Voice' => $_POST['twoway'],
            'ADC Video' => $_POST['adc-video'],
            'Panel Type' => $_POST['panel-type'],
            'Door(s) / Window(s)' => $_POST['doors-windows'],
            'Motion(s)' => $_POST['motions'],
            'Smoke(s)' => $_POST['smokes'],
            'Glass Break(s)' => $_POST['glass-breaks'],
            'Other' => $_POST['other'],
            'Thermostat(s)' => $_POST['thermostats'],
            'Lock(s)' => $_POST['locks'],
            'Light(s)' => $_POST['lights'],
            'Indoor Camera(s)' => $_POST['indoor-cameras'],
            'Outdoor Camera(s)' => $_POST['outdoor-cameras'],
            'Sky Bell' => $_POST['sky-bell'],
            'Existing Panel Type' => $_POST['existing-panel-type'],
            'Wired / Wireless' => $_POST['wired-wireless'],
            'RMR' => $_POST['rmr'],
            'Amount' => $_POST['amount'],
            'Activation Fee' => $_POST['activation-fee'],
            'ACH Routing Number' => $_POST['ach-routing-number'],
            'ACH Account' => $_POST['ach-account'],
            'Card Number' => $_POST['card-number'],
            'Expiration' => $_POST['expiration'],
            'Cvv'=> $_POST['cvv'],
            'Easy Pay Method' => $_POST['easy-pay-method'],
            '1st Choice Install Date' => $_POST['first-choice-date'],
            '1st Choice Install Time' => $_POST['first-choice-time'],
            '2nd Choice Install Date' => $_POST['second-choice-date'],
            '2nd Choice Install Time' => $_POST['second-choice-time']
        )));

        $_SESSION['post-variables'] = $_POST;
        $_SESSION['create-deal-result'] = json_decode($createDealResult)->response->result->recorddetail->FL[0]->content;
        die($createDealResult);
    }
}

else{
    die(header('location: ../portals/login.php'));
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Step 2: Build A Package | Sales Portal</title>

<?php require_once '../portals/head.php' ?>

</head>
<body>

<div id="portal_container" class="logged_in">

    <?php require_once '../portals/header.php' ?>

    <section id="security_system" class="page">

        <div id="sales_heading">
            <div>
                <img src="../images/package-icon.png"/>
                <div>
                    <h1>Security System</h1>
                    <div><strong>Step 2:</strong> Build A Package</div>
                </div>
            </div>
            <img src="../images/moni-logo.png"/>
        </div>

        <div id="package_modules">
            <?php require_once 'modules/package-details-old.php' ?>
            <?php require_once 'modules/payment-info-old.php' ?>
            <?php require_once 'modules/additional-notes.php' ?>
        </div>

        <a href="thank-you.php"><input id="confirm" type="button" class="button" value="Confirm and Send eContract"/></a>

    </section>

    <?php require_once '../portals/footer.php' ?>

</div>

</body>
</html>
