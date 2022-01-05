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
    <?php include ('connection.php');
        $q = "SELECT lastname FROM users WHERE id = '".$_COOKIE['user']."'";
        $val = mysqli_query($connection,$q);
        $val = mysqli_fetch_assoc($val);
    ?>

    <?php include ("header.php");?>
</head>
<body>
    <div class="container">

        <form action="editln.php" method="post">

            <div class="form-group">
                <label for="lastname">Lastname:</label>
                <input type="text" class="form-control" name="lastname" value="<?php echo $val['lastname'] ;?>">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>

    </div>
</body>
</html>
<?php
    if (isset($_POST['submit'])) {
        $query = "UPDATE users SET lastname='" . $_POST['lastname'] . "' WHERE id='" . $_COOKIE['user'] . "'";
        $result = mysqli_query($connection, $query);
        if ($result)
            header("Location: dashboard.php");
        else
            echo "There is Something Wrong";
    }
    ?>