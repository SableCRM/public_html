<?php

    //print_r($_POST);
    require_once "../../Integration/Connection.php";

    $loggedInUser = $_GET["user"];

    $dbConn = new Connection();
    $sql = $dbConn->prepare("SELECT JOB_ID, SCHEDULED_JOBS.USER_ID, USR.USER_FIRST_NAME, USR.USER_LAST_NAME, SCHEDULED_DATE_TIME, DATA_1, DATA_2, DATA_3
                              FROM SCHEDULED_JOBS JOIN USR ON SCHEDULED_JOBS.USER_ID = USR.USER_ID WHERE SCHEDULED_JOBS.COMPANY_ID = ? AND SCHEDULED_DATE_TIME
                              >= ? AND SCHEDULED_DATE_TIME <= ?");

    if(isset($_POST["start-date"]) || isset($_POST["end-date"])){
        try{
            $sql->execute(array($_POST["company-id"], $_POST["start-date"], $_POST["end-date"]));
            die(json_encode($sql->fetchAll(PDO::FETCH_OBJ)));

        } catch(Exception $ex) {
            print_r($ex);
        }
    }

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">

<title>Calendar | SableCRM+ Sales Portal</title>

<?php require_once('../portals/head.php'); ?>

</head>

<body>

<div id="portal_container" class="logged_in calendar-container">

    <?php require_once('../portals/header.php'); ?>

    <section id="calendar" class="page">

        <div id="page-heading-container" class="container">
            <div id="page-heading">
                <i class="icon-calendar"></i>
                <div id="page-heading-text">
                    <h1>Calendar</h1>
                    <p>Sales Portal</p>
                </div>
            </div>
        </div>

        <div class="container">

            <div id="calendar-header">
                <div class="left">
                    <h2>Week</h2>
                </div>
                <div class="right">
                    <div id="date-range">
                        <span id="start-date"></span>
                        <span id="date-range-divider">-</span>
                        <span id="end-date"></span>
                    </div>
                    <div id="date-arrows">
                        <div id="previous"><i class="icon-arrow-left"></i></div>
                        <div id="next"><i class="icon-arrow-right"></i></div>
                    </div>
                </div>

            </div>

        </div>

        <div id="week" class="calendar-view table">

            <div class="table-headings">
                <div class="tech-name">Salesperson</div>
                <div>Monday 00</div>
                <div>Tuesday 00</div>
                <div>Wednesday 00</div>
                <div>Thursday 00</div>
                <div>Friday 00</div>
                <div>Saturday 00</div>
                <div>Sunday 00</div>
            </div>

        </div>

    </section>


    <?php require_once('../portals/footer.php'); ?>

</div>

<script>
    <?php require_once "../../Integration/urlsplit.js" ?>
</script>

<script>

    $(document).ready(function(){

        startDate = moment().startOf('isoWeek').format('YYYY-MM-DD');
        endDate = moment().startOf('isoWeek').add(6, 'days').format('YYYY-MM-DD');

        $('#start-date').html(moment(startDate).format('MMM D, YYYY'));
        $('#end-date').html(moment(endDate).format('MMM D, YYYY'));

        $('#week .table-headings div:not(.tech-name)').each(function(i) {
            let iterationDate = moment(startDate).add(i, 'days').format('DD');
            let dayName = $(this).text().slice(0,-3);
            $(this).html(dayName + ' ' + iterationDate);
        });

        postNewDate(startDate, endDate);

        $(".icon-arrow-left").click(function(){

            startDate = moment(startDate, 'YYYY-MM-DD').subtract(7, 'days').format('YYYY-MM-DD');
            endDate =  moment(endDate, 'YYYY-MM-DD').subtract(7, 'days').format('YYYY-MM-DD');

            $('#start-date').html(moment(startDate).format('MMM D, YYYY'));
            $('#end-date').html(moment(endDate).format('MMM D, YYYY'));

            $('#week .table-headings div:not(.tech-name)').each(function(i) {
                let iterationDate = moment(startDate).add(i, 'days').format('DD');
                let dayName = $(this).text().slice(0,-3);
                $(this).html(dayName + ' ' + iterationDate);
            });

            postNewDate(startDate, endDate);

        });

        $(".icon-arrow-right").click(function(){

            startDate = moment(startDate, 'YYYY-MM-DD').add(7, 'days').format('YYYY-MM-DD');
            endDate =  moment(endDate, 'YYYY-MM-DD').add(7, 'days').format('YYYY-MM-DD');

            $('#start-date').html(moment(startDate).format('MMM D, YYYY'));
            $('#end-date').html(moment(endDate).format('MMM D, YYYY'));

            $('#week .table-headings div:not(.tech-name)').each(function(i) {
                let iterationDate = moment(startDate).add(i, 'days').format('DD');
                let dayName = $(this).text().slice(0,-3);
                $(this).html(dayName + ' ' + iterationDate);
            });

            postNewDate(startDate, endDate);

        });

        $('.table').scroll(function() {
            $('.table .table-headings').css('top', $('.table').scrollTop());

        });

        $("#week").on('click', '.event', function(){
            window.open('./lead-info.php?id=' + $(this).data().dealid);
        });

        function putJobsOnSchedule(jobs){
            //console.log(jobs);
            $(".table-row").remove();
            jobs = $.parseJSON(jobs);

            let techs = _.groupBy(jobs, 'USER_ID');

            _.each(techs, function(jobs, userId) {

                $('#week').append(
                    '<div class="table-row">' +
                    '<div class="table-cell tech-name">' +
                    '<a href="edit-user.php?userId=' + userId + '">' + jobs[0].USER_FIRST_NAME + '<br>' + jobs[0].USER_LAST_NAME  + '</a>' +
                    '</div>' +
                    '</div>'
                );

                for (i=0; i < 7; i++){

                    $('#week').find('.table-row:last-child').append(
                        '<div class="table-cell events"></div>'
                    );

                    if (jobs.length > 0) {

                        _.each(jobs, function(job) {

                            let scheduledDate = moment(job.SCHEDULED_DATE_TIME, 'YYYY-MM-DD');
                            let scheduledTime = moment(job.SCHEDULED_DATE_TIME).format('h:mm A');

                            let iterationDate = moment(startDate, 'YYYY-MM-DD').add(i, 'days');

                            if (iterationDate.isSame(scheduledDate)) {

                                $('#week').find('.table-row:last-child .table-cell:last-child').append(
                                    '<div class="event" data-dealId="' + job.JOB_ID + '">' +
                                    '<i class="event-type icon-home"></i>' +
                                    '<div class="event-info">' +
                                    '<div class="event-time">' + scheduledTime + '</div>' +
                                    '<div class="event-customer">' + (job.DATA_1).toLowerCase() + '</div>' +
                                    '</div>' +
                                    '</div>'
                                );
                            }

                        });

                    }

                }

            });
        }

        function postNewDate(start, end){
            $.ajax({
                type:'POST',
                url:'calendar.php',
                data:{
                    "start-date":start,
                    "end-date":end,
                    "company-id":url_split(window.location.search).companyId
                },
                success:function(data){
                    putJobsOnSchedule(data);
                }
            });
        }

    });
</script>

</body>
</html>
