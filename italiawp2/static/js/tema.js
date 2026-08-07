jQuery(function ($) {

    $.fn.jPushMenu = function (customOptions) {
        var o = $.extend({}, $.fn.jPushMenu.defaultOptions, customOptions);

        $('body').addClass(o.pushBodyClass);

        // Add class to toggler
        $(this).addClass('jPushMenuBtn');

        $(this).click(function (e) {
            e.stopPropagation();

            var target = '',
                    push_direction = '';

            // Determine menu and push direction
            if ($(this).is('.' + o.showLeftClass)) {
                target = '.cbp-spmenu-left';
                push_direction = 'toright';
            } else if ($(this).is('.' + o.showRightClass)) {
                target = '.cbp-spmenu-right';
                push_direction = 'toleft';
            } else if ($(this).is('.' + o.showTopClass)) {
                target = '.cbp-spmenu-top';
            } else if ($(this).is('.' + o.showBottomClass)) {
                target = '.cbp-spmenu-bottom';
            }

            if (target == '') {
                return;
            }

            $(this).toggleClass(o.activeClass);
            $(target).toggleClass(o.menuOpenClass);

            if ($(this).is('.' + o.pushBodyClass) && push_direction != '') {
                $('body').toggleClass(o.pushBodyClass + '-' + push_direction);
            }

            // Disable all other buttons
            $('.jPushMenuBtn').not($(this)).toggleClass('disabled');

            return;
        });

        var jPushMenu = {
            close: function (o) {
                $('.jPushMenuBtn,body,.cbp-spmenu')
                        .removeClass('disabled ' + o.activeClass + ' ' + o.menuOpenClass + ' ' + o.pushBodyClass + '-toleft ' + o.pushBodyClass + '-toright');
                $('.push_container').css('position', 'relative');
            }
        }

        // Close menu on clicking outside menu
        if (o.closeOnClickOutside) {
            $(document).click(function () {
                jPushMenu.close(o);
            });
        }

        // Close menu on clicking menu link
        if (o.closeOnClickLink) {
            $('.cbp-spmenu a').on('click', function () {
                if ($(this).hasClass('preventclick')) {
                    return;
                }

                // @modifica : === FIX MENU MOBILE LINK ===
                var node = $(this).is('a') ? $(this) : $(this).closest('a');

                /* Clear all open and not nested element  */
                if (!$(this).closest('li.open').length) {
                    $('.navmenu ul').slideUp(300);
                    $('.navmenu li').removeClass('open');
                }

                if (node.siblings('ul').is(':visible')) {
                    node.siblings('ul').slideUp(300);
                    node.parent().removeClass('open');
                } else {
                    node.siblings('ul').slideDown(300);
                    node.parent().addClass('open');
                }
                // @modifica : === FINE FIX MENU MOBILE LINK ===

                // @modifica fix voce menu con sottovoci figli che non si apre su mobile !
                // jPushMenu.close(o);
            });
        }

        // Close menu on clicking menu link
        if (o.closeOnFocus) {
            $('.logo_wrapper a').on('focus', function () {
                jPushMenu.close(o);
            });
        }

    };

    $.fn.jPushMenu.defaultOptions = {
        pushBodyClass: 'push-body',
        showLeftClass: 'menu-left',
        showRightClass: 'menu-right',
        showTopClass: 'menu-top',
        showBottomClass: 'menu-bottom',
        activeClass: 'menu-active',
        menuOpenClass: 'menu-open',
        closeOnClickOutside: false,
        closeOnClickLink: true,
        closeOnFocus: true
    };

    $(document).ready(function () {
        $("#topcontrol").click(function () {
            $('body,html').animate({scrollTop: 0}, 500);
        });

        /*
         * Allinea aria-expanded dei trigger di un <li> allo stato aperto/chiuso
         * del suo sottomenu. Il trigger e' lo <span role="button"> iniettato qui
         * sotto, piu' l'eventuale ancora segnaposto href="#".
         */
        function italiawp2AggiornaEspanso(listItem) {
            var espanso = listItem.hasClass('open') ? 'true' : 'false';
            listItem.find('> a [role="button"], > a[href^="#"]').attr('aria-expanded', espanso);
        }

        /* Menu navigazione */
        $('.navmenu ul').each(function () {
            var listItem = $(this).closest('li');
            var itemLink = listItem.find('> a');
            var etichetta = (typeof itwp2 !== 'undefined' && itwp2.espandiMenu)
                    ? itwp2.espandiMenu
                    : 'Espandi il menu';
            var title = etichetta + ' ' + $.trim(itemLink.text());
            var trigger = $('<span></span>').attr({
                tabindex: 0,
                role: 'button',
                'aria-expanded': 'false',
                'aria-label': title,
                'title': title,
            });

            $(listItem).find('[href^="#"]')
                    .add(trigger)
                    .attr('aria-expanded', 'false')
                    .on('click', function (ev) {
                        var node = $(this).is('a') ? $(this) : $(this).closest('a');

                        /* Clear all open and not nested element  */
                        if (!$(this).closest('li.open').length) {
                            $('.navmenu ul').slideUp(300);
                            $('.navmenu li.open').each(function () {
                                $(this).removeClass('open');
                                italiawp2AggiornaEspanso($(this));
                            });
                        }

                        if (node.siblings('ul').is(':visible')) {
                            node.siblings('ul').slideUp(300);
                            node.parent().removeClass('open');
                        } else {
                            node.siblings('ul').slideDown(300);
                            node.parent().addClass('open');
                        }
                        italiawp2AggiornaEspanso(node.parent());
                        return false;
                    })
                    .on('keydown', function (e) {
                        if (e.which === 13 || e.which === 32) {
                            $(this).click();
                            return false;
                        }
                    });

            itemLink.append(trigger);
        });

        $('.navmenu .current').parents().filter(function (index) {
            return (this.nodeName === 'LI');
        }).addClass('active open').each(function () {
            italiawp2AggiornaEspanso($(this));
        });

        /* jPush Menu */
        $('.navbar-toggle').jPushMenu();
        $(".navbar-toggle").click(function (event) {
            event.preventDefault();
            /*
             * jPushMenu ha gia' aggiornato le classi (il suo handler e' stato
             * registrato prima di questo): qui si allinea solo lo stato ARIA.
             */
            $(this).attr('aria-expanded', $(this).hasClass('menu-active') ? 'true' : 'false');
        });

        /*
         * Esc chiude il menu off-canvas e riporta il focus sul pulsante che
         * l'ha aperto: senza, chi naviga da tastiera resta intrappolato nel
         * pannello e deve tabulare fino in fondo per uscirne.
         */
        $(document).on('keydown', function (e) {
            if (e.which !== 27) {
                return;
            }
            var toggle = $('.navbar-toggle.menu-active').first();
            if (!toggle.length) {
                return;
            }
            toggle.trigger('click');
            toggle.trigger('focus');
        });
        /* End jPush Menu */

        $('.megamenu .dropdown-menu').click(function (e) {
            e.stopPropagation();
        });
        
    });

    $(window).on("scroll touchmove", function () {
        $('#mainheader').toggleClass('ridotto', $(document).scrollTop() > 40);
        $('body').toggleClass('ridotto', $(document).scrollTop() > 40);
        $('#topcontrol').toggleClass('visualizza', $(document).scrollTop() > 300);
    });

});