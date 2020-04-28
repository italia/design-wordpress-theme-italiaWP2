<?php

/* Galleria */

function italiawp2_custom_gallery( $output = '', $atts, $instance ) {
    $atts = array_merge(array('columns' => 3), $atts);
    $columns = $atts['columns'];
    $link = $atts['link'];
    $size = $atts['size'];
    
    if(is_array($atts['ids'])) $images = $atts['ids'];
    else $images = explode(',', $atts['ids']);

    $return = '</div></div>
                <div class="row mb32">
                    <div class="col-md-12 paragrafo">
                        <div class="galleriasfondo"></div>
                    </div>
                    <div class="offset-md-1 col-md-11 paragrafo">
                        <div class="galleriaslide">
                            <h4 class="mb-3">Galleria fotografica <small>(scorri)</small></h4>
                            <div id="owl-galleria"
                                 class="owl-carousel owl-center owl-theme owl-loaded owl-drag"
                                 role="tablist">';

    $i = 0;

    foreach ($images as $key => $value) {
        $link_url = "";
        if($link == "file") $link_url = wp_get_attachment_image_src($value, 'full')[0];
        else if($link=="") $link_url = get_permalink($value);
        
        if($size != "") $image_size = wp_get_attachment_image_src($value, $size);
        else $image_size = wp_get_attachment_image_src($value,'post-thumbnails');
        
        $attachment_meta = wp_get_attachment($value);
        $image_caption = $attachment_meta['caption'];

    $return .= '<figure><div class="galleria-foto">';
        if($link_url!="") {
            $return .= '<a href="'.$link_url.'" title="'.$attachment_meta['caption'].'" class="magnific-popup-gallery">';
        }
            $return .= '<img src="'.$image_size[0].'" class="img-fluid in-gallery" alt="'.$attachment_meta['caption'].'"/>';
        if($link_url!="") {
            $return .= '</a>';
        }
            $return .= '<p>'.date('j F Y',strtotime($attachment_meta['date'])).'</p>';
        
        $return .= '</div>';
            
        if($image_caption!=="") {
            $return .= '
        <figcaption>
            <p>'.$image_caption.'</p>
        </figcaption>';
        }
    
        $return .= '</figure>';
        $i++;
    }

    $return .= '            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 testolungo">';

    return $return;
}
add_filter('post_gallery','italiawp2_custom_gallery', 10, 3 );

function wp_get_attachment( $attachment_id ) {
    $attachment = get_post( $attachment_id );
    return array(
        'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
        'caption' => $attachment->post_excerpt,
        'description' => $attachment->post_content,
        'href' => get_permalink( $attachment->ID ),
        'src' => $attachment->guid,
        'title' => $attachment->post_title,
        'date' => $attachment->post_date
    );
}

/* Immagini Singole */

function get_attachment_id($url) {
    $attachment_id = 0;
    $dir = wp_upload_dir();
    if (false !== strpos($url, $dir['baseurl'] . '/')) {
        $file = basename($url);
        $query_args = array(
            'post_type' => 'attachment',
            'post_status' => 'inherit',
            'fields' => 'ids',
            'meta_query' => array(
                array(
                    'value' => $file,
                    'compare' => 'LIKE',
                    'key' => '_wp_attachment_metadata',
                ),
            )
        );
        $query = new WP_Query($query_args);
        if ($query->have_posts()) {
            foreach ($query->posts as $post_id) {
                $meta = wp_get_attachment_metadata($post_id);
                $original_file = basename($meta['file']);
                $cropped_image_files = wp_list_pluck($meta['sizes'], 'file');
                if ($original_file === $file || in_array($file, $cropped_image_files)) {
                    $attachment_id = $post_id;
                    break;
                }
            }
        }
    }
    return $attachment_id;
}

if (!get_theme_mod('disactive_cornici_immagini')) {
    add_filter('the_content', 'italiawp2_custom_images', 100);
    function italiawp2_custom_images($content) {
        if (!preg_match_all('/<img [^>]+>/', $content, $matches)) {
            return $content;
        }

        foreach ($matches[0] as $image) {
            $doc = new DOMDocument();
            $doc->loadHTML($image);
            $xpath = new DOMXPath($doc);
            $class = $xpath->evaluate("string(//img/@class)");

            if ( strpos($class, 'in-gallery') == false ) {
                $src = $xpath->evaluate("string(//img/@src)");
                $attachment_id = get_attachment_id($src);
                $content = str_replace($image, italiawp2_custom_image_tag($src, $attachment_id, $class), $content);
            }
        }

        return $content;
    }

    function italiawp2_custom_image_tag($src, $attachment_id, $class) {
        $attachment_meta = wp_get_attachment($attachment_id);

        $imgCaption = wp_get_attachment_caption($attachment_id);
        $imgSrc = $src;
        $imgTitle = $attachment_meta['title'];
        $imgDate = $attachment_meta['date'];
        $imgAlt = $attachment_meta['alt'];

        $fullImage = wp_get_attachment_image_src($attachment_id, 'full');
        $fullImage = $fullImage[0];
        
        $class_align = "";
        if (strpos($class, 'alignleft') !== false) {
            $class_align = " alignleft";
        }else if (strpos($class, 'alignright') !== false) {
            $class_align = " alignright";
        }else if (strpos($class, 'aligncenter') !== false) {
            $class_align = " aligncenter";
        }else {
            $class_align = " alignnone";
        }

        $custom_image = '
        <section class="mt-4 mb-3 image-content italiawp2-img'.$class_align.'">
            <figure class="m-0 p-3 u-background-grey-60">
                <img src="' . $imgSrc . '" class="u-sizeFull" alt="' . $imgAlt . '">
                <figcaption>
                    <p>' . $imgTitle . '</p>';
        
        if ($imgCaption !== "") {
            $custom_image .= '<p class="u-color-white">' . $imgCaption . '</p>';
        }
        
        $custom_image .= '
                </figcaption>
            </figure>';

        $custom_image .= '</section>';
        return $custom_image;
    }
}
