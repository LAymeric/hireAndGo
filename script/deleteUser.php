<?php
    require_once __DIR__."./../class/User.php";

    $user = new USER(null);
    $user->deleteUser($_GET['id']);

    header("Location: ../admin/member.php");

    ?>