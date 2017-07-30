<?php

    require_once "../../Integration/Connection.php";

    $loggedInUser = $_GET["user"];

    $dbConn = new Connection();
    $sql = $dbConn->prepare("SELECT JOB_ID, SCHEDULED_JOBS.USER_ID, USR.USER_FIRST_NAME, USR.USER_LAST_NAME, SCHEDULED_DATE_TIME, DATA_1, DATA_2, DATA_3
                              FROM SCHEDULED_JOBS JOIN USR ON SCHEDULED_JOBS.USER_ID = USR.USER_ID WHERE SCHEDULED_JOBS.COMPANY_ID = ? AND SCHEDULED_DATE_TIME BETWEEN '2017-04-16' AND '2017-04-22'");
    try{
        $sql->execute(array($_GET["company-id"]));

    } catch(Exception $ex) {
        print_r($ex);
    }

    if($sql->rowCount() > 0){
        $jobsGroupedByTech = array();

        $calendar = array();

        $schedule = array(
                "user" => false,
                "monday" => [],
                "tuesday" => [],
                "wednesday" => [],
                "thursday" => [],
                "friday" => [],
                "saturday" => [],
                "sunday" => []
        );

        $rows = $sql->fetchAll(PDO::FETCH_OBJ);

        foreach($rows as $row){
            /**
             * adds SCHEDULED_DAY TO EACH RESULT FROM DATABASE
             */
            $row->SCHEDULED_DAY = strftime("%u", strtotime($row->SCHEDULED_DATE_TIME));
            /**
             *
             */
            $jobsGroupedByTech[$row->USER_ID][] = $row;
        }

        //echo "<pre>";print_r($jobsGroupedByTech);echo "</pre>";die();

        foreach($jobsGroupedByTech as $jobs){
            foreach($jobs as $job){
                $schedule["user"] = $job->USER_FIRST_NAME." ".$job->USER_LAST_NAME;
                if($job->SCHEDULED_DAY == 1){
                    $schedule["monday"][] = $job;
                } elseif($job->SCHEDULED_DAY == 2) {
                    $schedule["tuesday"][] = $job;
                } elseif($job->SCHEDULED_DAY == 3) {
                    $schedule["wednesday"][] = $job;
                } elseif($job->SCHEDULED_DAY == 4) {
                    $schedule["thursday"][] = $job;
                } elseif($job->SCHEDULED_DAY == 5) {
                    $schedule["friday"][] = $job;
                } elseif($job->SCHEDULED_DAY == 6) {
                    $schedule["saturday"][] = $job;
                } elseif($job->SCHEDULED_DAY == 7) {
                    $schedule["sunday"][] = $job;
                }
            }
            $calendar[] = $schedule;
           //echo "<pre>";print_r($calendar);echo "</pre>";die();
        }

        if($_POST["calendar"]){
            //die(json_encode($calendar));
        }

        function countDaysJobs($jobs){
            //echo "<pre>";print_r($jobs);echo "</pre>";
            $thisJob = "";
            foreach($jobs as $job){
            //echo "<pre>";print_r($job);echo"</pre>";
                $time = convertDateTimeToTimeOnly($job->SCHEDULED_DATE_TIME);
                $thisJob .= '<div class="event" data-dealId="'. $job->JOB_ID.'">
                                <i class="event-type icon-home"></i>
                                <div class="event-info">
                                    <div class="event-time">'. $time .'</div>
                                    <div class="event-customer">'. $job->DATA_1 .'</div>
                                </div>
                            </div>';
            }
            return $thisJob;
        }

//                function countDaysJobs($jobs){
//            print_r($jobs);
//            echo  "<br><br>"
//            while($getJobs = array_shift($jobs)){
//                print_r($jobs);
//                $thisJob = false;
//            //foreach($jobs as $job){
//                $time = convertDateTimeToTimeOnly($jobs[0]->SCHEDULED_DATE_TIME);
//                $thisJob .= '<div class="event" data-dealId="'. $jobs[0]->JOB_ID.'">
//                                <i class="event-type icon-home"></i>
//                                <div class="event-info">
//                                    <div class="event-time">'. $time .'</div>
//                                    <div class="event-customer">'. $jobs[0]->DATA_1 .'</div>
//                                </div>
//                            </div>';
//            //}
//            return $thisJob;
//
//                    }
////
//        }





        function convertDateTimeToTimeOnly($dateTimeString){
            $time = explode(" ", $dateTimeString)[1];
            return strftime("%I:%M %p", strtotime($time));
        }

        function populateRow($jobs){
            return '<div class="table-row">
                <div class="table-cell">
                    <a href="edit-user.php?userId=12345" class="user-name">'. $jobs["user"] .'</a>
                    <div class="num-events"></div>
                </div>
                <div class="table-cell events">'.
                countDaysJobs($jobs["monday"])
                .'</div>
                <div class="table-cell events date-2017-4-03">'.
                countDaysJobs($jobs["tuesday"])
                .'</div>
                <div class="table-cell events date-2017-4-03">'.
                countDaysJobs($jobs["wednesday"])
                .'</div>
                <div class="table-cell events date-2017-4-03">'.
                countDaysJobs($jobs["thursday"])
                .'</div>
                <div class="table-cell events date-2017-4-03">'.
                countDaysJobs($jobs["friday"])
                .'</div>
                <div class="table-cell events date-2017-4-03">'.
                countDaysJobs($jobs["saturday"])
                .'</div>
                <div class="table-cell events date-2017-4-03">'.
                countDaysJobs($jobs["sunday"])
                .'</div>
            </div>';
        }



    } else {
        print_r($sql->rowCount());
    }

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">

<title>Calendar | SableCRM+ Admin Portal</title>

<?php require_once('partials/head.php'); ?>

</head>

<body>

<?php require_once('partials/header.php'); ?>

<section id="calendar" class="page">

    <div id="page-heading-container" class="container">
        <div id="page-heading">
            <i class="icon-calendar"></i>
            <div id="page-heading-text">
                <h1>Calendar</h1>
                <p>Admin Portal</p>
            </div>
        </div>
    </div>

    <div class="container">

        <div id="calendar-header">
            <div class="left">
                <h2>Week</h2>
            </div>
            <div class="right">
                <div id="date-range">April 3 - April 9, 2017</div>
                <div id="date-arrows">
                    <div id="previous"><i class="icon-arrow-left"></i></div>
                    <div id="next"><i class="icon-arrow-right"></i></div>
                </div>
            </div>
        </div>

        <div id="week" class="calendar-view table">

            <div class="table-headings">
                <div>Technician</div>
                <div class="today">Monday 03</div>
                <div>Tuesday 04</div>
                <div>Wednesday 05</div>
                <div>Thursday 06</div>
                <div>Friday 07</div>
                <div>Saturday 08</div>
                <div>Sunday 09</div>
            </div>

            <?php

            foreach($calendar as $user){
                //echo "<pre>";print_r($calendar);echo "</pre>";die();
                echo populateRow($user);
            }

            ?>

<!--            <div class="table-row">-->
<!--                <div class="table-cell">-->
<!--                    <a href="edit-user.php?userId=12345" class="user-name">Paul Moore</a>-->
<!--                    <div class="num-events">5 events</div>-->
<!--                </div>-->
<!--                <div class="table-cell events">-->
<!--                    <div class="event" data-dealId="123456">-->
<!--                        <i class="event-type icon-home"></i>-->
<!--                        <div class="event-time">8 AM</div>-->
<!--                        <div class="event-customer">mon1</div>-->
<!--                    </div>-->
<!--                    <div class="event" data-dealId="123456">-->
<!--                        <i class="event-type icon-wrench"></i>-->
<!--                        <div class="event-time">10 AM</div>-->
<!--                        <div class="event-customer">mon2</div>-->
<!--                    </div>-->
<!--                    <div class="event" data-dealId="123456">-->
<!--                        <i class="event-type icon-home"></i>-->
<!--                        <div class="event-time">12:30 PM</div>-->
<!--                        <div class="event-customer">mon3</div>-->
<!--                    </div>-->
<!--                    <div class="event" data-dealId="123456">-->
<!--                        <i class="event-type icon-wrench"></i>-->
<!--                        <div class="event-time">2:15 PM</div>-->
<!--                        <div class="event-customer">mon4</div>-->
<!--                    </div>-->
<!--                    <div class="event" data-dealId="123456">-->
<!--                        <i class="event-type icon-wrench"></i>-->
<!--                        <div class="event-time">4 PM</div>-->
<!--                        <div class="event-customer">mon5</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="table-cell events date-2017-4-03">-->
<!--                    <div class="event">-->
<!--                        <i class="event-type icon-home"></i>-->
<!--                        <div class="event-time">8 AM</div>-->
<!--                        <div class="event-customer">Customer</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="table-cell events date-2017-4-03">-->
<!--                    <div class="event">-->
<!--                        <i class="event-type icon-wrench"></i>-->
<!--                        <div class="event-time">8 AM</div>-->
<!--                        <div class="event-customer">Customer</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="table-cell events date-2017-4-03">-->
<!--                    <div class="event">-->
<!--                        <i class="event-type icon-wrench"></i>-->
<!--                        <div class="event-time">8 AM</div>-->
<!--                        <div class="event-customer">Customer</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="table-cell events date-2017-4-03">-->
<!--                    <div class="event">-->
<!--                        <i class="event-type icon-wrench"></i>-->
<!--                        <div class="event-time">8 AM</div>-->
<!--                        <div class="event-customer">Customer</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="table-cell events date-2017-4-03">-->
<!--                    <div class="event">-->
<!--                        <i class="event-type icon-wrench"></i>-->
<!--                        <div class="event-time">8 AM</div>-->
<!--                        <div class="event-customer">Customer</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="table-cell events date-2017-4-03">-->
<!--                    <div class="event">-->
<!--                        <i class="event-type icon-wrench"></i>-->
<!--                        <div class="event-time">8 AM</div>-->
<!--                        <div class="event-customer">Customer</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="table-row">-->
<!--                <div class="table-cell">-->
<!--                    <a href="edit-user.php?userId=12345" class="user-name">Keanu Reeves</a>-->
<!--                    <div class="num-events">1 event</div>-->
<!--                </div>-->
<!--                <div class="table-cell events date-2017-4-03">-->
<!--                    <div class="event">-->
<!--                        <i class="event-type icon-wrench"></i>-->
<!--                        <div class="event-time">8 AM</div>-->
<!--                        <div class="event-customer">Customer</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="table-cell events date-2017-4-03">-->
<!--                    <div class="event">-->
<!--                        <i class="event-type icon-wrench"></i>-->
<!--                        <div class="event-time">8 AM</div>-->
<!--                        <div class="event-customer">Customer</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="table-cell events date-2017-4-03">-->
<!--                    <div class="event">-->
<!--                        <i class="event-type icon-wrench"></i>-->
<!--                        <div class="event-time">8 AM</div>-->
<!--                        <div class="event-customer">Customer</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="table-cell events date-2017-4-03">-->
<!--                    <div class="event">-->
<!--                        <i class="event-type icon-wrench"></i>-->
<!--                        <div class="event-time">8 AM</div>-->
<!--                        <div class="event-customer">Customer</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="table-cell events date-2017-4-03">-->
<!--                    <div class="event">-->
<!--                        <i class="event-type icon-wrench"></i>-->
<!--                        <div class="event-time">8 AM</div>-->
<!--                        <div class="event-customer">Customer</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="table-cell events date-2017-4-03">-->
<!--                    <div class="event">-->
<!--                        <i class="event-type icon-wrench"></i>-->
<!--                        <div class="event-time">8 AM</div>-->
<!--                        <div class="event-customer">Customer</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="table-cell events date-2017-4-03">-->
<!--                    <div class="event">-->
<!--                        <i class="event-type icon-wrench"></i>-->
<!--                        <div class="event-time">8 AM</div>-->
<!--                        <div class="event-customer">Customer</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

        </div>

    </div>

</section>

<?php require_once('partials/footer.php'); ?>

<div id="modal-container">

</div>

<script>
    $(document).ready(function(){
        /**
         * CALENDAR SPECIFIC CODE
         */
        $(".event").click(function(){
            window.location.href = "https://crm.zoho.com/crm/EntityInfo.do?module=Potentials&id="+$(this).data().dealid;
        });

        $(".icon-arrow-right").click(function(){
            console.log($("#date-range").html());
        });

        $(".icon-arrow-left").click(function(){
            console.log($("#date-range").html());
        });

        $.post({
            type:'POST',
            url:'calendar-old.php',
            data:{
                'schedule':true,
                'company-id':'2144870000000459009'
            },
            success:function (data){
                console.log(data);
            }
        });
    })
</script>

</body>
</html>
