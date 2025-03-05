<section class="featured-products">
    <div class="container">
        <h2><?php echo get_theme_mod('featured_title', 'Best Sellers'); ?></h2>
        <div class="product-grid">
            <?php
            $args = array(
                'post_type'      => 'products', 
                'posts_per_page' => 3, 
                'orderby'        => 'date',
                'order'          => 'DESC'
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="product-item">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium'); ?>
                            </a>
                        <?php endif; ?>
                        <h3 class="product-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <p><?php echo wp_trim_words(get_the_content(), 15, '...'); ?></p>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else :
                echo '<p>No products found.</p>';
            endif;
            ?>
        </div>
    </div>
</section>
