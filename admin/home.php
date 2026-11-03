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
        <li class="active">
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
            <li> <a href="reports.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
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
      <!-- <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"></h5>
    <p class="card-text"></p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div> -->


      <!--------main-content------------->
      <div id="logoutModal" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="logout.php" method="POST">
              <div class="modal-header">
                <h4 class="modal-title">Delete all Products</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                <p>Are you sure you want to delete all these Products?</p>
                <p class="text-warning"><small>This action cannot be undone.</small></p>
              </div>
              <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-danger" value="Delete">
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="container mt-5">
        <div class="row">
          <?php
          // Database connection settings
          $servername = "localhost";
          $username = "root";
          $password = "";
          $database = "naqab";

          try {
            // Create a new PDO instance
            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

            // Set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Example query to fetch counts
            $stmt = $conn->prepare("SELECT COUNT(*) AS total_users FROM userreg");
            $stmt->execute();
            $total_users = $stmt->fetch(PDO::FETCH_ASSOC)['total_users'];

            $stmt = $conn->prepare("SELECT COUNT(*) AS total_orders FROM orders");
            $stmt->execute();
            $total_orders = $stmt->fetch(PDO::FETCH_ASSOC)['total_orders'];

            $stmt = $conn->prepare("SELECT COUNT(*)  AS total_product FROM product");
            $stmt->execute();
            $total_product = $stmt->fetch(PDO::FETCH_ASSOC)['total_product'];

            $stmt = $conn->prepare("SELECT COUNT(*) AS total_orders FROM query");
            $stmt->execute();
            $total_queries = $stmt->fetch(PDO::FETCH_ASSOC)['total_orders'];
          } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }

          // Example data for the cards
          $cards = array(
            array("title" => "Total Users", "value" => $total_users, "class" => "total-users", "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person-fill' viewBox='0 0 16 16'>
    <path d='M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6'/>
  </svg>"),
            array("title" => "Total Products", "value" =>  $total_product, "class" => "product"),
            array("title" => "Total Orders", "value" => $total_orders, "class" => "total-orders"),
            array("title" => "Total Queries", "value" => $total_queries, "class" => "total-queries"),
            // Add more cards as needed
          );

          // Loop through the cards and display them
          foreach ($cards as $index => $card) {
            echo "<div class='col-md-4'>";
            echo "<div class='card mb-4 " . $card['class'] . "'>";
            echo "<div class='card-body text-center'>";
            echo "<h5 class='card-title'>" . $card['title'] . "</h5>";
            echo "<p class='card-text'>" . $card['value'] . "</p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
          }

          // Close the database connection
          $conn = null;
          ?>

        </div>
      </div>
    </div>
  </div>
  <br><br><br><br><br>
  <!-- <footer class="footer">
    <div class="container-fluid">
      <div class="footer-in">
        <marquee>&copy 2025 All Rights Reserved.</marquee>
      </div>
    </div>
  </footer> -->
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