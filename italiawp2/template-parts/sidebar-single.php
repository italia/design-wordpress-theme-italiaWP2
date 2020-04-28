<?php
/*
 * ### SIDEBAR per gli ARTICOLI ###
 *
 */
?>

<?php if (is_active_sidebar('sidebar-articoli')) { ?>
<div class="italiawp2-sidebar">
    <?php dynamic_sidebar('sidebar-articoli'); ?>
</div>
<?php } ?>
