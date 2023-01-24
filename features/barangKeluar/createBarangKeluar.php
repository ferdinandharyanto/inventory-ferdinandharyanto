<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card w-100">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add form</h4>
                        <p class="card-description">
                            Form for barang Keluar
                        </p>
                        <form class="forms-sample row" method="POST" enctype="multipart/form-data">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Tanggal</label>
                                    <input type="date" class="form-control" name="tanggal" placeholder="Tanggal" required>
                                </div>
                                <div class="form-group">
                                    <label>Barang</label>
                                    <select name="id_barang" class="form-control" required>
                                        <option value="">--Select Barang--</option>
                                        <?php
                                        $barang = $connect_db->query("SELECT * FROM tbl_barang");
                                        while ($dataBarang = $barang->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $dataBarang['id']; ?>">
                                                <?php echo $dataBarang['nama_barang']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Satuan</label>
                                    <select name="id_satuan" class="form-control" required>
                                        <option value="">--Select Satuan Barang--</option>
                                        <?php
                                        $satuan = $connect_db->query("SELECT * FROM tbl_satuan");
                                        while ($dataSatuan = $satuan->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $dataSatuan['id']; ?>">
                                                <?php echo $dataSatuan['nama_satuan']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Jumlah</label>
                                    <input type="number" class="form-control" name="jumlah" placeholder="Jumlah" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Tujuan</label>
                                    <input type="text" class="form-control" name="tujuan" placeholder="Tujuan" required>
                                </div>
                            </div>
                            <div class="col-md-12" style="text-align: end;">
                                <input type="submit" name="create" class="btn btn-primary me-2" value="Submit">
                                <a href="?page=barangKeluar" class="btn btn-light">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['create'])) {
    $transaksi = "BM-" . date("dmY") . mt_srand(10);
    $tanggal = $_POST['tanggal'];
    $barang = $_POST['id_barang'];
    $jumlah = $_POST['jumlah'];
    $satuan = $_POST['id_satuan'];
    $tujuan = $_POST['tujuan'];
    $sql = $connect_db->query("INSERT INTO tbl_barang_keluar (id_transaksi, tanggal, id_barang, jumlah, id_satuan, tujuan) VALUES('$transaksi', '$tanggal','$barang','$jumlah', '$satuan', '$tujuan')");

    if ($sql) {
        ?>
        <script type="text/javascript">
            alert("Adding data success");
            window.location.href = "?page=barangKeluar";
        </script>

        <?php
    } else {
        echo $sql;
    }
}
?>