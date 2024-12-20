    <?php
//params are in $_REQUEST
//you first decode your data then you can use it by assigning the global associative array either _$POST or _$_GET or _$_REQUEST
    header("Access-Control-Allow-Origin: http://localhost:8080");
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    header('Content-Type: application/json'); // Set content type to JSON

    $json = file_get_contents('php://input');
    $_POST = json_decode($json,true);



    switch($_REQUEST['module']) {
        case 'user':
            require ('userIndex.php');
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
