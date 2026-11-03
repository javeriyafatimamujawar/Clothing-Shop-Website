<?php
$con = mysqli_connect("localhost", "root", "", "naqab");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = mysqli_real_escape_string($con, $_POST['t1']);
$name = mysqli_real_escape_string($con, $_POST['t2']);
$price = mysqli_real_escape_string($con, $_POST['t3']);
$quantity = mysqli_real_escape_string($con, $_POST['t5']);
$category = mysqli_real_escape_string($con, $_POST['t6']);
$description = mysqli_real_escape_string($con, $_POST['t7']);

// Get existing images
$existing_images = isset($_POST['existing_images']) ? $_POST['existing_images'] : array();
$remove_images = isset($_POST['remove_images']) ? $_POST['remove_images'] : array();

// Remove selected images
foreach($remove_images as $index) {
    if(isset($existing_images[$index])) {
        $image_path = 'admin/images/' . $existing_images[$index];
        if(file_exists($image_path)) {
            unlink($image_path); // Delete the file
        }
        unset($existing_images[$index]);
    }
}

// Handle new image uploads
$new_images = array();
if(isset($_FILES['new_images'])) {
    $upload_dir = 'admin/images/';
    
    foreach($_FILES['new_images']['tmp_name'] as $key => $tmp_name) {
        if($_FILES['new_images']['error'][$key] === UPLOAD_ERR_OK) {
            $file_name = $_FILES['new_images']['name'][$key];
            $file_tmp = $_FILES['new_images']['tmp_name'][$key];
            
            // Generate unique filename
            $unique_filename = $file_name;
            $destination = $upload_dir . $unique_filename;
            
            if(move_uploaded_file($file_tmp, $destination)) {
                $new_images[] = $unique_filename;
            }
        }
    }
}

// Combine existing and new images
$final_images = array_merge($existing_images, $new_images);
$images_json = json_encode(array_values($final_images)); // array_values reindexes the array

// Update database
$query = "UPDATE product SET 
          name = ?,
          price = ?,
          image = ?,
          quantity = ?,
          category = ?,
          description = ?
          WHERE id = ?";

$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "sssssss", 
    $name, 
    $price, 
    $images_json,
    $quantity,
    $category,
    $description,
    $id
);

if(mysqli_stmt_execute($stmt)) {
    header("location:products.php");
} else {
    echo "Error updating record: " . mysqli_error($con);
}

mysqli_stmt_close($stmt);
mysqli_close($con);
?>