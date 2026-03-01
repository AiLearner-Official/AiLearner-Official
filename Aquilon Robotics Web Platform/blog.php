<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RoboTech | Future of Robotics & AI</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Orbitron:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="blog.css">
    <link rel="icon" type="image/x-icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🤖</text></svg>">
</head>
<body>
    <!-- Loading Animation -->
    <div class="loader">
        <div class="loader-content">
            <div class="robot-loader">
                <div class="robot-head"></div>
                <div class="robot-body"></div>
            </div>
            <p>Initializing Robotics Blog...</p>
        </div>
    </div>

    <!-- Scroll to Top Button -->
    <button class="scroll-top" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </button>

    <!-- Header / Navbar -->
    <header class="header">
        <div class="container">
            <nav class="navbar">
                <a href="#" class="logo">
                    <i class="fas fa-robot"></i>
                    <span>RoboTech</span>
                </a>
                
                <div class="nav-menu">
                    <ul class="nav-list">
                        <li><a href="#" class="nav-link active">Home</a></li>
                        <li><a href="#blogs" class="nav-link">Blogs</a></li>
                        <li><a href="#categories" class="nav-link">Categories</a></li>
                        <li><a href="#news" class="nav-link">Robotics News</a></li>
                        <li><a href="#ai-robots" class="nav-link">AI Robots</a></li>
                        <li><a href="#tutorials" class="nav-link">Tutorials</a></li>
                        <li><a href="#about" class="nav-link">About Us</a></li>
                        <li><a href="#contact" class="nav-link">Contact</a></li>
                    </ul>
                    <div class="nav-actions">
                        <button class="search-btn" aria-label="Search">
                            <i class="fas fa-search"></i>
                        </button>
                        <button class="theme-toggle" aria-label="Toggle theme">
                            <i class="fas fa-moon"></i>
                        </button>
                        <button class="menu-toggle" aria-label="Toggle menu">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>
            </nav>
        </div>
        
        <!-- Search Overlay -->
        <div class="search-overlay">
            <div class="search-container">
                <button class="close-search" aria-label="Close search">
                    <i class="fas fa-times"></i>
                </button>
                <form class="search-form">
                    <input type="text" placeholder="Search for robotics topics, articles, tutorials..." class="search-input">
                    <button type="submit" class="search-submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Exploring the Future of <span class="highlight">Robotics & AI</span></h1>
                <p class="hero-subtitle">Discover cutting-edge innovations, breakthrough technologies, and the latest advancements in robotics, automation, and artificial intelligence.</p>
                <div class="hero-buttons">
                    <a href="#blogs" class="btn btn-primary">Read Latest Blogs</a>
                    <a href="#categories" class="btn btn-secondary">Explore Robots</a>
                </div>
            </div>
        </div>
        <div class="hero-background">
            <div class="grid-overlay"></div>
        </div>
    </section>

    <!-- Featured Blogs Section -->
    <section id="blogs" class="section featured-blogs">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Featured <span class="highlight">Blogs</span></h2>
                <p class="section-subtitle">Latest insights from the world of robotics and AI</p>
            </div>
            
            <div class="blogs-grid">
                <!-- Blog Card 1 -->
                <article class="blog-card">
                    <div class="blog-image">
                        <div class="blog-category ai">AI</div>
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-title">How AI is Revolutionizing Industrial Automation</h3>
                        <p class="blog-excerpt">Discover how artificial intelligence is transforming manufacturing processes, increasing efficiency, and enabling predictive maintenance in industrial settings.</p>
                        <div class="blog-meta">
                            <span class="blog-author"><i class="fas fa-user"></i> Dr. Alex Johnson</span>
                            <span class="blog-date"><i class="fas fa-calendar"></i> May 15, 2023</span>
                        </div>
                        <a href="#" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
                
                <!-- Blog Card 2 -->
                <article class="blog-card">
                    <div class="blog-image">
                        <div class="blog-category robots">Robots</div>
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-title">The Rise of Humanoid Robots in Everyday Life</h3>
                        <p class="blog-excerpt">From hospitality to healthcare, humanoid robots are becoming an integral part of our daily lives. Explore the latest models and their capabilities.</p>
                        <div class="blog-meta">
                            <span class="blog-author"><i class="fas fa-user"></i> Sarah Chen</span>
                            <span class="blog-date"><i class="fas fa-calendar"></i> June 2, 2023</span>
                        </div>
                        <a href="#" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
                
                <!-- Blog Card 3 -->
                <article class="blog-card">
                    <div class="blog-image">
                        <div class="blog-category automation">Automation</div>
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-title">Automated Warehouses: The Future of Logistics</h3>
                        <p class="blog-excerpt">How robotics and automation are reshaping the logistics industry with smart warehouses, autonomous vehicles, and AI-driven inventory management.</p>
                        <div class="blog-meta">
                            <span class="blog-author"><i class="fas fa-user"></i> Michael Torres</span>
                            <span class="blog-date"><i class="fas fa-calendar"></i> April 28, 2023</span>
                        </div>
                        <a href="#" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
                
                <!-- Blog Card 4 -->
                <article class="blog-card">
                    <div class="blog-image">
                        <div class="blog-category future-tech">Future Tech</div>
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-title">Neural Interfaces: Controlling Robots with Your Mind</h3>
                        <p class="blog-excerpt">Breakthroughs in brain-computer interfaces are enabling direct control of robotic systems through neural signals. Explore the possibilities and ethical implications.</p>
                        <div class="blog-meta">
                            <span class="blog-author"><i class="fas fa-user"></i> Dr. Elena Rodriguez</span>
                            <span class="blog-date"><i class="fas fa-calendar"></i> May 8, 2023</span>
                        </div>
                        <a href="#" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
            </div>
            
            <div class="section-footer">
                <a href="#" class="btn btn-outline">View All Blogs</a>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section id="categories" class="section categories">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Explore <span class="highlight">Categories</span></h2>
                <p class="section-subtitle">Dive into specialized areas of robotics</p>
            </div>
            
            <div class="categories-grid">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-user-astronaut"></i>
                    </div>
                    <h3 class="category-title">Humanoid Robots</h3>
                    <p class="category-description">Robots designed to resemble and mimic human form and behavior</p>
                    <a href="#" class="category-link">12 Articles</a>
                </div>
                
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-brain"></i>
                    </div>
                    <h3 class="category-title">AI Robots</h3>
                    <p class="category-description">Intelligent machines powered by artificial intelligence algorithms</p>
                    <a href="#" class="category-link">24 Articles</a>
                </div>
                
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-industry"></i>
                    </div>
                    <h3 class="category-title">Industrial Robots</h3>
                    <p class="category-description">Automated systems for manufacturing, assembly, and production</p>
                    <a href="#" class="category-link">18 Articles</a>
                </div>
                
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <h3 class="category-title">Medical Robots</h3>
                    <p class="category-description">Robotic systems for surgery, rehabilitation, and patient care</p>
                    <a href="#" class="category-link">15 Articles</a>
                </div>
                
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="category-title">Military Robots</h3>
                    <p class="category-description">Autonomous systems for defense, surveillance, and security</p>
                    <a href="#" class="category-link">9 Articles</a>
                </div>
                
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h3 class="category-title">Space Robots</h3>
                    <p class="category-description">Robotic explorers and assistants for space missions</p>
                    <a href="#" class="category-link">7 Articles</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Articles Section -->
    <section id="news" class="section latest-articles">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Latest <span class="highlight">Articles</span></h2>
                <p class="section-subtitle">Stay updated with the most recent robotics developments</p>
            </div>
            
            <div class="articles-list">
                <article class="article-item">
                    <div class="article-date">
                        <span class="date-day">10</span>
                        <span class="date-month">Jun</span>
                    </div>
                    <div class="article-content">
                        <div class="article-meta">
                            <span class="article-category ai">AI</span>
                            <span class="article-author">By Robert Kim</span>
                        </div>
                        <h3 class="article-title">Autonomous Delivery Robots Hit City Streets</h3>
                        <p class="article-excerpt">Cities worldwide are testing autonomous delivery robots that navigate sidewalks to bring packages, food, and supplies directly to consumers' doors.</p>
                        <a href="#" class="read-more">Read Full Article</a>
                    </div>
                </article>
                
                <article class="article-item">
                    <div class="article-date">
                        <span class="date-day">05</span>
                        <span class="date-month">Jun</span>
                    </div>
                    <div class="article-content">
                        <div class="article-meta">
                            <span class="article-category future-tech">Future Tech</span>
                            <span class="article-author">By Lisa Wang</span>
                        </div>
                        <h3 class="article-title">Swarm Robotics: Nature-Inspired Collective Intelligence</h3>
                        <p class="article-excerpt">Inspired by insect colonies, swarm robotics uses simple robots working together to accomplish complex tasks, from environmental monitoring to disaster response.</p>
                        <a href="#" class="read-more">Read Full Article</a>
                    </div>
                </article>
                
                <article class="article-item">
                    <div class="article-date">
                        <span class="date-day">28</span>
                        <span class="date-month">May</span>
                    </div>
                    <div class="article-content">
                        <div class="article-meta">
                            <span class="article-category robots">Robots</span>
                            <span class="article-author">By David Park</span>
                        </div>
                        <h3 class="article-title">Robotic Exoskeletons Aid in Rehabilitation</h3>
                        <p class="article-excerpt">New advancements in robotic exoskeletons are helping patients recover mobility after spinal cord injuries and strokes with personalized therapy programs.</p>
                        <a href="#" class="read-more">Read Full Article</a>
                    </div>
                </article>
                
                <article class="article-item">
                    <div class="article-date">
                        <span class="date-day">20</span>
                        <span class="date-month">May</span>
                    </div>
                    <div class="article-content">
                        <div class="article-meta">
                            <span class="article-category automation">Automation</span>
                            <span class="article-author">By James Wilson</span>
                        </div>
                        <h3 class="article-title">The Ethics of Autonomous Weapons Systems</h3>
                        <p class="article-excerpt">As military robots become more autonomous, ethical questions arise about decision-making in combat situations and the need for international regulations.</p>
                        <a href="#" class="read-more">Read Full Article</a>
                    </div>
                </article>
            </div>
            
            <div class="load-more-container">
                <button class="btn btn-outline" id="load-more">Load More Articles</button>
            </div>
        </div>
    </section>

    <!-- About Robotics Section -->
    <section id="about" class="section about-robotics">
        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <h2 class="section-title">About <span class="highlight">Robotics</span> & AI</h2>
                    <p>Robotics is an interdisciplinary field that combines computer science, engineering, and technology to design, construct, and operate robots. These intelligent machines can perform tasks autonomously or semi-autonomously, often in environments that are hazardous or inaccessible to humans.</p>
                    <p>Today, robotics is converging with artificial intelligence to create systems that can learn, adapt, and make decisions. From manufacturing floors to surgical theaters, from deep space exploration to household assistance, robots are transforming industries and reshaping our future.</p>
                    <p>At RoboTech Blog, we're passionate about documenting this revolution, providing insights into the latest technologies, ethical considerations, and practical applications of robotics and AI.</p>
                    
                    <div class="stats-container">
                        <div class="stat">
                            <div class="stat-number" data-count="245">0</div>
                            <div class="stat-label">Articles Published</div>
                        </div>
                        <div class="stat">
                            <div class="stat-number" data-count="5210">0</div>
                            <div class="stat-label">Active Readers</div>
                        </div>
                        <div class="stat">
                            <div class="stat-number" data-count="18">0</div>
                            <div class="stat-label">Robotics Topics Covered</div>
                        </div>
                    </div>
                </div>
                
                <div class="about-image">
                    <div class="image-placeholder">
                        <i class="fas fa-robot"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="section newsletter">
        <div class="container">
            <div class="newsletter-content">
                <h2 class="section-title">Stay Updated with <span class="highlight">Robotics Innovations</span></h2>
                <p class="section-subtitle">Subscribe to our newsletter and never miss the latest developments in robotics and AI.</p>
                
                <form class="newsletter-form">
                    <div class="form-group">
                        <input type="email" placeholder="Enter your email address" class="form-input" required>
                        <button type="submit" class="btn btn-primary">Subscribe</button>
                    </div>
                    <p class="form-note">We respect your privacy. Unsubscribe at any time.</p>
                </form>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section contact">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Get In <span class="highlight">Touch</span></h2>
                <p class="section-subtitle">Have questions or want to collaborate? Reach out to us!</p>
            </div>
            
            <div class="contact-content">
                <div class="contact-form-container">
                    <form class="contact-form">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" id="name" placeholder="Enter your name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" placeholder="Enter your email" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="message">Your Message</label>
                            <textarea id="message" placeholder="Tell us about your robotics project, question, or collaboration idea..." rows="5" required></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
                
                <div class="contact-info">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="info-content">
                            <h3>Our Location</h3>
                            <p>Tech Innovation Center, Silicon Valley, CA</p>
                        </div>
                    </div>
                    
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="info-content">
                            <h3>Email Us</h3>
                            <p>contact@robotech.blog</p>
                        </div>
                    </div>
                    
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="info-content">
                            <h3>Call Us</h3>
                            <p>+1 (555) 123-ROBO</p>
                        </div>
                    </div>
                    
                    <div class="map-placeholder">
                        <div class="map-content">
                            <i class="fas fa-globe-americas"></i>
                            <p>Interactive Map Location</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <div class="footer-logo">
                        <i class="fas fa-robot"></i>
                        <span>RoboTech</span>
                    </div>
                    <p class="footer-about">RoboTech is a premier blogging platform dedicated to exploring the latest developments in robotics, artificial intelligence, and automation technologies.</p>
                    <div class="social-links">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <div class="footer-column">
                    <h3 class="footer-title">Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#blogs">Blogs</a></li>
                        <li><a href="#categories">Categories</a></li>
                        <li><a href="#news">Robotics News</a></li>
                        <li><a href="#tutorials">Tutorials</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3 class="footer-title">Categories</h3>
                    <ul class="footer-links">
                        <li><a href="#">Humanoid Robots</a></li>
                        <li><a href="#">AI Robots</a></li>
                        <li><a href="#">Industrial Robots</a></li>
                        <li><a href="#">Medical Robots</a></li>
                        <li><a href="#">Military Robots</a></li>
                        <li><a href="#">Space Robots</a></li>
                        <li><a href="#">Robotics Research</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3 class="footer-title">Recent Posts</h3>
                    <ul class="footer-posts">
                        <li>
                            <a href="#">How AI is Revolutionizing Industrial Automation</a>
                            <span>May 15, 2023</span>
                        </li>
                        <li>
                            <a href="#">The Rise of Humanoid Robots in Everyday Life</a>
                            <span>June 2, 2023</span>
                        </li>
                        <li>
                            <a href="#">Autonomous Delivery Robots Hit City Streets</a>
                            <span>June 10, 2023</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p class="copyright">&copy; 2023 RoboTech Blog. All rights reserved. | Designed with <i class="fas fa-heart"></i> for the robotics community</p>
            </div>
        </div>
    </footer>

    <script src="blog.js"></script>
</body>
</html>