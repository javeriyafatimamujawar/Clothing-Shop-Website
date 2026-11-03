<?php
session_start();
include 'config.php';
include 'header.php';

// Check if product details are provided
$productName = $_GET['name'] ?? '';
$productPrice = $_GET['price'] ?? 0;
// Ensure user is logged in
// if (!isset($_SESSION['customer_id'])) {
//     echo "<div class='alert alert-danger'>Please log in to continue.</div>";
//     exit();
// }
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h1>Buy Product</h1>
                </div>
                <div class="card-body">
                    <form id="buyNowForm" action="conforder.php">
                        <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($productName); ?>">
                        <input type="hidden" name="product_price" value="<?php echo floatval($productPrice); ?>">
                        <!-- <input type="hidden" name="customer_id" value="<?php echo $_SESSION['customer_id']; ?>"> -->
                        <div class="form-group mb-3">
                            <label for="productName">Product Name</label>
                            <input type="text" class="form-control" id="productName"
                                value="<?php echo htmlspecialchars($productName); ?>" readonly>
                        </div>

                        <div class="form-group mb-3">
                            <label for="productPrice">Price</label>
                            <input type="text" class="form-control" id="productPrice"
                                value="₹<?php echo number_format($productPrice, 2); ?>" readonly>
                        </div>

                        <div class="form-group mb-3">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" id="quantity"
                                name="quantity" min="1" value="1" required>
                        </div>

                        <button type="submit" id="confirmOrderBtn" class="btn btn-primary">
                            Confirm Order
                        </button>
                    </form>
                </div>
            </div>

            <!-- Confirmation Modal -->
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>