// Main JavaScript for Skiller Website
document.addEventListener('DOMContentLoaded', function() {
    // Initialize theme toggle
    initThemeToggle();
    
    // Initialize mobile menu
    initMobileMenu();
    
    // Load courses dynamically
    loadCourses();
    
    // Load testimonials dynamically
    loadTestimonials();
    
    // Initialize testimonial slider
    initTestimonialSlider();
    
    // Initialize contact form
    initContactForm();
});

// Theme Toggle Functionality
function initThemeToggle() {
    const themeToggle = document.getElementById('theme-toggle');
    const body = document.body;
    
    // Check for saved theme or prefer-color-scheme
    const savedTheme = localStorage.getItem('skiller-theme');
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    
    // Set initial theme
    if (savedTheme === 'light' || (!savedTheme && !prefersDark)) {
        body.classList.remove('dark-theme');
        body.classList.add('light-theme');
    }
    
    // Toggle theme on button click
    themeToggle.addEventListener('click', () => {
        if (body.classList.contains('dark-theme')) {
            body.classList.remove('dark-theme');
            body.classList.add('light-theme');
            localStorage.setItem('skiller-theme', 'light');
        } else {
            body.classList.remove('light-theme');
            body.classList.add('dark-theme');
            localStorage.setItem('skiller-theme', 'dark');
        }
    });
}

// Mobile Menu Toggle
function initMobileMenu() {
    const mobileToggle = document.querySelector('.mobile-toggle');
    const navMenu = document.querySelector('.nav-menu');
    
    if (!mobileToggle || !navMenu) return;
    
    mobileToggle.addEventListener('click', () => {
        mobileToggle.classList.toggle('active');
        navMenu.classList.toggle('active');
    });
    
    // Close menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!navMenu.contains(e.target) && !mobileToggle.contains(e.target)) {
            mobileToggle.classList.remove('active');
            navMenu.classList.remove('active');
        }
    });
}

// Load Courses Dynamically
function loadCourses() {
    const courses = [
        {
            id: 1,
            name: 'Python',
            icon: 'fab fa-python',
            color: '#3776AB',
            description: 'Learn Python from basics to advanced, including data science, machine learning, and web development with Django/Flask.'
        },
        {
            id: 2,
            name: 'JavaScript',
            icon: 'fab fa-js',
            color: '#F7DF1E',
            description: 'Master JavaScript ES6+, DOM manipulation, async programming, and modern frameworks like React and Vue.'
        },
        {
            id: 3,
            name: 'HTML & CSS',
            icon: 'fab fa-html5',
            color: '#E34F26',
            description: 'Build beautiful, responsive websites with modern HTML5, CSS3, Flexbox, Grid, and animations.'
        },
        {
            id: 4,
            name: 'React',
            icon: 'fab fa-react',
            color: '#61DAFB',
            description: 'Learn React hooks, context API, state management, and build modern web applications.'
        },
        {
            id: 5,
            name: 'Java',
            icon: 'fab fa-java',
            color: '#007396',
            description: 'Master Java programming, object-oriented design, Spring framework, and backend development.'
        },
        {
            id: 6,
            name: 'PHP',
            icon: 'fab fa-php',
            color: '#777BB4',
            description: 'Build dynamic websites and web applications with PHP, MySQL, Laravel, and WordPress.'
        },
        {
            id: 7,
            name: 'Node.js',
            icon: 'fab fa-node-js',
            color: '#339933',
            description: 'Learn server-side JavaScript with Node.js, Express, REST APIs, and database integration.'
        },
        {
            id: 8,
            name: 'SQL & Databases',
            icon: 'fas fa-database',
            color: '#4479A1',
            description: 'Master database design, SQL queries, optimization, and work with MySQL, PostgreSQL, and MongoDB.'
        }
    ];
    
    const coursesGrid = document.querySelector('.courses-grid');
    if (!coursesGrid) return;
    
    coursesGrid.innerHTML = '';
    
    courses.forEach(course => {
        const courseCard = document.createElement('div');
        courseCard.className = 'course-card';
        courseCard.setAttribute('data-aos', 'fade-up');
        courseCard.setAttribute('data-aos-delay', (course.id * 100).toString());
        
        courseCard.innerHTML = `
            <div class="course-icon" style="background: ${course.color}">
                <i class="${course.icon}"></i>
            </div>
            <h3 class="course-title">${course.name}</h3>
            <p class="course-desc">${course.description}</p>
            <button class="course-btn">Start Learning</button>
        `;
        
        coursesGrid.appendChild(courseCard);
    });
}

