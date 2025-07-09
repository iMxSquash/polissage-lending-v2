<div class="course-card" data-animate="fadeInUp">
    <div class="course-image">
        <img src="<?php echo $course['image']; ?>" alt="<?php echo $course['title']; ?>">
    </div>
    <div class="course-content">
        <h3><?php echo $course['title']; ?></h3>
        <p><?php echo $course['description']; ?></p>
        <div class="course-details">
            <span class="duration"><?php echo $course['duration']; ?></span>
            <span class="price"><?php echo $course['price']; ?>€</span>
        </div>
        <button class="btn-primary" onclick="showCourseModal(<?php echo $course['id']; ?>)">
            En savoir plus
        </button>
    </div>
</div>