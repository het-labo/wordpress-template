<?php
/**
 * Forms Integration (Contact Form 7, etc.)
 */

// Allow shortcodes in CF7 forms
add_filter('wpcf7_form_elements', function($content) {
    return do_shortcode($content);
});

// Example: add custom hidden field with current page URL
add_action('wpcf7_init', function() {
    if (function_exists('wpcf7_add_form_tag')) {
        wpcf7_add_form_tag('page_url', function() {
            $request_uri = isset($_SERVER['REQUEST_URI']) ? wp_unslash($_SERVER['REQUEST_URI']) : '';
            $current_url = esc_url_raw(home_url($request_uri));

            return esc_url($current_url);
        });
    }
});
