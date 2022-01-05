<?php include ("limit.php");
//        $query = "SELECT username FROM users "
        $q = "SELECT users.id,users.picture,users.username,posts.id,posts.userid,posts.photo,posts.caption,posts.time FROM posts INNER JOIN users ON users.id = posts.userid ORDER BY posts.id DESC";

//        $res = mysqli_query($connection,$q);
//        $res = mysqli_fetch_assoc($res);
//        var_dump($res);
////        die();
//        var_dump($q);
////        die();
        $res = mysqli_query($connection,$q);
//        $query = "SELECT * FROM likes WHERE userid = '".$_COOKIE['user']."'"
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
        height: 200px;
    }
    .welcome h1 {
        text-align: center;
    }
    .welcome h1 strong {
        font-weight: bolder;
        color : #0f6674;
    }
    .enter a {
        display: flex;
        justify-content: center;
        align-items: center;
    }



</style>
<?php include ("header.php");?>
<body>
<div class="space">
</div>
<div class="container">
    <h1 style="text-align: center">Home Page</h1>

    <?php $i = 0; while($posts = mysqli_fetch_assoc($res)): ?>
        <div id="p<?=$i; ?>" class="posts" style="text-align: center">
<!--                <form action="profile.php" method="">-->
                    <div><a style="color: black!important;" href="profile.php?userid=<?= $posts['username']; ?>"><?= $posts['username']; ?></a></div>

                    <img style=" max-width: 800px ; max-height: 800px" src="<?php echo $posts['photo'] ?>" alt="">
<!--                    <img src="--><?php //$posts['photo'] ?><!--" alt="">-->
                    <div><p style="margin-top: 10px;background-color: #b9bbbe;display: inline-block ; border-radius: 20px;padding: 10px"><?php echo $posts['caption']?></p></div>
                    <div class="status-comment">
                        <p><?php

                            $sts = "SELECT * FROM comments WHERE postid = '".$posts['id']."'";
                            $rslt = mysqli_query($connection,$sts);
                            $rslt = mysqli_num_rows($rslt);

                            echo $rslt;
                            ?> Comments</p>

                    </div>
                    <div class="status-like">
                        <p>
                            <?php

                            $stats = "SELECT * FROM likes WHERE postid = '".$posts['id']."'";
                            $reslt = mysqli_query($connection,$stats);
//                            var_dump($reslt);
//                            die();
                            $reslt = mysqli_num_rows($reslt);

                            echo $reslt;


                            ?>
                            Likes
                        </p>

                    </div>
                    <div class="like-comment">
                        <?php
                    if(isset($_COOKIE['user'])):

                        $que = "SELECT * FROM likes WHERE postid='".$posts['id']."' AND userid='".$_COOKIE['user']."'";
                        $ans = mysqli_query($connection,$que);
                        $ruw = mysqli_num_rows($ans);


                        ?>
                        <a class="<?php if($ruw == 0) echo "btn btn-primary"; else echo "btn btn-danger"; ?>" href="like.php?postid=<?= $posts['id']; ?>&id=p<?= $i; ?>" style="color: white!important; padding: 3px">
                            <?php
                            if($ruw == 0)
                                echo "Like";
                            else
                                echo "Dislike";
                           endif; ?></a>
                        <form id="c<?=$i; ?>" action="index.php<?="#p".$i;?>" method="get">
                            <button id="comment<?= $i; ?>" type="submit" class="btn btn-primary" name="com<?= $i;?>" style="padding: 3px">Comments</button>
                        </form>
                        <?php
                        if(isset($_GET['com'.$i])) :
                            $comments = "SELECT comments.comment, users.username FROM users INNER JOIN comments ON users.id = comments.userid WHERE postid = '" . $posts['id'] . "'";
                            $comments_res = mysqli_query($connection, $comments);
                            $comments_row = mysqli_num_rows($comments_res);
                            //                            var_dump(mysqli_fetch_assoc($comments_res));
                            while($comments_fet = mysqli_fetch_assoc($comments_res)):

?>
                        <div class="comment_p">
                            <a style="color: black!important;" href="profile.php?userid=<?= $comments_fet['username']; ?>"><?= $comments_fet['username']; ?></a>

                            <p><?= $comments_fet['comment'] ?></p>
                        </div>

                        <?php endwhile; if(isset($_COOKIE['user'])): ?>
                            <form id="com" action="index.php<?="#p".$i?>" method="POST">
                                <div class="form-group">
                                    <input type="hidden" name="post_id" value="<?= $posts['id']; ?>">
                                    <label for="comment"></label>
                                    <input type="text" name="desc">
                                    <button name="comm" type="submit" class="btn-primary">Comment</button>
                                </div>
                                </form>
                        <?php
                                endif;
                            ?>
                      <script>  document.getElementById("comment<?= $i; ?>").disabled = true; </script>
<!--                        <a class="btn btn-primary" href="comment.php" style="color: white!important;border: solid 1px; padding: 3px"> Comments</a>-->
                        <?php  endif; ?>
                    </div>
                    <p><?php
                        $now = date("m/d/Y");
                        $post = date("m/d/Y",$posts['time']);
                        if($now == $post)
                        echo "Posted: <b>Today at ".date("H:i",$posts['time'])."</b>";

                        else
                            echo "Posted: "."<b>".$post."</b>";
                            $i++;
                            ?></p>
                    <div class="khat" style="border: solid 1px;"></div>
                    <div class="space" style="height: 250px"></div>
<!--                </form>-->
        </div>
<?php endwhile; ?>
    <?php
    if(isset($_POST['comm'])) {
        $cm = $_POST['desc'];

        $comment = "INSERT INTO `comments` (postid,userid,comment)VALUES('" . $_POST['post_id'] . "','" . $_COOKIE['user'] . "','" . $cm . "')";
        $comment_c = mysqli_query($connection, $comment);
        if ($comment_c){

            unset($_POST['comm']);

        }

        //                            }
    }

    ?>

</div>

</body>
</html>

</body>
</html>
