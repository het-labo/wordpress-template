<?php
$id = get_query_var('id');

$args = [
    'post_type'   => 'unit',
    'post_status' => 'publish',
    'p'           => $id
];
$query = new WP_Query($args);
?>

<?php if ( !empty($id) && $query->have_posts() ) : ?>
    <?php $query->the_post(); ?>
    
    <article id="post-<?php the_ID(); ?>" <?php post_class('relative flex bg-white mod--ext'); ?>>

        <?php
            $aankoopprijs       = get_field('prijs');
            $huurprijs          = get_field('huurprijs');
            $oppervlakte        = get_field('oppervlakte');
            $aantal_slaapkamers = get_field('slaapkamers');
            $image_url          = get_the_post_thumbnail_url(get_the_ID(), 'full');
        ?>

        <?php if ($image_url) : ?>
            <picture class="flex-1 relative">
                <img class="opacity-0 pointer-events-none" src="<?php echo esc_url($image_url); ?>" alt="">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('<?php echo esc_url($image_url); ?>');"></div>
            </picture>
        <?php else : ?>
            <picture class="flex-1 flex items-center justify-center relative bg-darkestgreen">
                <img style="max-width: 120px;" src="/wp-content/themes/hopmarkt/assets/img/core/logo-white.png" alt="">
            </picture>
        <?php endif; ?>

        <div class="flex-2">
            <div class="p-12 xl:p-24">
                <header class="flex flex-col items-start gap-1">
                    <?php the_title('<h3 class="mb-6"><a class="mod--ext-a" href="' . esc_url(get_permalink()) . '">', '</a></h3>'); ?>

                    <div class="flex border border-black">
                        <?php if ($aankoopprijs) : ?>
                            <div class="p-2 pr-4 border border-black flex items-center gap-1">
                                <span><?php echo number_format($aankoopprijs, 0, '', ' '); ?> €</span>
                            </div>
                        <?php endif; ?>

                        <?php if ($huurprijs) : ?>
                            <div class="p-2 pr-4 border border-black flex items-center gap-1">
                                Huurprijs: <?php echo number_format($huurprijs, 0, '', ' '); ?> €
                            </div>
                        <?php endif; ?>

                        <?php if ($oppervlakte) : ?>
                            <div class="p-2 pr-4 border border-black flex items-center gap-1">
                                <span><?php echo esc_html($oppervlakte); ?> m²</span>
                            </div>
                        <?php endif; ?>

                        <?php if ($aantal_slaapkamers) : ?>
                            <div class="p-2 pr-4 border border-black flex items-center gap-1">
                                <?php echo esc_html($aantal_slaapkamers); ?> Slaapkamer(s)
                            </div>
                        <?php endif; ?>
                    </div>
                </header>

                <div>
                    <?php the_content(); ?>
                </div>
            </div>

            <footer class="flex justify-end overflow-hidden mt-6">
                <a class="btn4" href="#plannen-downloaden">Plannen downloaden</a>
                <a class="btn3" href="#info-aanvragen">
                    <svg viewBox="0 0 20 40" xmlns="http://www.w3.org/2000/svg">
                        <polygon points="0,40 20,40 20,0" />
                    </svg>
                    <span>Info aanvragen</span>
                </a>
            </footer>
        </div>
    </article>

    <?php wp_reset_postdata(); ?>

<?php else : ?>
    <div class="block text-center border border-red-200 bg-white font-mono p-6 text-orange-500">
        <p>Geen unit gevonden.</p>
    </div>
<?php endif; ?>
