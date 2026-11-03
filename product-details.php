<?php
include 'header.php';

if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);

    $query = "SELECT * FROM product WHERE id = $product_id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $images = json_decode($row['image'], true);
?>

        <section class="product-details" style="margin-top:120px">
            <div class="product-container">
                <div class="product-gallery">
                    <div class="main-image">
                        <img src="admin/images/<?php echo htmlspecialchars($images[0]); ?>" alt="Main Product Image">
                    </div>
                    <div class="product-thumbnails">
                        <?php
                        foreach ($images as $index => $image) {
                            echo "<img src='admin/images/" . htmlspecialchars($image) . "' alt='Product Image " . ($index + 1) . "' onclick='changeMainImage(this)'>";
                        }
                        ?>
                    </div>
                </div>

                <div class="product-info">
                    <h1><?php echo htmlspecialchars($row['name']); ?></h1>
                    <p class="price">₹<?php echo number_format($row['price'], 2); ?></p>

                    <div class="product-description">
                        <h3>Description</h3>
                        <p><?php echo htmlspecialchars($row['description']); ?></p>
                    </div>

                    <div class="product-actions">
                        <!-- <form action="cart.php" method="post">
                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                    <button type="submit" name="add_to_cart" class='cart-btn'>Add to Cart</button>
                </form>
                <form action="buy_now.php" method="post">
                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                    <button type="submit" name="buy_now" class="buy-now">Buy Now</button>
                </form> -->
                        <form action="shop.php" method="post">
                            <button type="submit" class="buy-now">View Products</button>
                        </form>
                        <form action="sizeguide.php" method="post">
                            <button type="submit" class="buy-now">Size Guides</button>
                        </form>
                        <br><br>
                        <form action='add_to_cart.php' method='get'>
                            <button type='submit' class='buy-now' name='product_id' value='<?php echo $row['id']; ?>'>Add to Cart</button>
                        </form>

                        <form action='order.php' method='get'>
                            <button type='submit' class='buy-now' name='id' value='<?php echo $row['id']; ?>'>Buy Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <script>
            function changeMainImage(thumbnail) {
                const mainImage = document.querySelector('.main-image img');
                mainImage.src = thumbnail.src;
            }
        </script>

        <style>
            .product-details {
                display: flex;
                justify-content: center;
                padding: 50px 0;
            }

            .product-container {
                display: flex;
                width: 80%;
                gap: 50px;
            }

            .product-gallery {
                flex: 1;
            }

            .main-image {
                margin-bottom: 20px;
            }

            .main-image img {
                width: 100%;
                height: 500px;
                object-fit: cover;
            }

            .product-thumbnails {
                display: flex;
                gap: 10px;
            }

            .product-thumbnails img {
                width: 100px;
                height: 100px;
                object-fit: cover;
                cursor: pointer;
                border: 2px solid transparent;
                transition: border-color 0.3s;
            }

            .product-thumbnails img:hover {
                border-color: #000;
            }

            .product-info {
                flex: 1;
            }

            .product-info h1 {
                margin-bottom: 10px;
            }

            .price {
                font-size: 24px;
                color: #333;
                margin-bottom: 20px;
            }

            .product-description {
                margin-bottom: 30px;
            }

            .product-actions {
                display: flex;
                gap: 20px;
            }

            .product-actions form {
                width: 50%;
            }

            .product-actions button {
                width: 100%;
                padding: 10px 20px;
                border: none;
                cursor: pointer;
            }

            .add-to-cart {
                background-color: #f0f0f0;
            }

            .buy-now {
                background-color: #000;
                color: white;
            }
        </style>

<?php
    } else {
        echo "Product not found.";
    }
} else {
    echo "Invalid product ID.";
}

include 'footer.php';
?>