<?php
$id = $_GET['id'];
$sqlGet = $connect_db->query("SELECT * FROM tbl_supplier WHERE  id='$id'");
$dataDetail = $sqlGet->fetch_assoc();
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card w-100">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit form</h4>
                        <p class="card-description">
                            Form for edit supplier
                        </p>
                        <form class="forms-sample row" method="POST" enctype="multipart/form-data">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Kode Supplier</label>
                                    <input type="text" class="form-control" name="kode_supplier"
                                        placeholder="Kode Supplier" value="<?php echo $dataDetail['kode_supplier']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Nama Supplier</label>
                                    <input type="text" class="form-control" name="nama_supplier"
                                        placeholder="Nama Supplier" value="<?php echo $dataDetail['nama_supplier']; ?>" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Alamat</label>
                                    <textarea type="text" class="form-control" name="alamat"
                                        placeholder="Alamat" required><?php echo $dataDetail['alamat']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">No Telp</label>
                                    <input type="text" class="form-control" name="no_telp" placeholder="No Telp"
                                        value="<?php echo $dataDetail['no_telp']; ?>" required>
                                </div>
                            </div>
                            <div class="col-md-12" style="text-align: end;">
                                <input type="submit" name="create" class="btn btn-primary me-2" value="Submit">
                                <a href="?page=supplier" class="btn btn-light">Cancel</a>
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
    $kode = $_POST['kode_supplier'];
    $nama = $_POST['nama_supplier'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];

    $sql = $connect_db->query("UPDATE tbl_supplier SET kode_supplier='$kode', nama_supplier='$nama', alamat='$alamat', no_telp='$no_telp' WHERE id='$id'");
    if ($sql) {
        ?>
        <script type="text/javascript">
            alert("Updating data success");
            window.location.href = "?page=supplier";
        </script>

        <?php
    } else {
        echo $sql;
    }
}
?>