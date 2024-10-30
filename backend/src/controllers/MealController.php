<?php
header("Access-Control-Allow-Origin: http://localhost:8080"); // Allow requests from your front-end origin
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");    // Allow the request methods you use
header("Access-Control-Allow-Headers: Content-Type");          // Allow the headers you need
header("Access-Control-Allow-Credentials: true");              // If cookies or authentication are required
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header('Content-Type: application/json'); // Set content type to JSON

require_once '../models/meal_functions.php';  // Assuming this file contains meal-related DB functions

$method = $_SERVER['REQUEST_METHOD'];

// Handle JSON input for POST requests
if ($method === 'POST') {
    $json = file_get_contents('php://input');
    $_POST = json_decode($json, true);  // Convert JSON to $_POST array
}


// Get action parameter from POST or GET requests
$action = $method === 'POST' ? ($_POST['action'] ?? null) : ($_GET['action'] ?? null);

if($action){
    switch ($action) {
        // case 'addMeal':
        //     $name = $_POST['name'] ?? '';
        //     $description = $_POST['description'] ?? '';
        //     $price = $_POST['price'] ?? 0;
        //     $category = $_POST['category'] ?? '';

        //     if (addMeal($name, $description, $price, $category)) {
        //         echo json_encode(["status" => "success", "message" => "Meal added successfully."]);
        //     } else {
        //         echo json_encode(["status" => "error", "message" => "Failed to add meal."]);
        //     }
        //     break;

        // case 'getMealById':
        //     $id = $_GET['id'] ?? '';
        //     $meal = getMealById($id);

        //     if ($meal) {
        //         echo json_encode($meal);
        //     } else {
        //         echo json_encode(["status" => "error", "message" => "Meal not found."]);
        //     }
        //     break;

        case 'getAllMealsByResturantId':
            $id = $_GET['resturant_id'] ?? '';
            $meals = getAllMealsByResturantId($id);

            if ($meals) {
                echo json_encode($meals);
            } else {
                echo json_encode(["status" => "error", "message" => "No meals found."]);
            }
            break;


        // case 'updateMeal':
        //     $id = $_POST['id'] ?? '';
        //     $name = $_POST['name'] ?? '';
        //     $description = $_POST['description'] ?? '';
        //     $price = $_POST['price'] ?? 0;
        //     $category = $_POST['category'] ?? '';

        //     if (updateMeal($id, $name, $description, $price, $category)) {
        //         echo json_encode(["status" => "success", "message" => "Meal updated successfully."]);
        //     } else {
        //         echo json_encode(["status" => "error", "message" => "Failed to update meal."]);
        //     }
        //     break;

        case 'deleteMealByMealNameAndRsturantId':
            $id = $_POST['id'] ?? '';
            $id = $_POST['name'] ?? '';


            if (deleteMealByMealNameAndRsturantId($name,$id)) {
                echo json_encode(["status" => "success", "message" => "Meal deleted successfully."]);
            } else {
                echo json_encode(["status" => "error", "message" => "Failed to delete meal."]);
            }
            break;

        default:
            echo json_encode(["status" => "error", "message" => "Invalid action."]);
            break;
    }
} else {
    echo json_encode(["status" => "error", "message" => "No action specified."]);
}
?>