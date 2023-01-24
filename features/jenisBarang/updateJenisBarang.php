<?php
$id = $_GET['id'];
$sqlGet = $connect_db->query("SELECT * FROM tbl_jenis WHERE  id='$id'");
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
                            Form for edit jenis barang
                        </p>
                        <form class="forms-sample row" method="POST" enctype="multipart/form-data">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Nama Jenis</label>
                                    <input type="text" class="form-control" name="nama_jenis" placeholder="Nama Jenis"
                                        value="<?php echo $dataDetail['nama_jenis'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-12" style="text-align: end;">
                                <input type="submit" name="create" class="btn btn-primary me-2" value="Submit">
                                <a href="?page=jenisBarang" class="btn btn-light">Cancel</a>
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
    $nama = $_POST['nama_jenis'];
    $sql = $connect_db->query("UPDATE tbl_jenis SET nama_jenis='$nama' WHERE id='$id'");

    if ($sql) {
        ?>
        <script type="text/javascript">
            alert("Updating data success");
            window.location.href = "?page=jenisBarang";
        </script>

        <?php
    } else {
        echo $sql;
    }
}
?>