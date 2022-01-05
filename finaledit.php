<?php
include ("connection.php");
$select = "SELECT * FROM `dynamic` WHERE user_id = '".$_COOKIE['user']."'";
$fet = mysqli_query($connection,$select);
$fet = mysqli_fetch_assoc($fet);


$deleter = "DELETE FROM `dynamic` WHERE user_id = '".$fet['user_id']."'";
mysqli_query($connection,$deleter);
header("Location: myposts.php");
