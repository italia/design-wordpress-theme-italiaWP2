<?php
/*
 * ### ALLEGATI ###
 * Scaricare ed installare il plugin "Attachments"
 * da https://it.wordpress.org/plugins/attachments/
 * 
 * Info su GitHub https://github.com/jchristopher/attachments
 *
 */
?>

<?php
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if (is_plugin_active('attachments/index.php')) { ?>
                
<?php $attachments = new Attachments('attachments'); ?>
<?php if ($attachments->exist()) : ?>

    <h4 class="dropdown">Allegati (<?php echo $attachments->total(); ?>)</h4>
    <div class="menu-separatore"><div class="bg-oro"></div></div>

    <div class="list-group lista-paragrafi">
                
<?php while ($attachments->get()) : ?>
        
        <span>
            <a target="_blank" href="<?php echo $attachments->url(); ?>" title="<?php echo $attachments->field('title'); ?>" class="list-group-item list-group-item-action">
                <?php echo $attachments->field('title'); ?> <small>[<?php echo $attachments->filesize(); ?>]</small></span>
            </a>
        </span>
                
<?php endwhile; ?>
                
    </div>

<?php endif; ?>

<?php }
