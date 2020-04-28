<?php

get_header();

if (get_theme_mod('active_section_last_one_news')):
    get_template_part('template-parts/section-last-one-news');
else:
    get_template_part('template-parts/section-hero');
endif;

if (get_theme_mod('active_section_last_news')):
    get_template_part('template-parts/section-last-news');
endif;

if (get_theme_mod('active_section_services')):
    get_template_part('template-parts/section-services');
endif;

if (get_theme_mod('active_section_galleries')):
    get_template_part('template-parts/section-gallery-carousel');
endif;

get_sidebar();
get_footer();
