<?php
/*
 * ### LOOP ARTICOLO ###
 *
 */
?>

<?php

if (have_posts()) : while (have_posts()) : the_post();

    $img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
    if($img_url!="") {
        $img_url = $img_url[0];
    }else if(get_theme_mod('active_immagine_evidenza_default')) {	
        $img_url = esc_url(get_theme_mod('immagine_evidenza_default'));
        if($img_url=="") {
            $img_url = get_bloginfo('template_url') . "/images/400x220.png";
        }
    }
    
    $category = get_the_category(); $first_category = $category[0];
    $datapost = get_the_date('j F Y', '', ''); ?>

        <section id="intro">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-1 col-lg-6 col-md-8">
                        <div class="titolo-sezione">
                            <h2><?php the_title(); ?></h2>
                            <p><?php echo get_the_excerpt(); ?></p>
                        </div>
                    </div>
                    <div class="offset-lg-1 col-lg-3 col-md-4">
                        <aside id="argomenti-sezione">
                            <div class="argomenti">
                                <h4>Categorie</h4>
                                <div class="argomenti-sezione-elenco">
                                    <?php
                                    if (!empty($category)) {
                                        foreach ($category as $cat) {
                                            echo '<a href="' . esc_url(get_category_link($cat->term_id)) . '" title="' . esc_html($cat->name) . '" class="badge badge-pill badge-argomenti">' . esc_html($cat->name) . '</a>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="row mt40">
                    <div class="offset-xl-1 col-xl-2 offset-lg-1 col-lg-3 col-md-3">
                        <p class="data-articolo">
                            <span>Data:</span><br /><strong><?php echo $datapost; ?></strong>
                        </p>
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
                            <?php if (!get_theme_mod('active_allegati_contenuto'))
                                    get_template_part('template-parts/attachments-sidebar'); ?>
                            
                            <?php get_template_part('template-parts/sidebar-single'); ?>
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
                                        <p>Ultimo aggiornamento</p>
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
      else : include('error.php');
      endif; ?>
