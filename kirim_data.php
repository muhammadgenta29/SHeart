<?php
include 'login/server.php';
$bpm = $_POST['bpm'];

$query=mysqli_query($konek,"insert into grafik(id,bpm) values (NULL,'$bpm')");
?>