<?php
/*
 * Utilizzare i Widget per le 4 colonne e la pagina "Dettagli" del backend per i recapiti e url mappa
 *
 */
?>

    </main>
    
    <footer id="footer" class="u-background-80">
        <div class="container">
            <section>
                <div class="row clearfix">
                    <div class="col-sm-12 intestazione">
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
                            <h3>
                                <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
                                    <?php bloginfo('name'); ?>
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <?php   if (is_active_sidebar('footer-colonne')) { dynamic_sidebar('footer-colonne'); } ?>
                </div>
            </section>
            <section>
                <div class="row">
                    
                    <div class="col-12 col-md-6 col-lg-3">
                        <h4>Recapiti</h4>
                        <ul class="footer-list clearfix">
                            <li>
                                <svg class="icon"><use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/svg/sprite.svg#it-pa"></use></svg>
                                <?php echo __('Address','italiawp2'); ?>
                                <br>
                                <span><?php echo get_option('dettagli-indirizzo'); ?><br>
                                <?php echo get_option('dettagli-cap'); ?>, <?php echo get_option('dettagli-citta'); ?></span>
                            </li>
                            <li>
                                <svg class="icon"><use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/svg/sprite.svg#it-telephone"></use></svg>
                                <?php echo __('Phone','italiawp2'); ?><br>
                                <a href="tel:+39<?php echo esc_attr(get_option('dettagli-telefono')); ?>" title="<?php echo __('Phone','italiawp2'); ?>">
                                    (+39) <?php echo get_option('dettagli-telefono'); ?>
                                </a>
                            </li>
                            <?php if(get_option('dettagli-fax')!=""): ?>
                            <li>
                                <svg class="icon"><use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/svg/sprite.svg#it-print"></use></svg>
                                <?php echo __('Fax','italiawp2'); ?><br>
                                <a href="tel:+39<?php echo esc_attr(get_option('dettagli-fax')); ?>" title="<?php echo __('Fax','italiawp2'); ?>">
                                    (+39) <?php echo get_option('dettagli-fax'); ?>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    
                    <div class="col-12 col-md-6 col-lg-3">
                        <h4><?php echo __('Information','italiawp2'); ?></h4>
                        <ul class="footer-list clearfix">
                            <li>
                                <svg class="icon"><use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/svg/sprite.svg#it-check-circle"></use></svg>
                                <?php echo __('Tax code / VAT number','italiawp2'); ?><br>
                                <span><?php echo get_option('dettagli-cfpiva'); ?></span>
                            </li>
                            <?php if(get_option('dettagli-codunivoco')!=""): ?>
                            <li>
                                <svg class="icon"><use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/svg/sprite.svg#it-exchange-circle"></use></svg>
                                <?php echo __('Unique Code','italiawp2'); ?><br>
                                <span><?php echo get_option('dettagli-codunivoco'); ?></span>
                            </li>
                            <?php endif; ?>
                            <?php if(get_option('dettagli-iban')!=""): ?>
                            <li>
                                <svg class="icon"><use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/svg/sprite.svg#it-card"></use></svg>
                                <?php echo __('IBAN','italiawp2'); ?><br>
                                <span><?php echo get_option('dettagli-iban'); ?></span>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    
                    <div class="col-12 col-md-6 col-lg-3">
                        <h4><?php echo __('Email contacts','italiawp2'); ?></h4>
                        <ul class="footer-list clearfix">
                            <li>
                                <svg class="icon"><use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/svg/sprite.svg#it-mail"></use></svg>
                                <?php echo __('PEC','italiawp2'); ?><br>
                                <a href="mailto:<?php echo get_option('dettagli-pec'); ?>" title="<?php echo __('Certified mail','italiawp2'); ?>">
                                    <?php echo get_option('dettagli-pec'); ?>
                                </a>
                            </li>
                            <?php if(get_option('dettagli-email')!=""): ?>
                            <li>
                                <svg class="icon"><use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/svg/sprite.svg#it-mail"></use></svg>
                                <?php echo __('Email','italiawp2'); ?><br>
                                <a href="mailto:<?php echo get_option('dettagli-email'); ?>" title="<?php echo __('Email','italiawp2'); ?>">
                                    <?php echo get_option('dettagli-email'); ?>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php if(get_option('dettagli-email2')!=""): ?>
                            <li>
                                <svg class="icon"><use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/svg/sprite.svg#it-mail"></use></svg>
                                <?php echo __('Email','italiawp2'); ?><br>
                                <a href="mailto:<?php echo get_option('dettagli-email2'); ?>" title="<?php echo __('Email','italiawp2'); ?>">
                                    <?php echo get_option('dettagli-email2'); ?>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <h4><?php echo __('Follow us on','italiawp2'); ?></h4>
                        
                    <?php if( !( get_option('dettagli-facebook')=="" && get_option('dettagli-twitter')=="" && get_option('dettagli-youtube')=="" && get_option('dettagli-instagram')=="" ) ): ?>
                        <ul class="list-inline text-left social">
                        <?php if (get_option('dettagli-facebook') != ""): ?>
                            <li class="list-inline-item">
                                <a  target="_blank" class="social-icon"
                                    aria-label="<?php echo __('Link to external site','italiawp2'); ?> - Facebook"
                                    href="<?php echo get_option('dettagli-facebook'); ?>">
                                    <svg class="icon">
                                        <use  xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/img/ponmetroca.svg#ca-facebook"></use>
                                    </svg>
                                    <span class="hidden"><?php echo __('Follow us on','italiawp2'); ?> Facebook</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (get_option('dettagli-twitter') != ""): ?>
                            <li class="list-inline-item">
                                <a  target="_blank" class="social-icon"
                                    aria-label="<?php echo __('Link to external site','italiawp2'); ?> - Twitter"
                                    href="<?php echo get_option('dettagli-twitter'); ?>">
                                    <svg class="icon">
                                        <use  xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/img/ponmetroca.svg#ca-twitter"></use>
                                    </svg>
                                    <span class="hidden"><?php echo __('Follow us on','italiawp2'); ?> Twitter</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (get_option('dettagli-youtube') != ""): ?>
                            <li class="list-inline-item">
                                <a  target="_blank" class="social-icon"
                                    aria-label="<?php echo __('Link to external site','italiawp2'); ?> - YouTube"
                                    href="<?php echo get_option('dettagli-youtube'); ?>">
                                    <svg class="icon">
                                        <use  xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/img/ponmetroca.svg#ca-youtube"></use>
                                    </svg>
                                    <span class="hidden"><?php echo __('Follow us on','italiawp2'); ?> YouTube</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (get_option('dettagli-instagram') != ""): ?>
                            <li class="list-inline-item">
                                <a  target="_blank" class="social-icon"
                                    aria-label="<?php echo __('Link to external site','italiawp2'); ?> - Instagram"
                                    href="<?php echo get_option('dettagli-instagram'); ?>">
                                    <svg class="icon">
                                        <use  xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/img/ponmetroca.svg#ca-instagram"></use>
                                    </svg>
                                    <span class="hidden"><?php echo __('Follow us on','italiawp2'); ?> Instagram</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (get_option('dettagli-telegram') != ""): ?>
                            <li class="list-inline-item">
                                <a  target="_blank" class="social-icon"
                                    aria-label="<?php echo __('Link to external site','italiawp2'); ?> - Telegram"
                                    href="https://telegram.me/<?php echo get_option('dettagli-telegram'); ?>">
                                    <svg class="icon">
                                        <use  xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/img/ponmetroca.svg#ca-telegram"></use>
                                    </svg>
                                    <span class="hidden"><?php echo __('Follow us on','italiawp2'); ?> Telegram</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (get_option('dettagli-whatsapp') != ""): ?>
                            <li class="list-inline-item">
                                <a  target="_blank" class="social-icon"
                                    aria-label="<?php echo __('Link to external site','italiawp2'); ?> - Whatsapp"
                                    href="tel:+39<?php echo get_option('dettagli-whatsapp'); ?>">
                                    <svg class="icon">
                                        <use  xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/img/ponmetroca.svg#ca-whatsapp"></use>
                                    </svg>
                                    <span class="hidden"><?php echo __('Follow us on','italiawp2'); ?> Whatsapp</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        </ul>
                    <?php endif; ?>
                    </div>
                </div>
            </section>

            <section class="postFooter clearfix">
                <h3 class="sr-only"><?php echo __('Useful Links Section','italiawp2'); ?></h3>
                
                <?php if(get_option('dettagli-id-privacy')!=""): ?>
                    <a href="<?php echo esc_url(get_permalink(get_option('dettagli-id-privacy'))); ?>" title="<?php echo __('Privacy policy','italiawp2'); ?>"><?php echo __('Privacy','italiawp2'); ?></a> |
                <?php endif; ?>
                <?php if(get_option('dettagli-id-cookie')!=""): ?>
                    <a href="<?php echo esc_url(get_permalink(get_option('dettagli-id-cookie'))); ?>" title="<?php echo __('Cookie policy','italiawp2'); ?>"><?php echo __('Cookie policy','italiawp2'); ?></a> |
                <?php endif; ?>
                <?php if(get_option('dettagli-id-notelegali')!=""): ?>
                    <a href="<?php echo esc_url(get_permalink(get_option('dettagli-id-notelegali'))); ?>" title="<?php echo __('Legal notices','italiawp2'); ?>"><?php echo __('Legal notices','italiawp2'); ?></a> |
                <?php endif; ?>
                <?php if(get_option('dettagli-id-contatti')!=""): ?>
                    <a href="<?php echo esc_url(get_permalink(get_option('dettagli-id-contatti'))); ?>" title="<?php echo __('Contacts','italiawp2'); ?>"><?php echo __('Contacts','italiawp2'); ?></a> |
                <?php endif; ?>
                <?php if(get_option('dettagli-link-accessibilita')!=""): ?>
                    <a target="_blank" href="<?php echo esc_url(get_option('dettagli-link-accessibilita') ); ?>" title="<?php echo __('Accessibility','italiawp2'); ?>"><?php echo __('Accessibility','italiawp2'); ?></a> |
                <?php endif; ?>
                <?php echo __('Made with','italiawp2'); ?> <a target="_blank" href="https://it.wordpress.org">WordPress</a> |
                
                <!-- Per favore, non rimuoverlo! -->
                <?php $main_theme = wp_get_theme(get_template()); ?>
                <?php echo __('Graphic theme','italiawp2'); ?> <a target="_blank" href="<?php echo $main_theme->get('ThemeURI'); ?>"><?php echo $main_theme->get('Name'); ?></a> |
                <?php echo __('Based on the','italiawp2'); ?> <a target="_blank" href="https://italia.github.io/design-comuni-prototipi/"><?php echo __('AgID Prototype for PA sites','italiawp2'); ?></a>
                <!-- Grazie :) -->

                <br>
                <?php if(is_active_sidebar('credits')) dynamic_sidebar('credits'); ?>

            </section>
        </div>
    </footer>
    
</div>

<div id="topcontrol" class="topcontrol u-background-80" title="<?php echo __('Go up','italiawp2'); ?>">
  <svg class="icon">
    <use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/img/bootstrap-italia.svg#it-collapse"></use>
  </svg>
</div>

<?php wp_footer(); ?>

</body>
</html>
