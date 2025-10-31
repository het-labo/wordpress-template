<?php
$home_defaults = childtheme_get_homepage_defaults();

$hero_background_id = get_theme_mod('childtheme_home_hero_background');
$hero_background    = $hero_background_id ? wp_get_attachment_image_url($hero_background_id, 'full') : $home_defaults['hero_background'];
$hero_title         = get_theme_mod('childtheme_home_hero_title', $home_defaults['hero_title']);
$hero_intro         = get_theme_mod('childtheme_home_intro_text', $home_defaults['intro_text']);
$hero_logo_id       = get_theme_mod('childtheme_home_hero_logo');
$hero_logo          = $hero_logo_id ? wp_get_attachment_image_url($hero_logo_id, 'full') : $home_defaults['hero_logo'];

$featured_post_id = absint(get_theme_mod('childtheme_home_featured_post', 0));

$practical = [
    'label'        => get_theme_mod('childtheme_home_practical_label', $home_defaults['practical_label']),
    'title'        => get_theme_mod('childtheme_home_practical_title', $home_defaults['practical_title']),
    'content'      => get_theme_mod('childtheme_home_practical_content', $home_defaults['practical_content']),
    'action_label' => get_theme_mod('childtheme_home_practical_action_label', $home_defaults['practical_action_label']),
    'action_url'   => get_theme_mod('childtheme_home_practical_action_url', $home_defaults['practical_action_url']),
    'image'        => ($image_id = get_theme_mod('childtheme_home_practical_image')) ? wp_get_attachment_image_url($image_id, 'large') : $home_defaults['practical_image'],
];

$panels = [];
foreach ($home_defaults['panels'] as $index => $panel_defaults) {
    $panel_number = $index + 1;
    $panels[]     = [
        'label'   => get_theme_mod("childtheme_home_panel_{$panel_number}_label", $panel_defaults['label']),
        'title'   => get_theme_mod("childtheme_home_panel_{$panel_number}_title", $panel_defaults['title']),
        'content' => get_theme_mod("childtheme_home_panel_{$panel_number}_content", $panel_defaults['content']),
    ];
}

$news = [
    'label'        => get_theme_mod('childtheme_home_news_label', $home_defaults['news_label']),
    'title'        => get_theme_mod('childtheme_home_news_title', $home_defaults['news_title']),
    'content'      => get_theme_mod('childtheme_home_news_content', $home_defaults['news_content']),
    'action_label' => get_theme_mod('childtheme_home_news_action_label', $home_defaults['news_action_label']),
    'action_url'   => get_theme_mod('childtheme_home_news_action_url', $home_defaults['news_action_url']),
];
?>

<?php get_header(); ?>

<div class="relative">
    <div class="relative flex items-end justify-center min-h-[500px] lg:min-h-[900px]">
        <?php if (!empty($hero_background)) : ?>
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('<?php echo esc_url($hero_background); ?>');"></div>
        <?php endif; ?>

        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-40"></div>

        <div class="relative max-w-[800px] text-center text-white mb-6 px-6">
            <h1><?php echo esc_html($hero_title); ?></h1>
        </div>
    </div>
    <?php if (!empty($hero_logo)) : ?>
        <div class="flex justify-center">
            <img width="80" height="72" src="<?php echo esc_url($hero_logo); ?>" alt="" loading="lazy">
        </div>
    <?php endif; ?>
</div>

<div class="container-narrow">
    <div class="text-center mb-12">
        <?php echo wpautop(wp_kses_post($hero_intro)); ?>
    </div>
</div>

