<?php include ('cek-login.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Data Grafik Pending</title>
  <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<script type="text/javascript" src="vendors/DataTables/datatables.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
$('#myTable').DataTable();
});

</script>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
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
        <button type="button" class="btn btn-warning" onClick="history.go(-1)"><i class="fa fa-rotate-left"></i> Back </button>
        <button type="button" class="btn btn-success" onClick="history.go(0)"><i class="fa fa-refresh"></i> Refresh </button>

              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Grafik Pending</h4>
                  <div class="table-responsive pt-3">
                    <table id="myTable" class="table table-striped table-bordered">
                      <thead>
                        <tr align="center">
                          <th>No</th>
                          <th>Bpm</th>
                          <th>Waktu</th>
                          <th>Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
     <?php
      include('../server.php');
      $query =mysqli_query($konek,"SELECT * FROM grafik WHERE kode='' ORDER BY id DESC");
      $i = 1;
      while($fetch = mysqli_fetch_array($query))
      {
      echo"
          <tr align=center>
              <td>$i.</td>
                <td>$fetch[bpm]</td>
                <td>$fetch[waktu]</td>

                <td><a href=\"data_pending_edit.php?id=$fetch[id]\"> <button type='button' class='btn btn-outline btn-primary'>Beri Nama<i class='fa  fa-edit'></i></button>  </a>
                <a href=\"tambah_akun_dokter_hapus.php?kode=$fetch[kode]\"> <button type='button' class='btn btn-outline btn-danger'>Hapus<i class='fa  fa-close'></i></button>  </a></td>
          </tr>
      ";
      $i++; 
        }
      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
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
  <!-- Modal + data -->
  <div class="modal fade" id="pasien" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 style="font-size:20px" class="modal-title" id="myModalLabel">Tambah Akun Dokter</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
        <div class="modal-body">
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="dataTable_wrapper">
            <div class="col-lg-8">
                <form action="tambah_akun_dokter_post.php" method="post" enctype="multipart/form-data">                          
            <?php 
            include '../server.php';
            $query = mysqli_query($konek,"SELECT * FROM user_lv where nm_level='Dokter'");
            while ($row = mysqli_fetch_array($query)) {
            ?>
            <input type="hidden" name="level" class="form-control" value="<?php echo $row['level'] ?>"><?php } ?>
            <div class="form-group">
                <label>Foto</label></br>
                <img id="uploadPreview" style="width: 150px; height: 150px;" />
                <input id="uploadImage" type="file" name="poto" accept="image/*" onchange="PreviewImage();" /><br>
            </div>
            <div class="form-group">
                <label>Username :</label>
                <input type="text" class="form-control" placeholder="Masukkkan Username" name="username" required="required">
            </div>
            
            <div class="form-group">
                <label>Email :</label>
                <input type="email" class="form-control" placeholder="Masukkan Email" name="email" required>
            </div>

            <div class="form-group">
                <label>Password :</label>
                <input type="password" class="form-control" placeholder="Masukkan Password" name="password" required>
            </div>
                   <div class="form-group">
                                          <input type="submit" name="simpan" value="Tambah" class="btn btn-primary"> 
                                        <button type="reset" class="btn btn-default" onClick="history.go(0)">Reset</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal" onClick="history.go(0)">Batal</button>
                                        </div>                                       
                                </form>
                                
                            </div>
                            </div>

                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/data-table.js"></script>
  <script src="js/jquery.dataTables.js"></script>
  <script src="js/dataTables.bootstrap4.js"></script>
  <!-- End custom js for this page-->
  <script src="js/jquery.cookie.js" type="text/javascript"></script>
</body>

</html>

