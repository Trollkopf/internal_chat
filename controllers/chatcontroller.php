<?php

class ChatController
{

	public static function read_whole_chat()
	{

		$result = [];

		$conn = DB::conn();
		$sql = "SELECT * FROM `chat` c LEFT JOIN `register`r ON c.user = r.id;";

		$query = $conn->prepare($sql);
		$query->execute();
		while ($row = $query->fetch(PDO::FETCH_OBJ)) {
			array_push($result, $row);
		}
		$query->closecursor();
		$conn = null;
		return $result;

	}

	public static function read_specific_chat($userid, $chatreceiver)
	{

		$result = [];

		$conn = DB::conn();
		$sql = "SELECT c.sender AS senderID, 
			     c.receiver AS receiverID, 
				 r.name AS sender, 
				 rr.name AS receiver, c
				 .message AS message 
			FROM `specific_chat` c 
			LEFT JOIN `register` r ON c.sender = r.id 
			LEFT JOIN `register` rr ON c.receiver = rr.id 
			WHERE (c.sender = :userid AND c.receiver = :chatreceiver) 
			OR (c.sender = :chatreceiver AND c.receiver = :userid)";

		$query = $conn->prepare($sql);
		$query->bindParam(":userid", $userid);
		$query->bindParam(":chatreceiver", $chatreceiver);
		$query->execute();
		while ($row = $query->fetch(PDO::FETCH_OBJ)) {
			array_push($result, $row);
		}
		$query->closecursor();
		$conn = null;
		return $result;

	}

	function send_message($id, $msg)
	{

		$conn = DB::conn();
		$sql = "INSERT INTO `chat`(`user`, `message`) VALUES (:user, :msg)";

		$query = $conn->prepare($sql);
		$query->bindParam(":user", $id);
		$query->bindParam(":msg", $msg);
		$query->execute();
		$query->closecursor();
		$conn = null;

		header('Location: ../home.php');

	}
}