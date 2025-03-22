<?php
/**
 * Front Page Template
 *
 * This controls the homepage layout of the Minimalist Skincare website.
 *
 *  WordPress uses `front-page.php` when:
 *   - "A static page" is selected as the homepage in **Settings > Reading**.
 *
 * Features:
 *   - Custom hero section for branding.
 *   - Featured products section.
 *   - Testimonials for social proof.
 *   - About the brand.
 *
 * @package MinimalistSkincare
 */
?>

<?php get_header(); ?>

<?php get_template_part('components/custom-banner'); ?>

<div class="wrapper">
  <?php get_template_part('components/hero-home'); ?>
  

</div>

<?php
/**
 * Front Page Template
 *
 * Displays the front page content and the latest 3 products.
 *
 * @package minimalist-theme
 */

get_header();
?>

<div class="wrapper">

  <!-- Page Title from WordPress Editor -->
  <h1 class="page-header"><?php the_title(); ?></h1>

  <!-- Featured Image from WordPress Editor -->
  <?php if (has_post_thumbnail()) : ?>
    <div class="featured-image">
      <?php the_post_thumbnail(); ?>
    </div>
  <?php endif; ?>

  <!-- Page Content from WordPress Editor -->
  <div class="page-content">
    <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
        the_content();
      endwhile;
    endif;
    ?>
  </div>

  <!-- Simple Products Section -->
  <section class="products">
    <h2>Our Products</h2>

    <div class="products-grid">
      <?php
      $product_query = new WP_Query([
        'post_type'      => 'products',
        'posts_per_page' => 3,
      ]);

      if ($product_query->have_posts()) :
        while ($product_query->have_posts()) : $product_query->the_post(); ?>

          <div class="product-card">
            <a href="<?php the_permalink(); ?>">

              <?php if (has_post_thumbnail()) : ?>
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

</div>

<?php get_footer(); ?>

<?php get_footer(); ?>
