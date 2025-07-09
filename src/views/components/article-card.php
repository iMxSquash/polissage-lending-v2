<div class="h-full overflow-hidden <?php echo $isFeatured ? 'ring-2 ring-primary' : ''; ?> bg-white dark:bg-gray-800 rounded-card shadow-card hover:shadow-card-hover transition-all duration-200">
    <?php if ($isFeatured): ?>
        <div class="bg-primary text-dark font-title text-center py-2 text-sm font-semibold">
            ✨ Article en vedette
        </div>
    <?php endif; ?>

    <?php if (!empty($article['image'])): ?>
        <div class="aspect-video bg-light dark:bg-gray-700 overflow-hidden relative">
            <img src="<?php echo htmlspecialchars($article['image']); ?>"
                alt="<?php echo htmlspecialchars($article['title']); ?>"
                class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
            <div class="absolute bottom-0 left-0 w-full h-1 bg-primary"></div>
        </div>
    <?php endif; ?>

    <div class="p-6">
        <div class="flex items-center justify-between mb-3">
            <span class="px-2 py-1 text-xs font-medium rounded-full bg-primary bg-opacity-50 text-dark">
                <?php echo htmlspecialchars($article['category'] ?? 'Article'); ?>
            </span>
            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                <i class="fas fa-clock w-3.5 h-3.5 mr-1"></i>
                <?php echo htmlspecialchars($article['readTime'] ?? '5'); ?> min
            </div>
        </div>

        <h3 class="text-xl font-bold font-title text-dark dark:text-light mb-3 line-clamp-2">
            <?php echo htmlspecialchars($article['title']); ?>
        </h3>

        <p class="text-text-light dark:text-text-dark mb-4 leading-relaxed line-clamp-3">
            <?php echo htmlspecialchars($article['excerpt'] ?? substr($article['content'] ?? '', 0, 150) . '...'); ?>
        </p>

        <div class="flex items-center justify-between pt-4 border-t border-border dark:border-gray-700">
            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                <img src="<?php echo htmlspecialchars($article['author_avatar'] ?? '/images/default-avatar.jpg'); ?>"
                    alt="<?php echo htmlspecialchars($article['author'] ?? 'Auteur'); ?>"
                    class="w-6 h-6 rounded-full mr-2">
                <span><?php echo htmlspecialchars($article['author'] ?? 'Auteur'); ?></span>
            </div>
            <div class="text-sm text-gray-500 dark:text-gray-400">
                <?php echo date('d M Y', strtotime($article['publishedAt'] ?? $article['created_at'] ?? 'now')); ?>
            </div>
        </div>

        <?php if (isset($article['tags']) && !empty($article['tags'])): ?>
            <div class="flex flex-wrap gap-1 mt-4">
                <?php foreach (array_slice($article['tags'], 0, 3) as $tag): ?>
                    <span class="px-2 py-1 text-xs bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded">
                        #<?php echo htmlspecialchars($tag); ?>
                    </span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<div class="stat-item">
    <i class="fas fa-comment"></i>
    <span><?php echo htmlspecialchars($article['comments'] ?? '0'); ?> commentaires</span>
</div>
</div>
</div>
</div>