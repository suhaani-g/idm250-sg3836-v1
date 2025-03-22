<?php
/**
 * Front Page Template
 *
 * Displays the front page content and latest products for Minimalist Skincare.
 *
 * @package minimalist-theme
 */
?>

<?php get_header(); ?>

<div class="wrapper">

  <!-- Featured Image as Banner -->
  <?php if ( has_post_thumbnail() ) : ?>
    <div class="front-banner">
      <?php the_post_thumbnail('full'); ?>
    </div>
  <?php endif; ?>

  <!-- Page Title from WordPress Editor -->
  <h1 class="page-header"><?php the_title(); ?></h1>

  <!-- Page Content from WordPress Editor -->
  <div class="page-content">
    <?php
    if ( have_posts() ) :
      while ( have_posts() ) : the_post();
        the_content();
      endwhile;
    endif;
    ?>
  </div>

  <!-- Products Section -->
  <section class="products">
    <h2>Our Products</h2>

    <div class="products-grid">
      <?php
      $product_query = new WP_Query([
        'post_type'      => 'products',
        'posts_per_page' => 3,
      ]);

      if ( $product_query->have_posts() ) :
        while ( $product_query->have_posts() ) : $product_query->the_post(); ?>

          <div class="product-card">
            <a href="<?php the_permalink(); ?>">

              <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail('medium'); ?>
              <?php endif; ?>

              <h3><?php the_title(); ?></h3>

            </a>
          </div>

        <?php endwhile;
        wp_reset_postdata();
      else : ?>
        <p>No products found.</p>
      <?php endif; ?>
    </div>
  </section>

</div><!-- /.wrapper -->

<?php get_footer(); ?>
