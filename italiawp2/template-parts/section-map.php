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
<?php endif; ?>

<?php if (get_option('dettagli-map-latitude')  != "" and get_option('dettagli-map-latitude')  != ""): ?>
    <section id="mappa" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3><?php echo __('Interactive Map','italiawp2'); ?></h3>
                </div>
            </div>
        </div>
        
        <div id="map-container" class="container-fluid container-sm">
            <div id="map" class="map map-color mt-3"></div>
            <script>
                const c = [<?php echo get_option('dettagli-map-latitude') ?>, <?php echo get_option('dettagli-map-longitude') ?>];
                
                let map = new L.map('map');
                map.setView(c,100);
                
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);
                
                let marker = L.marker(c).addTo(map);
                <?php if (get_option('dettagli-map-popup')!=''): ?>
                    marker.bindPopup(<?php echo sanitize_text_field(get_option('dettagli-map')); ?>).openPopup();
                    <?php else :
                        echo "marker.bindPopup(\"<span>";
                        echo get_option('blogname');
                        echo "<br><b>";
                        echo get_option('dettagli-indirizzo');
                        echo "</b><br>";
                        echo get_option('dettagli-cap');
                        echo ", ";
                        echo get_option('dettagli-citta');
                        echo "</span>\").openPopup();";
                    ?>
                <?php endif; ?>
            </script>
        </div>
    </section>
<?php endif; ?>