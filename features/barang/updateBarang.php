<?php
$id = $_GET['id'];
$sqlGet = $connect_db->query("SELECT * FROM tbl_barang WHERE  id='$id'");
$dataDetail = $sqlGet->fetch_assoc();
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card w-100">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add form</h4>
                        <p class="card-description">
                            Form for edit barang
                        </p>
                        <form class="forms-sample row" method="POST" enctype="multipart/form-data">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Kode Barang</label>
                                    <input type="text" class="form-control" name="kode_barang" placeholder="Kode Barang"
                                        value="<?php echo $dataDetail['kode_barang'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Nama Barang</label>
                                    <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang"
                                        value="<?php echo $dataDetail['nama_barang'] ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Jenis</label>
                                    <select name="id_jenis" class="form-control">
                                        <option value="">--Select Jenis Barang--</option>
                                        <?php
                                        $jenis = $connect_db->query("SELECT * FROM tbl_jenis");
                                        while ($dataJenis = $jenis->fetch_assoc()) {
                                            if ($dataJenis['id'] == $dataDetail['id_jenis']) {
                                                $selected = 'selected';
                                            } else {
                                                $selected = '';
                                            }
                                            $output = '<option value="' . $dataJenis['id'] . '" ' . $selected . '>' . $dataJenis['nama_jenis'] . '</option>';

                                            echo $output;
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Jumlah</label>
                                    <input type="number" class="form-control" name="jumlah"
                                        value="<?php echo $dataDetail['jumlah'] ?>" placeholder="Jumlah">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Satuan</label>
                                    <select name="id_satuan" class="form-control">
                                        <option value="">--Select Satuan Barang--</option>
                                        <?php
                                        $satuan = $connect_db->query("SELECT * FROM tbl_satuan");
                                        while ($dataSatuan = $satuan->fetch_assoc()) {
                                            if ($dataSatuan['id'] == $dataDetail['id_satuan']) {
                                                $selectedData = 'selected';
                                            } else {
                                                $selectedData = '';
                                            }
                                            $output = '<option value="' . $dataSatuan['id'] . '" ' . $selectedData . '>' . $dataSatuan['nama_satuan'] . '</option>';
                                            echo $output;
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12" style="text-align: end;">
                                <input type="submit" name="create" class="btn btn-primary me-2" value="Submit">
                                <a href="?page=users" class="btn btn-light">Cancel</a>
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
    $sql = $connect_db->query("UPDATE tbl_barang SET kode_barang='$kode', nama_barang='$nama', id_satuan='$satuan', id_jenis='$jenis', jumlah='$jumlah' WHERE id='$id'");

    if ($sql) {
        ?>
        <script type="text/javascript">
            alert("Updating data success");
            window.location.href = "?page=barang";
        </script>

        <?php
    } else {
        echo $sql;
    }
}
?>