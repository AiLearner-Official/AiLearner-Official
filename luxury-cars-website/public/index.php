<?php
session_start();
require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestige Auto Detailing | Luxury Car Care & Professional Detailing Services</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Premium auto detailing, ceramic coating, paint correction, and luxury car care services. Experience automotive excellence with our master detailers.">
    <meta name="keywords" content="auto detailing, ceramic coating, paint correction, luxury car wash, professional detailing, car care">
    <meta name="author" content="Prestige Auto Detailing">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph -->
    <meta property="og:title" content="Prestige Auto Detailing | Luxury Car Care">
    <meta property="og:description" content="Professional auto detailing services for luxury and exotic vehicles.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://prestigeautodetailing.com">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <!-- GSAP for advanced animations -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollToPlugin.min.js"></script>
    
    <!-- Main CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/css/animations.css">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🚗</text></svg>">
    
    <style>
        :root {
            --luxury-black: #0A0A0A;
            --premium-gold: #D4AF37;
            --deep-blue: #001F3F;
            --crystal-white: #FFFFFF;
            --platinum: #E5E5E5;
            --emerald: #10B981;
            --ruby: #DC2626;
            
            --gradient-luxury: linear-gradient(135deg, var(--luxury-black) 0%, var(--deep-blue) 100%);
            --gradient-gold: linear-gradient(135deg, var(--premium-gold) 0%, #F1C40F 100%);
            --gradient-emerald: linear-gradient(135deg, var(--emerald) 0%, #34D399 100%);
            
            --shadow-luxury: 0 20px 60px rgba(0, 0, 0, 0.3);
            --shadow-glow: 0 0 40px rgba(212, 175, 55, 0.3);
            --shadow-float: 0 30px 60px rgba(0, 0, 0, 0.4);
        }
        
        /* Preloader */
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--luxury-black);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .preloader-content {
            text-align: center;
        }
        
        .preloader-logo {
            font-size: 4rem;
            color: var(--premium-gold);
            margin-bottom: 2rem;
            animation: goldPulse 2s infinite;
        }
        
        .preloader-text {
            color: var(--platinum);
            font-size: 1.2rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            margin-bottom: 2rem;
        }
        
        .preloader-bar {
            width: 300px;
            height: 3px;
            background: rgba(255,255,255,0.1);
            border-radius: 3px;
            overflow: hidden;
            margin: 0 auto;
        }
        
        .preloader-progress {
            width: 0%;
            height: 100%;
            background: var(--gradient-gold);
            animation: loading 2s ease-in-out forwards;
        }
        
        /* Floating Elements */
        .floating-shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(212, 175, 55, 0.1);
            filter: blur(40px);
            animation: floatShape 20s infinite linear;
            z-index: -1;
        }
        
        /* Glowing Border Effect */
        .glow-border {
            position: relative;
            border-radius: 20px;
        }
        
        .glow-border::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: var(--gradient-gold);
            border-radius: 22px;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        .glow-border:hover::before {
            opacity: 1;
            animation: borderGlow 2s infinite;
        }
        
        /* Text Reveal Animation */
        .text-reveal {
            overflow: hidden;
            position: relative;
        }
        
        .text-reveal::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background: var(--luxury-black);
            animation: textReveal 1.5s cubic-bezier(0.77, 0, 0.175, 1) forwards;
        }
        
        /* 3D Card Effect */
        .card-3d {
            transform-style: preserve-3d;
            perspective: 1000px;
            transition: transform 0.5s cubic-bezier(0.23, 1, 0.32, 1);
        }
        
        .card-3d:hover {
            transform: translateY(-20px) rotateX(5deg) rotateY(5deg);
        }
        
        /* Particle Background */
        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 0;
        }
    </style>
