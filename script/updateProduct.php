<?php
    ini_set('display_errors',1);
    require_once "../class/Product.php";

    if (!empty($_POST["name"])
        && !empty($_POST["quantity"])
        && !empty($_POST["price"])) {

        $name = htmlspecialchars($_POST["name"]);

        $extensions_valides = array('jpg', 'jpeg', 'png');
        $extension_upload = strtolower(substr(strrchr($_FILES['picture']['name'], '.'), 1));

        if (!empty($_FILES['picture']['name'])){
            if (in_array($extension_upload, $extensions_valides)) {
                if ($_FILES["picture"]["size"] < 500000) {
                    $nom = "../picture/" . $_FILES["picture"]["name"];
                    $resultat = move_uploaded_file($_FILES['picture']['tmp_name'], $nom);
                    if ($resultat) {
                        echo "c'est bon";
                    } else {
                        echo "Erreur de deplacement de fichier";
                    }
                } else {
                    echo "l'image est trop grande";
                }
            } else {
                echo "L'extension de l'image n'est pas bonne";
            }
        } else {
            $oldProduct = new Product(null,null,null, null);
            $oldProduct->getProduct($_POST['id']);
            $currentPicture = $oldProduct->__get('picture');
        }

        $product = new Product($name, (empty($_FILES["picture"]["name"]))?$currentPicture:$_FILES["picture"]["name"], $_POST['quantity'], $_POST["price"]);
        $product->modifyProduct($_POST["id"]);

        header("Location: ../admin/product.php");
    }
    ?>