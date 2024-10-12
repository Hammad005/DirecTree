<?php
include '_dbconnection.php';
if (isset($_POST['updateAccount'])) {
    $updated = false;
    $updatFaild = false;
    $showUsernameError = false;
    if (isset($_GET['idnew'])) {
        $idnew = $_GET['idnew'];
    }
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT `username` FROM `users` WHERE `username` = '$username' UNION SELECT `username` FROM `adminlogin` WHERE `username` = '$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        $update = "UPDATE `users` SET `email`='$email', `password`='$password' WHERE `id` = '$idnew'";
        $result = mysqli_query($conn, $update);
        if ($result) {
            $showUsernameError = true;
            header('Location: ../manage_account.php?showUsernameError=' . $showUsernameError);
        } else {
            $updatFaild = true;
            header('Location: ../manage_account.php?updateFailed=' . $updateFailed);
        }
    } else {
        $update = "UPDATE `users` SET `username` = '$username', `email`='$email', `password`='$password' WHERE `id` = '$idnew'";
        $result = mysqli_query($conn, $update);
        if ($result) {
            $updated = true;
            header('Location: ../manage_account.php?updated=' . $updated);
        } else {
            $updatFaild = true;
            header('Location: ../manage_account.php?updateFailed=' . $updateFailed);
        }
    }
}
