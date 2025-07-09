// Main JavaScript - Mobile First with Dark Mode
class App {
    constructor() {
        this.init();
    }

    init() {
        this.initTheme();
        this.initMobileMenu();
        this.initCarousels();
        this.initAnimations();
        this.initScrollEffects();
        this.bindEvents();
    }

    // Theme Management
    initTheme() {
        const themeToggle = document.getElementById('themeToggle');
        const themeToggleMobile = document.getElementById('themeToggleMobile');

        // Check stored theme or system preference
        const storedTheme = localStorage.getItem('theme');
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

        const isDark = storedTheme === 'dark' || (!storedTheme && prefersDark);
        this.updateThemeUI(isDark);

        if (themeToggle) {
            themeToggle.addEventListener('click', () => this.toggleTheme());
        }

        if (themeToggleMobile) {
            themeToggleMobile.addEventListener('click', () => this.toggleTheme());
        }
    }

    toggleTheme() {
        const isDark = document.body.classList.contains('dark');

        if (isDark) {
            document.body.classList.remove('dark');
            localStorage.setItem('theme', 'light');
            this.updateThemeUI(false);
        } else {
            document.body.classList.add('dark');
            localStorage.setItem('theme', 'dark');
            this.updateThemeUI(true);
        }
    }

    updateThemeUI(isDark) {
        if (isDark) {
            document.body.classList.add('dark');
        } else {
            document.body.classList.remove('dark');
        }

        // Update theme toggle icons
        const updateIcons = (containerId) => {
            const container = document.getElementById(containerId);
            if (!container) return;

            const sunIcon = container.querySelector('.sun-icon');
            const moonIcon = container.querySelector('.moon-icon');

            if (sunIcon && moonIcon) {
                if (isDark) {
                    // Dark mode: show sun icon
                    sunIcon.style.display = 'block';
                    moonIcon.style.display = 'none';
                } else {
                    // Light mode: show moon icon
                    sunIcon.style.display = 'none';
                    moonIcon.style.display = 'block';
                }
            }
        };

        updateIcons('themeToggle');
        updateIcons('themeToggleMobile');
    }

    // Mobile Menu Management
    initMobileMenu() {
        this.mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
        this.mobileMenuToggle = document.getElementById('mobileMenuToggle');

        if (!this.mobileMenuOverlay || !this.mobileMenuToggle) return;

        // Add event listener for mobile menu toggle
        this.mobileMenuToggle.addEventListener('click', () => this.toggleMobileMenu());

        // Add event listeners for mobile nav links
        const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');
        mobileNavLinks.forEach(link => {
            link.addEventListener('click', () => this.closeMobileMenu());
        });

        // Add event listeners for CTA buttons
        const ctaButtons = document.querySelectorAll('.cta-button, .cta-button-mobile');
        ctaButtons.forEach(button => {
            button.addEventListener('click', () => {
                console.log('CTA clicked - Inscription');
                this.closeMobileMenu();
            });
        });
    }

    toggleMobileMenu() {
        const isVisible = this.mobileMenuOverlay.style.display !== 'none';

        if (isVisible) {
            this.closeMobileMenu();
        } else {
            this.openMobileMenu();
        }
    } openMobileMenu() {
        this.mobileMenuOverlay.classList.add('active');
        this.mobileMenuOverlay.style.display = 'block';

        // Force a reflow to ensure the display change takes effect
        this.mobileMenuOverlay.offsetHeight;

        // Add smooth animation
        setTimeout(() => {
            this.mobileMenuOverlay.style.opacity = '1';
            this.mobileMenuOverlay.style.height = 'auto';
        }, 10);

        document.body.style.overflow = 'hidden';
    }

    closeMobileMenu() {
        this.mobileMenuOverlay.classList.remove('active');
        this.mobileMenuOverlay.style.opacity = '0';
        this.mobileMenuOverlay.style.height = '0';

        setTimeout(() => {
            this.mobileMenuOverlay.style.display = 'none';
        }, 300);

        document.body.style.overflow = '';
    }

    scrollToSection(sectionId) {
        const section = document.getElementById(sectionId);
        if (section) {
            const headerHeight = 64; // 4rem = 64px
            const elementPosition = section.offsetTop - headerHeight;

            window.scrollTo({
                top: elementPosition,
                behavior: 'smooth'
            });
        }
    }

    // Carousel Management
    initCarousels() {
        this.carousels = {
            formations: this.createCarousel('formationsCarousel', { autoplay: true, delay: 4000 }),
            reviews: this.createCarousel('reviewsCarousel', { autoplay: true, delay: 5000 }),
            gallery: this.createCarousel('galleryCarousel', { autoplay: true, delay: 3500 })
        };
    }

