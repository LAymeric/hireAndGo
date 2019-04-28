<?php
/**
 * Created by IntelliJ IDEA.
 * User: Aymeric
 * Date: 17/04/2019
 * Time: 13:15
 */

session_start();
require_once "../functions.php";

xssProtection();

$connection = connectDB();

if (count($_POST) === 1) {

    if (isset($_POST['submit-avatar']) && !empty($_FILES['avatar'])) {

        $fileName    = $_FILES['avatar']['name'];
        $fileTmpName = $_FILES['avatar']['tmp_name'];
        $fileSize    = $_FILES['avatar']['size'];
        $fileError   = $_FILES['avatar']['error'];

        // Split the file name into an array by the separating the string into substrings using the '.' character
        $fileNameArray = explode('.', $fileName);

        // Get the last element of the array and make it in lower case
        $fileExtension = strtolower(end($fileNameArray));

        $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];

        // Check if the given file owns an allowed extension
        if (in_array($fileExtension, $allowedExtensions)) {

            // Check error at upload
            if ($fileError === 0) {

                // Check if the file size doesn't exceed 2MB
                if ($fileSize < 2097152) {

                    $fileNewName = $_SESSION['id'] . "-" . uniqid() . "." . $fileExtension;
                    $fileDestination = "../uploads/member/avatar/" . $fileNewName;

                    // Move the upload file from its tmp directory to its final destination
                    // $result's value is true when the move succeeds
                    $result = move_uploaded_file($fileTmpName, $fileDestination);

                    if ($result) {
                        $query = $connection->prepare('UPDATE user SET profile_photo_filename=:profile_photo_filename WHERE id=:id');

                        $query->execute([
                            'profile_photo_filename' => $fileNewName,
                            'id'                     => $_SESSION['id']
                        ]);

                        unset($_FILES);
                        unset($_POST['submit-avatar']);

                        $_SESSION["successUpdate"]["avatar"] = true;

                        header('Location: ../edit-profile.php');
                    }

                } else {
                    $error = true;
                    $listOfErrors[] = 13;
                }
            } else {
                $error = true;
                $listOfErrors[] = 14;
            }
        } else {
            $error = true;
            $listOfErrors[] = 15;
        }

        if ($error) {
            $_SESSION["errorForm"] = $listOfErrors;
            $_SESSION["postForm"] = $_POST;

            header("Location: ../edit-profile.php");
        }

    }
} else {
    die("Error: invalid form submission.");
}
