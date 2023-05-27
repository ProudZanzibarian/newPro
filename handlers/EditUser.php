<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once("connection.php");


$query = $conn->prepare("SELECT * FROM `tourist` WHERE userName = :name");
$user = $_SESSION["user"];
$query->execute(array(":name" => $user));
$res = $query->fetch();



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




                $stmt = $conn->prepare("UPDATE `tourist` SET `Fname`= :fname',`Lname`= :lname,`userName`= :userName,`city`=:city,`state`=:state,`Email`= :email,`password`= :pass,`dob`= :dob, WHERE turistID = :user");
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


// header("Location: ../settings.php");
