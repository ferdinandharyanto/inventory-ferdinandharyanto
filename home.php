<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
include('connection.php');

if (empty($_SESSION['admin'])) {
  header("location:features/login/login.php");
}

if ($_SESSION['admin']) {
  $user = $_SESSION['admin'];
}
$sql = $connect_db->query("SELECT * FROM tbl_users WHERE id='$user'");
$data = $sql->fetch_assoc();

$page = $_GET['page'];
$aksi = $_GET['aksi'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin2 </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/dataTable/dataTables.bootstrap4.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="row p-0 m-0 proBanner" id="proBanner">
      <div class="col-md-12 p-0 m-0">
        <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
          <div class="ps-lg-1">
            <div class="d-flex align-items-center justify-content-between">
              <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with
                this template!</p>
              <a href="https://www.bootstrapdash.com/product/star-admin-pro/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo"
                target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-between">
            <a href="https://www.bootstrapdash.com/product/star-admin-pro/"><i
                class="mdi mdi-home me-3 text-white"></i></a>
            <button id="bannerClose" class="btn border-0 p-0">
              <i class="mdi mdi-close text-white me-0"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="index.php?page=dashboard">
            <img src="images/logo.svg" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.php?page=dashboard">
            <img src="images/logo-mini.svg" alt="logo" />
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">Hai, <span class="text-black fw-bold">
                <?php echo $data['nama'] ?>
              </span></h1>
            <h3 class="welcome-sub-text">NIK : <?php echo $data['nik'] ?></h3>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="images/<?php echo $data['foto'] ?>" alt="Profile image"> </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <p class="mb-1 mt-3 font-weight-semibold">
                  <?php echo $data['nama'] ?>
                </p>
                <p class="fw-light text-muted mb-0"><?php echo $data['no_telp'] ?></p>
              </div>
              <a class="dropdown-item" data-toggle="modal" href="?page=editProfile&id=<?php echo $data['id'] ?>"><i
                  class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My
                Profile </a>
              <a class="dropdown-item" href="logout.php"><i
                  class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
          data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <?php
          if ($page == 'dashboard') {
            echo '<li class="nav-item active">';
          } else {
            echo '<li class="nav-item">';
          }
          ?>
          <a class="nav-link" href="?page=dashboard">
            <i class="mdi mdi-grid-large menu-icon"></i>
            <span class="menu-title">Dashboard</span>
          </a>
          </li>
          <li class="nav-item nav-category">Menu</li>
          <?php
          if ($page == 'users') {
            echo '<li class="nav-item active">';
          } else {
            echo '<li class="nav-item">';
          }
          ?>
          <a class="nav-link" href="?page=users">
            <i class="mdi mdi-account-multiple menu-icon"></i>
            <span class="menu-title">Data Pengguna</span>
          </a>
          </li>
          <?php
          if ($page == 'barang' || $page == 'jenisBarang' || $page == 'satuanBarang' || $page == 'satuanBarang' || $page == 'supplier') {
            echo '<li class="nav-item active">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="true"
              aria-controls="ui-basic">';
          } else {
            echo '<li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
              aria-controls="ui-basic">';
          }
          ?>

          <i class="menu-icon mdi mdi-card-text-outline"></i>
          <span class="menu-title">Data Master</span>
          <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              <?php
              if ($page == 'barang') {
                echo '<li class="nav-item active">';
              } else {
                echo '<li class="nav-item">';
              }
              ?>
              <a class="nav-link" href="?page=barang">Data Barang</a>
              </li>
              <?php
              if ($page == 'jenisBarang') {
                echo '<li class="nav-item active">';
              } else {
                echo '<li class="nav-item">';
              }
              ?>
              <a class="nav-link" href="?page=jenisBarang">Jenis Barang</a>
              </li>
              <?php
              if ($page == 'satuanBarang') {
                echo '<li class="nav-item active">';
              } else {
                echo '<li class="nav-item">';
              }
              ?>
              <a class="nav-link" href="?page=satuanBarang">Satuan Barang</a>
              </li>
              <?php
              if ($page == 'supplier') {
                echo '<li class="nav-item active">';
              } else {
                echo '<li class="nav-item">';
              }
              ?>
              <a class="nav-link" href="?page=supplier">Data Supplier</a>
              </li>
            </ul>
          </div>
          </li>
          <?php
          if ($page == 'barangMasuk' || $page == 'barangKeluar') {
            echo '<li class="nav-item active">
            <a class="nav-link" data-bs-toggle="collapse" href="#transaksi" aria-expanded="true"
              aria-controls="transaksi">';
          } else {
            echo '<li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#transaksi" aria-expanded="false"
              aria-controls="transaksi">';
          }
          ?>
          <i class="menu-icon mdi mdi-swap-vertical"></i>
          <span class="menu-title">Transaksi</span>
          <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="transaksi">
            <ul class="nav flex-column sub-menu">
              <?php
              if ($page == 'barangMasuk') {
                echo '<li class="nav-item active">';
              } else {
                echo '<li class="nav-item">';
              }
              ?>
              <a class="nav-link" href="?page=barangMasuk">Barang Masuk</a></li>
              <?php
              if ($page == 'barangKeluar') {
                echo '<li class="nav-item active">';
              } else {
                echo '<li class="nav-item">';
              }
              ?>
              <a class="nav-link" href="?page=barangKeluar">Barang Keluar</a></li>
            </ul>
          </div>
          </li>
        </ul>
      </nav>
      <?php
      if ($page == 'dashboard') {
        if ($aksi == "") {
          include 'features/dashboard/dashboard.php';
        }
      }

      if ($page == 'editProfile') {
        include 'features/profile/updateProfile.php';
      }

      if ($page == 'users') {
        if ($aksi == "") {
          include 'features/users/users.php';
        }
        if ($aksi == "createUser") {
          include 'features/users/createUser.php';
        }
        if ($aksi == 'updateUser') {
          include 'features/users/updateUser.php';
        }
        if ($aksi == 'deleteUser') {
          include 'features/users/deleteUser.php';
        }
      }

      if ($page == 'barang') {
        if ($aksi == "") {
          include 'features/barang/barang.php';
        }
        if ($aksi == "createBarang") {
          include 'features/barang/createBarang.php';
        }
        if ($aksi == 'updateBarang') {
          include 'features/barang/updateBarang.php';
        }
        if ($aksi == 'deleteBarang') {
          include 'features/barang/deleteBarang.php';
        }
      }

      if ($page == 'jenisBarang') {
        if ($aksi == "") {
          include 'features/jenisBarang/jenisBarang.php';
        }
        if ($aksi == "createJenisBarang") {
          include 'features/jenisBarang/createJenisBarang.php';
        }
        if ($aksi == 'updateJenisBarang') {
          include 'features/jenisBarang/updateJenisBarang.php';
        }
        if ($aksi == 'deleteJenisBarang') {
          include 'features/jenisBarang/deleteJenisBarang.php';
        }
      }

      if ($page == 'satuanBarang') {
        if ($aksi == "") {
          include 'features/satuanBarang/satuanBarang.php';
        }
        if ($aksi == "createSatuanBarang") {
          include 'features/satuanBarang/createSatuanBarang.php';
        }
        if ($aksi == 'updateSatuanBarang') {
          include 'features/satuanBarang/updateSatuanBarang.php';
        }
        if ($aksi == 'deleteSatuanBarang') {
          include 'features/satuanBarang/deleteSatuanBarang.php';
        }
      }

      if ($page == 'supplier') {
        if ($aksi == "") {
          include 'features/supplier/supplier.php';
        }
        if ($aksi == "createSupplier") {
          include 'features/supplier/createSupplier.php';
        }
        if ($aksi == 'updateSupplier') {
          include 'features/supplier/updateSupplier.php';
        }
        if ($aksi == 'deleteSupplier') {
          include 'features/supplier/deleteSupplier.php';
        }
      }

      if ($page == 'barangMasuk') {
        if ($aksi == "") {
          include 'features/barangMasuk/barangMasuk.php';
        }
        if ($aksi == "createBarangMasuk") {
          include 'features/barangMasuk/createBarangMasuk.php';
        }
        if ($aksi == 'updateBarangMasuk') {
          include 'features/barangMasuk/updateBarangMasuk.php';
        }
        if ($aksi == 'deleteBarangMasuk') {
          include 'features/barangMasuk/deleteBarangMasuk.php';
        }
      }

      if ($page == 'barangKeluar') {
        if ($aksi == "") {
          include 'features/barangKeluar/barangKeluar.php';
        }
        if ($aksi == "createBarangKeluar") {
          include 'features/barangKeluar/createBarangKeluar.php';
        }
        if ($aksi == 'updateBarangKeluar') {
          include 'features/barangKeluar/updateBarangKeluar.php';
        }
        if ($aksi == 'deleteBarangKeluar') {
          include 'features/barangKeluar/deleteBarangKeluar.php';
        }
      }
      ?>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="vendors/progressbar.js/progressbar.min.js"></script>
  <script src="vendors/dataTable/jquery.dataTables.min.js"></script>
  <script src="vendors/dataTable/dataTables.bootstrap4.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/jquery.cookie.js" type="text/javascript"></script>
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
  <script>
    $(document).ready(function () {
      $('.table').DataTable();
    });
  </script>
</body>

</html>