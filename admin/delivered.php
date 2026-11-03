<?php
$a1=$_GET['a'];
// $b=$_GET['t2'];
// $c=$_GET['t3'];
// $d=$_GET['t4'];
// $e=$_GET['t5'];
// $f=$_GET['t6'];
$con=mysqli_connect("localhost","root","","naqab");
mysqli_query($con,"delete from orders where id='$a1'");

mysqli_close($con);
header("location:orders.php");
?>