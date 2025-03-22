<?php
/**
 * Template Name: Product Listing Page
 * Description: Displays a listing of products.
 */

get_header(); ?>

<div class="archive-page">

    <header class="archive-header">
        <h1><?php the_title(); ?></h1>
    </header>


    <!-- Product Loop -->
    <div class="archive-grid">

        <?php
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;

        $args = [
            'post_type'      => 'products',
            'posts_per_page' => 6,
            'paged'          => $paged,
        ];

        $product_query = new WP_Query($args);

        if ($product_query->have_posts()) :
            while ($product_query->have_posts()) : $product_query->the_post(); ?>

                <div class="archive-item">
                    <a href="<?php the_permalink(); ?>">

                        <?php if (has_post_thumbnail()) : ?>
                            <div class="archive-thumbnail">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                        <?php endif; ?>

                        <h2 class="archive-title"><?php the_title(); ?></h2>
                    </a>

                    
                </div>

            <?php endwhile; ?>

            <div class="pagination">
                <?php
                echo paginate_links([
                    'total' => $product_query->max_num_pages,
                    'current' => $paged,
                ]);
                ?>
            </div>

        <?php else : ?>
            <p>No products found.</p>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>

    </div><!-- /.archive-grid -->

</div><!-- /.archive-page -->

<?php get_footer(); ?>
