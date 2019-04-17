<?php
session_start();
include "../functions.php";
require_once "../class/User.php";

  if (count($_POST) === 12
    && !empty($_POST["name"])
    && !empty($_POST["firstname"])
    && !empty($_POST["birthday"])
    && !empty($_POST["email"])
    && !empty($_POST["city"])
    && !empty($_POST["postalCode"])
    && !empty($_POST["address"])
    && !empty($_POST["country"])
    && !empty($_POST["phone"])
    && !empty($_POST["pwd"])
    && !empty($_POST["pwdConfirm"])
    && !empty($_POST["cgu"])

  ) {
    // Database connection
    $connection = connectDB();


    $error = false;
    // Cleaning string values

    $_POST["name"]         = trim($_POST["name"]);
    $_POST["firstname"]     = strtolower(trim($_POST["firstname"]));
    $_POST["email"]        = strtolower(trim($_POST["email"]));
    $_POST["city"]        = strtolower(trim($_POST["city"]));
    $_POST["address"]        = strtolower(trim($_POST["address"]));


    // Check values one by one

    // name length: min 3 max 60
    if (strlen($_POST["name"]) < 2 || strlen($_POST["name"]) > 60) {
        echo "name";
        $error = true;
    }

    // firstname length: min 3 max 60

    if (strlen($_POST["firstname"]) < 2 || strlen($_POST["firstname"]) > 60) {
        echo "firstname";
         $error = true;
    }

    // email : valid format

    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      $error = true;
    } else {
      // Check if this email address already exists

      // Database connection
      $connection = connectDB();

      // Query that returns 1 every time it founds this email
      $query = $connection->prepare("SELECT 1 FROM member WHERE email= :email");

      // Execute
      $query->execute(["email" => $_POST["email"]]);

      // Fetch data with the query
      $result = $query->fetch();

      if (!empty($result)) {
        $error = true;
      }
    }

    // Check date format: american (YYYY-MM-DD) or european (DD/MM/YYYY)

    $dateFormat = false;

    if (strpos($_POST["birthday"], "/")) {
      list($day, $month, $year) = explode("/", $_POST["birthday"]);
      $dateFormat = true;
    } else if (strpos($_POST["birthday"], "-")) {
      list($year, $month, $day) = explode("-", $_POST["birthday"]);
      $dateFormat = true;
    } else {  
        $error = true;
    }

    // Check valid date

    if (!is_numeric($month)
      || !is_numeric($day)
      || !is_numeric($year)
      || !checkdate($month, $day, $year)
    ) {   
         $error = true;
    } else {
      // Check if allowed to signup (13 <= age <= 150)
      $today        = time();
      $time13years  = $today - 13*3600*24*365;
      $time150years = $today - 150*3600*24*365;

      // Returns UNIX timestamp with corresponding to the arguments given
      $birthday = mktime(0, 0, 0, $month, $day, $year);

      if ($time13years < $birthday || $time150years > $birthday) { 
         $error = true;
      }
    }

    // Check password length: min 8 max 40

    if (strlen($_POST["pwd"]) < 8 || strlen($_POST["pwd"]) > 40) { 
         $error = true;
    }

    // Check if both passwords are identical

    if ($_POST["pwd"] !== $_POST["pwdConfirm"]) {  
         $error = true;
    }

    //Check  city length : min 2 max 40

    if (strlen($_POST["city"]) < 2 || strlen($_POST["city"]) > 40) {   
         $error = true;
    }

    //Check  postalCode length : 5 

    if (strlen($_POST["postalCode"]) !=5 && is_numeric($_POST["postalCode"])) {   
        $error = true;
   }

    //Check address  length : min 5 max 40

      if (strlen($_POST["address"]) < 5 || strlen($_POST["address"]) > 40) {   
        $error = true;
   }

    //Check phone  length : 10

       if (strlen($_POST["phone"]) !=10) {   
        $error = true;
   }

    if ($error) {
        var_dump($_POST);
        echo "noOk";
      //header("Location: ../index.php");
    }

    // Else => insertion in database

    else {
        $pwd = password_hash($_POST["pwd"], PASSWORD_DEFAULT);
        $birthday = $year . "-" . $month . "-" . $day;
        $registration_date = date("Y-m-d H:i:s");

        $user = new User($_POST["email"], $pwd, $_POST["name"],$_POST["firstname"],$birthday,$_POST["postalCode"],$_POST["city"], $_POST["country"],$_POST["address"], $_POST["phone"],$registration_date);
        $user->addUser($_POST["email"],  $pwd,$_POST["name"],$_POST["firstname"],$birthday,$_POST["postalCode"],$_POST["city"], $_POST["country"],$_POST["address"], $_POST["phone"],$registration_date);
    }

  } else {
     header("Location: index.php");
  }
