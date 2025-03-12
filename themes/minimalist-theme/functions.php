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

function add_product_meta_boxes() {
    add_meta_box(
        'product_details',
        'Product Details',
        'render_product_details_box',
        'products',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'add_product_meta_boxes');

function render_product_details_box($post) {
    $price = get_post_meta($post->ID, '_product_price', true);
    $ingredients = get_post_meta($post->ID, '_product_ingredients', true);
    
    ?>
    <label for="product_price">Price ($)</label>
    <input type="number" id="product_price" name="product_price" value="<?php echo esc_attr($price); ?>" />

    <label for="product_ingredients">Ingredients</label>
    <textarea id="product_ingredients" name="product_ingredients"><?php echo esc_textarea($ingredients); ?></textarea>
    <?php
}

function save_product_meta($post_id) {
    if (array_key_exists('product_price', $_POST)) {
        update_post_meta($post_id, '_product_price', sanitize_text_field($_POST['product_price']));
    }
    if (array_key_exists('product_ingredients', $_POST)) {
        update_post_meta($post_id, '_product_ingredients', sanitize_textarea_field($_POST['product_ingredients']));
    }
}
add_action('save_post', 'save_product_meta');
