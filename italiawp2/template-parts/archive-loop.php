<?php
/*
 * ### LOOP PRINCIPALE ###
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
                    <h3><?php the_archive_title('',''); ?>
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
            $img_url = get_bloginfo('template_url') . "/images/400x220.png";
        }
    }
    
    $category = get_the_category(); $first_category = $category[0];
    $posttags = get_the_tags();
    $datapost = get_the_date('j F Y', '', ''); ?>
                    
            <div class="col-md-4 mb32-l">
                
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
                    
                <?php if ( 'post' == get_post_type($post->ID) ) { ?>
                    <div class="scheda-icona-small">
                    <?php if(is_sticky( $post->ID )) { ?>
                        <div class="flag-icon"></div>
                    <?php } ?>

                        <svg class="icon"><use xlink:href="<?php bloginfo('template_url'); ?>/static/img/ponmetroca.svg#ca-today"></use></svg>
                        <?php echo $datapost; ?>
                    </div>
                <?php }else{ ?>
                    <div class="scheda-icona-small">
                        <svg class="icon"><use xlink:href="<?php bloginfo('template_url'); ?>/static/img/ponmetroca.svg#ca-account_balance"></use></svg>
                        <?php echo __('Page','italiawp2'); ?>
                    </div>
                <?php } ?>
                    
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
                        <a href="<?php the_permalink(); ?>" title="Vai alla pagina: <?php the_title(); ?>" class="tutte">
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
