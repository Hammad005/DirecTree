<?php
    include '_dbconnection.php';
    if (isset($_GET['blogId'])){
        $blogId = $_GET['blogId'];
        }
        $sql = "DELETE FROM `blogs` WHERE `id` = '$blogId'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("location: ../blogs.php?blogRejected=true");
        }else{
            header("location: ../blogs.php?blogRejected=false");
        }
?>