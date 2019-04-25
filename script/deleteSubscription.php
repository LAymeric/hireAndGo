<?php
    include "../class/Subcrpition.php";

    $subs = new Subcrpition(null, null,null);
    $subs->deleteSubscription($_GET['id']);

    header("Location: ../admin/subscription.php");
?>