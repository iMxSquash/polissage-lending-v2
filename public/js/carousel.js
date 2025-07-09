// Carousel functionality for reviews

class ReviewCarousel {
    constructor(container) {
        this.container = container;
        this.currentIndex = 0;
        this.autoplayInterval = null;
        this.init();
    }

    init() {
        this.createNavigation();
        this.startAutoplay();
        this.addEventListeners();
    }

    createNavigation() {
        const nav = document.createElement('div');
        nav.className = 'carousel-nav';

        const prevBtn = document.createElement('button');
        prevBtn.innerHTML = '‹';
        prevBtn.className = 'carousel-btn carousel-prev';
        prevBtn.onclick = () => this.prev();

        const nextBtn = document.createElement('button');
        nextBtn.innerHTML = '›';
        nextBtn.className = 'carousel-btn carousel-next';
        nextBtn.onclick = () => this.next();

        nav.appendChild(prevBtn);
        nav.appendChild(nextBtn);

        this.container.parentNode.insertBefore(nav, this.container.nextSibling);
    }

    next() {
        const cards = this.container.children;
        if (cards.length === 0) return;

        this.currentIndex = (this.currentIndex + 1) % cards.length;
        this.scrollToCard();
    }

    prev() {
        const cards = this.container.children;
        if (cards.length === 0) return;

        this.currentIndex = this.currentIndex === 0 ? cards.length - 1 : this.currentIndex - 1;
        this.scrollToCard();
    }

    scrollToCard() {
        const cards = this.container.children;
        if (cards[this.currentIndex]) {
            cards[this.currentIndex].scrollIntoView({
                behavior: 'smooth',
                block: 'nearest',
                inline: 'center'
            });
        }
    }

    startAutoplay() {
        this.autoplayInterval = setInterval(() => {
            this.next();
        }, 5000);
    }

    stopAutoplay() {
        if (this.autoplayInterval) {
            clearInterval(this.autoplayInterval);
        }
    }

    addEventListeners() {
        this.container.addEventListener('mouseenter', () => this.stopAutoplay());
        this.container.addEventListener('mouseleave', () => this.startAutoplay());

        // Touch events for mobile
        let touchStartX = 0;
        let touchEndX = 0;

        this.container.addEventListener('touchstart', (e) => {
            touchStartX = e.touches[0].clientX;
        });

        this.container.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].clientX;
            this.handleSwipe();
        });
    }

    handleSwipe() {
        const swipeThreshold = 50;
        const diff = touchStartX - touchEndX;

        if (Math.abs(diff) > swipeThreshold) {
            if (diff > 0) {
                this.next();
            } else {
                this.prev();
            }
        }
    }
}

// Initialize carousel when DOM is loaded
document.addEventListener('DOMContentLoaded', function () {
    const reviewsCarousel = document.getElementById('reviewsCarousel');
    if (reviewsCarousel) {
        new ReviewCarousel(reviewsCarousel);
    }
});

// Add carousel navigation styles
const carouselStyles = `
    .carousel-nav {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-top: 2rem;
    }
    
    .carousel-btn {
        background: #007bff;
        color: white;
        border: none;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        font-size: 1.5rem;
        cursor: pointer;
        transition: background 0.3s;
    }
    
    .carousel-btn:hover {
        background: #0056b3;
    }
    
    @media (max-width: 768px) {
        .carousel-btn {
            width: 40px;
            height: 40px;
            font-size: 1.2rem;
        }
    }
`;

const styleSheet = document.createElement('style');
styleSheet.textContent = carouselStyles;
document.head.appendChild(styleSheet);