    createCarousel(containerId, options = {}) {
        const container = document.getElementById(containerId);
        if (!container) return null;

        const track = container.querySelector('.carousel-track');
        const items = container.querySelectorAll('.carousel-item');
        const dotsContainer = container.querySelector('.carousel-dots');
        const progressBar = container.querySelector('.carousel-progress-bar');

        if (!track || items.length === 0) return null;

        const carousel = {
            container,
            track,
            items: Array.from(items),
            currentIndex: 0,
            itemsPerView: this.getItemsPerView(),
            autoplayInterval: null,
            isHovered: false,
            ...options
        };

        // Create dots
        if (dotsContainer) {
            this.createDots(carousel, dotsContainer);
        }

        // Setup autoplay
        if (carousel.autoplay) {
            this.setupAutoplay(carousel, progressBar);
        }

        // Setup touch/mouse events
        this.setupCarouselEvents(carousel);

        // Update on resize
        window.addEventListener('resize', () => {
            carousel.itemsPerView = this.getItemsPerView();
            this.updateCarousel(carousel);
        });

        return carousel;
    }

    getItemsPerView() {
        if (window.innerWidth >= 1024) return 3;
        if (window.innerWidth >= 768) return 2;
        return 1;
    }

    createDots(carousel, dotsContainer) {
        const totalSlides = Math.ceil(carousel.items.length / carousel.itemsPerView);

        dotsContainer.innerHTML = '';

        for (let i = 0; i < totalSlides; i++) {
            const dot = document.createElement('button');
            dot.className = `carousel-dot ${i === 0 ? 'active' : ''}`;
            dot.setAttribute('aria-label', `Aller au slide ${i + 1}`);
            dot.addEventListener('click', () => this.goToSlide(carousel, i));
            dotsContainer.appendChild(dot);
        }

        carousel.dots = dotsContainer.querySelectorAll('.carousel-dot');
    }

    setupAutoplay(carousel, progressBar) {
        const startAutoplay = () => {
            if (carousel.autoplayInterval) return;

            let progress = 0;
            const updateInterval = 50;
            const totalTime = carousel.delay;
            const increment = (100 / totalTime) * updateInterval;

            carousel.autoplayInterval = setInterval(() => {
                if (carousel.isHovered) return;

                progress += increment;

                if (progressBar) {
                    progressBar.style.width = `${progress}%`;
                }

                if (progress >= 100) {
                    progress = 0;
                    this.nextSlide(carousel);
                    if (progressBar) {
                        progressBar.style.width = '0%';
                    }
                }
            }, updateInterval);
        };

        const stopAutoplay = () => {
            if (carousel.autoplayInterval) {
                clearInterval(carousel.autoplayInterval);
                carousel.autoplayInterval = null;
            }
            if (progressBar) {
                progressBar.style.width = '0%';
            }
        };

        // Mouse events
        carousel.container.addEventListener('mouseenter', () => {
            carousel.isHovered = true;
            stopAutoplay();
        });

        carousel.container.addEventListener('mouseleave', () => {
            carousel.isHovered = false;
            startAutoplay();
        });

        startAutoplay();
    }

    setupCarouselEvents(carousel) {
        let startX = 0;
        let currentX = 0;
        let isDragging = false;

        const handleStart = (e) => {
            isDragging = true;
            startX = e.type === 'mousedown' ? e.clientX : e.touches[0].clientX;
            carousel.track.style.cursor = 'grabbing';
        };

        const handleMove = (e) => {
            if (!isDragging) return;
            e.preventDefault();
            currentX = e.type === 'mousemove' ? e.clientX : e.touches[0].clientX;
        };

        const handleEnd = () => {
            if (!isDragging) return;
            isDragging = false;
            carousel.track.style.cursor = '';

            const deltaX = currentX - startX;
            const threshold = 50;

            if (Math.abs(deltaX) > threshold) {
                if (deltaX > 0) {
                    this.previousSlide(carousel);
                } else {
                    this.nextSlide(carousel);
                }
            }
        };

        // Mouse events
        carousel.track.addEventListener('mousedown', handleStart);
        document.addEventListener('mousemove', handleMove);
        document.addEventListener('mouseup', handleEnd);

        // Touch events
        carousel.track.addEventListener('touchstart', handleStart, { passive: true });
        carousel.track.addEventListener('touchmove', handleMove, { passive: false });
        carousel.track.addEventListener('touchend', handleEnd, { passive: true });

        // Wheel events
        carousel.track.addEventListener('wheel', (e) => {
            e.preventDefault();
            if (e.deltaY > 0) {
                this.nextSlide(carousel);
            } else {
                this.previousSlide(carousel);
            }
        });
    }

