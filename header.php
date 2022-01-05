<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <?php include ("connection.php"); ?>
</head>
<body>

<style>
    .header{
        color: #1b1e21!important;
    }
    .header a{
        color: #1b1e21!important;
    }
    .srch {
        color: #e2e6ea;
        border-color:#0f6674 ;
        background-color: #0f6674;
        transition: 0.5s;
    }
    .srch:hover{
        color: #1b1e21;
        border-color: #e2e6ea;
        background-color: #e2e6ea;
        transition: 0.5s;
    }

</style>

</body>
</html>
<header>

    <div class="container header">


        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">DARAB</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <?php if(isset($_COOKIE['user'])):?>
                    <?php
                        $q = "SELECT username,picture FROM users WHERE id='".$_COOKIE['user']."'";
                        $result = mysqli_query($connection,$q);
                        $user = mysqli_fetch_assoc($result);
                        ?>
                        <img src="<?php echo $user['picture'] ?>" alt="" style="width: 50px ; height: 50px ; border-radius: 20px">
                    <li class="nav-item active">

                        <a class="nav-link" href="dashboard.php"><?php echo $user['username']; ?><span class="sr-only">(current)</span></a>
                    </li>
                    <?php else: ?>

                        <li class="nav-item active">
                            <a class="nav-link" href="account.php">Login<span class="sr-only">(current)</span></a>
                        </li>

                    <?php endif; ?>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php ">Home</a>
                    </li>
<!--                    <li class="nav-item dropdown">-->
<!--                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                            Dropdown-->
<!--                        </a>-->
<!--                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
<!--                            <a class="dropdown-item" href="#">Action</a>-->
<!--                            <a class="dropdown-item" href="#">Another action</a>-->
<!--                            <div class="dropdown-divider"></div>-->
<!--                            <a class="dropdown-item" href="#">Something else here</a>-->
<!--                        </div>-->
<!--                    </li>-->
                    <li class="nav-item">
                        <a class="nav-link " href="newpost.php">New Post</a>
                    </li>
                    <li class="nav-item active">

                        <a class="nav-link" href="myposts.php">My Posts<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn my-2 my-sm-0 srch" type="submit">Search</button>
                </form>
            </div>
    </div>
</header>