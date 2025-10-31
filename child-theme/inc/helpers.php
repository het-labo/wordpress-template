<?php
/**
 * Helper functions
 */

function childtheme_format_price($price) {
    return number_format_i18n($price, 0) . ' €';
}

function childtheme_get_thumbnail_url($post_id = null, $size = 'large') {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    return get_the_post_thumbnail_url($post_id, $size) ?: get_stylesheet_directory_uri() . '/assets/images/placeholder.png';
}

function childtheme_get_company_details() {
    $defaults = [
        'name'        => get_bloginfo('name'),
        'phone'       => '',
        'email'       => '',
        'street'      => '',
        'street_nr'   => '',
        'postal_code' => '',
        'city'        => '',
    ];

    $details = [
        'name'        => get_theme_mod('childtheme_company_name', $defaults['name']),
        'phone'       => get_theme_mod('childtheme_company_phone', ''),
        'email'       => get_theme_mod('childtheme_company_email', ''),
        'street'      => get_theme_mod('childtheme_company_street', ''),
        'street_nr'   => get_theme_mod('childtheme_company_street_nr', ''),
        'postal_code' => get_theme_mod('childtheme_company_postal', ''),
        'city'        => get_theme_mod('childtheme_company_city', ''),
    ];

    // Fallback to legacy options if the Customizer settings are empty.
    foreach ($details as $key => $value) {
        if (!empty($value)) {
            continue;
        }

        switch ($key) {
            case 'name':
                $details[$key] = $defaults['name'];
                break;
            case 'phone':
                $details[$key] = get_option('company_phone', '');
                break;
            case 'email':
                $details[$key] = get_option('company_email', '');
                break;
            case 'street':
                $details[$key] = get_option('company_address_street', '');
                break;
            case 'street_nr':
                $details[$key] = get_option('company_address_street_nr', '');
                break;
            case 'postal_code':
                $details[$key] = get_option('company_address_postal', '');
                break;
            case 'city':
                $details[$key] = get_option('company_address_place', '');
                break;
        }
    }

    return $details;
}

function childtheme_get_homepage_defaults() {
    return [
        'hero_title'       => __('Een nieuw kloppend dorpshart voor Asse', 'childtheme'),
        'hero_background'  => 'https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_011.jpg',
        'hero_logo'        => get_stylesheet_directory_uri() . '/assets/img/core/logo-hop.svg',
        'intro_text'       => "Nullam lacinia est massa, eget dignissim orci pretium a. Etiam ullamcorper elit ex, quis elementum nibh laoreet at lorem ipsum dolor, vitae faucibus eros mollis.\n\nCras sed pharetra ante. Etiam at massa at enim congue congue id id tortor. Sed maximus justo nisi, rutrum pretium justo viverra molestie. Aenean sed dui molestie, accumsan dui eget, pulvinar lacus. Integer in rutrum magna. Etiam fringilla lorem vel nisl mollis, vitae faucibus eros mollis.",
        'practical_label'  => __('Praktisch', 'childtheme'),
        'practical_title'  => __('Buurtinfo', 'childtheme'),
        'practical_content'=> "Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.\n\nExercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.",
        'practical_action_label' => __('Meer over buurtinfo', 'childtheme'),
        'practical_action_url'   => '#',
        'practical_image'  => 'https://hopmarkt.het-labo.be/wp-content/uploads/2025/08/hopmarkt_011.jpg',
        'panels' => [
            [
                'label'   => __('Ullamco', 'childtheme'),
                'title'   => __('Quis nostrud exercitation', 'childtheme'),
                'content' => __('Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Duis aute irure dolor in reprehenderit.', 'childtheme'),
            ],
            [
                'label'   => __('Lorem ipsum', 'childtheme'),
                'title'   => __('Ullamco laboris nisi', 'childtheme'),
                'content' => __('Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Duis aute irure dolor in reprehenderit.', 'childtheme'),
            ],
            [
                'label'   => __('Duis aute', 'childtheme'),
                'title'   => __('Aliquip ex ea commodo', 'childtheme'),
                'content' => __('Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Duis aute irure dolor in reprehenderit.', 'childtheme'),
            ],
            [
                'label'   => __('Exercitation', 'childtheme'),
                'title'   => __('Duis aute irure dolor in reprehenderit', 'childtheme'),
                'content' => __('Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Duis aute irure dolor in reprehenderit.', 'childtheme'),
            ],
        ],
        'news_label'       => __('Actua', 'childtheme'),
        'news_title'       => __('Nieuws', 'childtheme'),
        'news_content'     => "Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.\n\nExercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.",
        'news_action_label'=> __('Nieuwsoverzicht', 'childtheme'),
        'news_action_url'  => '#',
    ];
}
