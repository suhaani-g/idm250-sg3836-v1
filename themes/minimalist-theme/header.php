<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>
    <?php wp_title('|', true, 'right'); bloginfo('name'); ?>
  </title>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header <?php echo is_front_page() ? 'transparent-header' : ''; ?>">
  <div class="container header-container">

    <!-- Logo -->
    <div class="logo">
      <?php if (has_custom_logo()) : ?>
        <?php the_custom_logo(); ?>
      <?php else : ?>
        <h1 class="site-title">
          <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
        </h1>
      <?php endif; ?>
    </div>

    <!-- Hamburger Toggle Button -->
    <button class="menu-toggle" id="menu-toggle" aria-label="Toggle Menu">
      <span></span>
      <span></span>
      <span></span>
    </button>

    <!-- Navigation Menu -->
    <nav class="main-navigation" id="main-navigation">
      <?php
      wp_nav_menu([
        'theme_location' => 'primary-menu', 
        'menu_class'     => 'nav-menu',
        'container'      => 'ul',
        'fallback_cb'    => false
      ]);
      ?>
    </nav>

  </div>
</header>
