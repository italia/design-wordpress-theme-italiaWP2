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
  if ( in_array( 'attachments/wp-attachments.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
  ?>
                
<?php $attachments = new Attachments('attachments'); ?>
<?php if ($attachments->exist()) : ?>

    <h4 class="dropdown"><?php echo __('Attachments','italiawp2'); ?> (<?php echo $attachments->total(); ?>)</h4>
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

<?php
  }
