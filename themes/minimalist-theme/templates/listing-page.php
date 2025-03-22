<?php
/**
 * Template Name: Product Listing Page
 * Description: Displays a listing of products.
 */

get_header(); ?>

<div class="product-listing-container">

    <h1><?php the_title(); ?></h1>


    <div class="product-filters">
        <?php
        $terms = get_terms([
            'taxonomy' => 'product_category',
            'hide_empty' => false,
        ]);

        if (!empty($terms)) : ?>
            <ul class="product-category-filters">
                <?php foreach ($terms as $term) : ?>
                    <li><a href="<?php echo get_term_link($term); ?>"><?php echo esc_html($term->name); ?></a></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>

    <!-- Product Loop -->
    <div class="product-grid">

        <?php
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;

        $args = [
            'post_type' => 'products',
            'posts_per_page' => 6,
            'paged' => $paged,
        ];

        $product_query = new WP_Query($args);

        if ($product_query->have_posts()) :
            while ($product_query->have_posts()) : $product_query->the_post(); ?>

                <div class="product-item">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="product-thumbnail">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                        <?php endif; ?>
                        <h2 class="product-title"><?php the_title(); ?></h2>
                    </a>


                    <div class="product-excerpt">
                        <?php the_excerpt(); ?>
                    </div>

                </div>

            <?php endwhile; ?>

            <!-- Pagination -->
            <div class="pagination">
                <?php
                echo paginate_links([
                    'total' => $product_query->max_num_pages
                ]);
                ?>
            </div>

        <?php else : ?>
            <p>No products found.</p>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>

    </div><!-- .product-grid -->

</div><!-- .product-listing-container -->

<?php get_footer(); ?>
