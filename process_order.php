<?php
session_start();
include 'config.php';

header('Content-Type: application/json');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Not logged in']);
    exit();
}

// Validate and sanitize input
$productId = intval($_POST['product_id']);
$customerId = intval($_POST['customer_id']);
$quantity = intval($_POST['quantity']);
$address = $conn->real_escape_string($_POST['address']);
$pincode = $conn->real_escape_string($_POST['pincode']);
$state = $conn->real_escape_string($_POST['state']);

// Fetch product details
$stmt = $conn->prepare("SELECT name, price, quantity FROM product WHERE id = ?");
$stmt->bind_param("i", $productId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode(['success' => false, 'message' => 'Product not found']);
    exit();
}

$product = $result->fetch_assoc();

// Check product availability
if ($product['quantity'] < $quantity) {
    echo json_encode(['success' => false, 'message' => 'Insufficient stock']);
    exit();
}

// Calculate total amount
$totalAmount = $product['price'] * $quantity;

// Begin transaction
$conn->begin_transaction();

try {
    // Insert order
    $stmt = $conn->prepare("INSERT INTO orders (product_id, customer_id, product_name, quantity, total_amount, address, pincode, state) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iisidsss", $productId, $customerId, $product['name'], $quantity, $totalAmount, $address, $pincode, $state);
    $stmt->execute();

    // Update product quantity
    $stmt = $conn->prepare("UPDATE product SET quantity = quantity - ? WHERE id = ?");
    $stmt->bind_param("ii", $quantity, $productId);
    $stmt->execute();

    // Commit transaction
    $conn->commit();

    echo json_encode(['success' => true]);
} catch (Exception $e) {
    // Rollback transaction
    $conn->rollback();
    echo json_encode(['success' => false, 'message' => 'Error processing order']);
}
?>