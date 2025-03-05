<?php

// Prevent redeclaring functions
if (!function_exists('skincare_add_logo')) {
    function skincare_add_logo() {
        add_theme_support('custom-logo', [
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ]);
    }
    add_action('after_setup_theme', 'skincare_add_logo');
}

/**
 * Registers Theme Customizer settings.
 */
if (!function_exists('skincare_customize_register')) {
    function skincare_customize_register($wp_customize) {

        // === Theme Colors Section ===
        if (class_exists('WP_Customize_Color_Control')) {
            $wp_customize->add_section('theme_colors', [
                'title'    => __('Theme Colors', 'minimalist-theme'),
                'priority' => 30,
            ]);

            $colors = [
                'primary_color'   => ['label' => __('Primary Color', 'minimalist-theme'), 'default' => '#4A4A4A'],
                'secondary_color' => ['label' => __('Secondary Color', 'minimalist-theme'), 'default' => '#8A7358'],
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
        }

        // === Custom Banner Section ===
        $wp_customize->add_section('custom_banner_section', [
            'title'    => __('Custom Banner', 'minimalist-theme'),
            'priority' => 25,
        ]);

        $wp_customize->add_setting('custom_banner_image', [
            'default'   => '',
            'sanitize_callback' => 'esc_url',
        ]);

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_banner_image', [
            'label'   => __('Upload Banner Image', 'minimalist-theme'),
            'section' => 'custom_banner_section',
            'settings' => 'custom_banner_image',
        ]));

        // === Homepage Sections - Editable Titles ===
        $sections = [
            'hero_title'         => ['label' => __('Hero Title', 'minimalist-theme'), 'default' => 'Minimalist Skincare'],
            'hero_subtitle'      => ['label' => __('Hero Subtitle', 'minimalist-theme'), 'default' => 'Experience the purity of natural skincare.'],
            'featured_title'     => ['label' => __('Featured Products Title', 'minimalist-theme'), 'default' => 'Best Sellers'],
            'testimonials_title' => ['label' => __('Testimonials Title', 'minimalist-theme'), 'default' => 'What Our Customers Say'],
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

        // === About Us Page Customization ===
        $wp_customize->add_section('about_us_section', [
            'title'    => __('About Us Page', 'minimalist-theme'),
            'priority' => 31,
        ]);

        $wp_customize->add_setting('about_us_heading', [
            'default'   => 'About Us',
            'sanitize_callback' => 'sanitize_text_field',
        ]);
        $wp_customize->add_control('about_us_heading', [
            'label'   => __('Main Heading', 'minimalist-theme'),
            'section' => 'about_us_section',
            'type'    => 'text',
        ]);

        $wp_customize->add_setting('about_us_subheading', [
            'default'   => 'Our mission is to create something amazing.',
            'sanitize_callback' => 'sanitize_text_field',
        ]);
        $wp_customize->add_control('about_us_subheading', [
            'label'   => __('Subheading', 'minimalist-theme'),
            'section' => 'about_us_section',
            'type'    => 'text',
        ]);

        $wp_customize->add_setting('about_us_content', [
            'default'   => 'We are passionate about what we do and dedicated to excellence.',
            'sanitize_callback' => 'wp_kses_post',
        ]);
        $wp_customize->add_control('about_us_content', [
            'label'   => __('Main Content', 'minimalist-theme'),
            'section' => 'about_us_section',
            'type'    => 'textarea',
        ]);

        $wp_customize->add_setting('about_us_team', [
            'default'   => 'Our Team: John Doe, Jane Smith, Michael Brown',
            'sanitize_callback' => 'sanitize_text_field',
        ]);
        $wp_customize->add_control('about_us_team', [
            'label'   => __('Team Members', 'minimalist-theme'),
            'section' => 'about_us_section',
            'type'    => 'textarea',
        ]);

        // Image Upload for About Us Page
        if (class_exists('WP_Customize_Image_Control')) {
            $wp_customize->add_setting('about_us_image', [
                'sanitize_callback' => 'esc_url',
            ]);
            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_us_image', [
                'label'   => __('Upload About Us Image', 'minimalist-theme'),
                'section' => 'about_us_section',
            ]));
        }

        // Video Embed URL for About Us Page
        $wp_customize->add_setting('about_us_video', [
            'sanitize_callback' => 'esc_url',
        ]);
        $wp_customize->add_control('about_us_video', [
            'label'   => __('Video Embed URL', 'minimalist-theme'),
            'section' => 'about_us_section',
            'type'    => 'text',
        ]);
    }

    add_action('customize_register', 'skincare_customize_register');
}
