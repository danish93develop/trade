<style>
  .col-lg-6 {
    float: left;
  }
</style>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Change Password</h1>
        </div>
        <div class="col-sm-6">
        <?php $userID = $this->uri->segment(4); ?>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <!-- <div class="card-header">
              <h3 class="card-title">Add Stock</h3>
              </div> -->
          <form role="form" method="POST" name="user_password_form" action="<?= base_url(); ?>admin/users/changepassword/<?=$userID;?>" id="userpasswordform">
            <div class="card-body">

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
              
              <div class="col-lg-6">

                <div class="form-group">
                  <label for="opasswrod">Old Password</label>
                  <input type="password" class="form-control" name="opassword" placeholder="" required>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="" required>
                </div>
                <div class="form-group">
                  <label for="cpassword">Confirm Password</label>
                  <input type="password" class="form-control" name="cpassword" placeholder="" required>
                </div>
                <input type="hidden" name="user_id" value="<?=$userID;?>" > 

              </div>

            </div>

            <div class="card-footer">
              <button type="submit" name="update" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
  jQuery(document).ready(function() {
    setTimeout(function() {
      $('.alets-pop').fadeOut('slow');
    }, 2000);

  });
</script>