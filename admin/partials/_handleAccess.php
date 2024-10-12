<?php
include '_dbconnection.php';
$accessDenied = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `adminlogin` WHERE  `username`='$username' AND `password`='$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        session_name('access');
        session_start();
        $_SESSION['access-loggedin'] = true;
        header('location: ../manage_profile.php');
    } else {
        header('Location: ../home.php?accessDenied=' . $accessDenied = true);
    }
}
