<?php

include_once("../database/DB.php");

$phone = $_POST['phone'];
$result = [];
$user_exists = "false";

$conn = DB::conn();
$sql = "SELECT * FROM `register` WHERE `phone` = :phone";

$query = $conn->prepare($sql);
$query->bindParam(":phone", $phone);
$query->execute();
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    array_push($result, $row);
}
$query->closeCursor();
$conn = null;

if (count($result) > 0) {
    $user_exists = "true";
}

echo $user_exists;


?>