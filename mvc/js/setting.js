var Setting = function() {
    var handlePersonal = function(baseurl) {
         $('.frmpersonal').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	                first_name: {
	                    required: true
	                },
	                last_name : {
						required: true
					},
					 email_address : {
						required: true,
						email: true
					},
					 mobile_number : {
						required: true
					},
					 work_number : {
						required: true
					}
	            },

	            messages: {
	                first_name: {
	                    required: "First name is required."
	                },
	                last_name: {
	                    required: "Last name is required."
	                },
					 email_address : {
						required: "Email is required."
					},
					 mobile_number : {
						required: "Mobile Number is required."
					},
					 work_number : {
						required: "Work Number is required."
					}
	            },


	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) { // render error placement for each input type
                        error.insertAfter(element); // for other inputs, just perform default behavior
                },

	            submitHandler: function (form) {
	              //  form.submit(); // form validation success, call ajax form submit
				  
	            }
	        });
         $('.number').ForceNumericOnly();
         $('.profile-settings-section').on('click', '.btn-update-personal', function(e) {
            if ($('.frmpersonal').validate().form() == false) {
                return false;
            }
            var btn = $(this);
            var url = $('.frmpersonal').attr('action');
			var formdata = $('.frmpersonal').serialize();
			 var msgDiv = $('.frmpersonal div.alert');
			$.ajax(
				{
				type: 'post',
				url: url,
				dataType: 'json',
				data:formdata,
				cache:false,
				beforeSend: function() {
				 btn.button('loading');
				  msgDiv.removeClass('alert-danger alert-success');
				},
				success: function(data) {
				if (data != null) {
				 btn.button('reset');
				if (data.success) {
				
			   msgDiv.addClass('alert-success').html("<strong>"+ data.message +"</strong>");
			
				msgDiv.fadeIn('slow').delay(2000).fadeOut("slow",'linear', function()
				{
				  window.location.reload(true);
				});
				}
				else {							
				msgDiv.addClass('alert-danger').html("<strong>"+ data.message +"</strong>");
				msgDiv.fadeIn('slow').delay(2000).fadeOut("slow",'linear');
				}
				}
				},
				error: function (request, status, error) { alert(status + ", " + error);  btn.button('reset');}
				}); // end ajax  
            
        });


	};
    
    var handlePassword = function(baseurl) {

         $('.frmresetpwd').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	                current_password: {
	                    required: true
	                },
	                new_password : {
						required: true,
						minlength: 6,
					},
					confirm_password : {
						required: true,
            			equalTo: "#new_password"
					}
	            },

	            messages: {
	                current_password: {
	                    required: "Current password is required."
	                },
	                new_password: {
	                    required: "New password is required."
	                },
					 confirm_password : {
						required: "Confirm password is required."
					}
	            },


	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) { // render error placement for each input type
                        error.insertAfter(element); // for other inputs, just perform default behavior
                },

	            submitHandler: function (form) {
	              //  form.submit(); // form validation success, call ajax form submit
				  
	            }
	        });
         $('.number').ForceNumericOnly();
         $('.profile-settings-section').on('click', '.btn-update-pwd', function(e) {
            if ($('.frmresetpwd').validate().form() == false) {
                return false;
            }
            var btn = $(this);
            var url = $('.frmresetpwd').attr('action');
            var msgDiv = $('.frmresetpwd div.alert');
           
            
			var formdata = $('.frmresetpwd').serialize();
			$.ajax(
				{
				type: 'post',
				url: url,
				dataType: 'json',
				data:formdata,
				cache:false,
				beforeSend: function() {
				 btn.button('loading');
				  msgDiv.removeClass('alert-danger alert-success');
				},
				success: function(data) {
				if (data != null) {
				 btn.button('reset');
				if (data.success) {
				
			   msgDiv.addClass('alert-success').html("<strong>"+ data.message +"</strong>");
			
				msgDiv.fadeIn('slow').delay(2000).fadeOut("slow",'linear', function()
				{
				  window.location.reload(true);
				});
				}
				else {							
				msgDiv.addClass('alert-danger').html("<strong>"+ data.message +"</strong>");
				msgDiv.fadeIn('slow').delay(2000).fadeOut("slow",'linear');
				}
				}
				},
				error: function (request, status, error) { alert(status + ", " + error);  btn.button('reset');}
				}); // end ajax  
            
        });


	};
    
    return {
        //main function to initiate the module
        init: function(baseurl) {
            handlePersonal(baseurl);
            handlePassword(baseurl);
        }
    };
}();

$.validator.addMethod(
"ccExp",
function (value, element) {
    var today = new Date();
    var startDate = new Date(today.getFullYear(),today.getMonth(),1,0,0,0,0);
    var expDate = value;
    var separatorIndex = expDate.indexOf('/');
    expDate = expDate.substr( 0, separatorIndex ) + '/1' + expDate.substr( separatorIndex );
    return Date.parse(startDate) <= Date.parse(expDate);
},
"Your card's expiration year is in the past."
);
