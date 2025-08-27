<?php
// detect ajax request *before* loading header/footer
$is_ajax = isset($_GET['ajax']) && $_GET['ajax'] == 1;

$type_slug   = isset($_GET['type']) ? sanitize_text_field($_GET['type']) : '';
$min_prijs   = isset($_GET['minprijs']) ? intval($_GET['minprijs']) : '';
$max_prijs   = isset($_GET['maxprijs']) ? intval($_GET['maxprijs']) : '';
$slaapkamers = isset($_GET['slaapkamers']) ? intval($_GET['slaapkamers']) : '';

$meta_query = [];

if ($min_prijs) {
    $meta_query[] = [
        'key' => 'prijs',
        'value' => $min_prijs,
        'type' => 'NUMERIC',
        'compare' => '>='
    ];
}

if ($max_prijs) {
    $meta_query[] = [
        'key' => 'prijs',
        'value' => $max_prijs,
        'type' => 'NUMERIC',
        'compare' => '<='
    ];
}

if ($slaapkamers) {
    $meta_query[] = [
        'key' => 'slaapkamers',
        'value' => $slaapkamers,
        'type' => 'NUMERIC',
        'compare' => '>='
    ];
}

$args = [
    'post_type'      => 'unit',
    'posts_per_page' => -1,
    'post_status'    => 'publish'
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

$query = new WP_Query($args);
?>

<?php
    // if ajax -> only render results and exit
    if ($is_ajax) {
        get_template_part('template-parts/filter/filter', 'results', ['query' => $query]);
        exit;
    }
?>
