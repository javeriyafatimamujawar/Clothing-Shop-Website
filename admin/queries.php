<!doctype html>
<html lang="en">

<head>
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
      <a href="home.php" class="dashboard"><i class="material-icons">dashboard</i>
        <span>Dashboard</span></a>
    </li>
</ul>

<ul>
    <li>
      <a href="products.php">
        <i class="material-icons">aspect_ratio</i>Products</a>

    </li>
</ul>
<ul>
             <li> <a href="viewcat.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
</svg>View Categories</a>
            </li></ul>
          
  
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
  <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0m-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
</svg>Orders</a>

        </li></ul>

       <ul> <li>
          <a href="customers.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
</svg>View customers</a>

        </li></ul>
        <ul><li class="active">
          <a href="queries.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
</svg>View Queries</a>

        </li></ul>
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
        <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
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
                <!-- <a href="#dltProdsModal" class="delete" data-toggle="modal"></a> -->
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
      <h4 class="page-title">View Queries</h4>

    </div>

  </div>
  <div class="main-content">
        <div class="row">

          <div class="col-md-12">
            <div class="table-wrapper">
              <div class="table-title">
                <div class="row">
                  <div class="col-sm-6 p-0 d-flex justify-content-lg-start justify-content-center">
                    <h2 class="ml-lg-2">Queries</h2>
                  </div>
                  </div>
                </div>
              </div>
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th><b>ID</th>
                    <th><b>Name</th>
                    <th><b>Email</th>
                    <th><b>Contact</th>
                    <th><b>Query</th>
                  </tr>
                </thead>
                <tbody>
                      
                      <?php
                      $i=1;
                    $con=mysqli_connect("localhost","root","","naqab");
                    $query=mysqli_query($con,"select * from query");
                    while($a=mysqli_fetch_array($query))
                    {
                      
                      echo "<tr>";
                      echo "<tc><td>".$i++."</tc></td>";
                      echo "<tc><td>".$a[1]."</tc></td>";
                      echo "<tc><td>".$a[2]."</tc></td>";
                      echo "<tc><td>".$a[3]."</tc></td>";
                      echo "<tc><td>".$a[4]."</tc></td>";
                      echo "<tc><td>";
                    }
                    mysqli_close($con);
                  ?>
    

    
         <!-- <footer class="footer">
        <div class="container-fluid">
          <div class="footer-in">
            <p class="mb-0">&copy 2024 All Rights Reserved.</p>
          </div>
        </div>
      </footer>  -->
          <script src="js/jquery-3.3.1.slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>


  <script type="text/javascript">

    $(document).ready(function () {
      $(".xp-menubar").on('click', function () {
        $('#sidebar').toggleClass('active');
        $('#content').toggleClass('active');
      });

      $(".xp-menubar,.body-overlay").on('click', function () {
        $('#sidebar,.body-overlay').toggleClass('show-nav');
      });

    });

  </script>



    </body>
    </html>