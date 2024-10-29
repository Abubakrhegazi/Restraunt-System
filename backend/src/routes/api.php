<?php
header("Access-Control-Allow-Origin: http://localhost:8080"); // Allow requests from your front-end origin
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");    // Allow the request methods you use
header("Access-Control-Allow-Headers: Content-Type");          // Allow the headers you need
header("Access-Control-Allow-Credentials: true");              // If cookies or authentication are required
header('Content-Type: application/json'); // Set content type to JSON

require_once '../models/user_functions.php'; // Ensure this points to your functions file

// Determine the request method and decode JSON if Content-Type is application/json
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST' && $_SERVER["CONTENT_TYPE"] === "application/json") {
    $json = file_get_contents('php://input');
    $_POST = json_decode($json, true); // Decode JSON body to $_POST
}

// Get action parameter from POST or GET requests
$action = $method === 'POST' ? ($_POST['action'] ?? null) : ($_GET['action'] ?? null);

if ($action) {
    switch ($action) {
        case 'addUser':
            // Handle user creation
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $role = $_POST['role'] ?? '';
            $phoneNumber = $_POST['phoneNumber'] ?? '';

            if (addUser($name, $email, $password, $role, $phoneNumber)) {
                echo json_encode(["status" => "success", "message" => "User created successfully."]);
            } else {
                echo json_encode(["status" => "error", "message" => "Failed to create user."]);
            }
            break;

        case 'getUserById':
            // Handle fetching user by ID
            $id = $_GET['id'] ?? '';
            $user = getUserById($id);
            if ($user) {
                echo json_encode($user);
            } else {
                echo json_encode(["status" => "error", "message" => "User not found."]);
            }
            break;

        // Additional cases for update and delete operations can be added here.

        default:
            echo json_encode(["status" => "error", "message" => "Invalid action."]);
            break;
    }
} else {
    echo json_encode(["status" => "error", "message" => "No action specified."]);
}
?>
