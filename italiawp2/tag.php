<?php

get_header();

get_template_part( 'template-parts/archive-loop' );

?>

<section id="sezioni-servizi">
    <div class="container">
        <div class="widget">
            <div> 
                <div class="row">
                    <div class="col-md-12">
                        <div class="titolosezione">
                            <h3><?php echo __('Other topics','italiawp2'); ?></h3>
                        </div>
                    </div>
                </div>
                
                
                <?php
                    $i=0;
                    foreach (get_tags() as $tag) {
                    
                    if($i==0) { ?>
                <div class="row row-eq-height">
                <?php } ?>
                    
                    <div class="col-md-4">
                        <article class="scheda-brick scheda-argomento-lista scheda-round">
                            <div class="scheda-argomento-lista-testo">
                                <h4 class="mt8 mb8">
                                    <a href="<?php echo esc_url(get_tag_link($tag)); ?>" title="<?php echo $tag->name; ?>"><?php echo $tag->name; ?></a>
                                </h4>
                            </div>
                        </article>
                    </div>
                    
                <?php $i++;
                    if($i==3) { $i=0; ?>
                </div>
                <?php } ?>
                    
                <?php } ?>
 
                </div>
            </div>
        </div>
    </div>
</section>

<?php

get_sidebar();
get_footer();
