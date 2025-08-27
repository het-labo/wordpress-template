<?php
    $filters = hopmarkt_get_current_filters();
    $type_slug   = $filters['type'];
    $min_prijs   = $filters['min_prijs'];
    $max_prijs   = $filters['max_prijs'];
    $slaapkamers = $filters['slaapkamers'];
?>

<form id="filter-form" method="GET" class="flex items-center mb-12 gap-4">
    <div class="flex flex-col">
        <label class="label sr-only" for="filter-type">Type</label>
        <select id="filter-type" name="type" class="select input1">
            <option value="">Alle types</option>
            <?php
            $terms = get_terms([
                'taxonomy'   => 'vastgoed_type',
                'hide_empty' => false
            ]);
            foreach ($terms as $term) {
                echo '<option value="' . esc_attr($term->slug) . '" ' . selected($type_slug, $term->slug, false) . '>'
                     . esc_html($term->name) . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="flex flex-col">
        <label class="label sr-only">Prijs</label>
        <div class="flex flex-row gap-4">
            <input type="number" name="minprijs" placeholder="Min. prijs"
                   value="<?php echo esc_attr($min_prijs); ?>" class="input1">
            <input type="number" name="maxprijs" placeholder="Max. prijs"
                   value="<?php echo esc_attr($max_prijs); ?>" class="input1">
        </div>
    </div>

    <div class="flex flex-col">
        <label class="label sr-only" for="filter-slaapkamers">Slaapkamers</label>
        <select id="filter-slaapkamers" name="slaapkamers" class="select input1">
            <option value="">Alle</option>
            <option value="1" <?php selected($slaapkamers, 1); ?>>1 slaapkamer</option>
            <option value="2" <?php selected($slaapkamers, 2); ?>>2 slaapkamers</option>
            <option value="3" <?php selected($slaapkamers, 3); ?>>3 slaapkamers</option>
        </select>
    </div>

    <div class="flex items-end">
        <button type="button" id="reset-filters" class="btn5">Verwijder filters</button>
    </div>
</form>
