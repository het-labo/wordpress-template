<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">

    <?php if (get_theme_mod('childtheme_enable_noindex', false)) : ?>
    <meta name="robots" content="noindex">
    <?php endif; ?>
    
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
	<?php endif; ?>

        <?php if (get_theme_mod('childtheme_enqueue_tailwind', false)) : ?>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <?php endif; ?>

	<?php wp_head(); ?>
</head>