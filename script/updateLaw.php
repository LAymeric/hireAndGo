<?php

    require_once __DIR__."./../class/User.php";

    $updateUser = new USER(null);
    $updateUser->modifyLaw($_POST['id'], $_POST['state']);

    header("Location: ../admin/member.php");
    ?>
