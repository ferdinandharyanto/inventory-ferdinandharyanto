<?php
$id = $_GET['id'];
$sqlGet = $connect_db->query("SELECT * FROM tbl_users WHERE  id='$id'");
$dataDetail = $sqlGet->fetch_assoc();
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card w-100">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Profile</h4>
                        <form class="forms-sample row" method="POST" enctype="multipart/form-data">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">NIK</label>
                                    <input type="text" class="form-control" name="nik"
                                        value="<?php echo $dataDetail['nik']; ?>" placeholder="NIK" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Nama</label>
                                    <input type="text" class="form-control" name="nama"
                                        value="<?php echo $dataDetail['nama']; ?>" placeholder="Nama" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Alamat</label>
                                    <textarea type="text" class="form-control" name="alamat" placeholder="Alamat"
                                        required><?php echo $dataDetail['alamat']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">No Telp</label>
                                    <input type="text" class="form-control" name="no_telp"
                                        value="<?php echo $dataDetail['no_telp']; ?>" placeholder="No Telp" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">New Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <img src="images/<?php echo $dataDetail['foto']; ?> " width="100" height="100"
                                            alt="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputConfirmPassword1">Foto</label>
                                        <input type="file" accept="image/png, image/jpeg" class="form-control" name="foto" placeholder="Foto">
                                    </div>
                                </div>
                                <div class="col-md-12" style="text-align: end;">
                                    <input type="submit" name="create" class="btn btn-primary me-2" value="Submit">
                                    <a href="?page=dashboard" class="btn btn-light">Cancel</a>
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
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $password = md5($_POST['password']);

    $foto = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];

    if (!empty($lokasi)) {
        $upload = move_uploaded_file($lokasi, 'images/' . $foto);
        $sql = $connect_db->query("UPDATE tbl_users SET nik='$nik', nama='$nama', alamat='$alamat', no_telp='$no_telp', password='$password', foto='$foto' WHERE id='$id'");

        if ($sql) {
            ?>
            <script type="text/javascript">
                alert("Updating data success");
                window.location.href = "?page=users";
            </script>

            <?php
        }
    } else {
        $sql = $connect_db->query("UPDATE tbl_users SET nik='$nik', nama='$nama', alamat='$alamat', no_telp='$no_telp', password='$password' WHERE id='$id'");
        if ($sql) {
            ?>
            <script type="text/javascript">
                alert("Updating data success");
                window.location.href = "?page=dashboard";
            </script>

            <?php
        }
    }
}
?>