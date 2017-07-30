<!-- BEGIN LOGIN -->
<div class="container login-container">
<div class="row section login-section">
  <div class="col-md-12">
  	<div class="login-header"></div>
  	<div class="login-logo-wrapper text-center">
  		<img src="<?php echo base_url(); ?>images/sable-logo.png" class="img-responsive" alt="Sable CRM">
  		<h3 class="sub-title">Log in to access your SableCRM+ account</h3>
  	</div>
  </div>
  <div class="col-md-12">
       <div class="login-box">
       	  <?php
         $attributes = array('class' => 'frmlogin', 'method' => 'post');
         echo form_open(base_url('user/ajaxlogin'), $attributes);
         ?>
           <div class="form-group">
           	  <label>Username:</label>
	           <input type="text" id="user_name" name="user_name" value="" autocomplete="off" class="form-control"
	                  placeholder="Username">
           </div>
           <div class="form-group">
           	  <label>Password:</label>
	           <input type="password" id="user_password" name="user_password" value="" autocomplete="off"
	                  class="form-control" placeholder="Password">
           </div>
           <div class="form-group">
            <a class="forgot-pwd" href="javascript:void(0)">Forgot Password?</a>
           </div>
           <div class="form-group">
           	  <div class="checkbox">
			      <input type="checkbox" class="chkremember" name="remember" id="remember" value="1">
			      <label for="remember">Keep me signed in</label>
			    </div>
           </div>
           <div class="form-group">
              <button type="button" class="btn btn-primary btn-login btn-block">Login</button>
           </div>
           <div style="display: none" class="alert"></div>
         <?php echo form_close(); ?>
       </div>
  </div>

</div>
</div>

<!-- END LOGIN -->
