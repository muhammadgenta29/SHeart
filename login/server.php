<?php 
$konek = mysqli_connect("localhost","root","","heart");

// Check connection
if (mysqli_connect_error()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>