<?php
    include ("limit.php");
if (isset($_COOKIE['user'])) header("Location: dashboard.php");
if(isset($_POST['sub']))
{

    $query = "SELECT * FROM users WHERE (username = '".$_POST['username']."'OR email = '".$_POST['username']."') AND password=('".sha1($_POST['pwd'])."')";
    $info = mysqli_query($connection,$query);
    $user = mysqli_fetch_assoc($info);
    $rows = mysqli_num_rows($info);

    if ($rows == 1)
    {
        $now = time();
        setcookie("user",$user['id'],$now + 60*60*24 ,"/");
        header("Location: index.php");
    }
    if($rows == 0)
    {
        echo "Username(email) Or Password is Invalid" ;

    }
    if ($rows > 1)
    {
        echo "Server Error";
    }

}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">

</head>
    <?php include ("header.php");?>
<style>
    .space{
        width: auto;
        height: 50px;
    }

</style>
<body>



<div class="space">

</div>

<div class="container">


    <form action="login.php" method="post">


        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" name="pwd">
        </div>


        <button type="submit" class="btn btn-primary" name="sub">Login</button>
    </form>

</div>

</body>
</html>



























