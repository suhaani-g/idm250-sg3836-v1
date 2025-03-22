<?php
/**
 * Template Name: About Page with Sidebar
 *
 * A custom About Page template that includes a sidebar.
 *
 * @package minimalist-theme
 */

get_header();
?>

<div class="wrapper about-page-with-sidebar">

  <div class="content-area">
    <h1 class="page-header"><?php the_title(); ?></h1>

    <?php if (has_post_thumbnail()) : ?>
      <div class="featured-image">
        <?php the_post_thumbnail(); ?>
      </div>
    <?php endif; ?>

    <div class="page-content">
      <?php
      if (have_posts()) :
        while (have_posts()) : the_post();
          the_content(); // Content from the WordPress editor
        endwhile;
      endif;
      ?>
    </div>
  </div>

  <aside class="sidebar-area">
    <?php if (is_active_sidebar('primary-sidebar')) : ?>
      <?php dynamic_sidebar('primary-sidebar'); ?>
    <?php else : ?>
      <p>Add widgets to the sidebar in Appearance > Widgets.</p>
    <?php endif; ?>
  </aside>

</div>

<?php get_footer(); ?>
