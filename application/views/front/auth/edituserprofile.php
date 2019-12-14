<section class="reason Access-Detailed">
    <h3>Edit Profile</h3>
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
                <form action="<?=base_url();?>home/editUserProfile" method="POST" class="" enctype="multipart/form-data">
                    <div class="form-group">
                      <!-- <label>Image <em>*</em></label> -->
                      <?php if ($rowData->image) { ?>
                        <image style="width: 200px; height:160px;" class="form-control" src="<?= base_url() . 'assets/images/profile/' . $rowData->image; ?>">
                        <?php } ?></br>
                        <input type="file" name="image">
                    </div>
                    <div class="form-group">
                        <!-- <label class="w-100" for="OldPassword">Old Password</label> -->
                        <input type="text" class="form-control" name="fname" value="<?=$rowData->fname;?>" placeholder="First Name" required>
                    </div>
                    <div class="form-group">
                        <!-- <label class="w-100" for="OldPassword">Old Password</label> -->
                        <input type="text" class="form-control" name="lname" value="<?=$rowData->lname;?>" placeholder="Last Name" required>
                    </div>
                    <div class="form-group">                        
                        <input type="text" class="form-control datepicker" id="dobDate" name="dob" value="<?=date('d/m/Y', strtotime($rowData->dob));?>" placeholder="DOB" required>
                    </div>
                    <div class="form-group">                        
                        <input type="email" class="form-control" name="email" value="<?=$rowData->email;?>" placeholder="Email" readonly>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
  jQuery(document).ready(function() {
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    var end = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('#dobDate').datepicker({
          dateFormat: 'dd/mm/yy',
          todayHighlight: true,
          //startDate: today,
          //endDate: end,
          //autoclose: true
    });

  });
</script>