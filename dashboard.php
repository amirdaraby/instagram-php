<?php include ("limit.php");?>
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
</nav>
    <?php
    if(!isset($_COOKIE['user'])) header("Location: account.php");

    $query = "SELECT firstname,lastname,username,email,picture FROM users WHERE id = '".$_COOKIE['user']."'";
    $user = mysqli_query($connection,$query);
    $user = mysqli_fetch_assoc($user);
//    print_r($user);
    ?>
<style>
    .container h1{
        color: #0f6674;
    }
    .container a {
        color: #0f6674!important;
    }
    .profile {
        height: 250px;
        width: 250px;
        border-radius: 200px;
    }
    .delete a{
        color: #b21f2d!important;
    }


</style>
<body>
    <div class="container">

        <h1>DASHBOARD</h1>
        <div class="img">
            <a class="a" href="editpr.php"><img class="profile" src="<?php echo $user ['picture']; ?>" ></a>
        </div>

            <b>Firstname: </b><?php echo $user['firstname']."\n"; ?><a href="editfn.php">edit</a>
        <br>
            <b>Lastname: </b><?php echo $user['lastname']."\n";?><a href="editln.php">edit</a>
        <br>
            <b>Username: </b><?php echo $user['username']."\n"; ?><a href="editus.php">edit</a>
        <br>
            <b>Email: </b><?php echo $user['email']."\n"; ?><a href="editem.php">edit</a>
        <br>
            <a href="editpass.php">Edit Password</a>
        <br>
            <a href="logout.php">Log Out</a>
        <br>
            <div class="delete"> <a href="AreYouSure.php">Delete Account</a> </div>

    </div>

</body>
</html>
