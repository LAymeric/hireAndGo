<?php
    include "../class/User.php";

    $user = new User($_POST['idUser']);
    $user->addSubscription($_POST['idSubscription']);
?>