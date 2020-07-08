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
    } ?>

        <section id="intro">
            <div class="container">
                <div class="offset-lg-1 col-lg-6 col-md-8">
                    <div class="titolo-sezione">
                        <h2><?php the_title(); ?></h2>
                        <p><?php echo get_the_excerpt(); ?></p>
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
                    <div class="col-12 linetop pt8">
                        <div class="articolo-paragrafi">
                            <div class="row">
                                <div class="col-12 testolungo">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                            
                            <?php get_template_part('template-parts/attachments'); ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php endwhile;
      else : include('error.php');
      endif; ?>
