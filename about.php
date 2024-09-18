<?php include('ADMIN/config/constants.php')?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="pics/i.png" type="image/png">
    <title>Tasty Treasure - It's finger lickin' good</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/responsive.css">
    

</head>

<body>
      <!--js link-->
      <script type="text/javascript" src="js/responsive.js"></script>
      <header>
          <div class="nav">
              <div class="logo">
                  <a href="<?php echo SITEURL;?>"><img src="images/i.png" alt="Tasty Treasure Logo" width="70" height="70"></a>
                  <h2 class="logo">Tasty Treasure</h2>
              </div>
              
              <div class="header-right"> 
                 <a    href="<?php echo SITEURL;?>">Home</a>
                  <a href="<?php echo SITEURL;?>menu.php">Menu</a>
                  <a class="active" href="<?php echo SITEURL;?>about.php">About</a>
                  <a href="<?php echo SITEURL;?>order.php" class="cta-button">Order Now</a>
  
              </div>
              <button class="hamburger" aria-label="Toggle menu">☰</button>
             
             
          </div>
          
          <section id="drop-menu">
              <ul class="nav-menu">
                  <li><a href="<?php echo SITEURL;?>">Home</a></li>
                  <li><a href="<?php echo SITEURL;?>menu.php">Menu</a></li>
                  <li><a href="<?php echo SITEURL;?>about.php">About</a></li>
                  <li><a href="<?php echo SITEURL;?>order.php" >Order Now</a></li>
              </ul>
  
          </section>
           <!-- Slideshow section -->
        <div class="slideshow-container">

<div class="mySlides">
    <div class="numbertext">1 / 3</div>
    <img src="images/slide1.jpg" alt="Slide 1" style="width:100%">
    <div class="text">COLLABORATORS</div>
</div>

<div class="mySlides">
    <div class="numbertext">2 / 3</div>
    <img src="images/slide2.jpg" alt="Slide 2" style="width:100%">
    <div class="text">THE WORKING PROCESS</div>
</div>

<div class="mySlides">
    <div class="numbertext">3 / 3</div>
    <img src="images/slide3.jpg" alt="Slide 3" style="width:100%">
    <div class="text">THE WORKING PROCESS</div>
</div>

</div>
<!-- Add dots/circles -->
<div style="text-align:center">
<span class="dot"></span> 
<span class="dot"></span> 
<span class="dot"></span> 
</div>


