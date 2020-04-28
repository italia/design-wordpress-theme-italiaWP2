<?php

get_header();

if(is_attachment()) {
    get_template_part( 'template-parts/attachment-loop' );
}else if(is_custom_post_type()) {
    get_template_part( 'template-parts/custom-post-type-loop' );
}else{
    get_template_part( 'template-parts/single-loop' );
}

get_template_part( 'template-parts/section-single-last-news' );

get_sidebar();
get_footer();
