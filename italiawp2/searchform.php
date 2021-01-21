<div class="cerca">
<form class="Form" method="get" role="search" action="<?php echo esc_url(home_url('/')); ?>">
    <input type="text" value="" name="s" title="<?php echo __('Search','italiawp2'); ?>" placeholder="<?php echo __('Search','italiawp2'); ?>" required>
    <button class="btn btn-default btn-cerca pull-right" name="submit" title="<?php echo __('Search','italiawp2'); ?>" aria-label="<?php echo __('Search','italiawp2'); ?>">
        <svg class="icon">
        <use xlink:href="<?php bloginfo('template_url'); ?>/static/img/ponmetroca.svg#ca-search"></use>
        </svg>
    </button>
</form>
</div>