// Load Testimonials Dynamically
function loadTestimonials() {
    const testimonials = [
        {
            id: 1,
            text: "Skiller completely transformed my career. The cinematic lessons made complex programming concepts easy to understand. I went from beginner to landing a junior developer role in just 6 months!",
            author: "Alex Johnson",
            role: "Frontend Developer",
            avatar: "AJ"
        },
        {
            id: 2,
            text: "As a visual learner, the high-quality video lessons were exactly what I needed. The project-based approach helped me build a portfolio that impressed employers. Highly recommended!",
            author: "Maria Garcia",
            role: "Full Stack Developer",
            avatar: "MG"
        },
        {
            id: 3,
            text: "The structured roadmaps kept me on track and motivated. I appreciated how each course built upon the previous one. The community support was invaluable when I got stuck.",
            author: "David Chen",
            role: "Python Developer",
            avatar: "DC"
        },
        {
            id: 4,
            text: "I tried several online platforms before finding Skiller. The production quality is outstanding, and the instructors are industry experts who actually know how to teach.",
            author: "Sarah Williams",
            role: "React Developer",
            avatar: "SW"
        }
    ];
    
    const sliderTrack = document.querySelector('.slider-track');
    const sliderDots = document.querySelector('.slider-dots');
    
    if (!sliderTrack || !sliderDots) return;
    
    // Clear existing content
    sliderTrack.innerHTML = '';
    sliderDots.innerHTML = '';
    
    // Create testimonial slides
    testimonials.forEach((testimonial, index) => {
        // Create slide
        const slide = document.createElement('div');
        slide.className = 'testimonial-card';
        slide.setAttribute('data-index', index);
        
        slide.innerHTML = `
            <p class="testimonial-text">${testimonial.text}</p>
            <div class="testimonial-author">
                <div class="author-avatar">${testimonial.avatar}</div>
                <div class="author-info">
                    <h4>${testimonial.author}</h4>
                    <p>${testimonial.role}</p>
                </div>
            </div>
        `;
        
        sliderTrack.appendChild(slide);
        
        // Create dot
        const dot = document.createElement('button');
        dot.className = `slider-dot ${index === 0 ? 'active' : ''}`;
        dot.setAttribute('data-index', index);
        dot.setAttribute('aria-label', `Go to testimonial ${index + 1}`);
        
        sliderDots.appendChild(dot);
    });
}

// Initialize Testimonial Slider
function initTestimonialSlider() {
    const sliderTrack = document.querySelector('.slider-track');
    const sliderDots = document.querySelectorAll('.slider-dot');
    const prevBtn = document.querySelector('.slider-prev');
    const nextBtn = document.querySelector('.slider-next');
    
    if (!sliderTrack || sliderDots.length === 0) return;
    
    let currentSlide = 0;
    const totalSlides = sliderDots.length;
    const slideWidth = 100; // Percentage
    
    // Update slider position
    function updateSlider() {
        sliderTrack.style.transform = `translateX(-${currentSlide * slideWidth}%)`;
        
        // Update active dot
        sliderDots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentSlide);
        });
    }
    
    // Next slide
    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateSlider();
    }
    
    // Previous slide
    function prevSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        updateSlider();
    }
    
    // Go to specific slide
    function goToSlide(index) {
        currentSlide = index;
        updateSlider();
    }
    
    // Event listeners for buttons
    if (nextBtn) {
        nextBtn.addEventListener('click', nextSlide);
    }
    
    if (prevBtn) {
        prevBtn.addEventListener('click', prevSlide);
    }
    
    // Event listeners for dots
    sliderDots.forEach((dot, index) => {
        dot.addEventListener('click', () => goToSlide(index));
    });
    
    // Auto-advance slides (optional)
    let slideInterval = setInterval(nextSlide, 5000);
    
    // Pause auto-advance on hover
    const sliderContainer = document.querySelector('.slider-container');
    if (sliderContainer) {
        sliderContainer.addEventListener('mouseenter', () => {
            clearInterval(slideInterval);
        });
        
        sliderContainer.addEventListener('mouseleave', () => {
            slideInterval = setInterval(nextSlide, 5000);
        });
    }
}

// Initialize Contact Form


