<?php

/**
 * Enqueue admin stylesheet
 */
function italiawp2_admin_style() {
	wp_register_style( 'italiawp2-admin-css', get_template_directory_uri() . '/inc/admin.css' );
	wp_enqueue_style( 'italiawp2-admin-css' );
}
add_action( 'admin_enqueue_scripts', 'italiawp2_admin_style' );

/**
 * Enqueue editor stylesheet
 */
function brb_add_editor_styles() {
	// Enqueue editor styles and fonts.
	add_editor_style( get_template_directory_uri() . '/inc/editor.css' );
}
add_action( 'admin_init', 'brb_add_editor_styles' );

/**
 * Load fonts
 */
if ( ! function_exists( 'italiawp2_theme_fonts' ) ) :
	function italiawp2_theme_fonts() {
		if (defined('ITWP2_USE_WEBFONTS')) {
			wp_enqueue_style( 'italiawp2-font-Titillium-Web', 'https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300,400,600,700&display=swap', array(), null );
			wp_enqueue_style( 'italiawp2-font-Lora', 'https://fonts.googleapis.com/css2?family=Lora:wght@400,700&display=swap', array(), null );
			wp_enqueue_style( 'italiawp2-font-Roboto_mono', 'https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400&display=swap', array(), null );
		} else {
			wp_enqueue_style( 'italiawp2_fonts', get_template_directory_uri() . '/inc/fonts.css', array() );
		}
	}
endif;
add_action( 'wp_enqueue_scripts', 'italiawp2_theme_fonts', 10 );
add_action( 'admin_enqueue_scripts', 'italiawp2_theme_fonts', 10 );

/**
 * Enqueue main style
 */
if ( ! function_exists( 'italiawp2_theme_style' ) ) :
	function italiawp2_theme_style() {

		// main style
		wp_enqueue_style( 'italiawp2-style', get_stylesheet_uri() , array() );

		// theme style
		wp_enqueue_style( 'italiawp2-bootstrap-italia.min', get_template_directory_uri() . '/static/css/bootstrap-italia.min.css' , array() );
		wp_enqueue_style( 'italiawp2-owl.carousel.min', get_template_directory_uri() . '/static/css/owl.carousel.min.css' , array() );
		wp_enqueue_style( 'italiawp2-owl.theme.default.min', get_template_directory_uri() . '/static/css/owl.theme.default.min.css' , array() );
		wp_enqueue_style( 'italiawp2-home', get_template_directory_uri() . '/static/css/home.css' , array() );
		wp_enqueue_style( 'italiawp2-sezioni', get_template_directory_uri() . '/static/css/sezioni.css' , array() );
		wp_enqueue_style( 'italiawp2-interne', get_template_directory_uri() . '/static/css/interne.css' , array() );
		wp_enqueue_style( 'italiawp2-jquery-ui', get_template_directory_uri() . '/static/css/jquery-ui.css' , array() );
		wp_enqueue_style( 'italiawp2-tema', get_template_directory_uri() . '/static/css/tema.css' , array() );

		// vandors style
		wp_enqueue_style( 'italiawp2-magnific-popup/magnific-popup', get_template_directory_uri() . '/inc/magnific-popup/magnific-popup.css' , array() );
		wp_enqueue_style( 'italiawp2-gutenberg', get_template_directory_uri() . '/inc/gutenberg.css' , array() );
		wp_enqueue_style( 'italiawp2_adjustments_css', get_template_directory_uri() . '/inc/adjustments.css', array() );
	}
endif;
add_action( 'wp_enqueue_scripts', 'italiawp2_theme_style', 11 );


/**
 * Load scripts
 */
if ( ! function_exists( 'italiawp2_theme_scripts' ) ) :
	function italiawp2_theme_scripts() {

		// Vendors scripts
		wp_enqueue_script( 'modernizr', get_template_directory_uri() . "/static/js/modernizr.js" );
		wp_deregister_script( 'jquery' );
		wp_enqueue_script( 'jquery', get_template_directory_uri() . "/static/js/jquery.min.js" );
		wp_enqueue_script( 'italiawp2-pre-scripts', get_template_directory_uri() . "/inc/pre-scripts.js" );

		// Italia WP2 footer theme scripts
		wp_enqueue_script( 'popper', get_template_directory_uri() . "/static/js/popper.min.js", array( 'jquery' ), null, true );
		wp_enqueue_script( 'jquery-ui', get_template_directory_uri() . "/static/js/jquery-ui.js", array( 'jquery' ), null, true );
		wp_enqueue_script( 'italiawp2-datepicker-it', get_template_directory_uri() . "/static/js/i18n/datepicker-it.js", array( 'jquery', 'jquery-ui' ), null, true );
		wp_enqueue_script( 'italiawp2-owl.carousel', get_template_directory_uri() . "/static/js/owl.carousel.min.js", array( 'jquery' ), null, true );
		wp_enqueue_script( 'italiawp2-jquery.magnific-popup', get_template_directory_uri() . "/inc/magnific-popup/jquery.magnific-popup.min.js", array( 'jquery' ), null, true );
		wp_enqueue_script( 'italiawp2-bootstrap-italia', get_template_directory_uri() . "/static/js/bootstrap-italia.min.js", array( 'jquery' ), null, true );
		wp_enqueue_script( 'italiawp2-scripts', get_template_directory_uri() . "/inc/scripts.js", array( 'jquery' ), null, true );
		wp_enqueue_script( 'italiawp2-tema', get_template_directory_uri() . "/static/js/tema.js", array( 'jquery' ), null, true );
		wp_localize_script( 'italiawp2-tema', 'itwp2', array(
				'siteurl' => get_template_directory_uri()
			) );


		if ( class_exists( 'AlboPretorio' ) ) {
			wp_deregister_script( 'jquery-ui' );
			wp_enqueue_script( 'jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js', array(), false, true );
		}
	}
endif;
add_action( 'wp_enqueue_scripts', 'italiawp2_theme_scripts' ); // Add Theme admin scripts


/**
 * To allow full JavaScript functionality with the comment features in WordPress 2.7, the following changes must be made within the WordPress Theme template files.
 */
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );