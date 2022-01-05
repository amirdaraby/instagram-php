<?php
    if (empty($_GET['postid'])) header("Location: newpost.php");
    include ("connection.php");
    $q = "SELECT users.id,posts.id,users.username,posts.caption FROM users INNER JOIN posts ON posts.userid = users.id WHERE  posts.userid = '".$_COOKIE['user']."' AND posts.id = '".$_GET['postid']."'";
    $let = mysqli_query($connection,$q);
    $let = mysqli_num_rows($let);
    if($let == 1) {

        $query = "INSERT INTO `dynamic` (post_id,user_id) VALUES ('" . $_GET['postid'] . "','" . $_COOKIE['user'] . "')";
        $res = mysqli_query($connection, $query);
        if($res)
            header("Location: editq.php");
        else
            header("Location: myposts.php");
    }else {
        header("Location: myposts.php");
    }