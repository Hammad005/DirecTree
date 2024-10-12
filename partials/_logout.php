<?php
    session_name(name: "user-login");
    session_start();
    session_unset();
    session_destroy();
    header('location: ../index.php');
?>