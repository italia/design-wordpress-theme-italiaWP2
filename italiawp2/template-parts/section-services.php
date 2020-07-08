<?php
/*
 * ### SEZIONE BOX SERVIZI ###
 * Bisogna creare 3 menu personalizzati e metterli nelle seguenti location per menu:
 * "box-servizi-1", "box-servizi-2", "box-servizi-3"
 *
 */
?>

<section id="sezione-servizi" class="section">
    <div class="container">
        <div class="widget">
            <div class="row">
                <div class="col-md-12">
                    <div class="titolosezione">
                        <h3><?php echo __('Services','italiawp2'); ?></h3>
                    </div>
                </div>
            </div>
            <div class="row row-eq-height">

                    <?php   if(has_nav_menu('box-servizi-1')) {
                        $menu = array(
                            'theme_location'  => 'box-servizi-1',
                            'container'       => 'div',
                            'container_class' => 'box-servizi col-lg-4 col-md-6',
                            'menu_class'      => '',
                            'echo'            => false,
                            'link_before'     => '<div class="scheda-sito u-background-80">',
                            'link_after'      => '</div>'
                        );
                        echo strip_tags(wp_nav_menu($menu),"<div><a><img>");
                    } ?>

                    <?php   if(has_nav_menu('box-servizi-2')) {
                        $menu = array(
                            'theme_location'  => 'box-servizi-2',
                            'container'       => 'div',
                            'container_class' => 'box-servizi col-lg-4 col-md-6',
                            'menu_class'      => '',
                            'echo'            => false,
                            'link_before'     => '<div class="scheda-sito u-background-80">',
                            'link_after'      => '</div>'
                        );
                        echo strip_tags(wp_nav_menu($menu),"<div><a><img>");
                    } ?>

                    <?php   if(has_nav_menu('box-servizi-3')) {
                        $menu = array(
                            'theme_location'  => 'box-servizi-3',
                            'container'       => 'div',
                            'container_class' => 'box-servizi col-lg-4 col-md-6',
                            'menu_class'      => '',
                            'echo'            => false,
                            'link_before'     => '<div class="scheda-sito u-background-80">',
                            'link_after'      => '</div>'
                        );
                        echo strip_tags(wp_nav_menu($menu),"<div><a><img>");
                    } ?>

                    <?php   if(has_nav_menu('box-servizi-4')) {
                        $menu = array(
                            'theme_location'  => 'box-servizi-4',
                            'container'       => 'div',
                            'container_class' => 'box-servizi col-lg-4 col-md-6',
                            'menu_class'      => '',
                            'echo'            => false,
                            'link_before'     => '<div class="scheda-sito u-background-50">',
                            'link_after'      => '</div>'
                        );
                        echo strip_tags(wp_nav_menu($menu),"<div><a><img>");
                    } ?>

                    <?php   if(has_nav_menu('box-servizi-5')) {
                        $menu = array(
                            'theme_location'  => 'box-servizi-5',
                            'container'       => 'div',
                            'container_class' => 'box-servizi col-lg-4 col-md-6',
                            'menu_class'      => '',
                            'echo'            => false,
                            'link_before'     => '<div class="scheda-sito u-background-50">',
                            'link_after'      => '</div>'
                        );
                        echo strip_tags(wp_nav_menu($menu),"<div><a><img>");
                    } ?>
                
                    <?php   if(has_nav_menu('box-servizi-6')) {
                        $menu = array(
                            'theme_location'  => 'box-servizi-6',
                            'container'       => 'div',
                            'container_class' => 'box-servizi col-lg-4 col-md-6',
                            'menu_class'      => '',
                            'echo'            => false,
                            'link_before'     => '<div class="scheda-sito u-background-50">',
                            'link_after'      => '</div>'
                        );
                        echo strip_tags(wp_nav_menu($menu),"<div><a><img>");
                    } ?>
                
                    <?php   if(has_nav_menu('box-servizi-7')) {
                        $menu = array(
                            'theme_location'  => 'box-servizi-7',
                            'container'       => 'div',
                            'container_class' => 'box-servizi col-lg-4 col-md-6',
                            'menu_class'      => '',
                            'echo'            => false,
                            'link_before'     => '<div class="scheda-sito u-background-grey-50">',
                            'link_after'      => '</div>'
                        );
                        echo strip_tags(wp_nav_menu($menu),"<div><a><img>");
                    } ?>
                
                    <?php   if(has_nav_menu('box-servizi-8')) {
                        $menu = array(
                            'theme_location'  => 'box-servizi-8',
                            'container'       => 'div',
                            'container_class' => 'box-servizi col-lg-4 col-md-6',
                            'menu_class'      => '',
                            'echo'            => false,
                            'link_before'     => '<div class="scheda-sito u-background-grey-50">',
                            'link_after'      => '</div>'
                        );
                        echo strip_tags(wp_nav_menu($menu),"<div><a><img>");
                    } ?>
                
                    <?php   if(has_nav_menu('box-servizi-9')) {
                        $menu = array(
                            'theme_location'  => 'box-servizi-9',
                            'container'       => 'div',
                            'container_class' => 'box-servizi col-lg-4 col-md-6',
                            'menu_class'      => '',
                            'echo'            => false,
                            'link_before'     => '<div class="scheda-sito u-background-grey-50">',
                            'link_after'      => '</div>'
                        );
                        echo strip_tags(wp_nav_menu($menu),"<div><a><img>");
                    } ?>
                
            </div>
        </div>
    </div>
</section>
