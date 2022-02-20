<?php
/**
 * Helpers functions
 *
 */

// No direct access, please
if(! defined('ABSPATH')) exit;


/**
 * Ajax search
 *
 * @since	1.0.7
 */
if(! function_exists('futurio_ajax_search')) {

	function futurio_ajax_search() {

		$search 	= sanitize_text_field($_POST[ 'search' ]);
        $post_type  = 'any';
        $args  		= array(
            's'                => $search,
            'post_type'        => $post_type,
            'post_status'      => 'publish',
            'posts_per_page'   => 5,
       );
		$query 		= new WP_Query($args);
		$output 	= '';

		// Icons
		if(is_RTL()) {
			$icon = 'left';
		} else {
			$icon = 'right';
		}

		if($query->have_posts()) {

			$output .= '<ul>';
			
				while($query->have_posts()) : $query->the_post();
					$output .= '<li>';
						$output .= '<a href="'. get_permalink() .'" class="search-result-link clr">';

							if(has_post_thumbnail()) {
								$output .= get_the_post_thumbnail(get_the_ID(), 'thumbnail', array('alt' => get_the_title(), 'itemprop' => 'image',));
							}

							$output .= '<div class="result-title">' . get_the_title() . '</div>';
							$output .= '<i class="icon fa fa-arrow-'. $icon .'" aria-hidden="true"></i>';
						$output .= '</a>';
					$output .= '</li>';
				endwhile;

				if($query->found_posts > 1) {
	            	$search_link = get_search_link($search);
	            	
	            	/*if(strpos($search_link, '?') !== false) {
	            		$search_link .= '?post_type='. $post_type;
	            	}*/

	                $output .= '<li><a href="' . $search_link . '" class="all-results"><span>' . sprintf(esc_html__('View all %d results', 'futurio-pro'), $query->found_posts) . '<i class="fa fa-long-arrow-'. $icon .'" aria-hidden="true"></i></span></a></li>';
	            }

            $output .= '</ul>';
		
		} else {
			
			$output .= '<div class="futurio-no-search-results">';
            $output .= '<h6>' . esc_html__('No results', 'futurio-pro') . '</h6>';
            $output .= '<p>' . esc_html__('No search results could be found, please try another search.', 'futurio-pro') . '</p>';
            $output .= '</div>';
			
		}
		
		wp_reset_query();

		echo $output;
		
		die();

    }

    add_action('wp_ajax_futurio_ajax_search', 'futurio_ajax_search');
    add_action('wp_ajax_nopriv_futurio_ajax_search', 'futurio_ajax_search');

}

/**
 * Get available sidebars
 *
 */
if(! function_exists('futurio_get_available_sidebars')) {

	function futurio_get_available_sidebars() {
		global $wp_registered_sidebars;

	    $sidebars = array();

	    if(! $wp_registered_sidebars) {
	        $sidebars['0'] = __('No sidebars were found', 'futurio-pro');
	    } else {
	        $sidebars['0'] = __('-- Select --', 'futurio-pro');

	        foreach($wp_registered_sidebars as $id => $sidebar) {
	            $sidebars[ $id ] = $sidebar['name'];
	        }
	    }

	    return $sidebars;
	}
}

/**
 * Get available templates
 *
 */
if(! function_exists('futurio_get_available_templates')) {

	function futurio_get_available_templates() {
		$templates = get_posts(array(
            'post_type'         => 'elementor_library',
            'posts_per_page'    => -1
       ));

		$result = array(__('-- Select --', 'futurio-pro'));
		
        if(! empty($templates) && ! is_wp_error($templates)) {
            foreach($templates as $item) {
                $result[ $item->ID ] = $item->post_title;
            }
        }

		return $result;
	}

}