</head>
<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-content">
            <div class="preloader-logo">
                <i class="fas fa-gem"></i>
            </div>
            <div class="preloader-text">Prestige Auto Detailing</div>
            <div class="preloader-bar">
                <div class="preloader-progress"></div>
            </div>
        </div>
    </div>
    
    <!-- Floating Background Shapes -->
    <div class="floating-shape shape-1" style="width: 300px; height: 300px; top: 10%; left: 5%;"></div>
    <div class="floating-shape shape-2" style="width: 200px; height: 200px; top: 60%; right: 10%;"></div>
    <div class="floating-shape shape-3" style="width: 400px; height: 400px; bottom: 10%; left: 20%;"></div>
    
    <!-- Header -->
    <?php include 'includes/header.php'; ?>
    
    <!-- Hero Section with Particle Background -->
    <section class="hero" id="home">
        <div id="particles-js"></div>
        <div class="hero-overlay"></div>
        
        <div class="container">
            <div class="hero-content">
                <div class="hero-badge animate__animated animate__fadeInDown">
                    <span><i class="fas fa-crown"></i> Luxury Detailing</span>
                </div>
                
                <h1 class="hero-title text-reveal">
                    <span class="line">Automotive</span>
                    <span class="line">Perfection</span>
                    <span class="line">Redefined</span>
                </h1>
                
                <p class="hero-subtitle animate__animated animate__fadeInUp animate__delay-1s">
                    Experience unparalleled craftsmanship with our premium detailing services. 
                    Where precision meets passion, and every vehicle becomes a masterpiece.
                </p>
                
                <div class="hero-cta animate__animated animate__fadeInUp animate__delay-2s">
                    <a href="#services" class="btn btn-gold btn-sparkle">
                        <i class="fas fa-gem"></i>
                        <span>Explore Services</span>
                        <div class="sparkle-container">
                            <div class="sparkle"></div>
                            <div class="sparkle"></div>
                            <div class="sparkle"></div>
                        </div>
                    </a>
                    <a href="#booking" class="btn btn-outline-gold">
                        <i class="fas fa-calendar-star"></i>
                        <span>Book Experience</span>
                    </a>
                </div>
                
                <!-- Luxury Stats -->
                <div class="hero-stats">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-award"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-number" data-count="15">0</div>
                            <div class="stat-label">Years Excellence</div>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-car"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-number" data-count="5000">0+</div>
                            <div class="stat-label">Luxury Cars</div>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-number" data-count="99.8">0%</div>
                            <div class="stat-label">Satisfaction</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="scroll-indicator">
            <div class="mouse">
                <div class="wheel"></div>
            </div>
            <span>Discover Luxury</span>
        </div>
        
        <!-- Video Background (optional) -->
        <div class="hero-video">
            <video autoplay muted loop playsinline>
                <source src="https://assets.mixkit.co/videos/preview/mixkit-sports-car-driving-on-a-wet-road-4310-large.mp4" type="video/mp4">
            </video>
            <div class="video-overlay"></div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services" id="services">
        <div class="container">
            <div class="section-header">
                <div class="section-badge">Premium Services</div>
                <h2 class="section-title">Crafting Automotive Masterpieces</h2>
                <p class="section-subtitle">Each service is an art form, perfected through years of expertise</p>
            </div>
            
            <div class="services-grid">
                <!-- Service 1 -->
                <div class="service-card card-3d glow-border">
                    <div class="service-card-inner">
                        <div class="service-header">
                            <div class="service-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="service-badge">Most Popular</div>
                        </div>
                        
                        <h3 class="service-title">Ceramic Pro Coating</h3>
                        <p class="service-description">
                            Advanced nano-ceramic technology providing 9H hardness protection and hydrophobic properties.
                        </p>
                        
                        <div class="service-features">
                            <div class="feature">
                                <i class="fas fa-check-circle"></i>
                                <span>5-Year Warranty</span>
                            </div>
                            <div class="feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Hydrophobic Layer</span>
                            </div>
                            <div class="feature">
                                <i class="fas fa-check-circle"></i>
                                <span>UV Protection</span>
                            </div>
                            <div class="feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Chemical Resistance</span>
                            </div>
                        </div>
                        
                        <div class="service-pricing">
                            <div class="price">
                                <span class="currency">$</span>
                                <span class="amount">1,499</span>
                                <span class="period">starting from</span>
                            </div>
                            <div class="duration">
                                <i class="fas fa-clock"></i>
                                <span>6-8 Hours</span>
                            </div>
                        </div>
                        
                        <div class="service-cta">
                            <button class="btn-book-service" data-service="Ceramic Pro Coating">
                                <i class="fas fa-calendar-plus"></i>
                                <span>Book This Service</span>
                            </button>
                            <a href="#details" class="btn-service-details">
                                <i class="fas fa-info-circle"></i>
                                <span>Learn More</span>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Add 5 more service cards with similar structure -->
            </div>
        </div>
    </section>

    <!-- Gallery Section with Lightbox -->
    <section class="gallery" id="gallery">
        <div class="container">
            <div class="section-header">
                <div class="section-badge">Masterpieces Gallery</div>
                <h2 class="section-title">Transforming Vehicles into Art</h2>
                <p class="section-subtitle">Witness the transformation through our curated gallery</p>
            </div>
            
            <div class="gallery-grid">
                <div class="gallery-item" data-category="exterior">
                    <div class="gallery-image">
                        <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Ceramic Coating Application" loading="lazy">
                        <div class="gallery-overlay">
                            <div class="gallery-content">
                                <h4>Ceramic Coating</h4>
                                <p>Perfect shine and protection</p>
                                <button class="btn-view-image">
                                    <i class="fas fa-expand"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add more gallery items -->
            </div>
        </div>
    </section>

    <!-- Booking Section -->
    <section class="booking" id="booking">
        <div class="container">
            <div class="booking-container">
                <div class="booking-form-container">
                    <div class="booking-header">
                        <h2><i class="fas fa-calendar-star"></i> Schedule Your Experience</h2>
                        <p>Complete this form and our concierge will contact you within 30 minutes</p>
                    </div>
                    
                    <?php if (isset($_SESSION['success'])): ?>
                        <div class="alert alert-success animate__animated animate__slideInDown">
                            <i class="fas fa-check-circle"></i>
                            <div><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-error animate__animated animate__shakeX">
                            <i class="fas fa-exclamation-circle"></i>
                            <div><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
                        </div>
                    <?php endif; ?>
                    
                    <form id="bookingForm" action="process-appointment.php" method="POST" class="booking-form">
                        <div class="form-step active" data-step="1">
                            <h3>Personal Information</h3>
                            <div class="form-grid">
                                <div class="form-group">
                                    <label for="fullName">
                                        <i class="fas fa-user"></i>
                                        <span>Full Name *</span>
                                    </label>
                                    <input type="text" id="fullName" name="fullName" required 
                                           placeholder="Enter your full name"
                                           class="form-input">
                                    <div class="form-feedback"></div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="email">
                                        <i class="fas fa-envelope"></i>
                                        <span>Email Address *</span>
                                    </label>
                                    <input type="email" id="email" name="email" required 
                                           placeholder="your.email@example.com"
                                           class="form-input">
                                    <div class="form-feedback"></div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="phone">
                                        <i class="fas fa-phone"></i>
                                        <span>Phone Number *</span>
                                    </label>
                                    <input type="tel" id="phone" name="phone" required 
                                           placeholder="(555) 123-4567"
                                           class="form-input">
                                    <div class="form-feedback"></div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="vehicle">
                                        <i class="fas fa-car"></i>
                                        <span>Vehicle Type *</span>
                                    </label>
                                    <select id="vehicle" name="vehicle" required class="form-select">
                                        <option value="">Select Vehicle</option>
                                        <option value="sedan">Sedan</option>
                                        <option value="suv">SUV</option>
                                        <option value="coupe">Coupe</option>
                                        <option value="luxury">Luxury Vehicle</option>
                                        <option value="exotic">Exotic/Supercar</option>
                                    </select>
                                    <div class="form-feedback"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-step" data-step="2">
                            <h3>Service Selection</h3>
                            <div class="service-options">
                                <!-- Service options will be populated by JavaScript -->
                            </div>
                        </div>
                        
                        <div class="form-step" data-step="3">
                            <h3>Date & Time</h3>
                            <div class="form-grid">
                                <div class="form-group">
                                    <label for="preferredDate">
                                        <i class="fas fa-calendar-alt"></i>
                                        <span>Preferred Date *</span>
                                    </label>
                                    <input type="date" id="preferredDate" name="preferredDate" required 
                                           class="form-input">
                                    <div class="form-feedback"></div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="preferredTime">
                                        <i class="fas fa-clock"></i>
                                        <span>Preferred Time *</span>
                                    </label>
                                    <select id="preferredTime" name="preferredTime" required class="form-select">
                                        <option value="">Select Time</option>
                                        <option value="09:00">09:00 AM</option>
                                        <option value="11:00">11:00 AM</option>
                                        <option value="13:00">01:00 PM</option>
                                        <option value="15:00">03:00 PM</option>
                                        <option value="17:00">05:00 PM</option>
                                    </select>
                                    <div class="form-feedback"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-step" data-step="4">
                            <h3>Special Requests</h3>
                            <div class="form-group">
                                <label for="specialRequests">
                                    <i class="fas fa-comment-dots"></i>
                                    <span>Additional Notes</span>
                                </label>
                                <textarea id="specialRequests" name="specialRequests" 
                                          placeholder="Any special requirements or concerns..."
                                          class="form-textarea" rows="4"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-navigation">
                            <button type="button" class="btn-prev">
                                <i class="fas fa-arrow-left"></i>
                                Previous
                            </button>
                            <button type="button" class="btn-next">
                                Next
                                <i class="fas fa-arrow-right"></i>
                            </button>
                            <button type="submit" class="btn-submit">
                                <i class="fas fa-paper-plane"></i>
                                Book Appointment
                            </button>
                        </div>
                        
                        <div class="form-progress">
                            <div class="progress-bar">
                                <div class="progress-fill"></div>
                            </div>
                            <div class="progress-steps">
                                <span class="step active" data-step="1"></span>
                                <span class="step" data-step="2"></span>
                                <span class="step" data-step="3"></span>
                                <span class="step" data-step="4"></span>
                            </div>
                        </div>
                    </form>
                </div>
                
                <div class="booking-info">
                    <div class="info-card luxury-card">
                        <div class="info-header">
                            <i class="fas fa-crown"></i>
                            <h3>Why Choose Prestige?</h3>
                        </div>
                        
                        <div class="info-features">
                            <div class="feature">
                                <i class="fas fa-check-circle"></i>
                                <div>
                                    <h4>Master Detailers</h4>
                                    <p>IDA Certified professionals with 10+ years experience</p>
                                </div>
                            </div>
                            
                            <div class="feature">
                                <i class="fas fa-check-circle"></i>
                                <div>
                                    <h4>Premium Products</h4>
                                    <p>Using only Gtechniq, Ceramic Pro, and Swissvax</p>
                                </div>
                            </div>
                            
                            <div class="feature">
                                <i class="fas fa-check-circle"></i>
                                <div>
                                    <h4>Concierge Service</h4>
                                    <p>Pickup, delivery, and luxury waiting lounge</p>
                                </div>
                            </div>
                            
                            <div class="feature">
                                <i class="fas fa-check-circle"></i>
                                <div>
                                    <h4>Warranty Included</h4>
                                    <p>Up to 5-year warranty on all ceramic coatings</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="info-card contact-card">
                        <div class="info-header">
                            <i class="fas fa-headset"></i>
                            <h3>Contact Information</h3>
                        </div>
                        
                        <div class="contact-info">
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <div>
                                    <h4>Studio Location</h4>
                                    <p>123 Luxury Boulevard, Beverly Hills, CA 90210</p>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <div>
                                    <h4>24/7 Concierge</h4>
                                    <p>(310) 555-PRESTIGE</p>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <i class="fas fa-clock"></i>
                                <div>
                                    <h4>Business Hours</h4>
                                    <p>Mon-Fri: 7AM-9PM<br>Sat-Sun: 8AM-7PM</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="script.js"></script>
    <script src="assets/js/effects.js"></script>
    
    <script>
        // Remove no-js class
        document.documentElement.classList.remove('no-js');
        document.documentElement.classList.add('js');
        
        // Initialize when DOM is ready
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Prestige Auto Detailing
            initPrestigeWebsite();
        });
    </script>
</body>
</html>