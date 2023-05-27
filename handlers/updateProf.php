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
if (isset($_POST["submitImg"])) {
    $usrImg = $_FILES["logo"];

    if (($usrImg["type"] == "image/png" or $usrImg["type"] == "image/jpeg" or $usrImg["type"] == "image/jpg" or $usrImg["type"] == "image/gif") and $usrImg["error"] == 0) {

        $arr = explode(".", $usrImg["name"]);
        $nameLogo = "logo_" . $res["userName"] . "." . end($arr);
        $path = "../img/users/" . $res["userName"] . "/" . $nameLogo;

        if (move_uploaded_file($usrImg["tmp_name"], $path)) {


            $stmt = $conn->prepare("UPDATE `tourist` SET `profile`=:img  WHERE touristID = :user");
            $stmt->execute(array(":img" => $nameLogo, ":user" => $res["touristID"]));
            // echo "Message sent";
        }
    } else {
        header("Location: ../settings.php?status=2");

    }
}





function hashPassword($password){
    return password_hash($password, PASSWORD_BCRYPT);
}





if (isset($_POST["submit"])) {
    $fName = $_POST["Fname"];
    $lName = $_POST["Lname"];
    $dob = $_POST["dob"];
    $userName = $_POST["userName"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $pass = $_POST["psw"];
    $pass_repeat = $_POST["psw-repeat"];
    $email = $_POST["email"];

    // hashing Password
    $pass_hashed = hashPassword($_POST["psw"]);



    // password if match
    if ($pass_repeat == $pass) {

        $userFolder = "../img/users/" . $user;
        $updtUserFolder = "../img/users/" . $userName;




        // Checking if exists
        if (file_exists($userFolder)) {

            // rename folder
            if (rename($userFolder, $updtUserFolder)) {




                $stmt = $conn->prepare("UPDATE `tourist` SET `Fname`= :fname',`Lname`= :lname,`userName`= :userName,`city`=:city,`state`=:state,`Email`= :email,`password`= :pass,`dob`= :dob, WHERE touristID= :user");
                $stmt->execute(array(":fname" => $fName, ":lname" => $lName, ":userName" => $userName, ":email" => $email, ":pass" => $pass, ":dob" => $dob, ":user" => $res["touristID"]));
                echo "Message sent";
            } else {
                echo "rename Error";
            }
        } else {
            echo "Does Not Exist";
        }
    } else {
        header("Location: ../settings.php?status=1");
    }
}


header("Location: ../settings.php");
