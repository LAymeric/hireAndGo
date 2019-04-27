<?php
ini_set('display_errors',1);
include "../functions.php";
require_once "../class/Subscrpition.php";

    if (!empty($_POST["name"])
        && !empty($_POST["description"])
        && !empty($_POST["price"])){

        $name = htmlspecialchars($_POST["name"]);
        $description = htmlspecialchars($_POST["description"]);

            $sub = new Subscrpition($name, $description, $_POST['price']);
            $sub->addSubscription();

            header("Location: ../admin/subscription.php");

    } else {
        echo "erreur";
    }
?>
