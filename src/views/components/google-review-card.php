<?php
$getInitials = function ($name) {
    return strtoupper(substr($name, 0, 1) . (strpos($name, ' ') ? substr($name, strpos($name, ' ') + 1, 1) : ''));
};
?>

<div class="h-full review-card relative <?php echo $isFeatured ? 'ring-2 ring-primary' : ''; ?> bg-white dark:bg-gray-800 rounded-card shadow-card hover:shadow-card-hover transition-all duration-200 p-6">
    <?php if ($isFeatured): ?>
        <div class="bg-primary text-dark font-title text-center py-2 text-sm font-semibold -m-6 mb-4">
            ⭐ Avis client recommandé
        </div>
    <?php endif; ?>

    <!-- Header avec avatar et infos -->
    <div class="flex items-start gap-4 mb-4">
        <div class="flex-shrink-0">
            <?php if (!empty($review['avatar'])): ?>
                <img src="<?php echo htmlspecialchars($review['avatar']); ?>"
                    alt="<?php echo htmlspecialchars($review['author']); ?>"
                    class="w-12 h-12 rounded-full object-cover">
            <?php else: ?>
                <div class="w-12 h-12 rounded-full bg-primary text-dark flex items-center justify-center font-semibold text-lg">
                    <?php echo $getInitials($review['author']); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="flex-1">
            <h4 class="font-semibold text-dark dark:text-light"><?php echo htmlspecialchars($review['author']); ?></h4>
            <div class="flex items-center mt-1">
                <?php
                $rating = $review['rating'] ?? 5;
                for ($i = 1; $i <= 5; $i++):
                ?>
                    <i class="fas fa-star text-sm <?php echo $i <= $rating ? 'text-primary fill-current' : 'text-gray-300 dark:text-gray-600'; ?>"></i>
                <?php endfor; ?>
            </div>
        </div>
    </div>

    <!-- Citation -->
    <div class="relative mt-2">
        <i class="fas fa-quote-left absolute -top-2 -left-2 text-primary opacity-20 text-2xl"></i>
        <blockquote class="text-text-light dark:text-text-dark italic leading-relaxed pl-6">
            <?php echo htmlspecialchars($review['comment']); ?>
        </blockquote>
    </div>

    <!-- Footer avec date -->
    <div class="mt-4 pt-4 border-t border-border dark:border-gray-700">
        <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
            <i class="fab fa-google mr-2"></i>
            <span><?php echo date('d M Y', strtotime($review['date'] ?? $review['created_at'] ?? 'now')); ?></span>
            <?php if (isset($review['verified']) && $review['verified']): ?>
                <i class="fas fa-check-circle ml-auto text-success"></i>
            <?php endif; ?>
        </div>
    </div>
</div>