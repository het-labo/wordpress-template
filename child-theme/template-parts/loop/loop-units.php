<?php
    $args = [
        'post_type' 		=> 'unit',
        'post_status' 		=> 'publish',
        'posts_per_page' 	=> -1,
        'offset' 			=> 0,
        'orderby' 			=> 'menu_order',
        'order' 			=> 'ASC',
        
    ];
    $query = new WP_Query($args);
?>

<?php if ($query->have_posts()) : ?>

	<div class="flex flex-col gap-4">

	    <?php while ($query->have_posts()) : $query->the_post(); ?>
            <?php get_template_part('template-parts/cpt/unit'); ?>
	    <?php endwhile; ?>

	</div>

<?php endif; ?>

<?php wp_reset_postdata(); ?>