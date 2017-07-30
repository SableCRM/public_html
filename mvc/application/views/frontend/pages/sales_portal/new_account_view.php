<!-- BEGIN PORTAL -->
<?php
$first_name = isset($contact_data['First Name'])?$contact_data['First Name']:"";
$last_name = isset($contact_data['Last Name'])?$contact_data['Last Name']:"";
	$address1 = isset($deal_data['Address']) ? $deal_data['Address'] : "";
	$city = isset($deal_data['City']) ? $deal_data['City'] : "";
	$state = isset($deal_data['State']) ? $deal_data['State'] : "";
	$zip = isset($deal_data['Zip']) ? $deal_data['Zip'] : "";
	$county = isset($deal_data['County']) ? $deal_data['County'] : "";
	$country = isset($deal_data['Country']) ? $deal_data['Country'] : "";
$email_address =  isset($contact_data['Email'])?$contact_data['Email']:"";
$main_phone_no =  isset($contact_data['Phone'])?$contact_data['Phone']:"";
$social_security_no =  isset($contact_data['Social Security Number'])?$contact_data['Social Security Number']:"";
//Deal Data
$property_type =  isset($deal_data['Residential/Commercial'])?$deal_data['Residential/Commercial']:"";
$company_type = isset($deal_data['Business Type'])?$deal_data['Business Type']:"";
$company_name = isset($deal_data['Account Name'])?$deal_data['Account Name']:"";

$package_detail = isset($deal_data['Package Type'])?$deal_data['Package Type']:"";
$level_of_service = isset($deal_data['Monitoring Level'])?$deal_data['Monitoring Level']:"";
	$length_of_contract = isset($deal_data['Contract Term']) ? $deal_data['Contract Term'] : "";
$panel_type = isset($deal_data['Panel Type'])?$deal_data['Panel Type']:"";
$door_window = isset($deal_data['Door(s) / Window(s)'])?$deal_data['Door(s) / Window(s)']:"";
$motion = isset($deal_data['Motion(s)'])?$deal_data['Motion(s)']:"";
$smoke = isset($deal_data['Smoke(s)'])?$deal_data['Smoke(s)']:"";
$glass_break = isset($deal_data['Glass Break(s)'])?$deal_data['Glass Break(s)']:"";
$alarm_other = isset($deal_data['Other'])?$deal_data['Other']:"";
$thermostat = isset($deal_data['Thermostat(s)'])?$deal_data['Thermostat(s)']:"";
$lock = isset($deal_data['Lock(s)'])?$deal_data['Lock(s)']:"";

$light = isset($deal_data['Light(s)'])?$deal_data['Light(s)']:"";
$indoor = isset($deal_data['Indoor Camera(s)'])?$deal_data['Indoor Camera(s)']:"";
$outdoor = isset($deal_data['Outdoor Camera(s)'])?$deal_data['Outdoor Camera(s)']:"";
$sky_bell = isset($deal_data['Sky Bell'])?$deal_data['Sky Bell']:"";
$existing_panel_type = isset($deal_data['Existing Panel Type'])?$deal_data['Existing Panel Type']:"";
$wired_wireless = isset($deal_data['Wired / Wireless'])?$deal_data['Wired / Wireless']:"";
$rmr = isset($deal_data['RMR'])?$deal_data['RMR']:"";
$install_charges = isset($deal_data['Amount'])?$deal_data['Amount']:"";
$activation_charge = isset($deal_data['Activation Fee'])?$deal_data['Activation Fee']:"";

$first_install_date = isset($deal_data['1st Choice Install Date'])?$deal_data['1st Choice Install Date']:"";
if($first_install_date != "")
{
	$first_install_date = date('m/d/Y',strtotime($first_install_date));
}

$first_install_time = isset($deal_data['1st Choice Install Time'])?$deal_data['1st Choice Install Time']:"";
$second_install_date = isset($deal_data['2nd Choice Install Date'])?$deal_data['2nd Choice Install Date']:"";
if($second_install_date != "")
{
	$second_install_date = date('m/d/Y',strtotime($second_install_date));
}
$second_install_time = isset($deal_data['2nd Choice Install Time'])?$deal_data['2nd Choice Install Time']:"";

$payment_method = isset($deal_data['Easy Pay Method'])?$deal_data['Easy Pay Method']:"";
$routing_number = isset($deal_data['ACH Routing Number'])?$deal_data['ACH Routing Number']:"";
$account_number = isset($deal_data['ACH Account'])?$deal_data['ACH Account']:"";

