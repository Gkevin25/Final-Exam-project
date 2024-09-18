<?php include('ADMIN/config/constants.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Declares the document type as HTML5 -->
    <meta charset="UTF-8">
    <!-- Specifies the character encoding for the document -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Ensures proper scaling and responsiveness on mobile devices -->
    <title>Sitemap - Tasty Treasure</title>
    <!-- Sets the title of the webpage shown in the browser tab -->
    
    <!-- Link to the main stylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Link to the responsive stylesheet for adjusting the layout on different screen sizes -->
    <link rel="stylesheet" href="css/responsive.css">
</head>
<body>
    <!-- Link to the external JavaScript file for responsiveness functionality -->
    <script type="text/javascript" src="js/responsive.js"></script>

    <!-- Header section starts -->
    <header>
        <div class="nav">
            <!-- Logo section -->
            <div class="logo">
                <!-- Link back to the homepage with an image of the logo -->
                <a href="index.html"><img src="pics/i.png" alt="Tasty Treasure Logo" width="70" height="70"></a>
                <!-- Website name displayed as the logo -->
                <h2 class="logo">Tasty Treasure</h2>
            </div>

            <!-- Search bar input -->
            <div class="search">
                <input class="search-bar" type="text" placeholder="Search here...">
            </div>

            <!-- Navigation links to other important pages -->
            <div class="header-right"> 
                <a class="active" href="index.html">Home</a>
                <a href="menu.html">Menu</a>
                <a href="about.html">About</a>
                <a href="order.php" class="cta-button">Order Now</a>
            </div>

            <!-- Hamburger button for mobile navigation -->
            <button class="hamburger" aria-label="Toggle menu">☰</button>
        </div>

        <!-- Dropdown menu section for smaller screens -->
        <section id="drop-menu">
            <ul class="nav-menu">
                <!-- Navigation links that correspond to different sections of the website -->
                <li><a href="index.php">Home</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="order.php">Order Now</a></li>
            </ul>
        </section>
    </header>
    <!-- Header section ends -->

    <!-- Main content section starts -->
    <main>
        <!-- Hero section for the Sitemap page -->
        <section class="sitemap-hero">
            <h1>Sitemap</h1>
            <!-- Short description about navigating the website -->
            <p>Navigate through all our website pages from here!</p>
        </section>

        <!-- Sitemap list section -->
        <section class="sitemap-section">
            <h2>Site Pages</h2>
            <!-- Unordered list of all major site pages -->
            <ul class="sitemap-list">
                <li><a href="index.html">Home</a></li>
                <li><a href="menu.html">Menu</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="order.html">Order Now</a></li>
                <li><a href="SignUp.html">Sign Up</a></li>
                <li><a href="Login.html">Login</a></li>
            </ul>
        </section>
    </main>
    <!-- Main content section ends -->

    <!-- Footer section starts -->
    <footer>
        <!-- Copyright notice -->
        <p>&copy; 2024 Tasty Treasure. All rights reserved.</p>
    </footer>
    <!-- Footer section ends -->
</body>
</html>
