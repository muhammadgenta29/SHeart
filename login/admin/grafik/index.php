<?php
include "../../server.php";
?>
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



<script>
var refreshId = setInterval(function()
{
    $('#responsecontainer').load('data.php');
}, 1000);
</script>
    
<!-- Begin page content -->
<div class="container">
  <div id="responsecontainer">
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
