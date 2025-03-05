<?php
function minimalist_theme_setup() {
    // Enable dynamic title tag
    add_theme_support('title-tag');

    // Enable featured images (post thumbnails)
    add_theme_support('post-thumbnails');

    // Register navigation menus
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'minimalist-skincare'),
    ));

    // Add support for custom logo
    add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'minimalist_theme_setup');
?>
