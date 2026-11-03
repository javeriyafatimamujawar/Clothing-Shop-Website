<!doctype html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>admin dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!----css3---->
    <link rel="stylesheet" href="css/custom.css">


    <!--google fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">


    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <style>
        /* Additional Custom Styles */
        .card {
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-family: 'Roboto', sans-serif;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.2);
        }

        .total-users {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            /* Adjust as needed */
            grid-gap: 20px;
            background: linear-gradient(to bottom right, #26c6da, #00acc1);
            /* Teal gradient */
        }

        .total-orders {
            display: grid;
            flex-wrap: wrap;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            /* Adjust as needed */
            grid-gap: 20px;
            background: linear-gradient(to bottom right, #66bb6a, #43a047);
            /* Green gradient */
        }

        .product {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            /* Adjust as needed */
            grid-gap: 20px;
            background: linear-gradient(to bottom right, #ffb300, #ffa000);
            /* Amber gradient */
        }

        .total-queries {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            /* Adjust as needed */
            grid-gap: 20px;
            background: linear-gradient(to bottom right, #008080, #00cccc);
            /* Green gradient */
        }

        .card-title {
            margin-bottom: 10px;
            font-size: 24px;
        }

        .card-text {
            font-size: 40px;
        }
    </style>
</head>

<body>


    <div class="wrapper">


        <div class="body-overlay"></div>

        <!-------------------------sidebar------------>
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h2><img src="img/logo.png" class="img-fluid" /></h2>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <a href="admin\home.php" class="dashboard"><i class="material-icons">dashboard</i>
                        <span>Dashboard</span></a>
                </li>


                <li>
                    <a href="products.php">
                        <i class="material-icons">aspect_ratio</i>Products</a>

                </li>

                <ul>
                    <li> <a href="viewcat.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                            </svg>View Categories</a>
                    </li>
                </ul>


                <ul>
                    <ul>
                        <li class="active"> <a href="reports.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                </svg>View Reports</a>
                        </li>
                    </ul>
                    <li>
                        <a href="orders.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0m-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z" />
                            </svg>Orders</a>

                    </li>
                </ul>

                <ul>
                    <li>
                        <a href="customers.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                            </svg>View customers</a>

                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="queries.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                            </svg>View Queries</a>

                    </li>
                </ul>




        </nav>




        <!--------page-content---------------->

        <div id="content">

            <!--top--navbar----design--------->

            <div class="top-navbar">
                <div class="xp-topbar">

                    <!-- Start XP Row -->
                    <div class="row">
                        <!-- Start XP Col -->
                        <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
                            <div class="xp-menubar">
                                <span class="material-icons text-white">signal_cellular_alt
                                </span>
                            </div>
                        </div>
                        <!-- End XP Col -->

                        <!-- Start XP Col -->
                        <div class="col-md-5 col-lg-3 order-4 order-md-2">

                        </div>
                        <!-- End XP Col -->

                        <!-- Start XP Col -->
                        <div class="col-10 col-md-6 col-lg-8 order-1 order-md-4">
                            <div class="xp-profilebar text-right">
                                <nav class="navbar p-0">
                                    <ul class="nav navbar-nav flex-row ml-auto">


                                        <li class="nav-item dropdown">
                                            <a class="nav-link" href="#" data-toggle="dropdown">
                                                <img src="img/admin.png" style="width:80px; border-radius:50%;height: 100%;" />
                                                <span class="xp-user-live"></span>
                                            </a>
                                            <ul class="dropdown-menu small-menu">

                                                <a href="../logout.php"><span class="material-icons">
                                                        logout</span>Logout</a>
                                        </li>
                                    </ul>
                                    </li>
                                    </ul>


                                </nav>

                            </div>
                        </div>
                        <!-- End XP Col -->

                    </div>
                    <!-- End XP Row -->

                </div>
                <div class="xp-breadcrumbbar text-center">
                    <h4 class="page-title">Dashboard</h4>

                </div>

            </div>
            <br>



            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'naqab');

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Sales Summary
            function getSalesSummary()
            {
                global $conn;
                $query = "
        SELECT 
            COUNT(*) as total_orders,
            SUM(total_amount) as total_revenue,
            AVG(total_amount) as average_order_value
        FROM orders
    ";
                return mysqli_query($conn, $query);
            }

            // Monthly Sales Trend
            function getMonthlySales()
            {
                global $conn;
                $query = "
        SELECT 
            DATE_FORMAT(order_date, '%M %Y') as month,
            COUNT(*) as order_count,
            SUM(total_amount) as revenue
        FROM orders
        GROUP BY MONTH(order_date), YEAR(order_date)
        ORDER BY order_date DESC
        LIMIT 6
    ";
                return mysqli_query($conn, $query);
            }

            // Best Selling Products
            function getBestSellers()
            {
                global $conn;
                $query = "
        SELECT 
            p.name as product_name,
            p.category,
            COUNT(o.id) as sales_count,
            SUM(o.total_amount) as revenue
        FROM orders o
        JOIN product p ON o.product_id = p.id
        GROUP BY p.id
        ORDER BY sales_count DESC
        LIMIT 5
    ";
                return mysqli_query($conn, $query);
            }

            // Inventory Status
            function getInventoryStatus()
            {
                global $conn;
                $query = "
        SELECT 
            category,
            COUNT(*) as total_products,
            SUM(quantity) as total_stock,
            SUM(CASE WHEN quantity <= 10 THEN 1 ELSE 0 END) as low_stock_items
        FROM product
        GROUP BY category
    ";
                return mysqli_query($conn, $query);
            }
            function getLowStockProducts()
            {
                global $conn;
                $query = "
        SELECT 
            id, 
            name, 
            quantity, 
            category
        FROM product
        WHERE quantity <= 10
        ORDER BY quantity ASC
    ";
                return mysqli_query($conn, $query);
            }
            ?>

            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Naqab Shop Reports</title>
                <style>
                    .report-container {
                        width: 90%;
                        max-width: 1200px;
                        margin: 20px auto;
                        background-color: white;
                        padding: 20px;
                        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                        border-radius: 8px;
                    }

                    .report-table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-bottom: 20px;
                    }

                    .report-table th,
                    .report-table td {
                        border: 1px solid #ddd;
                        padding: 12px;
                        text-align: left;
                    }

                    .report-table thead {
                        background-color: #f8f9fa;
                        font-weight: bold;
                    }

                    .report-title {
                        text-align: center;
                        color: #333;
                        margin-bottom: 20px;
                    }

                    .table-responsive {
                        overflow-x: auto;
                    }

                    @media screen and (max-width: 768px) {
                        body {
                            margin-top: 80px;
                        }

                        .report-container {
                            width: 95%;
                        }
                    }
                </style>
            </head>

            <body>
                <div class="report-container">
                    <h2 class="report-title">Sales Overview</h2>
                    <div class="row">
                        <?php
                        $sales_summary = getSalesSummary();
                        $summary = mysqli_fetch_assoc($sales_summary);
                        ?>
                        <div class="col-md-4">
                            <div class="metric-card">
                                <div class="metric-title">Total Orders</div>
                                <div class="metric-value"><?php echo number_format($summary['total_orders']); ?></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="metric-card">
                                <div class="metric-title">Total Revenue</div>
                                <div class="metric-value">₹<?php echo number_format($summary['total_revenue'], 2); ?></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="metric-card">
                                <div class="metric-title">Average Order Value</div>
                                <div class="metric-value">₹<?php echo number_format($summary['average_order_value'], 2); ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="report-container">
                    <h2 class="report-title">Monthly Sales Trend</h2>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Month</th>
                                    <th>Orders</th>
                                    <th>Revenue</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $monthly_sales = getMonthlySales();
                                while ($row = mysqli_fetch_assoc($monthly_sales)):
                                ?>
                                    <tr>
                                        <td><?php echo $row['month']; ?></td>
                                        <td><?php echo $row['order_count']; ?></td>
                                        <td>₹<?php echo number_format($row['revenue'], 2); ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="report-container">
                    <h2 class="report-title">Best Selling Products</h2>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Category</th>
                                    <th>Sales Count</th>
                                    <th>Revenue</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $best_sellers = getBestSellers();
                                while ($row = mysqli_fetch_assoc($best_sellers)):
                                ?>
                                    <tr>
                                        <td><?php echo $row['product_name']; ?></td>
                                        <td><?php echo $row['category']; ?></td>
                                        <td><?php echo $row['sales_count']; ?></td>
                                        <td>₹<?php echo number_format($row['revenue'], 2); ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="report-container">
                    <h2 class="report-title">Inventory Status by Category</h2>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Total Products</th>
                                    <th>Total Stock</th>
                                    <th>Low Stock Items</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $inventory_status = getInventoryStatus();
                                while ($row = mysqli_fetch_assoc($inventory_status)):
                                    $status_class = $row['low_stock_items'] > 0 ? 'status-warning' : 'status-good';
                                ?>
                                    <tr>
                                        <td><?php echo $row['category']; ?></td>
                                        <td><?php echo $row['total_products']; ?></td>
                                        <td><?php echo $row['total_stock']; ?></td>
                                        <td class="<?php echo $status_class; ?>"><?php echo $row['low_stock_items']; ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="report-container">
                    <h2 class="report-title">Low Stock Products</h2>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $low_stock = getLowStockProducts();
                                while ($row = mysqli_fetch_assoc($low_stock)):
                                ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['quantity']; ?></td>
                                        <td><?php echo $row['category']; ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <script src="js/jquery-3.3.1.slim.min.js"></script>
                <script src="js/popper.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/jquery-3.3.1.min.js"></script>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $(".xp-menubar").on('click', function() {
                            $('#sidebar').toggleClass('active');
                            $('#content').toggleClass('active');
                        });

                        $(".xp-menubar,.body-overlay").on('click', function() {
                            $('#sidebar,.body-overlay').toggleClass('show-nav');
                        });

                    });
                </script>
            </body>

            </html>
            <?php mysqli_close($conn); ?>