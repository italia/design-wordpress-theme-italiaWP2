<?php
/*
 * ### SEZIONE COOKIES & PRIVACY ###
 *
 */
?>

<?php if (!get_theme_mod('disactive_section_cookies')) : ?>

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

<?php endif; ?>
