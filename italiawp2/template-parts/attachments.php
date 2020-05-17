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

    <div class="row">
        <div class="offset-md-1 col-md-11 paragrafo">
            <a id="articolo-par-allegati"> </a>
            <h4>Allegati (<?php echo $attachments->total(); ?>)</h4>
        </div>
    </div>
    <div class="row schede profilo-dettaglio-testo">
        <div class="offset-md-1 col-md-11">
            <div class="row allegati-riga">
                
<?php while ($attachments->get()) : ?>
                
                <div class="col-md-6">
                    <article class="allegato">
                        <div class="scheda-allegato">
                            <svg class="icon">
                            <use
                                xlink:href="static/img/ponmetroca.svg#ca-attach_file"
                                ></use>
                            </svg>
                            <h4>
                                <a target="_blank" href="<?php echo $attachments->url(); ?>" title="<?php echo $attachments->field('title'); ?>">
                                    <?php echo $attachments->field('title'); ?> [<?php echo $attachments->filesize(); ?>]
                                </a><br>
                                <span></span>
                            </h4>
                        </div>
                    </article>
                </div>
                
<?php endwhile; ?>
                
            </div>
        </div>
    </div>

<?php endif; ?>

<?php }
