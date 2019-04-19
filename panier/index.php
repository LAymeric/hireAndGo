<?php require 'header.php'; ?>

<div class="home">
	<div class="row">
		<div class="wrap">
			<?php $products = $DB->query('SELECT * FROM products'); ?>
			<?php foreach ( $products as $product ): ?>
				<div class="box">
					<div class="product full">
						<a href="#">
							<img src="img/<?= $product->id; ?>.jpg" width="100px">
						</a>
						<div class="description">
							<?= $product->name; ?>
							<a class="price"><?= number_format($product->price,2,',',' '); ?> €</a>
						</div>
						<a class="add addPanier" href="addpanier.php?id=<?= $product->id; ?>">
							add
						</a>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</div>



<?php require 'footer.php'; ?>