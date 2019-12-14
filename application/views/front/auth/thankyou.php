<section class="reason Access-Detailed" id="plans">

	<?php if ($this->session->flashdata('message')) { ?>
                <div class="alets-pop">
                  <div class="alert alert-<?= $this->session->flashdata('type'); ?>">
                    <strong><?= ucfirst($this->session->flashdata('type')); ?>!</strong> <?= $this->session->flashdata('message'); ?>
                  </div>
                </div>
              <?php } ?>

              <?php if (validation_errors()) { ?>
                <div class="alets-pop">
                  <div class="alert alert-danger">
                    <strong>Error!</strong> <?php echo validation_errors(); ?>
                  </div>
                </div>
              <?php } ?>

              <h3>Mail Sent! Thank you for subscribing with Aegis Traders.</h3>
	
	<div class="container">
		<div class="row">

						
			
		</div>
	</div>
</section>