// Initialize Contact Form
function initContactForm() {
    const form = document.getElementById('newsletter-form');
    
    if (!form) return;
    
    form.addEventListener('submit', async function(e) {
        e.preventDefault(); // Prevent default form submission
        
        console.log("Form submit triggered from main site");
        
        const submitBtn = form.querySelector('.submit-btn');
        const btnText = submitBtn.querySelector('.btn-text');
        const btnLoader = submitBtn.querySelector('.btn-loader');
        
        // Get form values
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const interest = document.getElementById('interest').value;
        
        console.log("Main site form data:", { name, email, interest });
        
        // Validation
        if (!name || !email || !interest) {
            alert('Please fill in all fields.');
            return;
        }
        
        // Email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert('Please enter a valid email address.');
            return;
        }
        
        // Show loading state
        btnText.style.opacity = '0';
        btnLoader.style.opacity = '1';
        
        // Create form data object
        const formData = {
            name: name,
            email: email,
            interest: interest
        };
        
        console.log("Sending data from main site:", formData);
        
        try {
            // Send data to backend using AJAX
            const response = await fetch('backend/subscribe.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData)
            });
            
            console.log("Response status:", response.status);
            console.log("Response URL:", response.url);
            
            const result = await response.json();
            console.log("Response data:", result);
            
            if (result.success) {
                // Reset form
                form.reset();
                
                // Show success message
                showSuccessMessage(result.message);
                
                // You can also show a modal or redirect
                // window.location.href = 'thank-you.html';
            } else {
                // Show error message
                let errorMessage = result.message;
                if (result.errors) {
                    const errorList = Object.values(result.errors).join('\n');
                    errorMessage += '\n\n' + errorList;
                }
                showErrorMessage(errorMessage);
            }
        } catch (error) {
            console.error('Network error:', error);
            showErrorMessage('Network error. Please check your connection and try again.');
            
            // If AJAX fails, try regular form submission as fallback
            console.log("AJAX failed, trying regular form submission...");
            form.submit();
        } finally {
            // Reset button state
            btnText.style.opacity = '1';
            btnLoader.style.opacity = '0';
        }
    });
}

// Show success message with better UX
function showSuccessMessage(message) {
    // Create a success modal
    const modal = document.createElement('div');
    modal.id = 'success-modal';
    modal.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(15, 23, 42, 0.95);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        opacity: 0;
        animation: fadeIn 0.3s forwards;
    `;
    
    modal.innerHTML = `
        <div style="
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            max-width: 500px;
            width: 90%;
            color: white;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        ">
            <div style="font-size: 4rem; margin-bottom: 20px;">🎉</div>
            <h2 style="margin-bottom: 20px;">Success!</h2>
            <p style="margin-bottom: 30px; font-size: 1.1rem;">${message}</p>
            <button onclick="closeSuccessModal()" style="
                background: white;
                color: #3b82f6;
                border: none;
                padding: 12px 30px;
                border-radius: 8px;
                font-weight: 600;
                cursor: pointer;
                font-size: 1rem;
                transition: transform 0.3s ease;
            " onmouseover="this.style.transform='translateY(-3px)'" 
               onmouseout="this.style.transform='translateY(0)'">
                Continue Learning
            </button>
        </div>
    `;
    
    document.body.appendChild(modal);
    
    // Add CSS animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    `;
    document.head.appendChild(style);
    
    // Auto-close after 5 seconds
    setTimeout(() => {
        if (document.getElementById('success-modal')) {
            closeSuccessModal();
        }
    }, 5000);
}

function closeSuccessModal() {
    const modal = document.getElementById('success-modal');
    if (modal) {
        modal.style.animation = 'fadeIn 0.3s reverse forwards';
        setTimeout(() => modal.remove(), 300);
    }
}

// Show error message
function showErrorMessage(message) {
    // Create error notification
    const notification = document.createElement('div');
    notification.id = 'error-notification';
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: #ef4444;
        color: white;
        padding: 15px 20px;
        border-radius: 10px;
        max-width: 400px;
        z-index: 9999;
        box-shadow: 0 5px 15px rgba(239, 68, 68, 0.3);
        animation: slideIn 0.3s ease;
    `;
    
    notification.innerHTML = `
        <div style="display: flex; align-items: center; gap: 10px;">
            <span style="font-size: 1.5rem;">⚠️</span>
            <div>
                <strong>Error:</strong>
                <p style="margin: 5px 0 0 0; font-size: 0.9rem;">${message}</p>
            </div>
            <button onclick="closeErrorNotification()" style="
                background: none;
                border: none;
                color: white;
                font-size: 1.2rem;
                cursor: pointer;
                margin-left: 10px;
            ">&times;</button>
        </div>
    `;
    
    document.body.appendChild(notification);
    
    // Add CSS animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
    `;
    document.head.appendChild(style);
    
    // Auto-close after 5 seconds
    setTimeout(() => {
        if (document.getElementById('error-notification')) {
            closeErrorNotification();
        }
    }, 5000);
}

