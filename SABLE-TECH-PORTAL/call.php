<?php

session_start();

if($_SESSION["user"]->USER_ID)
{
    require_once "../../Integration/post.php";
    require_once "../../Integration/ADC-API/ADC-CLASS.php";
    require_once "../../Integration/credentials.php";
    require_once "../../Integration/apiendpoints.php";
    require_once "../../Integration/ZOHO-API/zoho.php";
    require_once "../../Integration/MONITRONICS-API/GET-DATA/getdata.php";
    require_once "../../Integration/Connection.php";

	//error array to store any errors that occur during the session;
    $error = [];

    $dbConn = new Connection();

    function database($query, $params)
    {
        global $dbConn;
        global $error;

        $rows = false;

        $sql = $dbConn->prepare($query);

        try
        {
	        $sql->execute($params);

	        if($sql->rowCount() > 0)
	        {
		        $rows = $sql->fetchAll(PDO::FETCH_OBJ);
	        }
        }
        catch(Exception $e)
        {
            $error[] = $e->getMessage();
        }
        return $rows;
    }

    $zoho = new Zoho($_SESSION["user"]->ZOHO_AUTH_ID);

	// if job is a service, get service module from crm
	if($_SESSION["service-id"] != "null")
	{
		$service = $zoho->Get("CustomModule9", $_SESSION["service-id"], "array");
	}

    // write tech status to the deal, or service module. time enroute, onsite and completion.
    if(isset($_POST["tech-status"]))
    {
        // get deal module from crm
        $deal = $zoho->Get("Potentials", $_SESSION['selected-job'], "array");

        $query = 'SELECT * FROM sablrcrm_test.SCHEDULED_JOBS WHERE SCHEDULED_JOBS.COMPANY_ID = ? AND SCHEDULED_JOBS.JOB_ID = ?';

        $scheduledJob = database($query,
            [
                $_SESSION["user"]->COMPANY_ID,
                $_SESSION["selected-job"]
            ]
        );

        // if onsite is pressed while on a service, update the service tech arrival field in the service module
	    if($service["Service Tech Arrival"] == "")
	    {
		    $zoho->Set("CustomModule9", $_SESSION["service-id"],
			    json_encode(
				    [
					    "Service Tech Arrival" => strftime($zoho->zoho_time_format)
				    ]
			    )
		    );
	    }

	    // if enroute, onsite or call for survey is pressed while on an install, update the appropriate field in the potentials module
//	    elseif($deal[$_POST["tech-status"]] == "")
//        {
//	        $zoho->Set("Potentials", $_SESSION["selected-job"],
//		        json_encode(
//			        [
//				        $_POST["tech-status"] => strftime($zoho->zoho_time_format)
//			        ]
//		        )
//	        );
//        }

        if($scheduledJob != false)
        {
            if($deal[$_POST["tech-status"]] == "")
            {
	            $zoho->Set("Potentials", $_SESSION["selected-job"],
		            json_encode(
			            [
				            $_POST["tech-status"] => strftime($zoho->zoho_time_format)
			            ]
		            )
	            );

	            switch($_POST["tech-status"])
	            {
		            case "Tech In Route":
			            $query = "UPDATE sablrcrm_test.SCHEDULED_JOBS SET SCHEDULED_JOBS.TECH_ENROUTE = ? WHERE SCHEDULED_JOBS.COMPANY_ID = ? AND SCHEDULED_JOBS.JOB_ID = ?";
			            break;

		            case "Tech Arrival":
			            $query = "UPDATE sablrcrm_test.SCHEDULED_JOBS SET SCHEDULED_JOBS.TECH_ONSITE = ? WHERE SCHEDULED_JOBS.COMPANY_ID = ? AND SCHEDULED_JOBS.JOB_ID = ?";
			            break;

		            case "completed":
			            $query = "UPDATE sablrcrm_test.SCHEDULED_JOBS SET SCHEDULED_JOBS.TECH_COMPLETE = ? WHERE SCHEDULED_JOBS.COMPANY_ID = ? AND SCHEDULED_JOBS.JOB_ID = ?";
			            break;
	            }
	            database($query,
		            [
			            time(),
			            $_SESSION["user"]->COMPANY_ID,
			            $_SESSION["selected-job"]
		            ]
	            );

//	            die(
//	                $zoho->Set("Potentials", $_SESSION["selected-job"],
//                        json_encode(
//                            [
//                                $_POST["tech-status"] => strftime($zoho->zoho_time_format)
//                            ]
//                        )
//                    )
//                );
            }
        }
    }

    // write notes and tech completion time to the service module in crm.
    elseif(isset($_POST["notes"]))
    {
        $data = [
	        "Work Performed" => $_POST["notes"],
            "Service Status" => "Service Completed"
        ];

        if($service["Service Tech Completion"] == "")
        {
	        $data["Service Tech Completion"] = strftime($zoho->zoho_time_format);
        }

        $zoho->Set("CustomModule9", $_SESSION["service-id"],
	        json_encode(
                $data
	        )
        );

	    // remove service from technicians schedule
        $query = "DELETE FROM sablrcrm_test.SCHEDULED_JOBS WHERE SCHEDULED_JOBS.COMPANY_ID = ? AND SCHEDULED_JOBS.JOB_ID = ?";

        database($query,
            [
	            $_SESSION["user"]->COMPANY_ID,
	            $_SESSION["selected-job"]
            ]
        );
    }

    else
    {
        $_SESSION["deal-info"] = $zoho->Get("Potentials", $_SESSION["selected-job"], "array");

        // create a unix timestamp from date/time.
        $dateTime = strtotime($_SESSION["deal-info"]["Install Date and Time"]);

        // format date/time to mm/dd/yyyy 00:00AM and split into date and time.
        $install_date_time = explode(" ", strftime("%x %I:%M%p", $dateTime));

        $address_state = ($_SESSION["deal-info"]["State"]) ? $_SESSION["deal-info"]["State"] : $_SESSION["deal-info"]["Province"];

        $address_zip = ($_SESSION["deal-info"]["Zip"]) ? $_SESSION["deal-info"]["Zip"] : $_SESSION["deal-info"]["Postal Code"];

        $customer_name = explode(" ", $_SESSION["deal-info"]["Contact Name"]);

        if(sizeof($customer_name) > 2)
        {
            $firstname = $customer_name[1];
            $lastname = $customer_name[2];
        }
        elseif(sizeof($customer_name) == 2)
        {
            $firstname = $customer_name[0];
            $lastname = $customer_name[1];
        }

        $wsi = new GetData($_SESSION["user"]->MONI_USER, $_SESSION["user"]->MONI_PASSWORD);

        $comm = new Post($endpoint["moni"], $actionendpoint["moni"]);
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

    <title>Call | Tech Portal</title>

    <?php require_once "../portals/head.php"?>

</head>
<body>

<div id="tech_portal_container" class="logged_in">

    <?php require_once "../portals/header.php" ?>

    <section id="call_page" class="page">

        <div id="appointment_overview">
            <div class="left">
                <img src="../images\icon-home-install-large.png"/>
                <div>
                    <div id="overview_appointment_type"><?php echo ($_SESSION["service-id"] != "null") ? "Site Service" : "New Install" ?></div>
                    <div id="overview_service_number"><?php echo $_SESSION["deal-info"]["CS Number"] ?></div>
                </div>
            </div>
            <div class="right">
                <div>
                    <div class="overview_heading">Date/Time</div>
                    <div id="overview_datetime">
                        <span id="overview_date"><?php echo $install_date_time[0] ?></span> -
                        <span id="overview_time"><?php echo $install_date_time[1] ?></span>
                    </div>
                </div>
                <div>
                    <div class="overview_heading">Customer</div>
                    <div>
                        <div id="overview_address_1"><?php echo $_SESSION["deal-info"]["Contact Name"] ?></div>
                        <div id="overview_address_2"><?php echo $_SESSION["deal-info"]["City"].", ".$address_state ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div id="call_modules">
            <?php require_once "modules/customer-info.php" ?>
            <?php require_once "modules/tech-status.php" ?>
            <?php require_once "modules/alarmcom-services.php" ?>
            <?php require_once "modules/install-info.php" ?>
            <?php require_once "modules/site-test.php" ?>
            <?php require_once "modules/zone-list.php" ?>
            <?php require_once "modules/automation-devices.php" ?>
            <?php require_once "modules/video-devices.php" ?>
            <?php require_once "modules/event-history.php" ?>
            <?php
                if($_SESSION["service-id"] != "null")
                {
                    require_once "modules/service-notes.php";
                }
            ?>
        </div>

    </section>

</div>
<div id="message-container"><div id="message"></div></div>
<script>
    $(document).ready(function()
    {
        $(".module-header").click(function () {
            $(this).siblings("*").slideToggle(500).css("display", "flex");
            $(this).children(".collapse-toggle").toggleClass("collapsed");
        });

//        $('.module-header .collapse-toggle').click(function()
//        {
//            $(this).parent().siblings().slideToggle(500);
//        });


        //UPDATES THE UI FOR THE TECHNICIAN STATUS MODULE WHEN BUTTON IS CLICKED
        $('#tech_status').find('input[type=radio], input[type=button]').click(function(){
            if($(this).attr('type') == 'button'){
                $(this).siblings().prop('checked', true);
            }
            if($(this).val().toLowerCase() == 'on site'){
                $('#tech_status .check_icon_solid').fadeOut(400, function(){
                    $(this).attr('src', '../images\\green-check-icon.png').fadeIn();
                    $('#alarmcom-services .module-header img').click();
                });
                $('#tech_status #status_text').html('On Site').css('color', 'green');
                UpdateTechStatus('Tech Arrival');
            }
            else if($(this).val().toLowerCase() == 'in route'){
                $('#tech_status .check_icon_solid').fadeOut(400, function(){
                    $(this).attr('src', '../images\\alert-icon.png').fadeIn();
                });
                $('#tech_status #status_text').html('In Route').css('color', 'orange');
                UpdateTechStatus('Tech In Route');
            }
            else if($(this).val().toLowerCase() == 'not on site'){
                $('#tech_status .check_icon_solid').fadeOut(400, function(){
                    $(this).attr('src', '../images\\red-x-icon.png').fadeIn();
                });
                $('#tech_status #status_text').html('Not On Site').css('color', 'red');
            }
        });
        //SELECT TECH NOT ON SITE WHEN FORM LOADS
        $('#not_on_site input[type=button]').click();


        // post service notes to service module
        $("#service_notes").find("input").on("click", function()
        {
            // update service module. append tech notes to module.
            $.post({
                type:"post",
                url:"call.php",
                data: {
                    "notes":$("#work-performed").val()
                },
                success:function(data)
                {
                    DisplayMessage("Your notes have been successfully updated.");
                }
            });
        });


        //POST TECHNICIAN STATUS TO CRM
        function UpdateTechStatus(status) {
            $.post({
                type:'POST',
                url:'call.php',
                data:{
                    'tech-status':status
                },
                success:function (result) {
                    console.log(result);
                }
            });
        }


        $('#tech_nav').click(function()
        {
            $('#dropdown_nav').slideToggle(500);
        });


        $('#week_tabs div').click(function(e)
        {
            $('#week_tabs div').removeClass('selected_tab');
            $(this).addClass('selected_tab');
        });


        $('#message-container').click(function(){
            $(this).slideToggle().css('display', 'flex');
        });


        $('#js_zone_module').click(function(event){
            let state = $(event.target).parent();

            if(state.hasClass('zone-delete')){
                $(event.target).parent().parent().slideUp({complete:function(){this.remove()}});
                ZoneHighlight();
            }

//            else if(state.hasClass('zone-save')){
//                SaveZone($(event.target).parent().parent());
//                ZoneHighlight();
//            }
//
//            else if(state.hasClass('zone-edit')){
//                EditZone($(event.target).parent().parent());
//                ZoneHighlight();
//            }
        });


        function ParseJson(string, debug){
            let jsonString = '';
            if(string.match(/"\[\\\"{.+\}\\\"]"/)){
                jsonString = JSON.parse(string);
                if(debug){
                    console.log('first stage: ' + jsonString);
                }
            }else{
                jsonString = string;
            }
            try{
                jsonString = JSON.parse(jsonString);
                if(debug){
                    console.log('second stage: ' + jsonString);
                    console.log('second stage: ' + jsonString.length);
                }
                if(jsonString.length > 1){
                    let strings = [];
                    for(let i = 0; i < jsonString.length; i++){
                        strings.push(JSON.parse(jsonString[i]));
                        if(debug){
                            console.log('third stage: ' + jsonString[i]);
                        }
                    }
                    return strings;
                }else{
                    return jsonString;
                }
            }catch(ex){
                return{
                    error : true,
                    message : ex,
                    input : string
                }
            }
        }


//        function EditZone(zone){
//            $('.zone-edit', zone).removeClass('zone-edit').addClass('zone-save');
//            $('.zone-save img', zone).attr('src', '../images\\save-icon.png');
//            $('.zone-number', zone).html('<input type="text" value="' +
//                $('.zone-number', zone).html() + '" placeholder="#" maxlength="3" required>');
//            $('.zone-name', zone).html('<input type="text" value="' +
//                $('.zone-name', zone).html() + '" placeholder="ZONE NAME" required>');
//            return zone;
//        }

/* OLD FUNCTIONS FOR EDITING AND SAVING ZONES

        $('#edit_zones, #add_zone').on('click', function () {
            if($('.edit-all').length > 0){
                EditZone();
                $('#edit_zones').val('Save Zones').removeClass('edit-all').addClass('save-all');
            }
        });


        $('#edit_zones').on('click', function(){
            if($('.save-all').length > 0){
                SaveZone();
                $('#edit_zones').val('Edit Zones').removeClass('save-all').addClass('edit-all');
            }
        });



        function SaveZone(){
            $('#js_zone_module').find('.zone').each(function () {
                //$('.zone-save', this).removeClass('zone-save').addClass('zone-edit');
                //$('.zone-edit img', this).attr('src', '../images\\edit-icon.png');
                $('.zone-number', this).html($('.zone-number input', this).val());
                $('.zone-name', this).html($('.zone-name input', this).val());
                return this;
            });
        }


        function EditZone() {
            $('#js_zone_module').find('.zone').each(function () {
                //$('.zone-edit', this).removeClass('zone-edit').addClass('zone-save');
                //$('.zone-save img', this).attr('src', '../images\\save-icon.png');
                $('.zone-number', this).html('<input type="text" value="' +
                    $('.zone-number', this).html() + '" placeholder="#" maxlength="3" required>');
                $('.zone-name', this).html('<input type="text" value="' +
                    $('.zone-name', this).html() + '" placeholder="ZONE NAME" required>');
                return this;
            });
        }
*/

/* NEW FUNCTIONS FOR EDITING AND SAVING ZONES */

function SaveZone() {
    $('#js_zone_module .zone').each(function() {
        let zoneNumber = $(this).find('.zone-number input').val();
        let zoneName = $(this).find('.zone-name input').val();
        $(this).children('.zone-number').html(zoneNumber);
        $(this).children('.zone-name').html(zoneName);
    });
}


function EditZone() {
    $('#js_zone_module .zone').each(function() {
        let zoneNumber = $(this).children('.zone-number').html();
        let zoneName = $(this).children('.zone-name').html();
        $(this).children('.zone-number').html('<input type="text" value="' +
            zoneNumber + '" placeholder="#" maxlength="3" required/>');
        $(this).children('.zone-name').html('<input type="text" value="' +
            zoneName + '" placeholder="ZONE NAME" required/>');
    });
}

$('#add_zone').on('click', function() {
    AddZones();
    ZoneHighlight();
    $('#edit_zones').val('Save Zones').removeClass('edit-all').addClass('save-all');
});


$('#edit_zones').on('click', function() {
    if ($(this).hasClass('edit-all')) {
        EditZone();
        $('#edit_zones').val('Save Zones').removeClass('edit-all').addClass('save-all');
    } else if ($(this).hasClass('save-all')) {
        SaveZone();
        $('#edit_zones').val('Edit Zones').removeClass('save-all').addClass('edit-all');
    }
    ZoneHighlight();
});


//        $('.save-all').click(function () {
//            console.log('hello world');
//            console.log(this);
//        });


//        function SaveZone(zone){
//            $('.zone-save', zone).removeClass('zone-save').addClass('zone-edit');
//            $('.zone-edit img', zone).attr('src', '../images\\edit-icon.png');
//            $('.zone-number', zone).html($('.zone-number input', zone).val());
//            $('.zone-name', zone).html($('.zone-name input', zone).val());
//            return zone;
//        }


        //preload options in the event type dropdown and the device type dropdown
        function Options(type){
            let options = '';
            let selected = '';
            $($('#js_zone_module').data()[type]).each(function(){
                selected = (this.descr.trim() == 'Burglary' || this.descr.trim() == 'Contact(Door)') ? 'selected' : '';
                options += '<option ' + selected + ' value="' + this[type].trim() + '">' + this.descr.trim() + '</option>';
            });
            return options;
        }


        function ZoneHighlight(){
            let alarmZones = [];
            $.post({
                type:'POST',
                url:'input-data-in-CRM.php',
                data:{
                    "cs-number":$('#overview_service_number').html(),
                    "action":"zone-highlight"
                },
                success:function(result){
                    let eventHistory = '';
                    try{
                        eventHistory = JSON.parse(result);
                    }catch(ex){ console.log(ex) }

                    let zoneContainer = $('#js_zone_module .zone');

                    $(eventHistory).each(function(){
                        alarmZones.push(this.zone_id);
                    });

                    let ZonesNotReceived = [];
                    zoneContainer.each(function(){
                        if($.inArray($('.zone-number', this).html(), alarmZones) != -1){
                            $('.zone-tested img', this).attr('src', '../images\\green-check-icon.png');
                        }
                        else {
                            $('.zone-tested img', this).attr('src', '../images\\red-x-icon.png');
                            ZonesNotReceived.push(true);
                        }
                    });

                    if(ZonesNotReceived.length == 0 && $('#js_zone_module .zone').length > 0){
                        $('#test-requirement-notice .zone-tested img').attr('src', '../images\\green-check-icon.png').addClass('all-zones-received');
                        $('#test-requirement-notice p').html('All zones have been successfully tested!');
                    }
                    else{
                        $('#test-requirement-notice .zone-tested img').attr('src', '../images\\red-x-icon.png').removeClass('all-zones-received');
                        $('#test-requirement-notice p').html('All zones have <strong>&nbsp;NOT&nbsp;</strong> been successfully tested!');
                    }
                }
            });
        }


        function DisplayMessage(message){
            if(message){
                $('#message').html('').html(message);
                $('#message-container').trigger('click');
            }
        }


        function ZonesToJson(){
            let zones = [];
            $('#js_zone_module .zone').each(function(){
                zones.push('{"zone_id":"' + $('.zone-number', this).html() + '",' +
                        '"existing":"' + $(".zone-existing input", this).prop("checked") + '",' +
                    '"zone_comment":"' + $('.zone-name', this).html() + '",' +
                    '"event_id":"' + $('.zone-type select', this).val() + '",' +
                    '"equiptype_id":"' + $('.zone-hardware select', this).val() + '"}');
            })
            return JSON.stringify(zones);
        }


        //updates the default hours for site test on page load and whenever the test category has been changed
        $('#test-category select').change(function(){
            let test_hours = document.querySelector('#test-hours select').children;
            let default_hours = document.querySelector('#test-category select');

            default_hours = '0' + default_hours.selectedOptions[0].dataset.default_hours;

            for (let i = 0; i < test_hours.length; i++) {
                if (test_hours[i].value === default_hours) {
                    test_hours[i].selected = true;
                }

                else {
                    test_hours[i].selected = false;
                }
            }
        }).trigger('change');


        /**
         * register alarm.com module
         */
        $('#activate-adc').click(function(){
            let response = '';

            $.post({
                type:'POST',
                url:'input-data-in-CRM.php',
                data:{
                    "adc":"true",
                    "adc-create":"true",
                    "serial-no":$('#adc-serial').val()
                },
                success:function(result){
                    try{
                        response = JSON.parse(result);
                    }catch(ex){ console.log(ex) }

                    if(response.Success == 'true'){
                        $('#adc-heading').html('Successfully Registered Cell').css('color', 'green');
                        $('#adc-login').html(response.LoginName);
                        $('#adc-password').html(response.Password);
                        $('#adc-id').html(response.CustomerId);
                    }
                    else if(response.Success == 'false'){
                        $('#adc-heading').html('Cell Registration Failure: ' + response.errorMessage).css('color', 'red');
                    }
                    else if(response.terminateError){
                        $('#adc-heading').html('Cell Registration Failure: ' + response.terminateError).css('color', 'red');
                    }
                    else{
                        let message = '';
                        $(response).each(function(){
                            message += this;
                        });
                        DisplayMessage(message);
                    }
                }
            });
        });


        /**
         * get alarm.com zones
         */
        $('#zone-list .refresh-icon, #zone-list .module-header').click(function(){
            $.post({
                type:'POST',
                url:'input-data-in-CRM.php',
                data:{
                    "adc":"true",
                    "adc-zones":"true"
                },
                success:function(result){
                    console.log(result);
                    let zones = '';
                    try{
                        zones = JSON.parse(result);
                    }catch(ex){ console.log(ex) }
                    $('#js_zone_module').html('');
                    $(zones).each(function(){
                        AddZones(this);
                    });
                    $('#edit_zones').trigger('click');
                    ZoneHighlight();
                }
            });
        });


        $('#event-history .refresh-icon, #filter-date, #sort-events, #event-history .module-header').click(function(){
            $.post({
                type:'POST',
                url:'input-data-in-CRM.php',
                data:{
                    "cs-number":$('#overview_service_number').html(),
                    "start-date":$('#date-from').val(),
                    "end-date":$('#date-to').val(),
                    "event-filter":$('#sort-method').val(),
                    "action":(this.id) ? this.id : this.className
                },
                success:function(result){
                    console.log(result);
                    let eventHistory = '';
                    let eventHistoryContainer = $('#event-history .module-body').html('');
                    try{
                        eventHistory = JSON.parse(result);
                    }catch(ex){ console.log(ex) }

                    if(eventHistory.status != 'false'){
                        $(eventHistory).each(function(){
                            eventHistoryContainer.append('<div class="event">' +
                                '<div class="event-date">' + this.event_date + '</div>' +
                                '<div class="event-zone">' + this.zone_id + '</div>' +
                                '<div class="event-id">' + this.event_id + '</div>' +
                                '<div class="event-state">' + this.zonestate_id + '</div>' +
                                '<div class="event-match">' + this.match_id + '</div>' +
                                '<div class="event-computed">' + this.computed + '</div>' +
                                '</div>'
                            );
                        });
                    }
                }
            });
        });


        $('#call_for_survey').click(function(){
            if($('#test-requirement-notice .zone-tested img').hasClass('all-zones-received')){
                $.post({
                    type:'POST',
                    url:'add-zones-to-database.php',
                    data:{
                        "zones":ZonesToJson()
                    },
                    success:function(result){
                        if(result == 1){
                            DisplayMessage('SUCCESSFULLY EMAILED OPERATIONS AND  UPLOADED ZONELIST TO SABLE TO PUT ACCOUNT ONLINE.');
                        }
                        else{
                            console.log(result);
                        }
                    }
                });
            }
            else{
                DisplayMessage('ALL ZONES MUST BE TESTED AND RECEIVED AT CENTRAL STATION TO CONTINUE.');
            }
        });


        $('#add-two-way').click(function(){
            if($('#test-requirement-notice .zone-tested img').hasClass('all-zones-received')){
                $.ajax({
                    type:'POST',
                    url:'ADD_TWOWAY_DEVICE.php',
                    data:{
                        "cs-number":$('#overview_service_number').html(),
                        "panel-type":$('#panel_type input').val()
                    },
                    success:function(data){
                        let result = '';
                        try{
                            result = JSON.parse(data);
                        }catch(ex){ console.log(ex) }
                        DisplayMessage(result.err_msg);
                    }
                });
            }
            else{
                $('#message').html('ALL ZONES MUST BE TESTED BEFORE TESTING TWOWAY!');
                $('#message-container').trigger('click');
            }
        });


        $('#apply-test, #cancel-test').click(function(){
            $.ajax({
                type:'POST',
                url:'SITE_TEST.php',
                data:{
                    "cs-number":$('#overview_service_number').html(),
                    "state":(this.id == 'apply-test') ? 'On' : 'Off',
                    "testCat":(this.id == 'apply-test') ? $('#test-category select').val() : '',
                    "hr":(this.id == 'apply-test') ? $('#test-hours select').val() : '',
                    "min":(this.id == 'apply-test') ? $('#test-minutes select').val() : ''
                },
                success:function(data){
                    let result = '';
                    try{
                        result = JSON.parse(data);
                    }catch(ex){ console.log(ex) }

                    try{
                        if(result[0].ontest_flag.trim() == 'yes'){
                            let d = new Date(result[0].ontest_expire_date.trim());
                            d = d.toLocaleDateString() + ' @ ' + d.toLocaleTimeString();
                            $('#test-end-date').html(d);
                            $('#site-test').addClass('testing');
                        }
                        else if(result[0].ontest_flag.trim() == 'no'){
                            $('#site-test').removeClass('testing');
                        }
                    }
                    catch(ex){
                        if(result.error){
                            DisplayMessage(result.error);
                        }
                        else{
                            console.log(ex)
                        }
                    }
                }
            });
        });


        /**
         * update data in crm
         */
        $('#adc-serial, #panel_location input, #transformer_location input').change(function(event){
            $.post({
                type:'POST',
                url:'input-data-in-CRM.php',
                data:{
                    "crm":"true",
                    "update-crm":"true",
                    "data":'{"' + $(event.target).attr('name') + '":"' + $(event.target).val() + '"}'
                },
                success:function(result){ console.log(result) }
            });
        });


        /**
         * add zones function
         */
        function AddZones(zone = false){
            let id = (zone) ? zone.id : '';
            let name = (zone) ? zone.name : '';

            let zoneHtml = '<div class="zone">' +
                '<div class="zone-tested"><img src="../images\\red-x-icon.png"/></div>' +
                '<div class="zone-existing"><input type="checkbox"/></div>' +
                '<div class="zone-number"><input value="' + id + '" placeholder="#" type="text" maxlength="3"></div>' +
                '<div class="zone-name"><input value="' + name + '" placeholder="ZONE NAME" type="text"></div>' +
                '<div class="zone-type">' +
                '<select><option>' + Options('event_id') + '</option></select>' +
                '</div>' +
                '<div class="zone-hardware">' +
                '<select><option>' + Options('equiptype_id') + '</option></select>' +
                '</div>' +
                '<div class="zone-delete"><img src="../images\\delete-icon.png"/></div>' +
                '</div>';

//            if(zone)
//            {
//                zoneHtml = SaveZone($($.parseHTML(zoneHtml)));
//            }

            $('#js_zone_module').append(zoneHtml);
        }
    });
</script>
</body>
</html>
