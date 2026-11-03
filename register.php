<?php
session_start();
include 'config.php'; // Ensure this file contains your database connection

// Function to sanitize input
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and collect input values
    $fname = sanitize_input($_POST['fname']);
    $mname = sanitize_input($_POST['mname']);
    $lname = sanitize_input($_POST['lname']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $mobno = sanitize_input($_POST['mobno']);
    $password = sanitize_input($_POST['pass']);
    $rpass = sanitize_input($_POST['rpass']);

    // Validate inputs
    $errors = [];

    // First Name Validation
    if (empty($fname) || !preg_match("/^[A-Za-z\s]+$/", $fname)) {
        $errors[] = "First name is required and should contain only letters.";
    }

    // Last Name Validation
    if (empty($lname) || !preg_match("/^[A-Za-z\s]+$/", $lname)) {
        $errors[] = "Last name is required and should contain only letters.";
    }

    // Email Validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || 
        !preg_match("/^[^\s@]+@(gmail\.com|yahoo\.com)$/", $email)) {
        $errors[] = "Invalid email. Must be @gmail.com or @yahoo.com";
    }

    // Mobile Number Validation
    if (!preg_match("/^[789]\d{9}$/", $mobno)) {
        $errors[] = "Mobile number must start with 7, 8, or 9 and be 10 digits.";
    }

    // Password Validation
    if (strlen($_POST['pass']) < 6) {
        $errors[] = "Password must be at least 6 characters long.";
    }

    // Check for existing email
    $check_email = "SELECT * FROM userreg WHERE email = ?";
    $stmt_check = $conn->prepare($check_email);
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $result = $stmt_check->get_result();
    if ($result->num_rows > 0) {
        $errors[] = "Email already exists.";
    }
    $stmt_check->close();

    // If no errors, proceed with insertion
    if (empty($errors)) {
        // Prepare SQL insertion query
        $sql = "INSERT INTO userreg (fname, mname, lname, email, mobno, pass, rpass) VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        // Prepare and bind parameters
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $fname, $mname, $lname, $email, $mobno, $password, $rpass);

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect with success parameter
            header("Location: register.php?registration_success=true");
            exit();
        } else {
            $errors[] = "Error: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    }

    // Store errors in session to display on the same page
    $_SESSION['registration_errors'] = $errors;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <link rel="stylesheet" href="style.css">
    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="register-container">
        <!-- Error display container -->
        <div id="error-container" style="color: red; margin-bottom: 15px;">
            <?php
            // Display server-side errors
            if (isset($_SESSION['registration_errors'])) {
                foreach ($_SESSION['registration_errors'] as $error) {
                    echo "<div class='error-message'>$error</div>";
                }
                unset($_SESSION['registration_errors']);
            }
            ?>
        </div>

        <form id="registrationForm" class="register-form" method="POST" onsubmit="return validateRegister(event)">
            <h2>Register</h2>
            <div class="input-box">
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="fname" placeholder="Enter first name" required>
                <div id="fname-error" class="error-message" style="color: red; display: none;"></div>
            </div>
            <div class="input-box">
                <label for="mname">Middle Name</label>
                <input type="text" id="mname" name="mname" placeholder="Enter middle name">
                <div id="mname-error" class="error-message" style="color: red; display: none;"></div>
            </div>
            <div class="input-box">
                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lname" placeholder="Enter last name" required>
                <div id="lname-error" class="error-message" style="color: red; display: none;"></div>
            </div>
            <div class="input-box">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                <div id="email-error" class="error-message" style="color: red; display: none;"></div>
            </div>
            <div class="input-box">
                <label for="contact">Contact</label>
                <input type="text" id="contact" name="mobno" placeholder="Enter your contact number" required>
                <div id="contact-error" class="error-message" style="color: red; display: none;"></div>
            </div>
            <div class="input-box">
                <label for="password">Password</label>
                <input type="password" id="password" name="pass" placeholder="Enter your password" required>
                <div id="password-error" class="error-message" style="color: red; display: none;"></div>
            </div>
            <div class="input-box">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" id="confirmPassword" name="rpass" placeholder="Confirm your password" required>
                <div id="confirmPassword-error" class="error-message" style="color: red; display: none;"></div>
            </div>
            <div class="options">
                <a href="login.php">Already have an account? Login</a>
            </div>
            <button type="submit" class="main-btn">Register</button>
        </form>
    </div>

    <script>
    function validateField(event) {
        const field = event.target;
        const value = field.value.trim();
        let errorMessage = '';

        switch (field.id) {
            case 'fname':
            case 'mname':
            case 'lname':
                if (!/^[A-Za-z\s]+$/.test(value) && value !== '') {
                    errorMessage = `Name should contain only letters`;
                }
                break;

            case 'email':
                const emailRegex = /^[^\s@]+@(gmail\.com|yahoo\.com)$/;
                if (!emailRegex.test(value)) {
                    errorMessage = 'Email must be @gmail.com or @yahoo.com';
                }
                break;

            case 'contact':
                const mobileRegex = /^[789]\d{9}$/;
                if (!mobileRegex.test(value)) {
                    errorMessage = 'Mobile number must start with 7, 8, or 9 and be 10 digits';
                }
                break;

            case 'password':
                if (value.length < 6) {
                    errorMessage = 'Password must be at least 6 characters long';
                }
                break;

            case 'confirmPassword':
                const password = document.getElementById('password').value;
                if (value !== password) {
                    errorMessage = 'Passwords do not match';
                }
                break;
        }

        const errorElement = document.getElementById(`${field.id}-error`);
        if (errorElement) {
            errorElement.textContent = errorMessage;
            errorElement.style.display = errorMessage ? 'block' : 'none';
        }

        return !errorMessage;
    }

    function validateRegister(event) {
        const fields = ['fname', 'lname', 'email', 'contact', 'password', 'confirmPassword'];
        let isValid = true;

        fields.forEach(fieldId => {
            const field = document.getElementById(fieldId);
            if (!validateField({ target: field })) {
                isValid = false;
            }
        });

        if (!isValid) {
            event.preventDefault();
            return false;
        }

        return true;
    }

    // Add event listeners for real-time validation
    document.addEventListener('DOMContentLoaded', () => {
        const validationFields = ['fname', 'mname', 'lname', 'email', 'contact', 'password', 'confirmPassword'];

        validationFields.forEach(fieldId => {
            const field = document.getElementById(fieldId);
            if (field) {
                field.addEventListener('blur', validateField);
            }
        });

        // Check for registration success
        const urlParams = new URLSearchParams(window.location.search);
        const registrationSuccess = urlParams.get('registration_success');

        if (registrationSuccess === 'true') {
            Swal.fire({
                title: 'Registration Successful!',
                text: 'You have been registered successfully.',
                icon: 'success',
                confirmButtonText: 'Login Now'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'login.php';
                }
            });
        }
    });
    </script>
</body>
</html>