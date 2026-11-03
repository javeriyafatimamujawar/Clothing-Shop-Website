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

  <link rel="stylesheet" href="css/style.css">


  <!--google fonts -->

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">


  <!--google material icon-->
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
    }

    input[type=text],
    select,
    textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
    }

    label {
      padding: 12px 12px 12px 0;
      display: inline-block;
    }

    input[type=submit] {

      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: right;
      background-color: #88c7dc;
    }

    input[type=submit]:hover {
      background-color: #04AA6D;
    }

    .container {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding-left: 300px;
      padding-right: 300px;
    }

    .col-25 {
      float: left;
      width: 10%;
      margin-top: 6px;
    }

    .col-75 {
      float: left;
      width: 75%;
      margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row::after {
      content: "";
      display: table;
      clear: both;
    }

    button {
      background-color: grey;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: right;
    }

    h4 {
      text-align: center;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {

      .col-25,
      .col-75,
      input[type=submit] {
        width: 100%;
        margin-top: 0;
      }
    }
  </style>


</head>

<body>

  <div class="container">

  <form action="editprod.php" method="POST" enctype="multipart/form-data">
  <div class="modal-header" align="center">
    <h4 class="modal-title" align="center">Edit Product</h4>
  </div>
  <div class="modal-body">
    <div class="form-group">
      <label>ID</label>
      <input type="text" class="form-control" name="t1" id="id" value="<?php echo trim($_GET["a"]); ?>" readonly>
    </div>
    <div class="form-group">
      <label>Name</label>
      <input type="name" class="form-control" id="name" name="t2" value="<?php echo $_GET['b']; ?>" required>
    </div>
    <div class="form-group">
      <label>Price</label>
      <input type="text" class="form-control" id="price" name="t3" value="<?php echo $_GET['c']; ?>" required>
    </div>
    <div class="form-group">
      <label>Current Images</label>
      <div class="existing-images" style="display: flex; gap: 10px; flex-wrap: wrap; margin-bottom: 10px;">
        <?php
        $images = explode(',', $_GET['d']);
        foreach($images as $index => $image) {
            if(!empty($image)) {
                echo "<div class='image-container' style='position: relative;'>";
                echo "<img src='admin/images/" . htmlspecialchars(trim($image)) . "' height='100' width='100' style='object-fit: cover; margin: 5px;'>";
                echo "<input type='hidden' name='existing_images[]' value='" . htmlspecialchars(trim($image)) . "'>";
                echo "<input type='checkbox' name='remove_images[]' value='" . $index . "' style='position: absolute; top: 5px; right: 5px;'> Remove";
                echo "</div>";
            }
        }
        ?>
      </div>
      <label>Add New Images</label>
      <input type="file" name="new_images[]" multiple accept="image/*">
    </div>
    <div class="form-group">
      <label>Quantity</label>
      <input type="text" class="form-control" name="t5" id="quan" value="<?php echo $_GET['e']; ?>" required>
    </div>
    <div class="form-group">
      <label>Category</label>
      <input type="text" name="t6" class="form-control" id="cat" value="<?php echo $_GET['f']; ?>" required>
    </div>
    <div class="form-group">
      <label>Description</label>
      <input type="text" class="form-control" name="t7" id="desc" value="<?php echo $_GET['g']; ?>">
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" onclick="window.location.href='products.php'">Cancel Edit</button>
    <input type="submit" class="btn btn-info" value="Update" name="update_data">
  </div>
</form>
  </div>
  </div>
  </div>
</body>

</html>