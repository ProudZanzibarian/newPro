<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once("connection.php");

function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}

if(isset($_POST["submit"])){
    $fName = $_POST["Fname"];
    $lName = $_POST["Lname"];
    $dob = $_POST["dob"];
    $user = $_POST["userName"];
    $pass = hashPassword($_POST["psw"]);
    $email = $_POST["email"];
    $usrImg = "../img/ha.png";

    $stmt = $conn->prepare("INSERT INTO `tourist`(`Fname`, `Lname`, `userName`, `Email`, `password`, `profile`, `dob`, `lastLogin`) VALUES (:fname, :lname, :user, :email, :pass, :userImg, :dob, CURRENT_TIMESTAMP)");
    $stmt->execute(array(":fname" => $fName, ":lname" => $lName, ":user" => $user, ":email" => $email, ":pass" => $pass, ":userImg" => $usrImg, ":dob" => $dob));
    echo "Message sent";
} else {
    // echo "Not sent :{";
}
header("Location: ../registration.php");
?>