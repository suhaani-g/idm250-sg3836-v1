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
function register_skincare_post_types()
{
    $post_type_name = 'products';

    $args = [
        'labels' => [
            'name'               => 'Products',
            'singular_name'      => 'Product',
            'add_new'            => 'Add New Product',
            'add_new_item'       => 'Add New Product',
            'edit_item'          => 'Edit Product',
            'new_item'           => 'New Product',
            'view_item'          => 'View Product',
            'search_items'       => 'Search Products',
            'not_found'          => 'No Products found',
            'not_found_in_trash' => 'No Products found in Trash',
        ],
        'public'        => true,            // Makes it accessible on the front and back end
        'has_archive'   => true,            // Enables an archive page for products
        'rewrite'       => ['slug' => 'products'], // URL slug for products
        'supports'      => ['title', 'editor', 'thumbnail', 'excerpt'], // Enabled post features
        'menu_position' => 5,                // Position in WP admin menu
        'menu_icon'     => 'dashicons-cart', // Custom icon for the post type (shopping cart)
        'show_in_rest'  => true,             // Enables Gutenberg support
        //'taxonomies'  => ['product-categories'], // Uncomment if you add product categories
    ];

    register_post_type($post_type_name, $args);
}

add_action('init', 'register_skincare_post_types');
