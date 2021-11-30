<?php 
require "../../../config.php";
date_default_timezone_set('Asia/Makassar');
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: ../login.php");
} 

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM ((produk INNER JOIN categori ON produk.id_categori = categori.id_categori ) INNER JOIN jenis_produk ON produk.id_jenisproduk = jenis_produk.id_jenisproduk)
WHERE id_produk=$id");  

$row = mysqli_fetch_object($query);

$categori = mysqli_query($conn, "SELECT * FROM categori");
$jenis = mysqli_query($conn, "SELECT * FROM jenis_produk");
?>
<!DOCTYPE html>admin/forms/edit_elements.php?id=20
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.php -->
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
                  <img src="../../assets/images/faces/face1.jpg" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"><?= $_SESSION['username']; ?></p>
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
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.php -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="../../assets/images/faces/face1.jpg" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?= $_SESSION['username']; ?></span>
                  <span class="text-secondary text-small">Admin Toko</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../index.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../tables/basic-table.php">
                <span class="menu-title">Data Produk</span>
                <i class="mdi mdi-table-large menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../../register.php">
                <span class="menu-title">Add User</span>
                <i class="mdi mdi-account-plus menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../pages/forms/basic_elements.php">
                <span class="menu-title">Add Data</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
            </li>
            <li class="nav-item sidebar-actions">
              <span class="nav-link">
                <div class="border-bottom">
                  <h6 class="font-weight-normal mb-3">Action</h6>
                </div>
                <a href="../../../logout.php"><button class="btn btn-block btn-lg btn-gradient-primary mt-4">Logout</button></a>
              </span>
            </li>
          </ul>
        </nav>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Form Edit Data </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><?= date("Y-m-d / H:i"); ?></li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Produk</h4>
                    <p class="card-description"> Fitri Mutiara Lombok </p>
                    <form class="forms-sample" action="../../../edit.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $row->id_produk; ?>">
                      <div class="form-group">
                        <label for="exampleSelectGender">Jensi Mutiara</label>
                        <select name="jenis" class="form-control" id="exampleSelectGender">
                        <option value="<?= $row->id_categori;?>"><?= $row->nm_categori; ?> (data awal)</option>
                          <?php 
                            while ($isi = mysqli_fetch_object($categori)) {
                                ?>
                          <option value="<?= $isi->id_categori;?>"><?= $isi->nm_categori; ?></option>
                          <?php
                            }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Jensi Mutiara</label>
                        <select name="produk" class="form-control" id="exampleSelectGender">
                        <option value="<?= $row->id_jenisproduk;?>"><?= $row->nm_jenisproduk;?> (data awal)</option>
                          <?php 
                            while ($tampil = mysqli_fetch_object($jenis)) {
                                ?>
                          <option value="<?= $tampil->id_jenisproduk;?>"><?= $tampil->nm_jenisproduk; ?></option>
                          <?php
                            }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <img src="<?= '../../../file/'. $row->poto ?>" alt="">
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input name="berkas" type="file">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Harga</label>
                        <input name="harga" type="text" class="form-control" id="exampleInputCity1" placeholder="harga" value="<?= $row->harga; ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Stok</label>
                        <input name="stok" type="text" class="form-control" id="exampleInputCity1" placeholder="stok" value="<?= $row->stok ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" id="exampleTextarea1" rows="4"><?= $row->deskripsi ?></textarea>
                      </div>
                      <button name="update" type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.php -->
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
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/file-upload.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>