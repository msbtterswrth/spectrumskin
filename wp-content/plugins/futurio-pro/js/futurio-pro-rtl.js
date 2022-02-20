// Content slider
jQuery( document ).ready( function ( $ ) {
    var $myDiv = $( '.woo-float-info' );
    if ( $myDiv.length ) {
        $( window ).scroll( function () {
            var distanceTop = $( '.woocommerce-tabs' ).offset().top - 60;

            if ( $( window ).scrollTop() > distanceTop )
                $myDiv.animate( { 'bottom': '0' }, 200 );
            else
                $myDiv.stop( true ).animate( { 'bottom': '-400px' }, 100 );
        } );

        $( '.woo-float-info .close-me' ).bind( 'click', function () {
            $( this ).parent().remove();
        } );
    }
    ;
} );