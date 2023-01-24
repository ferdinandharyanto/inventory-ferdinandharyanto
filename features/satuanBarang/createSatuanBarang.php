<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card w-100">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add form</h4>
                        <p class="card-description">
                            Form for create satuan
                        </p>
                        <form class="forms-sample row" method="POST" enctype="multipart/form-data">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Nama Satuan</label>
                                    <input type="text" class="form-control" name="nama_satuan" placeholder="Nama Satuan"  required>
                                </div>
                            </div>
                            <div class="col-md-12" style="text-align: end;">
                                <input type="submit" name="create" class="btn btn-primary me-2" value="Submit">
                                <a href="?page=satuanBarang" class="btn btn-light">Cancel</a>
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
    $nama = $_POST['nama_satuan'];
    $sql = $connect_db->query("INSERT INTO tbl_satuan (nama_satuan ) VALUES('$nama')");

    if ($sql) {
        ?>
        <script type="text/javascript">
            alert("Adding data success");
            window.location.href = "?page=satuanBarang";
        </script>

        <?php
    } else {
        echo $sql;
    }
}
?>