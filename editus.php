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
    <?php
    $q =     "SELECT username FROM users WHERE id = '".$_COOKIE['user']."'";
        $val = mysqli_query($connection,$q);
        $val = mysqli_fetch_assoc($val);
    ?>

    <?php include ("header.php");?>
</head>
<body>
<div class="container">

    <form action="editus.php" method="post">

        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" name="username" value="<?php echo $val['username']?>">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>

</div>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    $check_username = "SELECT * FROM users WHERE username ='".$_POST['username']."'";
    $check_query = mysqli_query($connection,$check_username);
//        $check_query = mysqli_fetch_assoc($check_query);
    $row = mysqli_num_rows($check_query);
//    print_r($row);
//    if($row  != 0)
    if ($row == 0) {

        $query = "UPDATE users SET username='" . $_POST['username'] . "' WHERE id='". $_COOKIE['user']."'";
        $result = mysqli_query($connection, $query);
        if ($result)
           header("Location: dashboard.php");
//            echo "done";
        else
            echo "There is Something Wrong";
    } if($row != 0){
        echo "this username taken by other user";
    }

}
?>