<?php
$getLevelColor = function ($level) {
    switch (strtolower($level)) {
        case 'beginner':
        case 'débutant':
            return 'bg-success bg-opacity-10 text-success dark:bg-success dark:bg-opacity-100 dark:text-dark';
        case 'intermediate':
        case 'intermédiaire':
            return 'bg-primary bg-opacity-10 text-primary dark:bg-primary dark:bg-opacity-100 dark:text-dark';
        case 'advanced':
        case 'expert':
        case 'pro':
            return 'bg-accent bg-opacity-10 text-accent dark:bg-accent dark:bg-opacity-100 dark:text-dark';
        default:
            return 'bg-success bg-opacity-10 text-success dark:bg-success dark:bg-opacity-100 dark:text-dark';
    }
};

$getLevelText = function ($level) {
    switch (strtolower($level)) {
        case 'beginner':
            return 'Débutant';
        case 'intermediate':
            return 'Avancé';
        case 'advanced':
        case 'expert':
            return 'Pro';
        default:
            return ucfirst($level ?? 'Débutant');
    }
};

$level = $course['level'] ?? 'beginner';
$levelColor = $getLevelColor($level);
$levelText = $getLevelText($level);
?>

<div class="flex flex-col h-full">
    <div class="h-full bg-white dark:bg-gray-800 rounded-lg shadow-card hover:shadow-card-hover transition-all duration-300 overflow-hidden <?php echo $isFeatured ? 'ring-2 ring-primary' : ''; ?>">

        <div class="aspect-video bg-gradient-to-br from-dark to-dark/80 relative overflow-hidden flex-shrink-0">
            <?php if (!empty($course['image'])): ?>
                <img src="<?php echo htmlspecialchars($course['image']); ?>"
                    alt="<?php echo htmlspecialchars($course['title']); ?>"
                    class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
            <?php else: ?>
                <div class="flex items-center justify-center h-full text-primary text-4xl font-bold font-title">
                    <?php echo strtoupper(substr($course['title'], 0, 1)); ?>
                </div>
            <?php endif; ?>

            <?php if ($isFeatured): ?>
                <div class="absolute top-0 left-0 right-0 z-10 bg-primary text-dark text-center py-2 text-sm font-semibold font-title">
                    <!-- Icône Star SVG Lucide -->
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="inline mr-1">
                        <polygon points="12,2 15.09,8.26 22,9.27 17,14.14 18.18,21.02 12,17.77 5.82,21.02 7,14.14 2,9.27 8.91,8.26" />
                    </svg>
                    Formation la plus demandée
                </div>
            <?php endif; ?>

            <div class="absolute <?php echo $isFeatured ? 'top-10' : 'top-3'; ?> right-3 z-10">
                <span class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-full <?php echo $levelColor; ?>">
                    <?php echo $levelText; ?>
                </span>
            </div>
        </div>

        <div class="p-6">
            <div class="p-0">
                <div class="flex justify-between items-start">
                    <h3 class="text-xl font-bold line-clamp-2 min-h-[3rem] text-dark dark:text-light font-title">
                        <?php echo htmlspecialchars($course['title']); ?>
                    </h3>
                    <div class="text-2xl font-bold text-dark dark:text-primary ml-2">
                        <?php echo htmlspecialchars($course['price'] . ' €' ?? 'Gratuit'); ?>
                    </div>
                </div>
                <div class="w-12 h-1 bg-primary rounded mt-2"></div>
            </div>

            <div class="p-0 mb-4">
                <p class="line-clamp-3 min-h-[4.5rem] text-text-light dark:text-text-dark">
                    <?php echo htmlspecialchars($course['description']); ?>
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-4">
                <div class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 text-primary">
                        <circle cx="12" cy="12" r="10" />
                        <polyline points="12,6 12,12 16,14" />
                    </svg>
                    <span><?php echo htmlspecialchars($course['duration'] ?? '2'); ?> heures</span>
                </div>
                <div class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 text-primary">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>
                    <span><?php echo htmlspecialchars($course['instructor'] ?? 'Expert'); ?></span>
                </div>
                <?php if (!empty($course['category'])): ?>
                    <div class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 text-primary">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                            <circle cx="12" cy="10" r="3" />
                        </svg>
                        <span><?php echo htmlspecialchars($course['category']); ?></span>
                    </div>
                <?php endif; ?>
                <div class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 text-primary">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                        <line x1="16" y1="2" x2="16" y2="6" />
                        <line x1="8" y1="2" x2="8" y2="6" />
                        <line x1="3" y1="10" x2="21" y2="10" />
                    </svg>
                    <span>Sessions disponibles</span>
                </div>
            </div>

            <div class="p-0 m-0 flex items-center justify-between">
                <div class="flex items-center gap-1">
                    <!-- Icône Award SVG Lucide -->
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary">
                        <circle cx="12" cy="8" r="7" />
                        <polyline points="8.21,13.89 7,23 12,20 17,23 15.79,13.88" />
                    </svg>
                    <span class="text-sm font-medium text-dark dark:text-light">Certification incluse</span>
                </div>
                <button class="inline-flex items-center justify-center font-title border-0 font-semibold rounded-md transition-all duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-60 disabled:pointer-events-none transform hover:-translate-y-1 bg-primary text-dark hover:bg-primary-dark focus:ring-primary-dark shadow-button hover:shadow-button-hover px-5 py-2 text-base">
                    S'inscrire maintenant
                </button>
            </div>
        </div>
    </div>
</div>