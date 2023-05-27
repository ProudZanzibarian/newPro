<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once("connection.php");

if (isset($_POST["submit"])) {
    $tName = $_POST["tName"];
    $sDesc = $_POST["sDesc"];
    $lDesc = $_POST["lDesc"];
    $map = "No Map Yet";

    // Insert tour data into the database
    $stmt = $conn->prepare("INSERT INTO tours (tourName, shortDesc, tourDescription, tourMap) VALUES (:tName, :sDesc, :lDesc, :tMap)");
    $stmt->execute(array(":tName" => $tName, ":sDesc" => $sDesc, ":lDesc" => $lDesc, ":tMap" => $map));

    $tourID = $conn->lastInsertId();

    // Retrieve temporary images
    $stmt2 = $conn->prepare("SELECT * FROM tempImg");
    $stmt2->execute();
    $tempImages = $stmt2->fetchAll();

    try {
        foreach ($tempImages as $tempImg) {
            $img = $tempImg["tempName"];

            // Move temporary image to tour image table
            $stmt3 = $conn->prepare("INSERT INTO toursImg (tourImgName, tourID) VALUES (:tourImgName, :tourID)");
            $stmt3->execute(array(":tourImgName" => $img, ":tourID" => $tourID));

            

            // Delete temporary images
            $stmt4 = $conn->prepare("DELETE FROM tempImg WHERE tempName = :tempName");
            $stmt4->execute(array(":tempName" => $img));

            $path = "../img/tempImg/" . $img;

            // Deleting from directory
            if (file_exists($path)) {
                if (unlink($path)) {
                    // echo "File deleted successfully.";
                } else {
                    // echo "Error deleting the file.";
                }
            } else {
                // echo "File does not exist.";
            }
        }
    } catch (\Throwable $th) {
        // echo "Error" . $th->getMessage();
    }
}
header("Location: ../register.php");
?>
