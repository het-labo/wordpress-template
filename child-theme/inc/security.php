<?php
/**
 * Security & sanitization helpers
 */

function childtheme_esc_text($string) {
    return esc_html($string);
}

function childtheme_esc_url($url) {
    return esc_url($url);
}
