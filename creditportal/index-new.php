<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>SableCRM+ - Client Credit Check</title>

<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300|Lato:300,300i,400,400i,700" rel="stylesheet">

<link rel="stylesheet" href="creditcheck-new.css">

</head>

<body>

<?php require_once 'header.php' ?>

<section id="page-heading-container">
    <div id="page-heading">
        <i class="icon-user-check"></i>
        <div id="page-heading-text">
            <h1>Credit Check</h1>
            <p>Credit Portal</p>
        </div>
    </div>
</section>

<section id="modules" class="container">

    <div id="client-info" class="module">
        <div class="module-header">
            <div class="left">
                <div class="module-name">Client Information</div>
            </div>
        </div>
        <div class="module-body">
            <div class="field quarter">
                <label>First Name</label>
                <input id="firstname" type="text"/>
            </div>
            <div class="field quarter">
                <label>Last Name</label>
                <input id="lastname" type="text"/>
            </div>
            <div class="field quarter">
                <label>Social Security Number</label>
                <input id="ssn" type="text" placeholder="xxx-xx-xxxx"/>
            </div>
            <div class="field quarter">
                <label>Credit Bureau</label>
                <select id="credit-bureau">
                    <option>TransUnion</option>
                    <option>Equifax</option>
                </select>
            </div>
            <div class="field half">
                <label>Address</label>
                <input id="address" type="text"/>
            </div>
            <div class="field half">
                <label>Address 2</label>
                <input id="address2" type="text"/>
            </div>
            <div class="field quarter">
                <label>City</label>
                <input id="city" type="text"/>
            </div>
            <div class="field eighth">
                <label>State</label>
                <input id="state" type="text"/>
            </div>
            <div class="field eighth">
                <label>Zip</label>
                <input id="zip" type="text"/>
            </div>
        </div>
        <div class="module-footer">

            <div class="module-buttons">
                <div id="pull-previous" class="button">Pull Previous</div>
                <div id="pull-new" class="button green-button">Pull New</div>
            </div>

        </div>
    </div>

</section>

<div id="modal-container">

    <div id="no-subject-found" class="hide-response modal">

        <h2>No Subject Found</h2>
        <p>We couldn't locate the customer with the information provided. This may be caused by not living at an address long enough.</p>

        <div class="modal-buttons">
            <div id="run-previous" class="button">Run Previous Address</div>
            <div class="confirm-decline button green-button">Confirm Decline (Send Email)</div>
        </div>

    </div>

    <div id="credit-check-success" class="hide-response modal">

        <h2>Success</h2>
        <p>Credit score:&nbsp;<strong id="credit-score">500</strong></p>

        <div class="modal-buttons">
            <div id="exit-credit" class="button green-button">Close</div>
        </div>

    </div>

    <div id="credit-check-decline" class="hide-response modal">

        <h2>Credit Declined</h2>
        <p>There was a problem with the credit information provided.  The client's information did not meet the specified criteria for credit match or approval.</p>

        <div class="modal-buttons">
            <div id="run-spouse" class="button">Run Spouse</div>
            <div class="confirm-decline button green-button">Confirm Decline (Send Email)</div>
        </div>

    </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="creditcheck-new.js"></script>

</body>
</html>
