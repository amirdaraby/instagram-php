
<?php
    include ("limit.php");


    if(!isset($_COOKIE['user'])) header("Location: index.php");
    else{
        $id = $_COOKIE['user'];

        $q = "SELECT id FROM users WHERE id='".$_COOKIE['user']."'";
        $result = mysqli_query($connection,$q);
        $user = mysqli_fetch_assoc($result);
        $now = time();
        setcookie("user",$user['id'],$now -10,"/");

        $query = "DELETE FROM users WHERE id='".$id."'";
        $res = "DELETE FROM posts WHERE id='".$id."'";
         $result = mysqli_query($connection,$query);
            if($result)
            {
                header("Location: index.php");
                echo "Account Deleted ";

            }
            else {
                "Account is Not Deleted";
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
</head>
<?php include ("header.php")?>
<body>

</body>
</html>
