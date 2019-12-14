<div class="content-wrapper">    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Stock History</h1>
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
            <th class="sorting" tabindex="0" rowspan="1" colspan="1"  style="width: 150px;">Ticker Name</th>
            <th class="sorting" tabindex="0" rowspan="1" colspan="1"  style="width: 150px;">Published Date</th>
            <th class="sorting" tabindex="0" rowspan="1" colspan="1"  style="width: 143px;">Current Rate</th>
            <th class="sorting" tabindex="0" rowspan="1" colspan="1"  style="width: 102px;">Published Rate</th>
            <th class="sorting" tabindex="0" rowspan="1" colspan="1"  style="width: 102px;">Diff</th>
            <th class="sorting" tabindex="0" rowspan="1" colspan="1"  style="width: 102px;">Diff in %</th>
          </tr>
        </thead>
        <?php //echo"<pre>"; print_r($stockData); echo"</pre>"; ?>
            <tbody>            
            <?php
                $i = 1; 
                foreach($stockData as $row) { ?>
                <tr role="row" class="odd">
                <td><?=$i;?></td>               
                <td><?=$row->ticker_name;?></td>               
                <td><?=date('d-m-Y',strtotime($row->current_date));?></td>
                <td><?=$row->current_rate;?></td>
                <td><?=$row->ticker_publish_rate;?></td>
                <?php 
                    $cr = $row->current_rate;
                    $pr = $row->ticker_publish_rate;
                    $diff = $cr - $pr;
                    $percent = ($diff / $pr) * 100;
                    $percentage = number_format($percent, 3, '.', '');
                ?>
                <td><?=$diff;?></td>
                <td><?=$percentage;?></td>
                </tr>
            <?php  $i++; }  ?>
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