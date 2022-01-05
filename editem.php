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
    <?php include ('connection.php') ;
    $q = "SELECT email FROM users WHERE id = '".$_COOKIE['user']."'";
    $val = mysqli_query($connection,$q);
    $val = mysqli_fetch_assoc($val);
    ?>

    <?php include ("header.php");?>
</head>
<body>
<div class="container">

    <form action="editem.php" method="post">

        <div class="form-group">
            <label for="Email">Email:</label>
            <input type="text" class="form-control" name="email" value="<?php echo $val['email'] ?>">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>

</div>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    $check_email = "SELECT * FROM users WHERE email ='".$_POST['email']."'";
    $check_query = mysqli_query($connection,$check_email);
//        $check_query = mysqli_fetch_assoc($check_query);
    $row = mysqli_num_rows($check_query);
//    print_r($row);
//    if($row  != 0)
    if ($row == 0) {

        $query = "UPDATE users SET email='" . $_POST['email'] . "' WHERE id='". $_COOKIE['user']."'";
        $result = mysqli_query($connection, $query);
        if ($result)
            header("Location: dashboard.php");
//            echo "done";
        else
            echo "There is Something Wrong";
    } if($row != 0){
        echo "this email taken by other user";
    }

}
?>