<?php
session_start();
include 'config.php';
include 'header.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'warning',
                title: 'Not Logged In',
                text: 'Please log in to place an order',
                confirmButtonText: 'Login',
                cancelButtonText: 'Cancel',
                showCancelButton: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'login.php';
                }
            });
        });
        </script>
    </body>
    </html>
    <?php
    exit();
}

// Check if product ID is provided
if (!isset($_GET['id'])) {
    die("No product selected");
}

$productId = intval($_GET['id']);
$customerId = $_SESSION['user_id'];

// Fetch product details with quantity check
$stmt = $conn->prepare("SELECT name, price, quantity FROM product WHERE id = ?");
$stmt->bind_param("i", $productId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Product not found");
}

$product = $result->fetch_assoc();

// Check product availability
if ($product['quantity'] <= 0) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'warning',
                title: 'Out of Stock',
                text: 'Sorry, this product is out of stock. Please check another product.',
                confirmButtonText: 'OK'
            }).then((result) => {
                window.location.href = 'cart.php';
            });
        });
        </script>
    </body>
    </html>
    <?php
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Order Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="checkout-container" style="margin-top:120px;">
        <form id="buyNowForm" action="" class="checkout-form">
        <h2>Order Details</h2>
            <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
            <input type="hidden" name="customer_id" value="<?php echo $customerId; ?>">
            
            <div class="flex-container">
                <div class="input-box">
                    <label for="productName">Product Name</label>
                    <input type="text" class="form-control" id="productName"
                        value="<?php echo htmlspecialchars($product['name']); ?>" readonly>
                </div>
            </div>

            <div class="input-box">
                <label for="address">Address</label>
                <textarea id="address" name="address" placeholder="Enter your address" rows="3" required></textarea>
            </div>

            <div class="flex-container">
                <div class="input-box">
                    <label for="pincode">Pin Code</label>
                    <input type="text" id="pincode" name="pincode" placeholder="Enter your pin code" required>
                </div>
                <div class="input-box">
                    <label for="state">State</label>
                    <select id="state" name="state" required>
                        <option value="">Select State</option>
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Odisha">Odisha</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="Uttarakhand">Uttarakhand</option>
                        <option value="West Bengal">West Bengal</option>
                    </select>
                </div>
            </div>

            <div class="input-box">
                <label for="productPrice">Product Price</label>
                <input type="text" class="form-control" id="productPrice"
                    value="₹<?php echo number_format($product['price'], 2); ?>" readonly>
            </div>

            <div class="flex-container">
                <div class="input-box">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" id="quantity"
                        name="quantity" min="1" max="<?php echo $product['quantity']; ?>" value="1" required>
                </div>
            </div>

            <div class="flex-container">
                <div class="input-box">
                    <label for="totalAmount">Total Amount</label>
                    <input type="text" id="totalAmount" name="totalAmount" 
                           value="₹<?php echo number_format($product['price'], 2); ?>" readonly>
                </div>
            </div>

            <!-- Payment Method -->
            <style>
                /* Payment Method Section */
.radio-group {
    display: flex;
    align-items: center;
    gap: 10px; /* Spacing between radio button and text */
    margin-top: 5px;
}

.radio-group label {
    display: flex;
    align-items: center;
    font-size: 16px;
    cursor: pointer;
}

.radio-group input[type="radio"] {
    width: 18px;
    height: 18px;
    margin-right: 8px; /* Space between radio button and text */
    accent-color: #000; /* Change radio button color */
}
             </style>
    <div class="input-box">
        <label>Payment Method</label>
        <div class="radio-group">
        <label for="cod">
            <input type="radio" id="cod" name="paymentMethod" value="cod" required>
            Cash on Delivery (COD)
        </label>
        </div>
     </div>
     
            <button type="submit" class="main-btn">Confirm Order</button>
        </form>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Calculate total amount dynamically
        const priceInput = document.getElementById('productPrice');
        const quantityInput = document.getElementById('quantity');
        const totalAmountInput = document.getElementById('totalAmount');

        quantityInput.addEventListener('input', function() {
            const price = parseFloat(priceInput.value.replace('₹', '').replace(',', ''));
            const quantity = parseInt(quantityInput.value);
            const total = price * quantity;
            totalAmountInput.value = '₹' + total.toLocaleString('en-IN', {minimumFractionDigits: 2, maximumFractionDigits: 2});
        });

        // Form submission
        document.getElementById('buyNowForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Get form data
            const formData = new FormData(this);

            // Send AJAX request to process order
            fetch('process_order.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Order Confirmed',
                        text: 'Your order has been successfully placed!',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = 'cart.php';
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Order Failed',
                        text: data.message || 'Unable to process your order'
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while processing your order'
                });
            });
        });
    });
    </script>
</body>
</html>
<?php include 'footer.php' ?>