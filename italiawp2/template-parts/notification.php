<?php
/*
 * ### NOTIFICA IMPORTANTE IN HOME ###
 *
 */
?>

<?php if(is_active_sidebar('notification') ) { ?>

<section id="sezione-notifica">
    <article>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php dynamic_sidebar('notification'); ?>
                </div>
            </div>
        </div>
    </article>
</section>

<?php } ?>
