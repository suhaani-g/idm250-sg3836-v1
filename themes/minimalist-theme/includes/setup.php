<?php

/**
 * Enable support for Post Thumbnails (Featured Images).
 * This allows adding featured images to posts and pages.
 */
add_theme_support('post-thumbnails');

/**
 * Enable excerpt support for pages.
 * By default, pages do not support excerpts, so we add it manually.
 */
add_post_type_support('page', 'excerpt');

/**
 * Enqueue theme styles and scripts.
 * This function loads all modular stylesheets separately but also includes main.css as a backup.
 */
function skincare_enqueue_assets() {
    // Load Normalize.css for consistent styling
    wp_enqueue_style('normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css', [], '8.0.1');

    // Define modular CSS files
    $styles = [
        'global'     => 'dist/css/global.css',
        'header'     => 'dist/css/header.css',
        'footer'     => 'dist/css/footer.css',
        'buttons'    => 'dist/css/buttons.css',
        'pages'      => 'dist/css/pages.css',
        'components' => 'dist/css/components.css',
        'responsive' => 'dist/css/responsive.css',
        'frontpage' => 'dist/css/front-page.css',
    ];

    // Enqueue each CSS file separately
    foreach ($styles as $handle => $path) {
        $full_path = get_template_directory() . '/' . $path;
        if (file_exists($full_path)) {
            wp_enqueue_style("skincare-{$handle}-style", get_template_directory_uri() . '/' . $path, [], filemtime($full_path));
        }
    }

    // Enqueue main.css as a fallback in case individual files are missing
    $main_css_path = get_template_directory() . '/dist/css/main.css';
    if (file_exists($main_css_path)) {
        wp_enqueue_style('skincare-main-style', get_template_directory_uri() . '/dist/css/main.css', [], filemtime($main_css_path));
    }

    // Enqueue JavaScript
    $js_path = get_template_directory() . '/dist/js/main.js';
    if (file_exists($js_path)) {
        wp_enqueue_script('skincare-main-script', get_template_directory_uri() . '/dist/js/main.js', [], filemtime($js_path), true);
    }
}
add_action('wp_enqueue_scripts', 'skincare_enqueue_assets');

/**
 * Register theme navigation menus.
 */
function register_theme_menus() {
    register_nav_menus([
        'left-menu' => __('Left Menu', 'minimalist-theme'),
        'right-menu' => __('Right Menu', 'minimalist-theme'),
        'footer-menu' => __('Footer Menu', 'minimalist-theme')
    ]);
}
add_action('init', 'register_theme_menus');

/**
 * Theme Setup Function.
 */
function minimalist_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    register_nav_menus([
        'primary-menu' => __('Primary Menu', 'minimalist-skincare')
    ]);

    add_theme_support('custom-logo', [
        'height' => 250,
        'width' => 250,
        'flex-width' => true,
        'flex-height' => true,
    ]);
}
add_action('after_setup_theme', 'minimalist_theme_setup');
