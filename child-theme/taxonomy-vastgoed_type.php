<?php get_header(); ?>

<?php
    $term = get_queried_object();
    $page_title = get_field('meervoud', $term);
?>

<div class="py-12">
    <div class="container">
        <?php 
            get_template_part('template-parts/components/ui', 'page-header', 
                array(
                    'title' => esc_html($page_title ?: $term->name)
                )
            ); 
        ?>
    </div>
</div>

<?php if (have_posts()) : ?>
    <div class="py-24 bg-green">
        <div class="container">
            <div class="flex flex-col gap-4">
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('template-parts/loop/loop', 'unit'); ?>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
<?php else: ?>
    <p>Geen units gevonden.</p>
<?php endif; ?>

<?php get_footer(); ?>
