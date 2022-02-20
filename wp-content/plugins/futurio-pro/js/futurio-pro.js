// float cart
jQuery(document).ready(function ($) {
    var $myDiv = $('.woo-float-info');
    if ($myDiv.length) {
        $(window).scroll(function () {
            var distanceTop = $('.woocommerce div.product form.cart').offset().top - 60;

            if ($(window).scrollTop() > distanceTop)
                $myDiv.animate({'bottom': '0'}, 200);
            else
                $myDiv.stop(true).animate({'bottom': '-400px'}, 100);
        });

        $('.woo-float-info .close-me').bind('click', function () {
            $(this).parent().remove();
        });
    }
    ;
});

// sticky sidebar
jQuery(document).ready(function ($) {

    if ($('.sidebar-sticky #sidebar').length > 0) {
        var $sticky = $('#sidebar');
        $sticky.hcSticky({
            stickTo: '.page-area',
            top: 90,
            bottomEnd: 25,
            responsive: {
                991: {
                    disable: true
                }
            }
        });
    }

    if ($('#elementor-sticky-sidebar').length > 0) {
        var $sticky = $('#elementor-sticky-sidebar');
        $sticky.hcSticky({
            stickTo: '.elementor-widget-wrap section',
            top: 90,
            bottomEnd: 25,
            responsive: {
                991: {
                    disable: true
                }
            }
        });
    }
});

// return to top button
jQuery(document).ready(function ($) {

    // ===== Scroll to Top ==== 
    $(window).scroll(function () {
        if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
            $('#return-to-top').fadeIn(200);    // Fade in the arrow
        } else {
            $('#return-to-top').fadeOut(200);   // Else fade out the arrow
        }
    });
    $('#return-to-top').click(function () {      // When arrow is clicked
        $('body,html').animate({
            scrollTop: 0                       // Scroll to top of body
        }, 500);
    });
});

// open middle cart
jQuery(document).ready(function ($) {

    $(document).on('click', '.button.ajax_add_to_cart', function (e) {
        //e.preventDefault();
        $('body.open-middle-cart').addClass('product-added-to-cart-middle');
    });
    $(document).on('click', '.product-added-to-cart-middle #middle-cart-overlay', function (e) {
        e.preventDefault();
        $('body.open-middle-cart').removeClass('product-added-to-cart-middle');
    });
    $(document).on('click', '.product-added-to-cart-middle #middle-cart-close', function (e) {
        e.preventDefault();
        $('body.open-middle-cart').removeClass('product-added-to-cart-middle');
    });
});

// single product ajax add to cart
jQuery(document).ready(function ($) {
    if ($('body.single-ajax-add-to-cart').length > 0) {
        // Ajax add to cart on the product page
        if (typeof wc_cart_fragments_params === 'undefined') {
            return false;
        }
        var $warp_fragment_refresh = {
            url: wc_cart_fragments_params.wc_ajax_url.toString().replace('%%endpoint%%', 'get_refreshed_fragments'),
            type: 'POST',
            success: function (data) {
                if (data && data.fragments) {

                    $.each(data.fragments, function (key, value) {
                        $(key).replaceWith(value);
                    });

                    $(document.body).trigger('wc_fragments_refreshed');
                }
            }
        };



        $('.entry-summary form.cart').on('submit', function (e)
        {
            e.preventDefault();

            $('body.open-middle-cart').addClass('product-added-to-cart-middle'); // open middle cart
            $('body.open-head-cart').addClass('product-added-to-cart').delay(3000).fadeIn(2200);  // open header cart

            $('.entry-summary').block({
                message: null,
                overlayCSS: {
                    cursor: 'none'
                }
            });

            var product_url = window.location,
                    form = $(this);

            $.post(product_url, form.serialize() + '&_wp_http_referer=' + product_url, function (result)
            {
                var cart_dropdown = $('.cart-contents span.count', result),
                        woocommerce_message = $('.woocommerce-message', result);

                // update dropdown cart
                $('.cart-contents span.count').replaceWith(cart_dropdown);

                // Show message
                $('.type-product').eq(0).before(woocommerce_message);

                // update fragments
                $.ajax($warp_fragment_refresh);

                $('.entry-summary').unblock();

            });
        });
    }
});

