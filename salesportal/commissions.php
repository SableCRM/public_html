<?php

session_start();

if (!$_SESSION['user']->USER_ID) {
    $_SESSION['commissions'] = '../salesportal/commissions.php';
    die(header('location: ../portals/login.php'));
}

?>

<!DOCTYPE html>
<html>
<head>

<title>View Commissions</title>

<?php require_once '../portals/head.php' ?>

</head>
<body>

<div id="portal_container" class="logged_in">

    <?php require_once '../portals/header.php' ?>

    <section id="commissions" class="page">

        <div id="page_heading">
            <img src="../images/commissions.png"/>
            <div>
                <h1>View Commissions</h1>
                <div>Select a date range to filter results</div>
            </div>
        </div>

        <div id="date_selection">
            <div>
                <label>Start Date</label>
                <input id="date-from" type="date" placeholder="mm/dd/yyyy"/>
            </div>
            <div>
                <label>End Date</label>
                <input id="date-to" type="date" placeholder="mm/dd/yyyy"/>
            </div>
            <input id="filter-date" type="button" class="button" value="Submit" onclick=""/>
        </div>

        <div id="commissions_data">

            <div id="overview">

                <h2>Overview</h2>
                <div class="date_range">Please Choose a Start-Date and an End-Date</div>

                <div class="table">

                    <div class="table_headings">
                        <div>Sales Person</div>
                        <div>Total Commissions</div>
                    </div>

                    <div class="table_row">
                        <div><?php echo $_SESSION['user']->USER_FIRST_NAME.' '.$_SESSION['user']->USER_LAST_NAME ?></div>
                        <div id="total-commission">$00.00</div>
                    </div>

                </div>

            </div>

            <div id="detailed">

                <h2>Detailed View</h2>
                <div class="date_range"></div>

                <div class="table">

                    <div class="table_headings">
                        <div>Sales Person</div>
                        <div>Total Commission</div>
                        <div>Customer Name</div>
                        <div>Install Type</div>
                        <div>Install Date</div>
                        <div>Payment Method</div>
                        <div>Self Generated</div>
                        <div>Monitoring Level</div>
                        <div>Points Given</div>
                        <div>Invoice</div>
                        <div>Activation</div>
                        <div>RMR</div>
                        <div>Length of Contract</div>
                        <div>Manager Override</div>
                    </div>

<!--                    <div class="table_row">-->
<!--                        <div>Paul Moore</div>-->
<!--                        <div>$1,000,000</div>-->
<!--                        <div>Test</div>-->
<!--                        <div>Test</div>-->
<!--                        <div>Test</div>-->
<!--                        <div>Test</div>-->
<!--                        <div>Test</div>-->
<!--                        <div>Test</div>-->
<!--                        <div>Test</div>-->
<!--                        <div>Test</div>-->
<!--                        <div>Test</div>-->
<!--                        <div>Test</div>-->
<!--                        <div>Test</div>-->
<!--                        <div>Test</div>-->
<!--                    </div>-->

                </div>

            </div>

        </div>

    </section>

    <?php require_once '../portals/footer.php' ?>

</div>

</body>
</html>
