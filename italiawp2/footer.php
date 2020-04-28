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
                            <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo bloginfo('name'); ?>">
                                <?php
                                $custom_logo_id = get_theme_mod('custom_logo');
                                $custom_logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                                if (has_custom_logo()) {
                                    $custom_logo = esc_url($custom_logo[0]);
                                } else {
                                    $custom_logo = get_stylesheet_directory_uri() . '/images/stemma-default.png';
                                } ?>
                                <img class="custom-logo" alt="<?php echo bloginfo('name'); ?>" src="<?php echo $custom_logo; ?>">
                            </a>
                        </div>
                        <div class="logotxt">
                            <h3>
                                <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo bloginfo('name'); ?>">
                                    <?php echo bloginfo('name'); ?>
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
                                Indirizzo<br>
                                <span class="u-color-white"><?php echo get_option('dettagli-indirizzo'); ?><br>
                                <?php echo get_option('dettagli-cap'); ?>, <?php echo get_option('dettagli-citta'); ?></span>
                            </li>
                            <li>
                                Telefono<br>
                                <a href="tel:+39<?php echo get_option('dettagli-telefono'); ?>" title="Telefono">
                                    (+39) <?php echo get_option('dettagli-telefono'); ?>
                                </a>
                            </li>
                            <?php if(get_option('dettagli-fax')!=""): ?>
                            <li>
                                Fax<br>
                                <a href="tel:+39<?php echo get_option('dettagli-fax'); ?>" title="Fax">
                                    (+39) <?php echo get_option('dettagli-fax'); ?>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    
                    <div class="col-12 col-md-6 col-lg-3">
                        <h4>Informazioni</h4>
                        <ul class="footer-list clearfix">
                            <li>
                                C.F. / P.IVA<br>
                                <span class="u-color-white"><?php echo get_option('dettagli-cfpiva'); ?></span>
                            </li>
                            <?php if(get_option('dettagli-codunivoco')!=""): ?>
                            <li>
                                Cod. Univoco<br>
                                <span class="u-color-white"><?php echo get_option('dettagli-codunivoco'); ?></span>
                            </li>
                            <?php endif; ?>
                            <?php if(get_option('dettagli-iban')!=""): ?>
                            <li>
                                IBAN<br>
                                <span class="u-color-white"><?php echo get_option('dettagli-iban'); ?></span>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    
                    <div class="col-12 col-md-6 col-lg-3">
                        <h4>Posta Elettronica</h4>
                        <ul class="footer-list clearfix">
                            <li>
                                PEC<br>
                                <a href="mailto:<?php echo get_option('dettagli-pec'); ?>" title="Posta Elettronica Certificata">
                                    <?php echo get_option('dettagli-pec'); ?>
                                </a>
                            </li>
                            <?php if(get_option('dettagli-email')!=""): ?>
                            <li>
                                Email<br>
                                <a href="mailto:<?php echo get_option('dettagli-email'); ?>" title="Email">
                                    <?php echo get_option('dettagli-email'); ?>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php if(get_option('dettagli-email2')!=""): ?>
                            <li>
                                Email<br>
                                <a href="mailto:<?php echo get_option('dettagli-email2'); ?>" title="Email">
                                    <?php echo get_option('dettagli-email2'); ?>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <h4>Seguici su</h4>
                        
                    <?php if( !( get_option('dettagli-facebook')=="" && get_option('dettagli-twitter')=="" && get_option('dettagli-youtube')=="" && get_option('dettagli-instagram')=="" ) ): ?>
                        <ul class="list-inline text-left social">
                        <?php if (get_option('dettagli-facebook') != ""): ?>
                            <li class="list-inline-item">
                                <a  target="_blank" class="social-icon"
                                    aria-label="Collegamento a sito esterno - Facebook"
                                    href="<?php echo get_option('dettagli-facebook'); ?>">
                                    <svg class="icon">
                                        <use  xlink:href="<?php bloginfo('template_url'); ?>/static/img/ponmetroca.svg#ca-facebook"></use>
                                    </svg>
                                    <span class="hidden">Seguici su Facebook</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (get_option('dettagli-twitter') != ""): ?>
                            <li class="list-inline-item">
                                <a  target="_blank" class="social-icon"
                                    aria-label="Collegamento a sito esterno - Twitter"
                                    href="<?php echo get_option('dettagli-twitter'); ?>">
                                    <svg class="icon">
                                        <use  xlink:href="<?php bloginfo('template_url'); ?>/static/img/ponmetroca.svg#ca-twitter"></use>
                                    </svg>
                                    <span class="hidden">Seguici su Twitter</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (get_option('dettagli-youtube') != ""): ?>
                            <li class="list-inline-item">
                                <a  target="_blank" class="social-icon"
                                    aria-label="Collegamento a sito esterno - YouTube"
                                    href="<?php echo get_option('dettagli-youtube'); ?>">
                                    <svg class="icon">
                                        <use  xlink:href="<?php bloginfo('template_url'); ?>/static/img/ponmetroca.svg#ca-youtube"></use>
                                    </svg>
                                    <span class="hidden">Seguici su YouTube</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (get_option('dettagli-instagram') != ""): ?>
                            <li class="list-inline-item">
                                <a  target="_blank" class="social-icon"
                                    aria-label="Collegamento a sito esterno - Instagram"
                                    href="<?php echo get_option('dettagli-instagram'); ?>">
                                    <svg class="icon">
                                        <use  xlink:href="<?php bloginfo('template_url'); ?>/static/img/ponmetroca.svg#ca-instagram"></use>
                                    </svg>
                                    <span class="hidden">Seguici su Instagram</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (get_option('dettagli-telegram') != ""): ?>
                            <li class="list-inline-item">
                                <a  target="_blank" class="social-icon"
                                    aria-label="Collegamento a sito esterno - Telegram"
                                    href="https://telegram.me/<?php echo get_option('dettagli-telegram'); ?>">
                                    <svg class="icon">
                                        <use  xlink:href="<?php bloginfo('template_url'); ?>/static/img/ponmetroca.svg#ca-telegram"></use>
                                    </svg>
                                    <span class="hidden">Seguici su Telegram</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (get_option('dettagli-whatsapp') != ""): ?>
                            <li class="list-inline-item">
                                <a  target="_blank" class="social-icon"
                                    aria-label="Collegamento a sito esterno - Whatsapp"
                                    href="tel:+39<?php echo get_option('dettagli-whatsapp'); ?>">
                                    <svg class="icon">
                                        <use  xlink:href="<?php bloginfo('template_url'); ?>/static/img/ponmetroca.svg#ca-whatsapp"></use>
                                    </svg>
                                    <span class="hidden">Seguici su Whatsapp</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        </ul>
                    <?php endif; ?>
                    </div>
                </div>
            </section>

            <section class="postFooter clearfix">
                <h3 class="sr-only">Sezione Link Utili</h3>                
                
                <?php if(get_option('dettagli-id-privacy')!=""): ?>
                    <a href="<?php echo get_permalink(get_option('dettagli-id-privacy')); ?>" title="Privacy policy">Privacy</a> |
                <?php endif; ?>
                <?php if(get_option('dettagli-id-notelegali')!=""): ?>
                    <a href="<?php echo get_permalink(get_option('dettagli-id-notelegali')); ?>" title="Note legali">Note legali</a> |
                <?php endif; ?>
                <?php if(get_option('dettagli-id-contatti')!=""): ?>
                    <a href="<?php echo get_permalink(get_option('dettagli-id-contatti')); ?>" title="Contatti">Contatti</a> |
                <?php endif; ?>
                    
                Realizzato con <a target="_blank" href="https://it.wordpress.org">WordPress</a> |
                
                <!-- Per favore, non rimuoverlo! -->
                <?php 
                $main_theme = wp_get_theme(get_template());
                $main_theme_name = $main_theme->get('Name');
                $main_theme_uri = $main_theme->get('ThemeURI');
                 ?>
                Tema grafico <a target="_blank" href="<?php echo $main_theme_uri; ?>"><?php echo $main_theme_name; ?></a> |
                Basato sul <a target="_blank" href="https://italia.github.io/design-comuni-prototipi/">Prototipo per siti PA di AgID</a>
                <!-- Grazie :) -->

            </section>
        </div>
    </footer>
    
</div>

<div id="topcontrol" class="topcontrol u-background-80" title="Torna su">
  <svg class="icon">
    <use xlink:href="<?php bloginfo('template_url'); ?>/static/img/bootstrap-italia.svg#it-collapse"></use>
  </svg>
</div>

<?php wp_footer(); ?>

<?php
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'albo-pretorio-on-line/AlboPretorio.php' ) ) { ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
<?php } ?>
    
    <script src="<?php bloginfo('template_url'); ?>/static/js/popper.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/static/js/bootstrap-italia.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/static/js/tema.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/static/js/jquery-ui.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/static/js/i18n/datepicker-it.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/static/js/owl.carousel.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/inc/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/inc/scripts.js"></script>

</body>
</html>
