<?php

/**
 * Enable support for a custom logo.
 */
function skincare_add_logo() {
    add_theme_support('custom-logo', [
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ]);
}
add_action('after_setup_theme', 'skincare_add_logo');

/**
 * Registers Theme Customizer settings.
 */
function skincare_customize_register($wp_customize) {
    //  Theme Colors Section
    $wp_customize->add_section('theme_colors', [
        'title'    => __('Theme Colors', 'minimalist-skincare'),
        'priority' => 30,
    ]);

    $colors = [
        'primary_color'   => ['label' => __('Primary Color', 'minimalist-skincare'), 'default' => '#ff6600'],
        'secondary_color' => ['label' => __('Secondary Color', 'minimalist-skincare'), 'default' => '#0066ff'],
    ];

    foreach ($colors as $color_id => $color) {
        $wp_customize->add_setting($color_id, [
            'default'           => $color['default'],
            'sanitize_callback' => 'sanitize_hex_color',
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            $color_id,
            [
                'label'    => $color['label'],
                'section'  => 'theme_colors',
                'settings' => $color_id,
            ]
        ));
    }

    //  Homepage Sections - Editable Titles
    $sections = [
        'hero_title'         => ['label' => __('Hero Title', 'minimalist-skincare'), 'default' => 'Minimalist Skincare'],
        'hero_subtitle'      => ['label' => __('Hero Subtitle', 'minimalist-skincare'), 'default' => 'Experience the purity of natural skincare.'],
        'featured_title'     => ['label' => __('Featured Products Title', 'minimalist-skincare'), 'default' => 'Best Sellers'],
        'testimonials_title' => ['label' => __('Testimonials Title', 'minimalist-skincare'), 'default' => 'What Our Customers Say'],
    ];

    foreach ($sections as $section_id => $section) {
        $wp_customize->add_setting($section_id, [
            'default'           => $section['default'],
            'sanitize_callback' => 'sanitize_text_field',
        ]);

        $wp_customize->add_control($section_id, [
            'label'    => $section['label'],
            'section'  => 'theme_colors', 
            'type'     => 'text',
        ]);
    }

    // About Section - Customizable Title & Text
    $wp_customize->add_section('about_section', [
        'title'    => __('About Section', 'minimalist-skincare'),
        'priority' => 31,
    ]);

    $wp_customize->add_setting('about_section_title', [
        'default'   => 'About Minimalist Skincare',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('about_section_title', [
        'label'    => __('About Section Title', 'minimalist-skincare'),
        'section'  => 'about_section',
        'type'     => 'text',
    ]);

    $wp_customize->add_setting('about_section_text', [
        'default'   => 'We believe in simplicity, purity, and effectiveness.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);

    $wp_customize->add_control('about_section_text', [
        'label'    => __('About Section Text', 'minimalist-skincare'),
        'section'  => 'about_section',
        'type'     => 'textarea',
    ]);

    // Best Sellers Title
    $wp_customize->add_section('best_sellers_section', [
        'title'    => __('Best Sellers Section', 'minimalist-skincare'),
        'priority' => 32,
    ]);

    $wp_customize->add_setting('best_sellers_title', [
        'default'   => 'Best Sellers',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('best_sellers_title', [
        'label'    => __('Best Sellers Title', 'minimalist-skincare'),
        'section'  => 'best_sellers_section',
        'type'     => 'text',
    ]);
}
add_action('customize_register', 'skincare_customize_register');

/**
 * Outputs dynamic theme colors to the site's CSS.
 */
function skincare_customizer_css() {
    ?>
    <style>
        :root {
            --primary-color: <?php echo esc_attr(get_theme_mod('primary_color', '#ff6600')); ?>;
            --secondary-color: <?php echo esc_attr(get_theme_mod('secondary_color', '#0066ff')); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'skincare_customizer_css');

/**
 * Hero Banner
 */
function skincare_customizer_settings($wp_customize) {
    $wp_customize->add_section('custom_banner_section', [
        'title'    => __('Homepage Banner', 'minimalist-theme'),
        'priority' => 30,
    ]);

    $wp_customize->add_setting('custom_banner_image', [
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_banner_image', [
        'label'    => __('Upload a Custom Banner Image', 'minimalist-theme'),
        'section'  => 'custom_banner_section',
        'settings' => 'custom_banner_image',
    ]));
}

add_action('customize_register', 'skincare_customizer_settings');
