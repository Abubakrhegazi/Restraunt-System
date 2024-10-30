<?php

// Include the database connection
require_once '../config/db.php';


// Function to add a new user securely
function addUser($username, $email, $password, $role, $phoneNumber)
{
    global $con;
    $sql = "INSERT INTO users (name, email, password, role, phone_number) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $username, $email, $password, $role, $phoneNumber); // "ssss" means 4 strings
    return mysqli_stmt_execute($stmt);
}

// Function to get a user by their ID securely
function getUserById($userId)
{
    global $con;
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $userId); // "i" means integer
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}

// Function to update a user's details securely
function updateUser($userId, $username, $email, $role)
{
    global $con;
    $sql = "UPDATE users SET name = ?, email = ?, role = ? WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "sssi", $username, $email, $role, $userId);
    return mysqli_stmt_execute($stmt);
}

// Function to delete a user by ID securely
function deleteUser($userId)
{
    global $con;
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $userId);
    return mysqli_stmt_execute($stmt);
}

// Function to retrieve all users securely
function getAllUsers()
{
    global $con;
    $sql = "SELECT * FROM users";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $users = [];
    while ($user = mysqli_fetch_assoc($result)) {
        $users[] = $user;
    }
    return $users;
}


?>
