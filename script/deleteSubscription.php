<?php
    include "../class/Subscrpition.php";

    $subs = new Subscrpition(null, null,null);
    $subs->deleteSubscription($_GET['id']);

    header("Location: ../admin/subscription.php");
?>