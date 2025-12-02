// ==================================
// Mobile Menu Toggle
// ==================================

const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
const navMenu = document.querySelector('.nav-menu');
const dropdowns = document.querySelectorAll('.dropdown');

if (mobileMenuToggle) {
    mobileMenuToggle.addEventListener('click', () => {
        navMenu.classList.toggle('active');
        mobileMenuToggle.classList.toggle('active');
    });
}

// Handle dropdown on mobile
dropdowns.forEach(dropdown => {
    const dropdownLink = dropdown.querySelector('a');

    dropdownLink.addEventListener('click', (e) => {
        if (window.innerWidth <= 768) {
            e.preventDefault();
            dropdown.classList.toggle('active');
        }
    });
});

// Close mobile menu when clicking outside
document.addEventListener('click', (e) => {
    if (!navMenu.contains(e.target) && !mobileMenuToggle.contains(e.target)) {
        navMenu.classList.remove('active');
        mobileMenuToggle.classList.remove('active');
    }
});

// Close mobile menu on link click
const navLinks = document.querySelectorAll('.nav-menu a');
navLinks.forEach(link => {
    link.addEventListener('click', () => {
        if (window.innerWidth <= 768 && !link.parentElement.classList.contains('dropdown')) {
            navMenu.classList.remove('active');
            mobileMenuToggle.classList.remove('active');
        }
    });
});

// ==================================
// Scroll to Top Button
// ==================================

const scrollTopBtn = document.getElementById('scrollTop');

window.addEventListener('scroll', () => {
    if (window.pageYOffset > 300) {
        scrollTopBtn.classList.add('visible');
    } else {
        scrollTopBtn.classList.remove('visible');
    }

    // Add shadow to header on scroll
    const header = document.querySelector('.header');
    if (window.pageYOffset > 0) {
        header.style.boxShadow = '0 5px 15px rgba(0, 0, 0, 0.1)';
    } else {
        header.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.1)';
    }
});

if (scrollTopBtn) {
    scrollTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
}

// ==================================
// Smooth Scroll for Anchor Links
// ==================================

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');

        // Don't prevent default for empty hash or just "#"
        if (href === '#' || href === '') return;

        const target = document.querySelector(href);
        if (target) {
            e.preventDefault();

            const headerHeight = document.querySelector('.header').offsetHeight;
            const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight;

            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
        }
    });
});

// ==================================
// Active Nav Link on Scroll
// ==================================

const sections = document.querySelectorAll('section[id]');
const navMenuLinks = document.querySelectorAll('.nav-menu > li > a');

