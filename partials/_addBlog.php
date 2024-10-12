<?php
include '_dbconnection.php'; 
session_name(name: "user-login");
session_start();
if(isset($_POST['addBlog'])){
    $username = $_SESSION['username'];
    $title = $_POST['title'];
    //Replace < to &lt; for error handling in database
    $title = str_replace("<", "&lt;", $title);
    //Replace > to &gt; for error handling in database
    $title = str_replace(">", "&gt;", $title);
    //Replace ' to &apos; for error handling in database
    $title = str_replace("'", "&apos;", $title);

    $content = $_POST['content'];
    //Replace < to &lt; for error handling in database
    $content = str_replace("<", "&lt;", $content);
    //Replace > to &gt; for error handling in database
    $content = str_replace(">", "&gt;", $content);
    //Replace ' to &apos; for error handling in database
    $content = str_replace("'", "&apos;", $content);

   $sql = "INSERT INTO `blogs` (`username`, `title`, `content`,`status`, `add-time`) VALUES ('$username', '$title', '$content','pending', current_timestamp())";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location: ../blog.php?blogAdded=true");
    } else {
        header("location: ../blog.php?blogAdded=false");
    }
} else {
    header("location: ../blog.php?blogAdded=false");
}
?>