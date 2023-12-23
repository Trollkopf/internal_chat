<?php

include_once "../database/DB.php";

class UserController{
	function add_user($name, $password, $dept){

		$conn = DB::conn();
		
		$sql="INSERT INTO `register`(`name`, `password`, `department`) VALUES (:name, :pass ,:dept )";

		$query = $conn->prepare($sql);
		$query->bindParam(":name", $name);
		$query->bindParam(":pass", $password);
		$query->bindParam(":dept", $dept);
		$query->execute();
		$query->closecursor();

		$userinfo = self::find_user($name);

		session_start();
		$_SESSION['ID'] = $userinfo[0]->id;
		$_SESSION['name'] = $userinfo[0]->name;

		header('location:../home.php');

	}

	function find_user($name){

		$result = [];

		$conn = DB::conn();
		$sql="SELECT * FROM `register` WHERE name=:name";

		$query = $conn->prepare($sql);
		$query->bindParam(":name", $name);
		$query->execute(array(":name"=>$name));
		while($row = $query->fetch(PDO::FETCH_OBJ)){
			array_push($result, $row);
		}
		$query->closecursor();
		$conn=null;
		return $result;

	}
}

