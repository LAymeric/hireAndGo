<?php
  session_start();
  require_once "../functions.php";


  if (count($_POST) === 2 && !empty($_POST["email"] && !empty($_POST["pwd"]))) {

    $_POST["email"] = strtolower($_POST["email"]);

    $data = sqlSelect("SELECT * FROM user WHERE email='{$_POST['email']}'");

    if (password_verify($_POST["pwd"], $data["password"])) {
        $_SESSION["auth"]  = true;
        $_SESSION["id"]    = $data["id"];
        $_SESSION["email"]    = $data["email"];
        $_SESSION["type"] = $data["type"];
        header("Location: ../profile.php");
      }else {
        $_SESSION["failedLogin"] = "Error: Your username or password is wrong.";
        header("Location: ../login.php");
    }
    }

