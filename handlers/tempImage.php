<?php session_start(); ?>
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once("connection.php");


if (isset($_POST["submit"])) {
    $image =  $_FILES["imgUploaded"];


    if (($image["type"] == "image/png" or $image["type"] == "image/jpeg" or $image["type"] == "image/jpg" or $image["type"] == "image/gif") and $image["error"] == 0) {

            $arr = explode(".", $image["name"]);
            $user = $_SESSION["user"];
$date = date("h:i:s");

            $imgName = "img_" . $user.$date . "." . end($arr);
            $path = "../img/tempImg/" . $imgName;


            if (move_uploaded_file($image["tmp_name"], $path)) {
                $stmt = $conn->prepare("INSERT INTO `tempImg`( `tempName`) VALUES ( :imgName )");
                $stmt->execute(array(":imgName" => $imgName));


            }
        }
}

header("Location: ../register.php");
?>