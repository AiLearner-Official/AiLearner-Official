// Mobile menu toggle
const mobileMenuBtn = document.getElementById('mobileMenuBtn');
const navLinks = document.querySelector('.nav-links');

mobileMenuBtn.addEventListener('click', () => {
    navLinks.classList.toggle('active');
    const icon = mobileMenuBtn.querySelector('i');
    if (navLinks.classList.contains('active')) {
        icon.classList.remove('fa-bars');
        icon.classList.add('fa-times');
    } else {
        icon.classList.remove('fa-times');
        icon.classList.add('fa-bars');
    }
});

// Close mobile menu when clicking on a link
document.querySelectorAll('.nav-links a').forEach(link => {
    link.addEventListener('click', () => {
        navLinks.classList.remove('active');
        mobileMenuBtn.querySelector('i').classList.remove('fa-times');
        mobileMenuBtn.querySelector('i').classList.add('fa-bars');
    });
});

// Back to top button
const backToTopBtn = document.getElementById('backToTop');

window.addEventListener('scroll', () => {
    if (window.pageYOffset > 300) {
        backToTopBtn.classList.add('visible');
    } else {
        backToTopBtn.classList.remove('visible');
    }
});

backToTopBtn.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});

// Search functionality
const searchBtn = document.querySelector('.search-btn');
const searchInput = document.querySelector('.search-input');

searchBtn.addEventListener('click', () => {
    if (searchInput.value.trim() !== '') {
        alert(`Searching for: ${searchInput.value}`);
        searchInput.value = '';
    }
});

searchInput.addEventListener('keypress', (e) => {
    if (e.key === 'Enter') {
        if (searchInput.value.trim() !== '') {
            alert(`Searching for: ${searchInput.value}`);
            searchInput.value = '';
        }
    }
});

// Animate progress bars on scroll
const observerOptions = {
    threshold: 0.5
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const progressBars = entry.target.querySelectorAll('.spec-progress');
            progressBars.forEach(bar => {
                // Reset width to trigger animation
                const width = bar.style.width;
                bar.style.width = '0';
                setTimeout(() => {
                    bar.style.width = width;
                }, 300);
            });
        }
    });
}, observerOptions);

const techSection = document.querySelector('.technology');
observer.observe(techSection);

// Animate cards on scroll
const cardObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('scale-up');
        }
    });
}, {
    threshold: 0.2
});

document.querySelectorAll('.feature-card').forEach(card => {
    cardObserver.observe(card);
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

// Add active class to navigation links on scroll
const sections = document.querySelectorAll('section');
const navItems = document.querySelectorAll('.nav-links a');

window.addEventListener('scroll', () => {
    let current = '';
    
    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        
        if (scrollY >= sectionTop - 150) {
            current = section.getAttribute('id');
        }
    });
    
    navItems.forEach(item => {
        item.classList.remove('active');
        if (item.getAttribute('href') === `#${current}`) {
            item.classList.add('active');
        }
    });
});

// Contact form submission
const contactForm = document.getElementById('contactForm');
if (contactForm) {
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form data
        const name = this.querySelector('input[type="text"]').value;
        const email = this.querySelector('input[type="email"]').value;
        const message = this.querySelector('textarea').value;
        
        // In a real application, you would send this data to a server
        // For now, we'll just show a success message
        alert(`Thank you, ${name}! Your message has been sent successfully. We'll contact you at ${email} soon.`);
        
        // Reset form
        this.reset();
    });
}

// Initialize with hero section active
navItems[0].classList.add('active');

// Add video placeholder functionality
const videoPlaceholder = document.querySelector('.video-placeholder');
if (videoPlaceholder) {
    videoPlaceholder.addEventListener('click', () => {
        // This is where you would add your video
        // Example code for adding a video:
        /*
        const video = document.createElement('video');
        video.autoplay = true;
        video.muted = true;
        video.loop = true;
        video.controls = true;
        
        const source = document.createElement('source');
        source.src = 'your-robot-video.mp4';
        source.type = 'video/mp4';
        
        video.appendChild(source);
        videoPlaceholder.innerHTML = '';
        videoPlaceholder.appendChild(video);
        */
        
        // For now, just show an alert
        alert('Replace this placeholder with your robot video. You can add a video element with the following structure:\n\n<video autoplay muted loop controls>\n  <source src="your-video.mp4" type="video/mp4">\n</video>');
    });
}




const slider = document.getElementById("robotSlider");
const leftBtn = document.getElementById("slideLeft");
const rightBtn = document.getElementById("slideRight");

leftBtn.addEventListener("click", () => {
    slider.scrollLeft -= 300;
});

rightBtn.addEventListener("click", () => {
    slider.scrollLeft += 300;
});

/* Auto scroll when Popular Robots section comes into view */
let autoScroll;

const popularObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            autoScroll = setInterval(() => {
                slider.scrollLeft += 1;
            }, 20);
        } else {
            clearInterval(autoScroll);
        }
    });
}, { threshold: 0.4 });

popularObserver.observe(document.getElementById("popular-robots"));












