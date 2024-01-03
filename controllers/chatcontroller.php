<?php

class ChatController
{

	/**
	 * Return all the messages sent to the main chat. JOIN the user information. 
	 *
	 * @return array $result
	 */
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

	/**
	 * Return all the chats between two users
	 *
	 * @param int $userid
	 * @param int $chatreceiver
	 * @return array $result
	 */
	public static function read_specific_chat($userid, $chatreceiver)
	{

		$result = [];

		$conn = DB::conn();
		$sql = "SELECT c.id AS ID,
				 c.sender AS senderID, 
			     c.receiver AS receiverID, 
				 r.name AS sender, 
				 rr.name AS receiver, 
				 c.message AS message 
			FROM `specific_chat` c 
			LEFT JOIN `register` r ON c.sender = r.id 
			LEFT JOIN `register` rr ON c.receiver = rr.id 
			WHERE (c.sender = :userid AND c.receiver = :chatreceiver) 
			OR (c.sender = :chatreceiver AND c.receiver = :userid)
			ORDER BY ID";

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

	/**
	 * Insert a message into the database to store it as a chat with the user id
	 *
	 * @param int $id
	 * @param string $msg
	 * @return void
	 */
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

	/**
	 * Insert a message in the specific chat table
	 *
	 * @param int $sender
	 * @param int $receiver
	 * @param string $message
	 * @param string $name
	 * @param string $surname
	 * @return void
	 */
	function send_specific_message($sender, $receiver, $message, $name, $surname)
	{

		$conn = DB::conn();
		$sql = "INSERT INTO `specific_chat`(`sender`, `receiver`, `message`) VALUES (:sender, :receiver, :msg)";

		$query = $conn->prepare($sql);
		$query->bindParam(":sender", $sender);
		$query->bindParam(":receiver", $receiver);
		$query->bindParam(":msg", $message);
		$query->execute();
		$query->closeCursor();
		$conn = null;

		header("Location: ../specific_chat.php?receiver_id=" . $receiver . "&receiver_name=" . $name . "&receiver_surname=" . $surname . "&contact_user=contact_user");

	}
}