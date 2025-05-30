<?php
header('Content-Type: application/json');
require_once 'utils/db.php';

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['name'], $data['email'], $data['password'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing fields']);
    exit;
}

$name = $conn->real_escape_string($data['name']);
$email = $conn->real_escape_string($data['email']);
$password_hash = password_hash($data['password'], PASSWORD_BCRYPT);

$sql = "INSERT INTO users (name, email, password_hash) VALUES ('$name', '$email', '$password_hash')";
if ($conn->query($sql)) {
    echo json_encode(['success' => true]);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'User registration failed']);
}
