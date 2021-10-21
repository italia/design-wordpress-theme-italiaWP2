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

<section id="hero">
    <div class="widget">
        <div class="hero-foto"></div>
    </div>
</section>
<?php endif; ?>
