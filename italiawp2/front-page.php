<?php

get_header();

get_template_part('template-parts/notification');

if (get_theme_mod('active_section_last_one_news')):
    get_template_part('template-parts/section-last-one-news');
else:
    get_template_part('template-parts/section-hero');
endif;

if (get_theme_mod('active_section_last_news')):
    get_template_part('template-parts/section-last-news');
endif;


if( get_the_content() != "" ): ?>
<section id="home-contenuto" class="section">
    <div class="container">
        <div class="widget">
            <div class="row">
                <div class="col-md-12">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif;

if (get_theme_mod('active_section_services')):
    get_template_part('template-parts/section-services');
endif;

if (get_theme_mod('active_section_galleries')):
    get_template_part('template-parts/section-gallery-carousel');
endif;

get_sidebar();
get_footer();
