<?php

if (!function_exists('italiawp2_theme_setup')) :

    function italiawp2_theme_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         */
        load_theme_textdomain('italiawp2', get_template_directory() . '/languages');

        /*
         * WordPress define content width
         * https://codex.wordpress.org/Content_Width
         */
        if (!isset($content_width))
            $content_width = 1200;

        /*
         * Enable support for Post Thumbnails on posts and pages.
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        add_image_size('post-thumbnails', 512, 512, array('center', 'center'));
        add_image_size('news-image', 400, 220, array('center', 'center'));

        // This theme uses wp_nav_menu() in Primary Navigation.
        register_nav_menus(array(
            'menu-principale' => 'Menu Principale',
            'box-servizi-1' => esc_html__('Box Servizi 1', 'italiawp2'),
            'box-servizi-2' => esc_html__('Box Servizi 2', 'italiawp2'),
            'box-servizi-3' => esc_html__('Box Servizi 3', 'italiawp2'),
            'box-servizi-4' => esc_html__('Box Servizi 4', 'italiawp2'),
            'box-servizi-5' => esc_html__('Box Servizi 5', 'italiawp2'),
            'box-servizi-6' => esc_html__('Box Servizi 6', 'italiawp2'),
            'box-servizi-7' => esc_html__('Box Servizi 7', 'italiawp2'),
            'box-servizi-8' => esc_html__('Box Servizi 8', 'italiawp2'),
            'box-servizi-9' => esc_html__('Box Servizi 9', 'italiawp2')
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
                'html5',
                array(
                    'search-form',
                    'comment-form',
                    'gallery',
                    'caption',
                )
        );

        // Add support for core custom logo, header text color, website background.
        add_theme_support('custom-logo', array(
            'height' => 512,
            'width' => 512,
            'flex-height' => true,
            'flex-width' => true,
            'header-text' => array('site-title', 'site-description'),
        ));

        add_theme_support('custom-header', apply_filters('italiawp2_custom_header_args', array(
            'default-image' => get_template_directory_uri() . '/images/2000x500.png',
            'default-text-color' => '000000',
            'header-text' => false,
            'width' => 2000,
            'height' => 500,
            'flex-height' => true,
            'uploads' => true
        )));

        add_theme_support('custom-background', array(
            'default-color' => "#ffffff",
            'default-image' => '',
            'default-preset' => 'default', // 'default', 'fill', 'fit', 'repeat', 'custom'
            'default-position-x' => 'left', // 'left', 'center', 'right'
            'default-position-y' => 'top', // 'top', 'center', 'bottom'
            'default-size' => 'auto', // 'auto', 'contain', 'cover'
            'default-repeat' => 'repeat', // 'repeat-x', 'repeat-y', 'repeat', 'no-repeat'
            'default-attachment' => 'scroll', // 'scroll', 'fixed'
            'admin-head-callback' => '',
            'admin-preview-callback' => '',
        ));

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        // Add excerpt support to pages
        add_post_type_support('page', 'excerpt');

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        // Add support for Block Styles.
        add_theme_support('wp-block-styles');

        // Add support for full and wide align images.
        add_theme_support('align-wide');

        // Add support for editor styles.
        add_theme_support('editor-styles');

        // Enqueue editor styles and fonts.
        add_editor_style('assets/dist/css/editor.css');
        add_editor_style('https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@300,400,600,700&display=swap'); // todo: make this dynamic
        // Add support for responsive embedded content.
        add_theme_support('responsive-embeds');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        // Aggiungo dei colori da utilizzare con l'editor
        add_theme_support('editor-color-palette',
                array(
                    array(
                        'name' => __('Black', 'italiawp2'),
                        'slug' => 'colore-nero',
                        'color' => get_option('italiawp2_colore_nero'),
                    ),
                    array(
                        'name' => __('White', 'italiawp2'),
                        'slug' => 'colore-bianco',
                        'color' => get_option('italiawp2_colore_bianco'),
                    ),
                    array(
                        'name' => __('Primary Color', 'italiawp2'),
                        'slug' => 'colore-primario',
                        'color' => get_option('italiawp2_colore_primario'),
                    ),
                    array(
                        'name' => __('Light Primary Color', 'italiawp2'),
                        'slug' => 'colore-primario-chiaro',
                        'color' => get_option('italiawp2_colore_primario_chiaro'),
                    ),
                    array(
                        'name' => __('Dark Primary Color', 'italiawp2'),
                        'slug' => 'colore-primario-scuro',
                        'color' => get_option('italiawp2_colore_primario_scuro'),
                    ),
                    array(
                        'name' => __('Complementary Color', 'italiawp2'),
                        'slug' => 'colore-complementare',
                        'color' => get_option('italiawp2_colore_complementare'),
                    )
                )
        );
    }

endif;
add_action('after_setup_theme', 'italiawp2_theme_setup');

// Widgets
function italiawp2_widgets_init() {
    register_sidebar(array(
        'name' => 'Footer Colonne',
        'id' => 'footer-colonne',
        'description' => 'Colonne del Footer',
        'before_widget' => '<div id="%1$s" class="footer-colonne col-12 col-md-6 col-lg-3 %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
    register_sidebar(array(
        'name' => 'Sidebar Pagine',
        'id' => 'sidebar-pagine',
        'description' => 'Sidebar nelle Pagine',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4 class="dropdown">',
        'after_title' => '</h4><div class="menu-separatore"><div class="bg-oro"></div></div>',
        'class' => ''
    ));
    register_sidebar(array(
        'name' => 'Sidebar Articoli',
        'id' => 'sidebar-articoli',
        'description' => 'Sidebar negli Articoli',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4 class="dropdown">',
        'after_title' => '</h4><div class="menu-separatore"><div class="bg-oro"></div></div>',
        'class' => ''
    ));
    register_sidebar(array(
        'name' => 'Sezione Notifica',
        'id' => 'notification',
        'description' => 'Sezione della notifica',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
        'class' => ''
    ));
    register_sidebar(array(
        'name' => 'Sezione Credits',
        'id' => 'credits',
        'description' => 'Sezione dei credits',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
        'class' => ''
    ));
}

add_action('widgets_init', 'italiawp2_widgets_init');

// Taxonomies
add_action('init', 'italiawp2_register_post_tag_page');

function italiawp2_register_post_tag_page() {
    register_taxonomy_for_object_type('post_tag', 'page');
}

// Theme customizations
// Customized excerpt length
add_filter('excerpt_length', function ($length) {
    return 300;
}, 999);

// Set a default header
register_default_headers(array(
    '2000x500' => array(
        'url' => get_template_directory_uri() . '/images/2000x500.png',
        'thumbnail_url' => get_template_directory_uri() . '/images/2000x500.png',
        'description' => 'Default header'
    )
));
add_filter('next_posts_link_attributes', 'posts_link_attributes');

// adds the archive metabox
add_action('admin_head-nav-menus.php', 'italiawp2_menu_pt_archive');

function italiawp2_menu_pt_archive() {
    add_meta_box('minimac-metabox-nav-menu-pt', 'Custom Posts Type', 'italiawp2_metabox_menu_pt_archive', 'nav-menus', 'side', 'default');
}

// Inserimento dei tags nelle queries
add_action('pre_get_posts', 'tags_support_query');

function tags_support_query($wp_query) {
    if ($wp_query->get('tag')) {
        $wp_query->set('post_type', 'any');
    }
}

// Require
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/style.php';
require get_template_directory() . '/inc/gallery.php';
require get_template_directory() . '/inc/details.php';

// Custom Functions
function italiawp2_custom_login_logo() {
    echo '<style type="text/css">';
    echo '.login h1 a { background-image:url(' . esc_url(get_site_icon_url()) . ') !important; }';
    echo '</style>';
}

add_action('login_head', 'italiawp2_custom_login_logo');

function italiawp2_custom_login_url() {
    return home_url();
}

add_filter('login_headerurl', 'italiawp2_custom_login_url');

add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="u-color-50"';
}

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
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404() && !is_search()) {
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
            echo $before . esc_html__('Error 404', 'italiawp2') . $after;
        }

        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                echo '<li class="breadcrumb-item">&nbsp;(';
            echo ' ' . esc_html__('Page', 'italiawp2') . ' ' . get_query_var('paged');
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                echo '&nbsp;) </li>';
        }

        echo '</ol></nav></div>';
        echo '</div></div></section>';
    }
}

function my_excerpt($excerpt = '') {
    $excerpt = strip_shortcodes($excerpt);
    if (has_excerpt()) {
        return $excerpt;
    } else {
        $pos1 = strpos($excerpt, '.');
        if ($pos1) {
            $pos2 = strpos($excerpt, '.', $pos1 + 1);
            if ($pos1 < 50 && $pos2)
                return substr($excerpt, 0, $pos2 + 1);
            else
                return substr($excerpt, 0, $pos1 + 1);
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
    $plugins = array();

    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    if (!is_plugin_active('attachments/index.php')) {
        $plugins += array(
            array(
                'name' => 'Attachments',
                'slug' => 'attachments',
                'required' => false,
            ),
        );
    }

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
            'notice_can_install_required' => __('"ItaliaWP" theme requires plugins %1$s.', 'italiawp2'),
            'notice_can_install_recommended' => __('"ItaliaWP" recommends plugins: %1$s.', 'italiawp2'),
            'notice_ask_to_update' => __('The following plugins must be updated to the latest version to have maximum compatibility with this theme: %1$s.', 'italiawp2'),
            'notice_ask_to_update_maybe' => __('There are updates available for: %1$s.', 'italiawp2'),
            'notice_can_activate_required' => __('Required plugins are not active: %1$s.', 'italiawp2'),
            'notice_can_activate_recommended' => __('Recommended plugins are not active: %1$s.', 'italiawp2'),
            'install_link' => __('Install Plugins', 'italiawp2'),
            'update_link' => __('Update Plugins', 'italiawp2'),
            'activate_link' => __('Activate plugins', 'italiawp2'),
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
        echo '<input type="submit"' . disabled(1, 0) . ' class="button-secondary submit-add-to-menu right" value="' . esc_html__('Add to Menu', 'italiawp2') . '" name="add-posttype-archive-menu-item" id="submit-posttype-archive" />';
        echo '<span class="spinner"></span>';
        echo '</span>';
        echo '</p>';

    endif;
}

add_action('pre_get_posts', 'my_date_search');

function my_date_search() {
    if (is_search()) {
        $original_query = get_search_query();

        $months = array(1 => esc_html__('January', 'italiawp2'), 2 => esc_html__('February', 'italiawp2'), 3 => esc_html__('March', 'italiawp2'), 4 => esc_html__('April', 'italiawp2'), 5 => esc_html__('May', 'italiawp2'), 6 => esc_html__('June', 'italiawp2'), 7 => esc_html__('July', 'italiawp2'), 8 => esc_html__('August', 'italiawp2'), 9 => esc_html__('September', 'italiawp2'), 10 => esc_html__('October', 'italiawp2'), 11 => esc_html__('November', 'italiawp2'), 12 => esc_html__('December', 'italiawp2'));

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
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            if (!isset($d))
                $d = "";
            $new_query = 'year=' . $y . '&monthnum=' . $m . '&day=' . $d . '&paged=' . $paged;
            query_posts($new_query);
        }
    }
}
