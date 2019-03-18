<?php
/**
 * Created by IntelliJ IDEA.
 * User: Aymeric
 * Date: 13/03/2019
 * Time: 18:53
 */


  //session_start();
  require_once "../functions.php";

  if (count($_POST) === 2
      && !empty($_POST["pwd"])
      && !empty($_POST["pwdConfirm"])
  ) {

      // Database connection
      $connection = connectDB();

      // Query that gets the member's password
      $queryPassword = $connection->prepare("SELECT pwd FROM member WHERE id=:id");

      $queryPassword->execute([
          "id" => $_SESSION["id"],
      ]);

      $result = $queryPassword->fetch(PDO::FETCH_ASSOC);


      // Check password length: min 8 max 40

      if (strlen($_POST["pwd"]) < 8 || strlen($_POST["pwd"]) > 40) {

      }

      // Check if both passwords are identical

      if ($_POST["pwd"] !== $_POST["pwdConfirm"]) {

      } // Else => insertion in database

      else {

          // Query that update the member's token and password
          $query = $connection->prepare("UPDATE member SET pwd=? WHERE id=? ");


          // Execute the query
          $query->execute([
              password_hash($_POST["pwd"], PASSWORD_DEFAULT),
              $_SESSION["id"],
          ]);


          header("Location: ../profile.php");
      }
  }