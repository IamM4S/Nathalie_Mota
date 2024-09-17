<?php
/*
// Add support for featured images
add_theme_support( 'post-thumbnails' );

// Automatically add site title to the site header
add_theme_support( 'title-tag' );
*/

function nm_theme_assets() {

    //Declare the JS
    wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0', true);

    //Declare the style.css file at the root of the theme
    wp_enqueue_style('style', get_stylesheet_uri(), array(), '1.0');

    //Declare the CSS file in another location
    wp_enqueue_style('css', get_stylesheet_uri() . '/css/main.css', array(), '1.0');

}
add_action('wp_enqueue_scripts' , 'nm_theme_assets');