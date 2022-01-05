<?php
    include ("limit.php");
    $q = "SELECT id FROM users WHERE id='".$_COOKIE['user']."'";
    $result = mysqli_query($connection,$q);
    $user = mysqli_fetch_assoc($result);
    $now = time();
    setcookie("user",$user['id'],$now -10,"/");

//    unset($_COOKIE['user']);
    header("Location: index.php");
