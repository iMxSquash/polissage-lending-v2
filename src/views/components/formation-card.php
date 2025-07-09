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
            return 'bg-accent bg-opacity-10 text-accent dark:bg-accent dark:bg-opacity-100 dark:text-dark';
        default:
            return 'bg-light text-dark dark:bg-gray-800 dark:text-light';
    }
};

$getLevelText = function ($level) {
    switch (strtolower($level)) {
        case 'beginner':
            return 'Débutant';
        case 'intermediate':
            return 'Intermédiaire';
        case 'advanced':
            return 'Expert';
        default:
            return ucfirst($level ?? 'Débutant');
    }
};

$level = $course['level'] ?? 'beginner';
$levelColor = $getLevelColor($level);
$levelText = $getLevelText($level);
?>

<div class="flex flex-col h-full">
    <div class="h-full inner-card overflow-hidden <?php echo $isFeatured ? 'ring-2 ring-primary' : ''; ?> bg-white dark:bg-gray-800 rounded-card shadow-card hover:shadow-card-hover transition-all duration-200 border-0 p-0">
        <?php if ($isFeatured): ?>
            <div class="bg-primary text-dark font-title text-center py-2 text-sm font-semibold">
                ✨ Formation en vedette
            </div>
        <?php endif; ?>

        <div class="aspect-video bg-gradient-to-br from-dark to-dark/80 relative overflow-hidden">
            <img src="<?php echo htmlspecialchars($course['image'] ?? '/images/default-course.jpg'); ?>"
                alt="<?php echo htmlspecialchars($course['title']); ?>"
                class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
            <div class="absolute bottom-0 left-0 w-full h-1 bg-primary"></div>
        </div>

        <div class="p-6">
            <div class="flex items-center justify-between mb-3">
                <span class="px-2 py-1 text-xs font-medium rounded-full <?php echo $levelColor; ?>">
                    <?php echo $levelText; ?>
                </span>
                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                    <i class="fas fa-clock w-3.5 h-3.5 mr-1"></i>
                    <?php echo htmlspecialchars($course['duration'] ?? '2 semaines'); ?>
                </div>
            </div>

            <h3 class="text-xl font-bold font-title text-dark dark:text-light mb-3 line-clamp-2">
                <?php echo htmlspecialchars($course['title']); ?>
            </h3>

            <p class="text-text-light dark:text-text-dark mb-4 leading-relaxed line-clamp-3">
                <?php echo htmlspecialchars($course['description']); ?>
            </p>

            <div class="flex items-center justify-between pt-4 border-t border-border dark:border-gray-700">
                <div class="flex items-center">
                    <?php
                    $rating = $course['rating'] ?? 5;
                    for ($i = 1; $i <= 5; $i++):
                    ?>
                        <i class="fas fa-star text-sm <?php echo $i <= $rating ? 'text-primary' : 'text-gray-300 dark:text-gray-600'; ?>"></i>
                    <?php endfor; ?>
                    <span class="text-sm text-gray-500 dark:text-gray-400 ml-2">
                        <?php echo number_format($rating, 1); ?>
                    </span>
                </div>
                <div class="text-sm text-gray-500 dark:text-gray-400">
                    <?php echo htmlspecialchars($course['students'] ?? '0'); ?> étudiants
                </div>
            </div>

            <?php if (isset($course['tags']) && !empty($course['tags'])): ?>
                <div class="flex flex-wrap gap-1 mt-4">
                    <?php foreach (array_slice($course['tags'], 0, 3) as $tag): ?>
                        <span class="px-2 py-1 text-xs bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded">
                            <?php echo htmlspecialchars($tag); ?>
                        </span>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>