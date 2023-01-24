<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card w-100">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add form</h4>
                        <p class="card-description">
                            Form for create supplier
                        </p>
                        <form class="forms-sample row" method="POST" enctype="multipart/form-data">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Kode Supplier</label>
                                    <input type="text" class="form-control" name="kode_supplier"
                                        placeholder="Kode Supplier" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Nama Supplier</label>
                                    <input type="text" class="form-control" name="nama_supplier"
                                        placeholder="Nama Supplier" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Alamat</label>
                                    <textarea type="text" class="form-control" name="alamat"
                                        placeholder="Alamat" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">No Telp</label>
                                    <input type="text" class="form-control" name="no_telp" placeholder="No Telp" required>
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

    $sql = $connect_db->query("INSERT INTO tbl_supplier (kode_supplier, nama_supplier, alamat, no_telp) VALUES('$kode', '$nama','$alamat','$no_telp')");
    if ($sql) {
        ?>
        <script type="text/javascript">
            alert("Adding data success");
            window.location.href = "?page=supplier";
        </script>

        <?php
    } else {
        echo $sql;
    }
}
?>