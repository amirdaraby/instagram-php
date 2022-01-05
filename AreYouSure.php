<?php

        if(!isset($_COOKIE['user'])) header("Location: account.php");
        include ("limit.php");

                    if(isset($_POST['no']))
                    {
                        header("Location: dashboard.php");
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
<style>
    .space {
        height: 300px;
    }
    .container{
        text-align: center;
    }
</style>
<?php include ("header.php")?>
<body>
<div class="space">

</div>
    <div class="container">

        <h1>Are You Sure to Delete Your Account ?(You Can't undo This Action)</h1>
        <form action="AreYouSure.php" method="post">
            <button type="submit" class="btn btn-danger" name="yes" ><a href="deleteacc.php">Yes</a></button>
            <button type="submit" class="btn btn-success" name="no">No</button>
        </form>


    </div>
</body>
</html>
<?php
