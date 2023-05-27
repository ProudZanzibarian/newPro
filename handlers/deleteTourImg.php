<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once("connection.php");


require_once("connection.php");
if(isset($_GET["tempID"])){
    $id = $_GET["tempID"];
    $stmt=$conn->prepare("DELETE FROM tempImg WHERE tempID=:tempID");
    $stmt->execute(array(":tempID"=>$id));
}
header("Location: ../register.php");
?>