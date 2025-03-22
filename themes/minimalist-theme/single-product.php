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
  <div class="wrapper product-container">

    <!-- Left: Product Info -->
    <div class="product-info">
      <h1 class="product-title"><?php the_title(); ?></h1>

      <div class="product-content">
        <?php the_content(); ?>
      </div>
    </div>

    <!-- Right: Product Image -->
    <div class="product-image">
      <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('large'); ?>
      <?php endif; ?>
    </div>

  </div><!-- .wrapper -->
</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
