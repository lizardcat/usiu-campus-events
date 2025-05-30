<?php
header('Content-Type: application/json');
require_once 'utils/db.php';

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['title'], $data['description'], $data['event_date'], $data['club_id'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing fields']);
    exit;
}

$title = $conn->real_escape_string($data['title']);
$description = $conn->real_escape_string($data['description']);
$event_date = $conn->real_escape_string($data['event_date']);
$club_id = intval($data['club_id']);

$sql = "INSERT INTO events (title, description, event_date, club_id) 
        VALUES ('$title', '$description', '$event_date', $club_id)";
if ($conn->query($sql)) {
    echo json_encode(['success' => true]);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Event creation failed']);
}
