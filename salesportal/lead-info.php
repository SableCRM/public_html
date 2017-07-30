<?php

session_start();

/**
 * check to see if user is logged in
 */
if(isset($_SESSION["user"]->USER_ID)){

    //$_SESSION['credit'] = $_POST;

    require_once '../../Integration/ZOHO-API/zoho.php';

    $zohoApi = new Zoho($_SESSION['user']->ZOHO_AUTH_ID);

    if(isset($_SESSION["deal-id"])){

        $_SESSION["deal"] = $zohoApi->Get("Potentials", $_SESSION["deal-id"], "array");

        $deal = $_SESSION["deal"];

    } elseif(isset($_POST["create-contact"])) {

        //if(!isset($_SESSION["deal-id"])){

        $_SESSION['credit'] = $_POST;

            $createContactResult = $zohoApi->Insert('contacts', json_encode(array(
                'Country Zbooks' => '',
                'First Name' => $_SESSION['customer-info']['fname'],
                'Last Name' => $_SESSION['customer-info']['lname'],
                'Email' => $_SESSION['customer-info']['email'],
                'Phone' => $_SESSION['customer-info']['phone'],
                'Mobile' => '',
                'Phone 2' => '',
                'Phone Work' => '',

                'Mailing Street' => $_SESSION['customer-info']['address1'],//.=($_SESSION['customer-info']['address2']) ?
                    //', '.$_SESSION['customer-info']['address2'] : '',

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
        //}
    }
    /**
     * add the company-id to the session so that it is accessible in creditcheck.php when the credit request is ran
     * from this page
     * @todo check to see if $_SESSION['user'] is already available in creditcheck.php
     */
    $_SESSION['company-id'] = $_SESSION['user']->COMPANY_ID;

} else {

    if(isset($_GET['deal-id'])){

        $_SESSION["deal-id"] = $_GET['deal-id'];

        $_SESSION["new-account"] = "../salesportal/new-account.php";
    }
    header('location: ../portals/login.php');

    die();
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Lead Info | Sales Portal</title>

<?php require_once '../portals/head.php' ?>

</head>
<body>

<div id="portal_container" class="logged_in">

    <?php require_once '../portals/header.php' ?>

    <section id="lead_info" class="page">

        <div id="sales_heading">
            <div>
                <img src="../images/package-icon.png"/>
                <div>
                    <h1>Lead Information</h1>
                    <div>Sales Portal</div>
                </div>
            </div>
            <img src="../images/moni-logo.png"/>
        </div>

        <div class="module">

            <div class="module-header">
                <div class="module-name">Lead Information</div>
                <img class="collapse-toggle" src="../images/module-arrow.png"/>
            </div>

            <div class="module-body">
                <div id="first_name" class="lead_info half">
                    <label>First Name:</label>
                    <input class="validate" required type="text" value="<?php echo explode(" ", $deal["Contact Name"])[0] ?>"/>
                </div>
                <div id="last_name" class="lead_info half">
                    <label>Last Name:</label>
                    <input class="validate" required type="text" value="<?php echo explode(" ", $deal["Contact Name"])[1] ?>"/>
                </div>
                <div id="address_1" class="lead_info half">
                    <label>Address 1:</label>
                    <input class="validate" required type="text" value="<?php echo $deal["Address"] ?>"/>
                </div>
                <div id="address_2" class="lead_info half">
                    <label>Address 2:</label>
                    <input class="validate" type="text" value="<?php ?>"/>
                </div>
                <div id="city" class="lead_info half">
                    <label>City:</label>
                    <input class="validate" required type="text" value="<?php echo $deal["City"] ?>"/>
                </div>
                <div id="state" class="lead_info quarter">
                    <label>State:</label>
                    <input class="validate" required type="text" value="<?php echo $deal["State"] ?>"/>
                </div>
                <div id="zip" class="lead_info quarter">
                    <label>Zip:</label>
                    <input class="validate" required type="text" value="<?php echo $deal["Zip"] ?>"/>
                </div>
                <div id="phone_number" class="lead_info half">
                    <label>Phone Number:</label>
                    <input class="validate" required type="text"  value="<?php echo $deal["Contact Phone"] ?>"/>
                </div>
                <div id="email_address" class="lead_info half">
                    <label>Email Address:</label>
                    <input class="validate" required type="text"  value="<?php echo $deal["Email"] ?>"/>
                </div>

            </div>

        </div>

        <div class="module-footer">
            <input id="submit_lead_info" type="button" class="button" value="Submit"/>
            <input id="new_sale_from_lead" type="button" class="button" value="New Sale"/>
        </div>

    </section>

    <?php require_once '../portals/footer.php' ?>

</div>

<script>
    <?php
        require_once '../../Integration/urlsplit.js';
        require_once '../../Integration/ParseJson.js';
    ?>

    $(document).ready(function() {


    });

</script>

</body>
</html>
