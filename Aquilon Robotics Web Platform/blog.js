// DOM Elements
const loader = document.querySelector('.loader');
const scrollTopBtn = document.querySelector('.scroll-top');
const header = document.querySelector('.header');
const themeToggle = document.querySelector('.theme-toggle');
const menuToggle = document.querySelector('.menu-toggle');
const navList = document.querySelector('.nav-list');
const searchBtn = document.querySelector('.search-btn');
const closeSearch = document.querySelector('.close-search');
const searchOverlay = document.querySelector('.search-overlay');
const loadMoreBtn = document.getElementById('load-more');
const contactForm = document.querySelector('.contact-form');
const newsletterForm = document.querySelector('.newsletter-form');
const searchForm = document.querySelector('.search-form');

// Page Loading
window.addEventListener('load', () => {
    // Hide loader after page loads
    setTimeout(() => {
        loader.style.opacity = '0';
        loader.style.visibility = 'hidden';
    }, 800);
    
    // Initialize animated counters
    initCounters();
    
    // Set current year in footer
    document.querySelector('.copyright').innerHTML = `&copy; ${new Date().getFullYear()} RoboTech Blog. All rights reserved. | Designed with <i class="fas fa-heart"></i> for the robotics community`;
});

// Scroll to Top Button
window.addEventListener('scroll', () => {
    // Show/hide scroll to top button
    if (window.pageYOffset > 300) {
        scrollTopBtn.classList.add('show');
    } else {
        scrollTopBtn.classList.remove('show');
    }
    
    // Change header background on scroll
    if (window.pageYOffset > 100) {
        header.style.backgroundColor = document.body.classList.contains('dark-theme') 
            ? 'rgba(18, 18, 18, 0.98)' 
            : 'rgba(255, 255, 255, 0.98)';
    } else {
        header.style.backgroundColor = document.body.classList.contains('dark-theme') 
            ? 'rgba(18, 18, 18, 0.95)' 
            : 'rgba(255, 255, 255, 0.95)';
    }
});

scrollTopBtn.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});

// Theme Toggle
themeToggle.addEventListener('click', () => {
    document.body.classList.toggle('dark-theme');
    
    // Update theme icon
    const icon = themeToggle.querySelector('i');
    if (document.body.classList.contains('dark-theme')) {
        icon.classList.remove('fa-moon');
        icon.classList.add('fa-sun');
    } else {
        icon.classList.remove('fa-sun');
        icon.classList.add('fa-moon');
    }
    
    // Save theme preference to localStorage
    localStorage.setItem('theme', document.body.classList.contains('dark-theme') ? 'dark' : 'light');
});

// Load saved theme preference
const savedTheme = localStorage.getItem('theme');
if (savedTheme === 'dark') {
    document.body.classList.add('dark-theme');
    const icon = themeToggle.querySelector('i');
    icon.classList.remove('fa-moon');
    icon.classList.add('fa-sun');
}

// Mobile Menu Toggle
menuToggle.addEventListener('click', () => {
    navList.classList.toggle('active');
    
    // Update menu icon
    const icon = menuToggle.querySelector('i');
    if (navList.classList.contains('active')) {
        icon.classList.remove('fa-bars');
        icon.classList.add('fa-times');
    } else {
        icon.classList.remove('fa-times');
        icon.classList.add('fa-bars');
    }
});

// Close mobile menu when clicking on a link
document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', () => {
        navList.classList.remove('active');
        menuToggle.querySelector('i').classList.remove('fa-times');
        menuToggle.querySelector('i').classList.add('fa-bars');
    });
});

// Search Functionality
searchBtn.addEventListener('click', () => {
    searchOverlay.classList.add('active');
});

closeSearch.addEventListener('click', () => {
    searchOverlay.classList.remove('active');
});

// Close search overlay when clicking outside
searchOverlay.addEventListener('click', (e) => {
    if (e.target === searchOverlay) {
        searchOverlay.classList.remove('active');
    }
});

// Form Submissions
if (contactForm) {
    contactForm.addEventListener('submit', (e) => {
        e.preventDefault();
        
        // Get form values
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const message = document.getElementById('message').value;
        
        // In a real application, you would send this data to a server
        // For demo purposes, we'll just show an alert
        alert(`Thank you for your message, ${name}! We'll get back to you at ${email} as soon as possible.`);
        
        // Reset form
        contactForm.reset();
    });
}

