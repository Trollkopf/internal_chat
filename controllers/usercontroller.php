<?php

class UserController
{
	function add_user($name, $surname, $phone, $password, $dept)
	{
		include_once "../database/DB.php";

		$conn = DB::conn();

		$sql = "INSERT INTO `register`(`name`, `surname`, `phone`, `password`, `department`) VALUES (:name, :surname, :phone, :pass, :dept )";

		$query = $conn->prepare($sql);
		$query->bindParam(":name", $name);
		$query->bindParam(":surname", $surname);
		$query->bindParam(":phone", $phone);
		$query->bindParam(":pass", $password);
		$query->bindParam(":dept", $dept);
		$query->execute();
		$query->closecursor();

		$userinfo = self::find_user($phone);

		session_start();
		$_SESSION['ID'] = $userinfo[0]->id;
		$_SESSION['name'] = $userinfo[0]->name;
		$_SESSION['surname'] = $userinfo[0]->surname;

		header('location:../home.php');

	}

	function login($phone, $password)
	{
		include_once "../database/DB.php";

		$login = self::password_checker($phone, $password);

		if ($login[0] === true) {
			session_start();
			$user_info = $login[1];
			$_SESSION['ID'] = $user_info[0]->id;
			$_SESSION['name'] = $user_info[0]->name;
			$_SESSION['surname'] = $user_info[0]->surname;

			header('Location: ../home.php');
		} else {

			header('Location: ../index.php?user=unknown');

		}


	}

	/**
	 * 
	 * Find the user information in the database 
	 * Check if the password sended by the user is the same as the storaged
	 *
	 * @param string $user
	 * @param string $password
	 * @return @param array $user_found: 
	 *  $user_found[0]-> bool $user_found 
	 *  $user_found[1]-> array $user_info
	 */
	function password_checker($phone, $password)
	{
		include_once "../database/DB.php";

		$user_found = false;
		$user_info = self::find_user($phone);
		if (count($user_info) === 1) {
			if ($phone === $user_info[0]->phone && password_verify($password, $user_info[0]->password)) {
				$user_found = true;
			}
			return [$user_found, [$user_info[0]]];
		}

	}

	function find_user($phone)
	{

		$result = [];

		$conn = DB::conn();
		$sql = "SELECT * FROM `register` WHERE phone=:phone";

		$query = $conn->prepare($sql);
		$query->bindParam(":phone", $phone);
		$query->execute();
		while ($row = $query->fetch(PDO::FETCH_OBJ)) {
			array_push($result, $row);
		}
		$query->closecursor();
		$conn = null;
		return $result;

	}

	public static function list_users()
	{

		$result = [];
		$conn = DB::conn();
		$sql = "SELECT * FROM `register` ORDER BY `name` ASC";

		$query = $conn->prepare($sql);
		$query->execute();
		while ($row = $query->fetch(PDO::FETCH_OBJ)) {
			array_push($result, $row);
		}
		$query->closeCursor();
		$conn = null;
		return $result;
	}


}

