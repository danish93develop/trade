<style>.col-lg-6{float:left;}
.search_section{ position:relative;}
.searchResult{position: absolute;background: #fff;border: 1px solid #e7e7e7;width: 100%; min-height:60px; max-height:260px; overflow-y:scroll; z-index:99;}
.searchResult > ul li{ cursor:pointer; }
.publishstatus {float:left; padding: 0 25px;}
</style>
<div class="content-wrapper">    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add your Stock</h1>
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
                <form role="form" method="POST" name="ticker_form" action="<?=base_url();?>stock/add" class="tickerform" id="stockForm">
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
                <div class="col-lg-6">
                    <div class="form-group search_section">
                    <label for="tickername">Ticker Name</label>
                    <input type="text" class="form-control" id="tickerName" name="ticker_name" placeholder="" required>
                      <div class="searchResult" style="display:none">
                      </div>
                    </div>
                    <div class="form-group">
                    <label for="Company">Company</label>
                    <input type="text" class="form-control" id="companyName" name="company_name" value="" placeholder="">
                    </div>
                    <div class="form-group">
                    <label for="Industry">Industry</label>
                    <input type="text" class="form-control" id="companyName" name="industry" value="" placeholder="" required>
                    </div>
                    <div class="form-group">                    
                    <label for="publishDate">Published Date</label>
                    <!-- <input type="text" class="form-control" id="publishDate" name="published_date" value="" placeholder=""> -->
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" class="form-control datepicker hasDatepicker" id="publishDate" name="created" value="" required>
                    </div>
                   </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                    <label for="CurrentRate">Current Rate</label>
                    <input type="text" class="form-control" id="currentRate" name="ticker_current_rate" value="" placeholder="">
                    </div>
                    <div class="form-group">
                    <label for="PublishRate">Publish Rate</label>
                    <input type="text" class="form-control" id="publishRate" name="ticker_publish_rate" value="" placeholder="" required>
                    </div>
                    <div class="form-group">
                    <label for="diffCount">Difference in Count</label>
                    <input type="text" class="form-control" id="diffCount" name="diff_count" value="" placeholder="">
                    </div>
                    <!-- <div class="form-group">
                    <label for="diffCount">Difference in percentage(%)</label>
                    <input type="text" class="form-control" id="diffPercentage" name="diff_percentage" value="" placeholder="">
                    </div> -->
                    
                    <div class="form-check publishstatus">
                          <input class="form-check-input" type="radio" value="1" name="status" checked="">
                          <label class="form-check-label">Active</label>
                    </div>
                    <div class="form-check publishstatus">
                          <input class="form-check-input" type="radio" value="0" name="status" >
                          <label class="form-check-label">In-Active</label>
                    </div>
                        
                </div>
                </div>
                
                <div class="card-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
  jQuery(document).ready(function () {
    jQuery("#tickerName").on("keyup", function () {
      $(".searchResult").html("Loading...");
      var ticker = jQuery("#tickerName").val();
      //console.log(ticker);
        $.ajax({
          url: '<?=base_url();?>stock/tickerData',
          data: {'ticker': ticker},
          type: "POST",
          success: function(response){            
            $(".searchResult").show("slow");
            $(".searchResult").html(response);
          }
        });
      });
      
      var date = new Date();
      var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
      var end = new Date(date.getFullYear(), date.getMonth(), date.getDate());
      $('#publishDate').datepicker({
            dateFormat: 'dd/mm/yy',
            todayHighlight: true,
            startDate: today,
            //endDate: end,
            //autoclose: true
        });
      
    $('#publishRate').on("change", function(){
      var cuRate = $('#currentRate').val();
      if($('#currentRate').val().length > 0){
        var puRate = $(this).val();
        var diff = cuRate - puRate;        
        var diffcount = $('#diffCount').val(diff.toFixed(3));
        //var percentage = parseFloat(parseInt($('#diffCount').val(diff.toFixed(3)), 10) * 100)/ parseInt($(this).val(), 10);
        var percentage = (diffcount / puRate) * 100;
        //alert(percentage);
        $('#diffPercentage').val(percentage);
      }
    });
    setTimeout(function() {
        $('.alets-pop').fadeOut('slow');
    }, 2000);
  });
  function addNewTicker(company_name, currency_symbol){    
    $(".searchResult").html('').hide('slow');    
    $('#companyName').val(company_name);    
    var symbol = $('#tickerName').val(currency_symbol);
    // console.log(currency_symbol);
    // alert(currency_symbol);
    
    $.ajax({
          url: '<?=base_url();?>stock/symbolData',
          data: {'symbol': currency_symbol},
          type: "POST",
          success: function(response){ 
            console.log(response);   
            $('#currentRate').val(response);        
            //$(".searchResult").show("slow");
            //$(".searchResult").html(response);
          }
        });
  }
</script>
