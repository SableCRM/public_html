$(document).ready(function () {
    /**
     * SPLIT URL PARAMETERS INTO VARIABLES
     * @param string - a string containing url variables. eg. ?src=guardme&deal_id=123456
     * @return object - an object containing the url variables. eg. {"src":"guardme", "deal_id":"123456"}
     */
    let url = url_split(window.location.search);

    //DEAL_ID PULLED FROM URL STRING
    let deal_id = url.deal_id;

    //SRC PULLED FROM URL STRING
    let src = url.src;

    let homePhone = '';

    Init();

    $('#cancel-test').click(CancelTest);

    $('#apply-test').click(ApplyTest);

    $('#activate-adc').click(RegisterCell);

    $('#terminate-adc').click(TerminateCell);

    $('#add-two-way').click(AddTwoway);

    $('#place-account-online').click(PlaceOnline);

    $('#zone-list .refresh-icon').click(ZoneRefresh);

    // $(document).click(function (event)
    // {
    //     console.log(event.target);
    // });

    /**
     * COLLAPSE EVENT HISTORY MODULE ON PAGE LOAD
     */
    $('#event-history .collapse-toggle').trigger('click');


    /**
     * disables landline checkbox if account_type is Cell Primary or Cell w/2Way
     */
    let account_type = $('#account-type select');

    account_type.change(function () {
        landline_first_checkbox = $('#contact-form-landline input');

        if (account_type.val() == 'Cell Primary' || account_type.val() == 'Cell w/2Way') {
            landline_first_checkbox.prop('disabled', true).prop('checked', false);
        }
        else {
            landline_first_checkbox.prop('disabled', false);
        }
    }).trigger('change');


    /**
     * ATTACH CHANGE EVENT LISTENER TO SITE-DETAILS MODULE AND UPDATE CRM WITH VALUE OF THE ELEMENT.
     */
    $('#site-details .module-body, #adc-serial').change(function (event) {
        process('POST', 'index.php', 'action=zoho-update&src=' + src + '&deal_id=' + deal_id + '&zoho-module=Potentials&zoho-data=' +
            '{"' + $(event.target).attr('name') + '":"' + $(event.target).val() + '"}', function (e) {
            try {
                console.log(e.target.response);
            }
            catch (ex) {
                console.log(ex + space(1) + e.target.response);
            }
        });
    });


    /**
     * HELPER FUNCTION TO QUICKLY INSERT SPACE(s) IN CODE.
     * @param size - how many spaces to return.
     * @returns {string} - a string containing the number of spaces specified by @param size
     */
    function space(size) {
        let space = '';

        for (let i = 0; i < size; i++) {
            space += ' ';
        }
        return space;
    }


    function ParseJson(string, debug) {
        let jsonString = '';
        if (string.match(/"\[\\\"{.+\}\\\"]"/)) {
            jsonString = JSON.parse(string);
            if (debug) {
                console.log('first stage: ' + jsonString);
            }
        } else {
            jsonString = string;
        }
        try {
            jsonString = JSON.parse(jsonString);
            if (debug) {
                console.log('second stage: ' + jsonString);
                console.log('second stage: ' + jsonString.length);
            }
            if (jsonString.length > 1) {
                let strings = [];
                for (let i = 0; i < jsonString.length; i++) {
                    strings.push(JSON.parse(jsonString[i]));
                    if (debug) {
                        console.log('third stage: ' + jsonString[i]);
                    }
                }
                return strings;
            } else {
                return jsonString;
            }
        } catch (ex) {
            return {
                error: true,
                message: ex,
                input: string
            }
        }
    }


    function PlaceOnline() {
        let agencies = GetAgencies();

        let contacts = GetContacts();

        let zones = GetZones();

        let crossStreet = $('#cross-street input').val();

        let panelPhone = $('#panel-phone-number input').val();

        let panelLocation = $('#panel-location input').val();

        let transformerLocation = $('#transformer-location input').val();

        let passcode = '';

        let confirmation = '';

        if ($('.pin').length == 1) {
            passcode = $('.pin').prop('dataset').passcode;
        }

        let url = 'action=online&src=' + src + '&deal_id=' + deal_id + '&agencies=' + agencies + '&contacts=' + contacts +
            '&zones=' + zones + '&crossStreet=' + crossStreet + '&panelPhone=' + panelPhone + '&panelLocation=' + panelLocation +
            '&transformerLocation=' + transformerLocation + '&homePhone=' + homePhone +
            '&adcSerial=' + $('#adc-serial').val() + '&centralStation=' + $('#central-station select option:selected').html() +
            '&passcode=' + passcode;
        console.log(url);
        process('POST', 'index.php', url, function (e) {
            let err_text = '';

            try {
                //console.log(e.target.response);
                response = JSON.parse(e.target.response);
                //console.log(response);

                //let output = $('#message');

                $(response).each(function () {
                    err_text += '<h2>' + this.err_text + '</h2>';
                    if (this.entry_id == 'Confirm#') {
                        confirmation = this.err_text.match(/\d+/);
                        process('POST', 'index.php', 'action=zoho-update&src=' + src + '&deal_id=' + deal_id + '&zoho-module=Potentials&zoho-data=' +
                            '{"Confirmation Number":"' + confirmation + '", "Install Status":"Completed", "Account Online":"true"}', function (e) {
                            console.log(e.target.response);
                        });

                        if (src == 'guardme' || src == "power_home" || src == "capital_connect") {
                            Funding();
                        }

                        $('#account-status').html('Active').css('background-color', 'green');
                    }
                });
                outputbox(err_text);
            }
            catch (ex) {
                console.log(ex + space(10) + e.target.response);
            }
        });
    }


    /**
     * output message popup
     * @param message
     */
    function outputbox(message) {
        let output = $('#message');

        output.html(message);
        output.slideDown();
        output.click(function () {
            output.slideUp();
        });
    }


    function RegisterCell() {
        process('POST', 'index.php', 'action=adc&src=' + src + '&deal_id=' + deal_id +
            '&method=create&serial_number=' + $('#adc-serial').val() + '&phone=' + $('#home-phone input').val(), function (e) {
            try {
                /**
                 * try to parse result from ajax call to json.
                 */
                let response = JSON.parse(e.target.response);
                console.log(response);

                /**
                 *store reference to adc-heading in variable.
                 */
                let adc_heading = $('#adc-heading');

                /**
                 * if activation success true.
                 */
                if (response.Success == 'true') {
                    /**
                     * set the innerHTML and color of the adc-heading
                     */
                    adc_heading.html('Successfully Registered Cell').css('color', 'green');
                    $('#adc-login').html((response.LoginName) ? response.LoginName : '');
                    $('#adc-password').html((response.Password) ? response.Password : '');
                    $('#adc-id').html((JSON.parse(response.CustomerId)) ? response.CustomerId : '');
                }
                /**
                 * if activation success false.
                 */
                else if (response.Success == 'false') {
                    /**
                     * set the innerHTML and color of the adc-heading
                     */
                    adc_heading.html('Cell Registration Failure: ' + response.errorMessage).css('color', 'red');
                }
                /**
                 * if error true
                 */
                else if (response.error) {
                    /**
                     * create err_text variable and initialize to empty.
                     */
                    let err_text = '';

                    /**
                     * loop through each err_text.
                     */
                    $(response.error).each(function () {
                        /**
                         * wrap each err_text in h2 tags
                         */
                        err_text += '<h2>' + this + '</h2>';
                    });

                    /**
                     * show message div and add click event handler.
                     */
                    $('#message').html(err_text).slideDown().click(function () {
                        /**
                         * hide message div on click.
                         */
                        $(this).slideUp();
                    });
                }
                else {
                    /**
                     * set innerHTML and color of adc-heading.
                     */
                    adc_heading.html('Cell Registration Failure: ' + JSON.parse(e.target.response).terminateError).css('color', 'red');
                }
            }
            catch (ex) {
                /**
                 * if JSON.parse fails, print error message and server response to console.
                 */
                console.log(ex + space(1) + e.target.response);
            }
        });
    }


    function TerminateCell() {
        process('POST', 'index.php', 'action=adc&src=' + src + '&deal_id=' + deal_id + '&method=terminate', function (e) {
            try {
                /**
                 * try to parse result from ajax call to json.
                 */
                let response = JSON.parse(e.target.response);
                console.log(response);

                /**
                 *store reference to adc-heading in variable.
                 */
                let adc_heading = $('#adc-heading');

                /**
                 * if terminate status true
                 */
                if (response.terminateStatus) {
                    /**
                     * set the innerHTML and color of the adc-heading.
                     */
                    adc_heading.html('Successfully Terminated Cell').css('color', 'green');

                    /**
                     * set the innerHTML of adc-username, adc-password and adc-id to empty.
                     */
                    $('#adc-login, #adc-password, #adc-id').html('');
                }
                /**
                 * if error true
                 */
                else if (response.error) {
                    /**
                     * create err_text variable and initialize to empty.
                     */
                    let err_text = '';

                    /**
                     * loop through each err_text.
                     */
                    $(response.error).each(function () {
                        /**
                         * wrap each err_text in h2 tags
                         */
                        err_text += '<h2>' + this + '</h2>';
                    });

                    /**
                     * show message div and add click event handler.
                     */
                    $('#message').html(err_text).slideDown().click(function () {
                        /**
                         * hide message div on click.
                         */
                        $(this).slideUp();
                    });
                }
                else {
                    /**
                     * set innerHTML and color of adc-heading.
                     */
                    adc_heading.html('Cell Termination Failure: ' + JSON.parse(e.target.response).terminateError).css('color', 'red');
                }
            }
            catch (ex) {
                /**
                 * if JSON.parse fails, print error message and server response to console.
                 */
                console.log(ex + space(1) + e.target.response);
            }
        });
    }


    function ApplyTest() {
        let testCat = document.querySelector('#test-category select').selectedOptions[0].value;
        let testHr = document.querySelector('#test-hours select').selectedOptions[0].value;
        let testMin = document.querySelector('#test-minutes select').selectedOptions[0].value;
        process('POST', 'index.php', 'action=test&state=On&testCat=' + testCat + '&hr=' + testHr + '&min=' + testMin + '&src=' + src + '&deal_id=' + deal_id, function (e) {
            try {
                console.log(e.target.response);
                let response = JSON.parse(e.target.response);
                //outputbox(e.target.response);

                if (response[0].ontest_flag.trim() === 'yes') {
                    let d = new Date(response[0].ontest_expire_date.trim());
                    d = d.toLocaleDateString() + ' @ ' + d.toLocaleTimeString();

                    document.querySelector('#test-end-date').innerHTML = d;
                    document.querySelector('#site-test').classList.add('testing');
                    document.querySelector('#account-status').classList.add('testing');
                    document.querySelector('#account-status').innerHTML = 'On Test';

                    process('POST', 'index.php', 'action=zoho-update&src=' + src + '&deal_id=' + deal_id + '&zoho-module=Potentials&zoho-data=' +
                        '{"Account Online":"false"}', function (e) {
                        console.log(e.target.response);
                    });
                }
            }
            catch (ex) {
                console.log(ex + space(1) + e.target.response);
            }
        });
    }


    function CancelTest() {
        process('POST', 'index.php', 'action=test&state=Off&src=' + src + '&deal_id=' + deal_id, function (e) {
            try {
                console.log(e.target.response);
                let response = JSON.parse(e.target.response);
                //outputbox(e.target.response);

                if (response[0].ontest_flag.trim() === 'no') {
                    document.querySelector('#site-test').classList.remove('testing');
                    document.querySelector('#account-status').classList.remove('testing');
                    document.querySelector('#account-status').innerHTML = 'Active';

                    process('POST', 'index.php', 'action=zoho-update&src=' + src + '&deal_id=' + deal_id + '&zoho-module=Potentials&zoho-data=' +
                        '{"Account Online":"true"}', function (e) {
                        console.log(e.target.response);
                    });
                }
            }
            catch (ex) {
                console.log(ex + space(1) + e.target.response);
            }
        });
    }


    function AddTwoway() {
        process('POST', 'index.php', 'action=twoway&src=' + src + '&deal_id=' + deal_id, function (e) {
            try {
                console.log(e.target.response);
                let response = JSON.parse(e.target.response);
                outputbox(response.err_msg);
            }
            catch (ex) {
                console.log(ex + space(1) + e.target.response);
            }
        });
    }


    /**
     * sets up initial job information
     */
    function Init() {
        process('POST', 'index.php', 'action=init&src=' + src + '&deal_id=' + deal_id, function (e) {
            try {
                console.log(e.target.response);
                let response = JSON.parse(e.target.response);

                //IF MONITRONICS ACCOUNT IS PURCHASED AND DEALER HAS NO ACCESS
                if (response[0].err_msg === 'User does not have access to CS#') {
                    $('#account-status').html('Purchased').css('background-color', 'red');
                    console.log(response);
                }

                //CHECK IF ACCOUNT IS ACTIVE
                else if (response[0].sitestat_id.trim() === 'A') {
                    GetZonesDatabase();
                    //GetZonesAdc();
                    //GetZonesMoni();
                    GetContactList('monitronics');

                    //CHECK IF ACCOUNT IS OFF TEST
                    if (response[0].ontest_flag.trim() === 'no') {
                        $('#site-test, #account-status').removeClass('testing');
                        $('#account-status').html('Active');
                    }
                    //CHECKS IF ACCOUNT IS ON TEST
                    else if (response[0].ontest_flag.trim() === 'yes') {
                        $('#test-end-date').html(response[0].ontest_expire_date);
                        $('#site-test, #account-status').addClass('testing');
                        $('#account-status').html('On Test');
                    }
                }
                //CHECK IF ACCOUNT IS PENDING INSTALL
                else if (response[0].sitestat_id.trim() === 'P' || response[0].sitestat_id.trim() === 'P2') {
                    /**
                     * try to get zones from database, if successful update zonelist with zones from database
                     * if failure, update zonelist with zones from alarm.com
                     */
                    GetZonesDatabase();

                    $('#account-status').html('Pending').css('background-color', 'orange');
                }
                //CHECKS IF ACCOUNT IS CANCELLED
                else if (response[0].sitestat_id.trim() === 'C') {
                    $('#account-status').html('Cancelled').css('background-color', 'red');
                }
            }
            catch (ex) {
                console.log(ex + space(1) + e.target.response);
            }
        });
    }


    //GET ZONELIST FROM MONITRONICS API
    function GetZonesMoni() {
        process('POST', 'index.php', 'action=zones&src=' + src + '&deal_id=' + deal_id, function (e) {
            try {
                let response = JSON.parse(e.target.response);
                //console.log(response);
                let zone_name = '';

                let zone_module = '';

                $('#js_zone_module').each(function () {
                    zone_module = this;
                });

                for (let i = 0; i < response.length; i++) {
                    if (response[i].zone_comment !== undefined) {
                        zone_name = response[i].zone_comment.trim();
                    } else {
                        if (response[i].equiploc_id !== undefined) {
                            zone_name = response[i].equiploc_id.trim();
                        } else {
                            zone_name = 'unknown';
                        }
                    }

                    AddZone(
                        true,
                        response[i].zone_id.trim(),
                        zone_name,
                        response[i].event_id.trim(),
                        (response[i].equiptype_id !== undefined) ? response[i].equiptype_id.trim() : 'Other'
                    );
                }

                ZoneHighlight();
            }
            catch (ex) {
                console.log(ex + space(1) + e.target.response);
            }
        });
    }


    //GET ZONELIST FROM ALARM.COM API
    function GetZonesAdc() {
        process('POST', 'index.php', 'action=adc&src=' + src + '&deal_id=' + deal_id + '&method=zones', function (e) {
            try {
                //console.log(e.target.response);
                let response = JSON.parse(e.target.response);
                for (let i = 0; i < response.length; i++) {
                    AddZone(true, response[i].id, response[i].name, '1400', 'DSR');
                }

                ZoneHighlight();
            }
            catch (ex) {
                console.log(ex + space(1) + e.target.response);
            }
        });
    }


    function GetZonesDatabase() {
        // $.ajax({
        //     type:'post',
        //     crossOrigin:true,
        //     /**
        //      * http url call to be considered when we switch to https.
        //      */
        //     url:'http://www.sable-crm.com/get-zones-from-database.php',
        //     data:{
        //         "deal":deal_id,
        //         "company":url_split(window.location.search).company
        //     },
        //     success:function(data){
        //         console.log(data);
        //         let zones = ParseJson(data);
        //         if(zones.error){
        //             console.log(zones.error);
        //             console.log(zones.message);
        //             console.log(zones.input);
        //             GetZonesAdc();
        //         }
        //         else{
        //             $(zones).each(function(){
        //                 AddZone(true, this.zone_id, this.zone_comment, this.event_id, this.equiptype_id);
        //             });
        //             ZoneHighlight();
        //         }
        //     }
        // });
        $.ajax({
            type: "post",
            crossOrigin: true,
            url: "http://www.sable-crm.com/SABLE-TECH-PORTAL/addPortalZonesToAccountOnline.php",
            data: {
                "deal": deal_id,
                "company": url_split(window.location.search).company
            },
            success: function (data) {
                if (data == "") {
                    GetZonesAdc();
                }
                else {
                    console.log(data);
                    let zones = ParseJson(data);
                    $(zones).each(function () {
                        AddZone(true, this.zone_id, this.zone_comment, this.event_id, this.equiptype_id, this.existing);
                    });
                }

                ZoneHighlight();
            }
        });
    }


    //REFRESHES ZONELIST WITH NEW DATA FROM MONI OR ADC API
    function ZoneRefresh() {
        process('POST', 'index.php', 'action=init&src=' + src + '&deal_id=' + deal_id, function (e) {
            try {
                //console.log(e.target.response);
                let response = JSON.parse(e.target.response);

                $('#js_zone_module').html('');

                //CHECK IF ACCOUNT IS ACTIVE
                if (response[0].sitestat_id.trim() === 'A') {
                    GetZonesMoni();
                }
                //CHECK IF ACCOUNT IS PENDING INSTALL
                else if (response[0].sitestat_id.trim() === 'P' || response[0].sitestat_id.trim() === 'P2') {
                    /**
                     * try to get zones from database, if successful update zonelist with zones from database
                     * if failure, update zonelist with zones from alarm.com
                     */
                    GetZonesDatabase();
                }
            }
            catch (ex) {
                console.log(ex + space(1) + e.target.response);
            }
        });
    }


    function ZoneHighlight() {
        process('POST', 'index.php', 'action=alarm_events&src=' + src + '&deal_id=' + deal_id, function (e) {
            try {
                let alarm_events = JSON.parse(e.target.response);

                $('#js_zone_module .zone').each(function (index) {
                    if (alarm_events[$('.zone-number', this).html()] == 'A') {
                        $('.zone-tested img', this).attr('src', 'http://www.sablecrm.com/AccountOnline/images/green-check-icon.png');
                    }
                });
            }
            catch (ex) {
                console.log(ex + space(1) + e.target.response);
            }
        });
    }


    function GetEventHistory() {
        process('POST', 'index.php', 'action=alarm_events&src=' + src + '&deal_id=' + deal_id +
            '&method=get-events&start-date=' + $('#date-from').val() + '&end-date=' + $('#date-to').val(), function (e) {
            try {
                console.log(e.target.response);
                let event = $('#event-history .module-body');
                let zonestate_id = '';

                let event_history = JSON.parse(e.target.response);
                $(event_history).each(function () {
                    zonestate_id = (this.zonestate_id) ? this.zonestate_id : '';

                    event.append('<div class="event">' +
                        '<div class="event-date">' + this.event_date + '</div>' +
                        '<div class="event-zone">' + this.zone_id + '</div>' +
                        '<div class="event-id">' + this.event_id + '</div>' +
                        '<div class="event-state">' + zonestate_id + '</div>' +
                        '<div class="event-match">' + this.match + '</div>' +
                        '<div class="event-computed">' + this.computed + '</div>' +
                        '</div>');
                });
            }
            catch (ex) {
                console.log(ex + space(1) + e.target.response);
            }
        });
    }


    /**
     * pull event-history from moni api when go button or refresh button in the event-history
     * module is clicked.
     */
    $('#filter-date, #event-history .refresh-icon').click(function () {
        $('#event-history .module-body').html('');

        GetEventHistory();
    });


    /**
     * 1) WHENEVER THE 'Call Landline First' CHECKBOX IS CHECKED THIS WILL SET THE FIRST CALL TO LANDLINE AND SET
     * THE INFORMATION FROM THE 'Home Phone' INPUT BOX AS THE FIRST CALL IN THE 'Phone1' FIELD OF THE MONI API.
     * 2) SET THE FIRST CONTACT IN THE CONTACT LIST AS AN ENHANCED, TYPE 5000.
     */
    $('#contact-form-landline input').change(function () {
        /**
         * STORE VALUE OF CHECKBOX IN LOCAL VARIABLE
         */
        let _homePhone = $(this).prop('checked');

        let _homephoneInput = $('#home-phone input');

        if (_homePhone) {
            /**
             * IF CHECKBOX IS CHECKED, UPDATE 'homePhone' VARIABLE WITH THE VALUE IN THE 'Home Phone' INPUT
             */
            homePhone = $('#home-phone input').val();

            _homephoneInput.prop('required', true);

            /**
             * GETS ALL CONTACTS FROM THE CONTACTLIST AND LOOP THROUGH EACH
             */
            $('#js_contacts_module .contact').each(function () {
                if ($(this).prop('dataset').enhanced == 'true' && $(this).prop('dataset').order >= '2') {
                    $(this).prop('dataset').enhanced = 'false';
                }
            });
        }
        else {
            _homephoneInput.prop('required', false);

            $('#js_contacts_module .contact').each(function () {
                if ($(this).prop('dataset').enhanced && ($(this).prop('dataset').order == '1' || $(this).prop('dataset').order == '2')) {
                    $(this).prop('dataset').enhanced = 'true';
                }
            });
        }
    });


    /**
     * ON PAGELOAD, IF ACCOUNT IS ONLINE, POPULATES THE PAGE WITH THE CONTACTLIST RETURNED FROM MONITRONICS
     * IF ACCOUNT IS NOT ONLINE, POPULATES THE PAGE WITH THE SAVED CONTACTLIST RETURNED FROM SABLES DATABASE IF
     * LIST WAS SAVED FROM A PREVIOUS ACCESS.
     * @source: PROVIDER FROM WHICH TO GET CONTACTLIST, monitronics or database.
     */
    function GetContactList(source) {
        process('POST', 'index.php', 'action=contactlist&type=' + source + '&src=' + src + '&deal_id=' + deal_id, function (e) {
            try {
                let response = JSON.parse(e.target.response);
                console.log(response);

                $(response).each(function () {
                    SaveContact(this, true);
                });
            }
            catch (ex) {
                console.log(ex + space(1) + e.target.response);
            }
        });
    }


    function Funding() {
        process('POST', 'index.php', 'action=funding&src=' + src + '&deal_id=' + deal_id, function (e) {
            try {
                let response = JSON.parse(e.target.response);

                if (response.status == false) {
                    response.message = 'funding not updated!';
                }
                process('POST', 'index.php', 'action=zoho-update&src=' + src + '&deal_id=' + deal_id + '&zoho-module=Potentials&zoho-data=' +
                    '{"E-Contract Updated":"' + response.message + '"}', function (e) {
                    console.log(e.target.response);
                });
            }
            catch (ex) {
                console.log(ex + space(1) + e.target.response);
            }
        });
    }
});