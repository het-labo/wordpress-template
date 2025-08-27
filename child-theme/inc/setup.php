<?php
/**
 * Theme setup: menus, image sizes, supports
 */

function childtheme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'gallery']);
    add_theme_support('custom-logo');
    add_theme_support('editor-styles');

    register_nav_menus([
        'primary' => __('Primary Menu', 'childtheme'),
        'footer'  => __('Footer Menu', 'childtheme'),
    ]);

    add_image_size('property-thumb', 400, 300, true);
    add_image_size('property-large', 1200, 800, true);
}
add_action('after_setup_theme', 'childtheme_setup');
