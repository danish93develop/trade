<section class="reason Access-Detailed">
    <h3>Forgot Password</h3>
    <div class="container">
        <div class="row justify-content-center">        
            <div class="col-md-4">
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
                <form action="<?=base_url();?>home/userForgotPassword" method="POST" class="">
                    <div class="form-group">
                        <!-- <label class="w-100" for="Email">Email</label> -->
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
