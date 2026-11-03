
<html>
    <body>
        <?php
$con=mysqli_connect("localhost","root","","perfect",3307);
$q=mysqli_query($con,"delete from category where id='?'");

if($con)
{
    // echo "<script>alert('Category deleted!');</script><br>";
    // echo "<a href='viewcat.php'>Back to Categories</a>";
    header('location: viewcat.php');
}
mysqli_close($con);
?>
</body>
</html>
