<?php
    include'_dbconnection.php';
    if (isset($_GET['messageId'])){
        $messageId = $_GET['messageId'];
        }
        $sql = "DELETE FROM `message` WHERE `id` = '$messageId'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("location: ../messages.php?messageDeleted=true");
        }else{
            header("location: ../messages.php?messageDeleted=false");
        }
?>