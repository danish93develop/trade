<?php
 //echo"<pre>"; print_r($stockData);
 
foreach($stockData as $row){

    $dataPoints[] = array("x" => strtotime($row->current_date)*1000, "y" =>(int)$row->current_rate );
    
}
//echo"<pre>"; print_r($dataPoints); echo"</pre>"; 


?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Stock Exchange"
	},
	axisX: {
		valueFormatString: "DD MMM"
	},
	axisY: {
		title: "Change in Stock",
		//maximum: 500
	},
	data: [{
		type: "splineArea",
		color: "#6599FF",
		xValueType: "dateTime",
		xValueFormatString: "DD MMM",
		yValueFormatString: "#,$##0 Price",
		dataPoints: <?php echo json_encode($dataPoints); ?>
	}]
});
 
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
        <ul class="ticker-data">
            <li>Ticker Name: <?=$tickerData->ticker_name;?></li>
            <li>Company Name: <?=$tickerData->company_name;?></li>
            <li>Current Rate: <?='$'.$tickerData->ticker_current_rate;?></li>
            <li>Publish Rate: <?='$'.$tickerData->ticker_publish_rate;?></li>
        </ul>
        </div>
    </div>
</div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>