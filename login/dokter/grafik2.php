<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="ilmu-detil.blogspot.com">
	<title>Bootstrap Graph Using Highcharts </title>
	<!-- Bagian css -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/ilmudetil.css">
	
	<script src="assets/js/jquery-1.10.1.min.js"></script>
	<script type="text/javascript">
		$(function () {
			var chart;
			$(document).ready(function() {
				$.getJSON("dataline.php", function(json) {
				
					chart = new Highcharts.Chart({
						chart: {
							renderTo: 'mygraph',
							type: 'line'
							
						},
						title: {
							text: 'Comparison of Sugar, Rice and Wheat Flour'
							
						},
						subtitle: {
							text: '(Price In 2008)'
						
						},
						xAxis: {
							categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
						},
						yAxis: {
							title: {
								text: 'Price (Rp)'
							},
							plotLines: [{
								value: 0,
								width: 1,
								color: '#808080'
							}]
						},
						tooltip: {
							formatter: function() {
									return '<b>'+ this.series.name +'</b><br/>'+
									this.x +': '+ this.y;
							}
						},
						legend: {
							layout: 'vertical',
							align: 'right',
							verticalAlign: 'top',
							x: -10,
							y: 120,
							borderWidth: 0
						},
						series: json
					});
				});
			
			});
			
		});
		</script>
	<script src="assets/js/highcharts.js"></script>
	<script src="assets/js/exporting.js"></script>
        
</head>
<body>
<!--- Bagian Judul-->	
<div class="container" style="margin-top:20px">
	<div class="col-md-10">
		<div class="panel panel-primary">
			<div class="panel-heading">Commodity Price Graphs</div>
				<div class="panel-body">
					<div id ="mygraph"></div>
				</div>
		</div>
	</div>
</div>
<script src="assets/js/highcharts.js"></script>
<script src="assets/js/jquery-1.10.1.min.js"></script>

</body>
</html>