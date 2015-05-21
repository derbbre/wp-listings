<?php

function wp_listings_customize_register( $wp_customize ) {

    // WordPress SEO Panel
    $wp_customize->add_panel( 'wp_listings_panel', array(
            'priority' => '10',
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'WP Listings', 'wordpress-seo' ),
            'description' => __( 'Customize your WP Listings Settings.', 'wp_listings' ),
    ) );


    // CSS Section
    $wp_customize->add_section( 'wp_listings_css_customizer_section' , array(
            'title'      => __( 'WP Listings CSS', 'wpseo' ),
            'description' => __( 'Choose if you want to load WP Listings Default CSS.', 'wp_listings' ),
            'priority'   => 30,
            'panel' => 'wp_listings_panel',
        ) );

    // Options Section
    $wp_customize->add_section( 'wp_listings_options_customizer_section' , array(
            'title'      => __( 'Options', 'wpseo' ),
            'description' => __( ''),
            'panel' => 'wp_listings_panel',
        ) );

    // Enable or Disable Main CSS Settings
    $wp_customize->add_setting( 'plugin_wp_listings_settings[wp_listings_stylesheet_load]' , array(
            'default'     => '',
            'type' => 'option',
            'transport'   => 'refresh',
        ) );

    // Enable or Disable Widget CSS Settings
    $wp_customize->add_setting( 'plugin_wp_listings_settings[wp_listings_widgets_stylesheet_load]' , array(
            'default'     => '',
            'type' => 'option',
            'transport'   => 'refresh',
        ) );

    // Default State Option
    $wp_customize->add_setting( 'plugin_wp_listings_settings[wp_listings_default_state]' , array(
            'default'     => '',
            'type' => 'option',
            'transport'   => 'refresh',
        ) );


    // Default Number of Listings Option
    $wp_customize->add_setting( 'plugin_wp_listings_settings[wp_listings_archive_posts_num]' , array(
            'default'     => '',
            'type' => 'option',
            'transport'   => 'refresh',
        ) );


     // Enable or Disable Main CSS Controls
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_listings_maincss_deregister' , array(
                'label'        => __( 'Deregister WP Listings Main CSS', 'wp_listings' ),
                'description'  => __( '', 'wp_listings' ),
                'type'         => 'checkbox',
                'section'      => 'wp_listings_css_customizer_section',
                'settings'     => 'plugin_wp_listings_settings[wp_listings_stylesheet_load]',
                'context'      => ''
         ) ) );


     // Enable or Disable Widget CSS Controls
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_listings_widgetcss_deregister' , array(
                'label'        => __( 'Deregister WP Listings Widget CSS', 'wp_listings' ),
                'priority' => 12,
                'description'  => __( '', 'wp_listings' ),
                'type'         => 'checkbox',
                'section'      => 'wp_listings_css_customizer_section',
                'settings'     => 'plugin_wp_listings_settings[wp_listings_widgets_stylesheet_load]',
                'context'      => ''
         ) ) );


     // Default Number of Listings Controls
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_listings_default_listings' , array(
                'label'        => __( 'Default Number of Listings', 'wp_listings' ),
                'description'  => __( 'The default number of listings displayed on a archive page is 9. Here you can set a custom number. Enter -1 to display all listing posts. We recommend NOT using a number above 20.', 'wp_listings' ),
                'type'         => 'text',
                'section'      => 'wp_listings_options_customizer_section',
                'settings'     => 'plugin_wp_listings_settings[wp_listings_archive_posts_num]',
                'context'      => ''
         ) ) );


              // Default State Controls
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_listings_default_state' , array(
                'label'        => __( 'Default State', 'wp_listings' ),
                'description'  => __( 'You can enter a default state that will automatically be output on template pages and widgets that show the state. ', 'wp_listings' ),
                'type'         => 'text',
                'section'      => 'wp_listings_options_customizer_section',
                'settings'     => 'plugin_wp_listings_settings[wp_listings_default_state]',
                'context'      => ''
         ) ) );

}
add_action( 'customize_register', 'wp_listings_customize_register' );