<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Predictions</h1>
        </div>
        <div class="col-sm-6">
          <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol> -->
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <!-- <div class="card-header">
                <h3 class="card-title">User's Listing Table</h3>
            </div> -->

          <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

              <div class="row">
                <div class="col-sm-12">
                  <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                      <tr role="row">
                        <th class="sorting_asc" tabindex="0" rowspan="1" colspan="1" style="width: 80px;">S.No.</th>
                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 350px;">Title</th>
                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 150px;">Status</th>
                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 154px;">Created</th>
                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 103px;">Action</th>
                      </tr>
                    </thead>
                    <?php //echo "<pre>"; print_r($rowData); echo "</pre>"; ?>
                    <tbody>
                      <?php
                      $i = 1;
                      foreach ($rowData as $notiData) { ?>
                        <tr role="row" class="odd">
                          <td><?= $i; ?></td>
                          <td><?= $notiData->title; ?></td>
                          <td>
                            <?php if ($notiData->status == 1) {
                                $status = "Active";
                                $class = "btn-success";
                              } else {
                                $status = "Inactive";
                                $class = "btn-danger";
                              }
                              ?>
                            <button type="button" value="<?= $notiData->status; ?>" data-id="<?= $notiData->id; ?>" class="active-btn <?= $class; ?>"><?= $status; ?></button>
                          </td>
                          <td><?= date('d-m-Y', strtotime($notiData->created)); ?></td>
                          <td>
                            <a href="<?= base_url() . 'notification/edit/' . $notiData->id; ?>" title="Edit" class="warning"><i class="fas fa-edit"></i></a>
                          </td>
                        </tr>
                      <?php $i++;
                      }  ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</section>
</div>
<script>
jQuery(document).ready(function(){
  $(".active-btn").on('click',function(){
    var status = $(this).val();
    var id = $(this).attr("data-id");    
    var url = "<?=base_url(); ?>admin/notification/updatestatus";    
    $.ajax({
      type: "POST",
          url: url,
          data: { status : status, id:id },
          success: function(data){
            if(data != ''){
              location.reload();
              $(".alert-success").show().text("Status Updated Successfully!").css("color","#fff");
            }else{
              $(".alert-danger").show().text("Danger! Status not Updated").css("color","#fff");
            }              
            console.log(data);
         }
    })
  });
});
</script>