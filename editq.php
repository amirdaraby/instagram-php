<?php include ("connection.php") ;
//    setcookie("post", $_POST['postid'], time() + (2 * 30), "/"); // 2min
        $q = "SELECT * FROM `dynamic` WHERE user_id = '".$_COOKIE['user']."'";
        $answer = mysqli_query($connection,$q);
        $rows = mysqli_num_rows($answer);
        if($rows == 0)
        {
            header("Location: myposts.php");
        }
        if($rows > 1)
        {
            $delete = "DELETE FROM `dynamic` WHERE user_id = '".$_COOKIE['user']."'";
            mysqli_query($connection,$delete);

            echo "<div class='container'>";
            echo "error, Try Again"."<br>";
            echo "<a href='myposts.php' style='color: red!important;'>try again</a>";
            echo "</div>";
        }
$frag = false;
        if($rows == 1):


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
<body>
    <div class="container">

        <form action="editq.php" method="post">

            <div class="form-group">
                <label for="sel1"></label>
                <select class="form-control" id="sel1" name="select">
                    <option value="edit" name="edit">Edit</option>
                    <option value="delete" name="delete">Delete</option>

                </select>
                <button class="btn-primary " type="submit" name="submit">Done</button>
            </div>
                <?php
                if(isset($_POST['submit'])) :
                    if (isset($_POST['select']))
                        if($_POST['select'] == 'edit'):
                ?>
                            <form action="editq.php" method="post">
                                <textarea name="new_caption" id="" cols="30" rows="10"></textarea>
                                    <button type="submit" name="edit">edit</button>

                            </form>
                        <?php  endif;

                            if(isset($_POST['select']))
                        if($_POST['select'] == 'delete'):

                            $select = "SELECT * FROM `dynamic` WHERE user_id = '".$_COOKIE['user']."'";
                            $fet = mysqli_query($connection,$select);
                            $fet = mysqli_fetch_assoc($fet);


                            $del = "DELETE FROM posts WHERE id = '".$fet['post_id']."' AND userid = '".$fet['user_id']."'";
                            $res = mysqli_query($connection,$del);
//                            var_dump($res);
//                            die();
                            if($res)
                                header("Location: finaledit.php");

                        endif;endif;endif;
                ?>

        </form>



    </div>

</body>
</html>
<?php

//setcookie("post", $_POST['postid'], time() - 1000, "/");

    if(isset($_POST['edit']))
    {
        if($_POST['select'] == 'edit')
        {
        $new_caption = $_POST['new_caption'];
        if(empty($new_caption))
            $new_caption = "No Caption";

        $select = "SELECT * FROM `dynamic` WHERE user_id = '".$_COOKIE['user']."'";
        $fet = mysqli_query($connection,$select);
        $fet = mysqli_fetch_assoc($fet);



        $q="UPDATE posts SET caption='".$new_caption."' WHERE userid = '".$fet['user_id']."' AND id = '".$fet['post_id']."'";
        $result = mysqli_query($connection,$q);



        if($result)
            $frag = true;
            else
                echo "Failed!";

//        var_dump($_COOKIE['post']);


//       header("Location: dashboard.php");
//       var_dump($_COOKIE['post']);
        }


    }
    if(isset($_POST['edit']))
        if($frag)
            header("Location: finaledit.php");
        else
           echo "there is an error";