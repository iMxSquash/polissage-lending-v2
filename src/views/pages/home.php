<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <?php include SRC_PATH . '/views/components/header.php'; ?>

    <main>
        <section class="hero">
            <div class="hero-content">
                <h1>Formation Detailing Professionnel</h1>
                <p>Apprenez les techniques de detailing automobile avec nos experts</p>
                <button class="cta-button" onclick="scrollToSection('courses')">
                    Découvrir nos formations
                </button>
            </div>
            <div class="hero-image">
                <img src="/images/hero-car.jpg" alt="Voiture détaillée">
            </div>
        </section>

        <section id="courses" class="courses">
            <h2>Nos Formations</h2>
            <div class="courses-grid">
                <?php foreach ($courses as $course): ?>
                    <?php include SRC_PATH . '/views/components/course-card.php'; ?>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="reviews">
            <h2>Avis de nos étudiants</h2>
            <div class="reviews-carousel" id="reviewsCarousel">
                <?php foreach ($reviews as $review): ?>
                    <?php include SRC_PATH . '/views/components/review-card.php'; ?>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <?php include SRC_PATH . '/views/components/footer.php'; ?>

    <script src="/js/main.js"></script>
    <script src="/js/carousel.js"></script>
</body>

</html>