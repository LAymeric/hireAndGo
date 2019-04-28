<?php
require "dbConst.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Connection to database
function connectDB(){

  $dsn = DBDRIVER . ":host=" . DBHOST . ";dbname=" . DBNAME;
/*
  try {
    $connection = new PDO($dsn, DBUSER, DBPWD);
  } catch (Exception $e) {
    die("SQL error:" . $e->getMessage());
  }
*/

  try {
    $connection = new PDO($dsn, DBUSER, DBPWD);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (Exception $e) {
    die("SQL error:" . $e->getMessage());
  }

  return $connection;
}

// Generate a token
function createToken($length) {
  // random_bytes() returns pseudo-random bytes (string)
  // bin2hex() returns converted binary data in hexadecimal representation
  // bin2hex(random_bytes($int)) returns a string of length $int * 2
  return bin2hex(random_bytes($length / 2));
}

// Check if a user is connected
function isConnected() {

  if (isset($_SESSION["auth"])){
    return true;
  }

  return false;
}

// Return an associative array containing the elements selectionned
function sqlSelect($query) {
  $connection = connectDB();
  $sql = $connection->prepare($query);
  $sql->execute();
  $result = $sql->fetch(PDO::FETCH_ASSOC);

  return $result;
}

function selectAll($query) {
    $connection = connectDB();
    $sql = $connection->prepare($query);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
