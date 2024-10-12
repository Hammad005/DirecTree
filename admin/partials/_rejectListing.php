<?php
    include '_dbconnection.php';
    if (isset($_GET['listingId'])){
        $listingId = $_GET['listingId'];
        }
        $sql = "DELETE FROM `listings` WHERE `id` = '$listingId'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("location: ../listing.php?listingRejected=true");
        }else{
            header("location: ../listing.php?listingRejected=false");
        }
?>