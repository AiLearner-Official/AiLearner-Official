<?php
session_start();
include 'connect.php';
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bakery</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

<!-- ===== SEARCH BAR ===== -->
<div class="top-search">
    <input type="text" placeholder="Search cakes, brownies, desserts...">
</div>

<!-- ===== NAVBAR ===== -->
<nav class="navbar">
    <div class="logo">Sweet delights</div>

    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="#">About</a></li>

        <li class="dropdown">
            <a href="#">Categories ▾</a>
            <ul class="dropdown-menu">
                <li><a href="chocolate.php">Chocolate Cake</a></li>
                <li><a href="red-velvet.php">Red Velvet Cake</a></li>
                <li><a href="signature.php">Signature Cakes</a></li>
                <li><a href="sponge.php">Sponge Cakes</a></li>
                <li><a href="brownies.php">Brownies</a></li>
                <li><a href="molten.php">Molten Lava</a></li>
                <li><a href="vanilla.php">Vanilla Cake</a></li>
            </ul>
        </li>

        <li><a href="#products">Products</a></li>
        <li><a href="#contact">Contact Us</a></li>
    </ul>

    <a href="#contact" class="learn-more">Learn More</a>

        
<!-- Add profile + cart -->
<div class="header-icons">
    <a href="auth.php" class="profile-icon"><i class="fas fa-user-circle"></i></a>
    <a href="cart.php" class="cart-icon"><i class="fas fa-shopping-cart"></i></a>
</div>

</nav>

<!-- ===== HERO SECTION ===== -->
<section class="hero">
    <div class="hero-text">
        <h1>Sweet Moments<br>Start Here</h1>
        <p>
            Where every slice tells a story — handcrafted cakes, rich flavors,
            and unforgettable sweetness baked with love just for you.
        </p>

        <a href="#products" class="btn-shop">Shop Now</a>
    </div>

    <div class="hero-image">
        <img src="" alt="Cake">
    </div>
</section>





    
    <section class="product-section">
  <h2>Hold a cake</h2>
  <p class="subtitle">Pick out to eat dessert profiting.</p>  <div class="products">
    <!-- Chocolate Cake -->
    <div class="card">
      <span class="cart" onclick="addToCart('Chocolate Cake')"><i class="fa-solid fa-cart-shopping"></i> </span>
      <img src="WhatsApp Image 2025-12-19 at 1.44.36 AM.jpeg" alt="Chocolate Cake">
      <h3>Chocolate Cake</h3>
      <p class="price">Rs 26.0$</p>
      <a href="chocolate.html" class="btn">View More <span>→</span></a>
    </div><!-- Red Velvet -->
<div class="card">
  <span class="cart" onclick="addToCart('Red Velvet Cake')"><i class="fa-solid fa-cart-shopping" ></i></span>
  <img src="WhatsApp Image 2025-12-19 at 1.44.36 AM (1).jpeg" alt="Red Velvet Cake">
  <h3>Red Velvet Cake</h3>
  <p class="price">Rs 20.0$</p>
  <a href="redvelvet.html" class="btn">View More <span>→</span></a>
</div>

<!-- Sponge Cake -->
<div class="card">
  <span class="cart" onclick="addToCart('Sponge Cake')"><i class="fa-solid fa-cart-shopping" ></i> </span>
  <img src="WhatsApp Image 2025-12-19 at 2.11.38 AM.jpeg" alt="Sponge Cake">
  <h3>Sponge Cake</h3>
  <p class="price">23.0$</p>
  <a href="sponge.html" class="btn">View More <span>→</span></a>
</div>

  </div>
</section>






<!-- ===== NEW ITEMS / OFFER SECTION ===== -->
<section class="offer-section" style="margin-top:5px;">

    <h2 class="offer-heading">New Items</h2>

    <div class="offer-row">

        <!-- Holiday Offer -->
        <div class="offer-card holiday">
            
            <h3>Holiday</h3>
            <p class="discount">– 20% OFF</p>
            <a href="#products" class="offer-btn">Once Today</a>
        </div>

        <!-- Muffins -->
        <div class="offer-card muffins">
            
        
            <a href="#products" class="offer-btn" style="margin-top: 90px;">Order Now</a>
        </div>

    </div>

</section>







<!-- ===== ABOUT SECTION ===== -->
<section class="about-section" id="about">
    <div class="about-text">
        <h2>About Us</h2>

        <p>
            At <strong>Sweet delights</strong>, we believe that every dessert tells a story.
            From soft sponges to rich chocolate layers, our baked goods are crafted
            with passion, care, and the finest ingredients.
        </p>

        <p>
            Whether it’s a celebration, a sweet surprise, or a moment of indulgence,
            our cakes are designed to bring joy, warmth, and unforgettable flavors
            to your table.
        </p>

        <p>
            With love for baking and an eye for detail, we make sure every bite
            reflects quality, elegance, and homemade goodness.
        </p>
    </div>

    <div class="about-image">
        <img id="aboutImg" src="shope.jpeg" alt="Bakery Image">
        
    </div>
</section>




<section class="reviews-section">
  <div class="reviews-header">
    <h2>Buyer Gallery <span>(Latest)</span></h2>
    <a href="reviews.php" class="view-all">View All ›</a>
  </div>

  <div class="review-gallery">

    <?php
    include 'connect.php';
    $q = mysqli_query($conn,"SELECT * FROM reviews LIMIT 4");
    while($row = mysqli_fetch_assoc($q)){
    ?>

    <div class="review-item">
      <?php if(strpos($row['media'],'mp4')){ ?>
        <video muted>
          <source src="uploads/<?php echo $row['media']; ?>">
        </video>
      <?php } else { ?>
        <img src="uploads/<?php echo $row['media']; ?>">
      <?php } ?>
    </div>

    <?php } ?>
  </div>
</section>








<!-- ===== FOOTER ===== -->
 <div style="clear: both;"></div>
<footer class="footer">

    <!-- Newsletter -->
    <div class="footer-top">
        <p class="newsletter-text">
            Get exclusive offers, updates,<br>
            and inspiration in your inbox!
        </p>

        <div class="newsletter-box">
            <input type="email" placeholder="Enter your email">
            <button>Subscribe</button>
        </div>
    </div>




    
    <!-- Footer Links -->
     
    <div class="footer-content">

        <div class="footer-col">
            <h4>Quick Links</h4>
            <a href="index.php">Home</a>
            <a href="#products">Shop</a>
            <a href="#about">About Us</a>
            <a href="#">FAQ</a>
        </div>

        <div class="footer-col">
            <h4>Customer Service</h4>
            <a href="#">Returns & Exchanges</a>
            <a href="#">Order Tracking</a>
            <a href="#">Size Guide</a>
            <a href="auth.php">Contact Us</a>
        </div>

        <div class="footer-col">
            <h4>Legal Information</h4>
            <a href="#">Terms & Conditions</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Cookie Policy</a>
        </div>

        <div class="footer-col">
            <h4>Contact Info</h4>
            <p>Multan, Mehmood Kot</p>
            <p>+92 3XX XXX XXXX</p>
            <p>daniabatool650@gmail.com</p>
        </div>

    </div>

    <!-- Bottom -->
    <div class="footer-bottom">
        <p>© 2025 Bakery. All Rights Reserved.</p>

        <div class="social-icons">
            <i class="fa-brands fa-facebook-f"></i>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-youtube"></i>
        </div>
    </div>

</footer>














<script src="script.js"></script>








</body>
</html>