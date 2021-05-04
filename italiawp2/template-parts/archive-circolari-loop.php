<?php
/*
 * ### LOOP ARCHIVIO CIRCOLARI ###
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
                    <h3><?php echo __('Circulars','italiawp2'); ?>
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

    $datapost = get_the_date('j F Y', '', '');
    
    $circolare_id = get_the_ID();
    $circolare_num = get_post_meta($circolare_id,"_numero",TRUE);
    $circolare_anno = get_post_meta($circolare_id,"_anno",TRUE);
    $circolare_gruppi = wp_get_object_terms($circolare_id,'gruppiutenti'); ?>
                    
            <div class="col-md-4 mb32-l">
                
                <article class="scheda scheda-round scheda-news card">
                    
                    <div class="scheda-icona-small">
                    <?php if(is_sticky( $post->ID )) { ?>
                        <div class="flag-icon"></div>
                    <?php } ?>

                        <svg class="icon"><use xlink:href="<?php bloginfo('template_url'); ?>/static/img/ponmetroca.svg#ca-today"></use></svg>
                        <?php echo $datapost; ?>
                        <?php echo '- '.__('No.','italiawp2').' '.$circolare_num.__(' of ','italiawp2').$circolare_anno; ?>
                    </div>
                    
                    <div class="scheda-testo <?php if($img_url=="") echo 'scheda-testo-nofoto'; ?>">
                        
                        <h4>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h4>
                        <p><?php echo get_the_excerpt(); ?></p>
                    </div>
                    
                    <div class="scheda-argomenti scheda-icona-small">
                        <svg class="icon"><use xlink:href="<?php bloginfo('template_url'); ?>/static/img/ponmetroca.svg#ca-account_circle"></use></svg>
                        <span class="badge badge-pill badge-argomenti"><?php echo get_the_author(); ?></span>
                    </div>
                    
                    <?php if (!empty($circolare_gruppi)) { ?>
                    <div class="scheda-argomenti">
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
      else : include('error.php');
      endif; ?>

        </div>
    </div>
</section>

<?php include_once('pagination.php');
