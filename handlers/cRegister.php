<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once("connection.php");


if(isset($_POST["submit"])){
    $cName = $_POST["cName"];
    $cDesc = $_POST["cDesc"];
    $logo= $_FILES["logo"];
    $img = "ha.png";

if (($logo["type"] == "image/png" or $logo["type"] == "image/jpeg" or $logo["type"] == "image/jpg" or $logo["type"] == "image/gif") and $logo["error"] == 0) {

    $arr = explode(".", $logo["name"]);
    $nameLogo = "logo_" . $cName . "." . end($arr);
    $path = "../img/logo/" . $nameLogo;
    
    if (move_uploaded_file($logo["tmp_name"], $path)) {
    $stmt = $conn->prepare("INSERT INTO `companies`( `companyName`, `companyDescription`, `companyImg`, `companyLogo`) VALUES (:name,:cDesc,:img,:logo)");
    $stmt->execute(array(":name" => $nameLogo, ":cDesc" => $cDesc, ":img" => $img, ":logo" => $nameLogo));
    // echo "Message sent";
    }else {
        // echo "Error";
    }
} else {
    // echo "Not sent :{1";
}
}else {
    // echo "Not sent :{2";
}
header("Location: ../register.php");
