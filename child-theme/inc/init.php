<?php
/**
 * Initialize Child Theme
 */

$modules = [
    'setup',
    'assets',
    'custom-post-types',
    'custom-fields',
    'filters',
    'forms',
    'helpers',
    'security',
];

foreach ($modules as $module) {
    $file = get_stylesheet_directory() . "/inc/{$module}.php";
    if (file_exists($file)) {
        require_once $file;
    }
}
