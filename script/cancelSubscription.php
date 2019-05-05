<?php
    include "../class/User.php";

    $user = new User($_POST['idUser']);
    $user->cancelSubscription($_POST['idSubscription']);
?>