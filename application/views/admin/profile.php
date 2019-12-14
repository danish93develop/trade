<style>.col-lg-6{float:left;} </style>
<div class="content-wrapper">    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Admin Profile</h1>
          </div>
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol> -->
          </div>
        </div>
      </div>
    
  <div class="row">
      <div class="col-md-12">    
          <div class="card card-primary">
              <!-- <div class="card-header">
              <h3 class="card-title">Add Stock</h3>
              </div> -->                
              <form role="form" method="POST" name="profile_form" action="<?=base_url();?>admin/profile" enctype="multipart/form-data" class="profileform">
              <div class="card-body">

              <?php if($this->session->flashdata('message')) { ?>
                <div class="alets-pop">	
                  <div class="alert alert-<?=$this->session->flashdata('type');?>">
                    <strong><?=ucfirst($this->session->flashdata('type'));?>!</strong> <?=$this->session->flashdata('message');?>
                  </div>
                </div>
              <?php } ?>
              
              <?php if(validation_errors()) { ?>
                <div class="alets-pop">	
                  <div class="alert alert-danger">
                    <strong>Error!</strong> <?php echo validation_errors();?>
                  </div>
                </div>
              <?php } ?>
                <?php //print_r($row);?>
              <div class="col-lg-6">
                  <div class="form-group search_section">
                  <label for="PlanTitle">First Name*</label>
                  <input type="text" class="form-control" name="fname"  value="<?=$row->fname;?>" placeholder="" required>
                  </div>
                  
                  <div class="form-group">
                  <label for="Price">Last Name*</label>
                  <input type="text" class="form-control" name="lname" value="<?=$row->lname;?>" placeholder="" required>
                  </div>
                  <div class="form-group">                    
                  <label for="PlanID">Email</label>
                  <input type="text" class="form-control" name="email" value="<?=$row->email;?>" readonly required>
                  </div>                  
              </div>
              <div class="col-lg-6">
              <div class="form-group">
					<label>Image <em>*</em></label>
					<?php if($row->image){ ?>
					<image style="width: 200px; height:160px;" class="form-control" src="<?=base_url().'assets/images/profile/'.$row->image;?>">
					<?php } ?></br>
					<input type="file" name="image">
				</div>
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
jQuery(document).ready(function(){
  setTimeout(function() {
    $('.alets-pop').fadeOut('slow');
}, 2000);
});
</script>