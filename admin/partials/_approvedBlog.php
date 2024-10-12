<?php
include '_dbconnection.php';
if (isset($_GET['blogId'])) {
    $idnew = $_GET['blogId'];
}
$update = "UPDATE `blogs` SET `status` = 'approved' WHERE `id` = $idnew";
$result = mysqli_query($conn, $update);
if ($result) {
    header("location: ../blogs.php?blogApproved=true");
    exit;
} else {
    header("location: ../blogs.php?blogApproved=false");
    exit;
}
