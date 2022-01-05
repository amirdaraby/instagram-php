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
<body>
<div class="container">

    <form action="editpass.php" method="post">

        <div class="form-group">
            <label for="Password">Enter Your Password:</label>
            <input type="password" class="form-control" name="pass">
        </div>

        <div class="form-group">
            <label for="Password">New Password:</label>
            <input type="password" class="form-control" name="pwd">
        </div>

        <div class="form-group">
            <label for="Password">Re-Enter New Password</label>
            <input type="password" class="form-control" name="pwd2">
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>

</div>
</body>
</html>
<?php
    if (isset($_POST['submit'])) {
        if ($_POST['pwd'] != $_POST['pwd2'])
            echo "Passwords aren't match ";
        if($_POST['pwd'] == $_POST['pwd2']) {
            $new_password = sha1($_POST['pwd']);
            $old_password = sha1($_POST['pass']);

            $q = "SELECT password FROM users WHERE id = '" . $_COOKIE['user'] . "'";
            $check = mysqli_query($connection, $q);
            $check = mysqli_fetch_assoc($check);
             if ($old_password == $check['password'])
             {
                 $query = "UPDATE users SET password='".$new_password."' WHERE id='".$_COOKIE['user']."'";
                 $result = mysqli_query($connection,$query);
             }

        }

    }
?>