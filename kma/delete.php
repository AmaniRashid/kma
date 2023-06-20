<?php  

include "config/database.php";

$serial_no = $_POST["serial_no"] ?? null;

if(!$serial_no){
    header('location: info.php');
    exit;
}


$statement = $conn->prepare('DELETE FROM devices WHERE serial_no = :serial_no');
$statement->bindValue(':serial_no', $serial_no);
$statement->execute();



header("location: info.php") ?>