<?php
header('Content-Type: application/json');
require_once 'utils/db.php';
require_once '../lib/PHPMailer/PHPMailer.php';
require_once '../lib/PHPMailer/SMTP.php';
require_once '../lib/PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
    // Fetch user email and event title
    $userResult = $conn->query("SELECT email FROM users WHERE id = $user_id");
    $eventResult = $conn->query("SELECT title FROM events WHERE id = $event_id");

    if ($userResult && $eventResult && $userResult->num_rows && $eventResult->num_rows) {
        $userEmail = $userResult->fetch_assoc()['email'];
        $eventTitle = $eventResult->fetch_assoc()['title'];

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';      
            $mail->SMTPAuth = true;
            $mail->Username = getenv('SMTP_USER');  
            $mail->Password = getenv('SMTP_PASS');     
            $mail->SMTPSecure = null;             
            $mail->Port = 2525;                        

            $mail->setFrom('no-reply@usiu-campus.com', 'USIU Events');
            $mail->addAddress($userEmail);
            $mail->Subject = 'Event Registration Confirmed';
            $mail->Body = "You have successfully registered for: $eventTitle";

            $mail->send();
        } catch (Exception $e) {
            // Log error or ignore silently
        }
    }

    echo json_encode(['success' => true]);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Registration failed']);
}
