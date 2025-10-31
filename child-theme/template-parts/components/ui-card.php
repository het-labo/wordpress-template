<?php
        $the_id          = $args['id'] ?? '';
        $classes         = $args['classes'] ?? '';
        $cover           = $args['cover'] ?? '';
        $title           = $args['title'] ?? '';
        $content         = $args['content'] ?? '';
        $permalink       = $args['permalink'] ?? '';
        $permalink_label = $args['permalink_label'] ?? __('Meer info', 'childtheme');

        $article_classes = trim('relative flex flex-col justify-between bg-green mod--ext ' . $classes);
?>

<article
        class="<?php echo esc_attr($article_classes); ?>"
        <?php if ($the_id) : ?>id="post-<?php echo esc_attr($the_id); ?>"<?php endif; ?>
>

        <?php if ($cover) : ?>
                <picture class="relative min-h-[200px] pointer-events-none">
                        <img class="opacity-0 pointer-events-none" src="<?php echo esc_url($cover); ?>" alt="">
                        <div class="absolute inset-0 bg-cover bg-center pointer-events-none" style="background-image: url('<?php echo esc_url($cover); ?>');"></div>
                        <svg class="absolute bottom-0 left-0 right-0 w-full h-6 fill-green" viewBox="0 0 100 24" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"><polygon points="0,0 100,24 0,24" /></svg>
                </picture>
    <?php endif; ?>

    <div>
        <div class="px-8 py-4">
                        <header class="flex flex-col gap-1">
                                <h3><a class="mod--ext-a" href="<?= esc_url($permalink); ?>"><?= esc_html($title); ?></a></h3>
                        </header>
                        <div>
                                <?= wp_kses_post($content); ?>
                        </div>
                </div>
                <footer class="flex justify-end overflow-hidden mt-6">
                        <a class="btn3" href="<?= esc_url($permalink); ?>">
                                <svg viewBox="0 0 20 40" xmlns="http://www.w3.org/2000/svg" version="1.1">
                                        <polygon points="0,40 20,40 20,0" fill="#87A06C" />
                                </svg>
                                <span><?= esc_html($permalink_label); ?></span>
                        </a>
                </footer>
        </div>

</article>
