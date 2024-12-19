<?php

require_once('../models/User.php');
require_once('../models/Users.php');
require_once('../controller/UserController.php');

header("Access-Control-Allow-Origin: http://localhost:8080");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header('Content-Type: application/json'); // Set content type to JSON

// Instantiate the Users class
$Users = new Users();
$controller = new UsersController($Users);

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'insert':

            if ($controller->insert()) {
                ob_end_clean(); //clean the buffer so the response is just the json message
                echo json_encode(["status" => "success", "message" => "user inserted successfully."]);
            } else {
                echo json_encode(["status" => "error", "message" => "Failed to insert user."]);
            }
			break;
        case 'working':
            echo 'working function called <br>';
            break;
        default:
            echo "Action not recognized.";
            break;
    }
} else {
    echo "No action specified.";

}
?>


