<style>.col-lg-6{float:left;} </style>
<div class="content-wrapper">    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Prediction</h1>
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
              <form role="form" method="POST" name="notifi_form" action="<?=base_url();?>notification/edit/<?=$notifiRow->id;?>" class="notifi-form" id="NotifiForm">
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
                    <textarea name="title" class="form-control"><?=$notifiRow->title;?></textarea>
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
// jQuery(document).ready(function(){
//   setTimeout(function() {
//     $('.alets-pop').fadeOut('slow');
// }, 2000);
// });
</script>