<?php
    include "../server.php";
    $kode=$_GET["kode"];
    $x_tanggal  = mysqli_query($konek, "SELECT waktu FROM ( SELECT * FROM grafik WHERE kode='$kode' ORDER BY id DESC LIMIT 20) Var1 WHERE kode='$kode' ORDER BY ID ASC");
    $y_bpm   = mysqli_query($konek, "SELECT bpm FROM ( SELECT * FROM grafik WHERE kode='$kode' ORDER BY id DESC LIMIT 20) Var1 WHERE kode='$kode' ORDER BY ID ASC");
  ?>

      	<script  type="text/javascript">

    	  var ctx = document.getElementById("demobar").getContext("2d");
    	  var data = {
    	            labels: [<?php while ($b = mysqli_fetch_array($x_tanggal)) { echo '"' . $b['waktu'] . '",';}?>],
    	            datasets: [
    	            {
    	              label: "bpm",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "rgba(59, 100, 222, 1)",
                    borderColor: "rgba(59, 100, 222, 1)",
                    pointHoverBackgroundColor: "rgba(59, 100, 222, 1)",
						        pointHoverBorderColor: "rgba(59, 100, 222, 1)",
    	              data: [<?php while ($y = mysqli_fetch_array($y_bpm)) { echo '"' . $y['bpm'] . '",';}?>]
                    }
    	            ]
    	            };

    	  var myBarChart = new Chart(ctx, {
    	            type: 'line',
    	            data: data,
    	            options: {
    	            barValueSpacing: 20,
    	            scales: {
    	              yAxes: [{
    	                  ticks: {
    	                      min: 0,
    	                  }
    	              }],
    	              xAxes: [{
    	                          gridLines: {
    	                              color: "rgba(0, 0, 0, 0)",
    	                          }
    	                      }]
    	              }
    	          }
    	        });
    	</script>