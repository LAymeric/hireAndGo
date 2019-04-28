<?php

    require_once __DIR__."./../class/User.php";

    $updateUser = new USER(null);
    $updateUser->modifyRigths($_POST['id'], $_POST['type']);

    header("Location: ../admin/member.php");
    ?>
