<?php
$id = $_GET['id'];
$sqlGet = $connect_db->query("SELECT * FROM tbl_satuan WHERE  id='$id'");
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
                            Form for edit Satuan
                        </p>
                        <form class="forms-sample row" method="POST" enctype="multipart/form-data">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Nama Satuan</label>
                                    <input type="text" class="form-control" name="nama_satuan" placeholder="Nama Satuan"
                                        value="<?php echo $dataDetail['nama_satuan'] ?>"  required>
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
    $sql = $connect_db->query("UPDATE tbl_satuan SET nama_satuan='$nama' WHERE id='$id'");

    if ($sql) {
        ?>
        <script type="text/javascript">
            alert("Updating data success");
            window.location.href = "?page=satuanBarang";
        </script>

        <?php
    } else {
        echo $sql;
    }
}
?>