<?php
require_once(__DIR__ . "/Model.php");
require_once(__DIR__ . "/User.php");

class Users extends Model
{
	private $users;
	function __construct() {}

	private function fillArray($result)
	{
		$this->users = array();
		//$result = $this->readUsers();
		while ($row = $result->fetch_assoc()) {

			$user = userFactory::create(
				$row["type_id"],
				$row["name"],
				$row["email"],
				$row["password"],
				$row["user_id"],
				$row["restaurant_id"],
				$row["branch_id"],
				$row["phone_number"],
				$row["profile_picture"]
			);

			array_push($this->users, $user);
		}
	}



	function readUsers()
	{
		$sql = "SELECT * FROM user";

		$db = $this->connect();

		$result = $db->query($sql);
		if ($result->num_rows > 0) {
			return $result;
		} else {
			echo "0 results";
			return false;
		}
	}

	function insertUser($name, $email, $password, $phone, $type_id)
	{
		$emailCheckSql = "SELECT * FROM user WHERE email = '$email'";

		$sql = "INSERT INTO user (name, email, password, phone_number, type_id) VALUES ('$name', '$email', '$password', '$phone', '$type_id')";

		$getSql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";

		$db = $this->connect();

		$result = $db->query($emailCheckSql);

		if ($result->num_rows !== 0) {
			//ob_end_clean();
			return "email";
			//echo json_encode(['error' => 'email already exists']);

		} elseif ($db->query($sql) === true) {

			echo "Records inserted successfully";

			$result = $db->query($getSql);

			$this->fillArray($result);

			return true;
		} else {
			echo json_encode(['error' => $this->conn->error]);
		}
	}
}
