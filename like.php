<?php
    include ("connection.php");
    $q = "SELECT * FROM likes WHERE postid = '".$_GET['postid']."' AND userid = '".$_COOKIE['user']."'";
    $res = mysqli_query($connection,$q);
    $res = mysqli_num_rows($res);

    if($res == 0) {

        $query = "INSERT INTO likes (postid,userid)VALUES('" . $_GET['postid'] . "','" . $_COOKIE['user'] . "')";
        $result = mysqli_query($connection, $query);
        header("Location: index.php#".$_GET['id']."");
    }
    else {
        $query = "DELETE FROM likes WHERE postid='".$_GET['postid']."' AND userid = '".$_COOKIE['user']."'";
        $result = mysqli_query($connection,$query);
        header("Location: index.php#".$_GET['id']."");
    }