<div class="cerca">
<form class="Form" method="get" role="search" action="<?php echo esc_url(home_url('/')); ?>">
    <input type="text" value="" name="s" required>
    <button class="btn btn-default btn-cerca pull-right" name="submit" title="Avvia la ricerca" aria-label="Avvia la ricerca">
        <svg class="icon">
        <use xlink:href="<?php bloginfo('template_url'); ?>/static/img/ponmetroca.svg#ca-search"></use>
        </svg>
    </button>
</form>
</div>
