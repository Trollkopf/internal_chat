<?php

class ChatController{

public static function read_whole_chat(){

	$result = [];

	$conn = DB::conn();
    $sql="SELECT * FROM `chat` c LEFT JOIN `register`r ON c.user = r.id;";

	$query= $conn->prepare($sql);
	$query->execute();
	while($row = $query->fetch(PDO::FETCH_OBJ)){
		array_push($result, $row);
	}
	$query->closecursor();
	$conn= null;
	return $result;

}

function send_message($id, $msg){
    
	$conn = DB::conn();
	$sql="INSERT INTO `chat`(`user`, `message`) VALUES (:user, :msg)";

	$query = $conn->prepare($sql);
	$query->bindParam(":user", $id);
	$query->bindParam(":msg", $msg);
	$query->execute();
	$query->closecursor();
	$conn = null;

	header('Location: ../home.php');
	
}
}