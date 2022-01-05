<?php
include ("limit.php");
    if(!isset($_COOKIE['user'])) header("Location: account.php");

    $q = "SELECT username FROM users WHERE id='".$_COOKIE['user']."'";
    $result = mysqli_query($connection,$q);
    $user = mysqli_fetch_assoc($result);


    $select     = "SELECT id,photo,caption,time FROM posts WHERE userid='".$_COOKIE['user']."' ORDER BY id DESC";
    $res = mysqli_query($connection,$select);

    $ros = mysqli_num_rows($res);


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
<?php  include ("header.php");?>
<body>
<style>
    .container{
        text-align: center;
    }
</style>
<div class="space" style="height: 50px;">

</div>
<div class="container">
            <h1><b><?php echo $user['username'] ;?></b>  POSTS</h1>
    <div class="space" style="height: 115px;">
    </div>

         <?php
         if($ros > 0)
         while($post =  mysqli_fetch_assoc($res)): ?>
            <div class="posts" style="background-color: #adb5bd" >

                <p class="user"><?php echo $user['username'] ;?></p>
                <img src="<?php echo $post['photo']; ?>" alt="" style="max-width: 800px ; max-height: 800px" >
                <p class="cap" style="background-color: #e2e6ea ; text-align: left; width: auto;height: auto; padding: 10px; border-radius: 10px"><?php echo $post['caption'] ;?></p>
                <p style="text-align: right"><?php echo date("m/d/Y - H:i",$post['time']) ?></p>
                <a style="color: black!important;" href="setit.php?postid=<?=$post['id']; ?>">Edit</a>
                <p class="line" style="border: solid 1px ; border-color: #0f6674;"></p>

            </div>
             <div class="space" style="height: 180px"></div>
            <?php endwhile;
            if($ros <= 0):
            ?>
            <h3>You Didnt have post</h3>
    <a href="newpost.php" style="color: #0f6674!important;">Share a new post</a>
    <?php
        endif;
    ?>
    </div>




</body>
</html>