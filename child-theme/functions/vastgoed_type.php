<?php


// Add custom class in BODY
function add_vastgoed_type_to_body_class($classes) {
    if (is_singular('unit')) {
        $terms = get_the_terms(get_the_ID(), 'vastgoed_type');
        if ($terms && !is_wp_error($terms)) {
            $slug = $terms[0]->slug;
            $classes[] = 'vastgoed-type-' . sanitize_html_class($slug);
        }
    }
    return $classes;
}
add_filter('body_class', 'add_vastgoed_type_to_body_class');





// Redirect /appartementen/ naar /vastgoed_type/appartementen/
function redirect_appartementen_slug() {
    if (is_page() && $_SERVER['REQUEST_URI'] === '/appartementen/') {
        wp_redirect(home_url('/vastgoed_type/appartementen/'), 301);
        exit;
    }
}
add_action('template_redirect', 'redirect_appartementen_slug');





// Custom rewrite rule so /appartementen/ works as taxonomy archive
function custom_taxonomy_rewrite_aliases() {
    add_rewrite_rule(
        '^appartementen/?$',
        'index.php?taxonomy=vastgoed_type&term=appartementen',
        'top'
    );
    add_rewrite_rule(
        '^huizen/?$',
        'index.php?taxonomy=vastgoed_type&term=huizen',
        'top'
    );
    add_rewrite_rule(
        '^handelsruimtes/?$',
        'index.php?taxonomy=vastgoed_type&term=handelsruimtes',
        'top'
    );
}
add_action('init', 'custom_taxonomy_rewrite_aliases');





// Redirect van /vastgoed_type/slug naar /slug voor SEO
function seo_redirect_taxonomy_urls() {
    if (is_tax('vastgoed_type')) {
        $term = get_queried_object();
        $term_slug = $term->slug;

        $current_url = $_SERVER['REQUEST_URI'];
        $target_url = '/' . $term_slug . '/';

        // Voer enkel redirect uit als URL nog de oude structuur bevat
        if (strpos($current_url, '/vastgoed_type/') === 0 && $current_url !== $target_url) {
            wp_redirect(home_url($target_url), 301);
            exit;
        }
    }
}
add_action('template_redirect', 'seo_redirect_taxonomy_urls');








function hopmarkt_get_units_query() {
    $type_slug   = isset($_GET['type']) ? sanitize_text_field($_GET['type']) : '';
    $min_prijs   = isset($_GET['minprijs']) ? intval($_GET['minprijs']) : '';
    $max_prijs   = isset($_GET['maxprijs']) ? intval($_GET['maxprijs']) : '';
    $slaapkamers = isset($_GET['slaapkamers']) ? intval($_GET['slaapkamers']) : '';

    $meta_query = [];

    if ($min_prijs) {
        $meta_query[] = ['key' => 'prijs', 'value' => $min_prijs, 'type' => 'NUMERIC', 'compare' => '>='];
    }
    if ($max_prijs) {
        $meta_query[] = ['key' => 'prijs', 'value' => $max_prijs, 'type' => 'NUMERIC', 'compare' => '<='];
    }
    if ($slaapkamers) {
        $meta_query[] = ['key' => 'slaapkamers', 'value' => $slaapkamers, 'type' => 'NUMERIC', 'compare' => '>='];
    }

    $args = [
        'post_type'      => 'unit',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
    ];

    if ($meta_query) {
        $args['meta_query'] = $meta_query;
    }

    if (!empty($type_slug)) {
        $args['tax_query'] = [[
            'taxonomy' => 'vastgoed_type',
            'field'    => 'slug',
            'terms'    => $type_slug
        ]];
    }

    return new WP_Query($args);
}


function hopmarkt_get_current_filters() {
    return [
        'type'        => isset($_GET['type']) ? sanitize_text_field($_GET['type']) : '',
        'min_prijs'   => isset($_GET['minprijs']) ? intval($_GET['minprijs']) : '',
        'max_prijs'   => isset($_GET['maxprijs']) ? intval($_GET['maxprijs']) : '',
        'slaapkamers' => isset($_GET['slaapkamers']) ? intval($_GET['slaapkamers']) : '',
    ];
}

