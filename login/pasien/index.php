<?php include ('cek-login.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard</title>
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
         where email='$_SESSION[Pasien]' ");
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
            <a class="nav-link" href="biodata.php">
              <i class="mdi mdi-account-box menu-icon"></i>
              <span class="menu-title">Biodata</span>
            </a>
          </li>
       
          <li class="nav-item">
            <a class="nav-link" href="grafik.php">
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
          
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="mr-md-3 mr-xl-5">
                    <h2>Selamat Datang <?php echo "$fetch[username]"; } ?>,</h2>
                    <p class="mb-md-0">Anda Login Sebagai Pasien S'HEART</p>
                  </div>
                  <div>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                </div>
              </div>
            </div>
          </div>
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Detak Jantung Normal Berdasarkan Usia</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr align="center">
                          <th>Usia</th>
                          <th>Rentang Normal (Beats Per Minute)</th>
                          <th>Rata-Rata (Beats Per Minute)</th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr align="center">
                        <td>BBL</td>
                          <td>120-160 bpm</td>
                          <td>140 bpm</td>
                        </tr>
                        <tr align="center">
                        <td>1-12 Bln</td>
                          <td>80-140 bpm</td>
                          <td>120 bpm</td>
                        </tr>
                        <tr align="center">
                        <td>1-2 Thn</td>
                          <td>80-130 bpm</td>
                          <td>110 bpm</td>
                        </tr>
                        <tr align="center">
                        <td>3-6 Thn</td>
                          <td>75-120 bpm</td>
                          <td>100 bpm</td>
                        </tr>
                        <tr align="center">
                        <td>7-12 Thn</td>
                          <td>75-110 bpm</td>
                          <td>95 bpm</td>
                        </tr>
                        <tr align="center">
                        <td>Remaja</td>
                          <td>60-100 bpm</td>
                          <td>80 bpm</td>
                        </tr>
                        <tr align="center">
                        <td>Dewasa</td>
                          <td>60-100 bpm</td>
                          <td>80 bpm</td>
                        </tr>
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
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © $'HEART' 2021</span>
           
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

