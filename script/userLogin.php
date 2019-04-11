<?php
  session_start();
  require_once "../functions.php";


  if (count($_POST) === 2 && !empty($_POST["email"] && !empty($_POST["pwd"]))) {

    $_POST["email"] = strtolower($_POST["email"]);

    $data = sqlSelect("SELECT * FROM member WHERE email='{$_POST['email']}'");

    if (password_verify($_POST["pwd"], $data["pwd"])) {
        $_SESSION["auth"]  = true;
        $_SESSION["id"]    = $data["id"];
        header("Location: ../profile.php");
      }else {
        $_SESSION["failedLogin"] = "Error: Your username or password is wrong.";
        header("Location: ../login.php");
    }
    }

