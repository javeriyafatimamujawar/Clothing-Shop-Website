<?php include 'header.php' ?>
<?php
session_start();
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile - NAQAB Collection</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</head>

<body>
    <?php
    // Check if user is logged in
    if (!isset($_SESSION['user_id'])) {
        echo "<script>
        Swal.fire({
            icon: 'warning',
            title: 'Login Required',
            text: 'Please login to view your profile',
            confirmButtonText: 'Login Now'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'login.php';
            }
        });
    </script>";
        exit();
    }

    // Fetch user profile data
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT fname, mname, lname, email, mobno, pass FROM userreg WHERE uid = ?");
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize inputs
        $fname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
        $mname = filter_var($_POST['mname'], FILTER_SANITIZE_STRING);
        $lname = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $mobno = filter_var($_POST['mobno'], FILTER_SANITIZE_STRING);
        $pass = $_POST['pass'];
        $rpass = $_POST['rpass'];

        // Add a unique identifier to prevent multiple alerts
        $update_identifier = uniqid('update_');

        // Check if email or mobile number already exists
        $check_stmt = $conn->prepare("SELECT uid FROM userreg WHERE (email = ? OR mobno = ?) AND uid != ?");
        $check_stmt->bind_param("sss", $email, $mobno, $user_id);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();

        if ($check_result->num_rows > 0) {
            echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Update Failed',
            text: 'Email or Mobile Number already exists',
            timer: 3000,
            timerProgressBar: true
        });
    </script>";
        } else {
            // Prepare update query
            if (!empty($pass) && $pass === $rpass) {
                // Update with new password for both pass and rpass
                $update_stmt = $conn->prepare("UPDATE userreg SET fname=?, mname=?, lname=?, email=?, mobno=?, pass=?, rpass=? WHERE uid=?");
                $update_stmt->bind_param("ssssssss", $fname, $mname, $lname, $email, $mobno, $pass, $rpass, $user_id);
            } else if (empty($pass)) {
                // Update without changing password
                $update_stmt = $conn->prepare("UPDATE userreg SET fname=?, mname=?, lname=?, email=?, mobno=? WHERE uid=?");
                $update_stmt->bind_param("ssssss", $fname, $mname, $lname, $email, $mobno, $user_id);
            } else {
                // Password mismatch
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Password Error',
                    text: 'Passwords do not match!',
                    timer: 3000,
                    timerProgressBar: true
                }).then(() => {
 window.location.href = 'profile.php';
                });
            </script>";
            }

            if ($update_stmt->execute()) {
                echo "<script>
            if (!window.localStorage.getItem('profileUpdated_{$update_identifier}')) {
                window.localStorage.setItem('profileUpdated_{$update_identifier}', 'true');
                Swal.fire({
                    icon: 'success',
                    title: 'Profile Updated',
                    text: 'Your profile has been successfully updated',
                    timer: 3000,
                    timerProgressBar: true
                }).then(() => {
 window.location.href = 'profile.php';
                    });
            }
        </script>";
            } else {
                echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Update Failed',
                text: 'Something went wrong',
                timer: 3000,
                timerProgressBar: true
            });
        </script>";
            }
        }
    }

    ?>

    <div class="login-container" style="margin-top: 120px;height: 150vh;">
        <form class="login-form" method="POST" action="">
            <h2>My Profile</h2>

            <div class="input-box">
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="fname" value="<?php echo htmlspecialchars($user['fname']); ?>" required>
            </div>

            <div class="input-box">
                <label for="mname">Middle Name</label>
                <input type="text" id="mname" name="mname" value="<?php echo htmlspecialchars($user['mname']); ?>">
            </div>

            <div class="input-box">
                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lname" value="<?php echo htmlspecialchars($user['lname']); ?>" required>
            </div>

            <div class="input-box">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>

            <div class="input-box">
                <label for="mobno">Mobile Number</label>
                <input type="tel" id="mobno" name="mobno" value="<?php echo htmlspecialchars($user['mobno']); ?>" required>
            </div>

            <div class="input-box">
                <label for="pass">New Password (Optional)</label>
                <input type="password" id="pass" name="pass" placeholder="Leave blank if no change">
            </div>

            <div class="input-box">
                <label for="rpass">Confirm New Password</label>
                <input type="password" id="rpass" name="rpass" placeholder="Confirm new password">
            </div>

            <button type="submit" class="main-btn">Update Profile</button>
            <br>
            <a href="logout.php" class="main-btn" style="text-align: center;">Logout</a>
        </form>
    </div>
</body>

</html>
<?php include 'footer.php' ?>