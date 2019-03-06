<?php
  session_start();
  require_once "../functions.php";


  if (count($_POST) === 2 && !empty($_POST["email"] && !empty($_POST["pwd"]))) {

    $_POST["email"] = strtolower($_POST["email"]);

    $data = sqlSelect("SELECT * FROM member WHERE email='{$_POST['email']}'");

    if (password_verify($_POST["pwd"], $data["pwd"])) {
        $_SESSION["auth"]  = true;
        header("Location: ../profile.php");
      } 
    }

