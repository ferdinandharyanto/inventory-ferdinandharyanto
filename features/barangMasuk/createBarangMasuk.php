<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card w-100">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add form</h4>
                        <p class="card-description">
                            Form for barang masuk
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
                                    <label>Supplier</label>
                                    <select name="id_supplier" class="form-control" required>
                                        <option value="">--Select Supplier--</option>
                                        <?php
                                        $supplier = $connect_db->query("SELECT * FROM tbl_supplier");
                                        while ($dataSupplier = $supplier->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $dataSupplier['id']; ?>">
                                                <?php echo $dataSupplier['nama_supplier']; ?>
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
                            </div>
                            <div class="col-md-12" style="text-align: end;">
                                <input type="submit" name="create" class="btn btn-primary me-2" value="Submit">
                                <a href="?page=barangMasuk" class="btn btn-light">Cancel</a>
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
    $supplier = $_POST['id_supplier'];
    $jumlah = $_POST['jumlah'];
    $satuan = $_POST['id_satuan'];
    $sql = $connect_db->query("INSERT INTO tbl_barang_masuk (id_transaksi, tanggal, id_barang, id_supplier, jumlah_barang, id_satuan) VALUES('$transaksi', '$tanggal','$barang','$supplier','$jumlah', '$satuan')");

    if ($sql) {
        ?>
        <script type="text/javascript">
            alert("Adding data success");
            window.location.href = "?page=barangMasuk";
        </script>

        <?php
    } else {
        echo $sql;
    }
}
?>