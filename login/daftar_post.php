<?php
error_reporting(E_ALL & ~E_NOTICE);
include 'server.php';
$kode=$_POST['kode'];
$level=$_POST['level'];
$username= $_POST['username'];
$email = $_POST['email'];
$password = md5($_POST['password']);
if (isset($_POST['simpan'])){
$poto = $_FILES['poto']['name'];}
 
   // Simpan di Folder Gambar
  move_uploaded_file($_FILES['poto']['tmp_name'], "pasien/gambar/".$_FILES['poto']['name']);
$ran_id = rand(time(), 100000000);
// jika kode sudah terdaftar kyu aing tolak make script ieu
    $cek=mysqli_num_rows(mysqli_query($konek,"SELECT * FROM user where kode='$kode' "));
if($cek>0){
  echo "<script>alert('AKUN SUDAH ADA !');
      window.location.href='daftar.php';</script>";}
  // mun acan kadaftar ku aing di ijinan asup
  else
  {
if (empty($username))
  {             
     die("<script> alert('Isikan  Username!');   javascript:history.go(-1); </script>"); //Berhenti dan munculkan pesan jika nim tidak diisi
  }
  else
  {
$status = "Offline Now";
$query=mysqli_query($konek,"insert into user(kode,unique_id,level,username,email,password,poto,status)values
(NULL,'$ran_id','$level','$username','$email','$password','$poto','$status')");
 if($query){
  echo "<script>alert('Anda Berhasil Daftar! Silahkan Login!');
window.location.href='login.php';</script>";
}
 else {
  echo "<script>alert('Anda Gagal Daftar!');
window.location.href='daftar.php';</script>";
 }
 }
 }
 ?>
