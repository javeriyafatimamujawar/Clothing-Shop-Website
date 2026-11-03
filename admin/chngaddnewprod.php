<?php
// $con=mysqli_connect("localhost","root","","perfect",3307);
// $n1=$_POST["t1"];
// $p1=$_POST["t2"];
// $i1=$_FILES['t3'];
// $q1=$_POST["t4"];
// $d1=$_POST["t5"];
// if(file_exists('../admin/images'.$i1))
//   {
//     $filename=$_FILES['t3']['name'];
//     $_SESSION['status']="Image already exists!".$filename;
//     header('location: products.php');
//   }
//   else
//   {
//     $q=mysqli_query($con,"insert into product values('".$n1."','".$p1."','".$i1."','".$q1." ','".$d1."')");
//     //$q=mysqli_query($con,"insert into product (name,price,image,quantity,description) values('$n1',$p1','$i1','$q1','$d1')");
//     //$q=mysqli_query($con,"INSERT INTO `product`(`name`, `price`, `image`, `quantity`, `description`) VALUES ('$n1','$p1','$i1','$q1','$d1')");
//     if($q)
//     {
//     //   $uploadDir='images/';
//     //   $filename=$_FILES["t3"]["name"];
//     //   $destination=$uploadDir.$filename;
//     //   move_uploaded_file($_FILES['t3']["tmp_name"],$destination);
//     //   $_SESSION['status']="Image stored successfully";
//     //   header('location: products.php');
//       echo "success";
//     }
// }
// if(file_exists('admin/images/'.$img)){
//     $filename=$img;
// }
// else{
//     $q=mysqli_query($con,"insert into product values('"."','".$name."','".$price."','".$img."','".$quan." ','".$desc."')");
// if($q)
// {
//     echo "<b>Product added</b><br>";
//     echo "<a href='products.php'>Back to products</a>";
//     // $uploadDir='admin/images/';
//     // $filename=$img;
//     // $destination=$uploadDir.$filename;
//     // move_uploaded_file($_FILES['t3'],$destination);
//     // echo "success";
// }

// }
// mysqli_close($con);

// $con=mysqli_connect("localhost","root","","perfect","3307");
    
// if(isset($_POST['add']))
// {
//   $n1=$_POST['t1'];
//   $p1=$_POST['t2'];
//   $i1=$_FILES['t3']['name'];
//   $q1=$_POST['t4'];
//   $d1=$_POST['t5'];


//   if(file_exists('../admin/images'.$i1))
//   {
//     $filename=$_FILES['t3']['name'];
//     $_SESSION['status']="Image already exists!".$filename;
//     header('location: products.php');
//   }
//   else
//   {
//     $q=mysqli_query($con,"insert into product values('".$n1."','".$p1."','".$i1."','".$q1." ','".$d1."')");
//     //$q=mysqli_query($con,"insert into product (name,price,image,quantity,description) values('$n1',$p1','$i1','$q1','$d1')");
//     //$q=mysqli_query($con,"INSERT INTO `product`(`name`, `price`, `image`, `quantity`, `description`) VALUES ('$n1','$p1','$i1','$q1','$d1')");
//     if($q)
//     {
//     //   $uploadDir='images/';
//     //   $filename=$_FILES["t3"]["name"];
//     //   $destination=$uploadDir.$filename;
//     //   move_uploaded_file($_FILES['t3']["tmp_name"],$destination);
//     //   $_SESSION['status']="Image stored successfully";
//     //   header('location: products.php');
//       echo "success";
//     }
//   }
// }

?> 
