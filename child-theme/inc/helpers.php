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
