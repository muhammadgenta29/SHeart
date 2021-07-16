<?php
$con=mysqli_connect("localhost","root","","heart");

if (!$con) {
  die('Could not connect: ' . mysqli_error());
}

// Data for Wheat Flour
$query = mysqli_query($con,"SELECT bpm FROM grafik");
$rows = array();
$rows['name'] = 'bpm';
while($tmp = mysqli_fetch_array($query)) {
    $rows['data'][] = $tmp['bpm'];
}

$result = array();
array_push($result,$rows);

print json_encode($result, JSON_NUMERIC_CHECK);

mysqli_close($con);
?> 