function closeErrorNotification() {
    const notification = document.getElementById('error-notification');
    if (notification) {
        notification.style.animation = 'slideIn 0.3s reverse forwards';
        setTimeout(() => notification.remove(), 300);
    }
}



// Add this function to main.js

// Load Projects Dynamically
function loadProjects() {
    const projects = [
        {
            id: 1,
            title: "E-Commerce Website",
            category: "html",
            description: "A fully responsive e-commerce website built with HTML5, CSS3, and JavaScript. Features shopping cart, product filtering, and checkout process.",
            technologies: ["HTML5", "CSS3", "JavaScript", "LocalStorage"],
            image: "🛒",
            liveUrl: "https://example.com/ecommerce",
            codeUrl: "https://github.com/username/ecommerce"
        },
        {
            id: 2,
            title: "Weather Dashboard",
            category: "javascript",
            description: "Real-time weather application using OpenWeather API. Displays current weather, forecast, and location-based weather data.",
            technologies: ["JavaScript", "API", "Bootstrap", "Chart.js"],
            image: "🌤️",
            liveUrl: "https://example.com/weather",
            codeUrl: "https://github.com/username/weather-app"
        },
        {
            id: 3,
            title: "Task Manager App",
            category: "javascript",
            description: "Advanced task management application with drag & drop, categories, deadlines, and local storage persistence.",
            technologies: ["JavaScript", "Drag & Drop API", "LocalStorage", "CSS Grid"],
            image: "📋",
            liveUrl: "https://example.com/task-manager",
            codeUrl: "https://github.com/username/task-manager"
        },
        {
            id: 4,
            title: "Social Media Dashboard",
            category: "react",
            description: "React-based social media dashboard with real-time updates, user profiles, and interactive charts.",
            technologies: ["React", "Redux", "Chart.js", "Firebase"],
            image: "📊",
            liveUrl: "https://example.com/dashboard",
            codeUrl: "https://github.com/username/social-dashboard"
        },
        {
            id: 5,
            title: "Restaurant Website",
            category: "html",
            description: "Beautiful restaurant website with online reservation system, menu display, and customer reviews.",
            technologies: ["HTML5", "CSS3", "JavaScript", "Form Validation"],
            image: "🍽️",
            liveUrl: "https://example.com/restaurant",
            codeUrl: "https://github.com/username/restaurant"
        },
        {
            id: 6,
            title: "Portfolio Website",
            category: "html",
            description: "Professional portfolio website with dark/light mode, smooth animations, and project showcase.",
            technologies: ["HTML5", "CSS3", "JavaScript", "AOS Animations"],
            image: "🎨",
            liveUrl: "https://example.com/portfolio",
            codeUrl: "https://github.com/username/portfolio"
        },
        {
            id: 7,
            title: "Chat Application",
            category: "fullstack",
            description: "Real-time chat application with user authentication, rooms, and file sharing capabilities.",
            technologies: ["Node.js", "Socket.io", "MongoDB", "React"],
            image: "💬",
            liveUrl: "https://example.com/chat",
            codeUrl: "https://github.com/username/chat-app"
        },
        {
            id: 8,
            title: "Blog Platform",
            category: "fullstack",
            description: "Full-featured blog platform with user authentication, comments, likes, and admin dashboard.",
            technologies: ["Node.js", "Express", "MongoDB", "React"],
            image: "✍️",
            liveUrl: "https://example.com/blog",
            codeUrl: "https://github.com/username/blog-platform"
        },
        {
            id: 9,
            title: "Fitness Tracker",
            category: "react",
            description: "React Native fitness tracking application with workout plans, progress charts, and social features.",
            technologies: ["React Native", "Firebase", "Chart.js", "Google Fit API"],
            image: "💪",
            liveUrl: "https://example.com/fitness",
            codeUrl: "https://github.com/username/fitness-tracker"
        },
        {
            id: 10,
            title: "Crypto Dashboard",
            category: "javascript",
            description: "Cryptocurrency tracking dashboard with real-time prices, portfolio management, and market analysis.",
            technologies: ["JavaScript", "WebSockets", "Chart.js", "Crypto APIs"],
            image: "₿",
            liveUrl: "https://example.com/crypto",
            codeUrl: "https://github.com/username/crypto-dashboard"
        },
        {
            id: 11,
            title: "Travel Agency Website",
            category: "html",
            description: "Responsive travel agency website with booking system, destination guides, and customer testimonials.",
            technologies: ["HTML5", "CSS3", "JavaScript", "Form Handling"],
            image: "✈️",
            liveUrl: "https://example.com/travel",
            codeUrl: "https://github.com/username/travel-agency"
        },
        {
            id: 12,
            title: "Recipe Sharing App",
            category: "fullstack",
            description: "Community recipe sharing platform with search, ratings, user profiles, and meal planning.",
            technologies: ["Node.js", "Express", "MongoDB", "Cloudinary"],
            image: "🍳",
            liveUrl: "https://example.com/recipes",
            codeUrl: "https://github.com/username/recipe-app"
        }
    ];
    
    const projectsContainer = document.getElementById('projects-container');
    if (!projectsContainer) return;
    
    projectsContainer.innerHTML = '';
    
    projects.forEach(project => {
        const projectCard = document.createElement('div');
        projectCard.className = 'project-card';
        projectCard.setAttribute('data-aos', 'fade-up');
        projectCard.setAttribute('data-category', project.category);
        
        projectCard.innerHTML = `
            <div class="project-image">
                <span style="font-size: 4rem;">${project.image}</span>
            </div>
            <div class="project-info">
                <span class="project-category">${getCategoryName(project.category)}</span>
                <h3 class="project-title">${project.title}</h3>
                <p class="project-description">${project.description}</p>
                <div class="project-tech">
                    ${project.technologies.map(tech => `<span class="tech-tag">${tech}</span>`).join('')}
                </div>
                <div class="project-links">
                    <a href="${project.liveUrl}" target="_blank" class="view-btn">Live Demo</a>
                    <a href="#" class="details-btn" data-project-id="${project.id}">View Details</a>
                </div>
            </div>
        `;
        
        projectsContainer.appendChild(projectCard);
    });
    
    // Add event listeners for project details buttons
    document.querySelectorAll('.details-btn').forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const projectId = parseInt(button.getAttribute('data-project-id'));
            const project = projects.find(p => p.id === projectId);
            if (project) {
                showProjectDetails(project);
            }
        });
    });
    
    // Initialize filter functionality
    initProjectFilter();
}

