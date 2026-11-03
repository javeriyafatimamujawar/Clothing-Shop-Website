<?php
session_start();
include 'config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>
    alert('Please login first to add items to cart!');
    window.location.href = 'login.php';
    </script>";
    exit();
}

// Get product details from GET or POST
$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;
$user_id = $_SESSION['user_id'];

// Validate product ID
if ($product_id <= 0) {
    echo "<script>
    alert('Invalid product!');
    window.location.href = 'shop.php';
    </script>";
    exit();
}

// Fetch product details
$query = "SELECT * FROM product WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "<script>
    alert('Product not found!');
    window.location.href = 'shop.php';
    </script>";
    exit();
}

$product = $result->fetch_assoc();

// Check if product already in cart
$check_query = "SELECT * FROM cart WHERE user_id = ? AND product_id = ?";
$check_stmt = $conn->prepare($check_query);
$check_stmt->bind_param("ii", $user_id, $product_id);
$check_stmt->execute();
$check_result = $check_stmt->get_result();

if ($check_result->num_rows > 0) {
    echo "<script>
    alert('Product already in cart!');
    window.location.href = 'cart.php';
    </script>";
    exit();
}

// Insert product into cart
$insert_query = "INSERT INTO cart (user_id, product_id, product_name, product_price) VALUES (?, ?, ?, ?)";
$insert_stmt = $conn->prepare($insert_query);
$insert_stmt->bind_param("iiss", $user_id, $product_id, $product['name'], $product['price']);

if ($insert_stmt->execute()) {
    echo "<script>
    alert('Product added to cart successfully!');
    window.location.href = 'cart.php';
    </script>";
} else {
    echo "<script>
    alert('Failed to add product to cart!');
    window.location.href = 'shop.php';
    </script>";
}

$stmt->close();
$check_stmt->close();
$insert_stmt->close();
$conn->close();
?>