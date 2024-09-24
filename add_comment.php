<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id']; // Get the user ID from form input
    $username = $_POST['username'];

    $receiver_name = empty($_POST['receiver_name']) ? '' : $_POST['receiver_name'];
    
    $comment = $_POST['comment'];
    $parent_id = $_POST['parent_id'] ?? null;

    $stmt = $conn->prepare("INSERT INTO comments (user_id, username, receiver_name, parent_id, comment) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issis", $user_id, $username, $receiver_name, $parent_id, $comment);
    if($stmt->execute()) {
        echo "Message Add Successfully";
    } else {
        echo "FAILED To Submit Message";
    }
}

?>
