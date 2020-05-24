$(document).ready(function () {
    var theme_uri = theme_directory;
    
    $(".box-servizi a").addClass("u-color-white");
    $(".form-submit > input").addClass("btn btn-default");

    /* Metto la data dei post nel titolo (nella sidebar) */
    $(".italiawp2-sidebar > ul > li").each(function () {
        if( $('> span',this).length === 1 && $('> a',this).length === 1 ) {
            var span = $(this).find('span');
            var a = $(this).find('a');
            span.html("<br><small>"+span.html()+"</small>");
            a.append(span);
        }
    });
    
    $("img.alignnone").parent('a').addClass("a-alignnone");
    $("img.aligncenter").parent('a').addClass("a-aligncenter");
    $("img.alignleft").parent('a').addClass("a-alignleft");
    $("img.alignright").parent('a').addClass("a-alignright");
    
    /* Gestisco i blockquote */
    $("blockquote").addClass("callout important callout-punti");
    
    /* Sistemo gli elenchi nella sidebar */
    $(".italiawp2-sidebar > ul li a").addClass("list-group-item list-group-item-action");
    $(".italiawp2-sidebar > ul li").changeElementType('span');
    $(".italiawp2-sidebar > ul").addClass("list-group lista-paragrafi").changeElementType('div');

    /*$(".site-content .Prose form").addClass("Form Form--spaced u-padding-all-xl u-background-grey-10 u-text-r-xs u-layout-prose");
    $(".site-content .Prose form label")
            .addClass("Form-label").parent().addClass("Form-field");
    $('.site-content .Prose form input:not([type="button"]):not([type="submit"])').addClass("Form-input");
    $(".site-content .Prose form textarea").addClass("Form-input Form-textarea");
    $('.site-content .Prose form input[type="button"], .site-content form input[type="submit"]')
            .addClass("Button Button--default u-text-xs")
            .parent().addClass("Form-field Grid-cell u-textRight");
    $('.site-content .Prose form input[type="checkbox"], .site-content .Prose form input[type="radio"]')
            .addClass("Form-input").after('<span class="Form-fieldIcon" role="presentation"></span>')
            .parent().addClass("Form-label--block").parent().addClass("Form-field--choose");*/
    
    /* Sistemo la mappa in home */
    mapWrap();

    $(".map-wrap").click(function () {
        $(this).fadeOut(10);
    });
    /* Fine sistemazione mappa */
    
    $('.image-content a').filter(function() {
            return $(this).attr('href').match(/\.(jpeg|jpg|png|gif)/i);
        }).magnificPopup({
        type: 'image'
    });

    $('.magnific-popup-gallery').filter(function() {
            return $(this).attr('href').match(/\.(jpeg|jpg|png|gif)/i);
        }).magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
        }
    });
    
    /* Aggiungo l'icona di Link Esterno */
    $('a').each(function () {
        if (!(location.hostname === this.hostname || !this.hostname.length ||
                !$.trim($(this).html()).length || $(this).is(':has(figure)') ||
                $(this).closest("#mainheader").length || $(this).closest(".social").length)) {
            let ext = '<svg class="icon icon-link icon-external-link"><use xlink:href="'+theme_uri+'/static/img/bootstrap-italia.svg#it-external-link"></use></svg>';
            $(this).append(ext);
        }
    });
    
    $(".box-servizi .scheda-sito").each(function () {
        if ( $(this).size() && $("img", this).size() ) {
            if( $(this).html().replace(/<img[^>]*>/g,"")==0 ) $(this).addClass("no-padding");
        }
        
        if( $(this).parent().find('.icon-external-link').length ) {
            var link = $(this).parent().find('.icon-external-link');
        $(this).append(link);
        }
    });
   
    /* Slide Gallerie Home */
    $(".owl-carousel").owlCarousel({
        loop: true,
        margin: 10,
        navContainer: ".owl-nav",
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            }
        }
    });

    /* NUOVI */
    $('.footer-colonne ul').addClass('footer-list clearfix');
    
    $('.custom_megamenu_intestazione').each(function() {
        $(this).wrap("<h5></h5>");
    });
    
});

$(window).resize(function() {
    mapWrap();
});

function mapWrap() {
    var altMap = parseInt($(".map-full-content iframe").outerHeight(), 10);
    $(".map-wrap").css("height",altMap+"px").css("margin-bottom",-altMap+"px");
    return;
}
