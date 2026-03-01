<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AQUILON | The Future of Robotics</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navigation -->
    <header>
        <div class="container">
            <nav class="navbar">
                <div class="logo">
                    <span class="logo-icon"><i class="fas fa-robot"></i></span>
                    <span class="logo-text">ROBO.TECH</span>
                </div>
                
                <ul class="nav-links">
                    <li><a href="#home" class="active">Home</a></li>
                    <li><a href="#products">Products</a></li>
                    <li><a href="#popular-robots">Popular Robots</a></li>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#technology">Technology</a></li>
                    <li><a href="blog.php">Blogs</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>

                </ul>
                
                <div class="nav-right">
                    <div class="search-container">
                        <input type="text" class="search-input" placeholder="Search...">
                        <button class="search-btn"><i class="fas fa-search"></i></button>
                    </div>
                    <button class="mobile-menu-btn" id="mobileMenuBtn">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </nav>
        </div>
       <div class="auth-links">
    <a href="login.php" class="btn btn-secondary btn-small">Login</a>
    <a href="register.php" class="btn btn-primary btn-small">Register</a>
</div>


    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="fade-in">The Future of <span class="gradient-text">Robotics</span> is Here</h1>
                    <p class="hero-subtitle slide-up">AQUILON combines cutting-edge artificial intelligence with elegant design to create the most advanced humanoid assistant ever conceived.</p>
                    <div class="hero-buttons slide-up">
                        <a href="#products" class="btn btn-primary">Explore Product</a>
                        <a href="#technology" class="btn btn-secondary">View Technology</a>
                    </div>
                </div>
                 
<div class="hero-visual">
    <div class="robot-container">
        <video class="hero-video" autoplay muted loop playsinline>
            <source src="robo.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</div>


                        </div>
                    </div>
            
            
        </div>
    </section>






<!-- Popular Robots Section -->
<section class="popular-robots" id="popular-robots">
    <div class="container">
        <div class="section-header fade-in">
            <h2>Popular <span class="gradient-text">Robots</span></h2>
            <p>Most admired humanoid robots this week</p>
        </div>

        <div class="robot-slider-wrapper">
            <!-- Left Arrow -->
            <button class="slider-btn left" id="slideLeft">
                <i class="fas fa-chevron-left"></i>
            </button>

            <!-- Slider -->
            <div class="robot-slider" id="robotSlider">
                <div class="robot-card">
                    <img src="WhatsApp Image 2025-12-25 at 7.10.07 AM.jpeg">
                    <h4>Aurion X</h4>
                </div>
                <div class="robot-card">
                    <img src="robot2.jpeg">
                    <h4>Neo Prime</h4>
                </div>
                <div class="robot-card">
                    <img src="robot3.jpeg">
                    <h4>Cyberis</h4>
                </div>
                <div class="robot-card">
                    <img src="robot4.jpeg">
                    <h4>Atlas AI</h4>
                </div>
                <div class="robot-card">
                    <img src="robot5.jpeg">
                    <h4>Zenon</h4>
                </div>

<div class="robot-card">
    <img src="robot6.jpeg">
    <h4>Emo</h4>
</div>

<div class="robot-card">
    <img src="robot7.jpeg" alt="Robot 5">
    <h4>Cyber Scout</h4>
    
</div>

<div class="robot-card">
    <img src="robot8.jpeg" alt="Robot 6">
    <h4>Eilike</h4>
    
</div>

            </div>

            <!-- Right Arrow -->
            <button class="slider-btn right" id="slideRight">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
