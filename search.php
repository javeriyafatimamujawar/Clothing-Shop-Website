<?php
include 'config.php';
include 'header.php';
?>
<br>
<br>
<section class="search-results">
    <div class="container">
        <?php
        if(isset($_GET['query'])) {
            $search_query = mysqli_real_escape_string($conn, $_GET['query']);
            
            // Search query with partial name matching
            $query = "SELECT * FROM product WHERE name LIKE '%$search_query%'";
            $result = mysqli_query($conn, $query);
            
            if(mysqli_num_rows($result) > 0) {
                echo "<h2>Search Results for: " . htmlspecialchars($search_query) . "</h2>";
                echo "<div class='products'>";
                
                while($row = mysqli_fetch_assoc($result)) {
                    $images = json_decode($row['image'], true);
                    $first_image = $images ? 'admin/images/' . htmlspecialchars($images[0]) : 'default.jpg';
                    
                    echo "
                    <div class='row' data-product-id='{$row['id']}'>
                        <img src='{$first_image}' alt='" . htmlspecialchars($row['name']) . "'>
                        <div class='product-text'>
                            <h4>" . htmlspecialchars($row['name']) . "</h4>
                            <p style=margin-left:90px;>₹{$row['price']}</p>
                        </div>
                        <button class='view-btn' onclick='viewProductDetails({$row['id']})'>View Details</button>
                        <a href='add_to_cart.php?product_id={$row['id']}' class='cart-btn'>Add to Cart</a>
                        <a href='order.php?id={$row['id']}'class='cart-btn'>Buy Now</a>
                    </div>";
                }
                echo "</div>";
            } else {
                echo "<div class='no-results'>";
                echo "<h2>No Products Found</h2>";
                echo "<p>Sorry, no products match your search for '" . htmlspecialchars($search_query) . "'.</p>";
                echo "<a href='home.php' class='btn'>Back to Home</a>";
                echo "</div>";
            }
        }
        ?>
    </div>
</section>

<style>
.search-results .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.no-results {
    text-align: center;
    padding: 50px 0;
}

.no-results h2 {
    color: #333;
    margin-bottom: 20px;
}

.no-results .btn {
    display: inline-block;
    background-color: #000;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    margin-top: 20px;
}

.products {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

.row {
    width: 250px;
    border: 1px solid #ddd;
    padding: 15px;
    text-align: center;
}

.row img {
    width: 200px;
    height: 200px;
    object-fit: cover;
}
</style>

<script>
function viewProductDetails(productId) {
    window.location.href = 'product-details.php?id=' + productId;
}
</script>

<?php include 'footer.php'; ?>