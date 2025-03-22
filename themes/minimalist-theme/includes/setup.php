<?php

/**
 * Theme Setup File
 *
 * This file contains theme support declarations, asset loading,
 * and navigation menu registration.
 *
 * @package minimalist-theme
 */

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

add_theme_support('align-wide');
/**
 * Theme Setup Function.
 *
 * Enables title tag support, post thumbnails, custom logo, and registers menus.
 */
function skincare_theme_setup() {

    // Enable support for dynamic document title tag
    add_theme_support('title-tag');

    // Enable support for post thumbnails
    add_theme_support('post-thumbnails');

    // Enable support for a custom logo
    add_theme_support('custom-logo', [
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ]);

    // Register primary navigation menu
    register_nav_menus([
        'primary-menu' => __('Primary Menu', 'minimalist-theme')
    ]);
}
add_action('after_setup_theme', 'skincare_theme_setup');

/**
 * Register additional theme navigation menus.
 */
function register_theme_menus() {
    register_nav_menus([
        'left-menu'   => __('Left Menu', 'minimalist-theme'),
        'right-menu'  => __('Right Menu', 'minimalist-theme'),
        'footer-menu' => __('Footer Menu', 'minimalist-theme')
    ]);
}
add_action('init', 'register_theme_menus');

/**
 * Enqueue theme styles and scripts.
 *
 * This function loads all modular stylesheets separately
 * but also includes main.css as a backup.
 */
function skincare_enqueue_assets() {

    // Load Normalize.css for consistent styling
    wp_enqueue_style(
        'normalize',
        'https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css',
        [],
        '8.0.1'
    );

    // Enqueue global stylesheet
    if (file_exists(get_template_directory() . '/dist/css/global.css')) {
        wp_enqueue_style(
            'skincare-global-style',
            get_template_directory_uri() . '/dist/css/global.css',
            [],
            filemtime(get_template_directory() . '/dist/css/global.css')
        );
    }

    // Enqueue header stylesheet
    if (file_exists(get_template_directory() . '/dist/css/header.css')) {
        wp_enqueue_style(
            'skincare-header-style',
            get_template_directory_uri() . '/dist/css/header.css',
            [],
            filemtime(get_template_directory() . '/dist/css/header.css')
        );
    }

    // Enqueue footer stylesheet
    if (file_exists(get_template_directory() . '/dist/css/footer.css')) {
        wp_enqueue_style(
            'skincare-footer-style',
            get_template_directory_uri() . '/dist/css/footer.css',
            [],
            filemtime(get_template_directory() . '/dist/css/footer.css')
        );
    }

    // Enqueue buttons stylesheet
    if (file_exists(get_template_directory() . '/dist/css/buttons.css')) {
        wp_enqueue_style(
            'skincare-buttons-style',
            get_template_directory_uri() . '/dist/css/buttons.css',
            [],
            filemtime(get_template_directory() . '/dist/css/buttons.css')
        );
    }

    // Enqueue pages stylesheet
    if (file_exists(get_template_directory() . '/dist/css/pages.css')) {
        wp_enqueue_style(
            'skincare-pages-style',
            get_template_directory_uri() . '/dist/css/pages.css',
            [],
            filemtime(get_template_directory() . '/dist/css/pages.css')
        );
    }

    // Enqueue responsive stylesheet
    if (file_exists(get_template_directory() . '/dist/css/responsive.css')) {
        wp_enqueue_style(
            'skincare-responsive-style',
            get_template_directory_uri() . '/dist/css/responsive.css',
            [],
            filemtime(get_template_directory() . '/dist/css/responsive.css')
        );
    }

    // Enqueue front page stylesheet
    if (file_exists(get_template_directory() . '/dist/css/front-page.css')) {
        wp_enqueue_style(
            'skincare-front-page-style',
            get_template_directory_uri() . '/dist/css/front-page.css',
            [],
            filemtime(get_template_directory() . '/dist/css/front-page.css')
        );
    }

    // Enqueue single post stylesheet
    if (file_exists(get_template_directory() . '/dist/css/single.css')) {
        wp_enqueue_style(
            'skincare-single-style',
            get_template_directory_uri() . '/dist/css/single.css',
            [],
            filemtime(get_template_directory() . '/dist/css/single.css')
        );
    }

    // Enqueue archive stylesheet
    if (file_exists(get_template_directory() . '/dist/css/archive.css')) {
        wp_enqueue_style(
            'skincare-archive-style',
            get_template_directory_uri() . '/dist/css/archive.css',
            [],
            filemtime(get_template_directory() . '/dist/css/archive.css')
        );
    }

    // Enqueue sidebar stylesheet
    if (file_exists(get_template_directory() . '/dist/css/sidebar.css')) {
        wp_enqueue_style(
            'skincare-sidebar-style',
            get_template_directory_uri() . '/dist/css/sidebar.css',
            [],
            filemtime(get_template_directory() . '/dist/css/sidebar.css')
        );
    }

    // Enqueue about template stylesheet
    if (file_exists(get_template_directory() . '/dist/css/template-about.css')) {
        wp_enqueue_style(
            'skincare-template-about-style',
            get_template_directory_uri() . '/dist/css/template-about.css',
            [],
            filemtime(get_template_directory() . '/dist/css/template-about.css')
        );
    }

    // Enqueue main.css as a fallback in case individual files are missing
    if (file_exists(get_template_directory() . '/dist/css/main.css')) {
        wp_enqueue_style(
            'skincare-main-style',
            get_template_directory_uri() . '/dist/css/main.css',
            [],
            filemtime(get_template_directory() . '/dist/css/main.css')
        );
    }

    // Enqueue main JavaScript file
    if (file_exists(get_template_directory() . '/dist/js/main.js')) {
        wp_enqueue_script(
            'skincare-main-script',
            get_template_directory_uri() . '/dist/js/main.js',
            [],
            filemtime(get_template_directory() . '/dist/js/main.js'),
            true // Load script in the footer
        );
    }
}
add_action('wp_enqueue_scripts', 'skincare_enqueue_assets');
