<?php
    include '_dbconnection.php';
    if (isset($_GET['listingId'])){
        $listingId = $_GET['listingId'];
        }
        $sql = "DELETE FROM `listing` WHERE `id` = '$listingId'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("location: ../listing.php?listingDeleted=true");
        }else{
            header("location: ../listing.php?listingDeleted=false");
        }
?>