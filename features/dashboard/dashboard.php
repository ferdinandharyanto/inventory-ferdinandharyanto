<?php
$count_user = $connect_db->query("SELECT COUNT(*) FROM `tbl_users`");
$user = $count_user->fetch_assoc();

$count_barang = $connect_db->query("SELECT COUNT(*) FROM tbl_barang");
$barang = $count_barang->fetch_assoc();

$count_barangMasuk = $connect_db->query("SELECT COUNT(*) FROM tbl_barang_masuk");
$barangMasuk = $count_barangMasuk->fetch_assoc();

$count_barangKeluar = $connect_db->query("SELECT COUNT(*) FROM tbl_barang_keluar");
$barangKeluar = $count_barangKeluar->fetch_assoc();
?>
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-sm-12">
        <div class="home-tab">
          <div class="row">
            <div class="col-sm-12">
              <div class="statistics-details d-flex align-items-center justify-content-between text-center">
                <div>
                  <p class="statistics-title">Users</p>
                  <h3 class="rate-percentage">
                    <?php echo $user['COUNT(*)']; ?>
                  </h3>
                  <a href="?page=users" class="btn btn-info m-0">
                    <i class="mdi mdi-eye m-0"></i>
                  </a>
                </div>
                <div>
                  <p class="statistics-title">Barang</p>
                  <h3 class="rate-percentage"><?php echo $barang['COUNT(*)']; ?></h3>
                  <a href="?page=barang" class="btn btn-info m-0"><i class="mdi mdi-eye m-0"></i></a>
                </div>
                <div>
                  <p class="statistics-title">Barang Masuk</p>
                  <h3 class="rate-percentage">
                    <?php echo $barangMasuk['COUNT(*)']; ?>
                  </h3>
                  <a href="?page=barangMasuk" class="btn btn-info m-0"><i class="mdi mdi-eye m-0"></i></a>
                </div>
                <div class="d-none d-md-block">
                  <p class="statistics-title">Barang Keluar</p>
                  <h3 class="rate-percentage">
                    <?php echo $barangKeluar['COUNT(*)']; ?>
                  </h3>
                  <a href="?page=barangKeluar" class="btn btn-info m-0"><i class="mdi mdi-eye m-0"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
  <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a
          href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">@Copyright by 20552011194_Ferdinand Haryanto_TIF K 20 CID_UASWEB1</span>
    </div>
  </footer>
  <!-- partial -->
</div>