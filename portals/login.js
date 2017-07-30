/**

 * Created by razam on 2/22/2017.

 */
$(document).ready(function() {




    $('.module-header').click(function() {

        $(this).siblings('*').slideToggle(500);

        $(this).children('.collapse-toggle').toggleClass('collapsed');

    });



    $('#tech_nav').click(function() {

        $('#dropdown_nav').slideToggle(500);

    });



    $('#week_tabs').find('div').click(function() {

        $('#week_tabs').find('div').removeClass('selected_tab');

        $(this).addClass('selected_tab');

    });




    /**

     * function to post username and password to server for login

     * @todo, use custom json parse function

     */

    let login_form = $('#login_form');

    $('#log_in').click(function() {

        $.post({

            type: 'POST',

            url: 'login.php',

            data: {

                "login": true,

                "username": login_form.find('input[type=text]').val(),

                "password": login_form.find('input[type=password]').val()

            },

            success: function(result) {

                console.log(result);

                try {

                    result = JSON.parse(result);

                    if (result.login === true) {

                        window.location = result.redirect;

                    } else {

                        alert(result.message);

                    }

                } catch (ex) {

                    console.log(ex)

                }

            }

        });

    });



    /* log in user if enter button is pressed*/
    $(document).keydown(function(e){

        if(e.which == 13){

            $("#log_in").click();
        }
    });




    /**
     * function to update personal information for profile-settings.php
     */
    $("#update_personal").find("input").click(function(){

        $.ajax({

            type:"POST",

            url:"profile-settings.php",

            data:{

                "update-user":"true",

                "update-user-info":"true",

                "first-name":$("#first_name").find("input").val(),

                "last-name":$("#last_name").find("input").val(),

                "mobile-phone":$("#mobile_number").find("input").val(),

                "work-phone":$("#work_number").find("input").val(),

                "email":$("#email_address").find("input").val()
            },
            success:function(){

                window.location = "login.php";
            }
        });
    });




    /**
     * function to update password for profile-settings.php
     */
    $("#update_password").find("input").click(function(){

        let newPassword = $("#new_password").find("input").val();

        if(newPassword === $("#confirm_password").find("input").val()){

            $.ajax({

                type:"post",

                url:"profile-settings.php",

                data:{

                    "update-user": "true",

                    "update-user-password": "true",

                    "current-password": $("#current_password").find("input").val(),

                    "new-password": newPassword
                },
                success:function(){

                    window.location = "login.php";
                }
            });

        } else {

            alert("NEW PASSWORD DOES NOT MATCH CONFIRM PASSWORD");
        }
    });




    /**
     * function to populate tech portal index page with scheduled jobs
     * @todo, use custom json parse
     */
    $.post({

        type:"post",

        async:false,

        url:"../SABLE-TECH-PORTAL/index.php",

        data:{

            "get-jobs": "true"
        },
        success: function(result){

            let response = "";

            try
            {
                response = JSON.parse(result);
            }
            catch(ex)
            {
                console.log(ex)
            }

            if(response.error)
            {
                $("#appointment_list").append("<h1>" + response.error + "</h1>");

            }
            else
            {
                $(response).each(function()
                {
                    let time = this.SCHEDULED_DATE_TIME.split(" ");

                    let scheduleIcon = false;

                    if(this.SERVICE_ID)
                    {
                        scheduleIcon = "icon-service-appt.png";
                    }
                    else
                    {
                        scheduleIcon = "icon-home-install.png";
                    }

                    $('#appointment_list').append('<a data-id="' + this.JOB_ID + '" data-service="' + this.SERVICE_ID + '" class="appointment" href="#">' +

                        '<img src="../images\\' + scheduleIcon + '"/>' +

                        '<div class="appointment_datetime">' +

                        '<span class="appointment_date">' + time[0] + '</span>' +

                        '<span class="hyphen_divider">-</span>' +

                        '<span class="appointment_time">' + time[1] + '</span>' +

                        '</div>' +

                        '<div class="appointment_customer_info">' + this.DATA_1 + ', ' +

                        this.DATA_2 + ' ' + this.DATA_3 + '</div>' +

                        '</a>'
                    );
                });
            }
        }
    });




    /**
     * function to post selected job to server and pullup all client data
     */
    $(".appointment").click(function(event) {

        $.post({

            type:"post",

            url:"index.php",

            data:{

                "selected-job": event.currentTarget.dataset.id,
                "service-id": event.currentTarget.dataset.service
            },
            success:function(){

                window.location = "call.php";
            }
        });
    });




    /**
     * function to create new deal and populate sale information, from security-system-old.php
     */
    $('#confirm').click(function(){
    
    	 $.ajax({

            type:"post",

            url:"../salesportal/zohoApi/create_deal.php",

            data:{

                'package-type': $('#package').find('select').val(),

                'monitoring-level': $('#level_of_service').find('select').val(),

                'takeover': $('#takeover').find('input').is(':checked'),

                'twoway': $('#twoway').find('input').is(':checked'),

                'adc-video': $('#video').find('input').is(':checked'),

                'panel-type': $('#panel_type').find('select').val(),

                'doors-windows': $('#door_window').find('input').val(),

                'motions': $('#motion').find('input').val(),

                'smokes': $('#smoke').find('input').val(),

                'glass-breaks': $('#glass_break').find('input').val(),

                'other': $('#other').find('textarea').val(),

                'thermostats': $('#thermostat').find('input').val(),

                'locks': $('#lock').find('input').val(),

                'lights': $('#lighting').find('input').val(),

                'indoor-cameras': $('#indoor').find('input').val(),

                'outdoor-cameras': $('#Outdoor').find('input').val(),

                'sky-bell': $('#skybell').find('select').val(),

                'existing-panel-type': $('#existing_panel_type').find('select').val(),

                'wired-wireless': $('#wired_wireless').find('select').val(),

                'rmr': $('#rmr').find('input').val(),

                'amount': $('#install_charges').find('input').val(),

                'activation-fee': $('#activation_charge').find('input').val(),

                'ach-routing-number': $('#routing_number').val(),

                'ach-account': $('#account_number').val(),

                'card-number': $('#credit_card_number').val(),

                'expiration': $('#credit_card_exp').val(),

                'cvv': $('#credit_card_cvv').val(),

                'easy-pay-method': $('input[name=payment_select]:checked').val(),

                'first-choice-date': $('#first_install_date').find('input').val(),

                'first-choice-time': $('#first_install_time').find('select').val(),

                'second-choice-date': $('#second_install_date').find('input').val(),

                'second-choice-time': $('#second_install_time').find('select').val(),

                'additional-notes': $('#additional_notes').find('textarea').val(),

                'communication-type': $('#communication_type').find('select').val(),

                'contract-term': $('#length_of_contract').find('select').val(),

                // billing name and address

                'bil-fname': $('#first-name').find('input').val(),

                'bil-lname': $('#last-name').find('input').val(),

                'bil-address1': $('#address_1').find('input').val(),

                'bil-address2': $('#address_2').find('input').val(),

                'bil-city': $('#city').find('input').val(),

                'bil-state': $('#state').find('input').val(),

                'bil-zip': $('#zip').find('input').val(),

                'bil-county': $('#county').find('input').val(),

                'bil-country': $('#country').find('select').val()
            },
            success:function(data){

                console.log(data);

                $.post({
                    type:"post",
                    dataType:"json",
                    cache:false,
                    url:"../salesportal/security-system.php",
                    data:{
                        "e-contract":true
                    },
                    success:function(data){

                        console.log(data);

                        if(data != null){

                            if(data.success){

                                window.location = "thank-you.php";

                            } else {

                                alert(data.message);
                            }
                        }
                    }
                });
            }
        });
    });




    /**
     * function to destroy session when user logs out
     */
    $("#login").click(function(){

        $.post({

            type:"post",

            url:"../../SESSION-DESTROY.php"
        });
    });




    /**
     * function to run credit in sales portal, from new-account.php
     */
    $("#submit_account_info").click(function(){

        $.post({

            type:"post",

            url:"../creditportal/creditcheck/index.php",

            data:{

                "credit":true,

                "pull-new":true,

                "salesportal":true,

                "fname":$("#first_name").find("input").val(),

                "lname":$("#last_name").find("input").val(),

                "ssn":$("#social_security_number").find("input").val(),

                "email":$("#email_address").find("input").val(),

                "phone":$("#main_phone_number").find("input").val(),

                "address1":$("#address_1").find("input").val(),

                "address2":$("#address_2").find("input").val(),

                "city":$("#city").find("input").val(),

                "state":$("#state").find("input").val(),

                "zip":$("#zip").find("input").val(),

                "county":$("#county").find("input").val(),

                "country":$("#country").find("select").val(),

                "property-type":$("#property_type").find("select").val(),

                // when property_type is commercial, company_name and company_type is required, also

                // name and address is required for personal guarantee.

                "company-name":$("#company_name").find("input").val(),

                "company-type":$("#company_type").find("select").val(),

                "pg-fname":$("#com_first_name").find("input").val(),

                "pg-lname":$("#com_last_name").find("input").val(),

                "pg-address1":$("#com_address_1").find("input").val(),

                "pg-address2":$("#com_address_2").find("input").val(),

                "pg-city":$("#com_city").find("input").val(),

                "pg-state":$("#com_state").find("input").val(),

                "pg-zip":$("#com_zip").find("input").val(),

                "pg-county":$("#com_county").find("input").val(),

                "pg-country":$("#com_country").find("select").val()
            },
            success:function(data){

                let credit = ParseJson(data);

                /**
                 * redirects to package page if credit was manually approved.
                 */
                if(credit.redirect){

                    window.location = credit.redirect;
                }
                else{

                    CreditUI(credit);
                }
            }
        });
    });




    function CreditUI(credit){

        //console.log(credit);

        if(credit.error){

            alert(credit.error);
        }
        else{

            /**
             * post to create_contact.php to create new contact and link to new deal in crm.
             */
            $.post({
                type:"post",
                url:"../salesportal/zohoApi/create_contact.php",
                success:function(data){
                    //console.log(data);
                }
            });

            if(credit.status === "fail"){

                /**
                 * post to create_deal.php to create new deal in crm and mark as sold and failed.
                 */
                $.post({
                    type:"post",
                    url:"../salesportal/zohoApi/create_deal.php",
                    success:function(data){
                        //console.log(data);
                    }
                });

                $("#no_subject_found").addClass("hide-response");

                $("#credit_declined").removeClass("hide-response");
            }
            else if(credit.status === "pass"){

                window.location = "credit-approved.php";
            }
            else if(credit.status === "unknown"){

                /**
                 * post to create_deal.php to create new deal in crm and mark as sold and failed.
                 */
                $.post({
                    type:"post",
                    url:"../salesportal/zohoApi/create_deal.php",
                    success:function(data){
                        //console.log(data);
                    }
                });

                $("#credit_declined").addClass("hide-response");

                $("#no_subject_found").removeClass("hide-response");
            }
        }
    }


    /**
     * clear all sessions except for user.
     */
    // $("#new-sale").click(function(){
    //
    //     $.post({
    //         type:"post",
    //         url:"../SESSION-DESTROY.php",
    //         data:{
    //             "new-sale":true
    //         },
    //         success:function(data){
    //
    //             console.log(data);
    //         }
    //     })
    // });




    /**
     * function to clear clients address from form and set the focus to the address1 input
     */
    $("#run_previous_address").click(function(){

        $("#address_1, #address_2, #city, #state, #zip, #county, #country").find("input").val("");

        $("#address_1").find("input").focus();
    });




    /**
     * function to clear clients information from form and set the focus to the first_name input
     */
    $("#run_spouse, #confirm_not_found, #confirm_decline").click(function(){

        $("#first_name, #last_name, #address_1, #address_2, #city, #state, #zip, #county, #country, #email_address, " + "#main_phone_number, #social_security_number").find("input").val("");

        $("#first_name").find("input").focus();
    });




    /**
     * function to run commissions calculator and and filter by start and e4nd date based on the logged in user
     */
    $("#filter-date").click(function(){

        let fromDate = $("#date-from").val();

        let toDate = $("#date-to").val();

        let dateSelected = [];

        $("#date-from, #date-to").each(function() {

            if ($(this).val() == "") {

                dateSelected.push(true);
            }
        });

        if(dateSelected.length == 0){

            $(".date_range").html(fromDate + " - " + toDate);

            $.ajax({

                url:"commissions/commissions.php",

                type:"post",

                data:{

                    "get-commissions":true,

                    "date-fr":fromDate,

                    "date-to":toDate
                },

                success: function(data){

                    let commissions = $.parseJSON(data);

                    let totalCommissions = 0;

                    let commissionsTable = $("#detailed").find(".table");

                    commissionsTable.find(".table_row").remove();

                    if(commissions.length > 0){

                        $(commissions).each(function(){

                            if(this.COMMISSION != -999999){

                                totalCommissions += parseFloat(this.COMMISSION);
                            }

                            if(this.status == false){

                                alert(this.message);

                            } else {

                                commissionsTable.append('<div class="table_row">' +

                                    '<div>' + this.USER_NAME + '</div>' +

                                    '<div>' + this.COMMISSION + '</div>' +

                                    '<div>' + this.CUSTOMER_NAME + '</div>' +

                                    '<div>' + this.INSTALL_TYPE + '</div>' +

                                    '<div>' + this.INSTALL_DATE + '</div>' +

                                    '<div>' + this.PAYMENT_METHOD + '</div>' +

                                    '<div>' + this.SELF_GENERATED + '</div>' +

                                    '<div>' + this.MONITORING_LEVEL + '</div>' +

                                    '<div>' + this.POINTS_GIVEN + '</div>' +

                                    '<div>' + this.INVOICE + '</div>' +

                                    '<div>' + this.ACTIVATION + '</div>' +

                                    '<div>' + this.RMR + '</div>' +

                                    '<div>' + this.LENGTH_OF_CONTRACT + '</div>' +

                                    '<div>' + this.MANAGER_OVERIDE + '</div>' +

                                    '</div>'
                                )
                            }
                        });

                        $('#total-commission').html('$' + totalCommissions.toFixed(2));

                    } else {

                        commissionsTable.append("<h1>There were no results for the selected date range.</h1>")
                    }
                }
            });
        }
    });
});