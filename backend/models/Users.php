<?php
require_once(__DIR__ . "/Model.php");
require_once(__DIR__ . "/User.php");

class Users extends Model {
	private $users;
	function __construct() {
		$this->fillArray();
	}

	function fillArray() {        
		$this->users = array();
		$result = $this->readUsers();
		while ($row = $result->fetch_assoc()) {

            $user = userFactory::create($row["type_id"], $row["name"], $row["email"],
            $row["password"], $row["user_id"], $row["restaurant_id"], $row["branch_id"],
            $row["phone_number"], $row["profile_picture"]);
        
			array_push($this->users, $user);
		}
	}

	function getUsers() {
		return $this->users;
	}

	function readUsers(){
		$sql = "SELECT * FROM user";

        $db = $this->connect();

		$result = $db->query($sql);
		if ($result->num_rows > 0){
			return $result;
		}
		else {
			echo "0 results";
			return false;
		}
	}

	function insertUser($name, $email, $password, $phone, $type_id){
		$sql = "INSERT INTO user (name, email, password, phone_number, type_id) VALUES ('$name', '$email', '$password', '$phone', '$type_id')";

        $db = $this->connect();

		if($db->query($sql) === true){
			echo "Records inserted successfully.<br>";
			$this->fillArray();
			return true;
		} 
		else{
			echo "ERROR: Could not able to execute $sql. " . $this->conn->error . "<br>";
		}
	}
}