<?php

function futurio_my_load_more_scripts() {

    global $wp_query;

    $script = 'loadmore';
    if (get_theme_mod('infinite_scroll', 'off') == 'infinite_loadmore') {
        $script = 'infinite_loadmore';
    }
    if (is_singular() || ( function_exists('is_shop') && is_shop() )) {
        return;
    }
    // register our main script but do not enqueue it yet
    wp_register_script('my_loadmore', plugin_dir_url(dirname(__FILE__)) . 'js/' . esc_html($script) . '.js', array('jquery'));

    // now the most interesting part
    // we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
    // you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
    wp_localize_script('my_loadmore', 'futurio_loadmore_params', array(
        'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
        'posts' => json_encode($wp_query->query_vars), // everything about your loop is here
        'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
        'max_page' => $wp_query->max_num_pages
    ));

    wp_enqueue_script('my_loadmore');
}

add_action('wp_enqueue_scripts', 'futurio_my_load_more_scripts');

function futurio_loadmore_ajax_handler() {

    // prepare our arguments for the query
    $args = json_decode(stripslashes($_POST['query']), true);
    $args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
    $args['post_status'] = 'publish';

    // it is always better to use WP_Query but not here
    query_posts($args);

    if (have_posts()) :

        // run the loop
        while (have_posts()): the_post();

            // look into your theme code how the posts are inserted, but you can use your own HTML of course
            // do you remember? - my example is adapted for Twenty Seventeen theme
            get_template_part('content', get_post_format());
        // for the test purposes comment the line above and uncomment the below one
        // the_title();


        endwhile;

    endif;
    die; // here we exit the script and even no wp_reset_query() required!
}

add_action('wp_ajax_loadmore', 'futurio_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'futurio_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}

/**
 * Load more
 */
function futurio_pro_infinite_scroll_button() {
    if (get_theme_mod('infinite_scroll', 'off') == 'loadmore') {
        global $wp_query; // you can remove this line if everything works for you
        // don't display the button if there are not enough posts
        if ($wp_query->max_num_pages > 1)
            echo '<div class="futurio_loadmore">' . esc_attr__('Load more', 'futurio-pro') . '</div>'; // you can use <a> as well
    }
}

function futurio_pro_extra_action_infinite() {
    add_action('futurio_after_index_pagination', 'futurio_pro_infinite_scroll_button');
    add_action('futurio_after_archive_pagination', 'futurio_pro_infinite_scroll_button');
}

add_action('after_setup_theme', 'futurio_pro_extra_action_infinite', 0);
