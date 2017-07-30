<!-- BEGIN PORTAL -->
<div class="container portal-container">
<div class="row section sales-portal-section">
  <div class="col-md-12 text-center sales-portal-header">
    <img src="<?php echo base_url(); ?>images/moni-logo.png"/>
    <h3 class="welcome">Welcome,  <strong><?php echo ucfirst($user['USER_FIRST_NAME']).' '.ucfirst($user['USER_LAST_NAME']) ?></strong></h3>
    <a href="<?php echo base_url(); ?>salesportal/newaccount" class="btn-new-sale btn btn-primary">Begin New Sale</a>
  </div>
</div>
</div>
<!-- END PORTAL -->