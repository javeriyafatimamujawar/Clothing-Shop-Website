<?php
$con=mysqli_connect("localhost","root","","naqab");
    $q=mysqli_query($con,"delete from product");
if($con)
{
    // echo "<b>All products deleted!</b><br>";
    // echo "<a href='products.php'>Back to products</a>";
    header('location: products.php');
}
mysqli_close($con);
?>
