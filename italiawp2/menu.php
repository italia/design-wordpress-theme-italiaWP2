<!-- Inizio Fascia Appartenenza -->
<section class="preheader u-background-70">
    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 entesup">
                
            <?php if ((get_option('dettagli-nome-ammin-afferente') != "") || (get_option('dettagli-logo-ammin-afferente') != "")) { ?>
                <a  aria-label="<?php esc_attr_e('Link to external site', 'italiawp2'); ?> - <?php echo get_option('dettagli-nome-ammin-afferente'); ?> - <?php esc_html_e('new window', 'italiawp2'); ?>"
                    title="<?php echo get_option('dettagli-nome-ammin-afferente'); ?>"
                    href="<?php echo get_option('dettagli-url-ammin-afferente'); ?>"
                    target="_blank">

                    <?php if (get_option('dettagli-logo-ammin-afferente') != "") { ?>
                        <?php if (get_option('dettagli-logo-ammin-afferente-mobile') != "" && wp_is_mobile()) : ?>
                            <img src="<?php echo get_option('dettagli-logo-ammin-afferente-mobile'); ?>" alt="<?php echo get_option('dettagli-nome-ammin-afferente'); ?>" />
                        <?php else : ?>
                            <img src="<?php echo get_option('dettagli-logo-ammin-afferente'); ?>" alt="<?php echo get_option('dettagli-nome-ammin-afferente'); ?>" />
                        <?php endif; ?>
                    <?php } else { ?>
                        <?php echo get_option('dettagli-nome-ammin-afferente'); ?>
                    <?php } ?>
                </a>
            <?php } ?>

                <div class="float-right">
                    <!-- accedi -->
                    <?php if (get_option('dettagli-url-accedi') != "") { ?>
                    <div class="accedi float-left text-right">
                        <a class="btn btn-default btn-accedi" href="<?php echo get_option('dettagli-url-accedi'); ?>">
                            <svg class="icon">
                                <use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/img/ponmetroca.svg#ca-account_circle"></use>
                            </svg>
                            <span><?php esc_html_e('Login','italiawp2'); ?></span>
                        </a>
                    </div>
                    <?php } ?>
                    <!-- accedi -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Fine Fascia Appartenenza -->

<!-- Button Menu -->
<button class="navbar-toggle menu-btn pull-left menu-left push-body jPushMenuBtn">
    <span class="sr-only"><?php esc_html_e('Toggle navigation','italiawp2'); ?></span>
    <span class="icon-bar icon-bar1"></span>
    <span class="icon-bar icon-bar2"></span>
    <span class="icon-bar icon-bar3"></span>
</button>
<!-- Fine Button Menu -->

