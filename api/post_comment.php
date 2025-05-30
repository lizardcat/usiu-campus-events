<?php
header('Content-Type: application/json');
require_once 'utils/db.php';

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['event_id'], $data['user_id'], $data['message'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing fields']);
    exit;
}

$event_id = intval($data['event_id']);
$user_id = intval($data['user_id']);
$message = $conn->real_escape_string($data['message']);

$sql = "INSERT INTO comments (user_id, event_id, message) VALUES ($user_id, $event_id, '$message')";
if ($conn->query($sql)) {
    echo json_encode(['success' => true, 'message' => 'Comment posted']);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Database insert failed']);
}
