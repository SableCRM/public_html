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
            }else{
                if(!$(this).hasClass('hide-response')){
                    $(this).addClass('hide-response');
                }
            }
        });
    }


    function CreditUI(credit){
        let file_hit = credit.file_hit;
        if(file_hit == null){
            ShowActiveResponse('no-subject-found');
            $('#credit-status').find('img').attr('class', 'no-subject');
        }else if(credit.file_hit['@attributes'].code.toLocaleLowerCase() == 'y'){
            let score = credit.score[0];
            if(score > 599){
                ShowActiveResponse('credit-check-success');
                $('#credit-status').find('img').attr('class', 'success');
                $('#credit-score').html('Pass: ' + score);
                $('#credit-check-success').removeClass('hide-response');
            }else{
                ShowActiveResponse('credit-check-declined');
                $('#credit-status').find('img').attr('class', 'declined');
                $('#credit-check-declined').removeClass('hide-response');
            }
        }
    }


    /**
     * initializes page with client name, ssn and address.
     */
    $.ajax({
        type:'POST',
        url:'creditcheck.php',
        data:{
            "init-page":true,
            "company-id":url_split(window.location.search).companyId,
            "contact-id":url_split(window.location.search).contactId
        },
        success:function(data){
            //console.log(data);
            let contact = ParseJson(data);
            let ssn = $('#ssn');
            $('#firstname').val(contact['First Name']);
            $('#lastname').val(contact['Last Name']);
            $('#address1').val(contact['Mailing Street']);
            $('#city').val(contact['Mailing City']);
            $('#state').val(contact['Mailing State']);
            $('#zip').val(contact['Mailing Zip']);
            $('#country').val(contact['Mailing Country']);
            ssn.data('token', contact['Credit Token']);

            if(contact['Social Security Number']) {
                if (contact['Social Security Number'].length === 9) {
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
            type:'POST',
            url:'creditcheck.php',
            data:{
                "credit-request":true,
                "pull-prev":true,
                "test":$('#firstname').val(),
                "token":$('#ssn').data('token')
            },
            success:function(data){
                console.log(data);
                let credit = ParseJson(data);
                CreditUI(credit);
            }
        });
    });


    $('#pull-new').click(function(){
        $.ajax({
            type:'POST',
            url:'creditcheck.php',
            data:{
                "credit-request":true,
                "pull-new":true,
                "fname":$('#firstname').val(),
                "lname":$('#lastname').val(),
                "ssn":$('#ssn').val(),
                "address1":$('#address1').val(),
                "city":$('#city').val(),
                "state":$('#state').val(),
                "zip":$('#zip').val()
            },
            success:function(data){
                //console.log(data);
                let credit = ParseJson(data);
                CreditUI(credit);
                $.ajax({
                    type:'POST',
                    url:'creditcheck.php',
                    data:{
                        "update-contact":true,
                        "score":(credit.score) ? credit.score[0] : '',
                        "token":(credit.token) ? credit.token[0] : '',
                        "transid":(credit.transid) ? credit.transid[0] : ''
                    },
                    success:function(data){
                        //console.log(ParseJson(data));
                    }
                });
            }
        });
    });


    /**
     * closes the credit-request window.
     */
    $('#exit-credit').click(function(){
        window.close();
    });


    /**
     * clears the address fields and focus on the address1 field and re-submits credit request.
     */
    $('#run-previous').click(function(){
        $('#address1, #address2, #city, #state, #zip').val('');
        $('#address1').focus();
    });


    /**
     * clears all fields in form and focus on the firstname field and re-submits credit request.
     */
    $('#run-spouse').click(function(){
        $('#firstname, #lastname, #ssn, #address1, #address2, #city, #state, #zip').val('');
        $('#firstname').focus();
    });


    /**
     * confirms decline of credit request and close the credit-request window.
     */
    $('.confirm-decline').click(function(){
        window.close();
    });

});
