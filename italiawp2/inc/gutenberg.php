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
                'name'  => 'Colore Primario',
                'slug'  => 'colore-primario',
                'color' => get_option('italiawp2_colore_primario'),
            ),
            array(
                'name'  => 'Colore Primario Chiaro',
                'slug'  => 'colore-primario-chiaro',
                'color' => get_option('italiawp2_colore_primario_chiaro'),
            ),
            array(
                'name'  => 'Colore Primario Scuro',
                'slug'  => 'colore-primario-scuro',
                'color' => get_option('italiawp2_colore_primario_scuro'),
            ),
            array(
                'name'  => 'Colore Complementare',
                'slug'  => 'colore-complementare',
                'color' => get_option('italiawp2_colore_complementare'),
            )
        )
    );
}

