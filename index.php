<?php include('ADMIN/config/constants.php')?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="images/i.png" type="image/png">
        <title>Tasty Treasure - It's finger lickin' good</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
            <div class="nav">
                <div class="logo">
                    <a href="<?php echo SITEURL;?>"><img src="images/i.png" alt="Tasty Treasure Logo" width="70" height="70"></a>
                    <h2 class="logo">Tasty Treasure</h2>
                </div>
                <form action="<?php echo SITEURL?>food-search.php" method="POST">
                <div class="search">
                    <input class="search-bar" name="search" type="text" placeholder="Search here..." required>
                </div>
                </form>
                <div class="header-right"> 
                    <a  class="active"  href="<?php echo SITEURL;?>">Home</a>
                    <a href="<?php echo SITEURL;?>menu.php">Menu</a>
                    <a href="<?php echo SITEURL;?>about.php">About</a>
                    <a href="<?php echo SITEURL;?>order.php" class="cta-button">Order Now</a>
                </div>
                <div class="hamburger-menu" onclick="toggleMenu()">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
            </div>
        </header>
        <main>
            <div class="container">
                <img src="images/back-image.png" alt="backgroung image here" style="width: 100%;">
                <div class="content">
                    <h1>Discover Your Tasty Treasure</h1>
                    <p>Indulge in flavors that are finger lickin' good!</p>
                    <a href="<?php echo SITEURL;?>menu.php" class="cta-button">View Menu</a>
                </div>
            </div>
            <section id="featured-items">
                <h2>Featured Treasures</h2>
                <div class="item-grid">
                    <div class="item">
                        <img src="images/2.jpg" alt="Featured Item 1">
                        <h3>Golden Bucket</h3>
                        <p>Our signature crispy delight</p>
                    </div>
                    <div class="item">
                        <img src="images/3.jpg" alt="Featured Item 2"width="300" height="450">
                        <h3>Diamond Sandwich</h3>
                        <p>A gem of flavors in every bite</p>
                    </div>
                    <div class="item">
                        <img src="images/4.jpg" alt="Featured Item 3">
                        <h3>Treasure Fries</h3>
                        <p>Crispy, golden, and irresistible</p>
                    </div>
                </div>
            </section>
            
            <section id="promo">
                <h2>Today's Special Offer</h2>
                <p>Buy one Golden Bucket, get a free Diamond Sandwich!</p>
                <a href="<?php echo SITEURL?>menu.php" class="cta-button">Order Now</a>
            </section>
            <!-- Contact Us Section-->
             <div class="contact-container" id="contact">
                <h1>Contact Us</h1>
                <form action="https://api.web3forms.com/submit" method="POST">
                    <p>We would love to hear from you! Please fill out the form below.</p>
                    <input type="hidden" name="access_key" value="6c214136-9930-46ae-839a-31ab5c89838d">
                    <div class="input-box">
                        <input type="text" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="input-box">
                        <input type="email" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="input-box">
                        <textarea name="message" placeholder="Your Message" required></textarea>
                    </div>
                    <!-- Send Button -->
                     <div class="send-button">
                        <button type="submit" class="btn">Send Message</button>
                    </div>
                </form>
            </div>
            <!-- Contact Info -->
             <div class="contact-info">
                <h2>Contact Information</h2>
                <p><strong>Phone:</strong> (+237) 677-588-867</p><p><strong>Email:</strong> noudoujoseph@gmail.com</p>
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
            <script>
            function validateForm() {
                const termsCheckbox = document.getElementById('termsCheckbox');
            }
            if (!termsCheckbox.checked) {
                alert('You must accept the terms and conditions before sending your message.');
                return false;
            }
            return true;
            </script>
            
            <footer>
                <p>&copy; 2024 Tasty Treasure Restaurant, Yaounde, Cameroon. All rights reserved.</p>
                <p>Phone: (+237) 677-588-867</p>
                <p>Email: info@tastytreasure.com</p>
                <p>Address: ICT University, Yaounde, Cameroon</p>
                <ul>
                    <li><a href="faqs.html">FAQs</a></li> 
                    <li><a href="#">BACK TO TOP</a></li>
                </ul>
                <a href="index_fr.php">French</a>
            </footer>
        </main>
    </body>
</html>

