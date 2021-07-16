<?php
include '../server.php';
$nik = $_POST['nik'];
$kode = $_POST['kode'];
$nama_pasien = $_POST['nama_pasien'];
$jk = $_POST['jk'];
$tempat_lahir = $_POST['tempat_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$bb = $_POST['bb'];
$tb = $_POST['tb'];
$pekerjaan = $_POST['pekerjaan'];
$alamat = $_POST['alamat'];
$no_wa = $_POST['no_wa'];

if (isset($_POST['simpan'])){
  $foto = $_FILES['foto']['name'];}
 
   // Simpan di Folder Gambar
  move_uploaded_file($_FILES['foto']['tmp_name'], "../pasien/gambar/".$_FILES['foto']['name']);

// jika nisn sudah terdaftar kyu aing tolak make script ieu
$cek=mysqli_num_rows(mysqli_query($konek,"SELECT * FROM biodata_pasien where nik='$nik' "));
if($cek>0){
	echo "<script>alert('NIK SUDAH ADA !');
			javascript:history.go(-2);</script>";
			exit;}
	// mun acan kadaftar ku aing di ijinan asup
  else
  {
	  //lamun nip teu di input
if (empty($nik) || empty($nama_pasien) || empty($jk)|| empty($tempat_lahir)|| empty($tgl_lahir)|| empty($bb)|| empty($tb)|| empty($pekerjaan) || empty($alamat))
  {             
     die("<script> alert(' KOLOM TIDAK BOLEH ADA YANG KOSONG !!!!!!');	 javascript:history.go(-1); </script>"); //Berhenti dan munculkan pesan jika nim tidak diisi
  }
  ELSE
  {
  $query= mysqli_query($konek,"insert into biodata_pasien(nik,kode,foto,nama_pasien,jk,tempat_lahir,tgl_lahir,bb,tb,pekerjaan,alamat,no_wa)VALUES
('$nik','$kode','$foto','$nama_pasien','$jk','$tempat_lahir','$tgl_lahir','$bb','$tb','$pekerjaan','$alamat','$no_wa')");
  }
  
  }
  
  echo "<script>alert('TERIMAKASIH, ANDA BERHASIL MENGISI BIODATA  !');
  window.location.href='pasien.php'; </script>"
?>
