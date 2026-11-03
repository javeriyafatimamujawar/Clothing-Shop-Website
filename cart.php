<?php
session_start();
include 'config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
?>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'warning',
                title: 'Login Required',
                text: 'Please login first to view your cart!',
                confirmButtonText: 'Login Now',
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'login.php';
                }
            });
        });
    </script>
<?php
    exit();
}

$user_id = $_SESSION['user_id'];

// Remove item from cart if requested
if (isset($_GET['remove']) && is_numeric($_GET['remove'])) {
    $cart_item_id = intval($_GET['remove']);

    $remove_query = "DELETE FROM cart WHERE id = ? AND user_id = ?";
    $remove_stmt = $conn->prepare($remove_query);
    $remove_stmt->bind_param("ii", $cart_item_id, $user_id);

    if ($remove_stmt->execute()) {
        echo "<script>
        alert('Item removed from cart successfully!');
        window.location.href = 'cart.php';
        </script>";
        exit();
    }
}

include 'header.php';
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<div class="container"><br>
    <h2>Your Cart</h2>
    <table id="cartTable" class="table table-bordered">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $cart_query = "SELECT c.id, p.id AS product_id, p.name, p.price 
            FROM cart c 
            JOIN product p ON c.product_id = p.id 
            WHERE c.user_id = ?";
            $cart_stmt = $conn->prepare($cart_query);
            $cart_stmt->bind_param("i", $user_id);
            $cart_stmt->execute();
            $cart_result = $cart_stmt->get_result();

            $total = 0;
            if ($cart_result->num_rows > 0) {
                while ($cart_item = $cart_result->fetch_assoc()) {
                    $total += $cart_item['price'];
            ?>
                    <tr>
                        <td><?php echo htmlspecialchars($cart_item['name']); ?></td>
                        <td>₹<?php echo number_format($cart_item['price'], 2); ?></td>
                        <td>
                            <a href="cart.php?remove=<?php echo $cart_item['id']; ?>"
                                onclick="return confirm('Are you sure you want to remove this item?');"
                                class="btn btn-danger btn-sm remove-item">
                                <i class="bi bi-trash"></i>
                            </a>
                            <button class="btn btn-success btn-sm" onclick="window.location.href='order.php?id=<?php echo $cart_item['product_id']; ?>'">
                                <i class="bi bi-bag-fill"></i>
                            </button>
                        </td>
                    </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='3' class='text-center'>Your cart is empty</td></tr>";
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Total</th>
                <th>₹<?php echo number_format($total, 2); ?></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
    <h2> Click Here to See Your Orders
        <a href="myorder.php" class="main-btn" style="text-align: center;">My Orders</a>
    </h2>
</div>
<?php
include 'footer.php';
$cart_stmt->close();
$conn->close();
?>