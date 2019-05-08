<?php
/**
 * Created by IntelliJ IDEA.
 * User: Aymeric
 * Date: 06/03/2019
 * Time: 12:25
 */

  session_start();
$_SESSION["front_id"] = null;
$_SESSION["front_type"] = null;
$_SESSION["front_panier"] = null;
$_SESSION["front_isPremium"] = false;
$_SESSION["front_email"] = null;
$_SESSION["front_auth"] = null;
  header("Location: index.php");