</header>

    <main>
        <section class="about-hero">
            <h1>Our Tasty Target</h1>
            <p>Discover the mission behind our finger lickin' good treasures!</p>
        </section>

        <section id="our-story">
            <h2>The Tasty Treasure</h2>
            <div class="story-content">
                <p>Welcome to Tasty Treasure, where our signature crispy chicken and unique flavor combinations are served directly at your door. Located in the heart of ICT UNIVERSITY, we are passionate about delivering an unforgettable dining experience to every guest.</p>
                <p>Founded in 2024, Tasty Treasure started as a small food stall in the heart of the ICT UNIVERSITY. Our love for crispy chicken and unique flavors quickly gained a loyal following, leading us to open our first full-fledged restaurant. Over the years, we've stayed true to our roots while continuously innovating to meet the evolving tastes of our customers.</p>
            </div>
        </section>
        <!-- Openning Hours-->
        <section id="opening-hours">
            <h2>Opening Hours</h2>
            <table>
                <tr>
                    <th>Day</th>
                    <th>Hours</th>
                </tr>
                <tr>
                    <td>Monday</td>
                    <td>11:00 AM - 10:00 PM</td>
                </tr>
                <tr>
                    <td>Tuesday</td>
                    <td>11:00 AM - 10:00 PM</td>
                </tr>
                <tr>
                    <td>Wednesday</td>
                    <td>11:00 AM - 10:00 PM</td>
                </tr>
                <tr>
                    <td>Thursday</td>
                    <td>11:00 AM - 10:00 PM</td>
                </tr>
                <tr>
                    <td>Friday</td>
                    <td>11:00 AM - 11:00 PM</td>
                </tr>
                <tr>
                    <td>Saturday</td>
                    <td>12:00 PM - 11:00 PM</td>
                </tr>
                <tr>
                    <td>Sunday</td>
                    <td>12:00 PM - 9:00 PM</td>
                </tr>
            </table>
        </section>

        <section id="our-values">
            <h2>Our Core Values</h2>
            <div class="values-grid">
                <div class="value-item">
                    <h3>Quality</h3>
                    <p>We never compromise on the quality of our ingredients or our cooking process.</p>
                </div>
                <div class="value-item">
                    <h3>Community</h3>
                    <p>We believe in giving back to the communities that have supported us.</p>
                </div>
                <div class="value-item">
                    <h3>Innovation</h3>
                    <p>We're always exploring new flavors and combinations to put a smile on  our customers when ever they come back to us.</p>
                </div>
                <div class="value-item">
                    <h3>Sustainability</h3>
                    <p>We're committed to reducing our environmental impact in all aspects of our business.</p>
                </div>
            </div>
        </section> 
        <!-- Team Members section -->
        <section id="team">
            <h2>Meet Our Team</h2>
            <div class="team-container">
                <!-- Team Member 1 -->
                <div class="team-member">
                    <img src="images/memeber1.jpg" alt="Member 1" class="member-photo">
                    <h3 class="member-name">GNOWA TEMGA GESSE K.</h3>
                    <p class="member-task">Project leader: Front End Developer</p>
                </div>
                <!-- Team Member 2 -->
                <div class="team-member">
                    <img src="images/member2.jpg" alt="Member 2" class="member-photo">
                    <h3 class="member-name">SUH JUNIOR SUH A. </h3>
                    <p class="member-task">Project Manager: Back End Developer</p>
                </div>
                 <!-- Team Member 3 -->
                <div class="team-member">
                    <img src="images/member3.jpg" alt="Member 3" class="member-photo">
                    <h3 class="member-name">KOUOTOU JEFF LIONEL</h3>
                    <p class="member-task">Front End Developer</p>
                </div>
                <!-- Team Member 4 -->
                <div class="team-member">
                    <img src="images/member4.jpg" alt="Member 4" class="member-photo">
                    <h3 class="member-name">KIMBI THIERRY FON</h3>
                    <p class="member-task">Front End Developer</p>
                </div>
                <!-- Team Member 5-->
                <div class="team-member">
                    <img src="images/member5.jpg" alt="Member 5" class="member-photo">
                    <h3 class="member-name">TCHANGO NOUDOU JOSEPH E.</h3>
                    <p class="member-task">Front End Developer</p>
                </div>
                <!-- Team Member 6 -->
                <div class="team-member">
                    <img src="images/member6.jpg" alt="Member 6" class="member-photo">
                    <h3 class="member-name">ASOBO KHAN DUGA</h3>
                    <p class="member-task">Front End Developer</p>
                </div>
                <!-- Team Member 7 -->
                <div class="team-member">
                    <img src="images/member7.jpg" alt="Member 7" class="member-photo">
                    <h3 class="member-name">JOHN PAUL NJUH A.</h3>
                    <p class="member-task">Front End Developer</p>
                </div>
                <!-- Team Member 8 -->
                <div class="team-member">
                    <img src="images/memeber8.jpg" alt="Member 8" class="member-photo">
                    <h3 class="member-name">JEUFO TEGOFACK STANN</h3>
                    <p class="member-task">Front End Developer</p>
                </div>
            </div>
        </section>
        <section id="call-to-action">
        <h2>Ready to Taste the Treasure?</h2>
                  <p class="p1">Whether you're dining in or ordering for delivery, we're ready to serve you with the best flavors in town.</p>
                  <a href="order.php" class="cta-button">Order Now</a>
        </section>
        
     </main>

    <footer>
        <div class="footer-help-section">
                <h2>Help & Support</h2>
                <p>If you have any questions or need assistance, please check the following resources:</p>
                <p><strong>Phone:</strong> (+237) 677-588-867</p>
                <ul>
                    <li><a href="faqs.html">FAQs</a></li> 
                    <p>
                        <a href="sitemap.php">Sitemap</a>
                    </p>
                    <a href="about french.html">SWITCH TO FRENCH</a>
                    <p><a href="about.php">BACK TO HOME</a></p>
                </ul>
            </div>
            <p>&copy; 2024 Tasty Treasure. All rights reserved.</p>
    </footer>
    <!-- Slideshow script -->
     <script>
        var slideIndex = 0;
        showSlides();
        function showSlides() {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("dot");
         // hide all slides
            for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
          }
            // reset the index if it exceeds the number of slides
          slideIndex++;
          if (slideIndex > slides.length) {
              slideIndex = 1;
          }
            // Remove the "active" class from all dots
          for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active_carousel", "");
          }
              // display the current slide and mark the coressponding dot as active
          slides[slideIndex-1].style.display = "block";  
          dots[slideIndex-1].className += " active_carousel";
          setTimeout(showSlides, 3500); // Change image every 3.5 seconds
        }
      </script>
</body>

</html>

