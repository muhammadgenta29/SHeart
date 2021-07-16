<?php
include('../server.php');
$id_biodata = $_GET['id_biodata'];

$query = mysqli_query($konek,"DELETE FROM biodata_pasien WHERE id_biodata='$id_biodata' ");

if($query)
{
	echo "<script>
				alert('Berhasil Menghapus Data');
				window.location.href='pasien.php';
		  </script>";
}
else
{
	echo "gagal ubah data";

}
?>