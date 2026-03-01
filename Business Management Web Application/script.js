// Updated script.js - Add redirect to home page after successful submission
// Replace the entire <DOCUMENT filename="script.js"> content with this

// DOM Elements
const navbar = document.querySelector('.navbar');
const hamburger = document.querySelector('.hamburger');
const navMenu = document.querySelector('.nav-menu');
const navLinks = document.querySelectorAll('.nav-link');
const skillBars = document.querySelectorAll('.skill-progress');
const sections = document.querySelectorAll('section');
const processSteps = document.querySelectorAll('.process-step');
const awardItems = document.querySelectorAll('.award-item');
const portfolioItems = document.querySelectorAll('.portfolio-item');
const contactForm = document.getElementById('contactForm');

// Navbar scroll effect
window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
    
    // Update active nav link
    let current = '';
    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        if (scrollY >= sectionTop - 200) {
            current = section.getAttribute('id');
        }
    });
    
    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === `#${current}`) {
            link.classList.add('active');
        }
    });
});

// Mobile menu toggle
hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    navMenu.classList.toggle('active');
});

// Close mobile menu when clicking a link
navLinks.forEach(link => {
    link.addEventListener('click', () => {
        hamburger.classList.remove('active');
        navMenu.classList.remove('active');
    });
});

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const targetId = this.getAttribute('href');
        if (targetId === '#') return;
        
        const targetElement = document.querySelector(targetId);
        if (targetElement) {
            window.scrollTo({
                top: targetElement.offsetTop - 80,
                behavior: 'smooth'
            });
        }
    });
});

// Animate skill bars on scroll
const animateSkillBars = () => {
    skillBars.forEach(bar => {
        const rect = bar.getBoundingClientRect();
        const isInView = rect.top < window.innerHeight - 100;
        
        if (isInView && !bar.classList.contains('animated')) {
            const width = bar.getAttribute('data-width');
            bar.style.width = `${width}%`;
            bar.classList.add('animated');
        }
    });
};

// Animate elements on scroll
const animateOnScroll = () => {
    const elements = document.querySelectorAll('.process-step, .award-item, .portfolio-item, .feature-box, .service-card');
    
    elements.forEach(element => {
        const rect = element.getBoundingClientRect();
        const isInView = rect.top < window.innerHeight - 100;
        
        if (isInView) {
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
        }
    });
};

// Initialize animations
window.addEventListener('load', () => {
    // Set initial states for animated elements
    document.querySelectorAll('.process-step, .award-item, .portfolio-item, .feature-box, .service-card').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    });
    
    // Animate skill bars
    skillBars.forEach(bar => {
        bar.style.width = '0%';
    });
});

// Scroll event listeners
window.addEventListener('scroll', () => {
    animateSkillBars();
    animateOnScroll();
});

// Handle contact form submission with better error handling
if (contactForm) {
    contactForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        const formData = new FormData(contactForm);
        const submitBtn = contactForm.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        
        // Disable button and show loading
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
        
        try {
            console.log('Sending form data...');
            
            // Try the simple endpoint first
            const response = await fetch('api/simple_contact.php', {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json',
                }
            });
            
            console.log('Response status:', response.status);
            
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            
            const result = await response.json();
            console.log('Response data:', result);
            
            if (result.success) {
                // Success
                submitBtn.innerHTML = '<i class="fas fa-check"></i> Message Sent!';
                submitBtn.style.background = 'linear-gradient(135deg, #4CAF50, #45a049)';
                contactForm.reset();
                
                // Show success message
                showNotification(result.message, 'success');
                
                // Redirect to home page after 2 seconds
                setTimeout(() => {
                    window.location.href = '#home';
                }, 2000);
                
                // Reset button (though redirect will happen)
                setTimeout(() => {
                    submitBtn.textContent = originalText;
                    submitBtn.style.background = 'linear-gradient(135deg, #10b981, #059669)';
                    submitBtn.disabled = false;
                }, 3000);
            } else {
                // API returned error
                showNotification(result.message, 'error');
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }
        } catch (error) {
            console.error('Form submission error:', error);
            
            // Show detailed error for debugging
            showNotification(`Error: ${error.message}. Please check console for details.`, 'error');
            
            // Fallback: Try with JSON data
            try {
                console.log('Trying alternative submission method...');
                
                const formDataObj = {};
                formData.forEach((value, key) => {
                    formDataObj[key] = value;
                });
                
                const jsonResponse = await fetch('api/simple_contact.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(formDataObj)
                });
                
                const jsonResult = await jsonResponse.json();
                console.log('JSON response:', jsonResult);
                
            } catch (jsonError) {
                console.error('JSON submission also failed:', jsonError);
            }
            
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
        }
    });
}

