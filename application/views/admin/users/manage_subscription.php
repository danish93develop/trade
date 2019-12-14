<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Manage User's subscription</h1>
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
              <div class="row">
                <form method="post" action="<?=base_url();?>admin/users-subscription" name="searchform" class="searchForm">
                <div class="col-sm-12 col-md-3">
                  <div class="form-group">
                    <select name="planid" class="form-control">                    
                      <option>Select</option>
                      <option value="1">TUDOR</option>
                      <option value="2">ROGERs</option>
                      <option value="3">SOROS</option>
                      <option value="4">GEMINI</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-12 col-md-3">
                  <div class="form-group">                    
                    <input type="text" class="form-control" name="email" value="">
                  </div>
                </div>
                <div class="col-sm-12 col-md-3">
                  <div class="form-group">
                    <button type="submit" name="search" class="form-control btn btn-primary">Search</button>
                  </div>
                </div>
                </form>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                      <tr role="row">
                        <th class="sorting_asc" tabindex="0" rowspan="1" colspan="1" style="width: 80px;">S.No.</th>
                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 120px;">Name</th>
                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 150px;">Email</th>
                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 150px;">Subscription Plan</th>
                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 120px;">Price</th>
                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 194px;">Subscription Start Date</th>
                        <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 143px;">End Date</th>
                        <!-- <th class="sorting" tabindex="0" rowspan="1" colspan="1"  style="width: 143px;">Status</th> -->
                        <!-- <th class="sorting" tabindex="0" rowspan="1" colspan="1"  style="width: 143px;">Action</th> -->

                      </tr>
                    </thead>
                    <?php //echo"<pre>"; print_r($rowData); echo"</pre>"; ?>
                    <tbody>
                      <?php
                      //print_r($rowData); die;
                      $i = 1;
                      foreach ($rowData as $userData) { ?>
                        <tr role="row" class="odd">
                          <td><?= $i; ?></td>
                          <td><?= $userData->fname . ' ' . $userData->lname; ?></td>
                          <td><?= $userData->email; ?></td>
                          <td><?= $userData->plan_title; ?></td>
                          <td><?php echo '$' . $userData->price . '.00'; ?></td>
                          <td><?= date('d-m-Y h:i:s', strtotime($userData->subs_start_date)); ?></td>
                          <td><?= date('d-m-Y h:i:s', strtotime($userData->subs_end_date)); ?></td>
                          <!-- <td>
                <?php if ($userData->status == 1) { ?>
                <button type="button" value="0" class="active-btn">Active</button>&nbsp;&nbsp;
                <?php } else { ?>
                <button type="button" value="1" class="notactive-btn">In-Active</button>&nbsp;&nbsp;
                <?php } ?>
                </td> -->
                          <!-- <td>
                <a href="#" title="Edit" class="warning"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;
                <a href="#" title="View History" class="warning"><i class="fas fa-eye"></i></a> -->
                          <!-- <a href="javascript:void(0)" onclick="deleteFun('<?= base_url() . 'stock/delete/' . $stockData->id; ?>')" title="Delete" class="danger"><i class="fas fa-trash"></i></a>
                </td> -->
                        </tr>
                      <?php $i++;
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <?= $pagination; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</section>

</div>