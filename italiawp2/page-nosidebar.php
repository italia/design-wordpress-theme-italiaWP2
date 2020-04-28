<?php

/* Template Name: Senza Sidebar */

get_header();

if(!is_front_page()) get_template_part( 'template-parts/page-loop-nosidebar' );

get_sidebar();
get_footer();
