(function($) {
	var WidgetfuturioSearchHandler = function($scope, $) {

		var $search = $scope;

		function futurioAjaxSearch(e) {

			var $ajaxurl 		= $search.find('.futurio-search-wrap').data('ajaxurl'),
				$searchResults 	= $search.find('.futurio-search-results'),
				$loadingSpinner = $search.find('.futurio-search-wrap .futurio-ajax-loading');

			$.ajax({
				type: 'post',
				url	: $ajaxurl,
				data: {
				    action: 'futurio_ajax_search',
				    search: e
			    },
				beforeSend: function() {
					$searchResults.slideUp(200);
					setTimeout(function() {
						$loadingSpinner.fadeIn(50);
					}, 150);
				},
				success: function(result) {
					if(result === 0 || result == '0') {
						result = '';
					} else {
						$searchResults.html(result);
					}
				},
				complete: function() {
					$loadingSpinner.fadeOut(200);
					setTimeout(function() {
						$searchResults.slideDown(400).addClass('filled');
					}, 200);
				}
			});

		}

	    $search.find('.futurio-ajax-search input.field').on('keyup', function() {

			var $searchValue 		= $(this).val(),
				$lastSearchValue 	= '',
				$searchTimer 		= null;

			clearTimeout($searchTimer);

			if($lastSearchValue != $.trim($searchValue) && $searchValue.length >= 3) {
				$searchTimer = setTimeout(function() {
					futurioAjaxSearch($searchValue);
				}, 400);
			}

		});

		$(document).on('click', function() {
			$('.futurio-search-results.filled').slideUp(200);
		}).on('click', '.futurio-ajax-search, .futurio-search-results', function(e) {
		    e.stopPropagation();
		}).on('click', '.futurio-ajax-search', function() {
		    $(this).parent().find('.futurio-search-results.filled').slideDown(400);
		});

	};
	
	// Make sure we run this code under Elementor
	$(window).on('elementor/frontend/init', function() {
		elementorFrontend.hooks.addAction('frontend/element_ready/futurio-search.default', WidgetfuturioSearchHandler);
	});
})(jQuery);