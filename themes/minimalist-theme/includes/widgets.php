<?php
/**
 * Widget Areas & Sidebars for Minimalist Skincare Theme
 *
 * This file registers the widget areas (sidebars, footer widgets, etc.).
 * Widgets allow users to add small content blocks in specific sections of the theme.
 */

// Register the main sidebar for blog posts
function skincare_register_sidebars()
{
    register_sidebar([
        'name'          => 'Blog Sidebar',
        'id'            => 'blog_sidebar',
        'description'   => 'Widgets in this area will be shown on blog post pages.',
        'before_widget' => '<div class="widget blog-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);

    // Register a sidebar for shop-related pages (if needed)
    register_sidebar([
        'name'          => 'Shop Sidebar',
        'id'            => 'shop_sidebar',
        'description'   => 'Widgets in this area will be shown on product/shop pages.',
        'before_widget' => '<div class="widget shop-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);

    // Register footer widgets (e.g., social links, contact info)
    register_sidebar([
        'name'          => 'Footer Left',
        'id'            => 'footer_left',
        'description'   => 'Widgets in this area will be shown in the left footer section.',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ]);

    register_sidebar([
        'name'          => 'Footer Right',
        'id'            => 'footer_right',
        'description'   => 'Widgets in this area will be shown in the right footer section.',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ]);
}
add_action('widgets_init', 'skincare_register_sidebars');
