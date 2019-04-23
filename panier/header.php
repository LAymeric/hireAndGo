<?php
require '_header.php'
?><!DOCTYPE html>
<html>
<head>
	<title>panier</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/css.css" type="text/css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</head>

<body>

<div class="row">
    <div class="col-8">Nombre de produit : <span id="count"><?php echo $panier->count(); ?></span></div>
    <div class="col-8">Total : <span><span id="total"><?php echo number_format($panier->total()*1.196,2,',',' '); ?></span> €</span></div>
</div>
