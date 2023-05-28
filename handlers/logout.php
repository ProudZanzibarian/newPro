<?php
    session_start();
    require_once("connection.php");
    $user=$_SESSION["userName"];
    $stmt=$conn->prepare("UPDATE tourist SET lastLogin=CURRENT_TIMESTAMP WHERE userName=:name");
    $stmt->execute(array(":name"=>$user));
    unset($_SESSION["user"]);
    session_destroy();
    header("location:../registration.php");
?>