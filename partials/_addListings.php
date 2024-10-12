<?php
include '_dbconnection.php';
session_name(name: "user-login");
session_start();
if (isset($_POST['submitListing'])) {
    $username = $_SESSION['username'];
    $listing_cat = $_POST['listing_cat'];
    $name = $_POST['name'];
    $desciption = $_POST['desciption'];
    $address = $_POST['address'];

    $location = $_POST['location'];
    //Replace < to &lt; for error handling in database
    $location = str_replace("<", "&lt;", $location);
    //Replace > to &gt; for error handling in database
    $location = str_replace(">", "&gt;", $location);
    //Replace ' to &apos; for error handling in database
    $location = str_replace("'", "&apos;", $location);

    $open_time = $_POST['open_time'];
    $close_time = $_POST['close_time'];
    $phone = $_POST['phone'];
    $website = $_POST['website'];

    $picture = $_FILES['picture']['name'];
    $picture_tmp = $_FILES['picture']['tmp_name'];
    $folder = '../admin/listing/' . $picture;

    $sql = "SELECT * FROM `listings` WHERE `name` = '$name' AND `listing_cat` = '$listing_cat'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        header("location: ../listing.php?listingExist=true");
    }else{
        if (move_uploaded_file($picture_tmp, $folder)) {
            $sql = "INSERT INTO `listings` (`username`, `listing_cat`, `name`, `desciption`, `address`, `location`, `open_time`, `close_time`, `phone`, `website`, `picture`, `status`, `add_time`) 
            VALUES ('$username', '$listing_cat', '$name', '$desciption', '$address', '$location', '$open_time', '$close_time', '$phone', '$website', '$picture', 'pending', current_timestamp());";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("location: ../listing.php?listingAdded=true");
            } else {
                header("location: ../listing.php?listingAdded=false");
            }
        }
    }
} else {
    header("location: ../listing.php?listingAdded=false");
}
