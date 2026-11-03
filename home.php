<?php include 'header.php'; ?>
<section class="main-home">
    <div class="main-text">
        <h5>NAQAB Collection</h5>
        <h1>Elegant &<br> Modest Abayas</h1>
        <p>Discover the perfect blend of style and modesty.</p>
        <a href="shop.php" class="main-btn">Shop Now<i class="bx bx-right-arrow-alt"></i></a>
    </div>
    <div class="down-arrow">
        <a href="#categories" class="down"><i class="bx bx-down-arrow-alt"></i></a>
    </div>
</section>

<section class="categories" id="categories">
    <div class="center-text">
        <h2>Shop by <span>Category</span></h2>
    </div>
    <div class="category-grid">
        <?php
        $categories = ["Abaya", "Hijab", "Niqab", "Accessories"];
        foreach ($categories as $category) {
            $lowercase = strtolower($category);
            echo "
            <div class='category-item'>
                <a href='{$lowercase}.php'>
                    <img src='{$lowercase}-category.jpg' alt='{$category}'>
                    <div class='category-name'>{$category}</div>
                </a>
            </div>";
        }
        ?>
    </div>
</section>



<?php include 'footer.php'; ?>

<script>
    function viewProductDetails(productId) {
        window.location.href = 'product-details.php?id=' + productId;
    }
</script>