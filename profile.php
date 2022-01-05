<?php
    include ("limit.php");

    $query = "SELECT id,firstname,lastname,picture FROM users WHERE username='".$_GET['userid']."'";
    $res = mysqli_query($connection,$query);
    $userp  = mysqli_fetch_assoc($res);
//    $id = $user['firstname'];
//    $id = $

    $q = "SELECT * FROM posts WHERE userid='".$userp['id']."'";
    $res = mysqli_query($connection,$q);
    $rows = mysqli_num_rows($res);

//    var_dump($rows);
//    $posts=mysqli_fetch_assoc($res);
//    var_dump($posts);
//    die();
    //    var_dump($posts);
    
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
<div class="space" style="height: 30px"></div>
    <div class="container">
        <div class="profile row" style="background-color: #b9bbbe;border-radius: 25px;display: inline-block;padding: 20px; text-align: center;width: 100%;" >
            <div><img class="col-6" src="<?= $userp['picture'] ?>" alt="" style="border-radius: 80px"></div>
           <h1 style="text-decoration: none; display: inline-block;background-color:#b9bbbe;border-radius: 10px;width: 500px ; ">@<?= $_GET['userid'] ?></h1>
            <h3>firstname:<b> <?php echo $userp["firstname"]; ?></b></h3>
            <h3>lastname:<b> <?php echo $userp["lastname"]; ?></b></h3>
<!--            <h3>--><?php //echo $userp["firstname"]; ?><!--</h3>-->


        </div>

        <div class="space" style="height: 180px"></div>
        <div class="khat" style="border: solid 1px;"></div>
        <div class="space" style="height: 50px"></div>
        <div class="posts row" style="text-align: center; margin: 0 auto">
            <?php if(!$rows ):
                ?>
                <h1>this user has no posts</h1>
            <?php
            elseif ($rows > 0):
                ?>
         <div>   <h1 class="col-12" style="text-align: center"><?= $_GET['userid'] ?> POSTS</h1></div>
            <?php while($posts = mysqli_fetch_assoc($res)): ?>
            <div class="col-12">
                <p style="font-weight: bold;text-align: right!important;"><?php echo date("m/d/Y",$posts['time']) ;?></p>
            </div>
            <img class="" src="<?= $posts['photo']; ?>" alt="" style="border-radius:50px; max-width: 800px ; max-height: 800px ; margin: 0 auto">
                <p class="col-12" style="display: inline-block ; background-color: #b9bbbe ; border-radius: 30px; padding: 10px; " ><?= $posts['caption'] ?></p>
<!--                <p style="text-align: right!important;">--><?php //echo date("m/d/Y",$posts['time']) ;?><!--</p>-->


            <?php endwhile;endif;?>

        </div>

    </div>

</body>
</html>