<?php 
require "../config.php";
session_start();
date_default_timezone_set('Asia/Makassar');
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
}
      $sql = "select produk.*, categori.nm_categori, jenis_produk.nm_jenisproduk  
    from produk, categori, jenis_produk 
    where 
    produk.id_categori=categori.id_categori
    and
    produk.id_jenisproduk=jenis_produk.id_jenisproduk
    ";

    $query = mysqli_query($conn, $sql);

    $user = "SELECT * FROM users WHERE username ='$_SESSION[username]'";

    $userquery = mysqli_query($conn, $user);

    $time = date("Y-m-d / H:i");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.php -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="assets/images/faces/face1.jpg" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <?php 
                    $userdata = mysqli_fetch_object($userquery);
                  ?>
                  <p class="mb-1 text-black"><?= $userdata->username; ?></p>
                </div>
              </a>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.php -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="assets/images/faces/face1.jpg" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?= $userdata->username; ?></span>
                  <span class="text-secondary text-small">Admin Toko</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/tables/basic-table.php">
                <span class="menu-title">Data Produk</span>
                <i class="mdi mdi-table-large menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../register.php">
                <span class="menu-title">Add User</span>
                <i class="mdi mdi-account-plus menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/forms/basic_elements.php">
                <span class="menu-title">Add Data</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
            </li>
            <li class="nav-item sidebar-actions">
              <span class="nav-link">
                <div class="border-bottom">
                  <h6 class="font-weight-normal mb-3">Action</h6>
                </div>
                <a href="../logout.php"><button class="btn btn-block btn-lg btn-gradient-primary mt-4">Logout</button></a>
              </span>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row" id="proBanner">
              <div class="col-12">
              </div>
            </div>
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span><?= $time; ?>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Perkiraan Pendapatan <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <?php 
                      $pendapatan = mysqli_query($conn,"SELECT SUM(harga) as pendapatan FROM produk");
                      $tampil = mysqli_fetch_object($pendapatan);
                     ?>
                    <h2 class="mb-5">Rp.<?= $tampil->pendapatan ?></h2>
                    <h6 class="card-text">Fitri Mutiara Lombok</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Total Mutiara Air Laut <i class="mdi mdi-diamond mdi-24px float-right"></i>
                    </h4>
                    <?php 
                      $airlaut = mysqli_query($conn, "SELECT SUM(stok) as airlaut FROM produk WHERE id_categori = 1");
                      $airlautt = mysqli_fetch_object($airlaut);
                    ?>
                    <h2 class="mb-5"><?= $airlautt->airlaut; ?></h2>
                    <h6 class="card-text">Fitri Mutiara Lombok</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Total Mutiara Air Tawar <i class="mdi mdi-diamond mdi-24px float-right"></i>
                    </h4>
                    <?php 
                      $airtawar = mysqli_query($conn, "SELECT SUM(stok) as airtawar FROM produk WHERE id_categori = 2");
                      $airtawart = mysqli_fetch_object($airtawar);
                    ?>
                    <h2 class="mb-5"><?= $airtawart->airtawar;?></h2>
                    <h6 class="card-text">Fitri Mutiara Lombok</h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Project Status</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Produk </th>
                            <th> Jenis Produk </th>
                            <th> Harga </th>
                            <th> Stok </th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                          $no = 1;
                            while ($isi = mysqli_fetch_object($query)) {
                                ?>
                          <tr>
                            <td><?= $no++ ?></td>
                            <td><?=$isi->nm_categori;?></td>
                            <td><?=$isi->nm_jenisproduk;?></td>
                            <td><?= $isi->harga; ?></td>
                            <td><?= $isi->stok; ?></td>
                              <?php
                            }
                            ?>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.php -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Husain_Jongkoding 2021</span>
              
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
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>