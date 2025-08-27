    </main>

    <footer class="site-footer bg-darkestgreen text-white">

        <div class="flex items-center justify-center">
            <div class="flex flex-col items-center justify-center">
                <img width="120" src="/wp-content/themes/hopmarkt/assets/img/core/logo-white.png">
                <?php $description = get_bloginfo( 'description', 'display' ); ?>
                <?php if ( $description || is_customize_preview() ) : ?>
                    <p class="label"><?php echo $description; ?></p>
                <?php endif; ?>
            </div>
        </div>

        <div class="container">

            <div class="flex justify-between py-12">

                <div class="flex flex-col items-start gap-4">
                    <div class="label">Hopmarkt</div>
                    <?php if ( has_nav_menu( 'primary' ) ) : ?>
                        <nav class="nav-footer" aria-label="<?php esc_attr_e( 'Footer Primary Menu', 'twentysixteen' ); ?>">
                            <?php
                            wp_nav_menu(
                                array(
                                    'menu' => 'Footer main',
                                    'menu_class'     => 'flex flex-col items-start gap-2',
                                )
                            );
                        ?>
                        </nav>
                    <?php endif; ?>
                </div>

                <div class="flex flex-col items-start gap-4">
                    <?php if ( has_nav_menu( 'primary' ) ) : ?>
                        <div class="label">Aanbod</div>
                        <nav aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentysixteen' ); ?>">
                            <?php
                                wp_nav_menu(
                                    array(
                                        'menu' => 'Aanbod',
                                        'menu_class'     => 'flex flex-col items-start gap-2',
                                    )
                                );
                            ?>
                        </nav>
                    <?php endif; ?>
                </div>


                <?php if ( !empty( $GLOBALS['COMPANY_EMAIL'] ) || !empty( $GLOBALS['COMPANY_ADDRESS_STREET'] ) ) : ?>
                    <div class="flex flex-col items-start  gap-4">
                        <div class="label">Contact</div>
                        <?php if ( has_nav_menu( 'primary' ) ) : ?>
                            <nav class="nav-footer" aria-label="<?php esc_attr_e( 'Footer Primary Menu', 'twentysixteen' ); ?>">
                                <ul class="flex flex-col items-start gap-2">
                                    <li>
                                        <a href="tel:<?= esc_html($GLOBALS['COMPANY_PHONE']); ?>"><?= esc_html($GLOBALS['COMPANY_PHONE']); ?></a>
                                    </li>
                                    <li>
                                        <a href="mailto:<?= esc_html($GLOBALS['COMPANY_EMAIL']); ?>"><?= esc_html($GLOBALS['COMPANY_EMAIL']); ?></a>
                                    </li>
                                    <li>
                                        <a href="#"><?= esc_html($GLOBALS['COMPANY_ADDRESS_STREET']); ?> <?= esc_html($GLOBALS['COMPANY_ADDRESS_STREET_NR']); ?>, <?= esc_html($GLOBALS['COMPANY_ADDRESS_POSTAL']); ?> <?= esc_html($GLOBALS['COMPANY_ADDRESS_PLACE']); ?></a>
                                    </li>
                                </ul>
                            </nav>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                

            </div>

        </div>

        <div style="background-color: #0D501F;">
            <div class="container-wide">

                <div class="flex flex-col sm:flex-row justify-between py-4 text-xs text-white">

                    <div class="flex-1 flex gap-4">
                        <a href="#" class="link">Disclaimer</a>
                        <?php if ( function_exists( 'the_privacy_policy_link' ) ) : ?>
                            <span class="link1"><?php the_privacy_policy_link(); ?></span>
                        <?php endif; ?>
                        <a href="#" class="link">Privacy policy</a>
                        <a class="link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                        <a href="#" class="link">Cookie opties</a>
                    </div>

                    <div class="flex-1 sm:text-center"><span class="label2">© 2025 Asse <?php bloginfo( 'name' ); ?></span></div>

                    <div class="flex-1 sm:text-right">
                        <span class="label2">Website</span>
                        <a class="link" href="<?php echo esc_url( __( 'https://het-labo.be/', 'twentysixteen' ) ); ?>" class="imprint">
                            <?php printf( __( '%s', 'twentysixteen' ), 'Het Labo' ); ?>
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </footer>

</div>





<div id="app-overlay" class="fixed left-0 top-0 h-screen w-screen bg-black z-20 opacity-0" aria-hidden="true"></div>

<aside
    data-menu="right"
    aria-modal="false"
    role="dialog"
    class="fixed top-0 z-30 w-full h-full max-w-[375px] right-[-375px] overflow-y-auto px-8 bg-white transition-[right]"
>
    <header class="sticky top-0 bg-white flex items-center justify-between border-b border-green py-6">
        <div></div>
        <button data-menu-side="right" data-menu-action="close">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="arcs"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
    </header>

    <?php if ( has_nav_menu( 'primary' ) ) : ?>
        <nav class="site-nav-mobile" aria-label="<?php esc_attr_e( 'Primary Menu', 'twentysixteen' ); ?>">
            <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => 'flex flex-col gap-2 items-start mt-12',
                    )
                );
            ?>
        </nav>
    <?php endif; ?>

</aside>





<?php require_once('inc/core/foot.php'); ?>

