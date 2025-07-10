<div class="h-full overflow-hidden <?php echo $isFeatured ? 'ring-2 ring-primary' : ''; ?> bg-white dark:bg-gray-800 rounded-lg shadow-card hover:shadow-card-hover transition-all duration-300">
    <?php if ($isFeatured): ?>
        <div class="bg-primary text-dark font-title text-center py-2 text-sm font-semibold">
            ✨ Article en vedette
        </div>
    <?php endif; ?>

    <?php if (!empty($article['image'])): ?>
        <div class="aspect-video bg-light overflow-hidden relative">
            <img src="<?php echo htmlspecialchars($article['image']); ?>"
                alt="<?php echo htmlspecialchars($article['title']); ?>"
                class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
            <div class="absolute bottom-0 left-0 w-full h-1 bg-primary"></div>
        </div>
    <?php endif; ?>

    <div class="p-6">
        <div class="flex items-center justify-between mb-3">
            <span class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-full bg-primary text-dark">
                <?php echo htmlspecialchars($article['category'] ?? 'Article'); ?>
            </span>
            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1">
                    <circle cx="12" cy="12" r="10" />
                    <polyline points="12,6 12,12 16,14" />
                </svg>
                <span><?php echo htmlspecialchars($article['readTime'] ?? '5'); ?> min</span>
            </div>
        </div>

        <h3 class="text-xl font-bold font-title text-dark dark:text-light mb-3 line-clamp-2">
            <?php echo htmlspecialchars($article['title']); ?>
        </h3>

        <p class="text-text-light dark:text-text-dark mb-4 line-clamp-3">
            <?php echo htmlspecialchars($article['excerpt'] ?? substr($article['content'] ?? '', 0, 150) . '...'); ?>
        </p>

        <div class="flex items-center justify-between pt-4 border-t border-border dark:border-gray-700">
            <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                <div class="flex items-center">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                        <circle cx="12" cy="7" r="4" />
                    </svg>
                    <span><?php echo htmlspecialchars($article['author'] ?? 'Auteur'); ?></span>
                </div>
                <span class="mx-2">•</span>
                <div class="flex items-center">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                        <line x1="16" y1="2" x2="16" y2="6" />
                        <line x1="8" y1="2" x2="8" y2="6" />
                        <line x1="3" y1="10" x2="21" y2="10" />
                    </svg>
                    <span><?php echo date('d M Y', strtotime($article['publishedAt'] ?? $article['created_at'] ?? 'now')); ?></span>
                </div>
            </div>
            <button class="inline-flex items-center justify-center font-title font-semibold rounded-md transition-all duration-200 ease-in-out bg-transparent border-0  focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-60 disabled:pointer-events-none transform hover:-translate-y-0_5 hover:bg-primary hover:bg-opacity-10 focus:ring-primary px-5 py-2_5 text-base text-dark hover:text-primary-dark dark:text-primary dark:hover:text-light">
                Lire plus
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2">
                    <line x1="5" y1="12" x2="19" y2="12" />
                    <polyline points="12,5 19,12 12,19" />
                </svg>
            </button>
        </div>

        <?php if (isset($article['tags']) && !empty($article['tags'])): ?>
            <div class="flex flex-wrap gap-2 mt-4">
                <?php foreach (array_slice($article['tags'], 0, 3) as $tag): ?>
                    <span class="inline-flex items-center px-2 py-1 text-xs bg-light dark:bg-gray-800 text-dark dark:text-light rounded-full">
                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1">
                            <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z" />
                            <line x1="7" y1="7" x2="7.01" y2="7" />
                        </svg>
                        <?php echo htmlspecialchars($tag); ?>
                    </span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>