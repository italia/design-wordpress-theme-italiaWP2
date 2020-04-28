<?php

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
}
add_image_size('gallery-preview', 80, 80, true);

$gallery_labels = array(
    'name' => "Gallerie",
    'singular_name' => "Galleria",
    'add_new' => "Aggiungi nuova",
    'add_new_item' => "Aggiungi nuova galleria",
    'edit_item' => "Modifica Galleria",
    'new_item' => "Nuova Galleria",
    'view_item' => "Vedi Galleria",
    'search_items' => "Cerca Galleria",
    'not_found' => "Nessuna Galleria trovata",
    'not_found_in_trash' => "Nessuna Galleria trovata nel Cestino",
    'parent_item_colon' => ""
);

$gallery_args = array(
    'labels' => $gallery_labels,
    'public' => true,
    'has_archive' => 'gallerie',
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'capability_type' => 'post',
    'supports' => array('title', 'excerpt', 'editor', 'thumbnail'),
    'menu_icon' => 'dashicons-format-gallery'
);
register_post_type('gallerie', $gallery_args);

flush_rewrite_rules();

add_action('init', 'italiawp2_create_gallery_taxonomies', 0);

function italiawp2_create_gallery_taxonomies() {
    register_taxonomy(
        'phototype', 'gallerie', array(
            'hierarchical' => true,
            'label' => 'Tipologie Foto',
            'singular_label' => 'Tipoolgia Foto',
            'rewrite' => true
        )
    );
}

add_action('manage_posts_custom_column', 'italiawp2_custom_columns');
add_filter('manage_edit-gallery_columns', 'italiawp2_add_new_gallery_columns');

function italiawp2_add_new_gallery_columns($columns) {
    $columns = array(
        'cb' => '<input type="checkbox">',
        'italiawp2_post_thumb' => "Anteprima",
        'title' => "Titolo Foto",
        'phototype' => "Tipologia Foto",
        'author' => "Autore",
        'date' => "Data"
    );
    return $columns;
}

function italiawp2_custom_columns($column) {
    global $post;

    switch ($column) {
        case 'italiawp2_post_thumb' : echo the_post_thumbnail('gallery-preview');
            break;
        case 'description' : the_excerpt();
            break;
        case 'phototype' : echo get_the_term_list($post->ID, 'phototype', '', ', ', '');
            break;
    }
}

add_filter('manage_posts_columns', 'italiawp2_add_post_thumbnail_column', 5);
add_filter('manage_pages_columns', 'italiawp2_add_post_thumbnail_column', 5);
add_filter('manage_custom_post_columns', 'italiawp2_add_post_thumbnail_column', 5);

function italiawp2_add_post_thumbnail_column($cols) {
    $cols['italiawp2_post_thumb'] = "Anteprima";
    return $cols;
}

function italiawp2_display_post_thumbnail_column($col, $id) {
    switch ($col) {
        case 'italiawp2_post_thumb':
            if (function_exists('the_post_thumbnail'))
                echo the_post_thumbnail('gallery-preview');
            else
                echo 'Non supportata da questo tema';
            break;
    }
}
