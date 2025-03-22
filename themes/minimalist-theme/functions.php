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


function minimalist_register_sidebar() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'minimalist-theme' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here.', 'minimalist-theme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'minimalist_register_sidebar' );
