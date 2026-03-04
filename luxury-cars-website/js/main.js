// Prestige Auto Detailing - Advanced JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // ============================================
    // PRELOADER
    // ============================================
    const preloader = document.querySelector('.preloader');
    if (preloader) {
        // Simulate loading
        setTimeout(() => {
            preloader.style.opacity = '0';
            preloader.style.visibility = 'hidden';
            document.body.style.overflow = 'auto';
            
            // Initialize website
            initWebsite();
        }, 1500);
    }

    // ============================================
    // INITIALIZE WEBSITE
    // ============================================
    function initWebsite() {
        // Initialize GSAP
        initGSAPAnimations();
        
        // Initialize particles
        initParticles();
        
        // Initialize navigation
        initNavigation();
        
        // Initialize booking form
        initBookingForm();
        
        // Initialize counters
        initCounters();
        
        // Initialize gallery
        initGallery();
        
        // Initialize service cards
        initServiceCards();
        
        // Initialize scroll effects
        initScrollEffects();
        
        // Initialize form validation
        initFormValidation();
    }

    // ============================================
    // GSAP ANIMATIONS
    // ============================================
    function initGSAPAnimations() {
        // Register ScrollTrigger plugin
        gsap.registerPlugin(ScrollTrigger);
        
        // Hero title animation
        gsap.from('.hero-title .line span', {
            duration: 1,
            y: 100,
            opacity: 0,
            stagger: 0.2,
            ease: 'power4.out'
        });
        
        // Hero subtitle animation
        gsap.from('.hero-subtitle', {
            duration: 1,
            y: 50,
            opacity: 0,
            delay: 1,
            ease: 'power3.out'
        });
        
        // Hero CTA animation
        gsap.from('.hero-cta', {
            duration: 1,
            y: 50,
            opacity: 0,
            delay: 1.2,
            ease: 'power3.out'
        });
        
        // Hero stats animation
        gsap.from('.hero-stats', {
            duration: 1,
            y: 50,
            opacity: 0,
            delay: 1.4,
            ease: 'power3.out'
        });
        
        // Service cards animation
        gsap.utils.toArray('.service-card').forEach((card, i) => {
            gsap.from(card, {
                scrollTrigger: {
                    trigger: card,
                    start: 'top bottom-=100',
                    toggleActions: 'play none none reverse'
                },
                duration: 1,
                y: 100,
                opacity: 0,
                delay: i * 0.1,
                ease: 'power3.out'
            });
        });
        
        // Section headers animation
        gsap.utils.toArray('.section-header').forEach(header => {
            gsap.from(header, {
                scrollTrigger: {
                    trigger: header,
                    start: 'top bottom-=100',
                    toggleActions: 'play none none reverse'
                },
                duration: 1,
                y: 50,
                opacity: 0,
                ease: 'power3.out'
            });
        });
        
        // Gallery items animation
        gsap.utils.toArray('.gallery-item').forEach((item, i) => {
            gsap.from(item, {
                scrollTrigger: {
                    trigger: item,
                    start: 'top bottom-=100',
                    toggleActions: 'play none none reverse'
                },
                duration: 1,
                y: 50,
                opacity: 0,
                delay: i * 0.1,
                ease: 'power3.out'
            });
        });
        
        // Booking form animation
        gsap.from('.booking-form-container', {
            scrollTrigger: {
                trigger: '.booking',
                start: 'top bottom-=100',
                toggleActions: 'play none none reverse'
            },
            duration: 1,
            y: 50,
            opacity: 0,
            ease: 'power3.out'
        });
        
        // Booking info animation
        gsap.from('.booking-info', {
            scrollTrigger: {
                trigger: '.booking',
                start: 'top bottom-=100',
                toggleActions: 'play none none reverse'
            },
            duration: 1,
            y: 50,
            opacity: 0,
            delay: 0.2,
            ease: 'power3.out'
        });
    }

    // ============================================
    // PARTICLE BACKGROUND
    // ============================================
    function initParticles() {
        if (typeof particlesJS !== 'undefined') {
            particlesJS('particles-js', {
                particles: {
                    number: { value: 80, density: { enable: true, value_area: 800 } },
                    color: { value: "#D4AF37" },
                    shape: { type: "circle" },
                    opacity: { value: 0.5, random: true },
                    size: { value: 3, random: true },
                    line_linked: {
                        enable: true,
                        distance: 150,
                        color: "#D4AF37",
                        opacity: 0.2,
                        width: 1
                    },
                    move: {
                        enable: true,
                        speed: 2,
                        direction: "none",
                        random: true,
                        straight: false,
                        out_mode: "out",
                        bounce: false
                    }
                },
                interactivity: {
                    detect_on: "canvas",
                    events: {
                        onhover: { enable: true, mode: "repulse" },
                        onclick: { enable: true, mode: "push" },
                        resize: true
                    }
                },
                retina_detect: true
            });
        }
    }

    // ============================================
    // NAVIGATION
    // ============================================
    function initNavigation() {
        const header = document.querySelector('.header');
        const mobileToggle = document.querySelector('.mobile-menu-toggle');
        const navLinks = document.querySelectorAll('.nav-link');
        
        // Header scroll effect
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
            
            // Update active nav link
            updateActiveNavLink();
        });
        
        // Mobile menu toggle
        if (mobileToggle) {
            mobileToggle.addEventListener('click', () => {
                mobileToggle.classList.toggle('active');
                document.body.classList.toggle('menu-open');
            });
        }
        
        // Smooth scroll for nav links
        navLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                
                const targetId = link.getAttribute('href');
                if (targetId.startsWith('#')) {
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        // Close mobile menu if open
                        if (mobileToggle && mobileToggle.classList.contains('active')) {
                            mobileToggle.classList.remove('active');
                            document.body.classList.remove('menu-open');
                        }
                        
                        // Smooth scroll
                        gsap.to(window, {
                            duration: 1,
                            scrollTo: {
                                y: targetElement,
                                offsetY: 80
                            },
                            ease: 'power3.inOut'
                        });
                    }
                }
            });
        });
        
        // Update active nav link
        function updateActiveNavLink() {
            const sections = document.querySelectorAll('section[id]');
            let current = '';
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                
                if (window.scrollY >= sectionTop - 200 && window.scrollY < sectionTop + sectionHeight - 200) {
                    current = section.getAttribute('id');
                }
            });
            
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${current}`) {
                    link.classList.add('active');
                }
            });
        }
    }

    // ============================================
    // BOOKING FORM
    // ============================================
    function initBookingForm() {
        const form = document.getElementById('bookingForm');
        if (!form) return;
        
        const steps = form.querySelectorAll('.form-step');
        const prevBtn = form.querySelector('.btn-prev');
        const nextBtn = form.querySelector('.btn-next');
        const submitBtn = form.querySelector('.btn-submit');
        const progressFill = form.querySelector('.progress-fill');
        const progressSteps = form.querySelectorAll('.progress-steps .step');
        
        let currentStep = 1;
        
        // Initialize form steps
        updateFormSteps();
        
        // Service data
        const services = [
            {
                id: 1,
                name: "Ceramic Pro Coating",
                price: "$1,499",
                description: "Advanced nano-ceramic coating with 5-year warranty"
            },
            {
                id: 2,
                name: "Paint Correction",
                price: "$899",
                description: "Professional paint restoration and polishing"
            },
            {
                id: 3,
                name: "Interior Detailing",
                price: "$599",
                description: "Complete interior cleaning and conditioning"
            },
            {
                id: 4,
                name: "Full Service Package",
                price: "$2,299",
                description: "Complete interior and exterior detailing"
            }
        ];
        
        // Populate service options
        const serviceOptions = form.querySelector('.service-options');
        if (serviceOptions) {
            services.forEach(service => {
                const option = document.createElement('div');
                option.className = 'service-option';
                option.innerHTML = `
                    <div class="service-option-header">
                        <div class="service-option-name">${service.name}</div>
                        <div class="service-option-price">${service.price}</div>
                    </div>
                    <div class="service-option-description">${service.description}</div>
                `;
                
                option.addEventListener('click', () => {
                    form.querySelectorAll('.service-option').forEach(opt => {
                        opt.classList.remove('selected');
                    });
                    option.classList.add('selected');
                    
                    // Store selected service in hidden input
                    let serviceInput = form.querySelector('input[name="service"]');
                    if (!serviceInput) {
                        serviceInput = document.createElement('input');
                        serviceInput.type = 'hidden';
                        serviceInput.name = 'service';
                        serviceInput.value = service.name;
                        form.appendChild(serviceInput);
                    } else {
                        serviceInput.value = service.name;
                    }
                });
                
                serviceOptions.appendChild(option);
            });
        }
        
        // Next button click
        nextBtn.addEventListener('click', () => {
            if (validateStep(currentStep)) {
                currentStep++;
                updateFormSteps();
            }
        });
        
        // Previous button click
        prevBtn.addEventListener('click', () => {
            currentStep--;
            updateFormSteps();
        });
        
        // Form submission
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            
            if (validateStep(currentStep)) {
                // Show loading state
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
                submitBtn.disabled = true;
                
                // Submit form
                try {
                    const formData = new FormData(form);
                    const response = await fetch(form.action, {
                        method: 'POST',
                        body: formData
                    });
                    
                    if (response.ok) {
                        // Show success message
                        showNotification('Appointment scheduled successfully! Our concierge will contact you shortly.', 'success');
                        
                        // Reset form
                        form.reset();
                        currentStep = 1;
                        updateFormSteps();
                        
                        // Scroll to top
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                    } else {
                        throw new Error('Submission failed');
                    }
                } catch (error) {
                    showNotification('An error occurred. Please try again or contact us directly.', 'error');
                } finally {
                    // Reset button
                    submitBtn.innerHTML = '<i class="fas fa-paper-plane"></i> Book Appointment';
                    submitBtn.disabled = false;
                }
            }
        });
        
        // Update form steps
        function updateFormSteps() {
            // Hide all steps
            steps.forEach(step => {
                step.classList.remove('active');
            });
            
            // Show current step
            const currentStepElement = form.querySelector(`[data-step="${currentStep}"]`);
            if (currentStepElement) {
                currentStepElement.classList.add('active');
            }
            
            // Update buttons
            prevBtn.style.display = currentStep === 1 ? 'none' : 'flex';
            nextBtn.style.display = currentStep === steps.length ? 'none' : 'flex';
            submitBtn.style.display = currentStep === steps.length ? 'flex' : 'none';
            
            // Update progress
            const progressPercent = ((currentStep - 1) / (steps.length - 1)) * 100;
            progressFill.style.width = `${progressPercent}%`;
            
            // Update progress steps
            progressSteps.forEach((step, index) => {
                step.classList.remove('active');
                if (index < currentStep) {
                    step.classList.add('active');
                }
            });
            
            // Animate step transition
            gsap.from(currentStepElement, {
                duration: 0.5,
                x: 50,
                opacity: 0,
                ease: 'power3.out'
            });
        }
        
        // Step validation
        function validateStep(step) {
            let isValid = true;
            const currentStepElement = form.querySelector(`[data-step="${step}"]`);
            
            // Validate required fields in current step
            const requiredInputs = currentStepElement.querySelectorAll('[required]');
            requiredInputs.forEach(input => {
                if (!input.value.trim()) {
                    isValid = false;
                    showInputError(input, 'This field is required');
                } else if (input.type === 'email' && !isValidEmail(input.value)) {
                    isValid = false;
                    showInputError(input, 'Please enter a valid email address');
                } else if (input.type === 'tel' && !isValidPhone(input.value)) {
                    isValid = false;
                    showInputError(input, 'Please enter a valid phone number');
                } else {
                    clearInputError(input);
                }
            });
            
            // Special validation for step 2 (service selection)
            if (step === 2) {
                const selectedService = form.querySelector('.service-option.selected');
                if (!selectedService) {
                    isValid = false;
                    showNotification('Please select a service', 'error');
                }
            }
            
            return isValid;
        }
        
        // Input validation functions
        function showInputError(input, message) {
            const formGroup = input.closest('.form-group');
            const feedback = formGroup.querySelector('.form-feedback');
            
            input.classList.add('error');
            if (feedback) {
                feedback.textContent = message;
                feedback.style.color = '#DC2626';
            }
            
            // Shake animation
            gsap.to(input, {
                duration: 0.5,
                x: [0, -10, 10, -10, 10, 0],
                ease: 'power1.out'
            });
        }
        
        function clearInputError(input) {
            input.classList.remove('error');
            const feedback = input.closest('.form-group').querySelector('.form-feedback');
            if (feedback) {
                feedback.textContent = '';
            }
        }
        
        function isValidEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }
        
        function isValidPhone(phone) {
            const re = /^\(\d{3}\) \d{3}-\d{4}$/;
            return re.test(phone);
        }
        
        // Phone number formatting
        const phoneInput = form.querySelector('input[type="tel"]');
        if (phoneInput) {
            phoneInput.addEventListener('input', (e) => {
                let value = e.target.value.replace(/\D/g, '');
                
                if (value.length > 0) {
                    if (value.length <= 3) {
                        value = `(${value}`;
                    } else if (value.length <= 6) {
                        value = `(${value.substring(0,3)}) ${value.substring(3)}`;
                    } else {
                        value = `(${value.substring(0,3)}) ${value.substring(3,6)}-${value.substring(6,10)}`;
                    }
                }
                
                e.target.value = value;
            });
        }
        
        // Date input restrictions
        const dateInput = form.querySelector('input[type="date"]');
        if (dateInput) {
            const today = new Date().toISOString().split('T')[0];
            const maxDate = new Date();
            maxDate.setMonth(maxDate.getMonth() + 3);
            
            dateInput.min = today;
            dateInput.max = maxDate.toISOString().split('T')[0];
            
            // Set default to tomorrow
            const tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);
            dateInput.value = tomorrow.toISOString().split('T')[0];
        }
    }

    // ============================================
    // COUNTER ANIMATIONS
    // ============================================
    function initCounters() {
        const counters = document.querySelectorAll('.stat-number');
        
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-count') || counter.textContent);
            const suffix = counter.textContent.replace(/\d/g, '');
            
            gsap.to(counter, {
                scrollTrigger: {
                    trigger: counter,
                    start: 'top bottom-=100',
                    toggleActions: 'play none none reverse'
                },
                duration: 2,
                innerHTML: target,
                roundProps: 'innerHTML',
                ease: 'power3.out',
                onUpdate: function() {
                    counter.textContent = Math.floor(this.targets()[0].innerHTML) + suffix;
                }
            });
        });
    }

    // ============================================
    // GALLERY
    // ============================================
    function initGallery() {
        const galleryItems = document.querySelectorAll('.gallery-item');
        const viewButtons = document.querySelectorAll('.btn-view-image');
        
        // Gallery hover effect
        galleryItems.forEach(item => {
            item.addEventListener('mousemove', (e) => {
                const rect = item.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                
                const rotateY = (x - centerX) / 25;
                const rotateX = (centerY - y) / 25;
                
                item.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.05)`;
            });
            
            item.addEventListener('mouseleave', () => {
                item.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) scale(1)';
            });
        });
        
        // View image modal
        viewButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.stopPropagation();
                const galleryItem = button.closest('.gallery-item');
                const imgSrc = galleryItem.querySelector('img').src;
                
                // Create modal
                const modal = document.createElement('div');
                modal.className = 'gallery-modal';
                modal.innerHTML = `
                    <div class="modal-content">
                        <button class="modal-close"><i class="fas fa-times"></i></button>
                        <img src="${imgSrc}" alt="Gallery Image">
                    </div>
                `;
                
                document.body.appendChild(modal);
                document.body.style.overflow = 'hidden';
                
                // Close modal
                modal.addEventListener('click', (e) => {
                    if (e.target === modal || e.target.closest('.modal-close')) {
                        modal.remove();
                        document.body.style.overflow = 'auto';
                    }
                });
            });
        });
        
        // Add modal styles
        const modalStyle = document.createElement('style');
        modalStyle.textContent = `
            .gallery-modal {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.9);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 9999;
                animation: fadeIn 0.3s ease;
            }
            
            .modal-content {
                position: relative;
                max-width: 90%;
                max-height: 90%;
            }
            
            .modal-content img {
                max-width: 100%;
                max-height: 90vh;
                border-radius: 12px;
                box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            }
            
            .modal-close {
                position: absolute;
                top: -40px;
                right: 0;
                background: var(--premium-gold);
                border: none;
                width: 40px;
                height: 40px;
                border-radius: 50%;
                color: var(--luxury-black);
                cursor: pointer;
                font-size: 1.25rem;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: transform 0.3s ease;
            }
            
            .modal-close:hover {
                transform: rotate(90deg);
            }
            
            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }
        `;
        document.head.appendChild(modalStyle);
    }

    // ============================================
    // SERVICE CARDS
    // ============================================
    function initServiceCards() {
        const serviceCards = document.querySelectorAll('.service-card');
        const bookButtons = document.querySelectorAll('.btn-book-service');
        
        // 3D hover effect
        serviceCards.forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                
                const rotateY = (x - centerX) / 20;
                const rotateX = (centerY - y) / 20;
                
                gsap.to(card, {
                    duration: 0.5,
                    rotateX: rotateX,
                    rotateY: rotateY,
                    ease: 'power2.out'
                });
            });
            
            card.addEventListener('mouseleave', () => {
                gsap.to(card, {
                    duration: 0.5,
                    rotateX: 0,
                    rotateY: 0,
                    ease: 'power2.out'
                });
            });
        });
        
        // Book service button
        bookButtons.forEach(button => {
            button.addEventListener('click', () => {
                const service = button.getAttribute('data-service');
                
                // Scroll to booking section
                const bookingSection = document.getElementById('booking');
                if (bookingSection) {
                    gsap.to(window, {
                        duration: 1,
                        scrollTo: {
                            y: bookingSection,
                            offsetY: 80
                        },
                        ease: 'power3.inOut'
                    });
                    
                    // Set service in booking form
                    setTimeout(() => {
                        const serviceOptions = document.querySelectorAll('.service-option');
                        serviceOptions.forEach(option => {
                            if (option.querySelector('.service-option-name').textContent === service) {
                                option.click();
                            }
                        });
                    }, 500);
                }
            });
        });
    }

    // ============================================
    // SCROLL EFFECTS
    // ============================================
    function initScrollEffects() {
        // Parallax effect for hero
        gsap.to('.hero-overlay', {
            scrollTrigger: {
                trigger: '.hero',
                start: 'top top',
                end: 'bottom top',
                scrub: true
            },
            opacity: 0.8
        });
        
        // Floating shapes animation
        gsap.utils.toArray('.floating-shape').forEach((shape, i) => {
            gsap.to(shape, {
                scrollTrigger: {
                    trigger: 'body',
                    start: 'top top',
                    end: 'bottom bottom',
                    scrub: true
                },
                y: i % 2 === 0 ? 100 : -100,
                x: i % 2 === 0 ? -50 : 50,
                rotation: 360,
                ease: 'none'
            });
        });
    }

    // ============================================
    // FORM VALIDATION
    // ============================================
    function initFormValidation() {
        const forms = document.querySelectorAll('form');
        
        forms.forEach(form => {
            const inputs = form.querySelectorAll('input, textarea, select');
            
            inputs.forEach(input => {
                // Real-time validation
                input.addEventListener('blur', () => {
                    validateInput(input);
                });
                
                input.addEventListener('input', () => {
                    if (input.classList.contains('error')) {
                        validateInput(input);
                    }
                });
            });
        });
        
        function validateInput(input) {
            let isValid = true;
            let message = '';
            
            if (input.hasAttribute('required') && !input.value.trim()) {
                isValid = false;
                message = 'This field is required';
            } else if (input.type === 'email' && input.value) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(input.value)) {
                    isValid = false;
                    message = 'Please enter a valid email address';
                }
            } else if (input.type === 'tel' && input.value) {
                const phoneRegex = /^\(\d{3}\) \d{3}-\d{4}$/;
                if (!phoneRegex.test(input.value)) {
                    isValid = false;
                    message = 'Please enter a valid phone number';
                }
            }
            
            if (!isValid) {
                showInputError(input, message);
            } else {
                clearInputError(input);
            }
            
            return isValid;
        }
        
        function showInputError(input, message) {
            input.classList.add('error');
            const formGroup = input.closest('.form-group');
            const feedback = formGroup.querySelector('.form-feedback');
            
            if (feedback) {
                feedback.textContent = message;
                feedback.style.color = '#DC2626';
            }
        }
        
        function clearInputError(input) {
            input.classList.remove('error');
            const formGroup = input.closest('.form-group');
            const feedback = formGroup.querySelector('.form-feedback');
            
            if (feedback) {
                feedback.textContent = '';
            }
        }
    }

    // ============================================
    // NOTIFICATION SYSTEM
    // ============================================
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        
        const icons = {
            success: 'check-circle',
            error: 'exclamation-circle',
            info: 'info-circle'
        };
        
        notification.innerHTML = `
            <div class="notification-icon">
                <i class="fas fa-${icons[type]}"></i>
            </div>
            <div class="notification-content">
                <p>${message}</p>
            </div>
            <button class="notification-close">
                <i class="fas fa-times"></i>
            </button>
        `;
        
        document.body.appendChild(notification);
        
        // Animate in
        gsap.fromTo(notification, 
            { x: 100, opacity: 0 },
            { x: 0, opacity: 1, duration: 0.3, ease: 'power2.out' }
        );
        
        // Auto remove after 5 seconds
        const autoRemove = setTimeout(() => {
            removeNotification(notification);
        }, 5000);
        
        // Close button
        notification.querySelector('.notification-close').addEventListener('click', () => {
            clearTimeout(autoRemove);
            removeNotification(notification);
        });
        
        function removeNotification(notification) {
            gsap.to(notification, {
                x: 100,
                opacity: 0,
                duration: 0.3,
                ease: 'power2.in',
                onComplete: () => {
                    notification.remove();
                }
            });
        }
    }
    
    // Add notification styles
    const notificationStyle = document.createElement('style');
    notificationStyle.textContent = `
        .notification {
            position: fixed;
            top: 100px;
            right: 20px;
            background: var(--luxury-black);
            border: 1px solid rgba(212, 175, 55, 0.2);
            border-radius: 12px;
            padding: 1rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            min-width: 300px;
            max-width: 400px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            z-index: 10000;
            backdrop-filter: blur(20px);
        }
        
        .notification-success {
            border-left: 4px solid #10B981;
        }
        
        .notification-error {
            border-left: 4px solid #DC2626;
        }
        
        .notification-info {
            border-left: 4px solid #3B82F6;
        }
        
        .notification-icon {
            font-size: 1.5rem;
        }
        
        .notification-success .notification-icon {
            color: #10B981;
        }
        
        .notification-error .notification-icon {
            color: #DC2626;
        }
        
        .notification-info .notification-icon {
            color: #3B82F6;
        }
        
        .notification-content {
            flex: 1;
        }
        
        .notification-content p {
            margin: 0;
            color: var(--platinum);
            font-size: 0.95rem;
            line-height: 1.5;
        }
        
        .notification-close {
            background: transparent;
            border: none;
            color: var(--platinum);
            opacity: 0.7;
            cursor: pointer;
            padding: 0.25rem;
            font-size: 1rem;
            transition: opacity 0.2s ease;
        }
        
        .notification-close:hover {
            opacity: 1;
        }
    `;
    document.head.appendChild(notificationStyle);

    // ============================================
    // INITIALIZE CURRENT YEAR
    // ============================================
    document.querySelectorAll('.current-year').forEach(el => {
        el.textContent = new Date().getFullYear();
    });
});