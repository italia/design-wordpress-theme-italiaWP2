<?php
/*
 * ### NAVIGAZIONE ###
 *
 */
?>

<section class="mt40 mb40">
    <div class="row">
        <div class="col-12">

            <nav class="pagination-wrapper justify-content-center" aria-label="Navigazione tra le notizie">
                <ul class="pagination">
                    <li class="page-item">
                        <?php
                        if (get_adjacent_post(false, '', true)) {
                            previous_post_link('%link', '<svg class="icon">
                                                                <use xlink:href="' . get_bloginfo('template_url') . '/static/img/bootstrap-italia.svg#it-chevron-left"></use>
                                                            </svg>
                                                            <span class="sr-only">Pagina precedente</span>');
                        } else {
                            $first = new WP_Query('posts_per_page=1&order=DESC');
                            $first->the_post();
                            echo '<a href="' . get_permalink() . '"><svg class="icon">
                                                                <use xlink:href="' . get_bloginfo('template_url') . '/static/img/bootstrap-italia.svg#it-chevron-left"></use>
                                                            </svg>
                                                            <span class="sr-only">Pagina precedente</span></a>';
                            wp_reset_query();
                        };
                        ?>
                    </li>
                    <li class="page-item">
                        <?php
                        if (get_adjacent_post(false, '', false)) {
                            next_post_link('%link', '<svg class="icon">
                                                            <use xlink:href="' . get_bloginfo('template_url') . '/static/img/bootstrap-italia.svg#it-chevron-right"></use>
                                                        </svg>
                                                        <span class="sr-only">Pagina successiva</span>');
                        } else {
                            $last = new WP_Query('posts_per_page=1&order=ASC');
                            $last->the_post();
                            echo '<a href="' . get_permalink() . '"><svg class="icon">
                                                            <use xlink:href="' . get_bloginfo('template_url') . '/static/img/bootstrap-italia.svg#it-chevron-right"></use>
                                                        </svg>
                                                        <span class="sr-only">Pagina successiva</span></a>';
                            wp_reset_query();
                        };
                        ?>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
</section>

<script>
    $(document).ready(function () {
        $(".pagination li a,.pagination li span").addClass("page-link");
        $(".pagination li .current").attr("aria-current", "page").parent().addClass("active");
    });
</script>