<div class="py-24">
    <div class="container">
        <?php
        $terms = get_terms([
            'taxonomy'   => 'vastgoed_type',
            'hide_empty' => false,
        ]);
        ?>

        <?php if (!is_wp_error($terms) && !empty($terms)) : ?>
        <div class="flex flex-col lg:flex-row gap-6">
            <?php foreach ($terms as $term) : ?>
                <?php
                $image_id   = get_field('featured_image', 'vastgoed_type_' . $term->term_id);
                $title      = get_field('meervoud', 'vastgoed_type_' . $term->term_id);
                $permalink  = $term->slug;
                $image_src  = $image_id ? wp_get_attachment_image_url($image_id, 'full') : '';

                get_template_part(
                    'template-parts/components/ui',
                    'card',
                    [
                        'classes'         => 'foo bar',
                        'cover'           => $image_src,
                        'title'           => $title,
                        'content'         => esc_html($term->description),
                        'permalink'       => 'aanbod?type=' . $permalink . '#aanbod',
                        'permalink_label' => $title . ' info',
                    ]
                );
                ?>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<div class="bg-green py-24">
    <div class="container">
        <div class="flex flex-col gap-6 max-w-[900px] mx-auto lo--green-corner">
            <?php if ($featured_post_id && get_post_status($featured_post_id)) : ?>
                <?php set_query_var('id', $featured_post_id); ?>
                <?php get_template_part('template-parts/single/single', 'post'); ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="bg-white py-24">
    <div class="container">

        <div class="flex flex-col-reverse md:flex-row gap-4 md:gap-12 mb-12">
            <div class="flex-1">
                <?php
                get_template_part(
                    'template-parts/components/ui',
                    'section-header',
                    [
                        'classes' => 'header2',
                        'label'   => esc_html($practical['label']),
                        'title'   => esc_html($practical['title']),
                        'content' => wpautop(wp_kses_post($practical['content'])),
                        'action'  => !empty($practical['action_label']) ? [
                            'label' => esc_html($practical['action_label']),
                            'url'   => esc_url($practical['action_url']),
                            'class' => 'btn',
                        ] : null,
                    ]
                );
                ?>
            </div>
            <div class="flex-1">
                <?php if (!empty($practical['image'])) : ?>
                    <img src="<?php echo esc_url($practical['image']); ?>" alt="<?php echo esc_attr($practical['title']); ?>" loading="lazy">
                <?php endif; ?>
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-6">
            <?php foreach ($panels as $panel) : ?>
                <?php
                get_template_part(
                    'template-parts/components/ui',
                    'panel',
                    [
                        'label'   => esc_html($panel['label']),
                        'title'   => esc_html($panel['title']),
                        'content' => wpautop(wp_kses_post($panel['content'])),
                    ]
                );
                ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="bg-green py-24">
    <div class="container">
        <div class="flex flex-col lg:flex-row gap-12">
            <div class="flex-2">
                <div class="mb-12">
                    <?php
                    get_template_part(
                        'template-parts/components/ui',
                        'section-header',
                        [
                            'label'   => esc_html($news['label']),
                            'title'   => esc_html($news['title']),
                            'content' => wpautop(wp_kses_post($news['content'])),
                            'action'  => !empty($news['action_label']) ? [
                                'label' => esc_html($news['action_label']),
                                'url'   => esc_url($news['action_url']),
                                'class' => 'btn2',
                            ] : null,
                        ]
                    );
                    ?>
                </div>

                <div class="flex flex-col gap-4">
                    <?php
                    $latest = new WP_Query([
                        'post_type'           => 'post',
                        'posts_per_page'      => 3,
                        'post_status'         => 'publish',
                        'orderby'             => 'date',
                        'order'               => 'DESC',
                        'ignore_sticky_posts' => 1,
                        'no_found_rows'       => true,
                    ]);
                    ?>

                    <?php if ($latest->have_posts()) : ?>
                        <?php while ($latest->have_posts()) : $latest->the_post(); ?>
                            <?php get_template_part('template-parts/loop/loop', 'post'); ?>
                        <?php endwhile; wp_reset_postdata(); ?>
                    <?php else : ?>
                        <p><?php esc_html_e('No posts found.', 'childtheme'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
