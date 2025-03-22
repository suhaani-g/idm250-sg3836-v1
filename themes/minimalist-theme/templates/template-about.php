<?php
/*
Template Name: Page with Sidebar
*/
get_header(); ?>

<div class="wrapper sidebar-layout">

  <main class="site-main">
    <h1 class="page-header"><?php echo get_the_title(); ?></h1>

    <?php
    if ( has_post_thumbnail() ) :
      echo '<div class="featured-image">';
      the_post_thumbnail();
      echo '</div>';
    endif;
    ?>

    <div class="page-content">
      <?php
      while ( have_posts() ) :
        the_post();
        the_content();
      endwhile;
      ?>
    </div>
  </main>

  <?php get_sidebar(); // Include the sidebar.php ?>

</div>

<?php get_footer(); ?>
