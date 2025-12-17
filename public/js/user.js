
// ---------- Slider simple (accessible + responsive) ----------
(function () {
    const slides = Array.from(document.querySelectorAll('.slide'));
    const prev = document.getElementById('prev');
    const next = document.getElementById('next');
    let idx = 0;
    let timeoutId = null;

    function show(i) {
        slides.forEach(s => s.classList.remove('active'));
        slides[i].classList.add('active');
        idx = i;
    }

    function nextSlide() {
        show((idx + 1) % slides.length);
    }

    function prevSlide() {
        show((idx - 1 + slides.length) % slides.length);
    }

    if (next) next.addEventListener('click', () => {
        nextSlide();
        resetAuto();
    });
    if (prev) prev.addEventListener('click', () => {
        prevSlide();
        resetAuto();
    });

    // Auto play
    function startAuto() {
        timeoutId = setInterval(nextSlide, 6000);
    }

    function resetAuto() {
        clearInterval(timeoutId);
        startAuto();
    }
    startAuto();

    // Mobile menu toggle
    const burger = document.querySelector('.burger');
    const mobileMenu = document.getElementById('mobileMenu');
    burger.addEventListener('click', () => {
        const expanded = burger.getAttribute('aria-expanded') === 'true';
        burger.setAttribute('aria-expanded', String(!expanded));
        if (expanded) {
            mobileMenu.style.display = 'none'
        } else {
            mobileMenu.style.display = 'block'
        }
    });

    // small: reveal animations
    const io = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if (e.isIntersecting) e.target.classList.add('inview');
        })
    }, {
        threshold: 0.12
    });
    document.querySelectorAll('.fade-up').forEach(el => io.observe(el));

})();
// Dropdown submenu handling

document.querySelectorAll('.dropdown-submenu .dropdown-toggle').forEach(function (element) {
    element.addEventListener('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        this.parentElement.querySelector('.dropdown-menu').classList.toggle('show');

    });
});


const slides = document.querySelectorAll('.hero-slide');
const dots = document.querySelectorAll('.slider-dot');
const prevBtn = document.querySelector('.prev-arrow');
const nextBtn = document.querySelector('.next-arrow');

let currentSlide = 0;
let slideInterval;

function showSlide(n) {
    slides.forEach(slide => slide.classList.remove('active'));
    dots.forEach(dot => dot.classList.remove('active'));

    slides[n].classList.add('active');
    dots[n].classList.add('active');
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
}

function prevSlide() {
    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
    showSlide(currentSlide);
}

function startAutoSlide() {
    slideInterval = setInterval(nextSlide, 5000);
}

function stopAutoSlide() {
    clearInterval(slideInterval);
}

// Bouton suivant
nextBtn.addEventListener('click', () => {
    stopAutoSlide();
    nextSlide();
    startAutoSlide();
});

// Bouton précédent
prevBtn.addEventListener('click', () => {
    stopAutoSlide();
    prevSlide();
    startAutoSlide();
});

// Dots
dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
        stopAutoSlide();
        currentSlide = index;
        showSlide(currentSlide);
        startAutoSlide();
    });
});

// Pause au hover
const heroSlider = document.querySelector('.hero-slider');

heroSlider.addEventListener('mouseenter', stopAutoSlide);
heroSlider.addEventListener('mouseleave', startAutoSlide);

// Start
startAutoSlide();

