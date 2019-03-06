<?php
/**
 * Created by IntelliJ IDEA.
 * User: Aymeric
 * Date: 06/03/2019
 * Time: 15:22
 */
if (!empty($_POST["email"])) {
    $_POST["email"] = strtolower(trim($_POST["email"]));

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