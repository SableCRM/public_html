$(document).ready(function(){

    function url_split(url) {
        let firstSplit = url.replace(/%20/g, ' ');
        firstSplit = firstSplit.match(/\w+=[a-zA-z\s]+|\w+=\w+|\w+=|\w+/g);

        let obj = {};
        let secondSplit = '';
        if (firstSplit) {
            firstSplit.forEach(function(item)
            {
                secondSplit = item.match(/[a-zA-z0-9\s]+/g);
                if(!secondSplit[1])
                {
                    secondSplit[1] = '';
                }
                obj[secondSplit[0]] = secondSplit[1];
            });
        }

        return obj;
    }


    /**
     * @return {string}
     */
    function ParseJson(string, debug){
        let jsonString = '';
        if(string.match(/"\[\\"{.+}\\"]"/)){
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




    function ShowActiveResponse(activeResponse){

        $('#no-subject-found, #credit-check-success, #credit-check-declined').each(function(){

            if($(this).attr('id').toLocaleLowerCase() == activeResponse){

                $(this).removeClass('hide-response');

            } else {

                if(!$(this).hasClass('hide-response')){

                    $(this).addClass('hide-response');
                }
            }
        });
    }




    function CreditUI(credit){

        if(credit.error){

            alert(credit.error);

        } else {

            let score = credit.score;

            if(credit.status === "unknown"){

                ShowActiveResponse("no-subject-found");

                $('#modal-container').css("display", "flex").hide().fadeIn();

            } else if(credit.status === "pass") {

                ShowActiveResponse("credit-check-success");

                $("#credit-score").html(score);

                $("#credit-check-success").removeClass("hide-response");

                $("#modal-container").css("display", "flex").hide().fadeIn();

            } else if(credit.status === "fail") {

                ShowActiveResponse("credit-check-declined");

                $("#credit-check-declined").removeClass("hide-response");

                $("#modal-container").css("display", "flex").hide().fadeIn();
            }
        }
    }


    /**
     * initializes page with client name, ssn and address.
     */
    $.ajax({

        type:"post",

        url:"creditcheck.php",

        data:{

            "init-page":true,

            "company-id":url_split(window.location.search).companyId,

            "contact-id":url_split(window.location.search).contactId
        },
        success:function(data){

            let contact = ParseJson(data);

            let ssn = $('#ssn');

            $('#first-name').val(contact['First Name']);

            $('#last-name').val(contact['Last Name']);

            $('#address-1').val(contact['Mailing Street']);

            $('#city').val(contact['Mailing City']);

            $('#state').val(contact['Mailing State']);

            $('#zip').val(contact['Mailing Zip']);

            $('#country').val(contact['Mailing Country']);

            ssn.data('token', contact['Credit Token']);

            if(contact['Social Security Number']){

                if(contact['Social Security Number'].length === 9){

                    ssn.val(contact['Social Security Number']);

                } else if (contact['Social Security Number'].match(/\d{3}-\d{2}-\d{4}/)) {

                    ssn.val(contact['Social Security Number']);

                } else if (contact['Social Security Number'].length === 4) {

                    ssn.val('000-00-' + contact['Social Security Number']);

                } else {

                    ssn.val('');
                }

            } else {

                ssn.val('');
            }
        }
    });




    $('#pull-previous').click(function(){

        $.ajax({

            type:'post',

            url:'creditcheck.php',

            data:{

                "credit-request":true,

                "pull-prev":true,

                "test":$('#first-name').val(),

                "token":$('#ssn').data('token')
            },
            success:function(data){

                let credit = ParseJson(data);

                CreditUI(credit);
            }
        });
    });




    $("#pull-new").click(function(){

        $.ajax({

            type:"post",

            url:"creditcheck/index.php",

            data:{

                "credit":true,

                "pull-new":true,

                "creditportal":true,

                "company-id":url_split(window.location.search).companyId,

                "contact-id":url_split(window.location.search).contactId,

                "fname":$("#first-name").val(),

                "lname":$("#last-name").val(),

                "ssn":$("#ssn").val(),

                "address1":$("#address-1").val(),

                "city":$("#city").val(),

                "state":$("#state").val(),

                "zip":$("#zip").val(),

                "bureau":$("#credit-bureau").val(),

                "birthdate":$("#dob").val()
            },
            success:function(data){

                let credit = ParseJson(data);

                CreditUI(credit);
            }
        });
    });




    /**
     * closes the credit-request window.
     */
    $('#exit-credit').click(function(){

        $('#modal-container').fadeOut();
    });




    /**
     * clears the address fields and focus on the address-1 field and re-submits credit request.
     */
    $('#run-previous').click(function(){

        $('#address-1, #address-2, #city, #state, #zip').val('');

        $('#address-1').focus();

        $('#modal-container').fadeOut();
    });




    /**
     * clears all fields in form and focus on the first-name field and re-submits credit request.
     */
    $('#run-spouse').click(function(){

        $('#first-name, #last-name, #ssn, #address-1, #address-2, #city, #state, #zip').val('');

        $('#first-name').focus();

        $('#modal-container').fadeOut();
    });




    /**
     * confirms decline of credit request and close the credit-request window.
     */
    $('.confirm-decline').click(function(){

        $('#modal-container').fadeOut();
    });


});