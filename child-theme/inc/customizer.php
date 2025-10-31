<?php
/**
 * Theme Customizer configuration.
 */

require_once get_stylesheet_directory() . '/inc/helpers.php';

function childtheme_customize_sanitize_checkbox($checked) {
    return (bool) $checked;
}

function childtheme_customize_sanitize_url($url) {
    return esc_url_raw($url);
}

function childtheme_customize_sanitize_textarea($value) {
    return wp_kses_post($value);
}

function childtheme_customize_register($wp_customize) {
    $defaults = childtheme_get_homepage_defaults();

    $wp_customize->add_panel('childtheme_homepage_panel', [
        'title'       => __('Homepage', 'childtheme'),
        'description' => __('Configure the default sections that appear on the front page template.', 'childtheme'),
        'priority'    => 160,
    ]);

    // Hero section.
    $wp_customize->add_section('childtheme_homepage_hero', [
        'title' => __('Hero', 'childtheme'),
        'panel' => 'childtheme_homepage_panel',
    ]);

    $wp_customize->add_setting('childtheme_home_hero_title', [
        'default'           => $defaults['hero_title'],
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('childtheme_home_hero_title', [
        'label'   => __('Heading', 'childtheme'),
        'section' => 'childtheme_homepage_hero',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('childtheme_home_hero_background', [
        'default'           => 0,
        'sanitize_callback' => 'absint',
    ]);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'childtheme_home_hero_background', [
        'label'       => __('Background image', 'childtheme'),
        'section'     => 'childtheme_homepage_hero',
        'description' => __('Choose an attachment to display behind the hero headline. Leave empty to fall back to the theme default.', 'childtheme'),
    ]));

    $wp_customize->add_setting('childtheme_home_hero_logo', [
        'default'           => 0,
        'sanitize_callback' => 'absint',
    ]);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'childtheme_home_hero_logo', [
        'label'       => __('Hero badge', 'childtheme'),
        'section'     => 'childtheme_homepage_hero',
        'description' => __('Optional image rendered underneath the hero. Leave empty to use the theme default badge.', 'childtheme'),
    ]));

    $wp_customize->add_setting('childtheme_home_intro_text', [
        'default'           => $defaults['intro_text'],
        'sanitize_callback' => 'childtheme_customize_sanitize_textarea',
    ]);
    $wp_customize->add_control('childtheme_home_intro_text', [
        'label'       => __('Intro text', 'childtheme'),
        'section'     => 'childtheme_homepage_hero',
        'type'        => 'textarea',
        'description' => __('This text appears below the hero section.', 'childtheme'),
    ]);

    // Featured content.
    $wp_customize->add_section('childtheme_homepage_featured', [
        'title' => __('Featured content', 'childtheme'),
        'panel' => 'childtheme_homepage_panel',
    ]);

    $wp_customize->add_setting('childtheme_home_featured_post', [
        'default'           => 0,
        'sanitize_callback' => 'absint',
    ]);
    $wp_customize->add_control('childtheme_home_featured_post', [
        'label'   => __('Featured post or page', 'childtheme'),
        'section' => 'childtheme_homepage_featured',
        'type'    => 'dropdown-pages',
        'description' => __('Select a piece of content to highlight in the green block on the homepage.', 'childtheme'),
    ]);

    // Practical info section.
    $wp_customize->add_section('childtheme_homepage_practical', [
        'title' => __('Practical section', 'childtheme'),
        'panel' => 'childtheme_homepage_panel',
    ]);

    $wp_customize->add_setting('childtheme_home_practical_label', [
        'default'           => $defaults['practical_label'],
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('childtheme_home_practical_label', [
        'label'   => __('Section label', 'childtheme'),
        'section' => 'childtheme_homepage_practical',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('childtheme_home_practical_title', [
        'default'           => $defaults['practical_title'],
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('childtheme_home_practical_title', [
        'label'   => __('Section title', 'childtheme'),
        'section' => 'childtheme_homepage_practical',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('childtheme_home_practical_content', [
        'default'           => $defaults['practical_content'],
        'sanitize_callback' => 'childtheme_customize_sanitize_textarea',
    ]);
    $wp_customize->add_control('childtheme_home_practical_content', [
        'label'   => __('Section content', 'childtheme'),
        'section' => 'childtheme_homepage_practical',
        'type'    => 'textarea',
    ]);

    $wp_customize->add_setting('childtheme_home_practical_action_label', [
        'default'           => $defaults['practical_action_label'],
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('childtheme_home_practical_action_label', [
        'label'   => __('Call-to-action label', 'childtheme'),
        'section' => 'childtheme_homepage_practical',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('childtheme_home_practical_action_url', [
        'default'           => $defaults['practical_action_url'],
        'sanitize_callback' => 'childtheme_customize_sanitize_url',
    ]);
    $wp_customize->add_control('childtheme_home_practical_action_url', [
        'label'       => __('Call-to-action URL', 'childtheme'),
        'section'     => 'childtheme_homepage_practical',
        'type'        => 'url',
        'description' => __('Use an absolute or relative URL.', 'childtheme'),
    ]);

    $wp_customize->add_setting('childtheme_home_practical_image', [
        'default'           => 0,
        'sanitize_callback' => 'absint',
    ]);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'childtheme_home_practical_image', [
        'label'   => __('Section image', 'childtheme'),
        'section' => 'childtheme_homepage_practical',
    ]));

    // Panels.
    $wp_customize->add_section('childtheme_homepage_panels', [
        'title' => __('Highlight panels', 'childtheme'),
        'panel' => 'childtheme_homepage_panel',
    ]);

    foreach ($defaults['panels'] as $index => $panel_defaults) {
        $panel_number = $index + 1;
        $wp_customize->add_setting("childtheme_home_panel_{$panel_number}_label", [
            'default'           => $panel_defaults['label'],
            'sanitize_callback' => 'sanitize_text_field',
        ]);
        $wp_customize->add_control("childtheme_home_panel_{$panel_number}_label", [
            'label'   => sprintf(__('Panel %d label', 'childtheme'), $panel_number),
            'section' => 'childtheme_homepage_panels',
            'type'    => 'text',
        ]);

        $wp_customize->add_setting("childtheme_home_panel_{$panel_number}_title", [
            'default'           => $panel_defaults['title'],
            'sanitize_callback' => 'sanitize_text_field',
        ]);
        $wp_customize->add_control("childtheme_home_panel_{$panel_number}_title", [
            'label'   => sprintf(__('Panel %d title', 'childtheme'), $panel_number),
            'section' => 'childtheme_homepage_panels',
            'type'    => 'text',
        ]);

        $wp_customize->add_setting("childtheme_home_panel_{$panel_number}_content", [
            'default'           => $panel_defaults['content'],
            'sanitize_callback' => 'childtheme_customize_sanitize_textarea',
        ]);
        $wp_customize->add_control("childtheme_home_panel_{$panel_number}_content", [
            'label'   => sprintf(__('Panel %d content', 'childtheme'), $panel_number),
            'section' => 'childtheme_homepage_panels',
            'type'    => 'textarea',
        ]);
    }

    // News section.
    $wp_customize->add_section('childtheme_homepage_news', [
        'title' => __('News section', 'childtheme'),
        'panel' => 'childtheme_homepage_panel',
    ]);

    $wp_customize->add_setting('childtheme_home_news_label', [
        'default'           => $defaults['news_label'],
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('childtheme_home_news_label', [
        'label'   => __('Section label', 'childtheme'),
        'section' => 'childtheme_homepage_news',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('childtheme_home_news_title', [
        'default'           => $defaults['news_title'],
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('childtheme_home_news_title', [
        'label'   => __('Section title', 'childtheme'),
        'section' => 'childtheme_homepage_news',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('childtheme_home_news_content', [
        'default'           => $defaults['news_content'],
        'sanitize_callback' => 'childtheme_customize_sanitize_textarea',
    ]);
    $wp_customize->add_control('childtheme_home_news_content', [
        'label'   => __('Section content', 'childtheme'),
        'section' => 'childtheme_homepage_news',
        'type'    => 'textarea',
    ]);

    $wp_customize->add_setting('childtheme_home_news_action_label', [
        'default'           => $defaults['news_action_label'],
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('childtheme_home_news_action_label', [
        'label'   => __('Call-to-action label', 'childtheme'),
        'section' => 'childtheme_homepage_news',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('childtheme_home_news_action_url', [
        'default'           => $defaults['news_action_url'],
        'sanitize_callback' => 'childtheme_customize_sanitize_url',
    ]);
    $wp_customize->add_control('childtheme_home_news_action_url', [
        'label'   => __('Call-to-action URL', 'childtheme'),
        'section' => 'childtheme_homepage_news',
        'type'    => 'url',
    ]);

    // Company information.
    $wp_customize->add_section('childtheme_company_info', [
        'title'    => __('Company information', 'childtheme'),
        'priority' => 170,
    ]);

    $wp_customize->add_setting('childtheme_company_name', [
        'default'           => get_bloginfo('name'),
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('childtheme_company_name', [
        'label'   => __('Company or project name', 'childtheme'),
        'section' => 'childtheme_company_info',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('childtheme_company_phone', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('childtheme_company_phone', [
        'label'   => __('Phone number', 'childtheme'),
        'section' => 'childtheme_company_info',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('childtheme_company_email', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
    ]);
    $wp_customize->add_control('childtheme_company_email', [
        'label'   => __('Email address', 'childtheme'),
        'section' => 'childtheme_company_info',
        'type'    => 'email',
    ]);

    $wp_customize->add_setting('childtheme_company_street', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('childtheme_company_street', [
        'label'   => __('Street', 'childtheme'),
        'section' => 'childtheme_company_info',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('childtheme_company_street_nr', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('childtheme_company_street_nr', [
        'label'   => __('House number', 'childtheme'),
        'section' => 'childtheme_company_info',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('childtheme_company_postal', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('childtheme_company_postal', [
        'label'   => __('Postal code', 'childtheme'),
        'section' => 'childtheme_company_info',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('childtheme_company_city', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('childtheme_company_city', [
        'label'   => __('City', 'childtheme'),
        'section' => 'childtheme_company_info',
        'type'    => 'text',
    ]);

    // Utilities.
    $wp_customize->add_section('childtheme_utilities', [
        'title'    => __('Utilities', 'childtheme'),
        'priority' => 180,
    ]);

    $wp_customize->add_setting('childtheme_enable_noindex', [
        'default'           => false,
        'sanitize_callback' => 'childtheme_customize_sanitize_checkbox',
    ]);
    $wp_customize->add_control('childtheme_enable_noindex', [
        'label'   => __('Discourage search engines (inject noindex)', 'childtheme'),
        'section' => 'childtheme_utilities',
        'type'    => 'checkbox',
    ]);

    $wp_customize->add_setting('childtheme_enqueue_tailwind', [
        'default'           => false,
        'sanitize_callback' => 'childtheme_customize_sanitize_checkbox',
    ]);
    $wp_customize->add_control('childtheme_enqueue_tailwind', [
        'label'       => __('Load Tailwind CDN helper', 'childtheme'),
        'section'     => 'childtheme_utilities',
        'type'        => 'checkbox',
        'description' => __('Enable this only when you intentionally want to load the Tailwind Playground script on the front-end.', 'childtheme'),
    ]);
}
add_action('customize_register', 'childtheme_customize_register');
