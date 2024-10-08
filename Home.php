<?php include('ADMIN/config/constants.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="pics/i.png" type="image/png">
    <title>Tasty Treasure - It's finger lickin' good</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">

</head>
<body>
    <!--js link-->
    <script type="text/javascript" src="js/responsive.js"></script>
    <header>
        <div class="nav">
            <div class="logo">
                <a href="<?php echo SITEURL;?>"><img src="pics/i.png" alt="Tasty Treasure Logo" width="70" height="70"></a>
                <h2 class="logo">Tasty Treasure</h2>
            </div>
            <div class="search">
                <input class="search-bar" type="text" placeholder="Search here...">
            </div>
            <div class="header-right"> 
               <a  class="active"  href="<?php echo SITEURL;?>">Home</a>
                <a href="<?php echo SITEURL;?>menu.php">Menu</a>
                <a href="<?php echo SITEURL;?>about.php">About</a>
                <a href="<?php echo SITEURL;?>order.php" class="cta-button">Order Now</a>

            </div>
            <button class="hamburger" aria-label="Toggle menu">☰</button>
           
           
        </div>
        
        <section id="drop-menu">
            <ul class="nav-menu">
                <li><a href="Home.html">Home</a></li>
                <li><a href="menu.html">Menu</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact">Contact</a></li>
                <li><a href="order.html" >Order Now</a></li>
            </ul>

        </section>
        

    </header>

    <main>
        <div class="container">
            <img src="pics/back-image.png" alt="backgroung image here" style="width: 100%">
        <div class="content">
            <h1>Discover Your Tasty Treasure</h1>
            <p>Indulge in flavors that are finger lickin' good!</p>
            <a href="menu.html" class="cta-button">View Menu</a>
        </div>
        </div>

        <section id="featured-items">
            <h2>Featured Treasures</h2>
            <div class="item-grid">
                <div class="item">
                    <img src="pics/2.jpg" alt="Featured Item 1">
                    <h3>Golden Bucket</h3>
                    <p>Our signature crispy delight</p>
                </div>
                <div class="item">
                    <img src="pics/3.jpg" alt="Featured Item 2"width="300" height="450">
                    <h3>Diamond Sandwich</h3>
                    <p>A gem of flavors in every bite</p>
                </div>
                <div class="item">
                    <img src="pics/4.jpg" alt="Featured Item 3">
                    <h3>Treasure Fries</h3>
                    <p>Crispy, golden, and irresistible</p>
                </div>
            </div>
        </section>
        // contact us section
            <section>

                
            </section>
        <section id="promo">
            <h2>Today's Special Offer</h2>
            <p>Buy one Golden Bucket, get a free Diamond Sandwich!</p>
            <a href="order.html" class="cta-button">Order Now</a>
        </section>
    </main>

</body>
    <!-- Contact Info -->
 <div class="contact-info">
    <h2>Contact Information</h2>
    <p><strong>Phone:</strong> (+237) 677-588-867</p>
    <p><strong>Email:</strong> noudoujoseph@gmail.com</p>
    <p><strong>Address:</strong> (+237) Tasty Treasures, ICT University, Yaounde, Cameroon</p>
</div>
<div class="feedback">
    <h2>Your Feedback Matters</h2>
    <textarea placeholder="Leave your feedback here..."></textarea>
    <button type="submit">Submit Feedback</button>
</div>
<div class="terms-links">
    <p>By contacting us, you agree to our <a href="#privacyModal" target="_blank">Privacy Policy</a> and <a href="#termsModal" target="_blank">Terms and Conditions</a>.</p>
</div>
</div>
<script>
function validateForm() {
    const termsCheckbox = document.getElementById('termsCheckbox');
    if (!termsCheckbox.checked) {
        alert('You must accept the terms and conditions before sending your message.');
        return false;
    }
    return true;
}
</script>
</body>
</main>

<footer>
    
    <footer>
        <p>&copy; 2024 Tasty Treasure Restaurant, Yaounde, Cameroon. All rights reserved.</p>
        <p>Phone: (+237) 677-588-867</p>
        <p>Email: info@tastytreasure.com</p>
        <p>Address: ICT University, Yaounde, Cameroon</p>  
        <p><a href="#">BACK TO TOP</a></p>
        <p><a href="sitemap.html">Sitemap</a></p>
    </footer>
</html>
