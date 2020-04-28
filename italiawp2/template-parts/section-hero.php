<?php
/*
 * ### SEZIONE HERO ###
 * Solo immagine
 *
 */
?>

<style>
    #hero .hero-foto {
        background-image: url('<?php echo esc_url( get_header_image() ); ?>') !important;
    }
</style>

<section id="hero">
    <div class="widget">
        <div class="hero-foto"></div>
    </div>
</section>
