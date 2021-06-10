<?php
/*
 * ### PAGINAZIONE ###
 *
 */
?>

<?php if ( $wp_query->max_num_pages > 1 ) : ?>
<section class="mt40 mb40">
<div class="row">
    <div class="col-12">

    <nav class="pagination-wrapper justify-content-center" aria-label="<?php echo __('Browsing the news','italiawp2'); ?>">
        <ul class="pagination">
            <li class="page-item">
                <?php echo get_previous_posts_link('<svg class="icon">
                                                        <use xlink:href="'. esc_url( get_template_directory_uri() ).'/static/img/bootstrap-italia.svg#it-chevron-left"></use>
                                                    </svg>
                                                    <span class="sr-only">'.__('Previous page','italiawp2').'</span>'); ?>
            </li>
        <?php 
            if($paged) {
                $pages = paginate_links(array(
                    'total' => $wp_query->max_num_pages,
                    'current' => max(1, get_query_var('paged')),
                    'show_all' => false,
                    'end_size' => 1,
                    'mid_size' => 1,
                    'prev_next' => false,
                    'before_page_number' => '',
                    'after_page_number' => '',
                    'type' => 'array'
                ));

                if(is_array($pages)) {
                    $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
                    foreach ($pages as $page) {
                        if(get_query_var('paged') != 1) {
                            echo '<li class="page-item">'.$page.'</li>';
                        }
                    }
                }
            } ?>
            <li class="page-item">
                <?php echo get_next_posts_link('<svg class="icon">
                  <use xlink:href="'. esc_url( get_template_directory_uri() ).'/static/img/bootstrap-italia.svg#it-chevron-right"></use>
                  </svg>
                  <span class="sr-only">'.__('Next page','italiawp2').'</span>'); ?>
            </li>
        </ul>
    </nav>
        
    </div>
</div>
</section>
<?php endif; ?>

<script>
jQuery(function ($) {
    $(document).ready(function () {
        $(".pagination li a,.pagination li span").addClass("page-link");
        $(".pagination li .current").attr("aria-current","page").parent().addClass("active");
    });
});
</script>
