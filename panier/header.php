<?php
require '_header.php'
?><!DOCTYPE html>
<html>
<head>
	<title>panier</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" charset="utf-8">
</head>

<body>

<div id="header">
	<div class="wrap">
		<div class="menu">
				<ul class="panier">
					<li class="caddie"><a href="panier.php">Panier</a></li>
					<li class="items"><a href="index.php">Produits</a></li>
					<li class="items">
						ITEMS
						<span id="count"><?= $panier->count(); ?></span>
					</li>
					<li class="total">
						TOTAL
						<span><span id="total"><?= number_format($panier->total(),2,',',' '); ?></span> €</span>
					</li>
				</ul>
		</div>
	</div>
</div>

<div id="subheader">

</div>

<!-- -->
<div id="wrap">

	<div id="main" class="clearfix">
