<?php

require_once(__DIR__ . "./Controller.php");

class UsersController extends Controller{
	public function insert() {
		$name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
		$phone = $_REQUEST['phone'];
		$type_id = $_REQUEST['type_id'];

		$this->model->insertUser($name,$email,$password,$phone,$type_id);
	}

	public function edit() {
		$name = $_REQUEST['name'];
		$password = $_REQUEST['password'];
		$age = $_REQUEST['age'];
		$phone = $_REQUEST['phone'];

		$this->model->editUser($name,$password,$age,$phone);
	}
	
	public function delete(){
		$this->model->deleteUser();
	}
}
?>
