<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card w-100">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add form</h4>
                        <p class="card-description">
                            Form for create user
                        </p>
                        <form class="forms-sample row" method="POST" enctype="multipart/form-data">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">NIK</label>
                                    <input type="text" class="form-control" name="nik" placeholder="NIK" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Nama</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama" required>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">Foto</label>
                                    <input type="file" accept="image/png, image/jpeg" class="form-control" name="foto" placeholder="Foto" required>
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
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $foto = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    $upload = move_uploaded_file($lokasi, 'images/' . $foto);

    if ($upload) {
        $sql = $connect_db->query("INSERT INTO tbl_users (nik, nama, alamat, no_telp, username, password, foto) VALUES('$nik', '$nama','$alamat','$no_telp','$username','$password','$foto')");
    }

    if ($sql) {
        ?>
        <script type="text/javascript">
            alert("Adding data success");
            window.location.href = "?page=users";
        </script>

        <?php
    } else {
        echo $sql;
    }
}
?>