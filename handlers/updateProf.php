<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once("connection.php");


$query = $conn->prepare("SELECT * FROM `tourist` WHERE userName = :name");
$user = $_SESSION["user"];
$query->execute(array(":name" => $user));
$res = $query->fetch();

// submmit Profile Only
if (isset($_POST["submit"])) {
    $usrImg = $_FILES["logo"];

    if (($usrImg["type"] == "image/png" or $usrImg["type"] == "image/jpeg" or $usrImg["type"] == "image/jpg" or $usrImg["type"] == "image/gif") and $usrImg["error"] == 0) {

        $arr = explode(".", $usrImg["name"]);
        $nameLogo = "logo_" . $res["userName"] . "." . end($arr);

        $path = "../img/users/" . $res["userName"];

        if (move_uploaded_file($usrImg["tmp_name"], $path)) {


            $stmt = $conn->prepare("UPDATE `tourist` SET `profile`=:img");
            $stmt->execute(array(":img" => $nameLogo));
            echo "Message sent";
        }
    } else {
        header("Location: ../settings.php?status=2");

    }
}

// header("Location: ../settings.php");



