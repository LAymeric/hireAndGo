<?php
ini_set('display_errors',1);
include "../functions.php";
require_once "../class/Subcrpition.php";

    if (!empty($_POST["name"])
        && !empty($_POST["description"])
        && !empty($_POST["price"])){

            $price = $_POST["price"]."€";
            $sub = new Subcrpition($_POST["name"], $_POST["description"], $price);
            $sub->addSubscription();

            header("Location: ../admin/subscription.php");

    } else {
        echo "erreur";
    }
?>
