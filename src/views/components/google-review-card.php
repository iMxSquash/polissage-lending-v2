<?php
$getInitials = function ($name) {
    return strtoupper(substr($name, 0, 1) . (strpos($name, ' ') ? substr($name, strpos($name, ' ') + 1, 1) : ''));
};
?>

<div class="h-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-card hover:shadow-card-hover rounded-card transition-all duration-300 hover:-translate-y-1 relative <?php echo $isFeatured ? 'ring-2 ring-primary' : ''; ?>">
    <?php if ($isFeatured): ?>
        <div class="bg-primary text-dark font-title text-center py-2 text-sm font-semibold">
            ⭐ Avis client recommandé
        </div>
    <?php endif; ?>

    <div class="p-6">
        <!-- Header avec avatar et infos -->
        <div class="flex items-start gap-4 mb-4">
            <div class="flex-1">
                <div class="flex items-center justify-between mb-1">
                    <h4 class="font-semibold font-title text-dark dark:text-light"><?php echo htmlspecialchars($review['author']); ?></h4>
                    <?php if (isset($review['verified']) && $review['verified']): ?>
                        <span class="text-xs bg-primary bg-opacity-20 text-dark dark:text-primary px-2 py-1 rounded-full inline-flex items-center">
                            <i class="fas fa-check-circle mr-1" style="font-size: 12px;"></i>
                            Vérifié
                        </span>
                    <?php endif; ?>
                </div>
                <div class="flex items-center gap-2">
                    <div class="flex items-center">
                        <?php
                        $rating = $review['rating'] ?? 5;
                        for ($i = 1; $i <= 5; $i++):
                        ?>
                            <i class="fas fa-star <?php echo $i <= $rating ? 'text-primary' : 'text-gray-300 dark:text-gray-600'; ?>" style="font-size: 16px;"></i>
                        <?php endfor; ?>
                    </div>
                    <span class="text-sm font-medium text-gray-600 dark:text-gray-400">
                        <?php echo $rating; ?>/5
                    </span>
                </div>
            </div>
        </div>

        <!-- Citation -->
        <div class="relative mt-2">
            <i class="fas fa-quote-left absolute -top-2 -left-2 text-primary opacity-20" style="font-size: 24px;"></i>
            <blockquote class="text-text-light dark:text-text-dark italic leading-relaxed pl-6">
                <?php echo htmlspecialchars($review['comment']); ?>
            </blockquote>
        </div>

        <!-- Footer avec date -->
        <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <span class="text-sm text-gray-500 dark:text-gray-400">
                    <?php echo date('d M Y', strtotime($review['date'] ?? $review['created_at'] ?? 'now')); ?>
                </span>
                <div class="flex items-center gap-1 text-sm text-gray-600 dark:text-gray-400">
                    <span>Publié sur</span>
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4" />
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853" />
                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05" />
                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>