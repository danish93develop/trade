<style>
  .col-lg-6 {
    float: left;
  }

  .search_section {
    position: relative;
  }

  .searchResult {
    position: absolute;
    background: #fff;
    border: 1px solid #e7e7e7;
    width: 100%;
    min-height: 60px;
    max-height: 260px;
    overflow-y: scroll;
    z-index: 99;
  }

  .searchResult>ul li {
    cursor: pointer;
  }

  .publishstatus {
    float: left;
    padding: 0 25px;
  }
</style>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Stock</h1>
        </div>
        <div class="col-sm-6">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <?php //echo"<pre>"; print_r($stockRow); echo"</pre>";
          ?>
          <form role="form" method="POST" name="ticker_form" action="<?= base_url(); ?>stock/edit/<?= $stockRow->ticker_id; ?>" class="tickerform" id="stockForm">
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
                <div class="form-group search_section">
                  <label for="tickername">Ticker Name</label>
                  <input type="text" class="form-control" value="<?= $stockRow->ticker_name; ?>" readonly id="tickerName" name="ticker_name" placeholder="" required>
                  <div class="searchResult" style="display:none">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Company">Company</label>
                  <input type="text" class="form-control" value="<?= $stockRow->company_name; ?>" readonly id="companyName" name="company_name" value="" placeholder="">
                </div>
                <div class="form-group">
                  <label for="Industry">Industry</label>
                  <input type="text" class="form-control" value="<?= $stockRow->industry; ?>" readonly id="companyName" name="industry" value="" placeholder="" required>
                </div>
                <div class="form-group">
                  <label for="publishDate">Published Date</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask="" im-insert="false" class="form-control" id="datepicker" name="created" value="<?= date('d-m-Y', strtotime($stockRow->current_date)); ?>" readonly required>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="CurrentRate">Current Rate</label>
                  <input type="text" class="form-control" value="<?= $stockRow->current_rate; ?>" readonly id="currentRate" name="ticker_current_rate" value="" placeholder="">
                </div>
                <div class="form-group">
                  <label for="PublishRate">Publish Rate</label>
                  <input type="text" class="form-control" value="<?= $stockRow->ticker_publish_rate; ?>" id="publishRate" name="ticker_publish_rate" value="" placeholder="" required>
                </div>
                <div class="form-group">
                  <label for="diffCount">Difference in Count</label>
                  <?php
                  $cr = $stockRow->ticker_current_rate;
                  $pr = $stockRow->ticker_publish_rate;
                  $diff = $cr - $pr;
                  $percent = ($diff / $pr) * 100;
                  $percentage = number_format($percent, 3, '.', '');
                  ?>
                  <input type="text" class="form-control" value="<?= $diff; ?>" readonly id="diffCount" name="diff_count" value="" placeholder="">
                </div>
                <div class="form-group">
                  <label for="diffCount">Difference in percentage(%)</label>
                  <input type="text" class="form-control" id="diffPercentage" value="<?= $percentage; ?>" readonly name="diff_percentage" value="" placeholder="">
                </div>

                <div class="form-check publishstatus">
                  <input class="form-check-input" type="radio" value="1" readonly <?= ($stockRow->status == 1) ? 'checked' : ''; ?> name="status" checked="">
                  <label class="form-check-label">Active</label>
                </div>
                <div class="form-check publishstatus">
                  <input class="form-check-input" readonly <?= ($stockRow->status == 0) ? 'checked' : ''; ?> type="radio" value="0" name="status">
                  <label class="form-check-label">In-Active</label>
                </div>

              </div>
            </div>

            <div class="card-footer">
              <button type="submit" name="update" class="btn btn-primary">Submit</button>
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
    jQuery('#datepicker').datepicker();
  });
</script>