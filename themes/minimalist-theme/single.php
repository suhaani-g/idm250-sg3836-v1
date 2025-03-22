<?php
/**
 * Single Product Template
 *
 * Template for displaying a single Product post type (CPT).
 *
 * @package minimalist-theme
 */

get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<section class="single-product">
  <div class="wrapper">

    <!-- Product Featured Image -->
    <?php if (has_post_thumbnail()) : ?>
      <div class="product-featured-image">
        <?php the_post_thumbnail('large'); ?>
      </div>
    <?php endif; ?>

    <!-- Product Title -->
    <h1 class="product-title"><?php the_title(); ?></h1>

    <!-- Product Content from the Editor -->
    <div class="product-content">
      <?php the_content(); ?>
    </div>

    <!-- Product Categories -->
    <div class="product-categories">
      
        <?php
        echo get_the_term_list(
          get_the_ID(),
          'product_category', 
          '',
          ', ',
          ''
        );
        ?>
      </p>
    </div>

  </div><!-- .wrapper -->
</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
