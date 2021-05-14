<?php

include_once(get_template_directory().'/inc/class-wp-bootstrap-navwalker.php');

add_action('wp_enqueue_scripts', 'italiawp2_adjustments_css');
function italiawp2_adjustments_css() {
    wp_enqueue_style('italiawp2_adjustments_css', get_template_directory_uri() . '/inc/adjustments.css');
}

add_post_type_support('page','excerpt');

add_theme_support('post-thumbnails');
add_image_size('post-thumbnails',512,512,array('center','center'));
add_image_size('news-image',400,220,array('center','center'));

add_theme_support('custom-logo',array(
    'height'      => 512,
    'width'       => 512,
    'flex-width'  => true,
    'flex-height' => true,
));

register_nav_menus( array(
    'menu-principale' => 'Menu Principale',
    'box-servizi-1' => 'Box Servizi 1',
    'box-servizi-2' => 'Box Servizi 2',
    'box-servizi-3' => 'Box Servizi 3',
    'box-servizi-4' => 'Box Servizi 4',
    'box-servizi-5' => 'Box Servizi 5',
    'box-servizi-6' => 'Box Servizi 6',
    'box-servizi-7' => 'Box Servizi 7',
    'box-servizi-8' => 'Box Servizi 8',
    'box-servizi-9' => 'Box Servizi 9'
) );

function italiawp2_custom_login_logo() {
    echo '<style type="text/css">';
    echo '.login h1 a { background-image:url('.esc_url(get_site_icon_url()).') !important; }';
    echo '</style>';
}
add_action('login_head', 'italiawp2_custom_login_logo');

function italiawp2_custom_login_url() {
    return get_site_url();
}
add_filter('login_headerurl', 'italiawp2_custom_login_url');

function italiawp2_widgets_init() {
    register_sidebar( array(
        'name'          => 'Footer Colonne',
        'id'            => 'footer-colonne',
        'description'   => 'Colonne del Footer',
        'before_widget' => '<div id="%1$s" class="footer-colonne col-12 col-md-6 col-lg-3 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>'
    ));
    register_sidebar( array(
        'name'          => 'Sidebar Pagine',
        'id'            => 'sidebar-pagine',
        'description'   => 'Sidebar nelle Pagine',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h4 class="dropdown">',
        'after_title'   => '</h4><div class="menu-separatore"><div class="bg-oro"></div></div>',
        'class'         => ''
    ));
    register_sidebar( array(
        'name'          => 'Sidebar Articoli',
        'id'            => 'sidebar-articoli',
        'description'   => 'Sidebar negli Articoli',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h4 class="dropdown">',
        'after_title'   => '</h4><div class="menu-separatore"><div class="bg-oro"></div></div>',
        'class'         => ''
    ));
    register_sidebar( array(
        'name'          => 'Sezione Notifica',
        'id'            => 'notification',
        'description'   => 'Sezione della notifica',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
        'class'         => ''
    ));
    register_sidebar( array(
        'name'          => 'Sezione Credits',
        'id'            => 'credits',
        'description'   => 'Sezione dei credits',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
        'class'         => ''
    ));
}
add_action( 'widgets_init', 'italiawp2_widgets_init' );

function italiawp2_custom_header_setup() {
    add_theme_support('custom-header', apply_filters('italiawp2_custom_header_args', array(
        'default-image'          => get_template_directory_uri() . '/images/2000x500.png',
        'default-text-color'     => '000000',
        'header-text'            => false,
        'width'                  => 2000,
        'height'                 => 500,
        'flex-height'            => true,
        'uploads'                => true
    )));
}
add_action('after_setup_theme','italiawp2_custom_header_setup');

register_default_headers(array(
    '2000x500' => array(
        'url' => get_template_directory_uri() . '/images/2000x500.png',
        'thumbnail_url' => get_template_directory_uri() . '/images/2000x500.png',
        'description' => 'Default header'
    )
));

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');
function posts_link_attributes() {
    return 'class="u-color-50"';
}

