<?php
include '../server.php';
$kode = $_POST['kode'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = md5($_POST['password']);

$query=mysqli_query($konek,"update user set username='$username',email='$email',password='$password' where kode='$kode' ") or die(mysqli_error());

echo "<script>alert('TERIMAKASIH, ANDA BERHASIL MENGEDIT AKUN DOKTER  !');
  window.location.href='tambah_akun_dokter.php'; </script>"
?>