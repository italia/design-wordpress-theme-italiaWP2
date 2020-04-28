<?php
/*
 * ### SEZIONE ULTIME NOTIZIE ###
 * Mostra gli ultimi N articoli caricati.
 * Il numero è preso dall'optione "dettagli-num-articoli" editabile dalla pagina "Dettagli" del backend
 *
 */
?>

<section id="home-novita">
    <div class="container">
        <div class="mt-88n">
            <div class="row row-eq-height">
                
<?php

if (get_theme_mod('active_section_last_one_news')) {
    $args = array(
        'posts_per_page' => get_option('dettagli-num-articoli'),
        'post__not_in' => get_option( 'sticky_posts' )
    );
}else{
    $args = array(
        'posts_per_page' => get_option('dettagli-num-articoli')
    );
}

$the_query = new WP_Query($args);
if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();

        $img_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'news-image');
        if ($img_url != "") {
            $img_url = $img_url[0];
        }else if(get_theme_mod('active_immagine_evidenza_default')) {	
            $img_url = esc_url(get_theme_mod('immagine_evidenza_default'));
            if($img_url=="") {
                $img_url = get_bloginfo('template_url') . "/images/400x220.png";
            }
        }

        $category = get_the_category(); $first_category = $category[0];
        $datapost = get_the_date('j F Y', '', ''); ?>
                
                <div class="col-md-4">
                    <article class="scheda scheda-round scheda-news card">

                        <?php if($img_url!="") { ?>
                        <div class="scheda-foto">
                            <a href="<?php the_permalink(); ?>">
                                <figure>
                                    <img src="<?php print $img_url; ?>" alt="<?php the_title(); ?>" class="img-fluid" />
                                </figure>
                            </a>
                            
                        <?php $dataevento = get_post_meta($post->ID, 'Data', true);
                            if ($dataevento) {
                                $dataevento = explode(" ",$dataevento); ?>
                            <div class="card-calendar d-flex flex-column justify-content-center">
                              <span class="card-date"><?php echo $dataevento[0]; ?></span>
                              <span class="card-day"><?php echo $dataevento[1].'<br>'.$dataevento[2]; ?></span>
                            </div>
                        <?php } ?>
                            
                        </div>
                        <?php } ?>

                        <div class="scheda-testo">
                        <?php if(is_sticky( $post->ID )) { ?>
                            <div class="flag-icon"></div>
                        <?php } ?>
                        
                            <h4>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h4>
                            <small><p><?php echo $datapost; ?></p></small>
                            <p><?php echo get_the_excerpt(); ?></p>
                        </div>
                        <div class="scheda-argomenti">
                            <?php
                                if (!empty($category)) {
                                    foreach ($category as $cat) {
                                        echo '<a href="' . esc_url(get_category_link($cat->term_id)) . '" title="' . esc_html($cat->name) . '" class="badge badge-pill badge-argomenti">' . esc_html($cat->name) . '</a>';
                                    }
                                }
                                ?>
                        </div>
                        <div class="scheda-footer">
                            <a href="<?php the_permalink(); ?>" title="Vai alla pagina: <?php the_title(); ?>" class="tutte">
                                Leggi tutto
                                <svg class="icon">
                                    <use xlink:href="<?php bloginfo('template_url'); ?>/static/img/ponmetroca.svg#ca-arrow_forward"></use>
                                </svg>
                            </a>
                        </div>
                    </article>
                </div>
                
<?php
    
    endwhile;  endif;
    wp_reset_postdata();
    
    ?>
            </div>
            
            <div class="row">
                <div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                    <div class="row">
                        <div class="col-lg-3">
                            <h6 class="text-uppercase text-center">Altri argomenti</h6>
                        </div>
                        <div class="col-lg-9 text-center text-lg-left">
                            
                            <?php foreach (get_categories() as $category){ ?>
                            <div class="chip chip-simple chip-primary">
                                <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="chip-label"><?php echo $category->name; ?></a>
                            </div>
                            <?php } ?>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mt32">
                <div class="col-md-12 veditutti">
                    <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" title="Vai alla pagina: Notizie" class="btn btn-default btn-verde">
                        Vedi tutte
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
