<?php
include '_dbconnection.php';
if (isset($_POST['addUser'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];

    $sql = "SELECT *FROM `users` WHERE `username` = '$username'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        header('location: ../registered_users.php?usernameTakken=true');
    }else{
        if ($password === $c_password) {
            $sql ="INSERT INTO `users` (`username`, `email`, `password`, `add-time`) VALUES 
             ('$username', '$email', '$password', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header('location: ../registered_users.php?userAdded=true');
            }else{
                header('location: ../registered_users.php?userAdded=false');
            }
        }else{
            header('location: ../registered_users.php?passwordNotMatch=true');
        }
    }

}
?>