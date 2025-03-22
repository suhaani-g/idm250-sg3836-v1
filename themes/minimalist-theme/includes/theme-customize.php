<?php
/**
 * Registers Theme Customizer settings.
 *
 * Adds color options for primary and secondary theme colors.
 */
if ( ! function_exists( 'minimalist_theme_customize_register' ) ) {
    function minimalist_theme_customize_register($wp_customize) {

        // Add a section for theme colors
        $wp_customize->add_section('theme_colors', [
            'title'    => __('Theme Colors', 'minimalist-theme'),
            'priority' => 30,
        ]);

        // Primary and secondary color settings
        $colors = [
            'primary_color' => [
                'label'   => __('Primary Color', 'minimalist-theme'),
                'default' => '#4A4A4A',
            ],
            'secondary_color' => [
                'label'   => __('Secondary Color', 'minimalist-theme'),
                'default' => '#8A7358',
            ],
        ];

        // Register each color setting and control
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
    add_action('customize_register', 'minimalist_theme_customize_register');
}