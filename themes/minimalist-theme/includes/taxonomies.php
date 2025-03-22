<?php

/**
 * Register custom taxonomies.
 *
 * This function creates a "Project Categories" taxonomy, allowing projects to be categorized.
 *
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 * @return void
 */

function register_products_post_type()
{
    $args = [
        'labels' => [
            'name'               => 'Products',
            'singular_name'      => 'Product',
            'add_new'            => 'Add New Product',
            'add_new_item'       => 'Add New Product',
            'edit_item'          => 'Edit Product',
            'new_item'           => 'New Product',
            'all_items'          => 'All Products',
            'view_item'          => 'View Product',
            'search_items'       => 'Search Products',
            'not_found'          => 'No products found',
            'not_found_in_trash' => 'No products found in Trash',
            'menu_name'          => 'Products',
        ],
        'public'             => true, 
        'has_archive'        => true, 
        'rewrite'            => ['slug' => 'products'], // Custom URL structure
        'show_in_rest'       => true, // Gutenberg/REST API
        'supports'           => ['title', 'editor', 'thumbnail', 'excerpt'], 
        'menu_icon'          => 'dashicons-cart', 
    ];

    register_post_type('products', $args);
}
add_action('init', 'register_products_post_type');



/**
 * Register "Product Categories" taxonomy for Products.
 */
function register_product_category_taxonomy()
{
    $taxonomy_name = 'product_category'; // Slug for the taxonomy
    $post_types = ['products'];

    $args = [
        'labels' => [
            'name'              => 'Product Categories',
            'singular_name'     => 'Product Category',
            'search_items'      => 'Search Product Categories',
            'all_items'         => 'All Product Categories',
            'parent_item'       => 'Parent Product Category',
            'parent_item_colon' => 'Parent Product Category:',
            'edit_item'         => 'Edit Product Category',
            'update_item'       => 'Update Product Category',
            'add_new_item'      => 'Add New Product Category',
            'new_item_name'     => 'New Product Category Name',
            'menu_name'         => 'Categories',
        ],
        'hierarchical'      => true, // Acts like categories (true); false makes it like tags.
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => ['slug' => 'products/categories'],
        'show_in_rest'      => true,
    ];

    register_taxonomy($taxonomy_name, $post_types, $args);

    // Add default categories if they don't exist.
    $default_terms = ['Creams', 'Cleansers', 'Serums'];

    foreach ($default_terms as $term) {
        if (!term_exists($term, $taxonomy_name)) {
            wp_insert_term($term, $taxonomy_name);
        }
    }
}
add_action('init', 'register_product_category_taxonomy');
