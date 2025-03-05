<?php

/**
 * Register custom taxonomies.
 *
 * This function creates a "Project Categories" taxonomy, allowing projects to be categorized.
 *
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 * @return void
 */
function register_custom_project_category()
{
    $taxonomy_name = 'project-categories'; // Taxonomy slug (lowercase, no spaces)
    $post_types = ['projects']; // Post types associated with this taxonomy

    $args = [
        'labels' => [
            'name' => 'Project Categories',
            'singular_name' => 'Project Category',
            'search_items' => 'Search Project Categories',
            'all_items' => 'All Project Categories',
            'parent_item' => 'Parent Project Category',
            'parent_item_colon' => 'Parent Project Type:',
            'edit_item' => 'Edit Category',
            'update_item' => 'Update Category',
            'add_new_item' => 'Add New Category',
            'new_item_name' => 'New Project Type Name',
            'menu_name' => 'Categories',
        ],
        'hierarchical' => true,  // True = categories, False = tags (non-hierarchical)
        'show_ui' => true,  // Show in admin UI
        'show_admin_column' => true,  // Show taxonomy in post type admin list
        'query_var' => true,  // Allow custom queries via URL
        'rewrite' => ['slug' => 'project/categories'], // Custom URL structure
        'show_in_rest' => true,  // Enables Gutenberg support
    ];

    register_taxonomy($taxonomy_name, $post_types, $args);
}

add_action('init', 'register_custom_project_category');