<!-- Inizio Menu Mobile -->
<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="menup">
    <div class="cbp-menu-wrapper clearfix">
        <div class="logo-burger">
            <div class="logotxt-burger">
                <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
            </div>
        </div>

        <h2 class="sr-only"><?php esc_html_e('Main menu','italiawp2'); ?></h2>

            <?php   if(has_nav_menu('menu-principale')) {
                        $menu = array(
                            'theme_location' => 'menu-principale',
                            'menu_id' => 'site-navigation',
                            'menu_class' => 'nav navmenu'
                        );
                        echo strip_tags(wp_nav_menu($menu));
                    }
             ?>
        
        <!-- pulsante ricerca mobile -->
        <div class="p_cercaMobile">
            <?php get_search_form(); ?>
        </div>
        <!-- pulsante ricerca mobile -->

        <ul class="list-inline socialmobile">
            <?php if (!( get_option('dettagli-facebook') == "" && get_option('dettagli-twitter') == "" && get_option('dettagli-youtube') == "" && get_option('dettagli-instagram') == "" )): ?>

                <li class="small"><?php esc_html_e('Follow us on','italiawp2'); ?></li>
                    <?php if (get_option('dettagli-facebook') != ""): ?>
                        <li>
                            <a  target="_blank" class="social-icon"
                                aria-label="<?php esc_attr_e('Link to external site','italiawp2'); ?> - Facebook"
                                href="<?php echo get_option('dettagli-facebook'); ?>">
                                <svg class="icon">
                                    <use  xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/img/ponmetroca.svg#ca-facebook"></use>
                                </svg>
                                <span class="hidden"><?php esc_html_e('Follow us on','italiawp2'); ?> Facebook</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (get_option('dettagli-twitter') != ""): ?>
                        <li>
                            <a  target="_blank" class="social-icon"
                                aria-label="<?php esc_attr_e('Link to external site','italiawp2'); ?> - Twitter"
                                href="<?php echo get_option('dettagli-twitter'); ?>">
                                <svg class="icon">
                                    <use  xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/img/ponmetroca.svg#ca-twitter"></use>
                                </svg>
                                <span class="hidden"><?php esc_html_e('Follow us on','italiawp2'); ?> Twitter</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (get_option('dettagli-youtube') != ""): ?>
                        <li>
                            <a  target="_blank" class="social-icon"
                                aria-label="<?php esc_attr_e('Link to external site','italiawp2'); ?> - YouTube"
                                href="<?php echo get_option('dettagli-youtube'); ?>">
                                <svg class="icon">
                                    <use  xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/img/ponmetroca.svg#ca-youtube"></use>
                                </svg>
                                <span class="hidden"><?php esc_html_e('Follow us on','italiawp2'); ?> YouTube</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (get_option('dettagli-instagram') != ""): ?>
                        <li>
                            <a  target="_blank" class="social-icon"
                                aria-label="<?php esc_attr_e('Link to external site','italiawp2'); ?> - Instagram"
                                href="<?php echo get_option('dettagli-instagram'); ?>">
                                <svg class="icon">
                                    <use  xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/img/ponmetroca.svg#ca-instagram"></use>
                                </svg>
                                <span class="hidden"><?php esc_html_e('Follow us on','italiawp2'); ?> Instagram</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (get_option('dettagli-telegram') != ""): ?>
                        <li>
                            <a  target="_blank" class="social-icon"
                                aria-label="<?php esc_attr_e('Link to external site','italiawp2'); ?> - Telegram"
                                href="https://telegram.me/<?php echo get_option('dettagli-telegram'); ?>">
                                <svg class="icon">
                                    <use  xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/img/ponmetroca.svg#ca-telegram"></use>
                                </svg>
                                <span class="hidden"><?php esc_html_e('Follow us on','italiawp2'); ?> Telegram</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (get_option('dettagli-whatsapp') != ""): ?>
                        <li>
                            <a  target="_blank" class="social-icon"
                                aria-label="<?php esc_attr_e('Link to external site','italiawp2'); ?> - Whatsapp"
                                href="tel:+39<?php echo get_option('dettagli-whatsapp'); ?>">
                                <svg class="icon">
                                    <use  xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/img/ponmetroca.svg#ca-whatsapp"></use>
                                </svg>
                                <span class="hidden"><?php esc_html_e('Follow us on','italiawp2'); ?> Whatsapp</span>
                            </a>
                        </li>
                    <?php endif; ?>
            <?php endif; ?>
        </ul>
    </div>
</nav>
<!-- Fine Menu Mobile -->

