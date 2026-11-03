<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NAQAB Collection</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Jost:wght@100;200;300;400;500;600;700&display-swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    <header>
        <a href="#" class="logo"><img src="logo.png" alt=""></a>
        <ul class="navmenu">
            <li><a href="home.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
        </ul>
        <div class="nav-icon">
        <style>
/* Box container styling */
.box {
    height: 30px;
    display: flex;
    align-items: center;
    padding: 25px 5px;
    background: none;
    border-radius: 40px;
    box-shadow: 0 10px 25px 0 rgba(0, 0, 0, 0.3);
    transition: all 0.3s ease;
    justify-content: space-between; /* Align items with space between */
}

/* Hover effect to expand input */
.box:hover input {
    width: 150px;
}

/* Input field styling */
.box input {
    height: 40px;
    width: 40px;
    outline: none;
    border: none;
    background: #fff;
    font-weight: 400;
    transition: width 0.8s ease;
}

/* Search icon styling */
.box button {
    background: none;
    border: none;
    outline: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ee1c47;
    font-size: 10px;
    transition: color 0.3s ease;
}

.box button:hover {
    color: #d10c3d;
}

/* Form styling */
.box form {
    display: flex;
    align-items: center;
    background: none;
    height: 40px;
    width: 40px;
}
</style>

<div class="box">
    <form action="search.php" method="GET">
        <!-- Search input -->
        <input type="text" name="query" placeholder="Search products..." autocomplete="off">
        <!-- Search button with icon -->
        <button type="submit">
            <i class="bx bx-search"></i>
        </button>
    </form>
</div>
            <a href="profile.php"><i class="bx bx-user"></i></a>
            <a href="cart.php"><i class="bx bx-cart"></i></a>
            <!-- <a href="myorder.php"><i class="bi bi-bag-check"></i></a> -->
            

            <div class="bx bx-menu" id="menu-icon"></div>
        </div>
    </header>