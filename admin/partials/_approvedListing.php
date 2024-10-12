<?php
include '_dbconnection.php';
if (isset($_GET['listingId'])) {
    $idnew = $_GET['listingId'];
}
$update = "UPDATE `listings` SET `status` = 'approved' WHERE `id` = $idnew";
$result = mysqli_query($conn, $update);
if ($result) {
    header("location: ../listing.php?listingApproved=true");
    exit;
} else {
    header("location: ../listing.php?listingApproved=false");
    exit;
}
