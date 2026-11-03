<?php
session_start();
if (isset($_SESSION['user_type'])) {
    if ($_SESSION['user_type'] == 'admin') {
        unset($_SESSION['admin_id']);
    } else if ($_SESSION['user_type'] == 'user') {
        unset($_SESSION['user_id']);
    }
    
    unset($_SESSION['user_type']);
    session_destroy();
}

header("Location: login.php");
exit();
?>