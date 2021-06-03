<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge; <?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php if(get_option('custom-meta-keywords')!=""): ?>
    <meta name="keywords" content="<?php echo get_option('custom-meta-keywords'); ?>">
    <?php endif; ?>
    
    <?php if(get_option('custom-meta-description')!=""): ?>
    <meta name="description" content="<?php echo get_option('custom-meta-description'); ?>">
    <?php else: ?>
    <meta name="description" content="<?php echo get_bloginfo('description'); ?>">
    <?php endif; ?>

    <?php if (is_front_page()) { ?>
        <title><?php bloginfo('name'); ?></title>
    <?php } else { ?>
        <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
    <?php } ?>

    <?php wp_head(); ?>
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
