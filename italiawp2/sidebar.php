<?php

if(is_front_page()):
    if (get_theme_mod('active_section_map')):
        get_template_part('template-parts/section-map');
    endif;
endif;
