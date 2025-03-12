<?php

/**
 * Register custom post types for the Minimalist Skincare theme.
 *
 * This function registers a custom post type "Products" for managing skincare products.
 *
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 *
 * @return void
 */
function register_products_cpt() {
    $args = [
        'label' => 'Products',
        'public' => true,
        'menu_icon' => 'dashicons-cart',
        'supports' => ['title', 'editor', 'thumbnail'],
        'has_archive' => true,
    ];
    register_post_type('products', $args);
}
add_action('init', 'register_products_cpt');

