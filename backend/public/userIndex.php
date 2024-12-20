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
$userController = new UsersController($Users);

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'insert':
            $result = $userController->insert();
            if ($result) {

                if($result === "email") {

                    echo json_encode(["error" => "email error"]) ;

                }else{

                    echo json_encode(["status" => "success", "message" => "user inserted successfully."]);
                }   
            }
             else {
                
                echo json_encode(["status" => "error", "message" => "Failed to insert user."]);
                echo $result;

            }
			break;
        case 'getAllUsers':

            $userController->getAll();
            break;
        
        case 'getUserById':
            //$userController->getUserById();
            break;
        default:
            echo "Action not recognized.";
            break;
    }
} else {
    echo "No action specified.";

}
?>


