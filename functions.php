<?php

// Add support for featured images
add_theme_support( 'post-thumbnails' );

// Automatically add site title to the site header
add_theme_support( 'title-tag' );

// Declare Google Fonts
function wpb_add_google_fonts() {
  
    wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap', false ); 
    }
      
    add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

function nm_theme_assets() {

    //Declare the JS
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0', true);

    //Declare AJAX call
    wp_localize_script('ajax', 'nm_js', array('ajax_url' => admin_url('admin-ajax.php')));

    //Declare the style.css file at the root of the theme
    wp_enqueue_style('style', get_stylesheet_uri(), array(), '1.0');

    //Declare the CSS file in another location
    wp_enqueue_style('css', get_template_directory_uri() . '/css/main.css', array(), '1.0');

}
add_action('wp_enqueue_scripts' , 'nm_theme_assets');

function photos_scripts() {

    wp_enqueue_script('photos', get_template_directory_uri() . '/assets/js/photos.js', '1.0.0', true);

    //Declare AJAX call
    wp_localize_script('ajax', 'nm_js', array('ajax_url' => admin_url('admin-ajax.php')));
    }
    
    add_action('wp_enqueue_scripts', 'photos_scripts');

register_nav_menus( array (
    'main' => 'Main menu',
    'footer' => 'Footer',
));

function nm_request_photos() {
    $args = array(
        'post_type' => 'photos',
        'posts_per_page' => 8
    );

    $query = new WP_Query($args);
    if($query->have_posts()) {
    $response = $query;
    } else {
    $response = false;
    }
    
    wp_send_json($response);
    wp_die();
    }

add_action('wp_ajax_request_photos', 'nm_request_photos');
add_action('wp_ajax_nopriv_request_photos', 'nm_request_photos');