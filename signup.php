<?php
if (isset($_COOKIE['user'])) header("Location: dashboard.php");
include('limit.php');
    $target_file = "uploads/default.png";

    $errors = [];
    if (isset($_POST['submit'])) {

        if($_FILES['picture']['size'] > 1)
        {

            $target_dir = "uploads/";
            $target_file = $target_dir .uniqid().time()*rand(rand(1,999999999),rand(999999999,time())).basename($_FILES["picture"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["picture"]["tmp_name"]);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }

// Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

// Check file size
            if ($_FILES["picture"]["size"] > 20000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

// Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

// Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
                    echo "The file " . htmlspecialchars(basename($_FILES["picture"]["name"])) . " has been uploaded.";

                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }



        }
//        else{
//            $target_file = "uploads/default.png";
//        }
        if (empty($_POST['firstname']) && empty($_POST['lastname']))
            array_push($errors, "Enter Firstname or Lastname at least .");

        if (strlen($_POST['email']) < 3 || strpos($_POST['email'], " ") > 0)
            array_push($errors, "enter a valid email .");

        if(empty($_POST['username']))
            array_push($errors,"please enter an username .");

        if ($_POST['pwd'] < 5)
            array_push($errors, "password is too short .");

        if ($_POST['pwd'] != $_POST['pwd2'])
            array_push($errors, "passwords aren't match .");

        if (empty($_POST['school']))
            array_push($errors, "please fill the school field .");

        $check_username = "SELECT * FROM users WHERE username ='".$_POST['username']."'";
        $check_query = mysqli_query($connection,$check_username);
//        $check_query = mysqli_fetch_assoc($check_query);
        $check_query = mysqli_num_rows($check_query);
        print_r($check_query);

        if ($check_query != 0)
            array_push($errors, "This Username is taken by other User .");


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
        width: auto;
        height: 50px;
    }
</style>

<body>
<div class="space">

</div>
<div class="container">

    <form action="signup.php" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="Photo">Profile Photo: </label>
            <input type="file" class="form-control" name="picture" id="picture">
        </div>

        <div class="form-group">
            <label for="firstname">Firstname: </label>
            <input type="text" class="form-control" name="firstname" >
        </div>


        <div class="form-group">
            <label for="lastname">lastname:  </label>
            <input type="text" class="form-control" name="lastname">
        </div>


        <div class="form-group">
            <label for="username">username:  </label>
            <input type="text" class="form-control" name="username">
        </div>

        <div class="form-group">
            <label for="email">email: </label>
            <input type="email" class="form-control" name="email">
        </div>

        <div class="form-group">
            <label for="pwd">Password: </label>
            <input type="password" class="form-control" name="pwd">
        </div>

        <div class="form-group">
            <label for="pwd">Repeat Password: </label>
            <input type="password" class="form-control" name="pwd2">
        </div>

        <div class="form-group">
            <label for="school">Whats Your First School Name? </label>
            <input type="text" class="form-control" name="school" required>
        </div>


        <button type="submit" class="btn btn-success" name="submit">Sign up</button>
    </form>

    <ul>
        <?php
            if(isset($_POST['submit'])) {
                if (sizeof($errors) > 0) {
                    for ($i = 0; $i < sizeof($errors); $i++)
                        echo "<li>" . $errors[$i] . "</li>";
                }
                else {
                    $password = sha1($_POST['pwd']);
                    $query = "INSERT INTO users (firstname,lastname,username,email,password,school,picture) VALUES ('" . $_POST['firstname'] . "','" . $_POST['lastname'] . "','" . $_POST['username'] . "','" . $_POST['email'] . "','" . $password . "','" . $_POST['school'] . "','".$target_file."')";
                    $result = mysqli_query($connection, $query);
//                    echo $target_file;
//                    var_dump($result);
                    if ($result) {
//                        $q = "SELECT id FROM users WHERE username= '".$_POST['username']."'";
//                        $res = mysqli_query($connection,$q);
//                        $res = mysqli_fetch_assoc($res);
//                        print_r($res);
//                        setcookie("user",)
                        header("Location: login.php");

                    }
                        else
                        print_r($errors);

                }
            }
        ?>
    </ul>


</div>
</body>
</html>
