<?php
session_start();
include 'config.php';

header('Content-Type: application/json');

// Validate user authentication
if (!isset($_SESSION['user_id'])) {
    echo json_encode([]);
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch cart items specific to the logged-in user
$query = "SELECT c.id, c.product_id, p.name AS product_name, p.price AS product_price 
          FROM cart c 
          JOIN products p ON c.product_id = p.id 
          WHERE c.user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$cart_items = [];
while ($row = $result->fetch_assoc()) {
    $cart_items[] = $row;
}

echo json_encode($cart_items);

$stmt->close();
$conn->close();
?>