<?php

require_once(__DIR__ . "./Controller.php");

class UsersController extends Controller{
	public function insert() {
			$name = $_POST['name'] ?? null;
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;
            $phone = $_POST['phone_number'] ?? null;
			$type_id = $_POST['type_id'] ?? null;

			if($email){
				if ($this->model->insertUser($name, $email, $password, $phone, $type_id) === "email"){
					return "email";
				}
			}
            if ($name && $email && $password && $phone) {
                if($this->model->insertUser($name, $email, $password, $phone, $type_id)){
					return true;

				}else{
					return false;
				}
            } else {
            	return json_encode(["error" => "Missing data for insertion."]);
            }
	}

	public function edit() {
		$name = $_POST['name'];
		$password = $_POST['password'];
		$age = $_POST['age'];
		$phone = $_POST['phone'];

		$this->model->editUser($name,$password,$age,$phone);
	}
	
	public function delete(){
		$this->model->deleteUser();
	}

	public function getAll(){
		if(false === $this->model->getAllUsers()){
			return false;
		}
		ob_end_clean();
		return json_encode($this->model->getAllUsers());
	}
}
?>
