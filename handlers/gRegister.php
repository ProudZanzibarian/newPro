<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once("connection.php");


if(isset($_POST["submit"])){
    $gName = $_POST["name"];
    $gDOB = $_POST["gDOB"];
    $gEmail = $_POST["gEmail"];
    $gNum = $_POST["gNum"];
    $place = $_POST["city"] . " " . $_POST["state"];
    $cID = $_POST["cID"];
    $logo= $_FILES["gProf"];
    $gExp = $_POST["gExp"];

if (($logo["type"] == "image/png" or $logo["type"] == "image/jpeg" or $logo["type"] == "image/jpg" or $logo["type"] == "image/gif") and $logo["error"] == 0) {

    $arr = explode(".", $logo["name"]);
    $gName = "logo_" . $gName . "." . end($arr);
    $path = "../img/logo/" . $gName;
    
    if (move_uploaded_file($logo["tmp_name"], $path)) {
    $stmt = $conn->prepare("INSERT INTO `guider`( `guiderFname`, `gEmail`, `gPhoneNumber`, `gPlace`, `guiderDOB`, `companyID`, `guiderLogo`, `experience`) VALUES
     (:gName,:gEmail,:gPhoneNumber,:gPlace,:gDOB,:cID,:gLogo,:gExp)");
    
    
    $stmt->execute(array(":gName" => $gName,":gEmail" => $gEmail,":gPhoneNumber" => $gNum,":gPlace" => $place, ":gDOB" => $gDOB, 
     ":cID" => $cID, ":gLogo" => $gName, ":gExp" => $gExp));
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
