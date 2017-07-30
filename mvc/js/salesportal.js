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

		jQuery.validator.addMethod("cdnPostal", function (postal, element) {
			return this.optional(element) ||
				postal.match(/[a-zA-Z][0-9][a-zA-Z](-| |)[0-9][a-zA-Z][0-9]/);
		}, "Please specify a valid postal code.");

		jQuery.validator.addMethod("zipcodeUS", function (value, element) {
			return this.optional(element) || /\d{5}-\d{4}$|^\d{5}$/.test(value);
		}, "Please specify a valid postal code.");

		jQuery.validator.addMethod("cctypes", function (value, element, param) {

			if ($('#chkcreditcard:checked').length == 0) {
				return true;
			}


			if (/[^0-9\-]+/.test(value)) {
				return false;
			}

			value = value.replace(/\D/g, "");

			var validTypes = 0x0000;

			if (param.mastercard) {
				validTypes |= 0x0001;
			}
			if (param.visa) {
				validTypes |= 0x0002;
			}
			if (param.amex) {
				validTypes |= 0x0004;
			}
			if (param.dinersclub) {
				validTypes |= 0x0008;
			}
			if (param.enroute) {
				validTypes |= 0x0010;
			}
			if (param.discover) {
				validTypes |= 0x0020;
			}
			if (param.jcb) {
				validTypes |= 0x0040;
			}
			if (param.unknown) {
				validTypes |= 0x0080;
			}
			if (param.all) {
				validTypes = 0x0001 | 0x0002 | 0x0004 | 0x0008 | 0x0010 | 0x0020 | 0x0040 | 0x0080;
			}
			if (validTypes & 0x0001 && /^(5[12345])/.test(value)) { //mastercard
				alert(value.length);
				return value.length === 16;
			}
			if (validTypes & 0x0002 && /^(4)/.test(value)) { //visa
				return value.length === 16;
			}
			if (validTypes & 0x0004 && /^(3[47])/.test(value)) { //amex
				return value.length === 15;
			}
			if (validTypes & 0x0008 && /^(3(0[012345]|[68]))/.test(value)) { //dinersclub
				return value.length === 14;
			}
			if (validTypes & 0x0010 && /^(2(014|149))/.test(value)) { //enroute
				return value.length === 15;
			}
			if (validTypes & 0x0020 && /^(6011)/.test(value)) { //discover
				return value.length === 16;
			}
			if (validTypes & 0x0040 && /^(3)/.test(value)) { //jcb
				return value.length === 16;
			}
			if (validTypes & 0x0040 && /^(2131|1800)/.test(value)) { //jcb
				return value.length === 15;
			}
			if (validTypes & 0x0080) { //unknown
				return true;
			}
			return false;
		}, "Please enter a valid credit card number.");

		$('.sales-portal-section').on('change', '#country', function (e) {

			$("#zip").rules("remove", "cdnPostal zipcodeUS");

			if ($(this).val() == "US") {
				$("#zip").rules("add", {
					zipcodeUS: true
				});
			}
			else {
				$("#zip").rules("add", {
					cdnPostal: true
				});
			}

		});

		$('.sales-portal-section').on('change', '#com_country', function (e) {

			$("#com_zip").rules("remove", "cdnPostal zipcodeUS");

			if ($(this).val() == "US") {
				$("#com_zip").rules("add", {
					zipcodeUS: true
				});
			}
			else {
				$("#com_zip").rules("add", {
					cdnPostal: true
				});
			}

		});

		$('.sales-portal-section').on('change', '#billing_country', function (e) {

			$("#billing_zip").rules("remove", "cdnPostal zipcodeUS");

			if ($(this).val() == "US") {
				$("#billing_zip").rules("add", {
					zipcodeUS: true
				});
			}
			else {
				$("#billing_zip").rules("add", {
					cdnPostal: true
				});
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
						 required: true,
						 zipcodeUS: true
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
					/* social_security_no : {
						required: true
					},
					*/
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
						 required: true,
						 zipcodeUS: true
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
					/*panel_type : {
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
					*/
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
					chkpaymenttype: {
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
						creditcard: "#chkcreditcard:checked"
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
						required: true,
						zipcodeUS: true
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
					chkpaymenttype: {
						required: "Payment method is required."
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
					},
					additional_notes: {
						required: "Additional notes is required."
					}

	            },
			 invalidHandler: function (form, validator) {

				 if (!validator.numberOfInvalids())


				 /*  $('html, body').animate({
				  scrollTop: $(validator.errorList[0].element).offset().top - 150
				  }, 2000);*/

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
		$('#routing_number').mask('000000000');
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
			 $('#chkprimaryaddress').trigger("click");
             var btn = $(this);
            var url = base_url + 'user/checkcreditscore';
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

				var modalbody = "<h3>We are processing your request.<br/>Please DO NOT hit refresh or back.</h3>";
					modalbody += "<div class='modal-progress'><div class='progress progress-striped active'>";
					modalbody += "<div class='progress-bar  progress-bar-info' style='width: 100%;'>";
				modalbody += "</div></div></div>";
				$msgModal.find('.modal-body').removeClass('alert-success alert-info credit-warning alert-danger');
				$msgModal.find('.modal-body').addClass('alert-info');
				$msgModal
				.find('.modal-body').html(modalbody).end()
				.modal('show');

				},
				success: function(data) {
				if (data != null) {
				 btn.button('reset');
				if (data.success) {


					$msgModal.modal('hide');
					btn.hide();

					if (data.exist) {


						currentStep += 2;
						$('.btn-confirm-econtract').show();
						$('.sales-portal-section .btn-prev').show();
						$(".step-content").find(".step-pane").removeClass('active').hide();
						$(".step-content").find("#step" + currentStep).addClass('active').show();
					}
					else {

						$('.sales-portal-section .btn-prev').show();
						$('.btn-next-package').show();
						currentStep += 1;
						$(".step-content").find(".step-pane").removeClass('active').hide();
						$(".step-content").find("#step" + currentStep).addClass('active').show();
						$('p#credit_score').html('Your credit score: <strong>' + data.score + '</strong>');
					}


				}
				else {


						var modalbody = "<h3 class='warning-title'>"+ data.message +"</h3>";
						modalbody += "<div class='credit-warning-icon'><i class='fa fa-exclamation-triangle' aria-hidden='true'></i></div>";
						var credit_msg = "";
						var buttons = "";
						if(data.score <= 599 && data.score > 0)
						{
							credit_msg = "<strong>The customers credit score does not meet the minimum criteria for an alarm system.</strong> Please contact your administrator if you feel that this is an error.";
							buttons += "<button  type='button' class='btn btn-run-spouse btn-warning'>Run Spouse</button>";
							buttons += "<a href='" + base_url + "user/salesportal' type='button' class='btn btn-confirm-decline btn-info'>Confirm Decline</a>"
						}
						if(data.score == 0)
						{
							credit_msg = "<strong>We couldn't locate the customer with the information provided.</strong>Sometimes this may be caused by not living at an address long enough.  As an additional option, we recommend:";
							buttons += "<button  type='button' class='btn btn-run-previous-address btn-warning'>Run Previous Address</button>";
							buttons += "<a href='" + base_url + "user/salesportal' type='button' class='btn btn-confirm-decline btn-info'>Confirm Not Found</a>"
						}

					if (data.email_exist) {
						$('#contact_id').val(data.contact_id);
						credit_msg = "<strong>Do you want to create a new sale for this contact?";
						buttons += "<button data-contact_id='" + data.contact_id + "'  type='button' class='btn btn-add-deal-contact btn-warning'>Yes</button>";
						buttons += "<button data-dismiss='modal' type='button' class='btn btn-start-over btn-danger'>Start Over</button>";
					}
					else {
						buttons += "<button data-dismiss='modal' type='button' class='btn btn-danger'>Close</button>";
						}
						modalbody += "<p class='credit-waring-desc'>"+ credit_msg +"</p>";


					modalbody += buttons;

					$msgModal.find('.modal-body').removeClass('alert-success alert-info credit-warning alert-danger');
					$msgModal.find('.modal-body').addClass('credit-warning');
					$msgModal
						.find('.modal-body').html(modalbody).end()
						.modal('show');
				}
				}
				},
					error: function (request, status, error) {
						alert(status + ", " + error);
						btn.button('reset');
					}
				}); // end ajax


			 return false;
		 });

		$('.modal-custom-alert').on('click', '.btn-add-deal-contact', function (e) {

			var btn = $(this);
			var url = base_url + 'user/creditdealwithcontactexists';
			var formdata = $('.frmsalesportal').serialize();
			$.ajax(
				{
					type: 'post',
					url: url,
					dataType: 'json',
					data: formdata,
					cache: false,
					beforeSend: function () {
						btn.button('loading');
					},
					success: function (data) {
						if (data != null) {
							btn.button('reset');
							if (data.success) {


								$msgModal.modal('hide');
								btn.hide();
								$('.btn-next-credit-check').hide();
								if (data.exist) {


									currentStep += 2;
									$('.btn-confirm-econtract').show();
									$('.sales-portal-section .btn-prev').show();
									$(".step-content").find(".step-pane").removeClass('active').hide();
									$(".step-content").find("#step" + currentStep).addClass('active').show();
								}
								else {

									$('.sales-portal-section .btn-prev').show();
									$('.btn-next-package').show();
									currentStep += 1;
									$(".step-content").find(".step-pane").removeClass('active').hide();
									$(".step-content").find("#step" + currentStep).addClass('active').show();
									$('p#credit_score').html('Your credit score: <strong>' + data.score + '</strong>');
								}


							}
							else {


								var modalbody = "<h3 class='warning-title'>" + data.message + "</h3>";
								modalbody += "<div class='credit-warning-icon'><i class='fa fa-exclamation-triangle' aria-hidden='true'></i></div>";
								var credit_msg = "";
								var buttons = "";
								if (data.score <= 599 && data.score > 0) {
									credit_msg = "<strong>The customers credit score does not meet the minimum criteria for an alarm system.</strong> Please contact your administrator if you feel that this is an error.";
									buttons += "<button  type='button' class='btn btn-run-spouse btn-warning'>Run Spouse</button>";
									buttons += "<a href='" + base_url + "user/salesportal' type='button' class='btn btn-confirm-decline btn-info'>Confirm Decline</a>"
								}
								if (data.score == 0) {
									credit_msg = "<strong>We couldn't locate the customer with the information provided.</strong>Sometimes this may be caused by not living at an address long enough.  As an additional option, we recommend:";
									buttons += "<button  type='button' class='btn btn-run-previous-address btn-warning'>Run Previous Address</button>";
									buttons += "<a href='" + base_url + "user/salesportal' type='button' class='btn btn-confirm-decline btn-info'>Confirm Not Found</a>"
								}

								if (data.email_exist) {
									$('#contact_id').val(data.contact_id);
									credit_msg = "<strong>Do you want to create a new sale for this contact?";
									buttons += "<button data-contact_id='" + data.contact_id + "'  type='button' class='btn btn-add-deal-contact btn-warning'>Yes</button>";
								}

								modalbody += "<p class='credit-waring-desc'>" + credit_msg + "</p>";

						buttons += "<button data-dismiss='modal' type='button' class='btn btn-danger'>Close</button>";
						modalbody += buttons;

						$msgModal.find('.modal-body').removeClass('alert-success alert-info credit-warning alert-danger');
						$msgModal.find('.modal-body').addClass('credit-warning');
						$msgModal
						.find('.modal-body').html(modalbody).end()
						.modal('show');
				}
				}
				},
				error: function (request, status, error) { alert(status + ", " + error);  btn.button('reset');}
				}); // end ajax



             return false;


		});


		$('.modal-custom-alert').on('click', '.btn-confirm-decline', function (e) {

			var btn = $(this);
			var url = base_url + 'user/creditconfirmdecline';
			var formdata = $('.frmsalesportal').serialize();
			$.ajax(
				{
					type: 'post',
					url: url,
					dataType: 'json',
					data: formdata,
					cache: false,
					beforeSend: function () {
						btn.button('loading');
					},
					success: function (data) {
						if (data != null) {
							btn.button('reset');
							if (data.success) {
								window.location = base_url + "user/salesportal";
							}
							else {
								alert(data.message);
							}
						}
					},
					error: function (request, status, error) {
						alert(status + ", " + error);
						btn.button('reset');
					}
				}); // end ajax


			return false;


		});


     $('.modal-custom-alert').on('click', '.btn-run-spouse', function(e) {

		 var btn = $(this);
		 var url = base_url + 'user/runspouseprocess';
		 var formdata = $('.frmsalesportal').serialize();
		 $.ajax(
			 {
				 type: 'post',
				 url: url,
				 dataType: 'json',
				 data: formdata,
				 cache: false,
				 beforeSend: function () {
					 btn.button('loading');
				 },
				 success: function (data) {
					 if (data != null) {
						 btn.button('reset');
						 if (data.success) {
							 $('.customer-details').find("input.form-control").val('');
							 $(".customer-details").find("#first_name").focus();
							 $msgModal.modal('hide');
						 }
						 else {
							 alert(data.message);
						 }
					 }
				 },
				 error: function (request, status, error) {
					 alert(status + ", " + error);
					 btn.button('reset');
				 }
			 }); // end ajax


		 return false;


    });

     $('.modal-custom-alert').on('click', '.btn-run-previous-address', function(e) {
        $('.customer-details').find("#address1").val('');
        $('.customer-details').find("#address2").val('');
        $('.customer-details').find("#city").val('');
        $('.customer-details').find("#state").val('');
        $('.customer-details').find("#county").val('');
         $('.customer-details').find("#zip").val('');
        $(".customer-details").find("#address1").focus();
        $msgModal.modal('hide');
    });

		$('.modal-custom-alert').on('click', '.btn-start-over', function (e) {
			$('.customer-details').find("#first_name").val('');
			$('.customer-details').find("#last_name").val('');
			$('.customer-details').find("#address1").val('');
			$('.customer-details').find("#address2").val('');
			$('.customer-details').find("#city").val('');
			$('.customer-details').find("#state").val('');
			$('.customer-details').find("#county").val('');
			$('.customer-details').find("#zip").val('');
			$('.customer-details').find("#email_address").val('');
			$('.customer-details').find("#main_phone_no").val('');
			$(".customer-details").find("#first_name").focus();
			$msgModal.modal('hide');
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

			$("#additional_notes").rules("remove", "required");

			if ($("#state").val() == "CA" || $("#state").val() == "PA") {
				$("#additional_notes").rules("add", {
					required: true
				});
			}

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

					var modalbody = "<h3>We are processing your request.<br/>Please DO NOT hit refresh or back.</h3>";
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
					modalbody += "<button data-dismiss='modal' type='button' class='btn btn-danger'>Close</button>";

					$msgModal.find('.modal-body').removeClass('alert-success alert-info alert-danger');
					$msgModal.find('.modal-body').addClass('alert-danger');
					$msgModal
					.find('.modal-body').html(modalbody).end()
					.modal('show');
					/* setTimeout(function(){
					$msgModal.modal('hide');
					}, 3000);
				    */
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

		/* $('.sales-portal-section').on('click', '.chksameaddress', function(e) {

		 if($(this).prop("checked") == true) {
			 $('.commercial-address').fadeOut();
			}
			else
			{
		 $('.commercial-address').fadeIn();
			}
        });
        */
        $('.sales-portal-section').on('click', '.chksameaddress', function(e) {
           		if($(this).prop("checked") == true) {

					$('#com_first_name').val($('#first_name').val());
           			$('#com_last_name').val($('#last_name').val());
           			$('#com_address1').val($('#address1').val());
           			$('#com_address2').val($('#address2').val());
           			$('#com_city').val($('#city').val());
           			$('#com_state').val($('#state').val());
           			$('#com_zip').val($('#zip').val());
           			$('#com_county').val($('#county').val());
           			$('#com_country').val($('#country').val());


				}
           	    else
           	    {
					$('#com_first_name').val('');
           			$('#com_last_name').val('');
           			$('#com_address1').val('');
           			$('#com_address2').val('');
           			$('#com_city').val('');
           			$('#com_state').val('');
           			$('#com_zip').val('');
           			$('#com_county').val('');
					$('#com_country').val('US');
				}

			$("#com_zip").rules("remove", "cdnPostal zipcodeUS");

			if ($("#com_country").val() == "US") {
				$("#com_zip").rules("add", {
					zipcodeUS: true
				});
			}
			else {
				$("#com_zip").rules("add", {
					cdnPostal: true
				});
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
    if($('#chkcreditcard:checked').length == 0)
    {
		return true;
	}
    var today = new Date();
    var startDate = new Date(today.getFullYear(),today.getMonth(),1,0,0,0,0);
    var expDate = value;
    var separatorIndex = expDate.indexOf('/');
    expDate = expDate.substr( 0, separatorIndex ) + '/1' + expDate.substr( separatorIndex );
    return Date.parse(startDate) <= Date.parse(expDate);
},
"Your card's expiration year is in the past."
);
