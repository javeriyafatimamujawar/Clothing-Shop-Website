<?php
session_start();
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Admin check
    if ($email == "admin@gmail.com" && $password == "admin123") {
        $_SESSION['user_type'] = 'admin';
        $_SESSION['admin_id'] = 'admin'; // Store admin identifier
        header("Location: admin/home.php");
        exit();
    }

    // User login check
    $stmt = $conn->prepare("SELECT uid, pass FROM userreg WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        if ($password == $user['pass']) {
            $_SESSION['user_id'] = $user['uid'];
            $_SESSION['user_type'] = 'user';
            header("Location: home.php");
            exit();
        }
    }

    // If no match found
    $_SESSION['login_error'] = "Incorrect email or password";
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - NAQAB Collection</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</head>
<body>
    <div class="login-container">
        <form class="login-form" method="POST" action="">
            <h2>Login</h2>
            
            <?php
            // Display login error if exists
            if (isset($_SESSION['login_error'])) {
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Failed',
                        text: '{$_SESSION['login_error']}'
                    });
                </script>";
                unset($_SESSION['login_error']);
            }
            ?>

            <div class="input-box">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="input-box">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="options">
                <a href="forgot-password.php">Forgot Password?</a>
                <a href="register.php">Not registered? Sign up</a>
            </div>
            <button type="submit" class="main-btn">Login</button>
        </form>
    </div>
</body>
</html>