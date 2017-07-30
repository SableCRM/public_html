<!-- BEGIN PORTAL -->
<div class="container portal-container">
<div class="row section sales-portal-section">
  <?php
         $attributes = array('class' => 'frmsalesportal', 'method' => 'post');
         echo form_open(base_url('user/ajaxsendcontract'), $attributes);
         ?>
  
  <div class="step-content">
   <div class="step-pane active" id="step1">
   <div class="col-md-12 new-account-steps">
    <div class="col-md-8 steps-heading">
         
    	 <img src="<?php echo base_url(); ?>images//package-icon.png"/>
    	 <div class="step-title-wrapper">
    	 	<h2 class="step-title">New Account</h2>
    	 	<div class="step-desc"><strong>Step 1:</strong> Customer Information</div>
    	 </div>
    </div>
    <div class="col-md-4 steps-heading">
    	 <img src="<?php echo base_url(); ?>images/moni-logo.png"/>
    </div>
   
  </div>
   <div class="col-md-12 customer-details">
      <div class="panel  panel-custom">
        <div class="panel-heading">
            <h3 class="panel-title">
                Customer Premise Information
                 <span class="collapse-toggle"><i class="fa fa-chevron-up" aria-hidden="true"></i></span>
                 <div class="clearfix"></div>
            </h3>
        </div>
        <div class="panel-body">
        	<div class="row">
               <div class="form-group col-sm-6">
                     <label for="first_name">First Name:</label>
                     <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?php echo $user['USER_FIRST_NAME']; ?>">
               </div>
               <div class="form-group col-sm-6">
                  <label for="last_name">Last Name:</label>
                  <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo $user['USER_LAST_NAME']; ?>">
               </div>
          </div>
          <div class="row">
               <div class="form-group col-sm-4">
                  <label for="address1">Address 1:</label>
                  <input type="text" class="form-control" id="address1" name="address1" value="<?php echo $user['USER_ADDRESS1']; ?>" placeholder="Address 1" >
               </div>
                <div class="form-group col-sm-4">
                  <label for="address2">Address 2:</label>
                  <input type="text" class="form-control" id="address2" name="address2" value="<?php echo $user['USER_ADDRESS2']; ?>" placeholder="Address 2" >
               </div>
                <div class="form-group col-sm-4">
                  <label for="city">City:</label>
                  <input type="text" class="form-control" id="city" name="city" value="<?php echo $user['USER_CITY']; ?>" placeholder="City" >
               </div>
            </div>
            <div class="row">
              
                <div class="form-group col-sm-3">
                  <label for="state">State:</label>
                  <input type="text" class="form-control" id="state" name="state" value="<?php echo $user['USER_STATE']; ?>" placeholder="State" >
               </div>
                 <div class="form-group col-sm-3">
                  <label for="state">County:</label>
                  <input type="text" class="form-control" id="county" name="county" value="Passaic" placeholder="County" >
               </div>
                <div class="form-group col-sm-3">
                  <label for="zip">Zip:</label>
                  <input type="text" class="form-control postal-code" id="zip" name="zip" value="<?php echo $user['USER_ZIP']; ?>" placeholder="Zip" >
               </div>
                <div class="form-group col-sm-3">
                  <label for="country">Country:</label>
                  <select  class="form-control" id="country" name="country">
		                <option value="US">US</option>
		                <option value="CA">CA</option>
		        </select>
               </div>
            </div>
            <div class="divider"></div>
            <div class="row">
               <div class="form-group col-sm-6">
                     <label for="email_address">Email Address:</label>
                     <input type="text" class="form-control" id="email_address" name="email_address" placeholder="Email Address" value="<?php echo $user['USER_EMAIL']; ?>">
               </div>
               <div class="form-group col-sm-6">
                  <label for="main_phone_no">Main Phone #:</label>
                  <input type="text" class="form-control phone" id="main_phone_no" name="main_phone_no" placeholder="Main Phone #:" value="2015132122">
               </div>
          </div>
          <div class="row">
               <div class="form-group col-sm-6">
                  <label for="social_security_no">Social Security #:</label>
                  <input type="text" class="form-control ssn" id="social_security_no" name="social_security_no" value="001989767" placeholder="###-##-####" >
               </div>
                <div class="form-group col-sm-6">
                  <label for="address_1">Property Type:</label>
                  <select class="form-control" id="property_type" name="property_type">
		                <option value="Residential">Residential</option>
		                <option value="Commercial">Commercial</option>
		            </select>
               </div>
               
            </div>
         <div class="divider"></div>
        <div style="display: none;" class="commercial-details">
        	  <div class="row">
               <div class="form-group col-sm-6">
                  <label for="company_name">Company Name:</label>
                  <input type="text" class="form-control" id="company_name" name="company_name" value="" placeholder="Company Name" >
               </div>
                <div class="form-group col-sm-6">
                  <label for="company_type">Company Type:</label>
                  <select class="form-control" id="company_type" name="company_type">
		                <option value="Corporation">Corporation</option>
	                    <option value="Proprietorship">Proprietorship</option>
	                    <option value="LLC">LLC</option>
	                    <option value="Partnership">Partnership</option>
		            </select>
               </div>
            </div>
             <div class="row personal_guarantee">
               <div class="form-group col-sm-6">
                 <h3 class=" sub-title">Personal Guarantee:</h3>
               </div>
                <div class="form-group col-sm-6">
                  <div class="custom-check-box">
			      <input type="checkbox" class="chksameaddress" name="chksameaddress" id="chksameaddress" value="1">
			      <label for="remember">Address same as above</label>
			    </div>
               </div>
            </div>
             <div class="commercial-address">
            <div class="row">
               <div class="form-group col-sm-6">
                     <label for="com_first_name">First Name:</label>
                     <input type="text" class="form-control" id="com_first_name" name="com_first_name" placeholder="First Name" value="">
               </div>
               <div class="form-group col-sm-6">
                  <label for="com_last_name">Last Name:</label>
                  <input type="text" class="form-control" id="com_last_name" name="com_last_name" placeholder="Last Name" value="">
               </div>
          </div>
          <div class="row">
               <div class="form-group col-sm-4">
                  <label for="com_address1">Address 1:</label>
                  <input type="text" class="form-control" id="com_address1" name="com_address1" value="" placeholder="Address 1" >
               </div>
                <div class="form-group col-sm-4">
                  <label for="com_address2">Address 2:</label>
                  <input type="text" class="form-control" id="com_address2" name="com_address2" value="" placeholder="Address 2" >
               </div>
                <div class="form-group col-sm-4">
                  <label for="com_city">City:</label>
                  <input type="text" class="form-control" id="com_city" name="com_city" value="" placeholder="City" >
               </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-3">
                  <label for="com_state">State:</label>
                  <input type="text" class="form-control" id="com_state" name="com_state" value="" placeholder="State" >
               </div>
                 <div class="form-group col-sm-3">
                  <label for="com_county">County:</label>
                  <input type="text" class="form-control" id="com_county" name="com_county" value="" placeholder="County" >
               </div>
                <div class="form-group col-sm-3">
                  <label for="com_zip">Zip:</label>
                  <input type="text" class="form-control postal-code" id="com_zip" name="com_zip" value="" placeholder="Zip" >
               </div>
                <div class="form-group col-sm-3">
                  <label for="com_country">Country:</label>
                  <select  class="form-control" id="com_country" name="com_country">
		                <option value="US">US</option>
		                <option value="CA">CA</option>
		        </select>
               </div>
            </div>
           </div>
        </div>
       </div>
    </div>
     
   </div>
   </div>
    <div class="step-pane" id="step2">
       <div class="col-md-12 new-account-steps">
           <div class="col-md-12 text-center steps-heading">
		    	 <img src="<?php echo base_url(); ?>images/moni-logo.png"/>
		    </div>
       </div>
       <div class="col-md-12 text-center credit-approved">
          <div class="success-circle col-md-12">
			  <img src="<?php echo base_url(); ?>images/green-check.png">
		 </div>
		 <h3>Success!</h3>
		 <p id="credit_score">Your credit score:&nbsp;<strong>644</strong></p>
       </div>
    </div>
    <div class="step-pane" id="step3">
    <div class="col-md-12 new-account-steps">
    <div class="col-md-8 steps-heading">
         
    	 <img src="<?php echo base_url(); ?>images//package-icon.png"/>
    	 <div class="step-title-wrapper">
    	 	<h2 class="step-title">Security System</h2>
    	 	<div class="step-desc"><strong>Step 2:</strong> Build A Package</div>
    	 </div>
    </div>
    <div class="col-md-4 steps-heading">
    	 <img src="<?php echo base_url(); ?>images/moni-logo.png"/>
    </div>
   
  </div>
   <div class="col-md-12 package-details">
      <div class="panel  panel-custom">
        <div class="panel-heading">
            <h3 class="panel-title">
                Package Details
                 <span class="collapse-toggle"><i class="fa fa-chevron-up" aria-hidden="true"></i></span>
                 <div class="clearfix"></div>
            </h3>
        </div>
        <div class="panel-body">
        	
            <div class="row">
              
               
                 <div class="form-group col-sm-4">
                   <label for="package_detail">Package:</label>
                  <select  class="form-control" id="package_detail" name="package_detail">
		                <option value="">Select</option>
		                <option value="Basic" selected>Basic</option>
		                <option value="Silver">Silver</option>
		                <option value="Gold">Gold</option>
		                <option value="Platinum">Platinum</option>
		        </select>
               </div>
                <div class="form-group col-sm-4">
                  <label for="level_of_service">Level of Service:</label>
                  <select  class="form-control" id="level_of_service" name="level_of_service">
		                <option value="">Select</option>
		                <option value="Wireless Signal Forwarding" selected>Wireless Signal Forwarding</option>
		                <option value="Interactive Security">Interactive Security</option>
		                <option value="Basic Interactive">Basic Interactive</option>
		                <option value="Interactive Security and Automation">Interactive Security and Automation</option>
		                <option value="Interactive Gold">Interactive Gold</option>
		                <option value="Landline">Landline</option>
		        </select>
               </div>
                <div class="form-group col-sm-4">
                  <label for="communication_type">Communication Type:</label>
                  <select  class="form-control" id="communication_type" name="communication_type">
		                <option value="">Select</option>
		                <option value="AlarmDotcom" selected>AlarmDotcom</option>
		                <option value="AlarmNet">AlarmNet</option>
		                <option value="Tellular">Tellular</option>
		                <option value="DSC">DSC</option>
		                <option value="icontrol">icontrol</option>
		        </select>
               </div>
            </div>
            <div class="row">
                 <div class="form-group col-sm-6">
                   <label for="length_of_contract">Length of Contract:</label>
                  <select  class="form-control" id="length_of_contract" name="length_of_contract">
		                <option value="">Select</option>
		                <option value="36 Months" selected>36 Months</option>
		                <option value="60 Months">60 Months</option>
		        </select>
               </div>
                <div class="form-group col-sm-2">
               <label for="chktakeover">Takeover:</label>
               	<input type="checkbox" name="chktakeover" id="chktakeover" value="1">
               </div>
                <div class="form-group col-sm-2">
               <label for="chkvideo">Video:</label>
               	<input type="checkbox" name="chkvideo" id="chkvideo" value="1">
               </div>
                <div class="form-group col-sm-2">
               <label for="chktwoway">Twoway:</label>
               	<input type="checkbox" name="chktwoway" id="chktwoway" value="1">
               </div>
               </div>
            <div class="divider"></div>
            
            <div class="row">
            <div class="col-sm-12"><h3 class="sub-heading">Alarm Details</h3></div>
               <div class="form-group col-sm-4">
                   <label for="panel_type">Panel Type:</label>
                  <select  class="form-control" id="panel_type" name="panel_type">
		                <option value="">Select</option>
		                <option value="Go Control" selected>Go Control</option>
		                <option value="Go Control 3">Go Control 3</option>
		                <option value="GE Simon XTi-5">GE Simon XTi-5</option>
		                <option value="GE Simon XTi">GE Simon XTi</option>
		                <option value="GE Simon XT">GE Simon XT</option>
		                <option value="GE Concord 4">GE Concord 4</option>
		                <option value="DSC Neo">DSC Neo</option>
		                <option value="DSC PC1616">DSC PC1616</option>
		                <option value="DSC PC1832">DSC PC1832</option>
		                <option value="DSC Maxsys">DSC Maxsys</option>
		                <option value="Qolsys IQ 1">Qolsys IQ 1</option>
		                <option value="Honeywell Vista32FBPT">Honeywell Vista32FBPT</option>
		        </select>
               </div>
               <div class="form-group col-sm-4">
               <label for="door_window">Door / Window(s):</label>
               	<input class="form-control" type="number" name="door_window" placeholder="Door / Window(s)" id="door_window" value="5">
               </div>
               <div class="form-group col-sm-4">
               <label for="motion">Motion(s):</label>
               	<input class="form-control" type="number" name="motion" placeholder="Motion(s)" id="motion" value="10">
               </div>
          </div>
          <div class="row">
              <div class="form-group col-sm-3">
               <label for="smoke">Smoke(s):</label>
               	<input class="form-control" type="number" name="smoke" placeholder="Smoke(s)" id="smoke" value="15">
               </div>
               <div class="form-group col-sm-3">
               <label for="glass_break">Glass Break(s):</label>
               	<input class="form-control" type="number" name="glass_break" placeholder="Glass Break(s)" id="glass_break" value="3">
               </div>
               <div class="form-group col-sm-6">
			    <label for="alarm_other">Other:</label>
			    <textarea class="form-control" id="alarm_other" name="alarm_other" rows="3">Testing</textarea>
			  </div>
            </div>
            <div class="divider"></div>
            <div class="row">
            <div class="col-sm-12"><h3 class="sub-heading">Z-wave Details</h3></div>
            
              <div class="form-group col-sm-4">
               <label for="thermostat">Thermostat(s):</label>
               	<input class="form-control" type="number" name="thermostat" placeholder="Thermostat(s)" id="thermostat" value="100">
               </div>
               <div class="form-group col-sm-4">
               <label for="lock">Lock(s):</label>
               	<input class="form-control" type="number" name="lock" placeholder="Lock(s)" id="lock" value="3">
               </div>
                <div class="form-group col-sm-4">
               <label for="light">Light(s):</label>
               	<input class="form-control" type="number" name="light" placeholder="Light(s)" id="light" value="2">
               </div>
            </div>
            <div class="divider"></div>
            <div class="row">
            <div class="col-sm-12"><h3 class="sub-heading">ADC Camera Details</h3></div>
            
              <div class="form-group col-sm-4">
               <label for="indoor">Indoor:</label>
               	<input class="form-control" type="number" name="indoor" placeholder="Indoor" id="indoor" value="3">
               </div>
               <div class="form-group col-sm-4">
               <label for="outdoor">Outdoor:</label>
               	<input class="form-control" type="number" name="outdoor" placeholder="Outdoor" id="outdoor" value="8">
               </div>
                 <div class="form-group col-sm-4">
                   <label for="sky_bell">Sky Bell:</label>
                  <select  class="form-control" id="sky_bell" name="sky_bell">
		                <option value="">Select</option>
		                <option value="Silver" selected>Silver</option>
		                <option value="Black">Black</option>
		        </select>
               </div>
            </div>
            <div class="divider"></div>
            <div class="row">
            <div class="col-sm-12"><h3 class="sub-heading">Takeover Details</h3></div>
            
              <div class="form-group col-sm-6">
                   <label for="existing_panel_type">Existing Panel Type:</label>
                  <select  class="form-control" id="existing_panel_type" name="existing_panel_type">
		                <option value="">Select</option>
		                <option value="Honeywell" selected>Honeywell</option>
		                <option value="2 Gig">2 Gig</option>
		                <option value="GE/Interlogix">GE/Interlogix</option>
		                <option value="DSC">DSC</option>
		                <option value="Napco">Napco</option>
		                <option value="Other">Other</option>
		          </select>
                 </div>
                 <div class="form-group col-sm-6">
                   <label for="wired_wireless">Wired / Wireless:</label>
                  <select  class="form-control" id="wired_wireless" name="wired_wireless">
		                <option value="">Select</option>
		                <option value="Hardwired" selected>Hardwired</option>
		                <option value="Wireless">Wireless</option>
		                <option value="Both">Both</option>
		          </select>
                 </div>
            </div>
            <div class="divider"></div>
            <div class="row">
            <div class="col-sm-12"><h3 class="sub-heading">Pricing Information</h3></div>
            
              <div class="form-group col-sm-4">
                     <label for="rmr">RMR:</label>
                     <input type="text" class="form-control" id="rmr" name="rmr"  placeholder="Pricing RMR" value="20">
               </div>
                 <div class="form-group col-sm-4">
                     <label for="install_charges">Install Charges:</label>
                     <input type="text" class="form-control" id="install_charges" name="install_charges" placeholder="Pricing Install Charges" value="100">
               </div>
               <div class="form-group col-sm-4">
                     <label for="activation_charge">Activation Charge:</label>
                     <input type="text" class="form-control" id="activation_charge" name="activation_charge" placeholder="Pricing Activation Charge" value="20">
               </div>
            </div>
            <div class="divider"></div>
            <div class="row">
            <div class="col-sm-12"><h3 class="sub-heading">Installation</h3></div>
            <div class="form-group col-sm-6">
				  <label for="first_install_date">1st Install Date:</label>
				  <input class="form-control date" type="text" placeholder="mm/dd/yyyy" value="04/27/2017" id="first_install_date" name="first_install_date">
				</div>
              <div class="form-group col-sm-6">
                   <label for="first_install_time">1st Install Time:</label>
                  <select  class="form-control" id="first_install_time" name="first_install_time">
		                <option value="AM">AM</option>
		                <option value="PM">PM</option>
		                <option value="LATE PM">LATE PM</option>
		          </select>
                 </div>
            </div>
            <div class="row">
            	<div class="form-group col-sm-6">
				  <label for="second_install_date">2nd Install Date:</label>
				  <input class="form-control date" type="text" placeholder="mm/dd/yyyy" value="10/27/2017" id="second_install_date" name="second_install_date">
				</div>
                 <div class="form-group col-sm-6">
                   <label for="second_install_time">2nd Install Time:</label>
                  <select  class="form-control" id="second_install_time" name="second_install_time">
		                <option value="AM">AM</option>
		                <option value="PM">PM</option>
		                <option value="LATE PM">LATE PM</option>
		          </select>
                 </div>
            </div>
        </div>
    </div>
     
   </div>
  <div class="col-md-12 payment-information">
      <div class="panel  panel-custom">
        <div class="panel-heading">
            <h3 class="panel-title">
                Payment Information
                 <span class="collapse-toggle"><i class="fa fa-chevron-up" aria-hidden="true"></i></span>
                 <div class="clearfix"></div>
            </h3>
        </div>
        <div class="panel-body">
        	
            <div class="row">
              <div class="form-group col-sm-6 checkingaccount">
              	<label class="custom-radio"><input type="radio" value="ACH" name="chkpaymenttype" checked="" id="chkaccount">AutoPay from Checking Account (ACH)</label>
              </div>
               <div class="col-sm-6 checkingaccountimage">
              	<img src="<?php echo base_url(); ?>images/check-routing-account.png"/>
              </div>
            </div>
            <div class="row">
                 <div class="form-group col-sm-6">
                    <label class="sr-only" for="routingnumber">Routing Number:</label>
                     <input type="text" class="form-control number" placeholder="Routing Number" id="routing_number" name="routing_number" value="1234567890">
               </div>
                <div class="form-group col-sm-6">
              <label class="sr-only" for="accountnumber">Account Number:</label>
                     <input type="text" class="form-control number" placeholder="Account Number" id="account_number" name="account_number" value="1234567890">
               </div>
                
               </div>
            <div class="divider"></div>
            <div class="row">
              <div class="form-group col-sm-12">
              	<label class="custom-radio"><input type="radio" value="CC" name="chkpaymenttype" id="chkcreditcard">Credit Card</label>
              </div>
               <div class="col-sm-12 creditcardimage">
              	<ul class="card_logos">
					<li class="card_visa cardtype"><img src="<?php echo base_url(); ?>images/visa.png"/></li>
					<li class="card_mastercard cardtype"><img src="<?php echo base_url(); ?>images/mastercard.png"/></li>
					<li class="card_amex cardtype"><img src="<?php echo base_url(); ?>images/discover.png"/></li>
					<li class="card_discover cardtype"><img src="<?php echo base_url(); ?>images/amex.png"/></li>
				</ul>
              </div>
            </div>
            <div class="row">
                 <div class="form-group col-sm-6">
                    <label class="sr-only" for="cc_number">Credit Card Number:</label>
                     <input type="text" class="form-control" placeholder="Credit Card Number" id="cc_number" name="cc_number" value="">
               </div>
                <div class="form-group col-sm-4">
              <label class="sr-only" for="cc_exp_date">EXP (mm/yyyy):</label>
                     <input type="text" class="form-control" placeholder="EXP (mm/yyyy)" id="cc_exp_date" name="cc_exp_date" value="04/2020">
               </div>
               <div class="form-group col-sm-2">
              <label class="sr-only" for="cc_cvc">CVV:</label>
                     <input type="text" class="form-control" placeholder="CVV" id="cc_cvc" name="cc_cvv" value="1234">
               </div>
                
               </div>
               <div class="divider"></div>
               <div class="row">
              <div class="form-group col-sm-12">
              	<label class="custom-radio"><input type="radio" value="INV" name="chkpaymenttype" id="chkinvoice">Invoice</label>
              </div>
            </div>
            <div class="divider"></div>
            <div class="row">
            <div class="col-sm-6"><h3 class="sub-heading">Billing Address</h3></div>
            	<div class="form-group col-sm-6">
            	<label class="custom-check-box">
            			<input type="checkbox" name="chkprimaryaddress" id="chkprimaryaddress"> Use primary address for billing:</label>
            	
               
               </div>
            </div>
            <div class="row">
            
            
              <div class="form-group col-sm-3">
                     <label for="billing_first_name:">First Name:</label>
                     <input type="text" class="form-control" id="billing_first_name" name="billing_first_name" placeholder="Billing First Name" value="">
               </div>
                 <div class="form-group col-sm-3">
                     <label for="billing_last_name">Last Name:</label>
                     <input type="text" class="form-control" id="billing_last_name" name="billing_last_name"  placeholder="Billing Last Name" value="">
               </div>
               <div class="form-group col-sm-6">
                     <label for="billing_address1">Address 1:</label>
                     <input type="text" class="form-control" id="billing_address1" name="billing_address1"  placeholder="Billing Address1" value="">
               </div>
            </div>
            <div class="row">
              <div class="form-group col-sm-4">
                     <label for="billing_address2">Address 2:</label>
                     <input type="text" class="form-control" id="billing_address2" name="billing_address2"  placeholder="Billing Address2" value="">
               </div>
                 <div class="form-group col-sm-4">
                     <label for="billing_city">City:</label>
                     <input type="text" class="form-control" id="billing_city" name="billing_city"  placeholder="Billing City" value="">
               </div>
               <div class="form-group col-sm-2">
                     <label for="billing_state">State:</label>
                     <input type="text" class="form-control" id="billing_state" name="billing_state"  placeholder="Billing State" value="">
               </div>
               <div class="form-group col-sm-2">
                     <label for="billing_zip">Zip:</label>
                     <input type="text" class="form-control" id="billing_zip" name="billing_zip"  placeholder="Billing Zip" value="">
               </div>
            </div>
            <div class="row">
              <div class="form-group col-sm-6">
                     <label for="billing_county">County:</label>
                     <input type="text" class="form-control" id="billing_county" name="billing_county"  placeholder="Billing County" value="">
               </div>
                 <div class="form-group col-sm-6">
                   <label for="billing_country">Country:</label>
                  <select  class="form-control" id="billing_country" name="billing_country">
		                <option value="US">US</option>
		                <option value="CA">CA</option>
		        </select>
               </div>
            </div>
        </div>
    </div>
     
   </div>
   
   <div class="col-md-12 additional-notes">
      <div class="panel  panel-custom">
        <div class="panel-heading">
            <h3 class="panel-title">
                Additional Notes
                 <span class="collapse-toggle"><i class="fa fa-chevron-up" aria-hidden="true"></i></span>
                 <div class="clearfix"></div>
            </h3>
        </div>
        <div class="panel-body">
        	
        	
            <div class="row">
                <div class="form-group col-sm-12">
			    <label for="additional_notes">If you have any additional notes to add for this account, please enter them here:</label>
			    <textarea class="form-control" id="additional_notes" name="additional_notes" rows="4">Additional Notes</textarea>
			  </div>
            </div>
            
        </div>
    </div>
     
   </div>
   </div>
  
  </div>
   <div class="col-sm-12 text-center actions">
       <div class="col-sm-6 col-left">
       	 <button style="display: none;" type="button" class="btn-prev btn btn-primary">Prev Step</button>
       </div>
        <div class="col-sm-6 col-right">
      	 <button type="button" class="btn-next btn-next-credit-check btn btn-primary">Next Step: Credit Check</button>
      	 <button style="display: none;" type="button" class="btn-next btn-next-package btn btn-primary">Next Step: Build A Package</button>
      	 <button style="display: none;" type="button" class="btn-confirm-econtract btn btn-primary">Confirm and Send eContract</button>
       </div>
    </div>
    
    <?php echo form_close(); ?>
</div>
</div>
<!-- END PORTAL -->