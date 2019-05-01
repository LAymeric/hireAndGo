<?php
/**
 * Created by IntelliJ IDEA.
 * User: Aymeric
 * Date: 29/04/2019
 * Time: 14:36
 */

require_once '../class/Cart.php';

session_start();

if($_POST['action'] == 'add')
{
    $rar = unserialize($_SESSION['front_panier']);
    $rar->addItem($_POST['name'],$_POST['price'],$_POST['quantity'],$_POST['id']);
    $_SESSION['front_panier'] = serialize($rar);
}

if($_POST['action'] == 'del')
{
    $rar = unserialize($_SESSION['front_panier']);
    $rar->delItem($_POST['id']);
    $_SESSION['front_panier'] = serialize($rar);
}

if($_POST['action'] == 'delAll')
{
    $rar = unserialize($_SESSION['front_panier']);
    $rar->deleteAll($_POST['id']);
    $_SESSION['front_panier'] = serialize($rar);
}

if($_POST['action'] == 'upd')
{
    $rar = unserialize($_SESSION['front_panier']);
    $rar->updateItem($_POST['quantity'],$_POST['id']);
    $_SESSION['front_panier'] = serialize($rar);
}