// sticky sidebar
jQuery(document).ready(function ($) {
    $('.services-center').each(function (index, element) {
        var $myDiv = $(this);
        if ($myDiv.length) {
            // RTL
            if ($('body.rtl').length !== 0) {
                var id = $(this).data('id');
                var slider = $('#' + id + ' .services-center');
                var sliderauto = slider.data('sliderauto');
                var sliderpause = slider.data('sliderpause');
                var sliderautohover = slider.data('sliderautohover');
                var slidercontrols = slider.data('slidercontrols');
                var sliderpager = slider.data('sliderpager');
                var slideritems = slider.data('slideritems');
                var sliderpageresp = 2;

                sliderpause = typeof sliderpause === 'undefined' ? 9000 : (1000 * sliderpause);
                sliderauto = sliderauto == 1 ? true : false;
                sliderautohover = sliderautohover == 1 ? true : false;
                slidercontrols = slidercontrols == 1 ? true : false;
                sliderpager = sliderpager == 1 ? true : false;
                sliderpageresp = slideritems == 1 ? 1 : 2;
                $(slider).not('.slick-initialized').slick({
                    infinite: true,
                    autoplay: sliderauto,
                    speed: 300,
                    rtl: true,
                    autoplaySpeed: sliderpause,
                    dots: sliderpager,
                    pauseOnHover: sliderautohover,
                    arrows: slidercontrols,
                    slidesToShow: slideritems,
                    slidesToScroll: 1,
                    responsive: [
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: sliderpageresp,
                            }
                        },
                        {
                            breakpoint: 539,
                            settings: {
                                slidesToShow: 1,
                            }
                        }
                    ]
                });
            } else {
                var id = $(this).data('id');
                var slider = $('#' + id + ' .services-center');
                var sliderauto = slider.data('sliderauto');
                var sliderpause = slider.data('sliderpause');
                var sliderautohover = slider.data('sliderautohover');
                var slidercontrols = slider.data('slidercontrols');
                var sliderpager = slider.data('sliderpager');
                var slideritems = slider.data('slideritems');
                var sliderpageresp = 2;

                sliderpause = typeof sliderpause === 'undefined' ? 9000 : (1000 * sliderpause);
                sliderauto = sliderauto == 1 ? true : false;
                sliderautohover = sliderautohover == 1 ? true : false;
                slidercontrols = slidercontrols == 1 ? true : false;
                sliderpager = sliderpager == 1 ? true : false;
                sliderpageresp = slideritems == 1 ? 1 : 2;
                $(slider).not('.slick-initialized').slick({
                    infinite: true,
                    autoplay: sliderauto,
                    speed: 300,
                    autoplaySpeed: sliderpause,
                    dots: sliderpager,
                    pauseOnHover: sliderautohover,
                    arrows: slidercontrols,
                    slidesToShow: slideritems,
                    slidesToScroll: 1,
                    responsive: [
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: sliderpageresp,
                            }
                        },
                        {
                            breakpoint: 539,
                            settings: {
                                slidesToShow: 1,
                            }
                        }
                    ]
                });
            }

        }
    });
});

jQuery(document).ready(function ($) {
    /*  Tabs widget
     /* ------------------------------------ */
    (function () {
        var $tabsNav = $('.pro-tabs-nav'),
                $tabsNavLis = $tabsNav.children('li'),
                $tabsContainer = $('.pro-tabs-container');

        $tabsNav.each(function () {
            var $this = $(this);
            $this.next().children('.pro-tab').stop(true, true).hide()
                    .siblings($this.find('a').attr('href')).show();
            $this.children('li').first().addClass('active').stop(true, true).show();
        });

        $tabsNavLis.on('click', function (e) {
            var $this = $(this);

            $this.siblings().removeClass('active').end()
                    .addClass('active');

            $this.parent().next().children('.pro-tab').stop(true, true).hide()
                    .siblings($this.find('a').attr('href')).fadeIn();
            e.preventDefault();
        }).children(window.location.hash ? 'a[href="' + window.location.hash + '"]' : 'a:first').trigger('click');

    })();
});