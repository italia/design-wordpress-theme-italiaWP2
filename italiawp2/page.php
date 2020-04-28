<?php

get_header();

if(!is_front_page()) get_template_part( 'template-parts/page-loop' );

get_sidebar();
get_footer();
