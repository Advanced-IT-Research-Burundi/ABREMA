
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

