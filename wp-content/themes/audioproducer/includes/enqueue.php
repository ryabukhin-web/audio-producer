<?php

function links_enqueue () {

    wp_enqueue_style('swiper', get_template_directory_uri() . '/css/swiper-bundle.min.css');
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('custom', get_template_directory_uri() . '/css/custom.css');

    wp_enqueue_script('jquery');
    wp_enqueue_script('swiper', get_template_directory_uri() . '/js/swiper-bundle.min.js', '', '', true);
    wp_enqueue_script('app', get_template_directory_uri() . '/js/app.js', '', '', true);
    
}
