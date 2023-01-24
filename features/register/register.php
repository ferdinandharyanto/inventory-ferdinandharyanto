<?php
include('../../connection.php');
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="../../vendors/feather/feather.css">
    <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../../vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../vendors/select2/select2.min.css">
    <link rel="stylesheet" href="../../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
    <div class="content-wrapper d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="row w-50">
            <div class="col-md-6 grid-margin stretch-card w-100">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center">Register</h2>
                        <form class="forms-sample" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">NIK</label>
                                        <input type="text" class="form-control" name="nik" placeholder="Masukan NIK"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Nama</label>
                                        <input type="text" class="form-control" name="nama"
                                            placeholder="Masukan Nama Lengkap" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Alamat</label>
                                        <textarea name="alamat" class="form-control" id="" cols="30" rows="10"
                                            placeholder="Masukan Alamat" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">No Telp</label>
                                        <input type="number" class="form-control" name="no_telp"
                                            placeholder="Masukan No Telp" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Username</label>
                                        <input type="text" class="form-control" name="username"
                                            placeholder="Masukan Username" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Masukan Password" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Foto</label>
                                        <input type="file" accept="image/png, image/jpeg" name="foto"
                                            class="form-control" placeholder="Masukan Foto" required>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <input type="submit" name="create" class="btn btn-primary" value="Register">
                                <div class="mt-5">
                                    <p>You have a access? <a href="../login/login.php"><b>Login</b></a> </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="../../vendors/select2/select2.min.js"></script>
    <script src="../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/hoverable-collapse.js"></script>
    <script src="../../js/template.js"></script>
    <script src="../../js/settings.js"></script>
    <script src="../../js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../../js/file-upload.js"></script>
    <script src="../../js/typeahead.js"></script>
    <script src="../../js/select2.js"></script>
</body>

</html>
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
    // var_dump(move_uploaded_file($lokasi, 'images/' . $foto));
    $upload = move_uploaded_file($lokasi, '../../images/' . $foto);

    if ($upload) {
        $sql = $connect_db->query("INSERT INTO tbl_users (nik, nama, alamat, no_telp, username, password, foto) VALUES('$nik', '$nama','$alamat','$no_telp','$username','$password','$foto')");
    }

    if ($sql) {
        ?>

        <script type="text/javascript">
            alert("Adding data success");
            window.location.href = "../login/login.php";
        </script>

        <?php
    } else {
        echo $sql;
    }
}
?>