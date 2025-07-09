<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="/css/style-mobile-first.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="transition-colors duration-300">
    <script>
        // Initialize theme immediately to prevent flash
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'dark' || (!savedTheme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.body.classList.add('dark');
        }
    </script>
    <?php include SRC_PATH . '/views/components/header.php'; ?>

    <main class="min-h-screen">
        <div class="flex flex-col gap-20">
            <!-- Hero Section -->
            <section class="hero-section">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center">
                        <h1 class="hero-title">
                            Formation en Polissage
                            <span class="text-yellow-accent">Automobile</span>
                        </h1>
                        <p class="hero-subtitle">
                            Apprenez les techniques professionnelles de polissage avec nos experts certifiés.
                            De débutant à professionnel en quelques semaines.
                        </p>
                        <div class="hero-buttons">
                            <button class="btn-hero-primary" onclick="scrollToSection('formations')">
                                Voir les formations
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m9 18 6-6-6-6" />
                                </svg>
                            </button>
                            <button class="btn-hero-outline" onclick="scrollToSection('contact')">
                                Contactez-nous
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Stats Section -->
            <section class="stats-section">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="stats-grid">
                        <div class="stat-item">
                            <div class="stat-icon bg-blue-light">
                                <i class="fas fa-users text-blue-600"></i>
                            </div>
                            <h3 class="stat-number">500+</h3>
                            <p class="stat-label">Étudiants formés</p>
                        </div>
                        <div class="stat-item">
                            <div class="stat-icon bg-yellow-light">
                                <i class="fas fa-award text-yellow-600"></i>
                            </div>
                            <h3 class="stat-number">95%</h3>
                            <p class="stat-label">Taux de réussite</p>
                        </div>
                        <div class="stat-item">
                            <div class="stat-icon bg-green-light">
                                <i class="fas fa-star text-green-600"></i>
                            </div>
                            <h3 class="stat-number">4.9/5</h3>
                            <p class="stat-label">Note moyenne</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Formations Section -->
            <section id="formations" class="formations-section">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="section-header">
                        <h2 class="section-title">Nos Formations</h2>
                        <p class="section-subtitle">
                            Découvrez nos programmes de formation adaptés à tous les niveaux.
                        </p>
                    </div>

                    <div class="carousel-container" id="formationsCarousel" data-autoplay="true" data-delay="4000">
                        <div class="carousel-track-container">
                            <div class="carousel-track">
                                <?php if (!empty($courses)): ?>
                                    <?php foreach ($courses as $index => $course): ?>
                                        <div class="carousel-item">
                                            <div class="carousel-card-container">
                                                <?php
                                                $isFeatured = $index === 0;
                                                include SRC_PATH . '/views/components/formation-card.php';
                                                ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="carousel-item">
                                        <div class="carousel-card-container">
                                            <div class="no-content">Aucune formation disponible</div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="carousel-controls">
                            <div class="carousel-dots"></div>
                            <div class="carousel-progress">
                                <div class="carousel-progress-bar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Articles Section -->
            <section id="articles" class="articles-section">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="section-header text-center mb-12">
                        <h2 class="text-3xl font-bold font-title text-dark dark:text-light mb-4">Derniers Articles</h2>
                        <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                            Conseils, astuces et actualités du monde du polissage automobile.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <?php if (!empty($articles)): ?>
                            <?php foreach ($articles as $index => $article): ?>
                                <div class="article-card-wrapper">
                                    <?php
                                    $isFeatured = $index === 0;
                                    include SRC_PATH . '/views/components/article-card.php';
                                    ?>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-span-full text-center py-12">
                                <div class="text-gray-500 dark:text-gray-400">Aucun article disponible</div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>

            <!-- Avis Google Section -->
            <section id="avis" class="reviews-section">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="section-header">
                        <h2 class="section-title">Ce que disent nos clients</h2>
                        <p class="section-subtitle">
                            Découvrez les témoignages de nos anciens étudiants.
                        </p>
                    </div>

                    <div class="carousel-container" id="reviewsCarousel" data-autoplay="true" data-delay="5000">
                        <div class="carousel-track-container">
                            <div class="carousel-track">
                                <?php if (!empty($reviews)): ?>
                                    <?php foreach ($reviews as $index => $review): ?>
                                        <div class="carousel-item">
                                            <div class="carousel-card-container">
                                                <?php
                                                $isFeatured = $index === 0;
                                                include SRC_PATH . '/views/components/google-review-card.php';
                                                ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="carousel-item">
                                        <div class="carousel-card-container">
                                            <div class="no-content">Aucun avis disponible</div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="carousel-controls">
                            <div class="carousel-dots"></div>
                            <div class="carousel-progress">
                                <div class="carousel-progress-bar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Galerie Photos Section -->
            <section class="gallery-section">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="section-header">
                        <h2 class="section-title">Notre Galerie</h2>
                        <p class="section-subtitle">
                            Découvrez en images nos ateliers, techniques et réalisations.
                        </p>
                    </div>

                    <div class="carousel-container" id="galleryCarousel" data-autoplay="true" data-delay="3500">
                        <div class="carousel-track-container">
                            <div class="carousel-track">
                                <?php if (!empty($gallery)): ?>
                                    <?php foreach ($gallery as $item): ?>
                                        <div class="carousel-item">
                                            <div class="carousel-card-container">
                                                <div class="gallery-item">
                                                    <div class="gallery-image-wrapper">
                                                        <img src="<?php echo htmlspecialchars($item['imageUrl']); ?>"
                                                            alt="<?php echo htmlspecialchars($item['title']); ?>"
                                                            class="gallery-image">
                                                        <div class="gallery-overlay">
                                                            <h3 class="gallery-title"><?php echo htmlspecialchars($item['title']); ?></h3>
                                                            <p class="gallery-description"><?php echo htmlspecialchars($item['description']); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="carousel-item">
                                        <div class="carousel-card-container">
                                            <div class="no-content">Aucune image disponible</div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="carousel-controls">
                            <div class="carousel-dots"></div>
                            <div class="carousel-progress">
                                <div class="carousel-progress-bar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA Section -->
            <section class="cta-section">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <h2 class="cta-title">
                        Prêt à commencer votre formation ?
                    </h2>
                    <p class="cta-subtitle">
                        Rejoignez-nous dès maintenant et devenez un expert en polissage automobile.
                    </p>
                    <button class="btn btn-cta" onclick="scrollToSection('contact')">
                        S'inscrire maintenant
                        <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </section>
        </div>
    </main>

    <?php include SRC_PATH . '/views/components/footer.php'; ?>

    <script src="/js/main-complete.js"></script>
</body>

</html>