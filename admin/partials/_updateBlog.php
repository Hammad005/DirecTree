<?php
include '_dbconnection.php';

if (isset($_POST['updateBlog'])){
    if (isset($_GET['idnew'])) {
        $idnew = $_GET['idnew'];
    }
    $username = $_POST['username'];
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

    $update = "UPDATE `blogs` SET `username`='$username',`title`='$title',
        `content`='$content' WHERE `id` = '$idnew'";
    $result = mysqli_query($conn, $update);
    if ($result) {
        header("location: ../blogs.php?blogUpdated=true");
        exit;
    } else {
        header("location: ../blogs.php?blogUpdated=false");
        exit;
    }
}
