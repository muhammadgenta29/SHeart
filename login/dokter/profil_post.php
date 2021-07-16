<?php
error_reporting(E_ALL & ~E_NOTICE);
include '../server.php';
$kode = $_POST['kode'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = md5($_POST['password']);

// Cek apakah user ingin mengubah fotonya atau tidak

if(isset($_POST['ubah_foto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :

  // Ambil data foto yang dipilih dari form

  $sumber = $_FILES['image']['name'];

  $nama_gambar = $_FILES['image']['tmp_name'];

  

  // Rename nama fotonya dengan menambahkan tanggal dan jam upload

  $fotobaru = date('dmYHis').$sumber;

  

  // Set path folder tempat menyimpan fotonya

  $path = "../gambar/".$fotobaru;



  if(move_uploaded_file($nama_gambar, $path)){ // Cek apakah gambar berhasil diupload atau tidak

      // Query untuk menampilkan data user berdasarkan id_user yang dikirim

      $query =mysqli_query($konek,"SELECT * FROM user WHERE kode='".$kode."'");

      $data = mysqli_fetch_array($query); // Ambil data dari hasil eksekusi $sql



      // Cek apakah file gambar sebelumnya ada di folder foto

      if(is_file("../gambar/".$data['poto'])) // Jika gambar ada

          unlink("../gambar/".$data['poto']); // Hapus file gambar sebelumnya yang ada di folder images

      

      // Proses ubah data ke Database
      $query=mysqli_query($konek,"update user set username='$username',email='$email',password='$password', poto='$fotobaru' where kode='$kode'");

      if($query){ // Cek jika proses simpan ke database sukses atau tidak

          // Jika Sukses, Lakukan :
          echo "<script>alert('TERIMAKASIH, ANDA BERHASIL MENGEDIT  PROFIL  !');
          window.location.href='../login.php'; </script>";

      }else{

          // Jika Gagal, Lakukan :

          echo "<script> alert(' Gagal !!!!!!');  javascript:history.go(-2); </script>";

      }

  }else{

      // Jika gambar gagal diupload, Lakukan :

      echo "<script> alert(' Anda menceklis namun tidak disertai gambar !!!!!!');  javascript:history.go(-2); </script>";

  }

}else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :

  // Proses ubah data ke Database

  $query=mysqli_query($konek,"update user set username='$username',email='$email',password='$password' where kode='$kode'");



  if($query){ // Cek jika proses simpan ke database sukses atau tidak

      // Jika Sukses, Lakukan :

      echo "<script>alert('TERIMAKASIH, ANDA BERHASIL MENGEDIT  PROFIL  !');
          window.location.href='../login.php'; </script>";

  }else{

      // Jika Gagal, Lakukan :

      echo "<script> alert(' Gagal !!!!!!');  javascript:history.go(-2); </script>";

  }

}
?>
