jQuery(function ($) {
    var canBeLoaded = true, // this param allows to initiate the AJAX call only if necessary
            bottomOffset = 2000; // the distance (in px) from the page bottom when you want to load more posts

    $(window).scroll(function () {
        var data = {
            'action': 'loadmore',
            'query': futurio_loadmore_params.posts,
            'page': futurio_loadmore_params.current_page
        };
        if ($(document).scrollTop() > ($(document).height() - bottomOffset) && canBeLoaded == true) {
            $.ajax({
                url: futurio_loadmore_params.ajaxurl,
                data: data,
                type: 'POST',
                beforeSend: function (xhr) {
                    // you can also add your own preloader here
                    // you see, the AJAX call is in process, we shouldn't run it again until complete
                    canBeLoaded = false;
                },
                success: function (data) {
                    if (data) {
                        $('.page-area').find('article:last-of-type').after(data); // where to insert posts
                        canBeLoaded = true; // the ajax is completed, now we can run it again
                        futurio_loadmore_params.current_page++;
                    }
                }
            });
        }
    });
});
