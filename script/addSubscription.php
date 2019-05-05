<?php
    include "../class/User.php";

    $user = new User($_GET['idUser']);
    $user->addSubscription($_GET['idSubscription']);
    $user->setIsPremium(true);
    header("Location: ../profile.php");
?>