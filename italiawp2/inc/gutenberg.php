<?php

/*
 * Codice aggiuntivo per Gutenberg
 */

add_action('after_setup_theme','italiawp2_add_gutenberg_support');
function italiawp2_add_gutenberg_support(){
    // Dichiaro supporto per allineamenti wide e full
    add_theme_support( 'align-wide' );

    // Aggiungo dei colori da utilizzare con l'editor
    add_theme_support('editor-color-palette',
        array(
            array(
                'name'  => __('Colore Primario','italiawp2'),
                'slug'  => 'colore-primario',
                'color' => get_option('italiawp2_colore_primario'),
            ),
            array(
                'name'  => __('Colore Primario Chiaro','italiawp2'),
                'slug'  => 'colore-primario-chiaro',
                'color' => get_option('italiawp2_colore_primario_chiaro'),
            ),
            array(
                'name'  => __('Colore Primario Scuro','italiawp2'),
                'slug'  => 'colore-primario-scuro',
                'color' => get_option('italiawp2_colore_primario_scuro'),
            ),
            array(
                'name'  => __('Colore Complementare','italiawp2'),
                'slug'  => 'colore-complementare',
                'color' => get_option('italiawp2_colore_complementare'),
            )
        )
    );
}

