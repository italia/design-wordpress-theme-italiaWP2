jQuery(function ($) {
    $(document).ready(function () {

        var theme_uri = itwp2.siteurl;

        $(".box-servizi a").addClass("u-color-white");
        $(".form-submit > input").addClass("btn btn-default");

        /* Metto la data dei post nel titolo (nella sidebar) */
        $(".italiawp2-sidebar > ul > li").each(function () {
            if ($('> span', this).length === 1 && $('> a', this).length === 1) {
                let span = $(this).find('span');
                let a = $(this).find('a');
                span.html("<br><small>" + span.html() + "</small>");
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

        /* Sistemo la mappa in home */
        mapWrap();

        $(".map-wrap").click(function () {
            $(this).fadeOut(10);
        });
        /* Fine sistemazione mappa */

        $('.image-content a').filter(function () {
            return $(this).attr('href').match(/\.(jpeg|jpg|png|gif)/i);
        }).magnificPopup({
            type: 'image'
        });

        $('.magnific-popup-gallery').filter(function () {
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
                let ext = '<svg class="icon icon-link icon-external-link"><use xlink:href="' + theme_uri + '/static/img/bootstrap-italia.svg#it-external-link"></use></svg>';
                $(this).append(ext);
            }
        });

        $(".box-servizi .scheda-sito").each(function () {
            if ($(this).size() && $("img", this).size()) {
                if ($(this).html().replace(/<img[^>]*>/g, "") == 0) $(this).addClass("no-padding");
            }

            if ($(this).parent().find('.icon-external-link').length) {
                let link = $(this).parent().find('.icon-external-link');
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

        $('.custom_megamenu_intestazione').each(function () {
            $(this).wrap("<h5></h5>");
        });

        /* Fix Menu Principale, sottomenu sulla destra */
        fixMainMenu();
        
        /* Fix Menu Lingue Polylang e WPML */
        fixLangMenu("pll-parent-menu-item");
        fixLangMenu("menu-item-language");
    });

    $(window).resize(function () {
        mapWrap();
        fixMainMenu();
    });

    function mapWrap() {
        let altMap = parseInt($(".map-full-content iframe").outerHeight(), 10);
        $(".map-wrap").css("height", altMap + "px").css("margin-bottom", -altMap + "px");
        return;
    }

    function fixMainMenu() {
        if ($('#mainheader .entesup a').has('img')) $('#mainheader .entesup a').addClass('image');

        let numLi = $('#menu-principale > li').length;
        let largWi = (parseInt($(window).innerWidth(), 10) / 2) - 25;

        $('#menu-principale > li').each(function (i) {
            $(this).find("ul.dropdown-menu").removeClass("drodownmenu-on-right");
            
            let posiLi = $(this).position().left;
            let ul = $($(this).find("ul")[0]);
            
            if(ul.children().length < 4) {
                if (((i + 1) > (numLi / 2)) && (posiLi > largWi)) {
                    $(this).find("ul.dropdown-menu").addClass("drodownmenu-on-right");
                }
            }else{
                $(this).addClass('megamenu');
            }
            
        });
        return;
    }
    
    function fixLangMenu(pluginClass) {
        if ($("."+pluginClass)[0]){
            let numElement = 7;
            let langMenu = $("#menu-principale ."+pluginClass+" > ul");
            let langMenuLi = $('<li class="langMenuLi menu-item menu-item-has-children dropdown nav-item"></li>');

            $("#menu-principale ."+pluginClass+" > ul li:not(.langMenuLi)").each(function (i) {
                if( (i==0) || ( inseriti == numElement ) ) {
                    inseriti = 0;
                    delete nuovoLi;
                    nuovoLi = langMenuLi.clone();
                    nuovoLi.append("<ul></ul>");
                    langMenu.append(nuovoLi);
                }
                langMenuLiElem = $(this).find("h5 > a");

                thisElem = $('<li class="menu-item nav-item"></li>'); 
                thisElem.append(langMenuLiElem);
                nuovoLi.find("ul").append(thisElem);
                delete thisElem;
                
                inseriti++;
                $(this).remove();
            });
            delete numElement, langMenu, langMenuLi;
        }
        return;
    }
});
