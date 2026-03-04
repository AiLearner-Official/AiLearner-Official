<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite Auto Spa | Premium Car Detailing & Wash Services</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Professional auto detailing, ceramic coating, and premium car wash services. Experience luxury automotive care with our certified team.">
    <meta name="keywords" content="car detailing, auto detailing, ceramic coating, car wash, paint correction, interior detailing">
    <meta name="author" content="Elite Auto Spa">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <!-- AOS (Animate On Scroll) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    
    <style>
        /* Preloader Styles */
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #0A1931 0%, #185ADB 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s, visibility 0.5s;
        }
        
        .preloader.hidden {
            opacity: 0;
            visibility: hidden;
        }
        
        .preloader-content {
            text-align: center;
        }
        
        .preloader-logo {
            font-size: 3.5rem;
            color: #10B981;
            margin-bottom: 2rem;
            animation: pulse 2s infinite;
        }
        
        .loader {
            width: 80px;
            height: 80px;
            border: 5px solid rgba(255,255,255,0.1);
            border-top: 5px solid #10B981;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        
        /* Cursor Effect */
        .cursor {
            position: fixed;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: rgba(16, 185, 129, 0.5);
            pointer-events: none;
            z-index: 9999;
            mix-blend-mode: difference;
            transition: transform 0.1s;
        }
        
        .cursor-follower {
            position: fixed;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(16, 185, 129, 0.2);
            pointer-events: none;
            z-index: 9998;
            transition: all 0.6s ease;
        }
        
        /* Floating Particles */
        .particles-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }
        
        .particle {
            position: absolute;
            background: rgba(16, 185, 129, 0.3);
            border-radius: 50%;
            animation: float 20s infinite linear;
        }
    </style>
</head>
<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-content">
            <div class="preloader-logo">
                <i class="fas fa-car"></i>
            </div>
            <div class="loader"></div>
            <p style="color: white; margin-top: 20px; font-size: 1.2rem;">Loading Experience...</p>
        </div>
    </div>
    
    <!-- Custom Cursor -->
    <div class="cursor"></div>
    <div class="cursor-follower"></div>
    
    <!-- Floating Particles -->
    <div class="particles-container" id="particles"></div>
    
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header-inner">
                <!-- Logo -->
                <a href="index.php" class="logo">
                    <div class="logo-icon">
                        <i class="fas fa-car"></i>
                    </div>
                    <div class="logo-text">
                        <h1>Elite Auto Spa</h1>
                        <span class="logo-tagline">Premium Detailing Services</span>
                    </div>
                </a>
                
                <!-- Desktop Navigation -->
                <nav class="desktop-nav">
                    <ul class="nav-menu">
                        <li><a href="#home" class="nav-link active" data-section="home">
                            <i class="fas fa-home"></i> Home
                        </a></li>
                        <li><a href="#services" class="nav-link" data-section="services">
                            <i class="fas fa-concierge-bell"></i> Services
                        </a></li>
                        <li><a href="#about" class="nav-link" data-section="about">
                            <i class="fas fa-info-circle"></i> About
                        </a></li>
                        <li><a href="#gallery" class="nav-link" data-section="gallery">
                            <i class="fas fa-images"></i> Gallery
                        </a></li>
                        <li><a href="#testimonials" class="nav-link" data-section="testimonials">
                            <i class="fas fa-star"></i> Reviews
                        </a></li>
                        <li><a href="#contact" class="nav-link" data-section="contact">
                            <i class="fas fa-phone"></i> Contact
                        </a></li>
                        <li class="nav-cta">
                            <a href="#contact" class="btn btn-primary btn-sm">
                                <i class="fas fa-calendar-check"></i> Book Now
                            </a>
                        </li>
                    </ul>
                </nav>
                
                <!-- Mobile Menu Toggle -->
                <button class="mobile-menu-toggle" aria-label="Toggle mobile menu">
                    <span class="hamburger"></span>
                </button>
                
                <!-- Contact Info -->
                <div class="header-contact">
                    <a href="tel:+15551234567" class="contact-link">
                        <i class="fas fa-phone"></i>
                        <span>(555) 123-4567</span>
                    </a>
                </div>
            </div>
            
            <!-- Mobile Navigation -->
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li><a href="#home" class="mobile-nav-link">
                        <i class="fas fa-home"></i> Home
                    </a></li>
                    <li><a href="#services" class="mobile-nav-link">
                        <i class="fas fa-concierge-bell"></i> Services
                    </a></li>
                    <li><a href="#about" class="mobile-nav-link">
                        <i class="fas fa-info-circle"></i> About Us
                    </a></li>
                    <li><a href="#gallery" class="mobile-nav-link">
                        <i class="fas fa-images"></i> Gallery
                    </a></li>
                    <li><a href="#testimonials" class="mobile-nav-link">
                        <i class="fas fa-star"></i> Testimonials
                    </a></li>
                    <li><a href="#contact" class="mobile-nav-link">
                        <i class="fas fa-phone"></i> Contact
                    </a></li>
                    <li>
                        <a href="#contact" class="btn btn-primary btn-block">
                            <i class="fas fa-calendar-check"></i> Book Appointment
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        
        <!-- Progress Bar -->
        <div class="scroll-progress">
            <div class="progress-bar"></div>
        </div>
    </header>