$cc_number = isset($deal_data['Card Number'])?$deal_data['Card Number']:"";
	$cc_exp_date = isset($deal_data['Expiration Date']) ? $deal_data['Expiration Date'] : "";
	$cc_cvv = isset($deal_data['CID']) ? $deal_data['CID'] : "";

$takeover = isset($deal_data['Takeover'])?$deal_data['Takeover']:"";
$adc_video = isset($deal_data['ADC Video'])?$deal_data['ADC Video']:"";
$twoway = isset($deal_data['Two Way Voice'])?$deal_data['Two Way Voice']:"";

$contact_id = isset($contact_data['CONTACTID'])?$contact_data['CONTACTID']:"";

?>
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
         
      
      <span class="step-circle package"><span><img src="<?php echo base_url(); ?>images//package-icon.png" alt="package"></span></span>
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
                     <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?php echo $first_name; ?>">
                     <input type="hidden" id="contact_id"  name="contact_id" value="<?php echo $contact_id; ?>" />
	               <input type="hidden" id="run_spouse" name="run_spouse" value=""/>
               </div>
               <div class="form-group col-sm-6">
                  <label for="last_name">Last Name:</label>
                  <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo $last_name; ?>">
               </div>
          </div>
          <div class="row">
               <div class="form-group col-sm-4">
                  <label for="address1">Address 1:</label>
                  <input type="text" class="form-control" id="address1" name="address1" value="<?php echo $address1; ?>" placeholder="Address 1" >
               </div>
                <div class="form-group col-sm-4">
                  <label for="address2">Address 2:</label>
                  <input type="text" class="form-control" id="address2" name="address2" value="" placeholder="Address 2" >
               </div>
                <div class="form-group col-sm-4">
                  <label for="city">City:</label>
                  <input type="text" class="form-control" id="city" name="city" value="<?php echo $city; ?>" placeholder="City" >
               </div>
            </div>
            <div class="row">
              
                <div class="form-group col-sm-3">
                  <label for="state">State:</label>
                  <input type="text" class="form-control state" id="state" name="state" value="<?php echo $state; ?>" placeholder="State" >
               </div>
                 <div class="form-group col-sm-3">
                  <label for="state">County:</label>
                  <input type="text" class="form-control" id="county" name="county" value="<?php echo $county; ?>" placeholder="County" >
               </div>
                <div class="form-group col-sm-3">
                  <label for="zip">Zip:</label>
                  <input type="text" class="form-control postal-code" id="zip" name="zip" value="<?php echo $zip; ?>" placeholder="Zip" >
               </div>
                <div class="form-group col-sm-3">
                  <label for="country">Country:</label>
                  <select  class="form-control" id="country" name="country">
		                <option <?php echo ($country == "USA") ? "selected" : "" ?> value="US">US</option>
		                <option <?php echo ($country == "CANADA") ? "selected" : "" ?> value="CA">CA</option>
		        </select>
               </div>
            </div>
            <div class="divider"></div>
            <div class="row">
               <div class="form-group col-sm-6">
                     <label for="email_address">Email Address:</label>
                     <input type="text" class="form-control" id="email_address" name="email_address" placeholder="Email Address" value="<?php echo $email_address; ?>">
               </div>
               <div class="form-group col-sm-6">
                  <label for="main_phone_no">Main Phone #:</label>
                  <input type="text" class="form-control phone" id="main_phone_no" name="main_phone_no" placeholder="Main Phone #:" value="<?php echo $main_phone_no; ?>">
               </div>
          </div>
          <div class="row">
               <div class="form-group col-sm-6">
                  <label for="social_security_no">Social Security #:</label>
                  <input type="text" class="form-control ssn" id="social_security_no" name="social_security_no" value="<?php echo $social_security_no; ?>" placeholder="###-##-####" >
               </div>
                <div class="form-group col-sm-6">
                  <label for="address_1">Property Type:</label>
                  <select class="form-control" id="property_type" name="property_type">
		                <option <?php echo ($property_type == "Residential") ? "selected" : "" ?> value="Residential">Residential</option>
		                <option <?php echo ($property_type == "Commercial") ? "selected" : "" ?> value="Commercial">Commercial</option>
		            </select>
               </div>
               
            </div>
         <div class="divider"></div>
        <div class="commercial-details" style="<?php echo ($property_type == "Commercial") ? "" : "display:none" ?>">
        	  <div class="row">
               <div class="form-group col-sm-6">
                  <label for="company_name">Company Name:</label>
                  <input type="text" class="form-control" id="company_name" name="company_name" value="<?php echo $company_name; ?>" placeholder="Company Name" >
               </div>
                <div class="form-group col-sm-6">
                  <label for="company_type">Company Type:</label>
                  <select class="form-control" id="company_type" name="company_type">
		                <option <?php echo ($company_type == "Corporation") ? "selected" : "" ?> value="Corporation">Corporation</option>
	                    <option <?php echo ($company_type == "Proprietorship") ? "selected" : "" ?> value="Proprietorship">Proprietorship</option>
	                    <option <?php echo ($company_type == "LLC") ? "selected" : "" ?> value="LLC">LLC</option>
	                    <option <?php echo ($company_type == "Partnership") ? "selected" : "" ?> value="Partnership">Partnership</option>
		            </select>
               </div>
            </div>
             <div class="row personal_guarantee">
               <div class="form-group col-sm-6">
                 <h3 class=" sub-title">Personal Guarantee:</h3>
               </div>
                <div class="form-group col-sm-6">
                  <div class="checkbox checkbox-primary">
			      <input type="checkbox" class="chksameaddress" name="chksameaddress" id="chksameaddress" value="1">
			      <label class="chksameaddress" for="chksameaddress">Address same as above</label>
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
                  <input type="text" class="form-control state" id="com_state" name="com_state" value="" placeholder="State" >
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
		                <option <?php echo ($country == "USA") ? "selected" : "" ?> value="US">US</option>
		                <option <?php echo ($country == "CANADA") ? "selected" : "" ?> value="CA">CA</option>
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
         
      
      <span class="step-circle package"><span><img src="<?php echo base_url(); ?>images//package-icon.png" alt="package"></span></span>
      <div class="step-title-wrapper">
       <h2 class="step-title">Security System</h2>
       <div class="step-desc"><strong>Step 2:</strong>Build A Package</div>
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
	                  <option <?php echo ($package_detail == "Basic") ? "selected" : "" ?> value="Basic">Basic</option>
		                <option <?php echo ($package_detail == "Silver") ? "selected" : "" ?> value="Silver">Silver</option>
		                <option <?php echo ($package_detail == "Gold") ? "selected" : "" ?> value="Gold">Gold</option>
		                <option <?php echo ($package_detail == "Platinum") ? "selected" : "" ?> value="Platinum">Platinum</option>
		        </select>
               </div>
                <div class="form-group col-sm-4">
                  <label for="level_of_service">Level of Service:</label>
                  <select  class="form-control" id="level_of_service" name="level_of_service">
		                <option value="">Select</option>
	                  <option <?php echo ($level_of_service == "Wireless Signal Forwarding") ? "selected" : "" ?>
		                  value="Wireless Signal Forwarding">Wireless Signal Forwarding
	                  </option>
		                <option <?php echo ($level_of_service == "Interactive Security") ? "selected" : "" ?>  value="Interactive Security">Interactive Security</option>
		                <option <?php echo ($level_of_service == "Basic Interactive") ? "selected" : "" ?>  value="Basic Interactive">Basic Interactive</option>
		                <option <?php echo ($level_of_service == "Interactive Security and Automation") ? "selected" : "" ?>  value="Interactive Security and Automation">Interactive Security and Automation</option>
		                <option <?php echo ($level_of_service == "Interactive Gold") ? "selected" : "" ?>  value="Interactive Gold">Interactive Gold</option>
		                <option <?php echo ($level_of_service == "Landline") ? "selected" : "" ?>  value="Landline">Landline</option>
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
		                <option value="None">None</option>
		        </select>
               </div>
            </div>
            <div class="row">
                 <div class="form-group col-sm-6">
                   <label for="length_of_contract">Length of Contract:</label>
                  <select  class="form-control" id="length_of_contract" name="length_of_contract">
		                <option value="">Select</option>
	                  <option <?php echo ($length_of_contract == "36 Months") ? "selected" : "" ?> value="36 Months">36
		                  Months
	                  </option>
	                  <option <?php echo ($length_of_contract == "60 Months") ? "selected" : "" ?> value="60 Months">60
		                  Months
	                  </option>
		        </select>
               </div>
                <div class="form-group col-sm-2">
                <label for="chktakeover">Takeover:</label>
                <div class="checkbox checkbox-primary">
               	<input type="checkbox" name="chktakeover" id="chktakeover" value="1" <?php echo ($takeover == "true") ? "checked" : "" ?> >
               	<label></label>
               	</div>
               </div>
                <div class="form-group col-sm-2">
               <label for="chkvideo">Video:</label>
               <div class="checkbox checkbox-primary">
               	<input type="checkbox" name="chkvideo" id="chkvideo" value="1" <?php echo ($adc_video == "true") ? "checked" : "" ?> >
               	<label></label>
               	</div>
               </div>
                <div class="form-group col-sm-2">
                
               <label for="chktwoway">Twoway:</label>
                <div class="checkbox checkbox-primary">
               	<input type="checkbox" name="chktwoway" id="chktwoway" value="1" <?php echo ($twoway == "true") ? "checked" : "" ?> >
               		<label></label>
               	</div>
               </div>
               </div>
            <div class="divider"></div>
            
            <div class="row">
            <div class="col-sm-12"><h3 class="sub-heading">Alarm Details</h3></div>
               <div class="form-group col-sm-4">
                   <label for="panel_type">Panel Type:</label>
                  <select  class="form-control" id="panel_type" name="panel_type">
		                <option value="">Select</option>
	                  <option <?php echo ($panel_type == "Go Control") ? "selected" : "" ?> value="Go Control">Go
		                  Control
	                  </option>
		                <option <?php echo ($panel_type == "Go Control 3") ? "selected" : "" ?> value="Go Control 3">Go Control 3</option>
		                <option <?php echo ($panel_type == "GE Simon XTi-5") ? "selected" : "" ?> value="GE Simon XTi-5">GE Simon XTi-5</option>
		                <option <?php echo ($panel_type == "GE Simon XTi") ? "selected" : "" ?> value="GE Simon XTi">GE Simon XTi</option>
		                <option <?php echo ($panel_type == "GE Simon XT") ? "selected" : "" ?> value="GE Simon XT">GE Simon XT</option>
		                <option <?php echo ($panel_type == "GE Concord 4") ? "selected" : "" ?> value="GE Concord 4">GE Concord 4</option>
		                <option <?php echo ($panel_type == "DSC Neo") ? "selected" : "" ?> value="DSC Neo">DSC Neo</option>
		                <option <?php echo ($panel_type == "DSC PC1616") ? "selected" : "" ?> value="DSC PC1616">DSC PC1616</option>
		                <option <?php echo ($panel_type == "DSC PC1832") ? "selected" : "" ?> value="DSC PC1832">DSC PC1832</option>
		                <option <?php echo ($panel_type == "DSC Maxsys") ? "selected" : "" ?> value="DSC Maxsys">DSC Maxsys</option>
		                <option <?php echo ($panel_type == "Qolsys IQ 1") ? "selected" : "" ?> value="Qolsys IQ 1">Qolsys IQ 1</option>
		                <option <?php echo ($panel_type == "Honeywell Vista32FBPT") ? "selected" : "" ?> value="Honeywell Vista32FBPT">Honeywell Vista32FBPT</option>
		        </select>
               </div>
               <div class="form-group col-sm-4">
               <label for="door_window">Door / Window(s):</label>
               	<input class="form-control" type="number" name="door_window" placeholder="Door / Window(s)" id="door_window" value="<?php echo $door_window; ?>">
               </div>
               <div class="form-group col-sm-4">
               <label for="motion">Motion(s):</label>
               	<input class="form-control" type="number" name="motion" placeholder="Motion(s)" id="motion" value="<?php echo $motion; ?>">
               </div>
          </div>
          <div class="row">
              <div class="form-group col-sm-3">
               <label for="smoke">Smoke(s):</label>
               	<input class="form-control" type="number" name="smoke" placeholder="Smoke(s)" id="smoke" value="<?php echo $smoke; ?>">
               </div>
               <div class="form-group col-sm-3">
               <label for="glass_break">Glass Break(s):</label>
               	<input class="form-control" type="number" name="glass_break" placeholder="Glass Break(s)" id="glass_break" value="<?php echo $glass_break; ?>">
               </div>
               <div class="form-group col-sm-6">
			    <label for="alarm_other">Other:</label>
			    <textarea class="form-control" id="alarm_other" name="alarm_other" rows="3"><?php echo $alarm_other; ?></textarea>
			  </div>
            </div>
            <div class="divider"></div>
            <div class="row">
            <div class="col-sm-12"><h3 class="sub-heading">Z-wave Details</h3></div>
            
              <div class="form-group col-sm-4">
               <label for="thermostat">Thermostat(s):</label>
               	<input class="form-control" type="number" name="thermostat" placeholder="Thermostat(s)" id="thermostat" value="<?php echo $thermostat; ?>">
               </div>
               <div class="form-group col-sm-4">
               <label for="lock">Lock(s):</label>
               	<input class="form-control" type="number" name="lock" placeholder="Lock(s)" id="lock" value="<?php echo $lock; ?>">
               </div>
                <div class="form-group col-sm-4">
               <label for="light">Light(s):</label>
               	<input class="form-control" type="number" name="light" placeholder="Light(s)" id="light" value="<?php echo $light; ?>">
               </div>
            </div>
            <div class="divider"></div>
            <div class="row">
            <div class="col-sm-12"><h3 class="sub-heading">ADC Camera Details</h3></div>
            
              <div class="form-group col-sm-4">
               <label for="indoor">Indoor:</label>
               	<input class="form-control" type="number" name="indoor" placeholder="Indoor" id="indoor" value="<?php echo $indoor; ?>">
               </div>
               <div class="form-group col-sm-4">
               <label for="outdoor">Outdoor:</label>
               	<input class="form-control" type="number" name="outdoor" placeholder="Outdoor" id="outdoor" value="<?php echo $outdoor; ?>">
               </div>
                 <div class="form-group col-sm-4">
                   <label for="sky_bell">Sky Bell:</label>
                  <select  class="form-control" id="sky_bell" name="sky_bell">
		                <option value="">Select</option>
	                  <option <?php echo ($sky_bell == "Silver") ? "selected" : "" ?> value="Silver">Silver</option>
		                <option <?php echo ($sky_bell == "Black") ? "selected" : "" ?> value="Black">Black</option>
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
	                  <option <?php echo ($existing_panel_type == "Honeywell") ? "selected" : "" ?> value="Honeywell">
		                  Honeywell
	                  </option>
		                <option <?php echo ($existing_panel_type == "2 Gig") ? "selected" : "" ?> value="2 Gig">2 Gig</option>
		                <option <?php echo ($existing_panel_type == "GE/Interlogix") ? "selected" : "" ?> value="GE/Interlogix">GE/Interlogix</option>
		                <option <?php echo ($existing_panel_type == "DSC") ? "selected" : "" ?> value="DSC">DSC</option>
		                <option <?php echo ($existing_panel_type == "Napco") ? "selected" : "" ?> value="Napco">Napco</option>
		                <option <?php echo ($existing_panel_type == "Other") ? "selected" : "" ?> value="Other">Other</option>
		          </select>
                 </div>
                 <div class="form-group col-sm-6">
                   <label for="wired_wireless">Wired / Wireless:</label>
                  <select  class="form-control" id="wired_wireless" name="wired_wireless">
		                <option value="">Select</option>
	                  <option <?php echo ($wired_wireless == "Hardwired") ? "selected" : "" ?> value="Hardwired">
		                  Hardwired
	                  </option>
		                <option <?php echo ($wired_wireless == "Wireless") ? "selected" : "" ?> value="Wireless">Wireless</option>
		                <option <?php echo ($wired_wireless == "Both") ? "selected" : "" ?> value="Both">Both</option>
		          </select>
                 </div>
            </div>
            <div class="divider"></div>
            <div class="row">
            <div class="col-sm-12"><h3 class="sub-heading">Pricing Information</h3></div>
            
              <div class="form-group col-sm-4">
                     <label for="rmr">RMR:</label>
	              <input type="text" class="form-control number" id="rmr" name="rmr" placeholder="Pricing RMR"
	                     value="<?php echo $rmr; ?>">
               </div>
                 <div class="form-group col-sm-4">
                     <label for="install_charges">Install Charges:</label>
	                 <input type="text" class="form-control number" id="install_charges" name="install_charges"
	                        placeholder="Pricing Install Charges" value="<?php echo $install_charges; ?>">
               </div>
               <div class="form-group col-sm-4">
                     <label for="activation_charge">Activation Charge:</label>
	               <input type="text" class="form-control number" id="activation_charge" name="activation_charge"
	                      placeholder="Pricing Activation Charge" value="<?php echo $activation_charge; ?>">
               </div>
            </div>
            <div class="divider"></div>
            <div class="row">
            <div class="col-sm-12"><h3 class="sub-heading">Installation</h3></div>
            <div class="form-group col-sm-6">
				  <label for="first_install_date">1st Install Date:</label>
				  <input class="form-control date" type="text" placeholder="mm/dd/yyyy" value="<?php echo $first_install_date; ?>" id="first_install_date" name="first_install_date">
				</div>
              <div class="form-group col-sm-6">
                   <label for="first_install_time">1st Install Time:</label>
                  <select  class="form-control" id="first_install_time" name="first_install_time">
		                <option <?php echo ($first_install_time == "AM") ? "selected" : "" ?> value="AM">AM</option>
		                <option <?php echo ($first_install_time == "PM") ? "selected" : "" ?> value="PM">PM</option>
		                <option <?php echo ($first_install_time == "LATE PM") ? "selected" : "" ?> value="LATE PM">LATE PM</option>
		          </select>
                 </div>
            </div>
            <div class="row">
            	<div class="form-group col-sm-6">
				  <label for="second_install_date">2nd Install Date:</label>
				  <input class="form-control date" type="text" placeholder="mm/dd/yyyy" value="<?php echo $second_install_date; ?>" id="second_install_date" name="second_install_date">
				</div>
                 <div class="form-group col-sm-6">
                   <label for="second_install_time">2nd Install Time:</label>
                  <select  class="form-control" id="second_install_time" name="second_install_time">
		                <option <?php echo ($second_install_time == "AM") ? "selected" : "" ?> value="AM">AM</option>
		                <option <?php echo ($second_install_time == "PM") ? "selected" : "" ?> value="PM">PM</option>
		                <option <?php echo ($second_install_time == "LATE PM") ? "selected" : "" ?> value="LATE PM">LATE PM</option>
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
              	<div class="radio radio-primary">
              	<input type="radio" value="ACH" name="chkpaymenttype" <?php echo ($payment_method == "ACH") ? "checked" : ""; ?>  id="chkaccount"><label>AutoPay from Checking Account (ACH)</label>
              	</div>
              </div>
               <div class="col-sm-6 checkingaccountimage">
              	<img src="<?php echo base_url(); ?>images/check-routing-account.png"/>
              </div>
            </div>
            <div class="row">
                 <div class="form-group col-sm-6">
                    <label class="sr-only" for="routingnumber">Routing Number:</label>
                     <input type="text" class="form-control number" placeholder="Routing Number" id="routing_number" name="routing_number" value="<?php echo $routing_number; ?>">
               </div>
                <div class="form-group col-sm-6">
              <label class="sr-only" for="accountnumber">Account Number:</label>
                     <input type="text" class="form-control number" placeholder="Account Number" id="account_number" name="account_number" value="<?php echo $account_number; ?>">
               </div>
                
               </div>
            <div class="divider"></div>
            <div class="row">
              <div class="form-group col-sm-12">
                <div class="radio radio-primary">
              	<input type="radio" value="CC" name="chkpaymenttype" <?php echo ($payment_method == "CC") ? "checked" : ""; ?> id="chkcreditcard"><label class="">Credit Card</label>
              	</div>
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
                     <input type="text" class="form-control" placeholder="Credit Card Number" id="cc_number" name="cc_number" value="<?php echo $cc_number; ?>">
               </div>
                <div class="form-group col-sm-4">
              <label class="sr-only" for="cc_exp_date">EXP (mm/yyyy):</label>
                     <input type="text" class="form-control" placeholder="EXP (mm/yyyy)" id="cc_exp_date" name="cc_exp_date" value="<?php echo $cc_exp_date; ?>">
               </div>
               <div class="form-group col-sm-2">
              <label class="sr-only" for="cc_cvc">CVV:</label>
                     <input type="text" class="form-control" placeholder="CVV" id="cc_cvc" name="cc_cvv" value="<?php echo $cc_cvv; ?>">
               </div>
                
               </div>
               <div class="divider"></div>
               <div class="row">
              <div class="form-group col-sm-12">
                 <div class="radio radio-primary">
              	    <input type="radio" value="INV" name="chkpaymenttype" <?php echo ($payment_method == "INV") ? "checked" : ""; ?> id="chkinvoice"><label class="">Invoice</label>
              	</div>
              </div>
            </div>
            <div class="divider"></div>
            <div class="row">
            <div class="col-sm-6"><h3 class="sub-heading">Billing Address</h3></div>
            	<div class="form-group col-sm-6">
            	<div class="checkbox checkbox-primary">	
            		<input type="checkbox" name="chkprimaryaddress" id="chkprimaryaddress"> <label>Use primary address for billing:</label>
            	</div>
               
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
                     <input type="text" class="form-control state" id="billing_state" name="billing_state"  placeholder="Billing State" value="">
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
			    <textarea class="form-control" id="additional_notes" name="additional_notes" rows="4"></textarea>
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
