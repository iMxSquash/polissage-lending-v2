<header class="bg-light/80 dark:bg-dark/80 backdrop-blur-md shadow-sm border-b border-border dark:border-gray-700 fixed top-0 left-0 right-0 z-40 transition-colors duration-200 w-full">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="/" class="text-xl font-bold font-title text-dark dark:text-primary hover:text-primary-dark dark:hover:text-light transition-colors decoration-primary-dark">
                    Polissage Pro
                </a>
            </div>

            <!-- Navigation Desktop -->
            <div class="hidden md:flex items-center justify-center gap-6">
                <a href="/" class="text-dark dark:text-light hover:text-primary-dark dark:hover:text-primary px-3 py-2 text-sm font-medium transition-colors relative group no-underline nav-link">
                    Accueil
                    <span class="absolute inset-x-0 bottom-0 h-0.5 bg-dark dark:bg-primary transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></span>
                </a>
                <a href="/formations" class="text-dark dark:text-light hover:text-primary-dark dark:hover:text-primary px-3 py-2 text-sm font-medium transition-colors relative group no-underline nav-link">
                    Formations
                    <span class="absolute inset-x-0 bottom-0 h-0.5 bg-dark dark:bg-primary transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></span>
                </a>
                <a href="/articles" class="text-dark dark:text-light hover:text-primary-dark dark:hover:text-primary px-3 py-2 text-sm font-medium transition-colors relative group no-underline nav-link">
                    Articles
                    <span class="absolute inset-x-0 bottom-0 h-0.5 bg-dark dark:bg-primary transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></span>
                </a>
                <a href="/avis" class="text-dark dark:text-light hover:text-primary-dark dark:hover:text-primary px-3 py-2 text-sm font-medium transition-colors relative group no-underline nav-link">
                    Avis
                    <span class="absolute inset-x-0 bottom-0 h-0.5 bg-dark dark:bg-primary transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></span>
                </a>
                <a href="/contact" class="text-dark dark:text-light hover:text-primary-dark dark:hover:text-primary px-3 py-2 text-sm font-medium transition-colors relative group no-underline nav-link">
                    Contact
                    <span class="absolute inset-x-0 bottom-0 h-0.5 bg-dark dark:bg-primary transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></span>
                </a>
            </div>

            <!-- CTA Button Desktop + Theme Toggle -->
            <div class="hidden md:flex items-center space-x-4">
                <button id="themeToggle" class="theme-toggle-btn" aria-label="Changer de thème">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sun-icon lucide-sun theme-icon sun-icon">
                        <circle cx="12" cy="12" r="4" />
                        <path d="M12 2v2" />
                        <path d="M12 20v2" />
                        <path d="m4.93 4.93 1.41 1.41" />
                        <path d="m17.66 17.66 1.41 1.41" />
                        <path d="M2 12h2" />
                        <path d="M20 12h2" />
                        <path d="m6.34 17.66-1.41 1.41" />
                        <path d="m19.07 4.93-1.41 1.41" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-moon-icon lucide-moon theme-icon moon-icon" style="display: none;">
                        <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z" />
                    </svg>
                </button>
                <button class="btn btn-primary cta-button">
                    Inscription
                </button>
            </div>

            <!-- Menu Mobile -->
            <div class="md:hidden flex items-center space-x-4">
                <button id="themeToggleMobile" class="theme-toggle-btn mr-1" aria-label="Changer de thème">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sun-icon lucide-sun theme-icon sun-icon">
                        <circle cx="12" cy="12" r="4" />
                        <path d="M12 2v2" />
                        <path d="M12 20v2" />
                        <path d="m4.93 4.93 1.41 1.41" />
                        <path d="m17.66 17.66 1.41 1.41" />
                        <path d="M2 12h2" />
                        <path d="M20 12h2" />
                        <path d="m6.34 17.66-1.41 1.41" />
                        <path d="m19.07 4.93-1.41 1.41" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-moon-icon lucide-moon theme-icon moon-icon" style="display: none;">
                        <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z" />
                    </svg>
                </button>
                <button id="mobileMenuToggle" class="mobile-menu-btn" aria-label="Toggle menu">
                    <svg class="menu-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="4" x2="20" y1="6" y2="6" />
                        <line x1="4" x2="20" y1="12" y2="12" />
                        <line x1="4" x2="20" y1="18" y2="18" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Menu Mobile Overlay -->
    <div id="mobileMenuOverlay" class="md:hidden bg-light/90 dark:bg-dark/90 backdrop-blur-md border-t border-border dark:border-gray-700 shadow-lg absolute left-0 right-0 mobile-menu-overlay" style="display: none;">
        <div class="px-4 py-6 space-y-3 max-h-[80vh] overflow-y-auto">
            <a href="/" class="block px-3 py-2 text-base font-medium text-dark dark:text-light hover:text-primary-dark dark:hover:text-primary transition-colors mobile-nav-link">
                Accueil
            </a>
            <a href="/formations" class="block px-3 py-2 text-base font-medium text-dark dark:text-light hover:text-primary-dark dark:hover:text-primary transition-colors mobile-nav-link">
                Formations
            </a>
            <a href="/articles" class="block px-3 py-2 text-base font-medium text-dark dark:text-light hover:text-primary-dark dark:hover:text-primary transition-colors mobile-nav-link">
                Articles
            </a>
            <a href="/avis" class="block px-3 py-2 text-base font-medium text-dark dark:text-light hover:text-primary-dark dark:hover:text-primary transition-colors mobile-nav-link">
                Avis
            </a>
            <a href="/contact" class="block px-3 py-2 text-base font-medium text-dark dark:text-light hover:text-primary-dark dark:hover:text-primary transition-colors mobile-nav-link">
                Contact
            </a>
            <div class="pt-4">
                <button class="btn btn-primary w-full cta-button-mobile">
                    Inscription
                </button>
            </div>
        </div>
    </div>
</header>