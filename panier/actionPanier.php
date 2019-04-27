<?php

require_once '../class/Panier.php';

session_start();

if($_POST['action'] == 'add')
{
    $rar = unserialize($_SESSION['Panier']);
    $rar->addItem($_POST['name'],$_POST['price'],$_POST['quantity'],$_POST['id']);
    $_SESSION['Panier'] = serialize($rar);
}

if($_POST['action'] == 'del')
{
    $rar = unserialize($_SESSION['Panier']);
    $rar->delItem($_POST['id']);
    $_SESSION['Panier'] = serialize($rar);
}

if($_POST['action'] == 'delAll')
{
    $rar = unserialize($_SESSION['Panier']);
    $rar->deleteAll($_POST['id']);
    $_SESSION['Panier'] = serialize($rar);
}

if($_POST['action'] == 'upd')
{
    $rar = unserialize($_SESSION['Panier']);
    $rar->updateItem($_POST['quantity'],$_POST['id']);
    $_SESSION['Panier'] = serialize($rar);
}


