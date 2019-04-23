<?php require 'header.php'; ?>

<?php $products = $DB->query('SELECT * FROM products'); ?>

<a href="panier.php">Panier</a>

<div class="container">
    <?php foreach ( $products as $product ): ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Prix Hors Taxe</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><img src="img/<?php echo $product->id; ?>.jpg" width="100px"><?php echo $product->name; ?></td>
                <td><?= number_format($product->price,2,',',' '); ?> €</td>
                <td>
                    <button type="button" class="btn">
                        <a class="add addPanier" href="addpanier.php?id=<?php echo $product->id; ?>">Ajouter au panier</a>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
    <?php endforeach ?>
</div>

<?php include 'footer.php' ?>




