<?php

session_start();

//error array to store any errors that occur during the session;
    $error = [];

// if user is logged in, continue with users request.
if($_SESSION["user"]->USER_ID)
{
    // if a job or service is selected, add deal id or service id to session.
    if($_POST["selected-job"])
    {
        $_SESSION["selected-job"] = $_POST["selected-job"];
        $_SESSION["service-id"] = $_POST["service-id"];exit;
    }

    // on page load, get jobs for technician by company.
    if($_POST["get-jobs"])
    {
        require_once "../../Integration/Connection.php";

        $dbConn = new Connection();

        $sql = $dbConn->prepare("SELECT SCHEDULED_JOBS.SCHEDULED_DATE_TIME, SCHEDULED_JOBS.JOB_ID, SCHEDULED_JOBS.DATA_1, SCHEDULED_JOBS.DATA_2, SCHEDULED_JOBS.DATA_3, SCHEDULED_JOBS.SERVICE_ID FROM SCHEDULED_JOBS WHERE SCHEDULED_JOBS.COMPANY_ID = ? AND SCHEDULED_JOBS.USER_ID = ? AND TIMEOFF_ID IS NULL ORDER BY SCHEDULED_JOBS.SCHEDULED_DATE_TIME DESC"
        );

        try
        {
	        $sql->execute(
		        [
			        $_SESSION["user"]->COMPANY_ID,
			        $_SESSION["user"]->USER_ID
		        ]
	        );
        }
        catch(Exception $e)
        {
            $error[] = $e->getMessage();
            print_r($error);exit;
        }


        if($sql->rowCount() > 0)
        {
            $rows = $sql->fetchAll(PDO::FETCH_OBJ);

            // format schedule times to format mm/dd/yy.
            foreach($rows as $row)
            {
                $jobTime = strtotime($row->SCHEDULED_DATE_TIME);
                $row->SCHEDULED_DATE_TIME = strftime("%x %I:%M%p", $jobTime);
            }

            echo json_encode($rows);exit;
        }
        else
        {
            $error = [
                "error" => "NO JOBS WERE FOUND FOR LOGGED IN TECHNICIAN"
            ];
	        echo json_encode($error);exit;
        }
    }
}

// if not logged in, redirect to the login page.
else
{
	header("location: ../portals/login.php");exit;
}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Tech Portal</title>

    <?php require_once "../portals/head.php"?>

</head>
<body>

<div id="tech_portal_container" class="logged_in">

    <?php require_once "../portals/header.php" ?>

    <section id="tech_portal" class="page">

        <div id="page_heading">
            <img src="../images\icon-tech-portal-profile-settings.png"/>
            <div>
                <h1>Tech Portal</h1>
                <div>Online Access to Appointments / Account Setup + Forms</div>
            </div>
        </div>

        <div id="appointments">

            <div id="week_tabs">
                <div id="this_week" class="selected_tab"><img src="../images\icon-this-week.png"/>This Week</div>
                <div id="next_week"><img src="../images\icon-next-week.png"/>Next Week</div>
            </div>

            <div id="appointment_list">

                <!--                <div class="appointment_day">-->
                <!--                    <div class="day_heading">Monday</div>-->
                <!--                    -->
                <!--                    <a data-id="1486524000033313865" class="appointment" href="#">-->
                <!--                        <img src="../images\icon-home-install.png"/>-->
                <!--                        <div class="appointment_datetime">-->
                <!--                            <span class="appointment_date">1/9/2017</span>-->
                <!--                            <span class="hyphen_divider">-</span>-->
                <!--                            <span class="appointment_time">9:00AM:</span>-->
                <!--                        </div>-->
                <!--                        <div class="appointment_customer_info">Kirson, East Windsor NJ</div>-->
                <!--                    </a>-->
                <!--                    <a data-id="1486524000033214999" class="appointment" href="#">-->
                <!--                        <img src="../images\icon-service-appt.png"/>-->
                <!--                        <div class="appointment_datetime">-->
                <!--                            <span class="appointment_date">1/9/2017</span>-->
                <!--                            <span class="hyphen_divider">-</span>-->
                <!--                            <span class="appointment_time">10:30AM:</span>-->
                <!--                        </div>-->
                <!--                        <div class="appointment_customer_info">Hannah, Pell City AL</div>-->
                <!--                    </a>-->
                <!--                </div>-->
                <!--                <div class="appointment_day">-->
                <!--                    <div class="day_heading">Tuesday</div>-->
                <!--                    -->
                <!--                    <a data-id="1486524000033237313" class="appointment" href="#">-->
                <!--                        <img src="../images\icon-home-install.png"/>-->
                <!--                        <div class="appointment_datetime">-->
                <!--                            <span class="appointment_date">1/9/2017</span>-->
                <!--                            <span class="hyphen_divider">-</span>-->
                <!--                            <span class="appointment_time">9:00AM:</span>-->
                <!--                        </div>-->
                <!--                        <div class="appointment_customer_info">Bell, Atlanta GA</div>-->
                <!--                    </a>-->
                <!--                    <a data-id="1486524000033389221" class="appointment" href="#">-->
                <!--                        <img src="../images\icon-service-appt.png"/>-->
                <!--                        <div class="appointment_datetime">-->
                <!--                            <span class="appointment_date">1/9/2017</span>-->
                <!--                            <span class="hyphen_divider">-</span>-->
                <!--                            <span class="appointment_time">10:30AM:</span>-->
                <!--                        </div>-->
                <!--                        <div class="appointment_customer_info">Perez, Grand Prairie, TX</div>-->
                <!--                    </a>-->
                <!--                </div>-->

            </div>

        </div>


    </section>

        <?php require_once "../portals/footer.php" ?>

</div>
</body>
</html>