// Helper function to get category display name
function getCategoryName(category) {
    const categories = {
        'html': 'HTML/CSS',
        'javascript': 'JavaScript',
        'react': 'React',
        'fullstack': 'Full Stack'
    };
    return categories[category] || category;
}

// Initialize project filtering
function initProjectFilter() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const projectCards = document.querySelectorAll('.project-card');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
            
            const filter = button.getAttribute('data-filter');
            
            // Filter projects
            projectCards.forEach(card => {
                if (filter === 'all' || card.getAttribute('data-category') === filter) {
                    card.style.display = 'block';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 10);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });
        });
    });
}

// Show project details in modal
function showProjectDetails(project) {
    const modal = document.getElementById('project-modal');
    const modalTitle = document.getElementById('modal-title');
    const modalDescription = document.getElementById('modal-description');
    const modalImage = document.getElementById('modal-image');
    const modalTechnologies = document.getElementById('modal-technologies');
    const modalLiveLink = document.getElementById('modal-live');
    const modalCodeLink = document.getElementById('modal-code');
    
    // Set modal content
    modalTitle.textContent = project.title;
    modalDescription.textContent = project.description;
    modalImage.alt = project.title;
    
    // Create emoji-based image
    const imageContainer = modalImage;
    imageContainer.innerHTML = `<div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; font-size: 8rem; background: linear-gradient(135deg, #3b82f6, #8b5cf6); color: white; border-radius: 20px 0 0 20px;">${project.image}</div>`;
    
    // Set technologies
    modalTechnologies.innerHTML = '';
    project.technologies.forEach(tech => {
        const techTag = document.createElement('span');
        techTag.className = 'tech-tag';
        techTag.textContent = tech;
        modalTechnologies.appendChild(techTag);
    });
    
    // Set links
    modalLiveLink.href = project.liveUrl;
    modalCodeLink.href = project.codeUrl;
    
    // Show modal
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
    
    // Close modal functionality
    const closeModal = () => {
        modal.classList.remove('active');
        document.body.style.overflow = 'auto';
    };
    
    modal.querySelector('.modal-close').addEventListener('click', closeModal);
    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeModal();
    });
}

// Update your DOMContentLoaded event to include projects
document.addEventListener('DOMContentLoaded', function() {
    // ... existing code ...
    
    // Load projects
    loadProjects();
    
    // ... existing code ...
});