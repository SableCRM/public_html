<!--credit_card Modal -->
  <div class="modal fade warning-modal" id="cc-warning-modal" role="dialog">
	  <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body text-center">
         <h2 class="modal-title">WARNING</h2>
          <p>Paying with credit card is not recommended due to the high frequency of credit card number updates and expiration dates.</p>
          <button type="button" data-dismiss="modal" class="btn btn-primary">I understand </button>
        </div>
      </div>
    </div>
  </div>
  <!-- invoice Modal -->
  <div class="modal fade warning-modal" id="invoice-warning-modal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body text-center">
         <h2 class="modal-title">WARNING</h2>
          <p>Are you sure you want to pay via invoice?</p>
          <button type="button" data-dismiss="modal" class="btn btn-primary">Yes</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade modal-custom-alert" id="modal-custom-alert" role="dialog">
      <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body text-center">
         <h2 class="modal-title">WARNING</h2>
          <p>Are you sure you want to pay via invoice?</p>
          <button type="button" data-dismiss="modal" class="btn btn-primary">Yes</button>
        </div>
      </div>
    </div>
  </div>

<!-- Portal container end -->
<script src="<?php echo base_url(); ?>js/lib/jquery-1.12.1.min.js"></script>
<script src="<?php echo base_url(); ?>js/lib/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-validation/js/additional-methods.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery.mask.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery.creditCardValidator.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script>
	var base_url = "<?php echo base_url(); ?>";
</script>
<script src="<?php echo base_url(); ?>js/common.js"></script>
<script src="<?php echo base_url(); ?>js/salesportal.js"></script>
<script src="<?php echo base_url(); ?>js/leaderboard.js"></script>
<script>
	Salesportal.init(base_url);
</script>
</body>
</html>
