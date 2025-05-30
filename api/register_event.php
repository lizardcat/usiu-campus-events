<?php
header('Content-Type: application/json');
require_once 'utils/db.php';

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['user_id'], $data['event_id'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing fields']);
    exit;
}

$user_id = intval($data['user_id']);
$event_id = intval($data['event_id']);

$sql = "INSERT IGNORE INTO registrations (user_id, event_id) VALUES ($user_id, $event_id)";
if ($conn->query($sql)) {
    echo json_encode(['success' => true]);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Registration failed']);
}
