$(document).ready(function () {
    $("#topcontrol").click(function () {
        $('body,html').animate({scrollTop: 0}, 500);
    });
    
    $("#searchclear").click(function(){
        $("#cerca-txt").val('');
    });
});


$(window).on("scroll touchmove", function () {
    $('#mainheader').toggleClass('ridotto', $(document).scrollTop() > 40);
    $('body').toggleClass('ridotto', $(document).scrollTop() > 40);
    $('#topcontrol').toggleClass('visualizza', $(document).scrollTop() > 300);
});


(
        /*!
         * jPushMenu.js
         * 1.1.1
         */
        function ($) {
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
                    }
                    else if ($(this).is('.' + o.showRightClass)) {
                        target = '.cbp-spmenu-right';
                        push_direction = 'toleft';
                    }
                    else if ($(this).is('.' + o.showTopClass)) {
                        target = '.cbp-spmenu-top';
                    }
                    else if ($(this).is('.' + o.showBottomClass)) {
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
                        jPushMenu.close(o);
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

            /*!
             * Menu navigazione */

            $(function () {
                $('.navmenu ul').each(function () {
                    var listItem = $(this).closest('li');
                    var itemLink = listItem.find('> a');
                    var title = 'Espandi il menu ' + $.trim(itemLink.text());
                    var trigger = $('<span></span>').attr({
                        tabindex: 0,
                        'aria-label': title,
                        'title': title,
                    });

                    $(listItem).find('[href^=' * ']')
                            .add(trigger)
                            .on('click', function (ev) {
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

                /* Get current element and set their ancestors as active */
                /*
                 $('.navmenu a[href=\'' + window.location.pathname + '\'], ' +
                 '.navmenu a[href=\'' + window.location.pathname.slice(0, -1) + '\']')
                 .addClass('current');
                 */
                $('.navmenu .current').parents().filter(function (index) {
                    return (this.nodeName === 'LI');
                }).addClass('active open');

            });

        })(jQuery);

/********** CALLBACKS JS **********/


/* jPush Menu */

jQuery(document).ready(function ($) {
    $('.navbar-toggle').jPushMenu();
    $(".navbar-toggle").click(function (event) {
        event.preventDefault();
    });
});

/* End jPush Menu */




$('.megamenu .dropdown-menu').click(function(e) {
    e.stopPropagation();
});