<div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 p-4">
    <div class="flex items-center justify-between mb-3">
        <h4 class="font-semibold text-dark dark:text-light"><?php echo $review['name']; ?></h4>
        <div class="flex items-center">
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <i class="fas fa-star <?php echo $i <= $review['rating'] ? 'text-yellow-500' : 'text-gray-300'; ?> text-sm"></i>
            <?php endfor; ?>
        </div>
    </div>
    <p class="text-gray-600 dark:text-gray-300 italic"><?php echo $review['comment']; ?></p>
    <span class="text-sm text-gray-500 dark:text-gray-400 mt-2 block"><?php echo date('d/m/Y', strtotime($review['date'])); ?></span>
</div>