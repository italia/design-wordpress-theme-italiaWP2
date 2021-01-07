<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php if(get_option('custom-meta-keywords')!=""): ?>
    <meta name="keywords" content="<?php echo get_option('custom-meta-keywords'); ?>">
    <?php endif; ?>
    
    <?php if(get_option('custom-meta-description')!=""): ?>
    <meta name="description" content="<?php echo get_option('custom-meta-description'); ?>">
    <?php else: ?>
    <meta name="description" content="<?php echo get_bloginfo('description'); ?>">
    <?php endif; ?>
    
    <script>
        window.__PUBLIC_PATH__ = "<?php bloginfo('template_url'); ?>/static/fonts";
        theme_directory = "<?php echo get_template_directory_uri() ?>";
    </script>

    <?php if (is_front_page()) { ?>
        <title><?php bloginfo('name'); ?></title>
    <?php } else { ?>
        <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
    <?php } ?>

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    
    <?php $custom_logo_id = get_theme_mod( 'custom_logo' );
          $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' ); ?>
    
    <link rel="icon" type="image/png" href="<?php echo esc_url($logo[0]); ?>">
    
    <link href="<?php bloginfo('template_url'); ?>/static/css/bootstrap-italia.min.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_url'); ?>/static/css/owl.carousel.min.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_url'); ?>/static/css/owl.theme.default.min.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_url'); ?>/static/css/home.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_url'); ?>/static/css/sezioni.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_url'); ?>/static/css/interne.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_url'); ?>/static/css/jquery-ui.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_url'); ?>/static/css/tema.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_url'); ?>/inc/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_url'); ?>/inc/gutenberg.css" rel="stylesheet" type="text/css">

    <?php wp_head(); ?>

    <!-- HTML5shim per Explorer 8 -->
    <script src="<?php bloginfo('template_url'); ?>/static/js/modernizr.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/static/js/jquery.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/inc/pre-scripts.js"></script>    
</head>

<body class="t-Pac">

<?php
$page_id_cookie_banner = get_option('dettagli-id-cookie');
if (!$page_id_cookie_banner) $page_id_cookie_banner = get_option('dettagli-id-privacy');
?>
    
<div class="cookiebar hide u-background-80" aria-hidden="true">
    <p class="text-white">
        <?php echo __('This site uses technical, analytics and third-party cookies','italiawp2'); ?>.
        <?php echo __('By continuing to browse, you accept the use of cookies','italiawp2'); ?>.<br />
        <button data-accept="cookiebar" class="btn btn-info mr-2 btn-verde">
            <?php echo __('I accept','italiawp2'); ?>
        </button>
        <a href="<?php echo get_permalink($page_id_cookie_banner); ?>" class="btn btn-outline-info btn-trasp"><?php echo __('Cookie policy','italiawp2'); ?></a>
    </p>
</div>
    
<div class="body_wrapper push_container clearfix" id="page_top">
    <div class="skiplink sr-only">
        <ul>
            <li>
                <a accesskey="2" href="#main_container"><?php echo __('Go to content','italiawp2'); ?></a>
            </li>
            <li>
                <a accesskey="3" href="#menup"><?php echo __('Go to the navigation menu','italiawp2'); ?></a>
            </li>
            <li><a accesskey="4" href="#footer"><?php echo __('Go to the footer','italiawp2'); ?></a></li>
        </ul>
    </div>
        
    <header id="mainheader" class="u-background-50">
    <?php get_template_part('menu'); ?>
    </header>

    <main id="main_container">
        
    <?php if(!is_attachment()) italiawp2_create_breadcrumbs(); ?>
