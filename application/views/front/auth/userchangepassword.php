<section class="reason Access-Detailed">
    <h3>Change Password</h3>
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
                <form action="<?=base_url();?>home/userChangePassword" method="POST" class="">
                    <div class="form-group">
                        <!-- <label class="w-100" for="OldPassword">Old Password</label> -->
                        <input type="password" class="form-control" name="opassword" value="" placeholder="Old Password" required>
                    </div>
                    <div class="form-group">                        
                        <input type="password" class="form-control" name="password" value="" placeholder="Password" required>
                    </div>
                    <div class="form-group">                        
                        <input type="password" class="form-control" name="cpassword" value="" placeholder="Confirm Password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
