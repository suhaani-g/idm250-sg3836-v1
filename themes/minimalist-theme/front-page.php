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
  <?php get_template_part('components/about-section'); ?>
  <?php get_template_part('components/featured-products'); ?>
  <?php get_template_part('components/testimonials'); ?>
</div>

<?php get_footer(); ?>