<!-- Inizio Intestazione -->
<div class="container header">
    <div class="row clearfix header-tablet">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-7 comune">
            <div class="logoprint">
                <h1>
                    <?php
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $custom_logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                    if (has_custom_logo()) {
                        $custom_logo = esc_url($custom_logo[0]);
                    } else {
                        $custom_logo = get_stylesheet_directory_uri() . '/images/stemma-default.png';
                    } ?>
                    <img class="custom-logo" src="<?php echo $custom_logo; ?>" alt="<?php bloginfo('name'); ?>"/>
                    <?php bloginfo('name'); ?>
                </h1>
            </div>
            <div class="logoimg">
                <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
                    <?php
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $custom_logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                    if (has_custom_logo()) {
                        $custom_logo = esc_url($custom_logo[0]);
                    } else {
                        $custom_logo = get_stylesheet_directory_uri() . '/images/stemma-default.png';
                    } ?>
                    <img class="custom-logo" alt="<?php bloginfo('name'); ?>" src="<?php echo $custom_logo; ?>">
                </a>
            </div>
            <div class="logotxt">
                <h1>
                    <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
                        <?php bloginfo('name'); ?>
                    </a>
                </h1>
            </div>
        </div>

        <div class="header-social col-xl-4 col-lg-4 d-none d-lg-block d-md-none pull-right text-right">
            <!-- Inizio Social-->
            <?php if (!( get_option('dettagli-facebook') == "" && get_option('dettagli-twitter') == "" && get_option('dettagli-youtube') == "" && get_option('dettagli-instagram') == "" )): ?>
            <ul class="list-inline text-right social">
                <li class="small list-inline-item"><?php esc_html_e('Follow us on','italiawp2'); ?></li>
                
                <?php if (get_option('dettagli-facebook') != ""): ?>
                    <li class="list-inline-item">
                        <a  target="_blank" class="social-icon"
                            aria-label="<?php esc_attr_e('Link to external site','italiawp2'); ?> - Facebook"
                            href="<?php echo get_option('dettagli-facebook'); ?>">
                            <svg class="icon">
                                <use  xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/img/ponmetroca.svg#ca-facebook"></use>
                            </svg>
                            <span class="hidden"><?php esc_html_e('Follow us on','italiawp2'); ?> Facebook</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (get_option('dettagli-twitter') != ""): ?>
                    <li class="list-inline-item">
                        <a  target="_blank" class="social-icon"
                            aria-label="<?php esc_attr_e('Link to external site','italiawp2'); ?> - Twitter"
                            href="<?php echo get_option('dettagli-twitter'); ?>">
                            <svg class="icon">
                                <use  xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/img/ponmetroca.svg#ca-twitter"></use>
                            </svg>
                            <span class="hidden"><?php esc_html_e('Follow us on','italiawp2'); ?> Twitter</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (get_option('dettagli-youtube') != ""): ?>
                    <li class="list-inline-item">
                        <a  target="_blank" class="social-icon"
                            aria-label="<?php esc_attr_e('Link to external site','italiawp2'); ?> - YouTube"
                            href="<?php echo get_option('dettagli-youtube'); ?>">
                            <svg class="icon">
                                <use  xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/img/ponmetroca.svg#ca-youtube"></use>
                            </svg>
                            <span class="hidden"><?php esc_html_e('Follow us on','italiawp2'); ?> YouTube</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (get_option('dettagli-instagram') != ""): ?>
                    <li class="list-inline-item">
                        <a  target="_blank" class="social-icon"
                            aria-label="<?php esc_attr_e('Link to external site','italiawp2'); ?> - Instagram"
                            href="<?php echo get_option('dettagli-instagram'); ?>">
                            <svg class="icon">
                                <use  xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/img/ponmetroca.svg#ca-instagram"></use>
                            </svg>
                            <span class="hidden"><?php esc_html_e('Follow us on','italiawp2'); ?> Instagram</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (get_option('dettagli-telegram') != ""): ?>
                    <li class="list-inline-item">
                        <a  target="_blank" class="social-icon"
                            aria-label="<?php esc_attr_e('Link to external site','italiawp2'); ?> - Telegram"
                            href="https://telegram.me/<?php echo get_option('dettagli-telegram'); ?>">
                            <svg class="icon">
                                <use  xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/img/ponmetroca.svg#ca-telegram"></use>
                            </svg>
                            <span class="hidden"><?php esc_html_e('Follow us on','italiawp2'); ?> Telegram</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (get_option('dettagli-whatsapp') != ""): ?>
                    <li class="list-inline-item">
                        <a  target="_blank" class="social-icon"
                            aria-label="<?php esc_attr_e('Link to external site','italiawp2'); ?> - Whatsapp"
                            href="tel:+39<?php echo get_option('dettagli-whatsapp'); ?>">
                            <svg class="icon">
                                <use  xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/img/ponmetroca.svg#ca-whatsapp"></use>
                            </svg>
                            <span class="hidden"><?php esc_html_e('Follow us on','italiawp2'); ?> Whatsapp</span>
                        </a>
                    </li>
                <?php endif; ?>
                
            </ul>
            <?php endif; ?>
            <!-- Fine Social-->
        </div>

        <div class="header-cerca col-xl-2 col-lg-2 col-md-4 col-sm-5 col-5 d-none d-lg-block d-md-none text-right">
            <!-- Inizio Ricerca -->
            <?php get_search_form(); ?>
            <!-- Fine Ricerca -->
        </div>
    </div>
</div>
<!-- Fine Intestazione -->

<section class="hidden-xs" id="sub_nav">

    <div class="container">
        <div class="row">
            <div class="col-12">
            
                <nav class="navbar navbar-expand-sm has-megamenu">
                    <div class="navbar-collapsable">
                        <div class="close-div sr-only">
                            <button class="btn close-menu" type="button">
                                <svg class="icon icon-sm icon-light">
                                <use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/svg/sprite.svg#it-close"></use>
                                </svg><?php esc_html_e('close','italiawp2'); ?>
                            </button>
                        </div>

                        <div class="menu-wrapper">
                        <?php 
                            wp_nav_menu(array(
                                'theme_location' => 'menu-principale',
                                'menu_id' => 'menu-principale',
                                'depth' => 4,
                                'container' => '',
                                'container_class' => '',
                                'menu_class' => 'nav navbar-nav',
                                'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                                'walker' => new wp_bootstrap_navwalker()
                            ));
                         ?>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

</section>
