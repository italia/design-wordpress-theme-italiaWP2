<?php
/*
 * ### LOOP ARTICOLO ###
 *
 */
?>

<?php

if (have_posts()) : while (have_posts()) : the_post();

    $img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'news-image' );
    if($img_url!="") {
        $img_url = $img_url[0];
    }
    
    $posttags = get_the_tags(); ?>

        <section id="intro">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-1 col-lg-6 col-md-8">
                        <div class="titolo-sezione">
                            <h2><?php the_title(); ?></h2>
                            <?php if (!get_theme_mod('disactive_sunto_pagine')) : ?>
                            <p><?php echo get_the_excerpt(); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="offset-lg-1 col-lg-3 col-md-4">
                        <aside id="argomenti-sezione">
                            <?php if (!empty($posttags)) { ?>
                            <div class="argomenti">
                                <h4><?php echo __('Topics','italiawp2'); ?></h4>
                                <div class="argomenti-sezione-elenco">
                                    <?php
                                        foreach ($posttags as $tag) {
                                            echo '<a href="' . esc_url(get_tag_link($tag)) . '" title="' . esc_html($tag->name) . '" class="badge badge-pill badge-argomenti">' . esc_html($tag->name) . '</a>';
                                        }
                                     ?>
                                </div>
                            </div>
                            <?php } ?>
                        </aside>
                    </div>
                </div>
            </div>
        </section>

        <?php if($img_url!="") { ?>
        <section id="articolo-dettaglio-foto">
          <figure>
            <img src="<?php echo $img_url; ?>" alt="<?php the_title(); ?>" class="img-fluid" />
          </figure>
        </section>
        <?php } ?>

        <section id="articolo-dettaglio-testo">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 lineright">
                        <aside id="menu-sinistro">
                            <?php include_once('children-list.php'); ?>
            
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
      else : include('error.php');
      endif; ?>
