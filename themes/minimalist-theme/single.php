<?php get_header(); ?>

<main class="single-product-page container">

    <!-- Product Top Section -->
    <section class="product-hero">
        <div class="product-info">
            <h1><?php the_title(); ?></h1>
            <p class="price">
                <?php echo get_field('price') ? '$' . esc_html(get_field('price')) : 'Price on Request'; ?>
            </p>
            <div class="product-description">
                <?php the_content(); ?>
            </div>
        </div>

        <div class="product-image-gallery">
            <?php if (have_rows('product_gallery')): ?>
                <div class="gallery-slider">
                    <?php while (have_rows('product_gallery')): the_row(); 
                        $image = get_sub_field('image');
                        $caption = get_sub_field('caption');
                    ?>
                        <figure>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                            <figcaption><?php echo esc_html($caption); ?></figcaption>
                        </figure>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
            <?php endif; ?>
        </div>
    </section>

    <!-- Ingredients Section -->
    <section class="ingredients-section">
        <h2>Key Ingredients</h2>
        <?php if (have_rows('ingredients')): ?>
            <ul>
                <?php while (have_rows('ingredients')): the_row(); ?>
                    <li><?php echo esc_html(get_sub_field('ingredient')); ?></li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>No ingredient information available.</p>
        <?php endif; ?>
    </section>

    <!-- Key Benefits -->
    <section class="benefits-section">
        <h2>Key Benefits</h2>
        <?php if (have_rows('benefits')): ?>
            <ul>
                <?php while (have_rows('benefits')): the_row(); ?>
                    <li><?php echo esc_html(get_sub_field('benefit')); ?></li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>No key benefits listed yet.</p>
        <?php endif; ?>
    </section>

    <!-- Reviews Section -->
    <section class="reviews-section">
        <h2>Customer Reviews</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Review</th>
                    <th>Rating</th>
                </tr>
            </thead>
            <tbody>
                <?php if (have_rows('reviews')): ?>
                    <?php while (have_rows('reviews')): the_row(); ?>
                        <tr>
                            <td><?php echo esc_html(get_sub_field('reviewer_name')); ?></td>
                            <td><?php echo esc_html(get_sub_field('review_text')); ?></td>
                            <td><?php echo esc_html(get_sub_field('rating')); ?> ⭐</td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="3">No reviews yet.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </section>

    <!-- Pull Quote Section -->
    <section class="quote-section">
        <blockquote>
            “<?php echo esc_html(get_field('pull_quote', false, false)); ?>”
            <cite><?php echo esc_html(get_field('quote_author', false, false)); ?></cite>
        </blockquote>
    </section>

    <!-- Video Embed Section -->
    <section class="video-section">
        <h2>How to Use</h2>
        <?php 
        $video_url = get_field('product_video');
        if ($video_url): ?>
            <div class="video-container">
                <iframe src="<?php echo esc_url($video_url); ?>" frameborder="0" allowfullscreen></iframe>
            </div>
        <?php else: ?>
            <p>No video available.</p>
        <?php endif; ?>
    </section>

    <!-- Links Example -->
    <section class="related-links">
        <h2>Learn More</h2>
        <a href="<?php echo esc_url(site_url('/about')); ?>" class="btn">About Us</a>
    </section>

</main>

<?php get_footer(); ?>
