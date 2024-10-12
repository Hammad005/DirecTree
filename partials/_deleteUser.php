<?php
    include'_dbconnection.php';
    if (isset($_GET['userId'])){
        $userId = $_GET['userId'];
        }
        $sql = "DELETE FROM `users` WHERE `id` = '$userId'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            session_name(name: "user-login");
            session_start();
            session_unset();
            session_destroy();
            header("location: ../index.php?deleted=true");
        }else{
            header("location: ../index.php?deleted=false");
        }
?>