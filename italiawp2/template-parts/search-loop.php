<?php
/*
 * ### LOOP RICERCA ###
 *
 */
?>

<?php
    $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1; ?>

<section id="introricerca">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="titolo-sezione">
                    <h2><?php echo __('Results for','italiawp2'); ?>: "<?php echo get_search_query(); ?>"
                        <?php if($wp_query->max_num_pages != 0) { ?>
                        <br><small><?php echo __('Page','italiawp2'); ?> <?php echo $paged; ?> <?php echo __('of','italiawp2'); ?> <?php echo $wp_query->max_num_pages; ?></small>
                        <?php } ?>
                    </h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="articolo-dettaglio-testo">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="articolo-paragrafi">
                    <div class="row">
                        <div class="col-md-12 cerca-risultati d-md-block d-none">
                            <?php echo $wp_query->found_posts; ?> <?php echo __('results found','italiawp2'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="linetop"></div>
                        

<?php

    if (have_posts()) :
    while (have_posts()) : the_post();
    
    $category = get_the_category(); $first_category = $category[0];
    $datapost = get_the_date('j F Y', '', ''); ?>
                        
                        <div class="col-lg-4 col-md-12">
                            <div class="cerca-risultato-item">
                                <div class="argomenti">
                                <?php
                                if (!empty($category)) {
                                    foreach ($category as $cat) {
                                        echo '<a href="' . esc_url(get_category_link($cat->term_id)) . '" title="' . esc_html($cat->name) . '" class="categoria mr16">' . esc_html($cat->name) . '</a>';
                                    }
                                }
                                ?>
                                </div>
                                <h4>
                                    <a href="<?php the_permalink(); ?>" title="<?php echo __('Go to the page','italiawp2'); ?>: <?php the_title(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h4>
                                <small><p><?php echo $datapost; ?></p></small>
                                <p><?php echo get_the_excerpt(); ?></p>
                                <a aria-label="<?php echo __('Read more','italiawp2'); ?> - <?php echo __('Go to the page','italiawp2'); ?>: <?php the_title(); ?>"
                                   href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="tutte">
                                    <?php echo __('Read more','italiawp2'); ?>
                                    <svg class="icon">
                                        <use xlink:href="<?php bloginfo('template_url'); ?>/static/img/ponmetroca.svg#ca-arrow_forward"></use>
                                    </svg>
                                </a>
                            </div>
                            <div class="linetop"></div>
                        </div>

<?php endwhile;
      else : include('error.php');
      endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once('pagination.php');
