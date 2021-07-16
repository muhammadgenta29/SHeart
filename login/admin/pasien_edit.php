<?php include ('cek-login.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Edit Biodata Pasien</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<script type="text/javascript">
function PreviewImage() {
var oFReader = new FileReader();
oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
oFReader.onload = function (oFREvent)
 {
    document.getElementById("uploadPreview").src = oFREvent.target.result;
};
};
</script>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
        <a class="navbar-brand brand-logo" href="index.php"><img src="images/logoo.svg" style="height: 70px;" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/logoo.svg" style="height: 100px;" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
          <li class="nav-item nav-search d-none d-lg-block w-100">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                </span>
              </div>
            
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
        <?php include('../server.php');
        $query = mysqli_query($konek,"SELECT * FROM user
         where email='$_SESSION[Admin]' ");
        $i = 1;
        while($fetch = mysqli_fetch_array($query))
        { ?>
         
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <?php echo "<img src='../gambar/$fetch[poto]'/>";?>
              <span class="nav-profile-name"><?php echo "$fetch[username]"; ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="profil.php">
                <i class="mdi mdi-account text-primary"></i>
                Profile
              </a>
              <a class="dropdown-item" href="../logout.php?logout_id=<?php echo $fetch['unique_id']; ?> " onclick="return confirm('Apakah anda akan keluar?')">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <?php } ?>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="tambah_akun.php">
              <i class="mdi mdi-account menu-icon"></i>
              <span class="menu-title">Tambah Akun</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="pasien.php">
              <i class="mdi mdi-account-box menu-icon"></i>
              <span class="menu-title">Pasien</span>
            </a>
          </li>
       
          <li class="nav-item">
            <a class="nav-link" href="pilih_grafik.php">
              <i class="mdi mdi-heart-pulse
              menu-icon"></i>
              <span class="menu-title">Grafik Detak Jantung</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="chat2/users.php">
              <i class="mdi mdi-chat
              menu-icon"></i>
              <span class="menu-title">Chat</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
        <div class="panel-body">
        <button type="button" class="btn btn-warning" onClick="history.go(-1)"><i class="fa fa-rotate-left"></i> Back </button>
                <button type="button" class="btn btn-success" onClick="history.go(0)"><i class="fa fa-refresh"></i> Refresh </button>
          <div class="row">
            
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Biodata Pasien</h4>
                  <form class="forms-sample" role="form" action="pasien_edit_post.php" method="post" enctype="multipart/form-data" >
                  <?php include('../server.php');
                      $id_biodata = $_GET['id_biodata'];
                      $query = mysqli_query($konek,"SELECT * FROM biodata_pasien WHERE id_biodata='$id_biodata'");
                      
                      while($fetch = mysqli_fetch_array($query))
                      { ?>
                    <input type="hidden" name="id_biodata" class="form-control" value="<?php echo "$fetch[id_biodata]"; ?>">
                    <div class="form-group">
                      <label>Foto</label><br>
                      <a href="../pasien/gambar/<?php echo $fetch['foto'] ?>"><img src="../pasien/gambar/<?php echo $fetch['foto'] ?>" width="150px" height="120px" /></a></br>
                      <input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br>
                      <input name="image" id="gambar" type="file" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">NIK</label>
                      <input type="number" name="nik" class="form-control" id="exampleInputCity1" value="<?php echo "$fetch[nik]"; ?>" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Nama Pasien</label>
                      <input type="text" name="nama_pasien" class="form-control" id="exampleInputCity1" value="<?php echo "$fetch[nama_pasien]"; ?>" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Tempat Lahir</label>
                      <input type="text" name="tempat_lahir" class="form-control" id="exampleInputCity1" value="<?php echo "$fetch[tempat_lahir]"; ?>" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Tanggal Lahir</label>
                      <input type="date" name="tgl_lahir" class="form-control" id="exampleInputCity1" value="<?php echo "$fetch[tgl_lahir]"; ?>" >
                    </div>
                    <div class="form-group">
                       <label> Jenis Kelamin  </label>
                       <p><input type="radio" name="jk" value="Laki-laki" <?php if($fetch['jk']=='Laki-laki') echo 'checked'?>> Laki-laki</p>
                        <p><input type="radio" name="jk" value="Perempuan" <?php if($fetch['jk']=='Perempuan') echo 'checked'?>> Perempuan</p>
                        </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Berat Badan</label>
                      <input type="number" name="bb" class="form-control" id="exampleInputPassword4" value="<?php echo "$fetch[bb]"; ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Tinggi Badan</label>
                      <input type="number" name="tb" class="form-control" id="exampleInputCity1" value="<?php echo "$fetch[tb]"; ?>" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Pekerjaan</label>
                      <input type="text" name="pekerjaan" class="form-control" id="exampleInputCity1" value="<?php echo "$fetch[pekerjaan]"; ?>" >
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea class="form-control" rows="3" name="alamat" required><?php echo "$fetch[alamat]"; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Nomor Whatsapp</label>
                      <input type="text" name="no_wa" class="form-control" id="exampleInputCity1" value="<?php echo "$fetch[no_wa]"; ?>" >
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © S'HEART 2021</span>
            
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
