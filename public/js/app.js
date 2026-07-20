
// Script de gestion du modal
const searchModal = document.getElementById('searchModal');
const openSearchBtn = document.getElementById('openSearch');
const closeSearchBtn = document.getElementById('closeSearch');
const searchInput = document.getElementById('searchInput');

// Ouvrir le modal
if (openSearchBtn) {
    openSearchBtn.addEventListener('click', () => {
        searchModal.classList.add('active');
        setTimeout(() => {
            searchInput.focus();
        }, 100);
    });
}

// Fermer le modal
if (closeSearchBtn) {
    closeSearchBtn.addEventListener('click', () => {
        searchModal.classList.remove('active');
    });
}

// Fermer avec ESC
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && searchModal.classList.contains('active')) {
        searchModal.classList.remove('active');
    }
});

// Fermer en cliquant sur le fond
searchModal.addEventListener('click', (e) => {
    if (e.target === searchModal) {
        searchModal.classList.remove('active');
    }
});

// Gérer les suggestions
const suggestionTags = document.querySelectorAll('.suggestion-tag');
suggestionTags.forEach(tag => {
    tag.addEventListener('click', () => {
        searchInput.value = tag.textContent;
        searchInput.focus();
    });
});

// ============================================
// MOBILE MENU
// ============================================
const mobileMenuToggle = document.getElementById('mobileMenuToggle');
const navMenu = document.getElementById('navMenu');

if (mobileMenuToggle && navMenu) {
    mobileMenuToggle.addEventListener('click', () => {
        mobileMenuToggle.classList.toggle('active');
        navMenu.classList.toggle('active');
        document.body.style.overflow = navMenu.classList.contains('active') ? 'hidden' : '';
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.navbar') &&
            !e.target.closest('.mobile-menu-toggle') &&
            navMenu.classList.contains('active')) {
            mobileMenuToggle.classList.remove('active');
            navMenu.classList.remove('active');
            document.body.style.overflow = '';
        }
    });
}

// ============================================
// MOBILE DROPDOWN
// ============================================
if (window.innerWidth <= 992) {
    const dropdowns = document.querySelectorAll('.dropdown');

    dropdowns.forEach(dropdown => {
        const link = dropdown.querySelector('> a');

        if (link) {
            link.addEventListener('click', (e) => {
                e.preventDefault();

                // Close other dropdowns
                dropdowns.forEach(other => {
                    if (other !== dropdown) {
                        other.classList.remove('active');
                    }
                });

                dropdown.classList.toggle('active');
            });
        }
    });

    // Handle submenu clicks
    const submenus = document.querySelectorAll('.has-submenu');

    submenus.forEach(submenu => {
        const link = submenu.querySelector('> a');

        if (link) {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();

                // Close other submenus
                submenus.forEach(other => {
                    if (other !== submenu) {
                        other.classList.remove('active');
                    }
                });

                submenu.classList.toggle('active');
            });
        }
    });
}

// ============================================
// SCROLL TO TOP
// ============================================
const scrollTopBtn = document.getElementById('scrollTop');

if (scrollTopBtn) {
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            scrollTopBtn.classList.add('active');
        } else {
            scrollTopBtn.classList.remove('active');
        }
    });

    scrollTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
}

// ============================================
// STICKY NAVBAR
// ============================================
const header = document.querySelector('.header');
let lastScroll = 0;

window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset;

    if (currentScroll > 100) {
        header.style.boxShadow = '0 4px 12px rgba(0,0,0,0.15)';
    } else {
        header.style.boxShadow = '0 2px 4px rgba(0,0,0,0.08)';
    }

    lastScroll = currentScroll;
});

// ============================================
// ACTIVE NAV LINK
// ============================================
const currentPath = window.location.pathname;
const navLinks = document.querySelectorAll('.nav-menu a');

navLinks.forEach(link => {
    if (link.getAttribute('href') === currentPath) {
        link.classList.add('active');
    }
});

// ============================================
// ANIMATION ON SCROLL
// ============================================
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

// Observe elements with fade-in class
document.addEventListener('DOMContentLoaded', () => {
    const fadeElements = document.querySelectorAll('.fade-in');
    fadeElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });
});

// ============================================
// LOADING STATE
// ============================================
window.addEventListener('load', () => {
    document.body.classList.add('loaded');
});

// ============================================
// HANDLE RESIZE
// ============================================
let resizeTimer;
window.addEventListener('resize', () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => {
        // Reset mobile menu on desktop
        if (window.innerWidth > 992) {
            if (navMenu) navMenu.classList.remove('active');
            if (mobileMenuToggle) mobileMenuToggle.classList.remove('active');
            document.body.style.overflow = '';
        }
    }, 250);
});

const slider = document.getElementById("partnersSlider");
const step = 300; // distance de défilement

const prevBtn = document.querySelector(".prev-btn");
const nextBtn = document.querySelector(".next-btn");

nextBtn.addEventListener("click", () => {
    const maxScroll = slider.scrollWidth - slider.clientWidth;

    if (slider.scrollLeft >= maxScroll) {
        slider.scrollLeft = 0; // retour au début
    } else {
        slider.scrollLeft += step;
    }
});

prevBtn.addEventListener("click", () => {
    if (slider.scrollLeft <= 0) {
        slider.scrollLeft = slider.scrollWidth; // aller à la fin
    } else {
        slider.scrollLeft -= step;
    }
});

// ============================================
// DOCUMENT SHARING (COPY LINK)
// ============================================
function copyToClipboard(text, btn) {
    // Construct full URL if it's relative
    let fullUrl = text;
    if (text.startsWith('/') || !text.startsWith('http')) {
        const origin = window.location.origin;
        // Handle cases where text might already be a full path from asset()
        if (!text.startsWith(origin)) {
            const path = text.startsWith('/') ? text : '/' + text;
            fullUrl = origin + path;
        }
    }

    navigator.clipboard.writeText(fullUrl).then(() => {
        // Success feedback
        const originalContent = btn.innerHTML;
        const previousColors = {
            border: btn.style.borderColor,
            color: btn.style.color,
            bg: btn.style.backgroundColor
        };
        
        btn.innerHTML = '<i class="fas fa-check"></i> Copié !';
        btn.style.borderColor = '#28a745';
        btn.style.color = '#fff';
        btn.style.backgroundColor = '#28a745';
        
        setTimeout(() => {
            btn.innerHTML = originalContent;
            btn.style.borderColor = previousColors.border;
            btn.style.color = previousColors.color;
            btn.style.backgroundColor = previousColors.bg;
        }, 2000);
    }).catch(err => {
        console.error('Failed to copy: ', err);
    });
}
window.copyToClipboard = copyToClipboard;
