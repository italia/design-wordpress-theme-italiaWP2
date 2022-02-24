<?php
/*
 * ### SEZIONE MAPPA ###
 * Mostra la mappa di Google Maps
 *
 */
?>

<?php if (get_option('dettagli-map') != "" ): ?>

<section id="mappa" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3><?php echo __('Interactive Map','italiawp2'); ?></h3>
                <h5><?php echo __('Click on to activate','italiawp2'); ?></h5>
            </div>
        </div>
    </div>
</section>

<section class="map-full-content">
    <div class="map-wrap"></div>
    <iframe src="<?php echo sanitize_text_field(get_option('dettagli-map')); ?>" frameborder="0" allowfullscreen></iframe>
</section>

<?php else: ?>

    <?php if ((get_option('dettagli-map-latitude') != "") && (get_option('dettagli-map-longitude')  != "")): ?>
    <section id="mappa" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3><?php echo __('Interactive Map','italiawp2'); ?></h3>
                </div>
            </div>
        </div>
    </section>

    <section class="map-full-content">
        <div id="map" class="map-container"><!--class="container-fluid container-sm"-->
            <!--<div id="map" class="map map-color mt-3"></div>-->
            <script>
            $(document).ready(function () {
    
                const c = [
                    <?php echo get_option('dettagli-map-latitude') ?>, 
                    <?php echo get_option('dettagli-map-longitude') ?>
                ];

                let map = new L.map('map');
                map.setView(c,100);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                let marker = L.marker(c).addTo(map);
                <?php if (get_option('dettagli-map-popup')!=""): ?>
                    marker.bindPopup("<?php echo get_option('dettagli-map-popup'); ?>").openPopup();
                <?php else : ?>
                    marker.bindPopup("<span><strong><?php echo get_option('blogname'); ?></strong><br><?php echo get_option('dettagli-indirizzo'); ?><br><?php echo get_option('dettagli-cap'); ?>, <?php echo get_option('dettagli-citta'); ?></span>").openPopup();
                <?php endif; ?>
    
            });
            </script>
        </div>
    </section>
    <?php endif; ?>

<?php endif; ?>
