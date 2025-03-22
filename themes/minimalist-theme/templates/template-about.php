<?php
/**
 * Template Name: Custom Page with Sidebar
 */
get_header(); ?>

<div class="wrapper sidebar-layout">
  
  <main class="site-main">
    <header class="page-header">
      <h1><?php echo get_the_title(); ?></h1>
    </header>

    <?php if ( has_post_thumbnail() ) : ?>
      <div class="featured-image">
        <?php the_post_thumbnail(); ?>
      </div>
    <?php endif; ?>

    <div class="main-content">
      <?php get_template_part( 'components/content' ); ?>
    </div>
    
  </main>

  <aside class="sidebar">
    <?php get_sidebar(); ?>
  </aside>

</div>

<?php get_footer(); ?>
