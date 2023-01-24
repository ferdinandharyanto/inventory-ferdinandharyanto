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
        <div class="row w-25">
            <div class="col-md-6 grid-margin stretch-card w-100">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center">Login</h2>
                        <form class="forms-sample" action='' method='post'>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password"
                                    required>
                            </div>
                            <div class="text-center">
                                <input type="submit" name="login_btn" class="btn btn-primary" value="Log in">
                                <div class="mt-5">
                                    <p>Don't have access? <a href="../register/register.php"><b>Register</b></a> </p>
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
$username = $_POST['username'];
$password = md5($_POST['password']);
$login = $_POST['login_btn'];

if ($login) {
    $sql = $connect_db->query("SELECT * FROM tbl_users WHERE username='$username' AND password='$password'");
    $result = $sql->num_rows;
    $data = $sql->fetch_assoc();
    if ($result >= 1) {
        ob_start();
        session_start();
        $_SESSION['admin'] = $data['id'];
        header("location: ../../home.php?page=dashboard");
        ?>
        <script type="text/javascript">
            alert("Login success");
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert("Login Fail, Please check username or password");
        </script>
        <?php
    }
}
?>