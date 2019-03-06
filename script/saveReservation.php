<?php
require_once "../class/Reservation.php";
include "../functions.php";

    var_dump($_POST);
    print_r($_POST);
  if (count($_POST) === 8
    && !empty($_POST["reservation_date"])
    && !empty($_POST["reservation_time"])
    && !empty($_POST["departure_address"])
    && !empty($_POST["departure_postal_code"])
    && !empty($_POST["departure_city"])
    && !empty($_POST["arrival_address"])
    && !empty($_POST["arrival_postal_code"])
    && !empty($_POST["arrival_city"])
  ) {
    // Database connection
    $connection = connectDB();


    $error = false;

    // Check values one by one

    // name length: min 3 max 60
    /*if (strlen($_POST["reservation_date"]) < 2 || strlen($_POST["name"]) > 60) {
        $error = true;
    }

    // firstname length: min 3 max 60

    if (strlen($_POST["firstname"]) < 2 || strlen($_POST["firstname"]) > 60) {
         $error = true;
    }*/

    if (strlen($_POST["departure_address"]) < 7 || strlen($_POST["departure_address"]) > 255) { 
         $error = true;
    }


    if (strlen($_POST["departure_postal_code"]) !=5 && is_numeric($_POST["departure_postal_code"])) {   
        $error = true;
    }

    if (strlen($_POST["departure_city"]) < 2 || strlen($_POST["departure_city"]) > 50) {   
         $error = true;
    }

    if (strlen($_POST["arrival_address"]) < 7 || strlen($_POST["arrival_address"]) > 255) { 
         $error = true;
    }

    if (strlen($_POST["arrival_postal_code"]) !=5 && is_numeric($_POST["arrival_postal_code"])) {   
        $error = true;
    }

    if (strlen($_POST["arrival_city"]) < 2 || strlen($_POST["arrival_city"]) > 50) {   
         $error = true;
    }

    if ($error) {
        var_dump($_POST);
      //header("Location: ../index.php");
    } 

    // Else => insertion in database

    else {
        $reservation_date = date("Y-m-d H:i:s");
        $reservation_time = time("h-m-s");

        $reservation = new Reservation($reservation_date, $reservation_time,$_POST["reservation_time"], $_POST["departure_address"],$_POST["departure_postal_code"],$_POST["departure_city"],$_POST["arrival_address"], $_POST["arrival_postal_code"],$_POST["arrival_city"]);
        $reservation->addReservation($reservation_date, $reservation_time,$_POST["departure_address"], $_POST["departure_postal_code"], $_POST["departure_city"], $_POST["arrival_address"],$_POST["arrival_postal_code"], $_POST["arrival_city"]);
    }

  } else {
     header("Location: ../index.php");
  }

?>
