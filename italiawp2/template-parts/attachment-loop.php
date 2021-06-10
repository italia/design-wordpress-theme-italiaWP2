<?php
/*
 * ### LOOP ALLEGATO ###
 *
 */
?>

<?php

if (have_posts()) : while (have_posts()) : the_post(); ?>

        <section id="intro">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-1 col-lg-6 col-md-8">
                        <div class="titolo-sezione">
                            <h2><?php the_title(); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="articolo-dettaglio-testo">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 lineright">
                        <aside id="menu-sinistro">
                            <?php get_template_part('template-parts/children-list'); ?>
            
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
                                <div class="row">
                                    <div class="col-md-12 mt16">
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
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </section>

<?php endwhile;
      else : get_template_part('template-parts/error');
      endif;
