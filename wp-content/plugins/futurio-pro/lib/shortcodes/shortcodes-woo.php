<?php
/*
  |----------------------------------------------------------
  | WooCommerce custom products carousel
  |----------------------------------------------------------
 */
add_shortcode( 'futurio-products-carousel', 'futurio_pro_custom_products_carousel_shortcode' );

function futurio_pro_custom_products_carousel_shortcode( $atts, $content = null ) {
	wp_enqueue_script( 'slick', FUTURIO_PRO_PLUGIN_DIR . 'js/slick.min.js', array( 'jquery' ), FUTURIO_PRO_CURRENT_VERSION, true );
	wp_enqueue_style( 'slick-stylesheet', FUTURIO_PRO_PLUGIN_DIR . 'css/slick.css', array(), FUTURIO_PRO_CURRENT_VERSION );
	STATIC $i = 1;
	extract( shortcode_atts( array(
		'ids'			 => '',
		//'order'			 => 'ASC', // ASC* / DESC
		'orderby'		 => 'date', // date* / title / ID / rand / none
		'columns'		 => '4',
		'limit'			 => '8',
		'type'			 => '', // best_selling / on_sale / featured
		'slider_pause'	 => '9',
		'autoplay'		 => true,
		'hover_pause'	 => true,
		'arrows'		 => true,
		'dots'			 => false,
	), $atts, 'futurio-products-carousel' ) );

	$ids = explode( ',', $ids );
	if ( empty( $ids ) ) {
		return;
	}
	// setup query
	$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
	if ( $type == 'best_selling' ) {
		$post_args = array(
			'posts_per_page'		 => $limit,
			'meta_key'				 => 'total_sales',
			'orderby'				 => 'meta_value_num',
			'post_type'				 => 'product',
			'orderby'				 => $orderby,
			'ignore_sticky_posts'	 => 1,
			'paged'					 => $paged,
		);
	} elseif ( $type == 'featured' ) {
		$post_args = array(
			'posts_per_page'		 => $limit,
			'post_type'				 => 'product',
			'orderby'				 => $orderby,
			'ignore_sticky_posts'	 => 1,
			'paged'					 => $paged,
			'tax_query'				 => array(
				array(
					'taxonomy'	 => 'product_visibility',
					'field'		 => 'name',
					'terms'		 => 'featured',
				),
			),
		);
	} elseif ( $type == 'on_sale' ) {
		$post_args = array(
			'posts_per_page' => $limit,
			'post_type'		 => 'product',
			'orderby'		 => $orderby,
			'meta_query'	 => array(
				'relation' => 'OR',
				array( // Simple products type
					'key'		 => '_sale_price',
					'value'		 => 0,
					'compare'	 => '>',
					'type'		 => 'numeric'
				),
				array( // Variable products type
					'key'		 => '_min_variation_sale_price',
					'value'		 => 0,
					'compare'	 => '>',
					'type'		 => 'numeric'
				)
			)
		);
	} else {
		$post_args = array(
			'posts_per_page'		 => $limit,
			'post_type'				 => 'product',
			'orderby'				 => $orderby,
			'ignore_sticky_posts'	 => 1,
			'paged'					 => $paged,
		);
	}
	// query database
	$post = new WP_Query( $post_args );
	ob_start();
	?>
	<div id="futurio-shortcode-carousel-<?php echo absint( $i ); ?>" class="futurio-woo-products-shortcode woocommerce" >
		<?php if ( $post->have_posts() ) : ?>
			<ul class="services-center products" data-id="futurio-shortcode-carousel-<?php echo absint( $i ); ?>" data-sliderauto="<?php echo esc_attr( $autoplay ); ?>" data-sliderpause="<?php echo esc_attr( $slider_pause ); ?>" data-sliderautohover="<?php echo esc_attr( $hover_pause ); ?>" data-slidercontrols="<?php echo esc_attr( $arrows ); ?>" data-sliderpager="<?php echo esc_attr( $dots ); ?>" data-slideritems="<?php echo esc_attr( $columns ); ?>">
				<?php while ( $post->have_posts() ) : ?>
					<?php $post->the_post(); ?>
					<div class="woo-product futurio-carousel-item">
						<?php wc_get_template_part( 'content', 'product' ); ?>
					</div><!-- .news-item -->
				<?php endwhile; ?>
			</ul><!-- .row -->
		<?php endif; ?>
	</div>				
	<?php
	wp_reset_postdata();
	$i++;
	
	return ob_get_clean();
}
