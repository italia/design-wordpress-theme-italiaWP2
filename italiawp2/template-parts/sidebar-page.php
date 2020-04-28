<?php
/*
 * ### SIDEBAR per le PAGINE ###
 *
 */
?>

<?php if (is_active_sidebar('sidebar-pagine')) { ?>
<div class="italiawp2-sidebar">
    <?php dynamic_sidebar('sidebar-pagine'); ?>
</div>
<?php } ?>
