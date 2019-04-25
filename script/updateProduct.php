<?php
    ini_set('display_errors',1);
    require_once "../class/Product.php";

    if (!empty($_POST["name"])
        && !empty($_POST["quantity"])
        && !empty($_POST["price"])) {

        var_dump($_FILES);

        $extensions_valides = array('jpg', 'jpeg', 'png');
        $extension_upload = strtolower(substr(strrchr($_FILES['picture']['name'], '.'), 1));

        if (in_array($extension_upload, $extensions_valides)) {
            if ($_FILES["picture"]["size"] < 500000) {
                $nom = "../picture/" . $_FILES["picture"]["name"];
                $resultat = move_uploaded_file($_FILES['picture']['tmp_name'], $nom);
                if ($resultat) {
                    $product = new Product($_POST["name"], $_FILES["picture"]["name"], $_POST['quantity'], $_POST["price"]);
                    $product->modifyProduct($_POST["id"]);
                } else {
                    echo "Erreur de deplacement de fichier";
                }
            } else {
                echo "l'image est trop grande";
            }
        } else {
            echo "L'extension de l'image n'est pas bonne";
        }

        header("Location: ../admin/product.php");
    }
    ?>