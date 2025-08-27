<?php
/**
 * Enqueue scripts and styles
 */

function childtheme_assets() {
    $theme_version = wp_get_theme()->get('Version');

    // Main stylesheet
    wp_enqueue_style('childtheme-style', get_stylesheet_uri(), [], $theme_version);

    // Extra CSS
    wp_enqueue_style('childtheme-typography', get_stylesheet_directory_uri() . '/assets/css/typography.css', [], $theme_version);
    wp_enqueue_style('childtheme-accessibility', get_stylesheet_directory_uri() . '/assets/css/accessibility.css', [], $theme_version);

    // JS
    wp_enqueue_script('childtheme-theme', get_stylesheet_directory_uri() . '/assets/js/theme.js', ['jquery'], $theme_version, true);
    wp_enqueue_script('childtheme-filter', get_stylesheet_directory_uri() . '/assets/js/filter.js', ['jquery'], $theme_version, true);
}
add_action('wp_enqueue_scripts', 'childtheme_assets');