</section>











    <!-- Product Features -->
    <section class="features" id="features">
        <div class="container">
            <div class="section-header fade-in">
                <h2>Advanced <span class="gradient-text">Features</span></h2>
                <p>Discover the groundbreaking capabilities that set AQUILON apart</p>
            </div>
            
            <div class="features-grid">
                <div class="feature-card scale-up">
                    <div class="feature-icon">
                        <i class="fas fa-brain"></i>
                    </div>
                    <h3>Neural AI Processor</h3>
                    <p>Our proprietary neural network enables real-time learning and adaptation to your needs and environment.</p>
                </div>
                
                <div class="feature-card scale-up">
                    <div class="feature-icon">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <h3>Precision Manipulation</h3>
                    <p>Advanced haptic sensors and fluid motion control allow for delicate object handling and complex tasks.</p>
                </div>
                
                <div class="feature-card scale-up">
                    <div class="feature-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3>360° Perception</h3>
                    <p>Multi-spectral vision system with depth sensing provides complete environmental awareness.</p>
                </div>
                
                <div class="feature-card scale-up">
                    <div class="feature-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <h3>Natural Communication</h3>
                    <p>Advanced NLP and emotional intelligence for seamless human-robot interaction.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Technology Section -->
    <section class="technology" id="technology">
        <div class="container">
            <div class="section-header fade-in">
                <h2>Technical <span class="gradient-text">Specifications</span></h2>
                <p>Engineered for excellence with premium components</p>
            </div>
            
            <div class="specs-container">
                <div class="specs-image slide-left">
                    <div class="specs-visual">
                        <div class="spec-connector"></div>
                        <div class="spec-chip"></div>
                        <div class="spec-light"></div>
                    </div>
                </div>
                
                <div class="specs-list slide-right">
                    <div class="spec-item">
                        <h4>Processing Power</h4>
                        <p>Quantum Neural Processor with 128-core architecture</p>
                        <div class="spec-bar">
                            <div class="spec-progress" style="width: 95%"></div>
                        </div>
                    </div>
                    
                    <div class="spec-item">
                        <h4>Battery Life</h4>
                        <p>72 hours of continuous operation with fast-charging capability</p>
                        <div class="spec-bar">
                            <div class="spec-progress" style="width: 90%"></div>
                        </div>
                    </div>
                    
                    <div class="spec-item">
                        <h4>Connectivity</h4>
                        <p>5G, Wi-Fi 6E, Bluetooth 5.3, and secure satellite uplink</p>
                        <div class="spec-bar">
                            <div class="spec-progress" style="width: 88%"></div>
                        </div>
                    </div>
                    
                    <div class="spec-item">
                        <h4>Material Strength</h4>
                        <p>Aerospace-grade titanium alloy with carbon fiber reinforcement</p>
                        <div class="spec-bar">
                            <div class="spec-progress" style="width: 92%"></div>
                        </div>
                    </div>
                    
                    <div class="spec-item">
                        <h4>AI Capabilities</h4>
                        <p>Real-time environmental analysis with predictive behavior modeling</p>
                        <div class="spec-bar">
                            <div class="spec-progress" style="width: 96%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about" id="about">
        <div class="container">
            <div class="section-header fade-in">
                <h2>About <span class="gradient-text">ROBO.TECH</span></h2>
                <p>Pioneering the future of human-robot collaboration</p>
            </div>
            
            <div class="about-content">
                <div class="about-text slide-left">
                    <h3>Our Vision</h3>
                    <p>At ROBO.TECH, we believe in creating robotic companions that enhance human potential rather than replace it. Our mission is to develop intelligent systems that work alongside humans to solve complex challenges.</p>
                    <p>Founded in 2020 by a team of robotics engineers and AI researchers from leading tech institutions, AQUILON has quickly become a leader in humanoid robotics technology.</p>
                    <div class="stats">
                        <div class="stat">
                            <h4>500+</h4>
                            <p>Research Papers</p>
                        </div>
                        <div class="stat">
                            <h4>150+</h4>
                            <p>Patents Filed</p>
                        </div>
                        <div class="stat">
                            <h4>24</h4>
                            <p>Countries Served</p>
                        </div>
                    </div>
                </div>





                <div class="about-image slide-right">  
    <div class="about-visual">  
        <div class="tech-grid">
<div class="tech-item">
    <img src="images/about1.jpeg">
    </div>

    <!-- Video 2 -->
    <div class="tech-item">
        <img src="images/about2.jpeg">
    </div>
            
            <div class="tech-item">
                <img src="images/about3.jpeg" alt="Robot Image 3">
            </div>
            <div class="tech-item">
                <img src="images/about4.jpeg" alt="Robot Image 4">
            </div>
            <div class="tech-item">
                <img src="images/about5.jpeg" alt="Robot Image 5">
            </div>
            <div class="tech-item">
                <img src="images/about6.jpeg" alt="Robot Image 6">
            </div>
        </div>  
    </div>  
</div>



    </section>

    <!-- Call to Action -->
    <section class="cta-section" id="products">
        <div class="container">
            <div class="cta-content fade-in">
                <h2>Experience the Future Today</h2>
                <p>Join thousands of early adopters who have already integrated ROBO.TECH into their daily lives. Limited pre-order slots available.</p>
                <a href="#contact" class="btn btn-primary btn-large">Pre-Order Now</a>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact" id="contact">
        <div class="container">
            <div class="section-header fade-in">
                <h2>Get In <span class="gradient-text">Touch</span></h2>
                <p>Have questions about AQUILON? Our team is ready to assist you.</p>
            </div>
            
            <div class="contact-content">
                <div class="contact-form slide-left">

<form id="contactForm" action="submit_contact.php" method="POST">
    <div class="form-group">
        <input type="text" name="name" placeholder="Your Name" required>
    </div>
    <div class="form-group">
        <input type="email" name="email" placeholder="Your Email" required>
    </div>
    <div class="form-group">
        <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Send Message</button>
</form>







                </div>
                <div class="contact-info slide-right">
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="info-content">
                            <h4>Visit Our Headquarters</h4>
                            <p>123 Innovation Drive<br>Tech City, TC 10101</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="info-content">
                            <h4>Call Us</h4>
                            <p>+1 (555) 123-4567<br>Mon-Fri, 9:00 AM - 6:00 PM</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="info-content">
                            <h4>Email Us</h4>
                            <p>info@aquilon-robotics.com<br>support@aquilon-robotics.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="logo footer-logo">
                        <span class="logo-icon"><i class="fas fa-robot"></i></span>
                        <span class="logo-text">AQUILON</span>
                    </div>
                    <p class="footer-description">Creating intelligent robotic solutions for a better tomorrow.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h4>Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#products">Products</a></li>
                        <li><a href="#features">Features</a></li>
                        <li><a href="#technology">Technology</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4>Support</h4>
                    <ul class="footer-links">
                        <li><a href="#">Documentation</a></li>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4>Contact</h4>
                    <ul class="footer-contact">
                        <li><i class="fas fa-map-marker-alt"></i> 123 Innovation Drive, Tech City</li>
                        <li><i class="fas fa-phone"></i> +1 (555) 123-4567</li>
                        <li><i class="fas fa-envelope"></i> info@aquilon-robotics.com</li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2025 AQUILON Robotics. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button class="back-to-top" id="backToTop">
        <i class="fas fa-chevron-up"></i>
    </button>

    <script src="script.js"></script>
</body>
</html>