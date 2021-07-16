<?php
include '../server.php';
$id = $_POST['id'];
$kode = $_POST['kode'];

$query=mysqli_query($konek,"update grafik set kode='$kode' where id='$id' ") or die(mysqli_error());

echo "<script>alert('ANDA BERHASIL MEMBERI NAMA DAN DATA AKAN PINDAH KE DATA UTAMA  !');
  window.location.href='data_utama.php'; </script>"
?>