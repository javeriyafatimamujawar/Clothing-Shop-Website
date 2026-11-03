<?php
$con = mysqli_connect("localhost", "root", "", "naqab");

if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = mysqli_real_escape_string($con, $_POST["t2"]); 
$price = mysqli_real_escape_string($con, $_POST["t3"]); 
$quan = mysqli_real_escape_string($con, $_POST["t5"]); 
$cat = mysqli_real_escape_string($con, $_POST["t6"]); 
$desc = mysqli_real_escape_string($con, $_POST["t7"]); 

$image_array = array();

if(isset($_FILES['product_images'])) {
    $upload_dir = 'admin/images/';
    
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }
    
    $allowed_types = array('image/jpeg', 'image/png', 'image/gif');
    
    foreach($_FILES['product_images']['tmp_name'] as $key => $tmp_name) {
        $file_name = $_FILES['product_images']['name'][$key];
        $file_tmp = $_FILES['product_images']['tmp_name'][$key];
        $file_type = $_FILES['product_images']['type'][$key];
        
        if(in_array($file_type, $allowed_types)) {
            $unique_filename = $file_name;
            $destination = $upload_dir . $unique_filename;
            
            if(move_uploaded_file($file_tmp, $destination)) {
                $image_array[] = $unique_filename;
            }
        }
    }
}

$image_json = json_encode($image_array);

$query = "INSERT INTO product (name, price, image, quantity, category, description) 
          VALUES (?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "ssssss", $name, $price, $image_json, $quan, $cat, $desc);

if(mysqli_stmt_execute($stmt)) {
    header('location: products.php');
} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_stmt_close($stmt);
mysqli_close($con);
?>