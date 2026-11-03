<?php
session_start();
include 'config.php';

header('Content-Type: application/json');

// Validate user authentication
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Please login first']);
    exit();
}

$user_id = $_SESSION['user_id'];
$cart_item_id = $_GET['cart_item_id'];

// Validate cart item belongs to the logged-in user
$query = "DELETE FROM cart WHERE id = ? AND user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $cart_item_id, $user_id);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Item removed from cart']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to remove item']);
}

$stmt->close();
$conn->close();
?>