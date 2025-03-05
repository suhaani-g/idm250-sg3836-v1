<section class="testimonials">
    <div class="container">
        <h2><?php echo get_theme_mod('testimonials_title', 'What Our Customers Say'); ?></h2>

        <?php if (have_rows('testimonials', 'option')) : ?>
            <div class="testimonial-slider">
                <?php while (have_rows('testimonials', 'option')) : the_row(); ?>
                    <blockquote>
                        <p>“<?php the_sub_field('testimonial_text'); ?>”</p>
                        <cite>- <?php the_sub_field('testimonial_author'); ?></cite>
                    </blockquote>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <p>No testimonials added yet.</p>
        <?php endif; ?>
    </div>
</section>
