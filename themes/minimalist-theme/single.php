<?php get_header(); ?>

<main class="single-product-page container">

    <div class="product-layout">
    
        <!-- LEFT: Product Details -->
        <div class="product-details-left">
            <!-- Product Title -->
            <h1>
                <?php the_title(); ?>
            </h1>

            <!-- Product Price -->
            <h2 class="price">
                $<?php echo esc_html(get_post_meta(get_the_ID(), '_product_price', true)) ?: '00'; ?>
            </h2>

            <!-- Product Description -->
            <section class="product-description">
                <h3>Description</h3>
                <?php 
                    if (get_the_content()) {
                        the_content();
                    } else {
                        echo '<p>This is a brief description of the product, highlighting its key benefits and unique qualities.</p>';
                    }
                ?>
            </section>

            <!-- Best For -->
            <section class="product-best-for">
                <h3>Best For</h3>
                <p>
                    <?php echo esc_html(get_post_meta(get_the_ID(), '_product_best_for', true)) ?: 'Ideal for all skin types, including sensitive and acne-prone skin.'; ?>
                </p>
            </section>

            <!-- Key Benefits -->
            <section class="product-benefits">
                <h3>Key Benefits</h3>
                <ul>
                    <?php
                    $benefits = get_post_meta(get_the_ID(), '_product_benefits', true);
                    if ($benefits) {
                        $benefits_array = explode("\n", $benefits);
                        foreach ($benefits_array as $benefit) :
                            if (trim($benefit)) :
                                echo '<li>' . esc_html($benefit) . '</li>';
                            endif;
                        endforeach;
                    } else {
                        echo '
                            <li>Soothes inflammation and redness</li>
                            <li>Repairs and strengthens the skin barrier</li>
                            <li>Decongests pores to prevent and treat acne</li>
                        ';
                    }
                    ?>
                </ul>
            </section>

            <!-- Ingredients -->
            <section class="product-ingredients">
                <h3>Ingredients</h3>
                <ul>
                    <?php
                    $ingredients = get_post_meta(get_the_ID(), '_product_ingredients', true);
                    if ($ingredients) {
                        $ingredients_array = explode("\n", $ingredients);
                        foreach ($ingredients_array as $ingredient) :
                            if (trim($ingredient)) :
                                echo '<li>' . esc_html($ingredient) . '</li>';
                            endif;
                        endforeach;
                    } else {
                        echo '
                            <li>Organic Turmeric</li>
                            <li>Sea Minerals</li>
                            <li>Botanical Extracts</li>
                        ';
                    }
                    ?>
                </ul>
            </section>

        </div>

        <!-- RIGHT: Featured Image -->
        <div class="product-image-right">
            <?php 
            if (has_post_thumbnail()) {
                the_post_thumbnail('large');
            } else {
                echo '<img src="https://via.placeholder.com/400x600?text=Product+Image" alt="Placeholder Product Image">';
            }
            ?>
        </div>

    </div>

    <!-- Pull Quote -->
    <section class="product-quote">
        <blockquote>
            <?php echo esc_html(get_theme_mod('product_quote', '"This product is life-changing!" - Ruby')); ?>
        </blockquote>
    </section>

    <!-- Image Gallery -->
    <section class="product-gallery">
        <h3>Image Gallery</h3>
        <div class="gallery-container">
            <?php 
            $gallery_displayed = false;
            for ($i = 1; $i <= 5; $i++) :
                $gallery_img = get_theme_mod("gallery_image_{$i}");
                if ($gallery_img) :
                    $gallery_displayed = true;
            ?>
                <figure class="gallery-item">
                    <img src="<?php echo esc_url($gallery_img); ?>" alt="Gallery Image">
                    <figcaption>Via Instagram</figcaption>
                </figure>
            <?php endif; endfor; ?>
            
            <?php if (!$gallery_displayed) : ?>
                <figure class="gallery-item">
                    <img src="https://via.placeholder.com/300x400?text=Gallery+Image+1" alt="Gallery Placeholder">
                    <figcaption>Via Instagram</figcaption>
                </figure>
                <figure class="gallery-item">
                    <img src="https://via.placeholder.com/300x400?text=Gallery+Image+2" alt="Gallery Placeholder">
                    <figcaption>Via Instagram</figcaption>
                </figure>
            <?php endif; ?>
        </div>
    </section>

    <!-- Video Embed -->
    <section class="product-video">
        <h3>How to Use</h3>
        <div class="video-wrapper">
            <?php 
            $video_url = get_theme_mod('about_us_video');
            if ($video_url) {
                echo '<iframe src="' . esc_url($video_url) . '" frameborder="0" allowfullscreen></iframe>';
            } else {
                echo '<iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allowfullscreen></iframe>';
            }
            ?>
        </div>
    </section>

    <!-- Reviews Table -->
    <section class="product-reviews">
        <h3>Customer Reviews</h3>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Review</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Barbara F.</td>
                    <td>The results are healthy, glowing skin. Genuinely love how easily this absorbs!</td>
                </tr>
                <tr>
                    <td>Alejandra G.</td>
                    <td>I like the texture. Great serum, my skin loves it.</td>
                </tr>
                <tr>
                    <td>Anne P.</td>
                    <td>A good oil for the price. Lasts forever, balances my skin tone!</td>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- Action Buttons -->
    <section class="product-buttons">
        <a href="#" class="btn">Shop Now</a>
        <a href="<?php echo site_url('/about'); ?>" class="btn btn-secondary">About Us</a>
    </section>

</main>

<?php get_footer(); ?>
