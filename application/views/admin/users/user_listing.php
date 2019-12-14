<div class="content-wrapper">    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User's Listing</h1>
          </div>
          <div class="col-sm-6">
           
          </div>
        </div>
      </div>
    </div>
    
<section class="content">
    <div class="row">    
        <div class="col-12">
          <div class="card">
           
        <div class="card-body">
          <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
           <div class="alets-pop">
              <div class="alert alert-success" style="display:none;"></div> 
              <div class="alert alert-danger" style="display:none;"></div> 
           </div>
          <div class="row">
          <div class="col-sm-12">
          <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
        <thead>
          <tr role="row">
            <th class="sorting_asc" tabindex="0" rowspan="1" colspan="1" style="width: 80px;">S.No.</th>
            <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 120px;">Name</th>
            <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 150px;">Email</th>
            <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 150px;">DOB</th>
            <!-- <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 120px;">Price</th>
            <th class="sorting" tabindex="0" rowspan="1" colspan="1"  style="width: 194px;">Subscription Start Date</th>
            <th class="sorting" tabindex="0" rowspan="1" colspan="1"  style="width: 143px;">End Date</th> -->
            <th class="sorting" tabindex="0" rowspan="1" colspan="1"  style="width: 143px;">Status</th>
            <th class="sorting" tabindex="0" rowspan="1" colspan="1"  style="width: 180px;">Action</th>
            
          </tr>
        </thead>
        <?php //echo"<pre>"; print_r($rowData); echo"</pre>"; ?>
            <tbody>            
            <?php
            //print_r($rowData); die;
                $i = 1; 
                foreach($rowData as $k => $userData) { ?>
                <tr role="row" class="odd">
                <td><?=$k+$pageLimit+1;?></td>                
                <td><?=$userData->fname.' '.$userData->lname;?></td>                
                <td><?=$userData->email;?></td>               
                <td><?=date('Y-m-d',strtotime($userData->dob));?></td>                               
                <td>
                <?php if($userData->status==1){ 
                  $status = "Active";
                  $class = "btn-success";
                }else{
                  $status = "Inactive";
                  $class = "btn-danger";
                }
                ?>
                <button type="button" value="<?=$userData->status;?>" data-id="<?=$userData->id;?>" class="active-btn <?=$class;?>"><?=$status;?></button>&nbsp;&nbsp;                
                </td>
                <td>
                <a href="<?=base_url().'admin/users/edit/'.$userData->id;?>" title="Edit" class="warning btn btn-primary">Edit</a>&nbsp;&nbsp;
                <a href="<?=base_url().'admin/users/changepassword/'.$userData->id;?>" class="warning btn btn-primary">Change Password</a>
                <!-- <a href="javascript:void(0)" onclick="deleteFun('<?=base_url().'stock/delete/'.$stockData->id;?>')" title="Delete" class="danger"><i class="fas fa-trash"></i></a> -->
                </td>
                </tr>
                <?php $i++; } ?>
            </tbody>            
          </table>
          </div>
          </div> 
          <?=$pagination;?>         
          </div>
          </div>
        </div>            
      </div>
    </div>        
    </div>
</section>        
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
jQuery(document).ready(function(){
  $(".active-btn").on('click',function(){
    var status = $(this).val();
    var id = $(this).attr("data-id");    
    var url = "<?=base_url(); ?>admin/users/updatestatus";    
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