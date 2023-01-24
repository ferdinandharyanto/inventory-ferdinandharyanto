<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-sm-12">
        <div class="home-tab">
          <div class="row flex-grow">
            <div class="col-12 grid-margin stretch-card">
              <div class="card card-rounded">
                <div class="card-body">
                  <h4 class="card-title">Data Barang</h4>
                  <div class="text-white" style="text-align: end;">
                    <a href="?page=barang&aksi=createBarang" class="btn btn-primary me-2">
                      Add
                    </a>
                  </div>
                  <div class="table-responsive  mt-1">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            No
                          </th>
                          <th>Kode Barang</th>
                          <th>Nama Barang</th>
                          <th>Jenis</th>
                          <th>Jumlah</th>
                          <th>Satuan</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        $sql = $connect_db->query("SELECT b.id, b.kode_barang, b.nama_barang, b.jumlah, j.nama_jenis, s.nama_satuan FROM `tbl_barang` b INNER JOIN tbl_jenis j ON b.id_jenis = j.id INNER JOIN tbl_satuan s ON b.id_satuan = s.id;");
                        while ($data = $sql->fetch_assoc()) {
                          ?>
                          <tr>
                            <td><?php echo $no++; ?></td>
                            <td>
                              <?php echo $data['kode_barang']; ?>
                            </td>
                            <td><?php echo $data['nama_barang']; ?></td>
                            <td>
                              <?php echo $data['nama_jenis']; ?>
                            </td>
                            <td><?php echo $data['jumlah']; ?></td>
                            <td>
                              <?php echo $data['nama_satuan']; ?>
                            </td>
                            <td>
                              <a href="?page=barang&aksi=updateBarang&id=<?php echo $data['id'] ?>" type="button"
                                class="btn btn-info btn-icon p-2">
                                <i class="mdi mdi-pencil menu-icon m-0"></i>
                              </a>
                              <a href="?page=barang&aksi=deleteBarang&id=<?php echo $data['id'] ?>" class="btn btn-danger btn-icon p-2">
                                <i class="mdi mdi-delete menu-icon m-0"></i>
                              </a>
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
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
<!-- partial-end -->