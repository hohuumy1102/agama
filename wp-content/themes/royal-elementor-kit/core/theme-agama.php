<?php
$theme_version = wp_get_theme()->get('Version');
define('VERSION', $theme_version);
function custom_scripts()
{
    wp_enqueue_style('swiper-style', get_template_directory_uri() . '/assets/css/swiper.min.css', array(), VERSION);
    wp_enqueue_style('agana-style', get_template_directory_uri() . '/assets/css/agama.css', array(), null);

}
add_action('wp_enqueue_scripts', 'custom_scripts');
////////////////////////////////////////////
/////////// REGISTER JAVASCRIPT ////////////
////////////////////////////////////////////
function webase_js()
{
    wp_enqueue_script('swiper-scripts', get_stylesheet_directory_uri() . '/assets/js/swiper.min.js', array('jquery'), VERSION);
    wp_enqueue_script('main-scripts', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), VERSION);

}
add_action('wp_enqueue_scripts', 'webase_js');
