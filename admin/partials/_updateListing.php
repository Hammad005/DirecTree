<?php
include '_dbconnection.php';
if (isset($_POST['updateListing'])) {
    if (isset($_GET['idnew'])) {
        $idnew = $_GET['idnew'];
    }
    $username = $_POST['username'];
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
    $folder = '../listing/' . $picture;

    $sql = "SELECT * FROM `listings` WHERE `name` = '$name' AND `listing_cat` = '$listing_cat'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        header("location: ../listing.php?listingExist=true");
    }else{
        if (move_uploaded_file($picture_tmp, $folder)) {
            $update = "UPDATE `listings` SET `username` = '$username', `listing_cat`='$listing_cat', `name`='$name', `desciption`='$desciption', `address`='$address', `location`='$location',
            `open_time`='$open_time',`close_time`='$close_time',`phone`='$phone',`website`='$website',`picture`='$picture',`status`='approved'  WHERE `id` = '$idnew'";
            $result = mysqli_query($conn, $update);
            if ($result) {
                header('Location: ../listing.php?listingUpdated=true');
            } else {

                header('Location: ../listing.php?listingUpdated=false');
            }
        }
        else{
            $update = "UPDATE `listings` SET `username` = '$username', `listing_cat`='$listing_cat',`name`='$name',`desciption`='$desciption', `address`='$address', `location`='$location',
            `open_time`='$open_time',`close_time`='$close_time',`phone`='$phone',`website`='$website',`status`='approved'  WHERE `id` = '$idnew'";
            $result = mysqli_query($conn, $update);
            if ($result) {
                header('Location: ../listing.php?listingUpdated=true');
            } else {
                header('Location: ../listing.php?listingUpdated=false');
            }
        }
    }
}
