<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once("connection.php");

function hashPassword($password)
{
    return password_hash($password, PASSWORD_BCRYPT);
}

if (isset($_POST["submit"])) {
    $fName = $_POST["Fname"];
    $lName = $_POST["Lname"];
    $dob = $_POST["dob"];
    $user = $_POST["userName"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $pass = hashPassword($_POST["psw"]);
    $pass_repeat = $_POST["psw-repeat"];
    $email = $_POST["email"];
    $usrImg = "../img/ha.png";

    $userFolder = "../img/users/" . $user;
    if (password_verify($pass_repeat, $pass)) {
        if (!file_exists($userFolder)) {
            if (mkdir($userFolder, 0777, true)) {
                $stmt = $conn->prepare("INSERT INTO `tourist`(`Fname`, `Lname`, `userName`, `city`, `state`, `Email`, `password`, `profile`, `dob`, `lastLogin`) VALUES
                 (:fname, :lname, :user, :city, :state, :email, :pass, :userImg, :dob, CURRENT_TIMESTAMP)");
                $stmt->execute(array(":fname" => $fName, ":lname" => $lName, ":user" => $user, ":city" => $city, ":state" => $state, ":email" => $email, ":pass" => $pass, ":userImg" => $usrImg, ":dob" => $dob));
                // echo "Message sent";
            }
        } else {
            header("Location: ../registration.php?status=0");
            exit;
        }
    } else {
        header("Location: ../registration.php?status=1");
        exit;
    }
}
header("Location: ../registration.php");
exit;
?>
