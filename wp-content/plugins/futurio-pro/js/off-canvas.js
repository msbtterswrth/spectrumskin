(function($) {
    var WidgetwewOffCanvassHandler = function($scope, $) {

        var $btn = $scope.find('.futurio-off-canvas-button a');

        // Move the off canvas sidebar to the footer
        $('.futurio-off-canvas-wrap').appendTo('body');

        $($btn).on('click', function(e) {
            e.preventDefault();
            var $target = $(this).attr('href');

            // Open the off canvas sidebar
            $($target).toggleClass('show');
        });

        $('.futurio-off-canvas-close, .futurio-off-canvas-overlay').on('click', function() {
            $(this).closest('.futurio-off-canvas-wrap').removeClass('show');
        });

    };
    
    // Make sure we run this code under Elementor
    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/futurio-off-canvas.default', WidgetwewOffCanvassHandler);
    });
})(jQuery);