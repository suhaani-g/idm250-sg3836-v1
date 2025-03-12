<?php
/**
 * Minimalist Skincare Theme Functions
 * Initializes theme features and includes external PHP files.
 */

/* ---------------------------
 * 1. Safely Include Required Theme Files
 * ---------------------------
 * This ensures your theme remains modular and organized.
 */
$includes = [
    'setup.php',
    'theme-customize.php',
    'widgets.php',
    'post-types.php',
    'taxonomies.php',
    'helper.php'
];

foreach ($includes as $file) {
    $path = get_template_directory() . '/includes/' . $file;
    if (file_exists($path)) {
        require_once $path;
    }
}

/* ---------------------------
 * 2. Register Theme Features
 * ---------------------------
 * Enables important WordPress features.
 */
function skincare_theme_setup() {
    // Enable support for dynamic title tags
    add_theme_support('title-tag');

    // Enable featured images (post thumbnails)
    add_theme_support('post-thumbnails');

    // Register navigation menus
    register_nav_menus([
        'left-menu' => __('Left Menu', 'minimalist-theme'),
        'right-menu' => __('Right Menu', 'minimalist-theme'),
        'footer-menu' => __('Footer Menu', 'minimalist-theme')
    ]);

    // Enable custom logo support
    add_theme_support('custom-logo', [
        'height' => 250,
        'width' => 250,
        'flex-width' => true,
        'flex-height' => true,
    ]);
}
add_action('after_setup_theme', 'skincare_theme_setup');

/* ---------------------------
 * 3. Disable WordPress Admin Bar for Non-Admins
 * ---------------------------
 */
function skincare_disable_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}
add_action('after_setup_theme', 'skincare_disable_admin_bar');

/* ---------------------------
 * 4. Ensure Favicon is Loaded
 * ---------------------------
 * Uses WordPress' built-in site icon system if available.
 */
function skincare_add_favicon() {
    if (function_exists('get_site_icon_url') && get_site_icon_url()) {
        echo '<link rel="icon" href="' . esc_url(get_site_icon_url()) . '" />';
    } else {
        echo '<link rel="icon" href="' . get_template_directory_uri() . '/dist/images/favicon.ico" />';
    }
}
add_action('wp_head', 'skincare_add_favicon');

require get_template_directory() . '/includes/theme-customize.php';

/* ---------------------------
 * 4. Single Post
 * --------------------------- */

// Load Metaboxes
require get_template_directory() . '/includes/metabox.php';
