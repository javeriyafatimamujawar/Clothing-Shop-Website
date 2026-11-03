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
                <form action="editprod.php" method="GET">
                  <div class="modal-header">
                    <h4 class="modal-title">Edit Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label>ID</label>
                      <input type="text" class="form-control" name="t1" required >
                    </div>
                    <div class="form-group">
                      <label>Name</label>
                      <input type="name" class="form-control" name="t2" required>
                    </div>
                    <div class="form-group">
                      <label>Price</label>
                      <input type="text" class="form-control" name="t3" required>
                    </div>
                    <div class="form-group">
                      <label>Image</label>
                      <input type="file" name="t4">
                      
                    </div>
                    <div class="form-group">
                      <label>Quantity</label>
                      <input type="text" class="form-control" name="t5"  required>
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <input type="text" class="form-control" name="t6" required>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" name="edit" class="btn btn-info" value="Save">
                  </div>
                </form>
                <?php
//session_start();
// $a=$_SESSION['t1'];
// $a=$_POST['a'];
// echo $a;
$con=mysqli_connect("localhost","root","","naqab",3307);
$id=$_GET['t1'];
$query="select * from  product where id='$id'";
    $q=mysqli_query($con,$query);
// if($con)
// {
//     echo "<b>Product updated!</b><br>";
//     echo "<a href='products.php'>Back to products</a>";
// }
if(mysqli_num_rows(($q) > 0))
{
    foreach($q as $row)
    {
        echo $row['id'];
    }
}
else{
    echo "No record available!";
}
mysqli_close($con);
?>


</body>
</html>
