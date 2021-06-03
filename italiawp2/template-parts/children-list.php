<?php
/*
 * ### ELENCO DEI FIGLI ###
 *
 */
?>

<?php
    $page = get_the_ID();
    global $post;
    $parent = wp_get_post_parent_id($post->ID);
    $children = get_pages(array('child_of' => $post->ID)); ?>

        <?php if (count(get_post_ancestors($page)) != 0) { ?>
        <div class="list-group lista-paragrafi">
            <a class="list-group-item list-group-item-action Linklist-link Linklist-link--lev3" href="<?php echo get_permalink($parent); ?>">
                <svg class="icon">
                    <use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/img/bootstrap-italia.svg#it-chevron-left"></use>
                </svg> <?php echo __('Back','italiawp2'); ?>
            </a>
        </div>
        <?php } ?>

        <h4 class="dropdown">
            <?php echo __('Linked pages','italiawp2'); ?>
        </h4>
        <div class="menu-separatore"><div class="bg-oro"></div></div>

    <div class="list-group lista-paragrafi">

        <?php if ($parent != 0) { ?>
            <a class="list-group-item list-group-item-action Linklist-link Linklist-link--lev1" href="<?php echo get_the_permalink($parent); ?>"><?php echo get_the_title($parent); ?></a>

            <?php
            $args = array(
                'post_parent' => $parent,
                'post_type' => 'page',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC'
            );

            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();

                    if ($page == get_the_ID()) { ?>

                        <?php
                        if (count($children) > 0) { ?>

                        <a class="list-group-item list-group-item-action Linklist-link Linklist-link--lev2 is-expanded" href="<?php the_permalink(); ?>"><?php the_title(); ?>
                            <svg class="icon">
                                <use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/static/svg/sprite.svg#it-arrow-down-triangle"></use>
                            </svg>
                        </a>

                        <?php
                            $args2 = array(
                                'post_parent' => $page,
                                'post_type' => 'page',
                                'posts_per_page' => -1,
                                'orderby' => 'menu_order',
                                'order' => 'ASC'
                            );

                            $the_query2 = new WP_Query($args2);
                            if ($the_query2->have_posts()) : while ($the_query2->have_posts()) : $the_query2->the_post(); ?>

                                    <a class="list-group-item list-group-item-action Linklist-link Linklist-link--lev3" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

                                    <?php
                                endwhile;
                            endif;
                            wp_reset_postdata();
                        }else{ ?>
                        <a class="list-group-item list-group-item-action Linklist-link Linklist-link--lev2" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  <?php } ?>

                    <?php }else { ?>
                        <a class="list-group-item list-group-item-action Linklist-link Linklist-link--lev2" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <?php } ?>

                    <?php
                endwhile;
            endif;
            wp_reset_postdata(); ?>

        <?php } else { ?>

            <a class="list-group-item list-group-item-action Linklist-link Linklist-link--lev1" href="<?php echo get_the_permalink($page); ?>"><?php echo get_the_title($page); ?></a>

            <?php
            if (count($children) > 0) {

                $args = array(
                    'post_parent' => $page,
                    'post_type' => 'page',
                    'posts_per_page' => -1,
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                );

                $the_query = new WP_Query($args);
                if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <a class="list-group-item list-group-item-action Linklist-link Linklist-link--lev2" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <?php
                endwhile;
                endif;
                wp_reset_postdata();
            } ?>
        <?php } ?>
    </div>
