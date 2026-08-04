<?php

/**
 * Versione di bootstrap-italia vendorizzata in static/ (css, js, js bundle, svg/sprite.svg).
 * Usata come cache buster negli enqueue: va aggiornata insieme ai file.
 * Vedi lo script `vendor:bi` in package.json.
 */
if (!defined('ITALIAWP2_BOOTSTRAP_ITALIA_VERSION')) {
    define('ITALIAWP2_BOOTSTRAP_ITALIA_VERSION', '1.6.4');
}

/**
 * Enqueue admin stylesheet
 */
function italiawp2_admin_style() {
    wp_register_style('italiawp2-admin-css', get_template_directory_uri() . '/inc/admin.css');
    wp_enqueue_style('italiawp2-admin-css');
}

add_action('admin_enqueue_scripts', 'italiawp2_admin_style');

/**
 * Enqueue editor stylesheet
 */
function brb_add_editor_styles() {
    // Enqueue editor styles and fonts.
    add_editor_style(get_template_directory_uri() . '/inc/editor.css');
}

add_action('admin_init', 'brb_add_editor_styles');

/**
 * Load fonts
 */
if (!function_exists('italiawp2_theme_fonts')) :

    function italiawp2_theme_fonts() {
        wp_enqueue_style('italiawp2_fonts', get_template_directory_uri() . '/inc/fonts.css', array());
    }

endif;

add_action('admin_enqueue_scripts', 'italiawp2_theme_fonts', 10);

/**
 * Enqueue main style
 */
if (!function_exists('italiawp2_theme_style')) :

    function italiawp2_theme_style() {

        // main style
        wp_enqueue_style('italiawp2-style', get_stylesheet_uri(), array());

        // theme style
        wp_enqueue_style('italiawp2-bootstrap-italia.min', get_template_directory_uri() . '/static/css/bootstrap-italia.min.css', array(), ITALIAWP2_BOOTSTRAP_ITALIA_VERSION);
        wp_enqueue_style('italiawp2-owl.carousel.min', get_template_directory_uri() . '/static/css/owl.carousel.min.css', array());
        wp_enqueue_style('italiawp2-owl.theme.default.min', get_template_directory_uri() . '/static/css/owl.theme.default.min.css', array());
        wp_enqueue_style('italiawp2-home', get_template_directory_uri() . '/static/css/home.css', array());
        wp_enqueue_style('italiawp2-sezioni', get_template_directory_uri() . '/static/css/sezioni.css', array());
        wp_enqueue_style('italiawp2-interne', get_template_directory_uri() . '/static/css/interne.css', array());
        wp_enqueue_style('italiawp2-tema', get_template_directory_uri() . '/static/css/tema.css', array());

        // vandors style
        wp_enqueue_style('italiawp2-magnific-popup/magnific-popup', get_template_directory_uri() . '/inc/magnific-popup/magnific-popup.css', array());
        wp_enqueue_style('italiawp2-gutenberg', get_template_directory_uri() . '/inc/gutenberg.css', array());
        wp_enqueue_style('italiawp2_adjustments_css', get_template_directory_uri() . '/inc/adjustments.css', array());

        // Il CSS della mappa e' autoconsistente e non viene sovrascritto dal tema,
        // quindi puo' essere accodato a richiesta senza alterare la cascata.
        wp_register_style('italiawp2-leaflet', get_template_directory_uri() . '/static/css/leaflet.css', array());
    }

endif;
add_action('wp_enqueue_scripts', 'italiawp2_theme_style', 11);

/**
 * Load scripts
 */
if (!function_exists('italiawp2_theme_scripts')) :

    function italiawp2_theme_scripts() {

        // L'handle 'jquery' e' gia' registrato dal core: passare un $src qui verrebbe
        // ignorato da WP_Dependencies::add(). Va solo accodato.
        wp_enqueue_script('jquery');

        wp_enqueue_script('italiawp2-pre-scripts', get_template_directory_uri() . "/inc/pre-scripts.js", array('jquery'), null, true);

        // Librerie caricate solo dove servono: vengono registrate qui e accodate dal
        // template che genera il markup relativo (galleria, carosello, mappa).
        // Vedi italiawp2_enqueue_gallery_assets() / italiawp2_enqueue_map_assets().
        wp_register_script('italiawp2-owl.carousel', get_template_directory_uri() . "/static/js/owl.carousel.min.js", array('jquery'), null, true);
        wp_register_script('italiawp2-jquery.magnific-popup', get_template_directory_uri() . "/inc/magnific-popup/jquery.magnific-popup.min.js", array('jquery'), null, true);
        wp_register_script('leaflet', get_template_directory_uri() . "/static/js/leaflet.js", array(), null, true);

        // Italia WP2 footer theme scripts
        wp_enqueue_script('popper', get_template_directory_uri() . "/static/js/popper.min.js", array('jquery'), null, true);
        wp_enqueue_script('italiawp2-bootstrap-italia', get_template_directory_uri() . "/static/js/bootstrap-italia.min.js", array('popper'), ITALIAWP2_BOOTSTRAP_ITALIA_VERSION, true);
        wp_enqueue_script('italiawp2-scripts', get_template_directory_uri() . "/inc/scripts.js", array('jquery'), null, true);
        wp_enqueue_script('italiawp2-tema', get_template_directory_uri() . "/static/js/tema.js", array('jquery'), null, true);
        wp_localize_script('italiawp2-tema', 'itwp2', array(
            'siteurl' => get_template_directory_uri()
        ));

        // Risposte annidate ai commenti. Va valutato qui dentro.
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }

endif;
add_action('wp_enqueue_scripts', 'italiawp2_theme_scripts'); // Add Theme admin scripts

/**
 * Accoda gli script della galleria (carosello + lightbox).
 *
 * Va chiamata dal codice che genera davvero il markup della galleria.
 * Lo shortcode [gallery] puo' comparire in qualunque
 * contenuto. Gli script sono in footer, quindi accodarli durante il rendering del
 * body e' ancora in tempo.
 */
function italiawp2_enqueue_gallery_assets() {
    wp_enqueue_script('italiawp2-owl.carousel');
    wp_enqueue_script('italiawp2-jquery.magnific-popup');
}

/**
 * Accoda gli asset della mappa. Chiamata dal solo ramo di section-map.php che
 * istanzia effettivamente L.map(); il ramo con <iframe> non ha bisogno di Leaflet.
 */
function italiawp2_enqueue_map_assets() {
    wp_enqueue_script('leaflet');
    wp_enqueue_style('italiawp2-leaflet');
}
