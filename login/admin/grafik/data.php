<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Logger</title>

    <!-- Bootstrap core CSS -->
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="asset/style.css" rel="stylesheet">

  </head>

  <body>
  <div class="panel panel-primary">
    <div class="panel-heading">
    </div>

    <?php
    include "../../server.php";
    ?>

    <?php
      $kode=$_GET["kode"];
      $x_tanggal  = mysqli_query($konek, "SELECT waktu FROM ( SELECT * FROM grafik WHERE kode='$kode' ORDER BY id DESC LIMIT 20) Var1 WHERE kode='$kode' ORDER BY ID ASC");
      $y_bpm   = mysqli_query($konek, "SELECT bpm FROM ( SELECT * FROM grafik WHERE kode='$kode' ORDER BY id DESC LIMIT 20) Var1 WHERE kode='$kode' ORDER BY ID ASC");
      ?>

    <div class="panel-body">
      <canvas id="myChart"></canvas>
      <script>
       var canvas = document.getElementById('myChart');
        var data = {
            labels: [<?php while ($b = mysqli_fetch_array($x_tanggal)) { echo '"' . $b['waktu'] . '",';}?>],
            datasets: [
            {
                label: "BPM", 
                fill: true,
                lineTension: 0.1,
                backgroundColor: "rgba(0, 137, 132, .2)",
                borderColor: "rgba(0, 10, 130, .7)",
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: "rgba(0, 10, 130, .7)",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 1,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(0, 10, 130, .7)",
                pointHoverBorderColor: "rgba(0, 10, 130, .7)",
                pointHoverBorderWidth: 2,
                pointRadius: 5,
                pointHitRadius: 10,
                data: [<?php while ($b = mysqli_fetch_array($y_bpm)) { echo  $b['bpm'] . ',';}?>],
            }
            ]
        };

        var option = 
        {
          showLines: true,
          animation: {duration: 0}
        };
        
        var myLineChart = Chart.Line(canvas,{
          data:data,
          options:option
        });

      </script>          
    </div>    
  </div>
  <div class="panel panel-primary">
    <div class="panel-heading">
    </div>
    <div class="panel-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr >
            <th class='text-center'>Waktu</th>
            <th class='text-center'>BPM</th>
          </tr>
        </thead>
        
        <tbody>
          <?php
            $kode=$_GET["kode"];
            $sqlAdmin = mysqli_query($konek, "SELECT waktu,bpm FROM grafik WHERE kode='$kode' ORDER BY ID DESC LIMIT 0,20");
            while($data=mysqli_fetch_array($sqlAdmin))
            {
              echo "<tr >
                <td><center>$data[waktu]</center></td> 
                <td><center>$data[bpm]</td>
              </tr>";
            }
          ?>
        </tbody>
      </table>   
    </div>
  </div>
  <div class="panel-heading">
</div>
  <script src="jquery-latest.js"></script>       
  <script type="text/javascript" src="asset/js/jquery-3.4.0.min.js"></script>
  <script type="text/javascript" src="asset/js/mdb.min.js"></script>
  <script src="asset/js/jquery.min.js"></script>
  <script src="asset/js/bootstrap.min.js"></script>
  </body>
</html>

  