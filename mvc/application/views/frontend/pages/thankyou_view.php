<!-- BEGIN PORTAL -->
<div class="container portal-container">
<div class="row section thankyou-section">
 		<div class="col-md-12 text-center">
		    	 <img src="<?php echo base_url(); ?>images/moni-logo.png"/>
       </div>
       <div class="col-md-8 col-md-offset-2 text-center credit-approved">
         <div class="success-circle col-md-12">
			  <img src="<?php echo base_url(); ?>images/green-check.png">
		 </div>
		 <h3>You're Done!</h3>
		 <?php
		 $customer = $this->session->userdata('sable_customer_info');
		  if($customer)
		  {
		  	 echo '<p class="desc"><strong>'.ucfirst($customer['first_name']).' '.ucfirst($customer['last_name']).'</strong></p>';
		  }
		 ?>
		 <p class="desc"> Thank you for your time. A team member will be contacting you shortly to confirm your installation</p>
		 <p class="notes">Check your e-mail for updates and information on getting started.</p>
		 <a class="btn btn-primary" href="<?php echo base_url(); ?>">Home</a>
       </div>
</div>
</div>
<!-- END PORTAL -->