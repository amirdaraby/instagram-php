<?php
    include ("connection.php");

    if(isset($_COOKIE['user'])) {
        $quer = "SELECT * FROM `dynamic` WHERE user_id = '" . $_COOKIE['user'] . "'";
        $result2 = mysqli_query($connection, $quer);
        $result2 = mysqli_num_rows($result2);

        if ($result2 != 0) {
            $quer = "DELETE FROM `dynamic` WHERE user_id = '" . $_COOKIE['user'] . "'";
            $deel = mysqli_query($connection, $quer);

        }
    }