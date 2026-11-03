<?php
// Include database connection
require_once 'config.php';

// Start session for error messaging
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate email
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $new_password = $_POST['pass'];
    $confirm_password = $_POST['rpass'];

    // Validate inputs
    if (empty($email) || empty($new_password) || empty($confirm_password)) {
        ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'All fields are required!'
            }).then(() => {
                window.location.href = 'forgot-password.php';
            });
        });
        </script>
        <?php
        exit();
    }

    // Check password length
    if (strlen($new_password) < 6) {
        ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Password must be at least 6 characters long!'
            }).then(() => {
                window.location.href = 'forgot-password.php';
            });
        });
        </script>
        <?php
        exit();
    }

    // Check if passwords match
    if ($new_password !== $confirm_password) {
        ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Passwords do not match!'
            }).then(() => {
                window.location.href = 'forgot-password.php';
            });
        });
        </script>
        <?php
        exit();
    }

    try {
        // Prepare SQL to update both pass and rpass fields
        $stmt = $conn->prepare("UPDATE userreg SET pass = ?, rpass = ? WHERE email = ?");
        $stmt->bind_param("sss", $new_password, $confirm_password, $email);
        
        // Execute the statement
        if ($stmt->execute()) {
            // Check if any rows were affected
            if ($stmt->affected_rows > 0) {
                ?>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Password updated successfully!',
                        confirmButtonText: 'Login Now'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'login.php';
                        }
                    });
                });
                </script>
                <?php
            } else {
                ?>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Email not found. Please check your email address.'
                    }).then(() => {
                        window.location.href = 'forgot-password.php';
                    });
                });
                </script>
                <?php
            }
        } else {
            throw new Exception("Error updating password");
        }

        // Close statement
        $stmt->close();
    } catch (Exception $e) {
        ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Something went wrong. Please try again.'
            }).then(() => {
                window.location.href = 'forgot-password.php';
            });
        });
        </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - NAQAB Collection</title>
    <!--css link-->
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Jost:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBOVD591QIYicR65iaqukzvf/nwasFenqhPay5w/913mVM2hMDcnK10nMGCdVK+iQr371zPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>
    <div class="login-container" style="height: 100vh;">
        <form class="login-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <h2>Forgot Password</h2>
            <!--<p style="text-align: center; font-size: 14px; color: #555;">Enter your email address to receive a password reset link.</p>-->
            <div class="input-box">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="input-box">
                <label for="pass">Password</label>
                <input type="password" id="pass" name="pass" placeholder="Enter new password" required>
            </div>
            <div class="input-box">
                <label for="rpass">Confirm Password</label>
                <input type="password" id="rpass" name="rpass" placeholder="Re-enter your password" required>
            </div>
            <div class="options">
                <a href="login.php">Remember your Password? Login</a>
            </div>
            <button type="submit" class="main-btn">Submit</button>
        </form>
    </div>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</body>
</html>