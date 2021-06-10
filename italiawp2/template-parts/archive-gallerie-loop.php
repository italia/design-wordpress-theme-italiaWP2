<?php
/*
 * ### LOOP ARCHIVIO GALLERIE ###
 *
 */
?>

<section id="sezione-notizie" class="pt64 pb32 bg-grigio">
    <div class="container">

<?php
    $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
    $total_post = wp_count_posts();
    $published_post = $total_post->publish;
    $total_pages = ceil( $published_post / $posts_per_page ); ?>
        
        <div class="row">
            <div class="col-md-12">
                <div class="titolosezione">
                    <h3><?php echo the_archive_title('',''); ?>
                        <?php if($wp_query->max_num_pages != 0) { ?>
                        <br><small><?php echo __('Page','italiawp2'); ?> <?php echo $paged; ?> <?php echo __('of','italiawp2'); ?> <?php echo $wp_query->max_num_pages; ?></small>
                        <?php } ?>
                    </h3>
                </div>
            </div>
        </div>
        <div class="row row-eq-height">

<?php

$i = 0; if (have_posts()) :
    while (have_posts()) : the_post();

    $i++;

    $img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'news-image' );
    if($img_url!="") {
        $img_url = $img_url[0];
    }else if(get_theme_mod('active_immagine_evidenza_default')) {
        $img_url = esc_url(get_theme_mod('immagine_evidenza_default'));
        if($img_url=="") {
            $img_url = esc_url( get_template_directory_uri() ) . "/images/400x220.png";
        }
    }
    
    $category = get_the_category();
    $datapost = get_the_date('j F Y', '', ''); ?>
                    
            <div class="col-md-4 mb32">
                <article class="scheda scheda-round scheda-news card">
                    
                    <?php if($img_url!="") { ?>
                    <div class="scheda-foto">
                        <a href="<?php the_permalink(); ?>">
                            <figure>
                                <img src="<?php print $img_url; ?>" alt="<?php the_title(); ?>" class="img-fluid" />
                            </figure>
                        </a>
                    </div>
                    <?php } ?>
                    
                    <div class="scheda-icona-small">
                        <svg class="icon"><use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/svg/sprite.svg#it-camera"></use></svg>
                        <?php echo $datapost; ?>
                    </div>
                    
                    <div class="scheda-testo">
                        <h4>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h4>
                        <p><?php echo get_the_excerpt(); ?></p>
                    </div>
                    
                    <div class="scheda-footer">
                        <a href="<?php the_permalink(); ?>" title="<?php echo __('Go to the page','italiawp2'); ?>: <?php the_title(); ?>" class="tutte">
                            <?php echo __('Browse gallery','italiawp2'); ?>
                            <svg class="icon">
                                <use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/img/ponmetroca.svg#ca-arrow_forward"></use>
                            </svg>
                        </a>
                    </div>
                </article>
            </div>

<?php endwhile;
      else : get_template_part('template-parts/error');
      endif; ?>

        </div>
    </div>
</section>

<?php get_template_part('template-parts/pagination');
