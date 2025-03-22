<?php
/**
 * Page Template
 *
 * This template is used for rendering **static pages** in WordPress.
 * These are pages created from the WordPress Admin Panel (Pages > Add New).
 *
 * 🔥 **When is this file used?**
 * WordPress uses `page.php` when displaying any individual page (e.g., About, Contact).
 *
 * 🏗️ **Template Hierarchy for Pages:**
 *   1. custom template selected via page editor (if any)
 *   2. page-{slug}.php      (e.g., page-about.php)
 *   3. page-{id}.php        (e.g., page-2.php)
 *   4. page.php             ✅ (this file)
 *   5. index.php            (fallback)
 *
 * 💡 **Key Features:**
 * - Perfect for customizing layouts for static content.
 * - Use `the_content()` to display page content dynamically.
 *
 * 🌐 **Further Reading:**
 * https://developer.wordpress.org/themes/basics/template-hierarchy/#single-page
 *
 * @package YourThemeName
 */
?>
<?php get_header(); ?>
<div class="wrapper">
  <h1 class="page-header">
    <?php echo get_the_title(); ?>
  </h1>

  <?php if (has_post_thumbnail()) : ?>
  <div class="featured-image">
    <?php the_post_thumbnail(); ?>
  </div>
  <?php endif; ?>

  <?php get_template_part('components/content'); ?>
</div>

<?php get_footer(); ?>
