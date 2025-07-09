// Main JavaScript file for interactions and animations

// Mobile menu toggle
function toggleMobileMenu() {
    const navMenu = document.querySelector('.nav-menu');
    navMenu.classList.toggle('active');
}

// Smooth scroll to section
function scrollToSection(sectionId) {
    const section = document.getElementById(sectionId);
    if (section) {
        const headerHeight = document.querySelector('.header').offsetHeight;
        const elementPosition = section.offsetTop - headerHeight;

        window.scrollTo({
            top: elementPosition,
            behavior: 'smooth'
        });
    }
}

// Formation enrollment
function enrollInFormation(formationId) {
    console.log('Inscription à la formation:', formationId);
    // Ici vous pouvez ajouter la logique d'inscription
    alert(`Inscription à la formation ${formationId} en cours...`);
}

// Read article
function readArticle(articleId) {
    console.log('Lire l\'article:', articleId);
    // Ici vous pouvez ajouter la navigation vers l'article
    alert(`Ouverture de l'article ${articleId}...`);
}

// Animate stats numbers
function animateStats() {
    const statNumbers = document.querySelectorAll('.stat-number');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = entry.target;
                const finalValue = target.textContent;
                const isPercentage = finalValue.includes('%');
                const isRating = finalValue.includes('/');
                const isPlus = finalValue.includes('+');

                let numericValue = parseInt(finalValue.replace(/[^0-9.]/g, ''));

                animateNumber(target, 0, numericValue, 2000, isPercentage, isRating, isPlus);
                observer.unobserve(target);
            }
        });
    }, { threshold: 0.5 });

    statNumbers.forEach(stat => observer.observe(stat));
}

function animateNumber(element, start, end, duration, isPercentage, isRating, isPlus) {
    const startTime = performance.now();

    function update(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);

        const currentValue = Math.floor(start + (end - start) * easeOutQuart(progress));

        if (isRating) {
            element.textContent = (currentValue / 10).toFixed(1) + '/5';
        } else if (isPercentage) {
            element.textContent = currentValue + '%';
        } else if (isPlus) {
            element.textContent = currentValue + '+';
        } else {
            element.textContent = currentValue;
        }

        if (progress < 1) {
            requestAnimationFrame(update);
        }
    }

    requestAnimationFrame(update);
}

function easeOutQuart(t) {
    return 1 - Math.pow(1 - t, 4);
}

// Animate elements on scroll
function animateOnScroll() {
    const animatedElements = document.querySelectorAll('.formation-card, .article-card, .google-review-card, .gallery-item');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, index * 100);
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });

    animatedElements.forEach(element => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(20px)';
        element.style.transition = 'all 0.6s ease';
        observer.observe(element);
    });
}

// Auto-scroll carousels
function initCarousels() {
    const carousels = [
        { element: document.getElementById('formationsCarousel'), delay: 4000 },
        { element: document.getElementById('reviewsCarousel'), delay: 5000 },
        { element: document.getElementById('galleryCarousel'), delay: 3500 }
    ];

    carousels.forEach(carousel => {
        if (carousel.element) {
            startAutoScroll(carousel.element, carousel.delay);
        }
    });
}

function startAutoScroll(carousel, delay) {
    setInterval(() => {
        const scrollWidth = carousel.scrollWidth;
        const clientWidth = carousel.clientWidth;
        const currentScroll = carousel.scrollLeft;

        if (currentScroll + clientWidth >= scrollWidth) {
            carousel.scrollTo({ left: 0, behavior: 'smooth' });
        } else {
            carousel.scrollBy({ left: clientWidth, behavior: 'smooth' });
        }
    }, delay);
}

// Add scroll indicators for carousels
function addScrollIndicators() {
    const carousels = document.querySelectorAll('.formations-carousel, .reviews-carousel, .gallery-carousel');

    carousels.forEach(carousel => {
        // Add scroll left/right buttons if needed
        carousel.addEventListener('wheel', (e) => {
            e.preventDefault();
            carousel.scrollBy({
                left: e.deltaY > 0 ? 200 : -200,
                behavior: 'smooth'
            });
        });
    });
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function () {
    // Initialize all features
    animateOnScroll();
    animateStats();
    initCarousels();
    addScrollIndicators();

    // Close mobile menu when clicking on links
    const navLinks = document.querySelectorAll('.nav-menu a');
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            const navMenu = document.querySelector('.nav-menu');
            navMenu.classList.remove('active');
        });
    });

    // Header scroll effect
    window.addEventListener('scroll', () => {
        const header = document.querySelector('.header');
        if (window.scrollY > 100) {
            header.style.backgroundColor = 'rgba(255, 255, 255, 0.95)';
            header.style.backdropFilter = 'blur(10px)';
        } else {
            header.style.backgroundColor = '#ffffff';
            header.style.backdropFilter = 'none';
        }
    });

    // Smooth reveal animations for hero section
    const heroElements = document.querySelectorAll('.hero-title, .hero-subtitle, .hero-buttons');
    heroElements.forEach((element, index) => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(30px)';
        element.style.transition = 'all 0.8s ease';

        setTimeout(() => {
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
        }, 200 + index * 200);
    });
});
