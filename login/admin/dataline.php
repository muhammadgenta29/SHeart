<?php
include "../server.php";
// Data for Wheat Flour
$kode=$_GET["kode"];
$query = mysqli_query($konek,"SELECT * FROM grafik WHERE kode='$kode");
$rows = array();
$rows['name'] = 'bpm';
while($tmp = mysqli_fetch_array($query)) {
    $rows['data'][] = $tmp['bpm'];
}

$result = array();
array_push($result,$rows);

print json_encode($result, JSON_NUMERIC_CHECK);

mysqli_close($konek);
?> 