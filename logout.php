<?php 
    session_start();
    session_destroy();
    header('location:features/login/login.php')
?>