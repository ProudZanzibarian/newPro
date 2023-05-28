<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("connection.php");

function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}

if(isset($_POST["submit"])) {
    $user = $_POST["uname"];
    $pass = $_POST["psw"];

    $hashedPass = hashPassword($pass);

    $stmt = $conn->prepare("SELECT * FROM tourist WHERE userName = :uname");
    $stmt->bindParam(":uname", $user);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if($stmt == true){
    if($result && password_verify($pass, $result["password"])) {
        session_start();
        $_SESSION["user"] = $result["userName"];

        header("Location: ../dashboard.php");
        exit();
    }else {      header("Location: ../registration.php?error=0");}
    } else {
        header("Location: ../registration.php?error=1");
        exit();
    }
} else {
    header("Location: ../registration.php");
    exit();
}
?>
