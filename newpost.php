<?php
include ("connection.php");
    if(!isset($_COOKIE['user'])) header("Location: account.php");

if(isset($_POST['submit'])) {

//    var_dump($_FILES['picture']['size']);
//    echo '<br>';
//    var_dump($_POST['picture']);
    if (($_FILES['picture']['size'] > 0)) {
        $target_dir = "posts/";
        $target_file = $target_dir . uniqid() . time() * rand(rand(1, 999999999), rand(999999999, time())) . basename($_FILES["picture"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

            $check = getimagesize($_FILES["picture"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }


// Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

// Check file size
        if ($_FILES["picture"]["size"] > 500000) {
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
        if($uploadOk)
        {
            if(empty($_POST['caption'])) $_POST['caption'] = "No Caption";
            $now = time();
//            $id  = time(rand(),)
            $connectpost = mysqli_connect("localhost","root","","darab2");
            $query       = "INSERT INTO posts (userid,photo,caption,time)VALUES('".$_COOKIE['user']."','".$target_file."','".$_POST['caption']."','".$now."')";

            $result = mysqli_query($connectpost,$query);

            if($result)
                header("Location: myposts.php");
            if(!$result)
                echo "error";
        }


    }else{
        echo "you must upload a photo to post in DARAB.";
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
<body>

    <div class="container">
        <form action="newpost.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="Photo">Profile Photo: </label>
            <input type="file" class="form-control" name="picture" id="picture">
        </div>


        <div class="form-group">
            <label for="firstname">Caption: </label>
            <textarea class="form-control" name="caption" id="caption" cols="30" rows="10"></textarea>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Post</button>

           </form>
    </div>



</body>
</html>
