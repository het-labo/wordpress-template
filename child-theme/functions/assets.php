<?php

/*
function my_theme_enqueue_styles(){
    wp_enqueue_style('tailwind', 'https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.2/tailwind.min.css');
}
add_action('wp_enqueue_scripts','my_theme_enqueue_styles');
*/


function my_child_enqueue_scripts() {
    // Enqueue child theme script
    wp_enqueue_script(
        'base', 
        get_stylesheet_directory_uri() . '/assets/js/base.js',
        array(), 
        filemtime( get_stylesheet_directory() . '/assets/js/base.js' ), 
        true
    );

    wp_enqueue_script(
        'scroll', 
        get_stylesheet_directory_uri() . '/assets/js/scroll.js',
        array(), 
        filemtime( get_stylesheet_directory() . '/assets/js/scroll.js' ), 
        true
    );

    wp_enqueue_script(
        'menus', 
        get_stylesheet_directory_uri() . '/assets/js/menus.js',
        array(), 
        filemtime( get_stylesheet_directory() . '/assets/js/menus.js' ), 
        true
    );
    
}
add_action( 'wp_enqueue_scripts', 'my_child_enqueue_scripts' );

