<?php
session_start();

include('server.php');

if(isset($_POST['login'])){
	$email = mysqli_real_escape_string($konek,htmlentities($_POST['email']));
	$pass = mysqli_real_escape_string($konek,md5($_POST['password']));
 
	$sql = mysqli_query($konek,"SELECT * FROM user WHERE email='$email' AND password='$pass'");
	if(mysqli_num_rows($sql) == 0){
		echo '<script language="javascript">alert("Terjadi Kesalahan !"); document.location="login.php";</script>';
	}else{
		$row = mysqli_fetch_array($sql);
		if($row['level'] == 1){
			$_SESSION['Admin']=$email;
			$_SESSION['unique_id']=$row['unique_id'];
			echo "<script>alert('Selamat Datang Admin SHEART !');
            window.location.href='admin';</script>";
		}
		elseif($row['level'] == 2){
			$_SESSION['Dokter']=$email;
			$_SESSION['unique_id']=$row['unique_id'];
			echo "<script>alert('Selamat Datang Bapak/Ibu Dokter SHEART !');
            window.location.href='dokter';</script>";
		}
		elseif($row['level'] == 3){
			$_SESSION['Pasien']=$email;
			$_SESSION['unique_id']=$row['unique_id'];
			echo "<script>alert('Selamat Datang Pasien SHEART !');
            window.location.href='pasien';</script>";
		}
	}
	$status = "Active now";
    $sql2 = mysqli_query($konek, "UPDATE user SET status = '$status' WHERE unique_id = '$row[unique_id]'");
}
?>