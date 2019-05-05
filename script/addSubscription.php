<?php
    include "../class/User.php";

    $user = new User($_GET['idUser']);
    $user->addSubscription($_GET['idSubscription']);
    header("Location: ../profile.php");
?>