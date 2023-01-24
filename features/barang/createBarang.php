<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card w-100">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add form</h4>
                        <p class="card-description">
                            Form for create barang
                        </p>
                        <form class="forms-sample row" method="POST" enctype="multipart/form-data">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Kode Barang</label>
                                    <input type="text" class="form-control" name="kode_barang" placeholder="Kode Barang" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Nama Barang</label>
                                    <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Jenis</label>
                                    <select name="id_jenis" class="form-control" required>
                                        <option value="">--Select Jenis Barang--</option>
                                        <?php
                                        $jenis = $connect_db->query("SELECT * FROM tbl_jenis");
                                        while ($dataJenis = $jenis->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $dataJenis['id']; ?>"><?php echo $dataJenis['nama_jenis']; ?></option>
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
                                            <option value="<?php echo $dataSatuan['id']; ?>"><?php echo $dataSatuan['nama_satuan']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12" style="text-align: end;">
                                <input type="submit" name="create" class="btn btn-primary me-2" value="Submit">
                                <a href="?page=barang" class="btn btn-light">Cancel</a>
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
    $kode = $_POST['kode_barang'];
    $nama = $_POST['nama_barang'];
    $satuan = $_POST['id_satuan'];
    $jenis = $_POST['id_jenis'];
    $jumlah = $_POST['jumlah'];
    $sql = $connect_db->query("INSERT INTO tbl_barang (kode_barang, nama_barang, id_satuan, id_jenis, jumlah ) VALUES('$kode', '$nama','$satuan','$jenis','$jumlah')");

    if ($sql) {
        ?>
        <script type="text/javascript">
            alert("Adding data success");
            window.location.href = "?page=barang";
        </script>

        <?php
    } else {
        echo $sql;
    }
}
?>