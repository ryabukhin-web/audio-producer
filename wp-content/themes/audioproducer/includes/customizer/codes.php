<?php

function theme_codes_customizer_section($wp_customize)
{
    $wp_customize->add_setting("theme_code_header_handle");
    $wp_customize->add_setting("theme_code_after_body_handle");
    $wp_customize->add_setting("theme_code_before_close_body_handle");

    $wp_customize->add_section("theme_codes_section", array(
        "title" => __("Installing codes", 'mora'),
        "priority" => 30
    ));

    /* Hedaer codes control */
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'theme_code_header_handle_input',
            array(
                'label'          => __('Codes inside <head>', 'mora'),
                'section'        => 'theme_codes_section',
                'settings'       => 'theme_code_header_handle',
                'type'           => 'textarea'
            )
        )
    );

    /* Open BODY control */
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'theme_code_after_body_handle_input',
            array(
                'label'          => __('Codes after the opening <body>', 'mora'),
                'section'        => 'theme_codes_section',
                'settings'       => 'theme_code_after_body_handle',
                'type'           => 'textarea'
            )
        )
    );

    /* Close BODY control */
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'theme_code_before_close_body_handle_input',
            array(
                'label'          => __('Codes before closing </body>', 'mora'),
                'section'        => 'theme_codes_section',
                'settings'       => 'theme_code_before_close_body_handle',
                'type'           => 'textarea'
            )
        )
    );
}
