<?php 
// Include database connection
include 'config.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="contact-container">
        <div class="contact-inf">
            <h2>Contact Us</h2>
            <p><strong>Call Us:</strong> +91 9922529391</p>
            <p><strong>Email Us At:</strong> <a href="mailto:babamurad48@gmail.com">babamurad@gmail.com</a></p>
        
            <p><strong>Visit Us At:</strong></p>
            <p>130 Begum Peth, India Lodge, Solapur</p>
            <p>Solapur 413001</p>
            <p><strong>Note:</strong> Working Hours: 11 am to 9 pm IST. All days.</p>
        </div>

        <form id="contact-form" method="POST" style="height: 130vh;">
            <h2>Contact Us</h2>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Your Name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Your Email" required>
            </div>
            <div class="form-group">
                <label for="contact">Contact</label>
                <input type="tel" id="contact" name="mobno" placeholder="Your Contact" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="query" rows="4" placeholder="Your Message" required></textarea>
            </div>
            <button type="submit" name="submit" class="btn">Send</button>
        </form>
    </div>

    <?php
    // Handle form submission
    if(isset($_POST['submit'])) {
        // Sanitize and validate inputs
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $mobno = mysqli_real_escape_string($conn, $_POST['mobno']);
        $user_query = mysqli_real_escape_string($conn, $_POST['query']);

        // Prepare SQL query (note the corrected syntax)
        $sql = "INSERT INTO query (name, email, mobno, query) 
                VALUES ('$name', '$email', '$mobno', '$user_query')";

        // Execute query
        if(mysqli_query($conn, $sql)) {
            // Success - show SweetAlert
            echo "<script>
            Swal.fire({
                title: 'Message Sent Successfully!',
                text: 'Admin will contact you soon',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = window.location.href;
                }
            });
            </script>";
        } else {
            // Error handling
            echo "<script>
            Swal.fire({
                title: 'Error!',
                text: 'Could not send message. " . mysqli_error($conn) . "',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            </script>";
        }
    }
    ?>

    <?php include 'footer.php';?>
</body>
</html>