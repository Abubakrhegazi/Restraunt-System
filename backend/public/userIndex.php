<?php

require_once('../models/User.php');
require_once('../models/Users.php');
require_once('../controller/UserController.php');

$owner = new Owner();
$users = new Users();
$controller = new UsersController($Users);

if (isset($_GET['action']) && !empty($_GET['action'])) {
	switch($_GET['action']){
		case 'insert':
			$controller->insert();
			break;
		
	}
}
else
	echo "no action specified";

?>