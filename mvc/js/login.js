var Login = function() {

    var handleLogin = function() {
		
		$('.frmlogin').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	                user_name: {
	                    required: true
	                },
	                user_password: {
	                    required: true
	                }
	            },

	            messages: {
	                user_name: {
	                    required: "Username is required."
	                },
	                user_password: {
	                    required: "Password is required."
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
				   ajaxlogin();
	            }
	        });

	        $('.frmlogin input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.frmlogin').validate().form()) {
					   ajaxlogin();
	                }
	                return false;
	            }
	        });
	        $('.frmlogin .btn-login').click(function (e) {
	                if ($('.frmlogin').validate().form()) {
					   ajaxlogin();
	                }
	                return false;
	        });
	};
    function ajaxlogin()
	{
	    var btn = $('.btn-login');
		var url = $('.frmlogin').attr('action');
		var formdata = $('.frmlogin').serialize();
		$.ajax(
				{
				type: 'post',
				url: url,
				dataType: 'json',
				data:formdata,
				cache:false,
				beforeSend: function() {
				 btn.button('loading');
				 $('.frmlogin div.alert').removeClass('alert-danger alert-success');
				},
				success: function(data) {
				if (data != null) {
				 btn.button('reset');
				if (data.success) {
				
			   $('.frmlogin div.alert').addClass('alert-success').html("<strong>"+ data.message +"</strong>");
			
				$('.frmlogin div.alert').fadeIn('slow').delay(2000).fadeOut("slow",'linear', function()
				{
				  window.location = data.redirect_url;
				});
				}
				else {							
				
				$('.frmlogin div.alert').addClass('alert-danger').html("<strong>"+ data.message +"</strong>");
				$('.frmlogin div.alert').fadeIn('slow').delay(2000).fadeOut("slow",'linear', function()
				{
				
				});
				}
				}
				},
				error: function (request, status, error) { alert(status + ", " + error);  btn.button('reset');}
				}); // end ajax  
	}
    return {
        //main function to initiate the module
        init: function(baseurl) {
            handleLogin(baseurl);
        }
    };
}();
