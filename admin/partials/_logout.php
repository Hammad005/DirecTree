<?php
    session_name("admin-login");
    session_start();
    session_unset();
    session_destroy();
    header('location: ../index.php');
    exit;
?>