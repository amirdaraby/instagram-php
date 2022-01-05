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

    <div class="welcome">
        <h1>
            WELCOME TO <strong>DARAB</strong>
        </h1>
    </div>

    <div class="enter">
        <p></p>
        <a class="btn btn-dark" href="login.php">LOGIN</a>
        <a class="btn btn-primary" href="signup.php">SIGN UP</a>
    </div>


</div>




</body>
</html>

</body>
</html>