require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/style.php';
require get_template_directory() . '/inc/gallery.php';
require get_template_directory() . '/inc/details.php';
require get_template_directory() . '/inc/gutenberg.php';

function italiawp2_create_breadcrumbs() {

    $home = 'Home';
    $before = '<li class="breadcrumb-item active">';
    $after = '</li>';

    if (!is_home() && !is_front_page()) {
        echo '<section id="briciole"><div class="container"><div class="row">';
        echo '<div class="offset-lg-1 col-lg-9 col-md-12">';
        echo '<nav class="breadcrumb-container" aria-label="breadcrumb"><ol class="breadcrumb">';

        global $post;
        $homeLink = get_bloginfo('url');
        echo '<li class="breadcrumb-item"><a href="' . $homeLink . '">' . $home . '</a><span class="separator">/</span></li>';

        if (is_category()) {
            global $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
            if ($thisCat->parent != 0)
                echo get_category_parents($parentCat, TRUE, ' ');
            echo $before . single_cat_title('', false) . $after;
        } elseif (is_day()) {
            echo '<li class="breadcrumb-item"><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a><span class="separator">/</span></li>';
            echo '<li class="breadcrumb-item"><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a><span class="separator">/</span></li>';
            echo $before . get_the_time('d') . $after;
        } elseif (is_month()) {
            echo '<li class="breadcrumb-item"><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a><span class="separator">/</span></li>';
            echo $before . get_the_time('F') . $after;
        } elseif (is_year()) {
            echo $before . get_the_time('Y') . $after;
        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<li class="breadcrumb-item"><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a><span class="separator">/</span></li>';
                echo $before . get_the_title() . $after;
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                echo '<li class="breadcrumb-item"><a href="' . get_term_link($cat->cat_ID, false) . '">' . $cat->cat_name . '</a><span class="separator">/</span></li>';
                echo $before . get_the_title() . $after;
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
        } elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID);
            $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ');
            echo '<li class="breadcrumb-item"><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a><span class="separator">/</span></li>';
            echo $before . get_the_title() . $after;
        } elseif (is_page() && !$post->post_parent) {
            echo $before . get_the_title() . $after;
        } elseif (is_page() && $post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<li class="breadcrumb-item"><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a><span class="separator">/</span></li>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb)
                echo $crumb . ' ';
            echo $before . get_the_title() . $after;
        } elseif (is_search()) {
            echo $before . get_search_query() . $after;
        } elseif (is_tag()) {
            echo $before . single_tag_title('', false) . $after;
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . $userdata->display_name . $after;
        } elseif (is_404()) {
            echo $before . __('Error 404','italiawp2') . $after;
        }

        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                echo '<li class="breadcrumb-item">&nbsp;(';
            echo ' '.__('Page','italiawp2').' ' . get_query_var('paged');
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                echo '&nbsp;) </li>';
        }

        echo '</ol></nav></div>';
        echo '</div></div></section>';
    }
}

function custom_excerpt_length( $length ) {
    return 300;
}
add_filter('excerpt_length','custom_excerpt_length', 999 );

function my_excerpt($excerpt='') {
    $excerpt = strip_shortcodes($excerpt);
    if ( has_excerpt() ) {
        return $excerpt;
    }else{
        $pos1 = strpos($excerpt, '.');
        if($pos1) {
            $pos2 = strpos($excerpt, '.', $pos1 + 1);
            if($pos1 < 50 && $pos2) return substr($excerpt, 0, $pos2 + 1);
            else return substr($excerpt, 0, $pos1 + 1);
        }
        return $excerpt;
    }
}
add_filter('get_the_excerpt', 'my_excerpt');

/* UPDATER THEME VERSION */
require 'inc/theme-update-checker.php';
$update_checker = new ThemeUpdateChecker(
    'italiawp2',
    'https://raw.githubusercontent.com/italia/design-wordpress-theme-italiaWP2/master/italiawp2.json'
);

