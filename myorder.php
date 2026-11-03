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
                text: 'Please login first to view your orders!',
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

include 'header.php';
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<div class="container"><br>
    <h2>Your Orders</h2>
    <table id="cartTable" class="table table-bordered">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $orders_query = "SELECT * FROM orders 
                           WHERE customer_id = ?
                           ORDER BY order_date DESC";
            $orders_stmt = $conn->prepare($orders_query);
            $orders_stmt->bind_param("i", $user_id);
            $orders_stmt->execute();
            $orders_result = $orders_stmt->get_result();

            $total = 0;
            if ($orders_result->num_rows > 0) {
                while ($order = $orders_result->fetch_assoc()) {
                    $total += $order['total_amount'];
            ?>
                    <tr>
                        <td><?php echo htmlspecialchars($order['product_name']); ?></td>
                        <td><?php echo number_format($order['quantity']); ?></td>
                        <td>₹<?php echo number_format($order['total_amount'], 2); ?></td>
                        <td><?php echo $order['order_date']; ?></td>
                    </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='4' class='text-center'>You haven't placed any orders yet</td></tr>";
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Total</th><th></th><th></th>
                <th colspan='3'>₹<?php echo number_format($total, 2); ?></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>

<script>
function showOrderDetails(orderId) {
    // Fetch order details using AJAX
    fetch('get_order_details.php?id=' + orderId)
        .then(response => response.json())
        .then(data => {
            Swal.fire({
                title: 'Order Details',
                html: `
                    <div class="text-left">
                        <p><strong>Quantity:</strong> ${data.quantity}</p>
                        <p><strong>Delivery Address:</strong> ${data.address}</p>
                        <p><strong>State:</strong> ${data.state}</p>
                        <p><strong>Pincode:</strong> ${data.pincode}</p>
                        <p><strong>Order Date:</strong> ${data.order_date}</p>
                    </div>
                `,
                confirmButtonText: 'Close'
            });
        })
        .catch(error => {
            Swal.fire('Error', 'Failed to load order details', 'error');
        });
}
</script>

<?php
include 'footer.php';
$orders_stmt->close();
$conn->close();
?>