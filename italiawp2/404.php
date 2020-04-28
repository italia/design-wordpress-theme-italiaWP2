<?php get_header(); ?>

<section id="intro">
    <div class="container">
        <div class="row">
            <div class="offset-lg-1 col-lg-6 col-md-8">
                <div class="titolo-sezione">
                    <h1 class="ErrorPage-title">404</h1>
                    <h2 class="ErrorPage-subtitle">Pagina non trovata</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="articolo-dettaglio-testo">
    <div class="container">
        <div class="row">
            <div class="col-12 linetop pt8">
                <div class="articolo-paragrafi">
                    <div class="row">
                        <div class="col-12 testolungo">
                            <p>Oops! La pagina che cerchi non è stata trovata, <a href="javascript:history.back();" title="Torna alla pagina precedente">torna indietro</a> o utilizza il menu per continuare la navigazione.</p>
                        </div>
                    </div>
                    
                    <div class="row mt32">
                        <div class="col-md-12 veditutti">
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-default btn-verde">Torna alla Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer();
