<?php include 'header.php' ?>

<style>
    .products {
        display: flex;
        flex-wrap: wrap;
        gap: 60px;
        justify-content: center;
    }

    .row {
        width: 350px;
        /* Fixed width */
        height: 480px;
        /* Increased height */
        display: flex;
        flex-direction: column;
        align-items: center;
        border: 1px solid #ddd;
        padding: 15px;
        box-sizing: border-box;
        justify-content: space-between;
        /* Ensures even spacing between elements */
    }

    .row img {
        width: 200px;
        /* Fixed image width */
        height: 200px;
        /* Fixed image height */
        object-fit: cover;
        margin-bottom: 10px;
    }

    .product-text {
        text-align: center;
        margin-bottom: 10px;
    }

    .row .view-btn,
    .row .cart-btn {
        width: 70%;
        margin-top: 10px;
    }
</style>

<section class="trending-product" id="trending" style="margin-top :120px;">
    <div class="center-text">
        <h2><span>Accessories</span></h2>
    </div>
    <div class="products">
        <?php
        $query = "SELECT * FROM product where category='accessories'";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $images = json_decode($row['image'], true);
            $first_image = $images ? 'admin/images/' . htmlspecialchars($images[0]) : 'default.jpg';

            echo "
            <div class='row' data-product-name='{$row['name']}' data-product-price='{$row['price']}'>
                <img src='{$first_image}' alt='{$row['name']}' style='object-fit: cover;'>
                <div class='product-text'>
                    <h4>{$row['name']}</h4>
                    <p>₹{$row['price']}</p>
                    <p>{$row['description']}</p>
                </div>
                <button class='view-btn' onclick='viewProductDetails({$row['id']})'>View Details</button>
        <a href='add_to_cart.php?product_id={$row['id']}' class='cart-btn'>Add to Cart</a>
        <a href='order.php?id={$row['id']}'class='cart-btn'>Buy Now</a>
            </div>";
        }
        ?>
    </div>
</section>
<script>
    function viewProductDetails(productId) {
        window.location.href = 'product-details.php?id=' + productId;
    }
</script>

<?php include 'footer.php' ?>