<?php
header('Content-Type: application/json');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'utils/db.php';

$sql = "
    SELECT 
        events.id,
        events.title,
        events.description,
        events.event_date,
        events.image_path,
        events.created_at,
        clubs.name AS club_name
    FROM events
    JOIN clubs ON events.club_id = clubs.id
    ORDER BY events.event_date ASC
";

$result = $conn->query($sql);

if (!$result) {
    http_response_code(500);
    echo json_encode(['error' => 'Database query failed']);
    exit;
}

$events = [];
while ($row = $result->fetch_assoc()) {
    $events[] = [
        'id' => (int)$row['id'],
        'title' => $row['title'],
        'description' => $row['description'],
        'event_date' => $row['event_date'],
        'image_path' => $row['image_path'],
        'created_at' => $row['created_at'],
        'club_name' => $row['club_name']
    ];
}

echo json_encode(['success' => true, 'events' => $events]);
