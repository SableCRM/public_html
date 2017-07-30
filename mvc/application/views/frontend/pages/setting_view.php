<!-- BEGIN PORTAL -->
<div class="container settings-container">
<div class="row section profile-settings-section">

  
  <div class="col-md-12 profile-settings-header">
    <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
    <span class="portal-circle"><span><img src="<?php echo base_url(); ?>images/profile-settings-icon.png" alt="profile-settings"></span></span>
  
                <h1>Profile Settings</h1>
                <p>Personal Information / Change Password</p>
            </div>
  			</div>
  <div class="step-content"> 
   <div class="col-md-12 personal-information">
     <?php
         $attributes = array('class' => 'frmpersonal', 'method' => 'post');
         echo form_open(base_url('user/ajaxsaveuserpersonal'), $attributes);
         ?>
      <div class="panel  panel-custom">
        <div class="panel-heading">
            <h3 class="panel-title">
                Personal Information
                 <span class="collapse-toggle"><i class="fa fa-chevron-up" aria-hidden="true"></i></span>
                 <div class="clearfix"></div>
            </h3>
        </div>
        <div class="panel-body">
            <div class="row">
              <div class="form-group col-sm-4">
                     <label for="first_name">First Name:</label>
                     <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?php echo $user['USER_FIRST_NAME']; ?>">
               </div>
                 <div class="form-group col-sm-4">
                     <label for="last_name">Last Name:</label>
                     <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo $user['USER_LAST_NAME']; ?>">
               </div>
               <div class="form-group col-sm-4">
                     <label for="email_address">Email Address:</label>
                     <input type="email" class="form-control" id="email_address" name="email_address" placeholder="Email Address" value="<?php echo $user['USER_EMAIL']; ?>">
               </div>
            </div>
            <div class="row">
              <div class="form-group col-sm-4">
                     <label for="company_name">Company Name:</label>
                     <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" value="<?php echo $user['COMPANY_NAME']; ?>" disabled="">
               </div>
                 <div class="form-group col-sm-4">
                     <label for="mobile_number">Mobile Number:</label>
                     <input type="text" class="form-control number" id="mobile_number" placeholder="Mobile Number" name="mobile_number" value="<?php echo $user['USER_MOBILE']; ?>">
               </div>
               <div class="form-group col-sm-4">
                     <label for="work_number">Work Number:</label>
                     <input type="text" class="form-control number" id="work_number" placeholder="Work Number" name="work_number" value="<?php echo $user['USER_PHONE']; ?>">
               </div>
              
                <div class="form-group col-sm-12 text-right">
                <input  type="hidden" id="user_id" name="user_id"  value="<?php echo $user['USER_ID']; ?>" />
                <button type="button" class="btn-update-personal btn btn-primary">Update</button>
                </div>
                 <div class="col-sm-12">
                <div style="display: none" class="alert"></div>
               </div>
            </div>
        </div>
    </div>

      <?php echo form_close(); ?>
   </div>
  
    <div class="col-md-12 change-password">
      <?php
         $attributes = array('class' => 'frmresetpwd', 'method' => 'post');
         echo form_open(base_url('user/ajaxresetuserpwd'), $attributes);
         ?>
      <div class="panel  panel-custom">
        <div class="panel-heading">
            <h3 class="panel-title">
                Change Password
                 <span class="collapse-toggle"><i class="fa fa-chevron-up" aria-hidden="true"></i></span>
                 <div class="clearfix"></div>
            </h3>
        </div>
        <div class="panel-body">
            <div class="row">
              <div class="form-group col-sm-4">
                     <label for="current_password">Current Password:</label>
                     <input type="password" class="form-control" id="current_password" placeholder="Current Password" name="current_password" value="">
               </div>
                 <div class="form-group col-sm-4">
                     <label for="new_password">New Password:</label>
                     <input type="password" class="form-control" id="new_password" placeholder="New Password" name="new_password" value="">
               </div>
               <div class="form-group col-sm-4">
                     <label for="confirm_password">Confirm Password:</label>
                     <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password"name="confirm_password" value="">
               </div>
               
                <div class="form-group col-sm-12 text-right">
                <input  type="hidden" id="user_id" name="user_id"  value="<?php echo $user['USER_ID']; ?>" />
                <button type="button" class="btn btn-update-pwd btn-primary">Update Password</button>
                </div>
                 <div class="col-sm-12">
                <div style="display: none" class="alert"></div>
               </div>
            </div>
           
        </div>
    </div>
  
      <?php echo form_close(); ?>
   </div> 
   
   
  </div>

</div>
</div>
<!-- END PORTAL -->
