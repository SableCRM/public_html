<!doctype html>
<html>
<head>
<meta charset="UTF-8">

<title>Dashboard | SableCRM+ Admin Portal</title>

<?php require_once('partials/head.php'); ?>

</head>

<body>

<?php require_once('partials/header.php'); ?>

<section id="dashboard" class="page">

    <div id="page-heading-container" class="container">
        <div id="page-heading">
            <i class="icon-cog"></i>
            <div id="page-heading-text">
                <h1>Dashboard</h1>
                <p>Admin Portal</p>
            </div>
        </div>
    </div>

    <div class="container">

        <div id="widgets">

            <div id="top-users">

                <div id="top-installers">

                    <h2>Top Installers</h2>

                    <div class="table">

                        <div class="table-headings">
                            <div>Tech</div>
                            <div>Installs</div>
                        </div>

                        <div class="table-row">
                            <div class="table-cell">Paul Moore</div>
                            <div class="table-cell">123</div>
                        </div>

                        <div class="table-row">
                            <div class="table-cell">Paul Moore</div>
                            <div class="table-cell">123</div>
                        </div>

                        <div class="table-row">
                            <div class="table-cell">Paul Moore</div>
                            <div class="table-cell">123</div>
                        </div>

                    </div>
                    
                </div>

                <div id="top-sellers">

                    <h2>Top Sellers</h2>

                    <div class="table">

                        <div class="table-headings">
                            <div>Salesperson</div>
                            <div>Sales</div>
                        </div>

                        <div class="table-row">
                            <div class="table-cell">Paul Moore</div>
                            <div class="table-cell">123</div>
                        </div>

                        <div class="table-row">
                            <div class="table-cell">Paul Moore</div>
                            <div class="table-cell">123</div>
                        </div>

                        <div class="table-row">
                            <div class="table-cell">Paul Moore</div>
                            <div class="table-cell">123</div>
                        </div>

                    </div>

                </div>

            </div>

            <div id="weather"></div>

        </div>

    </div>

    <?php require_once('modules/company-info.php'); ?>
    <?php require_once('modules/central-station.php'); ?>

</section>

<?php require_once('partials/footer.php'); ?>

<div id="modal-container">

</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.simpleWeather/3.1.0/jquery.simpleWeather.min.js"></script>
<script>

$(document).ready(function() {

    function loadWeather(location, woeid) {

        $.simpleWeather({
            location: location,
            woeid: woeid,
            unit: 'f',
            success: function(weather) {
                html = '<h2><i class="icon-'+weather.code+'"></i> '+weather.temp+'&deg;'+weather.units.temp+'</h2>';
                html += '<p>'+weather.city+', '+weather.region+'<p>';

                $("#weather").html(html);
            },
            error: function(error) {
                $("#weather").hide();
            }
        });

    }

    navigator.geolocation.getCurrentPosition(function(position) {
        loadWeather(position.coords.latitude + ',' + position.coords.longitude);
    });

    $('#central-station-select select').change(function() {
        let selected = this.value;
        $('#central-station .field-set').slideUp();
        if (selected == 'Moni') {
            $('#moni-credentials').slideDown();
        } else if (selected == 'ADT') {
            $('#adt-credentials').slideDown();
        }
    });

});

</script>

</body>
</html>
