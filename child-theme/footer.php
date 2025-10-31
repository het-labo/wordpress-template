    </main>

    <?php $company = childtheme_get_company_details(); ?>

    <footer class="site-footer bg-darkestgreen text-white">

        <div class="flex items-center justify-center py-12">
            <div class="flex flex-col items-center justify-center gap-4">
                <?php
                $custom_logo_id = get_theme_mod('custom_logo');
                $footer_logo    = '';

                if ($custom_logo_id) {
                    $footer_logo = wp_get_attachment_image(
                        $custom_logo_id,
                        'full',
                        false,
                        [
                            'class' => 'max-h-[120px] w-auto',
                            'alt'   => esc_attr($company['name']),
                        ]
                    );
                }

                if ($footer_logo) {
                    echo $footer_logo; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                } else {
                    echo '<span class="text-xl font-semibold">' . esc_html($company['name']) . '</span>';
                }

                $description = get_bloginfo('description', 'display');
                if ($description || is_customize_preview()) :
                    ?>
                    <p class="label"><?php echo esc_html($description); ?></p>
                <?php endif; ?>
            </div>
        </div>

        <div class="container">

            <div class="flex flex-col lg:flex-row justify-between gap-12 py-12">

                <?php if (has_nav_menu('footer_primary')) : ?>
                    <div class="flex flex-col items-start gap-4">
                        <div class="label"><?php echo esc_html($company['name']); ?></div>
                        <nav class="nav-footer" aria-label="<?php esc_attr_e('Footer primary links', 'childtheme'); ?>">
                            <?php
                            wp_nav_menu(
                                [
                                    'theme_location' => 'footer_primary',
                                    'container'      => false,
                                    'menu_class'     => 'flex flex-col items-start gap-2',
                                    'depth'          => 1,
                                    'fallback_cb'    => false,
                                ]
                            );
                            ?>
                        </nav>
                    </div>
                <?php endif; ?>

                <?php if (has_nav_menu('footer_secondary')) : ?>
                    <div class="flex flex-col items-start gap-4">
                        <div class="label"><?php esc_html_e('Aanbod', 'childtheme'); ?></div>
                        <nav aria-label="<?php esc_attr_e('Footer secondary links', 'childtheme'); ?>">
                            <?php
                            wp_nav_menu(
                                [
                                    'theme_location' => 'footer_secondary',
                                    'container'      => false,
                                    'menu_class'     => 'flex flex-col items-start gap-2',
                                    'depth'          => 1,
                                    'fallback_cb'    => false,
                                ]
                            );
                            ?>
                        </nav>
                    </div>
                <?php endif; ?>

                <?php
                $has_contact = !empty($company['phone']) || !empty($company['email']) || !empty($company['street']);
                if ($has_contact) :
                    $street_line = trim($company['street'] . ' ' . $company['street_nr']);
                    $city_line   = trim($company['postal_code'] . ' ' . $company['city']);
                    ?>
                    <div class="flex flex-col items-start gap-4">
                        <div class="label"><?php esc_html_e('Contact', 'childtheme'); ?></div>
                        <ul class="flex flex-col items-start gap-2">
                            <?php if (!empty($company['phone'])) : ?>
                                <?php $phone_href = preg_replace('/[^0-9+]/', '', $company['phone']); ?>
                                <li>
                                    <a href="tel:<?php echo esc_attr($phone_href); ?>"><?php echo esc_html($company['phone']); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (!empty($company['email'])) : ?>
                                <li>
                                    <a href="mailto:<?php echo esc_attr($company['email']); ?>"><?php echo esc_html($company['email']); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if ($street_line || $city_line) : ?>
                                <li>
                                    <span><?php echo esc_html(trim($street_line)); ?><?php echo $city_line ? ', ' . esc_html($city_line) : ''; ?></span>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                <?php endif; ?>

            </div>

        </div>

        <div style="background-color: #0D501F;">
            <div class="container-wide">

                <div class="flex flex-col sm:flex-row justify-between py-4 text-xs text-white gap-4">

                    <div class="flex-1 flex flex-wrap gap-4 items-center">
                        <?php if (has_nav_menu('footer_utility')) : ?>
                            <?php
                            wp_nav_menu(
                                [
                                    'theme_location' => 'footer_utility',
                                    'container'      => false,
                                    'menu_class'     => 'flex flex-wrap items-center gap-4',
                                    'depth'          => 1,
                                    'fallback_cb'    => false,
                                ]
                            );
                            ?>
                        <?php endif; ?>
                        <?php if (function_exists('the_privacy_policy_link')) : ?>
                            <span class="link1"><?php the_privacy_policy_link('', ''); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="flex-1 sm:text-center">
                        <span class="label2">© <?php echo esc_html(gmdate('Y')); ?> <?php echo esc_html(trim($company['city'])); ?> <?php echo esc_html($company['name']); ?></span>
                    </div>

                    <div class="flex-1 sm:text-right">
                        <span class="label2"><?php esc_html_e('Website', 'childtheme'); ?></span>
                        <a class="link" href="https://het-labo.be/" rel="noopener" target="_blank">Het Labo</a>
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
        <nav class="site-nav-mobile" aria-label="<?php esc_attr_e( 'Primary Menu', 'childtheme' ); ?>">
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

