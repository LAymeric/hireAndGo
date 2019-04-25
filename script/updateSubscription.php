<?php
    ini_set('display_errors',1);
    require_once "../class/Subcrpition.php";

    if (!empty($_POST["name"])
        && !empty($_POST["description"])
        && !empty($_POST["price"])) {


        $name = htmlspecialchars($_POST['name']);
        $description = htmlspecialchars($_POST['description']);
        $price = htmlspecialchars($_POST["price"] . "€");


        $sub = new Subcrpition($name, $description, $price);
        $sub->modifySubscription($_POST['id']);

        header("Location: ../admin/subscription.php");
    } else {
        //code erreur
        header("Location: ".$_SERVER["HTTP_REFERER"]);
    }
?>
