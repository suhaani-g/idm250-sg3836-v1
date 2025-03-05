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
 * 2. Enqueue Theme Styles & Scripts
 * ---------------------------
 * This function loads the CSS and JS files properly.
 */
function skincare_enqueue_assets() {
    // Load Normalize.css for consistent styling
    wp_enqueue_style('normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css', [], '8.0.1');

    // Ensure main.css exists before enqueueing
    $css_path = get_template_directory() . '/dist/css/main.css'; 
    if (file_exists($css_path)) {
        wp_enqueue_style('skincare-main-style', get_template_directory_uri() . '/dist/css/main.css', [], filemtime($css_path));
    }

    // Ensure main.js exists before enqueueing
    $js_path = get_template_directory() . '/dist/js/main.js'; 
    if (file_exists($js_path)) {
        wp_enqueue_script('skincare-main-script', get_template_directory_uri() . '/dist/js/main.js', [], filemtime($js_path), true);
    }
}
add_action('wp_enqueue_scripts', 'skincare_enqueue_assets');

/* ---------------------------
 * 3. Register Theme Features
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
 * 4. Disable WordPress Admin Bar for Non-Admins
 * ---------------------------
 */
function skincare_disable_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}
add_action('after_setup_theme', 'skincare_disable_admin_bar');

/* ---------------------------
 * 5. Ensure Favicon is Loaded
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
