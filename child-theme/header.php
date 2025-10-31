<?php require_once('inc/core/head.php'); ?>

<?php $company = childtheme_get_company_details(); ?>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div class="site">

    <a class="sr-only" href="#site-main">
        <?php _e( 'Skip to content', 'childtheme' ); ?>
    </a>

    <header class="site-header">
        <div class="container">

            <div class="flex items-center justify-between gap-6">

                <?php
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
                ?>

                <?php if ( esc_html($logo_url) ) : ?>

                    <a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <span class="sr-only"><?php bloginfo( 'name' ); ?></span>
                        <img width="120" height="auto" src="<?= esc_html($logo_url); ?>" alt="<?= esc_attr($company['name']); ?>" decoding="async">
                    </a>

                <?php endif; ?>

                <?php if ( has_nav_menu( 'primary' ) ) : ?>
                    <nav class="mod--is-desktop-only" aria-label="<?php esc_attr_e( 'Primary Menu', 'childtheme' ); ?>">
                        <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'primary',
                                    'container' => false,
                                    'menu_class' => 'flex flex-col sm:flex-row sm:gap-8 items-center',
                                )
                            );
                        ?>
                    </nav>
                <?php endif; ?>

                <nav class="mod--is-mobile-only">
                    <button class="" data-menu-side="right" data-menu-action="toggle" aria-label="Open menu">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#87A06C" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="arcs">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg>
                    </button>
                </nav>

            </div>

        </div>
    </header>

    <main class="site-main" id="site-main">