    updateCarousel(carousel) {
        const totalSlides = Math.ceil(carousel.items.length / carousel.itemsPerView);

        // Ensure current index is valid
        if (carousel.currentIndex >= totalSlides) {
            carousel.currentIndex = totalSlides - 1;
        }

        // Update transform
        const translateX = -(carousel.currentIndex * (100 / carousel.itemsPerView));
        carousel.track.style.transform = `translateX(${translateX}%)`;

        // Update dots
        if (carousel.dots) {
            carousel.dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === carousel.currentIndex);
            });
        }
    }

    goToSlide(carousel, index) {
        const totalSlides = Math.ceil(carousel.items.length / carousel.itemsPerView);
        carousel.currentIndex = Math.max(0, Math.min(index, totalSlides - 1));
        this.updateCarousel(carousel);
    }

    nextSlide(carousel) {
        const totalSlides = Math.ceil(carousel.items.length / carousel.itemsPerView);
        carousel.currentIndex = (carousel.currentIndex + 1) % totalSlides;
        this.updateCarousel(carousel);
    }

    previousSlide(carousel) {
        const totalSlides = Math.ceil(carousel.items.length / carousel.itemsPerView);
        carousel.currentIndex = carousel.currentIndex === 0 ? totalSlides - 1 : carousel.currentIndex - 1;
        this.updateCarousel(carousel);
    }

    // Animations
    initAnimations() {
        this.animateStats();
        this.observeElements();
    }

    animateStats() {
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
                    if (isRating) numericValue *= 10; // Convert 4.9 to 49 for animation

                    this.animateNumber(target, 0, numericValue, 2000, isPercentage, isRating, isPlus);
                    observer.unobserve(target);
                }
            });
        }, { threshold: 0.5 });

        statNumbers.forEach(stat => observer.observe(stat));
    }

    animateNumber(element, start, end, duration, isPercentage, isRating, isPlus) {
        const startTime = performance.now();

        const update = (currentTime) => {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);

            const currentValue = Math.floor(start + (end - start) * this.easeOutQuart(progress));

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
        };

        requestAnimationFrame(update);
    }

    easeOutQuart(t) {
        return 1 - Math.pow(1 - t, 4);
    }

    observeElements() {
        const animatedElements = document.querySelectorAll('.card, .stat-item');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.classList.add('animate-fade-in');
                    }, index * 100);
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        animatedElements.forEach(element => observer.observe(element));
    }

    // Scroll Effects
    initScrollEffects() {
        this.initHeaderScroll();
        this.initSmoothScroll();
    }

    initHeaderScroll() {
        const header = document.querySelector('.header');
        if (!header) return;

        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) {
                header.style.background = 'rgba(255, 255, 255, 0.95)';
                header.style.backdropFilter = 'blur(20px)';
            } else {
                header.style.background = 'rgba(255, 255, 255, 0.8)';
                header.style.backdropFilter = 'blur(10px)';
            }
        });
    }

    initSmoothScroll() {
        // Global scroll function
        window.scrollToSection = (sectionId) => {
            const section = document.getElementById(sectionId);
            if (section) {
                const headerHeight = document.querySelector('.header').offsetHeight;
                const elementPosition = section.offsetTop - headerHeight;

                window.scrollTo({
                    top: elementPosition,
                    behavior: 'smooth'
                });
            }
        };
    }

    // Event Bindings
    bindEvents() {
        // Formation enrollment
        window.enrollInFormation = (formationId) => {
            console.log('Inscription à la formation:', formationId);
            this.showNotification('Demande d\'inscription envoyée avec succès !');
            // Here you could add actual enrollment logic
        };

        // Global functions for navigation
        window.scrollToSection = (sectionId) => this.scrollToSection(sectionId);
    }

    handleResize() {
        // Update carousels on resize
        Object.values(this.carousels).forEach(carousel => {
            if (carousel) {
                carousel.itemsPerView = this.getItemsPerView();
                this.updateCarousel(carousel);
            }
        });

        // Close mobile menu on resize to desktop
        if (window.innerWidth >= 768) {
            this.closeMobileMenu();
        }
    }

    // Utility Methods
    showNotification(message, type = 'info') {
        // Simple notification system
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.textContent = message;
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: var(--color-primary);
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 0.5rem;
            box-shadow: var(--shadow-lg);
            z-index: 9999;
            animation: slideIn 0.3s ease;
        `;

        document.body.appendChild(notification);

        setTimeout(() => {
            notification.style.animation = 'slideOut 0.3s ease forwards';
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }
}

// Initialize app when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    window.app = new App();

    // Add some CSS animations
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        @keyframes slideOut {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(100%); opacity: 0; }
        }
    `;
    document.head.appendChild(style);
});
