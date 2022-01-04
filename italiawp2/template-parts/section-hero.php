<?php
/*
 * ### SEZIONE HERO ###
 * Solo immagine
 *
 */

    $headerImage = get_header_image();
?>

<?php if ($headerImage): ?>
<style>
    #hero .hero-foto {
        background-image: url('<?php echo esc_url( $headerImage ); ?>') !important;
    }
</style>
<?php else: ?>
<style>
    #hero {
        height: 0 !important;
        margin-bottom: 60px !important;
    }
    #hero .widget {
        display: none;
    }
    #hero .hero-foto {
        background: transparent !important;
    }
</style>
<?php endif; ?>

<section id="hero">
    <div class="widget">
        <div class="hero-foto"></div>
    </div>
</section>
