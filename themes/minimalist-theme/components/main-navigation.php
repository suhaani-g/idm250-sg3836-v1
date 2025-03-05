<nav class="main-navigation">
    <?php
    wp_nav_menu([
        'theme_location' => 'primary-menu',
        'menu_class'     => 'nav-menu',
        'container'      => 'ul',
        'fallback_cb'    => false
    ]);
    ?>
</nav>