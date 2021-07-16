<?php
error_reporting(E_ALL & ~E_NOTICE);
include '../server.php';
$level=$_POST['level'];
$username= $_POST['username'];
$email = $_POST['email'];
$password = md5($_POST['password']);
if (isset($_POST['simpan'])){
  $poto = $_FILES['poto']['name'];}

   // Simpan di Folder Gambar
  move_uploaded_file($_FILES['poto']['tmp_name'], "../gambar/".$_FILES['poto']['name']);

// jika kode sudah terdaftar kyu aing tolak make script ieu
    $cek=mysqli_num_rows(mysqli_query($konek,"SELECT * FROM user where email='$email' "));
if($cek>0){
  echo "<script>alert('EMAIL SUDAH ADA !');
      window.location.href='tambah_akun_pasien.php';</script>";}
  // mun acan kadaftar ku aing di ijinan asup
  else
  {
if (empty($email))
  {             
     die("<script> alert('Isikan  Email!');   javascript:history.go(-1); </script>"); //Berhenti dan munculkan pesan jika nim tidak diisi
  }
  else
  {
  $ran_id = rand(time(), 100000000);
  $status = "Offline Now";
  $query=mysqli_query($konek,"insert into user(kode,unique_id,level,username,email,password,poto,status)values
(NULL,'$ran_id','$level','$username','$email','$password','$poto','$status')");
 if($query){
  echo "<script>alert('Anda Berhasil Membuat Akun Pasien! Silahkan masukkan biodata pasien! ');
window.location.href='pasien.php';</script>";
}
 else {
  echo "<script>alert('Anda Gagal Menginput!');
window.location.href='tambah_akun_pasien.php';</script>";
 }
 }
 }
 ?>