function highlightNavOnScroll() {
    const scrollY = window.pageYOffset;

    sections.forEach(section => {
        const sectionHeight = section.offsetHeight;
        const sectionTop = section.offsetTop - 200;
        const sectionId = section.getAttribute('id');

        if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
            navMenuLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${sectionId}`) {
                    link.classList.add('active');
                }
            });
        }
    });
}

window.addEventListener('scroll', highlightNavOnScroll);

// ==================================
// Animate Elements on Scroll
// ==================================

const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Observe elements for animation
const animateElements = document.querySelectorAll('.vm-card, .service-card, .news-card, .client-item');
animateElements.forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(30px)';
    el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    observer.observe(el);
});

// ==================================
// Search Functionality
// ==================================

// const searchBtn = document.querySelector('.search-btn');

// if (searchBtn) {
//     searchBtn.addEventListener('click', () => {
//         // Create search modal or expand search bar
//         alert('Fonctionnalité de recherche à implémenter');
//     });
// }

const forms = document.querySelectorAll('form');

forms.forEach(form => {
    form.addEventListener('submit', (e) => {

        // Validation simple AVANT envoi Laravel
        const inputs = form.querySelectorAll('input[required], textarea[required]');
        let isValid = true;

        inputs.forEach(input => {
            if (!input.value.trim()) {
                isValid = false;
                input.style.borderColor = 'red';
            } else {
                input.style.borderColor = '';
            }
        });

        if (!isValid) {
            e.preventDefault(); // ❗ Empêche l'envoi seulement si erreur
            alert('Veuillez remplir tous les champs obligatoires');
        }

        // Si tout est bon → Laravel envoie automatiquement le formulaire
    });
});

// ==================================
// Lazy Loading Images
// ==================================

if ('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.add('loaded');
                observer.unobserve(img);
            }
        });
    });

    const lazyImages = document.querySelectorAll('img[data-src]');
    lazyImages.forEach(img => imageObserver.observe(img));
}

// ==================================
// Image Gallery Slider
// ==================================

const sliderWrapper = document.querySelector('.slider-wrapper');
const slides = document.querySelectorAll('.slide');
const prevBtn = document.querySelector('.prev-btn');
const nextBtn = document.querySelector('.next-btn');
const dots = document.querySelectorAll('.dot');
const thumbnails = document.querySelectorAll('.thumbnail');

let currentSlideIndex = 0;
let autoPlayInterval;
const autoPlayDelay = 5000; // 5 seconds

// Initialize slider
function initSlider() {
    if (!sliderWrapper) return;

    showSlide(currentSlideIndex);
    startAutoPlay();
}

// Show specific slide
function showSlide(index) {
    // Remove active class from all slides
    slides.forEach(slide => slide.classList.remove('active'));
    dots.forEach(dot => dot.classList.remove('active'));
    thumbnails.forEach(thumb => thumb.classList.remove('active'));

    // Ensure index is within bounds
    if (index >= slides.length) {
        currentSlideIndex = 0;
    } else if (index < 0) {
        currentSlideIndex = slides.length - 1;
    } else {
        currentSlideIndex = index;
    }

    // Add active class to current slide
    slides[currentSlideIndex].classList.add('active');
    if (dots[currentSlideIndex]) {
        dots[currentSlideIndex].classList.add('active');
    }
    if (thumbnails[currentSlideIndex]) {
        thumbnails[currentSlideIndex].classList.add('active');
    }
}

// Next slide
function nextSlide() {
    showSlide(currentSlideIndex + 1);
    resetAutoPlay();
}

// Previous slide
function prevSlide() {
    showSlide(currentSlideIndex - 1);
    resetAutoPlay();
}

// Auto play functionality
function startAutoPlay() {
    autoPlayInterval = setInterval(() => {
        nextSlide();
    }, autoPlayDelay);
}

function stopAutoPlay() {
    clearInterval(autoPlayInterval);
}

function resetAutoPlay() {
    stopAutoPlay();
    startAutoPlay();
}

// Event listeners for slider
if (prevBtn) {
    prevBtn.addEventListener('click', prevSlide);
}

if (nextBtn) {
    nextBtn.addEventListener('click', nextSlide);
}

// Dots navigation
dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
        showSlide(index);
        resetAutoPlay();
    });
});

// Thumbnails navigation
thumbnails.forEach((thumb, index) => {
    thumb.addEventListener('click', () => {
        showSlide(index);
        resetAutoPlay();
    });
});

// Keyboard navigation
document.addEventListener('keydown', (e) => {
    if (!sliderWrapper) return;

    if (e.key === 'ArrowLeft') {
        prevSlide();
    } else if (e.key === 'ArrowRight') {
        nextSlide();
    }
});

// Pause on hover
if (sliderWrapper) {
    sliderWrapper.addEventListener('mouseenter', stopAutoPlay);
    sliderWrapper.addEventListener('mouseleave', startAutoPlay);
}

// Touch/Swipe support for mobile
let touchStartX = 0;
let touchEndX = 0;

if (sliderWrapper) {
    sliderWrapper.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
    });

    sliderWrapper.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    });
}

function handleSwipe() {
    const swipeThreshold = 50;

    if (touchEndX < touchStartX - swipeThreshold) {
        // Swipe left
        nextSlide();
    }

    if (touchEndX > touchStartX + swipeThreshold) {
        // Swipe right
        prevSlide();
    }
}

// Lightbox functionality (optional - for full screen view)
function createLightbox() {
    const lightbox = document.createElement('div');
    lightbox.className = 'lightbox';
    lightbox.innerHTML = `
        <button class="lightbox-close" aria-label="Fermer">
            <i class="fas fa-times"></i>
        </button>
        <img src="" alt="Image agrandie">
    `;
    document.body.appendChild(lightbox);

    return lightbox;
}

// Add click event to slides for lightbox
slides.forEach(slide => {
    slide.addEventListener('click', () => {
        const imgSrc = slide.querySelector('img').src;
        let lightbox = document.querySelector('.lightbox');

        if (!lightbox) {
            lightbox = createLightbox();
        }

        lightbox.querySelector('img').src = imgSrc;
        lightbox.classList.add('active');
        stopAutoPlay();

        // Close lightbox
        lightbox.querySelector('.lightbox-close').addEventListener('click', () => {
            lightbox.classList.remove('active');
            startAutoPlay();
        });

        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) {
                lightbox.classList.remove('active');
                startAutoPlay();
            }
        });
    });
});

// Initialize slider on page load
initSlider();

// ==================================
// Hero Slider (if multiple slides)
// ==================================

const heroSlides = document.querySelectorAll('.hero-slide');
let currentSlide = 0;

function nextSlide() {
    if (heroSlides.length > 1) {
        heroSlides[currentSlide].classList.remove('active');
        currentSlide = (currentSlide + 1) % heroSlides.length;
        heroSlides[currentSlide].classList.add('active');
    }
}

// Auto-advance slides every 5 seconds
if (heroSlides.length > 1) {
    setInterval(nextSlide, 5000);
}

// ==================================
// Counter Animation for Statistics
// ==================================

function animateCounter(element, target, duration = 2000) {
    let start = 0;
    const increment = target / (duration / 16);

    const timer = setInterval(() => {
        start += increment;
        if (start >= target) {
            element.textContent = target.toLocaleString();
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(start).toLocaleString();
        }
    }, 16);
}

// Observe counters if they exist
const counters = document.querySelectorAll('[data-counter]');
const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const target = parseInt(entry.target.dataset.counter);
            animateCounter(entry.target, target);
            counterObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.5 });

counters.forEach(counter => counterObserver.observe(counter));

// ==================================
// Print Functionality
// ==================================

function printPage() {
    window.print();
}

// ==================================
// Accessibility Improvements
// ==================================

// Trap focus in mobile menu when open
function trapFocus(element) {
    const focusableElements = element.querySelectorAll(
        'a[href], button, textarea, input, select, [tabindex]:not([tabindex="-1"])'
    );
    const firstElement = focusableElements[0];
    const lastElement = focusableElements[focusableElements.length - 1];

    element.addEventListener('keydown', (e) => {
        if (e.key === 'Tab') {
            if (e.shiftKey && document.activeElement === firstElement) {
                e.preventDefault();
                lastElement.focus();
            } else if (!e.shiftKey && document.activeElement === lastElement) {
                e.preventDefault();
                firstElement.focus();
            }
        }

        if (e.key === 'Escape') {
            navMenu.classList.remove('active');
            mobileMenuToggle.classList.remove('active');
            mobileMenuToggle.focus();
        }
    });
}

if (navMenu) {
    trapFocus(navMenu);
}

// ==================================
// Performance Optimization
// ==================================

// Debounce function for scroll events
function debounce(func, wait = 10) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Apply debounce to scroll handler
window.addEventListener('scroll', debounce(highlightNavOnScroll, 10));

// ==================================
// Service Worker Registration (Optional)
// ==================================

if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        // Uncomment to register service worker
        // navigator.serviceWorker.register('/sw.js')
        //     .then(reg => console.log('Service Worker registered'))
        //     .catch(err => console.log('Service Worker registration failed'));
    });
}

// ==================================
// Console Welcome Message
// ==================================

console.log('%c ABREMA Website ', 'background: #8b2e16; color: white; font-size: 20px; padding: 10px;');
console.log('%c Autorité Burundaise de Régulation des Médicaments ', 'color: #2c5f7d; font-size: 14px;');
console.log('%c Developed with ❤️ for public health ', 'color: #666; font-size: 12px;');

document.addEventListener("DOMContentLoaded", () => {
    const openBtn = document.getElementById("openSearch");
    const closeBtn = document.getElementById("closeSearch");
    const modal = document.getElementById("searchModal");
    const searchInput = document.getElementById("searchInput");

    if (!modal) return;

    // Open button (may be absent on some pages)
    if (openBtn) {
        openBtn.addEventListener("click", () => {
            modal.classList.add("active");
            modal.setAttribute('aria-hidden', 'false');
            if (searchInput) {
                searchInput.focus();
                searchInput.value = "";
            }
        });

        openBtn.addEventListener("keydown", (e) => {
            if ((e.key === "Enter" || e.key === " ") && searchInput) {
                e.preventDefault();
                modal.classList.add("active");
                modal.setAttribute('aria-hidden', 'false');
                searchInput.focus();
                searchInput.value = "";
            }
        });
    }

    if (closeBtn) {
        closeBtn.addEventListener("click", () => {
            modal.classList.remove("active");
            modal.setAttribute('aria-hidden', 'true');
            if (openBtn) openBtn.focus();
        });
    }

    if (searchInput) {
        searchInput.addEventListener("keydown", (e) => {
            if (e.key === "Escape") {
                modal.classList.remove("active");
                modal.setAttribute('aria-hidden', 'true');
                if (openBtn) openBtn.focus();
            }
        });
    }

    // Close modal when clicking outside
    modal.addEventListener("click", (e) => {
        if (e.target === modal) {
            modal.classList.remove("active");
            modal.setAttribute('aria-hidden', 'true');
            if (openBtn) openBtn.focus();
        }
    });
});

