<?php
/**
 * Property Filtering & Custom Queries
 */

function childtheme_filter_units_query($query) {
    if (!is_admin() && $query->is_main_query() && is_post_type_archive('unit')) {
        $query->set('orderby', 'date');
        $query->set('order', 'DESC');

        if (!empty($_GET['min_price'])) {
            $min_price = absint(wp_unslash($_GET['min_price']));
            $query->set('meta_query', [
                [
                    'key' => 'price',
                    'value' => $min_price,
                    'compare' => '>=',
                    'type' => 'NUMERIC',
                ]
            ]);
        }
    }
}
add_action('pre_get_posts', 'childtheme_filter_units_query');

// AJAX filter endpoint
add_action('wp_ajax_childtheme_filter_units', 'childtheme_filter_units');
add_action('wp_ajax_nopriv_childtheme_filter_units', 'childtheme_filter_units');

function childtheme_filter_units() {
    $args = [
        'post_type' => 'unit',
        'posts_per_page' => -1,
    ];

    if (!empty($_POST['property_type'])) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'vastgoed_type',
                'field'    => 'slug',
                'terms'    => sanitize_text_field($_POST['property_type']),
            ]
        ];
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('template-parts/loop/loop', 'unit');
        }
    } else {
        echo '<p>' . __('No results found', 'childtheme') . '</p>';
    }

    wp_die();
}
