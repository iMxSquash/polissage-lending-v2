<div class="review-card">
    <div class="review-header">
        <h4><?php echo $review['name']; ?></h4>
        <div class="rating">
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <span class="star <?php echo $i <= $review['rating'] ? 'filled' : ''; ?>">★</span>
            <?php endfor; ?>
        </div>
    </div>
    <p class="review-comment"><?php echo $review['comment']; ?></p>
    <span class="review-date"><?php echo date('d/m/Y', strtotime($review['date'])); ?></span>
</div>