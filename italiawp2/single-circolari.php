<?php

get_header();

if(!is_front_page()) get_template_part( 'template-parts/circolare-loop' );

get_sidebar();
get_footer();
