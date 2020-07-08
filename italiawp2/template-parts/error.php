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
                <h1><?php echo __('Error','italiawp2'); ?></h1>
                <p><?php echo __('There is no content','italiawp2'); ?>, <a href="javascript:history.back();" title="<?php echo __('come back'); ?>"><?php echo __('come back'); ?></a> <?php echo __('or use the menu to continue browsing'); ?>.</p>
            </div>
        </div>

        <div class="row mt32">
            <div class="col-md-12 veditutti">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-default btn-verde"><?php echo __('Back to Home','italiawp2'); ?></a>
            </div>
        </div>
    </div>
</div>
