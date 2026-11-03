<?php
session_start();
include 'db_connection.php';

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate inputs
    $product_id = intval($_POST['product_id']);
    $customer_id = intval($_POST['customer_id']);
    $quantity = intval($_POST['quantity']);
    $address = $_POST['address'];

    // Start transaction
    $conn->begin_transaction();

    try {
        // Check product availability
        $product_query = "SELECT quantity, price FROM products WHERE product_id = ? FOR UPDATE";
        $stmt = $conn->prepare($product_query);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();

        if ($product['quantity'] < $quantity) {
            throw new Exception("Insufficient stock");
        }

        // Calculate total amount
        $total_amount = $product['price'] * $quantity;

        // Insert order
        $order_query = "INSERT INTO orders (customer_id, product_id, quantity, total_amount, address) 
                        VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($order_query);
        $stmt->bind_param("iidss", $customer_id, $product_id, $quantity, $total_amount, $address);
        $stmt->execute();

        // Update product quantity
        $update_query = "UPDATE products SET quantity = quantity - ? WHERE product_id = ?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("ii", $quantity, $product_id);
        $stmt->execute();

        // Commit transaction
        $conn->commit();

        // Redirect with success message
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Order Placed',
            text: 'Your order has been successfully placed.',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'orders.php';
        });
        </script>";
    } catch (Exception $e) {
        // Rollback transaction
        $conn->rollback();

        // Show error message
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Order Failed',
            text: 'Unable to place order: " . $e->getMessage() . "',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'cart.php';
        });
        </script>";
    }
} else {
    // Redirect if accessed directly
    header("Location: cart.php");
    exit();
}
?>