<style>.col-lg-6{float:left;} </style>
<div class="content-wrapper">    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Plan</h1>
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
              <form role="form" method="POST" name="plan_form" action="<?=base_url();?>plan/edit/<?=$planRow->id;?>" class="plan-form" id="planForm">
              <div class="card-body">
              <?php if($this->session->flashdata('message')) { ?>
                <div class="alets-pop">	
                  <div class="alert alert-<?=$this->session->flashdata('type');?>">
                    <strong><?=ucfirst($this->session->flashdata('type'));?>!</strong> <?=$this->session->flashdata('message');?>
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
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
              <div class="col-lg-6">
                  <div class="form-group search_section">
                  <label for="PlanTitle">Title</label>
                  <input type="text" class="form-control" id="PlanTitle" name="plan_title" value="<?=$planRow->plan_title;?>" placeholder="" required>
                  </div>

                  <div class="form-group">
                  <label for="Price">Price</label>
                  <input type="text" class="form-control" id="Price" name="price" value="<?=$planRow->price;?>" placeholder="" required readonly>
                  </div>
                  <div class="form-group">                    
                  <label for="PlanID">Plan ID</label>
                  <input type="text" class="form-control" id="PlanID" name="plan_id" value="<?=$planRow->plan_id;?>" placeholder="" required readonly>
                  </div>                  
              </div>
              <div class="col-lg-6">
              <div class="form-group">
                  <label for="Description">Description</label>
                  <div class="mb-3">
                  <textarea class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="description" ><?=$planRow->description;?></textarea>
                  </div>
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
<script>
  jQuery(document).ready(function(){
  setTimeout(function() {
    $('.alets-pop').fadeOut('slow');
  }, 2000);
});
</script>