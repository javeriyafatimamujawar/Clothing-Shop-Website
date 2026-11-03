<?php session_start(); ?>
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
        <li class="active">
          <a href="products.php">
            <i class="material-icons">aspect_ratio</i>Products</a>

        </li>
      </ul>

      <ul>
        <li> <a href="viewcat.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
              <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
              <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
            </svg>View Categories</a>
        </li>
      </ul>
      <ul>
        <li> <a href="reports.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
              <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
              <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
            </svg>View Reports</a>
        </li>
      </ul>


      <ul>
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
          <h4 class="page-title">Products</h4>

        </div>

      </div>

      <div class="main-content">
        <div class="row">

          <div class="col-md-12">
            <div class="table-wrapper">
              <div class="table-title">
                <div class="row">

                  <?php
                  if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                  ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>Hey!</strong><?php echo $_SESSION['status']; ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php
                    unset($_SESSION['status']);
                  }
                  ?>

                  <div class="col-sm-6 p-0 d-flex justify-content-lg-start justify-content-center">
                    <h2 class="ml-lg-2">Manage Products</h2>
                  </div>
                  <div class="col-sm-6 p-0 d-flex justify-content-lg-end justify-content-center">
                    <a href="#addProductModal" class="btn btn-success" data-toggle="modal">
                      <i class="material-icons">&#xE147;</i> <span>Add New Product</span></a>




                    <a href="#dltProds" class="btn btn-danger" data-toggle="modal">
                      <i class="material-icons">&#xE15C;</i> <span>Delete</span></a>
                  </div>
                </div>
              </div>
              <?php
              $con = mysqli_connect("localhost", "root", "", "naqab");
              $query = mysqli_query($con, "select * from product");
              ?>
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th><b>ID</th>
                    <th><b>Name</th>
                    <th><b>Price</th>
                    <th><b>Image</th>
                    <th><b>Quantity</th>
                    <th><b>Category</th>
                    <th><b>Description</th>
                    <th><b>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  while ($a = mysqli_fetch_array($query)) {
                    $images = json_decode($a[3], true); // Decode the JSON array of images

                    echo "<tr>";
                    echo "<tc><td class='prod_id'>" . $i++ . "</td></tc>";
                    echo "<tc><td>" . $a[1] . "</td></tc>";
                    echo "<tc><td>" . $a[2] . "</td></tc>";

                    // Images cell
                    echo "<tc><td>";
                    if ($images && is_array($images)) {
                      echo "<div class='product-images' style='display: flex; gap: 10px; flex-wrap: wrap;'>";
                      foreach ($images as $image) {
                        echo "<img src='admin/images/" . htmlspecialchars($image) . "' height='100' width='100' style='object-fit: cover;' />";
                      }
                      echo "</div>";
                    } else {
                      echo "No images available";
                    }
                    echo "</td></tc>";

                    echo "<tc><td>" . $a[4] . "</td></tc>";
                    echo "<tc><td>" . $a[5] . "</td></tc>";
                    echo "<tc><td>" . $a[6] . "</td></tc>";
                    echo "<tc><td>";

                    // Create a string of all images for the edit URL
                    $images_string = $images ? implode(',', $images) : '';

                    echo "<a href='editproddesign.php?a=" . urlencode($a[0]) .
                      "&b=" . urlencode($a[1]) .
                      "&c=" . urlencode($a[2]) .
                      "&d=" . urlencode($images_string) .
                      "&e=" . urlencode($a[4]) .
                      "&f=" . urlencode($a[5]) .
                      "&g=" . urlencode($a[6]) .
                      "'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>";

                    echo "<a href='dltprod.php?a=" . urlencode($a[0]) .
                      "&b=" . urlencode($a[1]) .
                      "&c=" . urlencode($a[2]) .
                      "&d=" . urlencode($images_string) .
                      "&e=" . urlencode($a[4]) .
                      "&f=" . urlencode($a[5]) .
                      "&g=" . urlencode($a[6]) .
                      "' class='delete'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>";

                    echo "</td></tc>";
                    echo "</tr>";
                  }
                  mysqli_close($con);
                  ?>
                </tbody>
              </table>

            </div>
          </div>
          <!-- Add Modal HTML -->
          <div id="addProductModal" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="addnewprod.php" method="POST" enctype="multipart/form-data">
                  <div class="modal-header">
                    <h4 class="modal-title">Add Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control" id="name" name="t2" required>
                    </div>
                    <div class="form-group">
                      <label>Price</label>
                      <input type="number" step="0.01" class="form-control" id="price" name="t3" required>
                    </div>
                    <div class="form-group">
                      <label>Images (JPG, PNG, or GIF only)</label>
                      <input type="file" name="product_images[]" multiple accept="image/jpeg,image/png,image/gif" class="form-control">
                      <small class="form-text text-muted">You can select multiple images at once for Abayas front and back views.</small>
                    </div>
                    <div class="form-group">
                      <label>Quantity</label>
                      <input type="number" class="form-control" name="t5" id="quan" required>
                    </div>
                    <div class="form-group">
                      <label>Category</label>
                      <input type="text" name="t6" class="form-control" id="cat" required>
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <textarea class="form-control" name="t7" id="desc"></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add" name="add_data">
                  </div>
                </form>
              </div>
            </div>
          </div>


          <!-- Edit Modal HTML -->

          <div id="editProductModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="editprod.php" method="POST">
                  <div class="modal-header">
                    <h4 class="modal-title">Edit Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  </div>
                  <div class="modal-body">
                    <!-- <input type="hidden" name="edit_id"> -->
                    <div class="form-group">
                      <label>ID</label>
                      <input type="text" class="form-control" name="t1" id="id" required>
                    </div>
                    <div class="form-group">
                      <label>Name</label>
                      <input type="name" class="form-control" id="name" name="t2" required>
                    </div>
                    <div class="form-group">
                      <label>Price</label>
                      <input type="text" class="form-control" id="price" name="t3" required>
                    </div>
                    <div class="form-group">
                      <label>Image</label>
                      <input type="file" name="t4">

                    </div>
                    <div class="form-group">
                      <label>Quantity</label>
                      <input type="text" class="form-control" name="t5" id="quan" required>
                    </div>
                    <div class="form-group">
                      <label>Category</label>
                      <input type="text" name="t6" class="form-control" id="cat" required>
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <input type="text" class="form-control" name="t7" id="desc" required>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Update" name="update_data">
                  </div>
                </form>
              </div>
            </div>
          </div>

          <?php
          // $conn=mysqli_connect("localhost","root","","naqab");
          //                     $query=mysqli_query($conn,"select * from product");
          //                     if($query){
          //                         if(mysqli_num_rows($query)>0){
          //                             $row=mysqli_fetch_assoc($query);
          //                             $id=$row['id'];
          //                             $name=$row['name'];
          //                             $p=$row['price'];
          //                             $i=$row['image'];
          //                             $q=$row['quantity'];
          //                             $c=$row['category'];
          //                             $d=$row['description'];
          //                     }
          //                   }
          ?>
          <!-- Delete Products Modal HTML -->
          <div id="dltProds" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="dltallprod.php" method="POST">
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


          <!-- Delete Particular Product Modal HTML -->
          <div id="dltProd" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="dltprod.php" method="POST">
                  <div class="modal-header">
                    <h4 class="modal-title">Delete this Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you want to delete the selected Product?</p>
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

          <!--footer class="footer">
        <div class="container-fluid">
          <div class="footer-in">
            <p class="mb-0">&copy 2024 All Rights Reserved.</p>
          </div>
        </div>
      </footer-->

          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

          <!-- <div id="logoutModal" class="modal fade">
<script>
Swal.fire ({
  title: 'Logout',
  text: 'Are you sure you want to log out?',
  icon: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, log me out',
  cancelButtonText: 'No, stay logged in'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = 'logout.php';
  } else {
    
  }
});
  </script>
</div> -->


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