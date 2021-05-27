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

if(get_option('dettagli-num-articoli')) {
    $num_articoli = get_option('dettagli-num-articoli');
}else{
    $num_articoli = 3;
}

if (!get_theme_mod('active_section_last_one_news')) {
    
    $sticky = count(get_option('sticky_posts'));
    if ($sticky > 0) {
        
        // Primo loop con sticky posts
        $args = array (
            'posts_per_page' => $sticky,
            'post__in' => get_option('sticky_posts'),
        );

        $do_not_duplicate = array();
        $query = new WP_Query( $args );
        
        while ( $query->have_posts() ) : $query->the_post(); $do_not_duplicate[] = $post->ID;

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
            $posttags = get_the_tags();
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

                        <div class="scheda-icona-small">
                        <?php if(is_sticky( $post->ID )) { ?>
                            <div class="flag-icon"></div>
                        <?php } ?>

                            <svg class="icon"><use xlink:href="<?php bloginfo('template_url'); ?>/static/img/ponmetroca.svg#ca-today"></use></svg>
                            <?php echo $datapost; ?>
                        </div>

                        <div class="scheda-testo <?php if($img_url=="") echo 'scheda-testo-nofoto'; ?>">

                            <h4>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h4>

                            <p><?php echo get_the_excerpt(); ?></p>
                        </div>

                        <?php if (!empty($category)) { ?>
                        <div class="scheda-argomenti">
                            <h4><?php echo __('Categories','italiawp2'); ?></h4>
                            <?php
                                foreach ($category as $cat) {
                                    echo '<a href="' . esc_url(get_category_link($cat->term_id)) . '" title="' . esc_html($cat->name) . '" class="badge badge-pill badge-argomenti">' . esc_html($cat->name) . '</a>';
                                }
                             ?>
                        </div>
                        <?php } ?>

                        <?php if (!empty($posttags)) { ?>
                        <div class="scheda-argomenti">
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

                        <div class="scheda-footer">
                            <a href="<?php the_permalink(); ?>" title="<?php echo __('Go to the page','italiawp2'); ?>: <?php the_title(); ?>" class="tutte">
                                <?php echo __('Read more','italiawp2'); ?>
                                <svg class="icon">
                                    <use xlink:href="<?php bloginfo('template_url'); ?>/static/img/ponmetroca.svg#ca-arrow_forward"></use>
                                </svg>
                            </a>
                        </div>
                    </article>
                </div>

        <?php endwhile;
        wp_reset_postdata();
        // Fine primo loop con sticky posts
    }
    
    if ($sticky < $num_articoli) {
        $allstickys = $num_articoli - $sticky;
        
        // Inizializzo il secondo loop senza sticky
        $args = array (
            'posts_per_page'         => $allstickys,
            'post__not_in'           => $do_not_duplicate
        ); 
    }
}else{
    $args = array(
        'posts_per_page' => $num_articoli,
        'post__not_in' => get_option( 'sticky_posts' )
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
        $posttags = get_the_tags();
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
                        
                        <div class="scheda-icona-small">
                        <?php if(is_sticky( $post->ID )) { ?>
                            <div class="flag-icon"></div>
                        <?php } ?>
                            
                            <svg class="icon"><use xlink:href="<?php bloginfo('template_url'); ?>/static/img/ponmetroca.svg#ca-today"></use></svg>
                            <?php echo $datapost; ?>
                        </div>

                        <div class="scheda-testo <?php if($img_url=="") echo 'scheda-testo-nofoto'; ?>">
                        
                            <h4>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h4>

                            <p><?php echo get_the_excerpt(); ?></p>
                        </div>
                        
                        <?php if (!empty($category)) { ?>
                        <div class="scheda-argomenti">
                            <h4><?php echo __('Categories','italiawp2'); ?></h4>
                            <?php
                                foreach ($category as $cat) {
                                    echo '<a href="' . esc_url(get_category_link($cat->term_id)) . '" title="' . esc_html($cat->name) . '" class="badge badge-pill badge-argomenti">' . esc_html($cat->name) . '</a>';
                                }
                             ?>
                        </div>
                        <?php } ?>

                        <?php if (!empty($posttags)) { ?>
                        <div class="scheda-argomenti">
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
                        
                        <div class="scheda-footer">
                            <a href="<?php the_permalink(); ?>" title="<?php echo __('Go to the page','italiawp2'); ?>: <?php the_title(); ?>" class="tutte">
                                <?php echo __('Read more','italiawp2'); ?>
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
            
    <?php if (get_theme_mod('active_altre_categorie_home')): ?>
            <div class="row">
                <div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                    <div class="row">
                        <div class="col-lg-3">
                            <h6 class="text-uppercase text-center"><?php echo __('Other categories','italiawp2'); ?></h6>
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
    <?php endif; ?>
            
    <?php if (get_theme_mod('active_altri_argomenti_home')): ?>
            <div class="row mt-4">
                <div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                    <div class="row">
                        <div class="col-lg-3">
                            <h6 class="text-uppercase text-center"><?php echo __('Other topics','italiawp2'); ?></h6>
                        </div>
                        <div class="col-lg-9 text-center text-lg-left">
                            
                            <?php foreach (get_tags() as $tag){ ?>
                            <div class="chip chip-simple chip-primary">
                                <a href="<?php echo esc_url(get_tag_link($tag)); ?>" class="chip-label"><?php echo $tag->name; ?></a>
                            </div>
                            <?php } ?>
                            
                        </div>
                    </div>
                </div>
            </div>
    <?php endif; ?>
            
            <div class="row mt32">
                <div class="col-md-12 veditutti">
                    <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" title="<?php echo __('Go to the page','italiawp2'); ?>: <?php echo __('News','italiawp2'); ?>" class="btn btn-default btn-verde">
                        <?php echo __('See all','italiawp2'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
