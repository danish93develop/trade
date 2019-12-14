<div class="content-wrapper">    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Trade Plan Listing</h1>
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
            <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 169px;">Title</th>
            <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 219px;">Price</th>
            <th class="sorting" tabindex="0" rowspan="1" colspan="1"  style="width: 194px;">Created</th>
            <th class="sorting" tabindex="0" rowspan="1" colspan="1"  style="width: 143px;">Action</th>            
          </tr>
        </thead>
        <?php //echo"<pre>"; print_r($rowData); echo"</pre>"; ?>
            <tbody>            
            <?php
                $i = 1; 
                foreach($rowData as $planData) { ?>
                <tr role="row" class="odd">
                <td><?=$i;?></td>
                <td><?=$planData->plan_title;?></td>
                <td><?='$'.$planData->price;?></td>
                <td><?=date('d-m-Y', strtotime($planData->created));?></td>
                <!-- <td><?=$planData->ticker_current_rate;?></td>                 -->
                
                <td>
                <a href="<?=base_url().'plan/edit/'.$planData->id;?>" title="Edit" class="warning"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;
                <!-- <a href="#" title="View History" class="warning"><i class="fas fa-eye"></i></a> -->
                <!-- <a href="javascript:void(0)" onclick="deleteFun('<?=base_url().'stock/delete/'.$stockData->id;?>')" title="Delete" class="danger"><i class="fas fa-trash"></i></a> -->
                </td>
                </tr>
            <?php  $i++; }  ?>
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