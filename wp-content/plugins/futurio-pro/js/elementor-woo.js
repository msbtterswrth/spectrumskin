// sticky sidebar
(function ($) {

    var WidgetProductsSlidersHandler = function ($scope, $) {
 
      $( '.elementor-widget-futurio-woocommerce-carousel' ).each( function ( index, element ) {
        var $myDiv = $( '.elementor-widget-futurio-woocommerce-carousel' );
        if ( $myDiv.length ) {
            // RTL
            if ( $( 'body.rtl' ).length !== 0 ) {
                var id = $( this ).data( 'id' );
                var slider = $( '.elementor-element-' + id + ' .elm-woo-products' );
                var sliderauto = slider.data( 'sliderauto' );
                var sliderpause = slider.data( 'sliderpause' );
                var sliderautohover = slider.data( 'sliderautohover' );
                var slidercontrols = slider.data( 'slidercontrols' );
                var sliderpager = slider.data( 'sliderpager' );
                var slideritems = slider.data( 'slideritems' );
                var sliderpageresp = 2;

                sliderpause = typeof sliderpause === 'undefined' ? 9000 : ( 1000 * sliderpause );
                sliderauto = sliderauto == true ? true : false;
                sliderautohover = sliderautohover == true ? true : false;
                slidercontrols = slidercontrols == true ? true : false;
                sliderpager = sliderpager == true ? true : false;
                sliderpageresp = slideritems == 1 ? 1 : 2;
                $( slider ).not('.slick-initialized').slick( {
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
                } );
            } else {
                var id = $( this ).data( 'id' );
                var slider = $( '.elementor-element-' + id + ' .elm-woo-products' );
                var sliderauto = slider.data( 'sliderauto' );
                var sliderpause = slider.data( 'sliderpause' );
                var sliderautohover = slider.data( 'sliderautohover' );
                var slidercontrols = slider.data( 'slidercontrols' );
                var sliderpager = slider.data( 'sliderpager' );
                var slideritems = slider.data( 'slideritems' );
                var sliderpageresp = 2;

                sliderpause = typeof sliderpause === 'undefined' ? 9000 : ( 1000 * sliderpause );
                sliderauto = sliderauto == true ? true : false;
                sliderautohover = sliderautohover == true ? true : false;
                slidercontrols = slidercontrols == true ? true : false;
                sliderpager = sliderpager == true ? true : false;
                sliderpageresp = slideritems == 1 ? 1 : 2;
                $( slider ).not('.slick-initialized').slick( {
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
                } );
            }

          }
      } );
    } 


    // Make sure you run this code under Elementor..
    $(window).on('elementor/frontend/init', function () {

        elementorFrontend.hooks.addAction('frontend/element_ready/futurio-woocommerce-carousel.default', WidgetProductsSlidersHandler);

    });

})(jQuery);