// Notification function
function showNotification(message, type = 'info') {
    // Remove existing notification
    const existingNotification = document.querySelector('.notification');
    if (existingNotification) {
        existingNotification.remove();
    }
    
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
            <span>${message}</span>
            <button class="notification-close">&times;</button>
        </div>
    `;
    
    // Add to body
    document.body.appendChild(notification);
    
    // Show notification
    setTimeout(() => {
        notification.classList.add('show');
    }, 10);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => {
            notification.remove();
        }, 300);
    }, 5000);
    
    // Close button
    notification.querySelector('.notification-close').addEventListener('click', () => {
        notification.classList.remove('show');
        setTimeout(() => {
            notification.remove();
        }, 300);
    });
}

// Add CSS for notifications
const notificationCSS = `
.notification {
    position: fixed;
    top: 20px;
    right: 20px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.2);
    padding: 15px 20px;
    min-width: 300px;
    max-width: 400px;
    transform: translateX(400px);
    transition: transform 0.3s ease;
    z-index: 9999;
}

.notification.show {
    transform: translateX(0);
}

.notification-content {
    display: flex;
    align-items: center;
    gap: 15px;
}

.notification i {
    font-size: 1.5rem;
}

.notification-success i {
    color: #10b981;
}

.notification-error i {
    color: #ef4444;
}

.notification-info i {
    color: #3b82f6;
}

.notification-close {
    margin-left: auto;
    background: none;
    border: none;
    font-size: 1.5rem;
    cursor: pointer;
    color: #6b7280;
    padding: 0;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.notification-close:hover {
    color: #374151;
}
`;

// Add notification styles to the page
const styleSheet = document.createElement('style');
styleSheet.textContent = notificationCSS;
document.head.appendChild(styleSheet);
         
// Handle newsletter subscription
const newsLetterForm = document.querySelector('.newsletter');
if (newsLetterForm) {
    const newsletterBtn = newsLetterForm.querySelector('button');
    const newsletterInput = newsLetterForm.querySelector('input');
    
    newsletterBtn.addEventListener('click', async (e) => {
        e.preventDefault();
        
        if (!newsletterInput.value || !newsletterInput.value.includes('@')) {
            newsletterInput.style.border = '2px solid #ff4444';
            setTimeout(() => {
                newsletterInput.style.border = 'none';
            }, 2000);
            return;
        }
        
        const originalText = newsletterBtn.innerHTML;
        newsletterBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
        
        try {
            const formData = new FormData();
            formData.append('email', newsletterInput.value);
            
            const response = await fetch('api/newsletter.php', {
                method: 'POST',
                body: formData
            });
            
            const result = await response.json();
            
            if (result.success) {
                newsletterBtn.innerHTML = '<i class="fas fa-check"></i>';
                newsletterBtn.style.background = '#4CAF50';
                newsletterInput.value = '';
                
                // Show success notification
                showNotification(result.message, 'success');
                
                // Redirect to home page after 2 seconds
                setTimeout(() => {
                    window.location.href = '#home';
                }, 2000);
                
                setTimeout(() => {
                    newsletterBtn.innerHTML = originalText;
                    newsletterBtn.style.background = 'var(--primary)';
                }, 3000);
            } else {
                showNotification(result.message, 'error');
                newsletterBtn.innerHTML = originalText;
            }
        } catch (error) {
            showNotification('Subscription failed. Please try again.', 'error');
            newsletterBtn.innerHTML = originalText;
        }
    });
}

// Hover effects for interactive elements
document.querySelectorAll('.service-card, .feature-box, .award-item, .portfolio-item').forEach(card => {
    card.addEventListener('mouseenter', () => {
        card.style.zIndex = '10';
    });
    
    card.addEventListener('mouseleave', () => {
        card.style.zIndex = '1';
    });
});

// Form input focus effects
document.querySelectorAll('.form-group input, .form-group textarea').forEach(input => {
    input.addEventListener('focus', () => {
        input.parentElement.classList.add('focused');
    });
    
    input.addEventListener('blur', () => {
        if (!input.value) {
            input.parentElement.classList.remove('focused');
        }
    });
});

// Initialize animations on page load
window.addEventListener('load', () => {
    // Trigger scroll once to check initial positions
    setTimeout(() => {
        window.dispatchEvent(new Event('scroll'));
    }, 500);
});