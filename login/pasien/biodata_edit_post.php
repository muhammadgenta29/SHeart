<?php
error_reporting(E_ALL & ~E_NOTICE);
include '../server.php';
$id_biodata = $_POST['id_biodata'];
$nik = $_POST['nik'];
$nama_pasien = $_POST['nama_pasien'];
$tempat_lahir = $_POST['tempat_lahir'];
$tgl_lahir =$_POST['tgl_lahir'];
$jk =$_POST['jk'];
$bb = $_POST['bb'];
$tb = $_POST['tb'];
$pekerjaan = $_POST['pekerjaan'];
$alamat = $_POST['alamat'];
$no_wa = $_POST['no_wa'];

// Cek apakah user ingin mengubah fotonya atau tidak

if(isset($_POST['ubah_foto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :

  // Ambil data foto yang dipilih dari form

  $sumber = $_FILES['image']['name'];

  $nama_gambar = $_FILES['image']['tmp_name'];

  

  // Rename nama fotonya dengan menambahkan tanggal dan jam upload

  $fotobaru = date('dmYHis').$sumber;

  

  // Set path folder tempat menyimpan fotonya

  $path = "gambar/".$fotobaru;



  if(move_uploaded_file($nama_gambar, $path)){ // Cek apakah gambar berhasil diupload atau tidak

      // Query untuk menampilkan data user berdasarkan id_user yang dikirim

      $query =mysqli_query($konek,"SELECT * FROM biodata_pasien WHERE id_biodata='".$id_biodata."'");

      $data = mysqli_fetch_array($query); // Ambil data dari hasil eksekusi $sql



      // Cek apakah file gambar sebelumnya ada di folder foto

      if(is_file("gambar/".$data['foto'])) // Jika gambar ada

          unlink("gambar/".$data['foto']); // Hapus file gambar sebelumnya yang ada di folder images

      

      // Proses ubah data ke Database

      $query=mysqli_query($konek,"update biodata_pasien set nik='$nik',nama_pasien='$nama_pasien',tempat_lahir='$tempat_lahir',tgl_lahir='$tgl_lahir',jk='$jk',bb='$bb',tb='$tb',pekerjaan='$pekerjaan',alamat='$alamat',no_wa='$no_wa',foto='$fotobaru' where id_biodata='$id_biodata'");

      if($query){ // Cek jika proses simpan ke database sukses atau tidak

          // Jika Sukses, Lakukan :

          echo "<script> alert(' Anda berhasil mengedit data !!!!!!');  javascript:history.go(-2); </script>";

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

  $query=mysqli_query($konek,"update biodata_pasien set nik='$nik',nama_pasien='$nama_pasien',tempat_lahir='$tempat_lahir',tgl_lahir='$tgl_lahir',jk='$jk',bb='$bb',tb='$tb',pekerjaan='$pekerjaan',alamat='$alamat',no_wa='$no_wa' where id_biodata='$id_biodata'");



  if($query){ // Cek jika proses simpan ke database sukses atau tidak

      // Jika Sukses, Lakukan :

      echo "<script> alert(' Anda berhasil mengedit data !!!!!!');  javascript:history.go(-2); </script>";

  }else{

      // Jika Gagal, Lakukan :

      echo "<script> alert(' Gagal !!!!!!');  javascript:history.go(-2); </script>";

  }

}
?>
