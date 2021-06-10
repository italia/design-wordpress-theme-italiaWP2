<?php
/*
 * ### LOOP CIRCOLARE ###
 *
 */
?>

<?php

if (have_posts()) : while (have_posts()) : the_post();

    $datapost = get_the_date('j F Y', '', '');
    
    $circolare_id = get_the_ID();
    $circolare_num = get_post_meta($circolare_id,"_numero",TRUE);
    $circolare_anno = get_post_meta($circolare_id,"_anno",TRUE);
    $circolare_gruppi = wp_get_object_terms($circolare_id,'gruppiutenti'); ?>

        <section id="intro">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-1 col-lg-6 col-md-8">
                        <div class="titolo-sezione">
                            <h2><?php the_title(); ?></h2>
                        </div>
                    </div>
                    <div class="offset-lg-1 col-lg-3 col-md-4">
                        <aside id="argomenti-sezione">
                            
                            <?php if (!empty($circolare_gruppi)) { ?>
                            <div class="argomenti">
                                <h4><?php echo __('Groups','italiawp2'); ?></h4>
                                <div class="argomenti-sezione-elenco">
                                    <?php
                                        foreach ($circolare_gruppi as $gruppo) {
                                            echo '<span class="badge badge-pill badge-argomenti">' . esc_html($gruppo->name) . '</span>';
                                        }
                                     ?>
                                </div>
                            </div>
                            <?php } ?>
                            
                        </aside>
                    </div>
                </div>
                <div class="row mt40">
                    <div class="offset-xl-1 col-xl-3 offset-lg-1 col-lg-3 col-md-4 mb-3 mb-md-0">
                        <p class="data-articolo">
                            <span><?php echo __('Circular','italiawp2'); ?>:</span><br />
                            <strong><?php echo __('No.','italiawp2').' '.$circolare_num.__(' of ','italiawp2').$circolare_anno; ?></strong>
                        </p>
                    </div>
                    
                    <div class="offset-xl-1 col-xl-3 offset-lg-1 col-lg-3 col-md-4 mb-3 mb-md-0">
                        <p class="data-articolo">
                            <span><?php echo __('Date','italiawp2'); ?>:</span><br /><strong><?php echo $datapost; ?></strong>
                        </p>
                    </div>
                    
                    <div class="offset-xl-1 col-xl-3 offset-lg-1 col-lg-3 col-md-4 mb-3 mb-md-0">
                        <p class="data-articolo">
                            <span><?php echo __('Author','italiawp2'); ?>:</span><br /><strong><?php echo get_the_author(); ?></strong>
                        </p>
                    </div>
                    
                </div>
            </div>
        </section>

        <section id="articolo-dettaglio-testo">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 lineright">
                        <aside id="menu-sinistro">
                            <?php if (!get_theme_mod('active_allegati_contenuto'))
                                    get_template_part('template-parts/attachments-sidebar'); ?>
                            
                            <?php get_template_part('template-parts/sidebar-page'); ?>
                        </aside>
                    </div>
                    <div class="col-lg-9 col-md-8 linetop pt8">
                        <div class="articolo-paragrafi">
                            <div class="row">
                                <div class="offset-md-1 col-md-10 testolungo">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                            
                            <?php if (get_theme_mod('active_allegati_contenuto'))
                                    get_template_part('template-parts/attachments'); ?>
                            
                        </div>
                        
                        <div class="row articolo-ulterioriinfo">
                            <div class="offset-md-1 col-md-11">
                                <div class="row mt16">
                                    <div class="col-md-12">
                                        <p><?php echo __('Last update','italiawp2'); ?></p>
                                    <?php
                                        $updated_date = get_the_modified_time('j F Y');
                                        $updated_time = get_the_modified_time('H:i'); 
                                     ?>
                                        <p class="data-articolo">
                                            <strong><?php echo $updated_date.', '.$updated_time; ?></strong>
                                        </p>
                                    </div>
                                </div>

                                <?php
                                    if ( comments_open() || get_comments_number() ) :
                                        comments_template();
                                    endif;
                                 ?>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </section>

        <?php get_template_part('template-parts/navigation'); ?>

<?php endwhile;
      else : get_template_part('template-parts/error');
      endif; ?>
