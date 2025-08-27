<?php
/**
 * Custom Post Types & Taxonomies
 */

// Register "Unit" post type
function childtheme_register_unit_cpt() {
    $labels = [
        'name' => __('Units', 'childtheme'),
        'singular_name' => __('Unit', 'childtheme'),
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'units'],
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'menu_icon' => 'dashicons-building',
    ];

    register_post_type('unit', $args);
}
add_action('init', 'childtheme_register_unit_cpt');

// Register "Vastgoed Type" taxonomy
function childtheme_register_vastgoed_type() {
    $labels = [
        'name' => __('Property Types', 'childtheme'),
        'singular_name' => __('Property Type', 'childtheme'),
    ];

    $args = [
        'labels' => $labels,
        'hierarchical' => true,
        'rewrite' => ['slug' => 'property-type'],
    ];

    register_taxonomy('vastgoed_type', ['unit'], $args);
}
add_action('init', 'childtheme_register_vastgoed_type');