if (newsletterForm) {
    newsletterForm.addEventListener('submit', (e) => {
        e.preventDefault();
        
        const email = newsletterForm.querySelector('.form-input').value;
        
        // In a real application, you would send this to a newsletter service
        alert(`Thank you for subscribing with ${email}! You'll now receive the latest robotics updates.`);
        
        // Reset form
        newsletterForm.reset();
    });
}

if (searchForm) {
    searchForm.addEventListener('submit', (e) => {
        e.preventDefault();
        
        const query = searchForm.querySelector('.search-input').value;
        
        if (query.trim()) {
            alert(`Searching for: "${query}"\n\nIn a real application, this would show search results.`);
            searchOverlay.classList.remove('active');
            searchForm.reset();
        }
    });
}

// Load More Articles
if (loadMoreBtn) {
    loadMoreBtn.addEventListener('click', () => {
        // Create a loading effect
        loadMoreBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';
        loadMoreBtn.disabled = true;
        
        // Simulate loading more articles
        setTimeout(() => {
            // Create new article elements
            const articlesList = document.querySelector('.articles-list');
            
            const newArticle = document.createElement('article');
            newArticle.className = 'article-item';
            newArticle.innerHTML = `
                <div class="article-date">
                    <span class="date-day">15</span>
                    <span class="date-month">May</span>
                </div>
                <div class="article-content">
                    <div class="article-meta">
                        <span class="article-category future-tech">Future Tech</span>
                        <span class="article-author">By Maria Gonzalez</span>
                    </div>
                    <h3 class="article-title">Soft Robotics: The Future of Human-Robot Interaction</h3>
                    <p class="article-excerpt">Soft robotics uses flexible materials to create robots that can safely interact with humans and delicate objects, opening new possibilities in healthcare and assistance.</p>
                    <a href="#" class="read-more">Read Full Article</a>
                </div>
            `;
            
            // Add new article to the list
            articlesList.appendChild(newArticle);
            
            // Reset button
            loadMoreBtn.innerHTML = 'Load More Articles';
            loadMoreBtn.disabled = false;
            
            // Show a message if we've loaded enough articles
            const articleCount = articlesList.querySelectorAll('.article-item').length;
            if (articleCount >= 6) {
                loadMoreBtn.style.display = 'none';
                const loadMoreContainer = document.querySelector('.load-more-container');
                loadMoreContainer.innerHTML = '<p>All articles loaded. Check back soon for more robotics content!</p>';
            }
        }, 1500);
    });
}

// Animated Counters
function initCounters() {
    const counters = document.querySelectorAll('.stat-number');
    
    counters.forEach(counter => {
        const target = +counter.getAttribute('data-count');
        const increment = target / 200;
        let current = 0;
        
        const updateCounter = () => {
            if (current < target) {
                current += increment;
                counter.textContent = Math.ceil(current);
                setTimeout(updateCounter, 10);
            } else {
                counter.textContent = target;
            }
        };
        
        // Start counter when element is in viewport
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    updateCounter();
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        observer.observe(counter);
    });
}

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        const href = this.getAttribute('href');
        
        // Skip if it's just "#"
        if (href === '#') return;
        
        e.preventDefault();
        
        const targetElement = document.querySelector(href);
        if (targetElement) {
            window.scrollTo({
                top: targetElement.offsetTop - 80,
                behavior: 'smooth'
            });
        }
    });
});

// Add hover effect to category cards dynamically
document.querySelectorAll('.category-card').forEach(card => {
    card.addEventListener('mouseenter', function() {
        const icon = this.querySelector('.category-icon');
        icon.style.transform = 'scale(1.1) rotate(5deg)';
    });
    
    card.addEventListener('mouseleave', function() {
        const icon = this.querySelector('.category-icon');
        icon.style.transform = 'scale(1) rotate(0deg)';
    });
});

// Add animation to blog cards on scroll
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Observe blog cards for animation
document.querySelectorAll('.blog-card, .category-card').forEach(card => {
    card.style.opacity = '0';
    card.style.transform = 'translateY(20px)';
    card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
    observer.observe(card);
});