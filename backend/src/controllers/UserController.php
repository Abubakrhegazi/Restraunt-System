<?php
require_once '../models/user_functions.php';

if (($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) ||
    ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']))) {
        isset($_POST['action']) ? $action = $_POST['action'] : "";
        isset($_GET['action']) ? $action = $_GET['action'] : "";

    switch ($action) {
        case 'addUser':
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $role = $_POST['role'];
            $phoneNumber = $_POST['phoneNumber'];
            
            if (addUser($name, $email, $password, $role, $phoneNumber)) {
                echo json_encode(["status" => "success", "message" => "User created successfully."]);
            } else {
                echo json_encode(["status" => "error", "message" => "Failed to create user."]);
            }
            break;

        case 'getUserById':
            $id = $_GET['id'];
            $user = getUserById($id);
            echo json_encode($user);
            break;

        // Additional cases for update and delete
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
}
?>
