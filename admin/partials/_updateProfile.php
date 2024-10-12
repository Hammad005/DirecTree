<?php
include '_dbconnection.php';
if (isset($_POST['updateAdmin'])) {
    $updated = false;
    $updatFaild = false;
    if (isset($_GET['idnew'])) {
        $idnew = $_GET['idnew'];
    }
    $profile_pic=$_FILES['profile_pic']['name'];
    $profile_pic_tmp=$_FILES['profile_pic']['tmp_name'];
    $folder='../img/'.$profile_pic; 
    $username = $_POST['username'];
    $email = $_POST['email'];
    $location = $_POST['location'];
    $password = $_POST['password'];
    if (move_uploaded_file($profile_pic_tmp, $folder)) {
        $update = "UPDATE `adminlogin` SET `profile_pic` = '$profile_pic', `username`='$username',`email`='$email',
        `location`='$location',`password`='$password' WHERE `id` = '$idnew'";
        $result = mysqli_query($conn, $update);
        if ($result) {
            $updated = true;
            header('Location: ../my_profile.php?updated=' . $updated . '&destroySession=true');
        } else {
            $updatFaild = true;
            header('Location: ../my_profile.php?updateFailed=' . $updateFailed . '&destroySession = true');
        }
    }
    else{
        $update = "UPDATE `adminlogin` SET `username`='$username',`email`='$email',
        `location`='$location',`password`='$password' WHERE `id` = '$idnew'";
        $result = mysqli_query($conn, $update);
        if ($result) {
            $updated = true;
            header('Location: ../my_profile.php?updated=' . $updated . '&destroySession=true');
        } else {
            $updatFaild = true;
            header('Location: ../my_profile.php?updateFailed=' . $updateFailed . '&destroySession = true');
        }
    }
}
