<?php
$query = $args['query'] ?? null;

if ($query && $query->have_posts()) : ?>
    <div class="flex flex-col gap-4">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <?php set_query_var('id', get_the_ID()); ?>
            <?php get_template_part('template-parts/single/single', 'unit'); ?>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
<?php else : ?>
    <div class="block text-center border border-red-200 bg-white font-mono p-6 text-orange-500">
        <p>Er zijn momenteel geen units gevonden die overeenkomen met je filters.</p>
    </div>
<?php endif; ?>