/* Per la ricerca manuale degli aggiornamenti, altrimenti avviene automaticamente ogni 12 ore */
//$update_checker->checkForUpdates();

require_once 'inc/tgm-plugin-activation/class-tgm-plugin-activation.php';
add_action('tgmpa_register', 'italiawp2_register_required_plugins');

function italiawp2_register_required_plugins() {
    $plugins = array(
        array(
            'name' => 'Attachments',
            'slug' => 'attachments',
            'required' => false,
        ),
    );

    $config = array(
        'id' => 'italiawp2',
        'default_path' => '',
        'menu' => 'tgmpa-install-plugins',
        'parent_slug' => 'themes.php',
        'capability' => 'edit_theme_options',
        'has_notices' => true,
        'dismissable' => true,
        'dismiss_msg' => '',
        'is_automatic' => false,
        'message' => '',
        'strings' => array(
            'page_title' => __('Plugins required by the theme "ItaliaWP"', 'italiawp2'),
            'menu_title' => __('Plugins required', 'italiawp2'),
            'installing' => __('Installing Plugin: %s', 'italiawp2'),
            'updating' => __('Updating Plugin: %s', 'italiawp2'),
            'oops' => __('Something went wrong with the plugin API.', 'italiawp2'),
            'notice_can_install_required' => __('"ItaliaWP" theme requires plugins %1$s.','italiawp2'),
            'notice_can_install_recommended' => __('"ItaliaWP" recommends plugins: %1$s.','italiawp2'),
            'notice_ask_to_update' => __('The following plugins must be updated to the latest version to have maximum compatibility with this theme: %1$s.','italiawp2'),
            'notice_ask_to_update_maybe' => __('There are updates available for: %1$s.','italiawp2'),
            'notice_can_activate_required' => __('Required plugins are not active: %1$s.','italiawp2'),
            'notice_can_activate_recommended' => __('Recommended plugins are not active: %1$s.','italiawp2'),
            'install_link' => __('Install Plugins', 'italiawp2'),
            'update_link' => __('Update Plugins', 'italiawp2'),
            'activate_link' => __('Activate plugins','italiawp2'),
            'return' => __('Return to Required Plugins Installer', 'italiawp2'),
            'plugin_activated' => __('Plugin activated successfully.', 'italiawp2'),
            'activated_successfully' => __('The following plugin was activated successfully:', 'italiawp2'),
            'plugin_already_active' => __('No action taken. Plugin %1$s was already active.', 'italiawp2'),
            'plugin_needs_higher_version' => __('Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'italiawp2'),
            'complete' => __('All plugins installed and activated successfully. %1$s', 'italiawp2'),
            'dismiss' => __('Dismiss this notice', 'italiawp2'),
            'notice_cannot_install_activate' => __('There are one or more required or recommended plugins to install, update or activate.', 'italiawp2'),
            'contact_admin' => __('Please contact the administrator of this site for help.', 'italiawp2'),
            'nag_type' => '',
        ),
    );
    tgmpa($plugins, $config);
}

require get_template_directory() . '/inc/gallery_cpt.php';

function current_url() {
    $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $validURL = str_replace("&", "&amp", $url);
    return $validURL;
}

function is_custom_post_type($post = NULL) {
    $all_custom_post_types = get_post_types(array('_builtin' => FALSE));

    if (empty($all_custom_post_types))
        return FALSE;

    $custom_types = array_keys($all_custom_post_types);
    $current_post_type = get_post_type($post);

    if (!$current_post_type)
        return FALSE;

    return in_array($current_post_type, $custom_types);
}

add_action('admin_head-nav-menus.php', 'italiawp2_menu_pt_archive');
function italiawp2_menu_pt_archive() {
    add_meta_box('minimac-metabox-nav-menu-pt', 'Custom Posts Type', 'italiawp2_metabox_menu_pt_archive', 'nav-menus', 'side', 'default');
}

function italiawp2_metabox_menu_pt_archive() {

    $post_types = get_post_types(array(
        'show_in_nav_menus' => true,
        'has_archive' => true
            ), 'object');

    if ($post_types) :
        $items = array();
        $loop_index = 999999;

        foreach ($post_types as $post_type) {
            $item = new stdClass();
            $loop_index++;

            $item->object_id = $loop_index;
            $item->db_id = 0;
            $item->object = 'post_type_' . $post_type->query_var;
            $item->menu_item_parent = 0;
            $item->type = 'custom';
            $item->title = $post_type->labels->name;
            $item->url = get_post_type_archive_link($post_type->query_var);
            $item->target = '';
            $item->attr_title = '';
            $item->classes = array();
            $item->xfn = '';

            $items[] = $item;
        }

        $walker = new Walker_Nav_Menu_Checklist(array());

        echo '<div id="posttype-archive" class="posttypediv">';
        echo '<div id="tabs-panel-posttype-archive" class="tabs-panel tabs-panel-active">';
        echo '<ul id="posttype-archive-checklist" class="categorychecklist form-no-clear">';
        echo walk_nav_menu_tree(array_map('wp_setup_nav_menu_item', $items), 0, (object) array('walker' => $walker));
        echo '</ul>';
        echo '</div>';
        echo '</div>';

        echo '<p class="button-controls">';
        echo '<span class="add-to-menu">';
        echo '<input type="submit"' . disabled(1, 0) . ' class="button-secondary submit-add-to-menu right" value="' . __('Add to Menu','italiawp2') . '" name="add-posttype-archive-menu-item" id="submit-posttype-archive" />';
        echo '<span class="spinner"></span>';
        echo '</span>';
        echo '</p>';

    endif;
}

add_action('pre_get_posts','my_date_search');
function my_date_search() {
    if (is_search()) {
        $original_query = get_search_query();
        
        $months = array(1 => __('January','italiawp2'), 2 => __('February','italiawp2'), 3 => __('March','italiawp2'), 4 => __('April','italiawp2'), 5 => __('May','italiawp2'), 6 => __('June','italiawp2'), 7 => __('July','italiawp2'), 8 => __('August','italiawp2'), 9 => __('September','italiawp2'), 10 => __('October','italiawp2'), 11 => __('November','italiawp2'), 12 => __('December','italiawp2'));

        foreach ($months as $month => $month_name) {
            if (stristr($original_query, $month_name)) {
                $m = $month;
                preg_match('/(19[0-9][0-9]|20[0-9][0-9])/', $original_query, $year);
                if ($year)
                    $y = $year[0];
                preg_match('/^[0-3]{0,1}[0-9]{1} /', $original_query, $day);
                if ($day)
                    $d = $day[0];
            }
        }
        
        if (isset($m) && isset($y)) {
            $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
            if(!isset($d)) $d = "";
            $new_query = 'year=' . $y . '&monthnum=' . $m . '&day=' . $d . '&paged=' . $paged;
            query_posts($new_query);
        }
    }
}

/* Multilingua */

function italiawp2_localisation() {
    function italiawp2_localised( $locale ) {
        if ( isset( $_GET['l'] ) ) {
            return sanitize_key( $_GET['l'] );
        }
        return $locale;
    }
    add_filter('locale','italiawp2_localised');
    load_theme_textdomain('italiawp2',get_template_directory().'/languages');
}
add_action('after_setup_theme','italiawp2_localisation');

/* Attivo tags per Articoli e Pagine */

// Supporto ai tags per le pagine
function tags_support_all() {
    register_taxonomy_for_object_type('post_tag', 'page');
}
add_action('init', 'tags_support_all');

// Inserimento dei tags nelle queries
function tags_support_query($wp_query) {
    if ($wp_query->get('tag')) {
        $wp_query->set('post_type', 'any');
    }
}
add_action('pre_get_posts', 'tags_support_query');
