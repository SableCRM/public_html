var Salesportal = function() {

    var handleSendContract = function(baseurl) {
       
           var $msgModal = $('#modal-custom-alert').modal({
			 backdrop: 'static',
			  show: false,
			  keyboard: false
			});
			
			
          
           $('.sales-portal-section').on('click', '#chkprimaryaddress', function(e) {
           		if($(this).prop("checked") == true) {
           			
           			$('#billing_first_name').val($('#first_name').val());
           			$('#billing_last_name').val($('#last_name').val());
           			$('#billing_address1').val($('#address1').val());
           			$('#billing_address2').val($('#address2').val());
           			$('#billing_city').val($('#city').val());
           			$('#billing_state').val($('#state').val());
           			$('#billing_zip').val($('#zip').val());
           			$('#billing_county').val($('#county').val());
           			$('#billing_country').val($('#country').val());
           	    }
           	    else
           	    {
					$('#billing_first_name').val('');
           			$('#billing_last_name').val('');
           			$('#billing_address1').val('');
           			$('#billing_address2').val('');
           			$('#billing_city').val('');
           			$('#billing_state').val('');
           			$('#billing_zip').val('');
           			$('#billing_county').val('');
           			$('#billing_country').val('');
				}
           });
           $('#first_install_date').datepicker({
                autoclose: true,
                format: 'mm/dd/yyyy',
                startDate: new Date()
            });
             $('#second_install_date').datepicker({
                autoclose: true,
                format: 'mm/dd/yyyy',
                startDate: new Date()
            });
         
         $('.payment-information #cc_number').validateCreditCard(function(result) {
	        console.log('Card type: ' + (result.card_type == null ? '-' : result.card_type.name) +
	            '<br>Valid: ' + result.valid +
	            '<br>Length valid: ' + result.length_valid +
	            '<br>Luhn valid: ' + result.luhn_valid);
	        card_result = result;
	        if (result.card_type == null) {

				$('.card_logos .cardtype').addClass('active');
	        } 
	        else 
	        {
	           $('.card_logos .cardtype').removeClass('active');
	           
	           if(result.card_type.name == "visa")
	           {
			   	$('.card_visa').addClass('active');
			   }
			   if(result.card_type.name == "mastercard")
	           {
			   	$('.card_mastercard').addClass('active');
			   }
			   if(result.card_type.name == "amex")
	           {
			   	$('.card_amex').addClass('active');
			   }
			   if(result.card_type.name == "discover")
	           {
			   	$('.card_discover').addClass('active');
			   }
	        }



	    });
         
         $('.frmsalesportal').validate({
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
					 address1 : {
						required: true
					},
					city : {
						required: true
					},
					 state : {
						required: true
					},
					 county : {
						required: true
					},
					 zip : {
						required: true
					},
					 country : {
						required: true
					},
					 email_address : {
						required: true,
						email: true
					},
					 main_phone_no : {
						required: true
					},
					 social_security_no : {
						required: true
					},
					 property_type : {
						required: true
					},
					company_name: {
	                    required: true
	                },
					com_first_name: {
	                    required: true
	                },
	                com_last_name : {
						required: true
					},
					 com_address1 : {
						required: true
					},
					com_city : {
						required: true
					},
					 com_state : {
						required: true
					},
					 com_county : {
						required: true
					},
					 com_zip : {
						required: true
					},
					 com_country : {
						required: true
					},
					package_detail : {
						required: true
					},
					level_of_service : {
						required: true
					},
					communication_type : {
						required: true
					},
					length_of_contract : {
						required: true
					},
					panel_type : {
						required: true
					},
					door_window : {
						required: true
					},
					motion : {
						required: true
					},
					smoke : {
						required: true
					},
					glass_break : {
						required: true
					},
					alarm_other : {
						required: true
					},
					thermostat : {
						required: true
					},
					lock : {
						required: true
					},
					light : {
						required: true
					},
					indoor : {
						required: true
					},
					outdoor : {
						required: true
					},
					sky_bell : {
						required: true
					},					
					existing_panel_type: {
						required: true
					},
					wired_wireless: {
						required: true
					},
					rmr: {
						required: true
					},
					install_charges: {
						required: true
					},
					activation_charge: {
						required: true
					},
					first_install_date: {
						required: true
					},					
					second_install_date: {
						required: true
					},					
					routing_number : {
						required: "#chkaccount:checked"
					},
					account_number : {
						required: "#chkaccount:checked"
					},
					cc_number : {
						required: "#chkcreditcard:checked",
						creditcard: true
					},
					cc_exp_date : {
						required:  "#chkcreditcard:checked",
						ccExp:  "#chkcreditcard:checked"
					},
					cc_cvv : {
						required:  "#chkcreditcard:checked"
					},
					billing_first_name : {
						required: true
					},
					billing_last_name : {
						required: true
					},
					billing_address1 : {
						required: true
					},
					billing_city : {
						required: true
					},
					billing_state : {
						required: true
					},
					billing_zip : {
						required: true
					},
					billing_county : {
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
					 address1 : {
						required: "Address 1 is required."
					},
					 city : {
						required: "City is required."
					},
					 state : {
						required: "State is required."
					},
					 county : {
						required: "County is required."
					},
					 zip : {
						required: "Zip is required."
					},
					 country : {
						required: "Country is required."
					},
					 email_address : {
						required: "Email is required."
					},
					 main_phone_no : {
						required: "Main Phone Number is required."
					},
					 social_security_no : {
						required: "Social Security Number is required."
					},
					 property_type : {
						required: "Property is required."
					},
					company_name: {
	                    required: "Company name is required."
	                },
					com_first_name: {
	                    required: "First name is required."
	                },
	                com_last_name: {
	                    required: "Last name is required."
	                },
					 com_address1 : {
						required: "Address 1 is required."
					},
					 com_city : {
						required: "City is required."
					},
					 com_state : {
						required: "State is required."
					},
					 com_county : {
						required: "County is required."
					},
					 com_zip : {
						required: "Zip is required."
					},
					 com_country : {
						required: "Country is required."
					},
					package_detail : {
						required: "Package is required."
					},
					level_of_service : {
						required: "Level of Service is required."
					},
					communication_type : {
						required: "Communication Type is required."
					},
					length_of_contract : {
						required: "Length of Contract is required."
					},
					panel_type : {
						required: "Panel Type is required."
					},
					door_window : {
						required: "Door/window is required."
					},
					motion : {
						required: "Motion is required."
					},
					smoke : {
						required: "Smoke is required."
					},
					glass_break : {
						required: "Glass Break is required."
					},
					alarm_other : {
						required: "Other is required."
					},
					thermostat : {
						required: "Thermostat is required."
					},
					lock : {
						required: "Lock is required."
					},
					light : {
						required: "Light is required."
					},
					indoor : {
						required: "Indoor is required."
					},
					outdoor : {
						required: "Outdoor is required."
					},
					
					sky_bell : {
						required: "Sky Bell is required."
					},				
					existing_panel_type: {
						required: "Existing Panel Type is required."
					},
					wired_wireless: {
						required: "Wired/Wireless is required."
					},
					rmr: {
						required: "RMR is required."
					},
					install_charges: {
						required: "Install Charges is required."
					},
					activation_charge: {
						required: "Activation Charge is required."
					},
					first_install_date: {
						required: "First Install Date is required."
					},					
					second_install_date: {
						required: "Second Install Date is required."
					},				
					routing_number : {
						required: "Routing Number is required."
					},
					account_number : {
						required: "Account Number is required."
					},
					cc_number : {
						required: "Credit Card Number  is required."
					},
					cc_exp_date : {
						required: "Expiry Date is required."
					},
					cc_cvv : {
						required: "CVV is required."
					},
					billing_first_name : {
						required: "First Name is required."
					},
					billing_last_name : {
						required: "Last Name is required."
					},
					billing_address1 : {
						required: "Address1 is required."
					},
					billing_city : {
						required: "City is required."
					},
					billing_state : {
						required: "State is required."
					},
					billing_zip : {
						required: "Zip is required."
					},
					billing_county : {
						required: "County is required."
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
         //$('.postal-code').mask('00000');
         $('.ssn').mask('000-00-0000');
         $('.phone').mask('(000) 000-0000');
         $('#cc_exp_date').mask('00/0000');
         $('#cc_cvv').mask('0000');
         $('.date').mask('00/00/0000');
         $('.number').ForceNumericOnly();
         var currentStep = 1;
         
         $('.sales-portal-section').on('click', '.btn-prev', function(e) {
              currentStep -= 1;
            if (currentStep <= 0) {
                currentStep = 1;
            }
            $('.sales-portal-section .actions .btn').hide();
            if (currentStep == 1) {
               
                 $('.btn-next-credit-check').show();
            }
            else
            {
				 $(this).show();
				$('.btn-next-package').show();
			}
          
            $(".step-content").find(".step-pane").removeClass('active').hide();
            $(".step-content").find("#step" + currentStep).addClass('active').show();
             
         });
         $('.sales-portal-section').on('click', '.btn-next-credit-check', function(e) {
            if ($('.frmsalesportal').validate().form() == false) {
                return false;
            }
              $(this).hide();
              $('.sales-portal-section .btn-prev').show();
              $('.btn-next-package').show();
              currentStep += 1;
             $(".step-content").find(".step-pane").removeClass('active').hide();
             $(".step-content").find("#step" + currentStep).addClass('active').show();
            
        });
        
        $('.sales-portal-section').on('click', '.btn-next-package', function(e) {
            if ($('.frmsalesportal').validate().form() == false) {
                return false;
            }
             currentStep += 1;
             $(this).hide();
              $('.btn-confirm-econtract').show();
             $(".step-content").find(".step-pane").removeClass('active').hide();
             $(".step-content").find("#step" + currentStep).addClass('active').show();
            
        });
        
         $('.sales-portal-section').on('click', '.btn-confirm-econtract', function(e) {
            if ($('.frmsalesportal').validate().form() == false) {
                return false;
            }
            var btn = $(this);
            var url = $('.frmsalesportal').attr('action');
			var formdata = $('.frmsalesportal').serialize();
			$.ajax(
				{
				type: 'post',
				url: url,
				dataType: 'json',
				data:formdata,
				cache:false,
				beforeSend: function() {
				 btn.button('loading');
				 
				var modalbody = "<h3>We are processing your order.<br/>Please DO NOT hit refresh or back.</h3>";
					modalbody += "<div class='modal-progress'><div class='progress progress-striped active'>";
					modalbody += "<div class='progress-bar  progress-bar-info' style='width: 100%;'>";
				modalbody += "</div></div></div>";
				$msgModal.find('.modal-body').removeClass('alert-success alert-info alert-danger');
				$msgModal.find('.modal-body').addClass('alert-info');
				$msgModal
				.find('.modal-body').html(modalbody).end()
				.modal('show');
				 
				},
				success: function(data) {
				if (data != null) {
				 btn.button('reset');
				if (data.success) {
				
				 
				  window.location = data.redirect_url;
				  
			  
				}
				else {							
				
				   var modalbody = "<h3>"+ data.message +"</h3>";
					modalbody += "<div class='modal-progress'><div class='progress progress-striped active'>";
					modalbody += "<div class='progress-bar  progress-bar-danger' style='width: 100%;'>";
					modalbody += "</div></div></div>";
					$msgModal.find('.modal-body').removeClass('alert-success alert-info alert-danger');
					$msgModal.find('.modal-body').addClass('alert-danger');
					$msgModal
					.find('.modal-body').html(modalbody).end()
					.modal('show');
					 setTimeout(function(){
					$msgModal.modal('hide');
					}, 3000);
				  
				}
				}
				},
				error: function (request, status, error) { alert(status + ", " + error);  btn.button('reset');}
				}); // end ajax  
            
        });
        
         $('.sales-portal-section').on('change', '#property_type', function(e) {
            if ($(this).val() == "Residential") {
                $('.commercial-details').fadeOut();
            }
            else
            {
				 $('.commercial-details').fadeIn();
			}
			if($('.chksameaddress').prop("checked") == true) {
			 $('.commercial-address').fadeOut();
			}
			else
			{
			 $('.commercial-address').fadeIn();	
			}
        });
        
         $('.sales-portal-section').on('click', '.chksameaddress', function(e) {
          
			if($(this).prop("checked") == true) {
			 $('.commercial-address').fadeOut();
			}
			else
			{
			 $('.commercial-address').fadeIn();	
			}
        });
        
         $('.sales-portal-section').on('click', '#chkcreditcard', function(e) {
        
			        $('#cc-warning-modal').modal({
						    backdrop: 'static',
						    keyboard: false
						});
        });
         $('.sales-portal-section').on('click', '#chkinvoice', function(e) {
        
			        $('#invoice-warning-modal').modal({
						    backdrop: 'static',
						    keyboard: false
						});
        });
        

		$(document).on('click', '.panel-heading span.collapse-toggle', function(e){
		    var $this = $(this);
			if(!$this.hasClass('collapsed')) {
				$this.parents('.panel').find('.panel-body').slideUp();
				$this.addClass('collapsed');
				//$this.find('i').addClass('transform-arrow');
			} else {
				$this.parents('.panel').find('.panel-body').slideDown();
				$this.removeClass('collapsed');
				//$this.find('i').removeClass('transform-arrow');
			}
		})


	};
    return {
        //main function to initiate the module
        init: function(baseurl) {
            handleSendContract(baseurl);
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
