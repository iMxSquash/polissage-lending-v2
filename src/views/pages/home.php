<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="transition-colors duration-300 bg-gray-50 dark:bg-gray-900">
    <script>
        // Initialize theme immediately to prevent flash
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'dark' || (!savedTheme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.body.classList.add('dark');
        }
    </script>
    <?php include SRC_PATH . '/views/components/header.php'; ?>

    <main class="min-h-screen bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col gap-20">
            <!-- Hero Section -->
            <section class="bg-gradient-to-br from-blue-600 to-blue-800 text-white py-16 mt-16 text-center">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center">
                        <h1 class="text-4xl md:text-6xl font-bold font-title mb-6 leading-tight text-light">
                            Formation en Polissage
                            <span class="text-yellow-400">Automobile</span>
                        </h1>
                        <p class="text-lg md:text-xl text-blue-100 mb-8 max-w-3xl mx-auto leading-relaxed">
                            Apprenez les techniques professionnelles de polissage avec nos experts certifiés.
                            De débutant à professionnel en quelques semaines.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mt-8">
                            <button class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-semibold py-3 px-6 rounded-lg text-lg transition-all duration-200 hover:-translate-y-0.5 shadow-button flex items-center gap-2" onclick="scrollToSection('formations')">
                                Voir les formations
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m9 18 6-6-6-6" />
                                </svg>
                            </button>
                            <button class="bg-transparent border-2 border-light text-light hover:bg-light hover:text-blue-600 font-semibold py-3 px-6 rounded-lg text-lg transition-all duration-200 hover:-translate-y-0.5" onclick="scrollToSection('contact')">
                                Contactez-nous
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Stats Section -->
            <section class="py-16 bg-gray-50 dark:bg-gray-900">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                        <div class="flex flex-col items-center">
                            <div class="w-16 h-16 bg-blue-100 dark:bg-blue-600 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-users text-blue-600 dark:text-blue-100 text-2xl"></i>
                            </div>
                            <h3 class="text-3xl font-bold text-dark dark:text-light mb-2">500+</h3>
                            <p class="text-gray-600 dark:text-gray-300">Étudiants formés</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-16 h-16 bg-yellow-100 dark:bg-yellow-600 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-award text-yellow-600 dark:text-yellow-100 text-2xl"></i>
                            </div>
                            <h3 class="text-3xl font-bold text-dark dark:text-light mb-2">95%</h3>
                            <p class="text-gray-600 dark:text-gray-300">Taux de réussite</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-16 h-16 bg-green-100 dark:bg-green-600 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-star text-green-600 dark:text-green-100 text-2xl"></i>
                            </div>
                            <h3 class="text-3xl font-bold text-dark dark:text-light mb-2">4.9/5</h3>
                            <p class="text-gray-600 dark:text-gray-300">Note moyenne</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Formations Section -->
            <section id="formations" class="py-16 bg-light dark:bg-gray-200">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl md:text-4xl font-bold font-title text-dark mb-4">Nos Formations</h2>
                        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                            Découvrez nos programmes de formation adaptés à tous les niveaux.
                        </p>
                    </div>

                    <div class="relative flex flex-col carousel-container" id="formationsCarousel" data-autoplay="true" data-delay="4000">
                        <div class="md:rounded-xl px-0 overflow-x-clip h-full carousel-track-container">
                            <div class="flex h-full carousel-draggable carousel-track">
                                <?php if (!empty($courses)): ?>
                                    <?php foreach ($courses as $index => $course): ?>
                                        <div class="flex-shrink-0 transition-all duration-300 flex h-full carousel-item" style="width: 33.333333%; padding: 0 8px;">
                                            <div class="carousel-card-container flex flex-col w-full h-full p-1 transition-all duration-300 drop-shadow-md hover:drop-shadow-lg transform scale-100 z-10 hover:scale-102">
                                                <div class="inner-card h-full w-full flex flex-col">
                                                    <?php
                                                    $isFeatured = $index === 0;
                                                    include SRC_PATH . '/views/components/formation-card.php';
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="flex-shrink-0 transition-all duration-300 flex h-full carousel-item" style="width: 100%; padding: 0 8px;">
                                        <div class="carousel-card-container flex flex-col w-full h-full p-1">
                                            <div class="inner-card h-full w-full flex flex-col">
                                                <div class="flex items-center justify-center p-8 text-gray-500 dark:text-gray-400 text-center">Aucune formation disponible</div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="controls-container flex flex-col items-center mt-8 mb-2 carousel-controls">
                            <div class="flex justify-center space-x-2 mb-3 carousel-dots">
                                <!-- Dots will be generated by JavaScript -->
                            </div>
                            <div class="mx-auto relative w-3/5 max-w-[240px] carousel-progress">
                                <div class="w-full h-1 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden">
                                    <div class="h-full bg-primary carousel-progress-bar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Articles Section -->
            <section id="articles" class="py-16 bg-gray-50 dark:bg-gray-900">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl md:text-4xl font-bold font-title text-dark dark:text-light mb-4">Derniers Articles</h2>
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
            <section id="avis" class="py-16 bg-light dark:bg-gray-200">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl md:text-4xl font-bold font-title text-dark dark:text-light mb-4">Ce que disent nos clients</h2>
                        <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                            Découvrez les témoignages de nos anciens étudiants.
                        </p>
                    </div>

                    <div class="relative flex flex-col carousel-container" id="reviewsCarousel" data-autoplay="true" data-delay="5000">
                        <div class="md:rounded-xl px-0 overflow-x-clip h-full carousel-track-container">
                            <div class="flex h-full carousel-draggable carousel-track">
                                <?php if (!empty($reviews)): ?>
                                    <?php foreach ($reviews as $index => $review): ?>
                                        <div class="flex-shrink-0 transition-all duration-300 flex h-full carousel-item" style="width: 33.333333%; padding: 0 8px;">
                                            <div class="carousel-card-container flex flex-col w-full h-full p-1 transition-all duration-300 drop-shadow-md hover:drop-shadow-lg transform scale-100 z-10 hover:scale-102">
                                                <div class="inner-card h-full w-full flex flex-col">
                                                    <?php
                                                    $isFeatured = $index === 0;
                                                    include SRC_PATH . '/views/components/google-review-card.php';
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="flex-shrink-0 transition-all duration-300 flex h-full carousel-item" style="width: 100%; padding: 0 8px;">
                                        <div class="carousel-card-container flex flex-col w-full h-full p-1">
                                            <div class="inner-card h-full w-full flex flex-col">
                                                <div class="flex items-center justify-center p-8 text-gray-500 dark:text-gray-400 text-center">Aucun avis disponible</div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="controls-container flex flex-col items-center mt-8 mb-2 carousel-controls">
                            <div class="flex justify-center space-x-2 mb-3 carousel-dots">
                                <!-- Dots will be generated by JavaScript -->
                            </div>
                            <div class="mx-auto relative w-3/5 max-w-[240px] carousel-progress">
                                <div class="w-full h-1 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden">
                                    <div class="h-full bg-primary carousel-progress-bar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Galerie Photos Section -->
            <section class="py-16 bg-gray-50 dark:bg-gray-900">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl md:text-4xl font-bold font-title text-dark dark:text-light mb-4">Notre Galerie</h2>
                        <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                            Découvrez en images nos ateliers, techniques et réalisations.
                        </p>
                    </div>

                    <div class="relative flex flex-col carousel-container" id="galleryCarousel" data-autoplay="true" data-delay="3500">
                        <div class="md:rounded-xl px-0 overflow-x-clip h-full carousel-track-container">
                            <div class="flex h-full carousel-draggable carousel-track">
                                <?php if (!empty($gallery)): ?>
                                    <?php foreach ($gallery as $item): ?>
                                        <div class="flex-shrink-0 transition-all duration-300 flex h-full carousel-item" style="width: 33.333333%; padding: 0 10px;">
                                            <div class="carousel-card-container flex flex-col w-full h-full p-1 transition-all duration-300 drop-shadow-xl hover:drop-shadow-xl transform scale-100 z-10 hover:scale-103">
                                                <div class="inner-card h-full w-full flex flex-col">
                                                    <div class="relative h-full overflow-hidden rounded-xl group">
                                                        <img src="<?php echo htmlspecialchars($item['imageUrl']); ?>"
                                                            alt="<?php echo htmlspecialchars($item['title']); ?>"
                                                            class="w-full h-72 object-cover transition-transform duration-500 group-hover:scale-105">
                                                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                                                            <h3 class="text-xl font-bold text-white mb-1"><?php echo htmlspecialchars($item['title']); ?></h3>
                                                            <p class="text-sm text-gray-200"><?php echo htmlspecialchars($item['description']); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="flex-shrink-0 transition-all duration-300 flex h-full carousel-item" style="width: 100%; padding: 0 10px;">
                                        <div class="carousel-card-container flex flex-col w-full h-full p-1">
                                            <div class="inner-card h-full w-full flex flex-col">
                                                <div class="flex items-center justify-center p-8 text-gray-500 dark:text-gray-400 text-center">Aucune image disponible</div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="controls-container flex flex-col items-center mt-8 mb-2 carousel-controls">
                            <div class="flex justify-center space-x-2 mb-3 carousel-dots">
                                <!-- Dots will be generated by JavaScript -->
                            </div>
                            <div class="mx-auto relative w-3/5 max-w-[240px] carousel-progress">
                                <div class="w-full h-1 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden">
                                    <div class="h-full bg-primary carousel-progress-bar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA Section -->
            <section class="py-16 bg-gradient-to-br from-blue-600 to-blue-800 text-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <h2 class="text-3xl md:text-4xl font-bold font-title mb-6 text-light">
                        Prêt à commencer votre formation ?
                    </h2>
                    <p class="text-lg md:text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                        Rejoignez-nous dès maintenant et devenez un expert en polissage automobile.
                    </p>
                    <button class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-semibold py-3 px-6 rounded-lg text-lg transition-all duration-200 hover:-translate-y-0.5 shadow-button flex items-center gap-2 mx-auto" onclick="scrollToSection('contact')">
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