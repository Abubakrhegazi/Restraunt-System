<?php
require_once 'db.php';

function getUserById($id) {
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function getUserByEmail($email) {
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function createUser($name, $email, $password, $role_id) {
    global $mysqli;
    $stmt = $mysqli->prepare("INSERT INTO users (name, email, password, role_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $name, $email, $password, $role_id);
    return $stmt->execute();
}

function updateUser($id, $name, $email, $role_id) {
    global $mysqli;
    $stmt = $mysqli->prepare("UPDATE users SET name = ?, email = ?, role_id = ? WHERE id = ?");
    $stmt->bind_param("ssii", $name, $email, $role_id, $id);
    return $stmt->execute();
}

function deleteUser($id) {
    global $mysqli;
    $stmt = $mysqli->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
?>
