<?php
/*
 * ### ERRORE ###
 *
 */
?>

<div class="col-12 linetop pt8">
    <div class="articolo-paragrafi">
        <div class="row">
            <div class="col-12 testolungo">
                <h1><?php esc_html_e('Error','italiawp2'); ?></h1>
                <p><?php esc_html_e('There is no content','italiawp2'); ?>, <a href="javascript:history.back();" title="<?php esc_attr_e('come back','italiawp2'); ?>"><?php esc_html_e('come back','italiawp2'); ?></a> <?php esc_html_e('or use the menu to continue browsing','italiawp2'); ?>.</p>
            </div>
        </div>

        <div class="row mt32">
            <div class="col-md-12 veditutti">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-default btn-verde"><?php esc_html_e('Back to Home','italiawp2'); ?></a>
            </div>
        </div>
    </div>
</div>
