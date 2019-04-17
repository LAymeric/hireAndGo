<?php
/**
 * Created by IntelliJ IDEA.
 * User: Aymeric
 * Date: 19/03/2019
 * Time: 11:51
 */

  session_start();
  require_once "../functions.php";



  if (count($_POST) === 8
      && !empty($_POST["name"])
      && !empty($_POST["firstname"])
      && !empty($_POST["email"])
      && !empty($_POST["phone"])
      && !empty($_POST["city"])
      && !empty($_POST["postalCode"])
      && !empty($_POST["address"])
      && !empty($_POST["country"])
  ) {
      //$error = false ;
      // Database connection
      $connection = connectDB();
      // Cleaning string values

      $_POST["name"]     = trim($_POST["name"]);
      $_POST["firstname"] = strtolower(trim($_POST["firstname"]));
      $_POST["email"]    = strtolower(trim($_POST["email"]));



      if ($error) {
          var_dump($_POST);
         // header("Location: ../index.php");
      }else {


          // Query that inserts the new member
          $updateQuery = $connection->prepare(
              "UPDATE member
                        SET email=:email,name=:name,firstname=:firstname,phone=:phone,city=:city,postalCode=:postalCode,address=:address,country=:country
                        WHERE id=:id"
          );

          // Execute the query
          $updateQuery->execute([
              "email" => $_POST["email"],
              "name" => $_POST["name"],
              "firstname" => $_POST["firstname"],
              "phone" => $_POST["phone"],
              "city" => $_POST["city"],
              "postalCode" => $_POST["postalCode"],
              "address" => $_POST["address"],
              "country" => $_POST["country"],
              "id" => $_SESSION["id"]

          ]);

          header("Location: ../profile.php");

      }
  } else {

      //header("Location: ../profile.php");
      die("Error: invalid form submission.");
  }
