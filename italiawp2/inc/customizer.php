<?php

// Set the default favicon if none set into customizer
if( get_option( 'site_icon', false ) == false ) {
	add_action( 'wp_head', 'italiawp2_default_favicon' );
	add_action( 'admin_head', 'italiawp2_default_favicon' );
}
function italiawp2_default_favicon() {
	//code of the favicon logic
	printf('<link rel="icon" href="%s" type="image/png" sizes="32x32" />', get_template_directory_uri() . '/favicon.png');
}

function italiawp2_customize_register($wp_customize) {

	/* Sezione "Sezioni Homepage" nel customizer */
    $wp_customize->add_section('site_settings', array(
        'title' => 'Sito & Homepage',
        'priority' => 1,
    ));

	/* Settings e i controls per le sezioni */
    
	/* Ultimo articolo */
    $wp_customize->add_setting('active_section_last_one_news', array(
        'default' => false, 'capability' => 'edit_theme_options', 'sanitize_callback' => 'italiawp2_sanitize_checkbox'
    ));
    $wp_customize->add_control('active_section_last_one_news', array(
        'label' => 'Ultimo articolo (se ATTIVO) o Hero (se DISATTIVO)',
        'type' => 'checkbox', 'section' => 'site_settings', 'settings' => 'active_section_last_one_news'
    ));

	/* Ultimi articoli */
    $wp_customize->add_setting('active_section_last_news', array(
        'default' => false, 'capability' => 'edit_theme_options', 'sanitize_callback' => 'italiawp2_sanitize_checkbox'
    ));
    $wp_customize->add_control('active_section_last_news', array(
        'label' => 'Ultimi articoli',
        'type' => 'checkbox', 'section' => 'site_settings', 'settings' => 'active_section_last_news'
    ));
    
	/* Ultime circolari (se è installato il plugin) */
    $wp_customize->add_setting('active_section_circolari', array(
        'default' => false, 'capability' => 'edit_theme_options', 'sanitize_callback' => 'italiawp2_sanitize_checkbox'
    ));
    $wp_customize->add_control('active_section_circolari', array(
        'label' => 'Ultime circolari (se è installato il plugin "Gestione Circolari")',
        'type' => 'checkbox', 'section' => 'site_settings', 'settings' => 'active_section_circolari'
    ));
    
	/* Lista Altre Categorie (home) */
    $wp_customize->add_setting('active_altre_categorie_home', array(
        'default' => false, 'capability' => 'edit_theme_options', 'sanitize_callback' => 'italiawp2_sanitize_checkbox'
    ));
    $wp_customize->add_control('active_altre_categorie_home', array(
        'label' => 'Lista Altre Categorie (home)',
        'type' => 'checkbox', 'section' => 'site_settings', 'settings' => 'active_altre_categorie_home'
    ));
    
	/* Lista Altri Argomenti (home) */
    $wp_customize->add_setting('active_altri_argomenti_home', array(
        'default' => false, 'capability' => 'edit_theme_options', 'sanitize_callback' => 'italiawp2_sanitize_checkbox'
    ));
    $wp_customize->add_control('active_altri_argomenti_home', array(
        'label' => 'Lista Altri Argomenti (home)',
        'type' => 'checkbox', 'section' => 'site_settings', 'settings' => 'active_altri_argomenti_home'
    ));

	/* Servizi */
    $wp_customize->add_setting('active_section_services', array(
        'default' => false, 'capability' => 'edit_theme_options', 'sanitize_callback' => 'italiawp2_sanitize_checkbox'
    ));
    $wp_customize->add_control('active_section_services', array(
        'label' => 'Servizi',
        'type' => 'checkbox', 'section' => 'site_settings', 'settings' => 'active_section_services'
    ));
    
	/* Gallerie Fotografiche */
    $wp_customize->add_setting('active_section_galleries', array(
        'default' => false, 'capability' => 'edit_theme_options', 'sanitize_callback' => 'italiawp2_sanitize_checkbox'
    ));
    $wp_customize->add_control('active_section_galleries', array(
        'label' => 'Gallerie fotografiche',
        'type' => 'checkbox', 'section' => 'site_settings', 'settings' => 'active_section_galleries'
    ));
    
	/* Map */
    $wp_customize->add_setting('active_section_map', array(
        'default' => false, 'capability' => 'edit_theme_options', 'sanitize_callback' => 'italiawp2_sanitize_checkbox'
    ));
    $wp_customize->add_control('active_section_map', array(
        'label' => 'Mappa',
        'type' => 'checkbox', 'section' => 'site_settings', 'settings' => 'active_section_map'
    ));

	/* Sezione "Preferenze Pagine" nel customizer */
    $wp_customize->add_section('pages_settings', array(
        'title' => 'Preferenze Pagine & Articoli',
        'priority' => 2,
    ));
    
	/* Immagine in evidenza di default per gli articoli */
    $wp_customize->add_setting('active_immagine_evidenza_default', array(
        'default' => false, 'capability' => 'edit_theme_options', 'sanitize_callback' => 'italiawp2_sanitize_checkbox'
    ));
    $wp_customize->add_control('active_immagine_evidenza_default', array(
        'label' => 'Attiva l\'immagine in evidenza di default (per gli articoli che non ne hanno una)',
        'type' => 'checkbox', 'section' => 'pages_settings', 'settings' => 'active_immagine_evidenza_default'
    ));
    
	/* Immagine di default articoli */
    $wp_customize->add_setting('immagine_evidenza_default', array(
        'transport' => 'refresh',
        'capability' => 'edit_theme_options',
        'default' => esc_url( get_template_directory_uri() ).'/images/400x220.png'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'immagine_evidenza_default', array(
        'label' => 'Immagine di default articoli',
        'section' => 'pages_settings',
        'settings' => 'immagine_evidenza_default'
    )));
    
	/* Lista Allegati in Contenuto o Sidebar */
    $wp_customize->add_setting('active_allegati_contenuto', array(
        'default' => false, 'capability' => 'edit_theme_options', 'sanitize_callback' => 'italiawp2_sanitize_checkbox'
    ));
    $wp_customize->add_control('active_allegati_contenuto', array(
        'label' => 'Lista allegati in Contenuto (in Sidebar se disattivato)',
        'type' => 'checkbox', 'section' => 'pages_settings', 'settings' => 'active_allegati_contenuto'
    ));

	/* Cornici per le Immagini singole in pagine e articoli */
    $wp_customize->add_setting('disactive_cornici_immagini', array(
        'default' => false, 'capability' => 'edit_theme_options', 'sanitize_callback' => 'italiawp2_sanitize_checkbox'
    ));
    $wp_customize->add_control('disactive_cornici_immagini', array(
        'label' => 'Disattiva le cornici per le immagini singole (non gallerie) in pagine e articoli',
        'type' => 'checkbox', 'section' => 'pages_settings', 'settings' => 'disactive_cornici_immagini'
    ));
    
	/* Sunto automatico sotto al titolo per le pagine */
    $wp_customize->add_setting('disactive_sunto_pagine', array(
        'default' => false, 'capability' => 'edit_theme_options', 'sanitize_callback' => 'italiawp2_sanitize_checkbox'
    ));
    $wp_customize->add_control('disactive_sunto_pagine', array(
        'label' => 'Disattiva la visualizzazione del sunto automatico (sotto al titolo) nella pagine',
        'type' => 'checkbox', 'section' => 'pages_settings', 'settings' => 'disactive_sunto_pagine'
    ));
    
	/* Sunto automatico sotto al titolo per gli articoli */
    $wp_customize->add_setting('disactive_sunto_articoli', array(
        'default' => false, 'capability' => 'edit_theme_options', 'sanitize_callback' => 'italiawp2_sanitize_checkbox'
    ));
    $wp_customize->add_control('disactive_sunto_articoli', array(
        'label' => 'Disattiva la visualizzazione del sunto automatico (sotto al titolo) negli articoli',
        'type' => 'checkbox', 'section' => 'pages_settings', 'settings' => 'disactive_sunto_articoli'
    ));
    
	/* Colore Principale */
    $wp_customize->add_setting('italiawp2_main_color', array(
        'default' => '#003882',
        'type' => 'option', 
        'capability' => 'edit_theme_options'
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italiawp2_main_color', array(
                'label' => 'Colore principale', 
                'section' => 'colors',
                'settings' => 'italiawp2_main_color'
            )
    ));

	// Sanitize function for file input
	function italiawp2_sanitize_file( $file, $setting ) {

		//allowed file types
		$mimes = array(
			'jpg|jpeg|jpe' => 'image/jpeg',
			'gif'          => 'image/gif',
			'png'          => 'image/png',
			'svg'          => 'image/svg'
		);

		//check file type from file name
		$file_ext = wp_check_filetype( $file, $mimes );

		//if file has a valid mime type return it, otherwise return default
		return ( $file_ext['ext'] ? $file : $setting->default );
	}
}
add_action('customize_register', 'italiawp2_customize_register');

function italiawp2_sanitize_checkbox( $checked ) {
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
