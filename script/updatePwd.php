<?php
/**
 * Created by IntelliJ IDEA.
 * User: Aymeric
 * Date: 13/03/2019
 * Time: 18:53
 */


  //session_start();
  require_once "../functions.php";

  if (count($_POST) === 3
      && !empty($_POST["pwd"])
      && !empty($_POST["pwdConfirm"])
  ) {

      var_dump($_POST);


  }

// Else => insertion in database

      else {
          $connection = connectDB();

          // Query that update the member's token and password
          $query = $connection->prepare("UPDATE user SET password=? WHERE id=? ");


          // Execute the query
          $query->execute([
              password_hash($_POST["pwd"], PASSWORD_DEFAULT),
              $_SESSION["id"],
          ]);


          header("Location: ../profile.php");
      }
