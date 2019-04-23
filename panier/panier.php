<?php require 'header.php'; ?>

<form method="post" action="panier.php">


    <a href="index.php">Produits</a>

    <div class="container">
        <?php
        $ids = array_keys($_SESSION['panier']);
        if(empty($ids)){
            $products = array();
        }else{
            $products = $DB->query('SELECT * FROM products WHERE id IN ('.implode(',',$ids).')');
        }
        foreach($products as $product):
            ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Prix TTC</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img src="img/<?php echo $product->id; ?>.jpg" height="53"> <a class="titre" <?php echo $product->name; ?>></a></td>
                    <td><?php echo number_format($product->price,2,',',' '); ?> €</td>
                    <td><input type="number" min="0"max="1000" name="panier[quantity][<?php echo $product->id; ?>]" value="<?= $_SESSION['panier'][$product->id]; ?>"></td>
                    <td><?php echo number_format($product->price * 1.196,2,',',' '); ?> €</td>
                    <td><span class="action"><a href="panier.php?delPanier=<?= $product->id; ?>" class="del"><img src="img/del.png">  Supprimer</a></span></td>
                </tr>
            </tbody>
        </table>
        <?php endforeach; ?>
    </div>

    <div>
        Total : <span class="total"><?= number_format($panier->total() * 1.196,2,',',' '); ?> € </span>
    </div>
    <input type="submit" value="Recalculer">

<?php include "footer.php"; ?>