<link href="<?= base_url(); ?>assets/front/css/stock_mockup.css" rel="stylesheet">
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<!-- Peter section starts here -->
<?php //echo"<pre>"; print_r($stockData); echo"</pre>"; 
?>
<section class="PeterSection">
    <div class="container ">
        <div class="row">
            <div class="col-md-3 padding PeterProfile">
                <img src="<?= base_url(); ?>assets/front/images/MockUpIcon.png" class="ProfileIcon" />
                <h3><?= ucfirst($rowData->fname . ' ' . $rowData->lname); ?></h3>
                <h5><?= $rowData->plan_title; ?></h5>
                <p class="MockUpIconPara">Expires on <?= date('d-m-Y', strtotime($rowData->subs_end_date)); ?></p>
                <a class="Edit-Profile-Link" href="<?=base_url();?>auth/user-profile">Edit Profile</a>
                <a class="Edit-Password-Link" href="<?= base_url(); ?>auth/changepassword">Change Password</a>
                <a class="Edit-Plan-Link" href="#">Change Plan</a>
                <a class="Edit-Edit WatchList-Link" href="#">Edit WatchList</a>
            </div>

            <div class="col-md-9 padding ">
                <h2 class="Trending-Heading">Trending Tickers</h2>
                <?php foreach ($stockData as $row) { ?>
                    <div class="col-md-4 padding Trending-Div">
                        <h5><?= $row->ticker_name; ?></h5>
                        <h6><?= '$' . $row->ticker_current_rate; ?></h6>
                        <p class="StatisticsPara">Statistics</p>
                        <div class="Trending-BottomDiv">
                            <?php
                                $percent = ($row->ticker_current_rate - $row->ticker_publish_rate) / $row->ticker_publish_rate * 100;
                                ?>
                            <h3><?php echo number_format($percent, 3, '.', '') . '%'; ?></h3>
                            <p class="NewConsumerPara">2311 New Consumers</p>
                        </div>
                        <div class="Trending-BottomDiv Trending-Upcoming">
                            <p><span class="dot"></span>Upcoming</p>
                            <p><span class="dot1"></span>Upcoming</p>
                        </div>
                        <div class="TrendingDaysDiv">
                            <p class="TrendingDays">MON</p>
                            <p class="TrendingDays">TUE</p>
                            <p class="TrendingDays">WED</p>
                            <p class="TrendingDays">THU</p>
                            <p class="TrendingDays">FRI</p>
                            <p class="TrendingDays">SAT</p>
                            <p class="TrendingDays">SUN</p>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</section>

<!-- Peter section end here -->

<!-- WatchList section starts here -->

<section class="WatchList">
    <div class="container ">
        <div class="row">
            <h2 class="Trending-Heading WatchList-Heading">My Active WatchList</h2>
            <?php foreach ($activeStock as $row) {  ?>
                <div class="col-md-3 padding Trending-Div Trending-DivNew">
                    <a href="<?= base_url(); ?>graph/<?= $row->id; ?>" class="stockgraph" alt="StockGraph">
                        <h5><?= $row->ticker_name; ?></h5>
                        <h6><?= '$' . $row->ticker_current_rate; ?></h6>
                        <p class="StatisticsPara">Statistics</p>
                        <?php //echo tickerGraph($row->id); ?>

                        <div id="chartContainer_<?=$row->id?>" style="height: 200px; width: 100%;"></div>


                       <!--  <div class="TrendingDaysDiv">
                            <p class="TrendingDays">MON</p>
                            <p class="TrendingDays">TUE</p>
                            <p class="TrendingDays">WED</p>
                            <p class="TrendingDays">THU</p>
                            <p class="TrendingDays">FRI</p>
                            <p class="TrendingDays">SAT</p>
                            <p class="TrendingDays">SUN</p>
                        </div> -->
                        <h5>Current Price</h5>
                        <h6><?= $row->ticker_current_rate; ?></h6>

                        <h5>Publish Price</h5>
                        <h6><?= $row->ticker_publish_rate; ?></h6>
                        <?php
                            $percent = ($row->ticker_current_rate - $row->ticker_publish_rate) / $row->ticker_publish_rate * 100;
                            ?>
                        <h5>Change</h5>
                        <h6><?php echo number_format($percent, 3, '.', '') . '%'; ?></h6>
                    </a>
                </div>
            <?php } ?>


        </div>
    </div>
</section>

<!-- WatchList section end here -->

<!-- Admin section starts here -->

<section class="Admin">
    <div class="container ">
        <div class="row">
            <div class="col-md-5 padding AdminPredictionsDiv">
                <h3>Admin Predictions</h3>
                <!-- <a href="" class="btn btn-block btnBuyARRF">Buy ARRF $120 rise to $123.8</a>
                <a href="" class="btn btn-block btnBuyARRF1">Sell ARRF $120 down to $112</a>
                <a href="" class="btn btn-block btnBuyARRF2">Hold ARRF $120 will stay around</a> -->
                <?php foreach($notification as $noti): ?>
                <div class="alert alert-info alert-dismissible fade show">
                    <strong><?=$noti->title;?></strong>
                    <button type="button" class="close notifyvalue" id="notiread" data-dismiss="alert" value="<?=$noti->usernotificationid;?>">&times;</button>
                </div>
            <?php endforeach; ?>
            </div>
            <div class="col-md-7 padding SearchStockDiv">

                <table id="tickerData" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Stock</th>
                            <th>Current Price Today</th>
                            <th>Published Prices</th>
                            <th>Change of %</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($activeStock as $row) { ?>
                            <tr>
                                <td><?php echo date('d-m-Y', strtotime($row->created)); ?></td>
                                <td><?= $row->company_name; ?></td>
                                <td><?= $row->ticker_current_rate; ?></td>
                                <td><?= $row->ticker_publish_rate; ?></td>
                                <?php
                                    $percent = ($row->ticker_current_rate - $row->ticker_publish_rate) / $row->ticker_publish_rate * 100;
                                    ?>
                                <td><?php echo number_format($percent, 3, '.', '') . '%'; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


<script>	
    jQuery(document).ready(function() {
        jQuery('#tickerData').DataTable();

    $('.notifyvalue').on('click', function(){
        var notiid = $(this).val();
        $.ajax({
          type: "POST",
              url: '<?=base_url();?>userdashboard/updatenotification',
              data: { notiid : notiid, userid:<?=$this->sess;?> },
              success: function(data){                              
                console.log(data);
             }
        });
    });
       



    } );
    
	window.onload = function() {
        <?php foreach ($activeStock as $row) {  ?>
            <?php $dataPoints = []; foreach ($row->graphData as $row_array) { 
                $dataPoints[] = array("x" => strtotime($row_array->current_date) * 1000, "y" => (int) $row_array->current_rate);
            }
            ?>
            var tickerchart = new CanvasJS.Chart("chartContainer_<?=$row->id?>", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    //text: "Stock Exchange"
                },
                axisX: {
                    valueFormatString: "DD MMM"
                },
                axisY: {
                    title: "Change in Stock",
                    //maximum: 200
                },
                data: [{
                    type: "splineArea",
                    color: "#6599FF",
                    xValueType: "dateTime",
                    xValueFormatString: "DD MMM",
                    yValueFormatString: "#,##0 Price",
                    dataPoints: <?php echo json_encode($dataPoints); ?>
                }]
            });
            //console.log('<?php echo json_encode($dataPoints); ?>');
            tickerchart.render();
        <?php } ?>
    }

    
    
</script>

