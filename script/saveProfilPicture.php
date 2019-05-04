<?php
session_start();
include "../functions.php";
require_once "../class/User.php";

    // Database connection
    $connection = connectDB();


    $user = new User($_POST["userId"]);
    $user->savePicture($_POST["image"]);
    return true;