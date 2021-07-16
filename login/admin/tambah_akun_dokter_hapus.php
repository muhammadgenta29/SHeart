<?php
include('../server.php');
$kode = $_GET['kode'];

$query = mysqli_query($konek,"DELETE FROM user WHERE kode='$kode' ");

if($query)
{
	echo "<script>
				alert('Berhasil Menghapus Data');
				window.location.href='tambah_akun_dokter.php';
		  </script>";
}
else
{
	echo "gagal ubah data";

}
?>