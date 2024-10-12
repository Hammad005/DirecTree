<?php
    include'_dbconnection.php';
    if (isset($_GET['userId'])){
        $userId = $_GET['userId'];
        }
        $sql = "DELETE FROM `users` WHERE `id` = '$userId'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("location: ../registered_users.php?deleted=true");
        }else{
            header("location: ../registered_users.php?deleted=false");
        }
?>