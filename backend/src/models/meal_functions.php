<?php

// Include the database connection
require_once '../config/db.php';

// Function to get a meal by their resturant ID securely
function getAllMealsByResturantId($resturantId)
{
    global $con;
    $sql = "SELECT * FROM meals WHERE resturant_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $resturantId); // "i" means integer
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $meals = [];
    while ($meal = mysqli_fetch_assoc($result)) {
        $meals[] = $meal;
    }
    return $meals;
}

function deleteMealByMealNameAndRsturantId($name,$id){
    global $con;
    $sql = "DELETE FROM meals WHERE meal_name = ? and meal_id = ? ";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "si", $name, $id); // "i" means integer
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
}