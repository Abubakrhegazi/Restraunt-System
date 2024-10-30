<?php
$module = $_GET['module'] ?? null;

switch ($module) {
    case 'user':
        include 'controllers/UserController.php';
        break;
    case 'menu':
        include 'controllers/menuController.php';
        break;
    case 'order':
        include 'controllers/orderController.php';
        break;
    case 'role':
        include 'controllers/roleController.php';
        break;
    default:
        echo json_encode(["status" => "error", "message" => "Module not found."]);
}
?>
