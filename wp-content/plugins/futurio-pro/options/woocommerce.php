<?php

add_action( 'woocommerce_after_add_to_cart_button', 'futurio_pro_ajax_cart', 5 );
 
function futurio_pro_ajax_cart() {
  global $product;
  echo '<input type="hidden" name="add-to-cart" value="' . esc_attr( $product->get_id() ) . '" >';
}

Kirki::add_panel( 'woo_section_main', array(
	'title'		 => esc_attr__( 'WooCommerce', 'futurio-pro' ),
	'priority'	 => 10,
) );
Kirki::add_section( 'woo_section', array(
	'title'		 => esc_attr__( 'General Settings', 'futurio-pro' ),
	'panel'		 => 'woo_section_main',
	'priority'	 => 1,
) );
Kirki::add_section( 'main_typography_woo_archive_section', array(
	'title'		 => esc_attr__( 'Archive/Shop', 'futurio-pro' ),
	'panel'		 => 'woo_section_main',
	'priority'	 => 2,
) );
Kirki::add_section( 'main_typography_woo_product_section', array(
	'title'		 => esc_attr__( 'Product Page', 'futurio-pro' ),
	'panel'		 => 'woo_section_main',
	'priority'	 => 3,
) );
Kirki::add_section( 'woo_global_buttons_section', array(
	'title'		 => esc_attr__( 'Buttons', 'futurio-pro' ),
	'panel'		 => 'woo_section_main',
	'priority'	 => 4,
) );
Kirki::add_section( 'woo_global_other_section', array(
	'title'		 => esc_attr__( 'Other', 'futurio-pro' ),
	'panel'		 => 'woo_section_main',
	'priority'	 => 5,
) );


/**
 * WooCommerce
 */
Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'toggle',
	'settings'	 => 'woo_ajax_single_add_to_cart',
	'label'		 => esc_attr__( 'Ajax add to cart on product page', 'futurio-pro' ),
	'section'	 => 'woo_section',
	'default'	 => 1,
	'priority'	 => 10,
) );
Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'toggle',
	'settings'	 => 'woo_open_header_cart',
	'label'		 => esc_attr__( 'Open header cart automatically', 'futurio-pro' ),
	'section'	 => 'woo_section',
	'default'	 => 1,
	'priority'	 => 10,
) );
Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'toggle',
	'settings'	 => 'woo_popup_cart',
	'label'		 => esc_attr__( 'Open popup cart', 'futurio-pro' ),
	'section'	 => 'woo_section',
	'default'	 => 0,
	'priority'	 => 10,
) );
/**
 * Woo archive styling
 */

Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'color',
	'settings'	 => 'woo_archive_product_bg',
	'label'		 => esc_attr__( 'Background', 'futurio-pro' ),
	'section'	 => 'main_typography_woo_archive_section',
	'default'	 => '',
	'choices'	 => array(
		'alpha' => true,
	),
	'transport'	 => 'auto',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.woocommerce ul.products li.product, .woocommerce-page ul.products li.product, li.product-category.product, .woocommerce ul.products li.product .woocommerce-loop-category__title',
			'property'	 => 'background',
		),
	),
) );
Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'color',
	'settings'	 => 'woo_archive_product_rating',
	'label'		 => esc_attr__( 'Rating stars', 'futurio-pro' ),
	'section'	 => 'main_typography_woo_archive_section',
	'default'	 => '',
	'transport'	 => 'auto',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.woocommerce .star-rating span',
			'property'	 => 'color',
		),
	),
) );
Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'color',
	'settings'	 => 'woo_archive_product_categories_color',
	'label'		 => esc_attr__( 'Categories', 'futurio-pro' ),
	'section'	 => 'main_typography_woo_archive_section',
	'default'	 => '',
	'transport'	 => 'auto',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.archive-product-categories a, .archive-product-categories a:hover',
			'property'	 => 'color',
		),
	),
) );

Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'multicolor',
	'settings'	 => 'woo_archive_product_buttons',
	'label'		 => esc_attr__( 'Buttons', 'futurio-pro' ),
	'section'	 => 'main_typography_woo_archive_section',
	'priority'	 => 10,
	'transport'	 => 'auto',
	'choices'	 => array(
		'link'		 => esc_attr__( 'Color', 'futurio-pro' ),
		'border'	 => esc_attr__( 'Border', 'futurio-pro' ),
		'background' => esc_attr__( 'Background', 'futurio-pro' ),
	),
	'default'	 => array(
		'link'		 => '',
		'border'	 => '',
		'background' => '',
	),
	'output'	 => array(
		array(
			'choice'	 => 'link',
			'element'	 => '.woocommerce ul.products li.product .button',
			'property'	 => 'color',
		),
		array(
			'choice'	 => 'border',
			'element'	 => '.woocommerce ul.products li.product .button',
			'property'	 => 'border-color',
		),
		array(
			'choice'	 => 'background',
			'element'	 => '.woocommerce ul.products li.product .button',
			'property'	 => 'background-color',
		),
	),
) );
Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'multicolor',
	'settings'	 => 'woo_archive_product_buttons_hover',
	'label'		 => esc_attr__( 'Buttons hover', 'futurio-pro' ),
	'section'	 => 'main_typography_woo_archive_section',
	'priority'	 => 10,
	'transport'	 => 'auto',
	'choices'	 => array(
		'link'		 => esc_attr__( 'Color', 'futurio-pro' ),
		'border'	 => esc_attr__( 'Border', 'futurio-pro' ),
		'background' => esc_attr__( 'Background', 'futurio-pro' ),
	),
	'default'	 => array(
		'link'		 => '',
		'border'	 => '',
		'background' => '',
	),
	'output'	 => array(
		array(
			'choice'	 => 'link',
			'element'	 => '.woocommerce ul.products li.product .button:hover',
			'property'	 => 'color',
		),
		array(
			'choice'	 => 'border',
			'element'	 => '.woocommerce ul.products li.product .button:hover',
			'property'	 => 'border-color',
		),
		array(
			'choice'	 => 'background',
			'element'	 => '.woocommerce ul.products li.product .button:hover',
			'property'	 => 'background-color',
		),
	),
) );
Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'multicolor',
	'settings'	 => 'woo_archive_product_sale',
	'label'		 => esc_attr__( 'Sale', 'futurio-pro' ),
	'section'	 => 'main_typography_woo_archive_section',
	'priority'	 => 10,
	'transport'	 => 'auto',
	'choices'	 => array(
		'link'		 => esc_attr__( 'Color', 'futurio-pro' ),
		'background' => esc_attr__( 'Background', 'futurio-pro' ),
	),
	'default'	 => array(
		'link'		 => '',
		'background' => '',
	),
	'output'	 => array(
		array(
			'choice'	 => 'link',
			'element'	 => '.woocommerce span.onsale, .single .woocommerce .related span.onsale',
			'property'	 => 'color',
		),
		array(
			'choice'	 => 'background',
			'element'	 => '.woocommerce span.onsale, .single .woocommerce .related span.onsale',
			'property'	 => 'background-color',
		),
	),
) );

Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'toggle',
	'settings'	 => 'woo_archive_product_img_flipper',
	'label'		 => esc_attr__( 'Image flipper', 'futurio-pro' ),
	'section'	 => 'main_typography_woo_archive_section',
	'default'	 => 1,
	'priority'	 => 10,
) );
Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'toggle',
	'settings'	 => 'woo_archive_product_gallery_images',
	'label'		 => esc_attr__( 'Gallery images', 'futurio-pro' ),
	'section'	 => 'main_typography_woo_archive_section',
	'default'	 => 1,
	'priority'	 => 10,
) );
Kirki::add_field( 'futurio_extra', array(
	'type'				 => 'slider',
	'settings'			 => 'woo_archive_product_gallery_images_number',
	'label'				 => esc_attr__( 'Number of gallery images', 'futurio-pro' ),
	'section'			 => 'main_typography_woo_archive_section',
	'default'			 => 3,
	'priority'			 => 10,
	'choices'			 => array(
		'min'	 => '1',
		'max'	 => '8',
		'step'	 => '1',
	),
	'active_callback'	 => array(
		array(
			'setting'	 => 'woo_archive_product_gallery_images',
			'operator'	 => '==',
			'value'		 => 1,
		),
	),
) );
Kirki::add_field( 'futurio_extra', array(
	'type'				 => 'slider',
	'settings'			 => 'woo_archive_product_gallery_images_size',
	'label'				 => esc_attr__( 'Size of gallery images', 'futurio-pro' ),
	'section'			 => 'main_typography_woo_archive_section',
	'default'			 => 45,
	'priority'			 => 10,
	'transport'			 => 'auto',
	'choices'			 => array(
		'min'	 => '20',
		'max'	 => '100',
		'step'	 => '1',
	),
	'output'			 => array(
		array(
			'element'	 => '.arhive-product-gallery-image',
			'property'	 => 'width',
			'units'		 => 'px',
		),
		array(
			'element'	 => '.arhive-product-gallery-image',
			'property'	 => 'height',
			'units'		 => 'px',
		),
	),
	'active_callback'	 => array(
		array(
			'setting'	 => 'woo_archive_product_gallery_images',
			'operator'	 => '==',
			'value'		 => 1,
		),
	),
) );
Kirki::add_field( 'futurio_extra', array(
	'type'				 => 'slider',
	'settings'			 => 'woo_archive_product_gallery_images_radius',
	'label'				 => esc_attr__( 'Gallery images border radius', 'futurio-pro' ),
	'section'			 => 'main_typography_woo_archive_section',
	'default'			 => 0,
	'priority'			 => 10,
	'transport'			 => 'auto',
	'choices'			 => array(
		'min'	 => '0',
		'max'	 => '100',
		'step'	 => '1',
	),
	'output'			 => array(
		array(
			'element'	 => '.woocommerce ul.products li.product .arhive-product-gallery-image a img',
			'property'	 => 'border-radius',
			'units'		 => 'px',
		),
	),
	'active_callback'	 => array(
		array(
			'setting'	 => 'woo_archive_product_gallery_images',
			'operator'	 => '==',
			'value'		 => 1,
		),
	),
) );
if ( defined('YITH_WCWL') || defined('YITH_WCQV') || defined('YITH_WOOCOMPARE') ) {
  Kirki::add_field( 'futurio_extra', array(
  	'type'		 => 'slider',
  	'settings'	 => 'woo_archive_product_yith_icons',
  	'label'		 => esc_attr__( 'Whislist/Compare/Quick View icons opacity', 'futurio-pro' ),
  	'section'	 => 'main_typography_woo_archive_section',
  	'default'	 => 0.2,
  	'transport'	 => 'auto',
  	'priority'	 => 10,
  	'choices'	 => array(
  		'min'	 => '0',
  		'max'	 => '1',
  		'step'	 => '0.1',
  	),
  	'output'	 => array(
  		array(
  			'element'	 => '.add-to-wishlist-custom a.add_to_wishlist, .woocommerce ul.products li.product a.button.yith-wcqv-button, .woocommerce ul.products li.product a.compare.button',
  			'property'	 => 'opacity',
  		),
  	),
  ) );
  Kirki::add_field( 'futurio_extra', array(
  	'type'		 => 'slider',
  	'settings'	 => 'woo_archive_product_yith_icons_radius',
  	'label'		 => esc_attr__( 'Whislist/Compare/Quick View icons border radius', 'futurio-pro' ),
  	'section'	 => 'main_typography_woo_archive_section',
  	'default'	 => 2,
  	'transport'	 => 'auto',
  	'priority'	 => 10,
  	'choices'	 => array(
  		'min'	 => '0',
  		'max'	 => '25',
  		'step'	 => '1',
  	),
  	'output'	 => array(
  		array(
  			'element'	 => '.add-to-wishlist-custom a.add_to_wishlist, .woocommerce ul.products li.product a.button.yith-wcqv-button, .woocommerce ul.products li.product a.compare.button',
  			'property'	 => 'border-radius',
        'units'		 => 'px',
  		),
  	),
  ) );
}

/**
 * Woo single styling
 */

Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'color',
	'settings'	 => 'woo_single_product_rating',
	'label'		 => esc_attr__( 'Rating stars', 'futurio-pro' ),
	'section'	 => 'main_typography_woo_product_section',
	'default'	 => '',
	'transport'	 => 'auto',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.woocommerce .summary .star-rating span',
			'property'	 => 'color',
		),
	),
) );
Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'toggle',
	'settings'	 => 'woo_float_info',
	'label'		 => esc_attr__( 'Floating product info', 'futurio-pro' ),
	'section'	 => 'main_typography_woo_product_section',
	'default'	 => 1,
	'priority'	 => 10,
) );

Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'multicolor',
	'settings'	 => 'woo_single_product_active_tabs',
	'label'		 => esc_attr__( 'Active tab', 'futurio-pro' ),
	'section'	 => 'main_typography_woo_product_section',
	'priority'	 => 10,
	'transport'	 => 'auto',
	'choices'	 => array(
		'link'		 => esc_attr__( 'Color', 'futurio-pro' ),
		'background' => esc_attr__( 'Background', 'futurio-pro' ),
	),
	'default'	 => array(
		'link'		 => '',
		'background' => '',
	),
	'output'	 => array(
		array(
			'choice'	 => 'link',
			'element'	 => '.woocommerce div.product .woocommerce-tabs ul.tabs.wc-tabs li.active a',
			'property'	 => 'color',
		),
		array(
			'choice'	 => 'link',
			'element'	 => '.woocommerce div.product .woocommerce-tabs ul.tabs.wc-tabs li.active a, .woocommerce div.product .woocommerce-tabs ul.tabs.wc-tabs li:hover a',
			'property'	 => 'border-bottom-color',
		),
		array(
			'choice'	 => 'background',
			'element'	 => '.woocommerce div.product .woocommerce-tabs ul.tabs.wc-tabs li.active a',
			'property'	 => 'background-color',
		),
	),
) );
Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'color',
	'settings'	 => 'woo_single_product_inactive_tabs',
	'label'		 => esc_attr__( 'Inactive tab color', 'futurio-pro' ),
	'section'	 => 'main_typography_woo_product_section',
	'default'	 => '',
	'transport'	 => 'auto',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.woocommerce div.product .woocommerce-tabs ul.tabs li a',
			'property'	 => 'color',
		),
	),
) );
Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'multicolor',
	'settings'	 => 'woo_single_product_sale',
	'label'		 => esc_attr__( 'Sale', 'futurio-pro' ),
	'section'	 => 'main_typography_woo_product_section',
	'priority'	 => 10,
	'transport'	 => 'auto',
	'choices'	 => array(
		'link'		 => esc_attr__( 'Color', 'futurio-pro' ),
		'background' => esc_attr__( 'Background', 'futurio-pro' ),
	),
	'default'	 => array(
		'link'		 => '',
		'background' => '',
	),
	'output'	 => array(
		array(
			'choice'	 => 'link',
			'element'	 => '.single.woocommerce span.onsale',
			'property'	 => 'color',
		),
		array(
			'choice'	 => 'background',
			'element'	 => '.single.woocommerce span.onsale',
			'property'	 => 'background-color',
		),
	),
) );
/**
 * Woo buttons styling
 */
Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'multicolor',
	'settings'	 => 'woo_global_product_buttons',
	'label'		 => esc_attr__( 'Buttons', 'futurio-pro' ),
	'section'	 => 'woo_global_buttons_section',
	'priority'	 => 10,
	'transport'	 => 'auto',
	'choices'	 => array(
		'link'		 => esc_attr__( 'Color', 'futurio-pro' ),
		'border'	 => esc_attr__( 'Border', 'futurio-pro' ),
		'background' => esc_attr__( 'Background', 'futurio-pro' ),
	),
	'default'	 => array(
		'link'		 => '',
		'border'	 => '',
		'background' => 'transparent',
	),
	'output'	 => array(
		array(
			'choice'	 => 'link',
			'element'	 => '.woocommerce #respond input#submit, .woocommerce a.button, #sidebar .widget.widget_shopping_cart a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt',
			'property'	 => 'color',
		),
		array(
			'choice'	 => 'border',
			'element'	 => '.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt',
			'property'	 => 'border-color',
		),
		array(
			'choice'	 => 'background',
			'element'	 => '.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt',
			'property'	 => 'background-color',
		),
	),
) );
Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'multicolor',
	'settings'	 => 'woo_global_product_buttons_hover',
	'label'		 => esc_attr__( 'Buttons hover', 'futurio-pro' ),
	'section'	 => 'woo_global_buttons_section',
	'priority'	 => 10,
	'transport'	 => 'auto',
	'choices'	 => array(
		'link'		 => esc_attr__( 'Color', 'futurio-pro' ),
		'border'	 => esc_attr__( 'Border', 'futurio-pro' ),
		'background' => esc_attr__( 'Background', 'futurio-pro' ),
	),
	'default'	 => array(
		'link'		 => '',
		'border'	 => '',
		'background' => '',
	),
	'output'	 => array(
		array(
			'choice'	 => 'link',
			'element'	 => '.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, #sidebar .widget.widget_shopping_cart a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover',
			'property'	 => 'color',
		),
		array(
			'choice'	 => 'border',
			'element'	 => '.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover',
			'property'	 => 'border-color',
		),
		array(
			'choice'	 => 'background',
			'element'	 => '.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover',
			'property'	 => 'background-color',
		),
	),
) );
/**
 * Others
 */
Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'multicolor',
	'settings'	 => 'woo_filter_price_color',
	'label'		 => esc_attr__( 'Filter by price slider color', 'futurio-pro' ),
	'section'	 => 'woo_global_other_section',
	'priority'	 => 10,
	'transport'	 => 'auto',
	'choices'	 => array(
		'color'		 => esc_attr__( 'Color', 'futurio-pro' ),
		'border' => esc_attr__( 'Border', 'futurio-pro' ),
	),
	'default'	 => array(
		'color'		 => '',
		'border' => '',
	),
	'output'	 => array(
		array(
			'choice'	 => 'color',
			'element'	 => '.woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle',
			'property'	 => 'background-color',
		),
		array(
			'choice'	 => 'border',
			'element'	 => '.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content',
			'property'	 => 'border-color',
		),
	),
) );

Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'multicolor',
	'settings'	 => 'woo_head_cart_color',
	'label'		 => esc_attr__( 'Header cart colors', 'futurio-pro' ),
	'section'	 => 'woo_global_other_section',
	'priority'	 => 10,
	'transport'	 => 'auto',
	'choices'	 => array(
    'icon'		 => esc_attr__( 'Icon', 'futurio-pro' ),
		'color'		 => esc_attr__( 'Counter', 'futurio-pro' ),
		'bg' => esc_attr__( 'Counter bg', 'futurio-pro' ),
	),
	'default'	 => array(
    'icon'		 => '',
		'color'		 => '',
		'bg' => '',
	),
	'output'	 => array(
    array(
			'choice'	 => 'icon',
			'element'	 => '.header-cart a.cart-contents i.fa',
			'property'	 => 'color',
		),
		array(
			'choice'	 => 'color',
			'element'	 => '.cart-contents span.count',
			'property'	 => 'color',
		),
		array(
			'choice'	 => 'bg',
			'element'	 => '.cart-contents span.count',
			'property'	 => 'background-color',
		),
	),
) );

Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'multicolor',
	'settings'	 => 'woo_my_account_header_color',
	'label'		 => esc_attr__( 'Header my account', 'futurio-pro' ),
	'section'	 => 'woo_global_other_section',
	'priority'	 => 10,
	'transport'	 => 'auto',
	'choices'	 => array(
		'color'		 => esc_attr__( 'Color', 'futurio-pro' ),
		'hover' => esc_attr__( 'Hover', 'futurio-pro' ),
	),
	'default'	 => array(
		'color'		 => '',
		'hover' => '',
	),
	'output'	 => array(
		array(
			'choice'	 => 'color',
			'element'	 => '.header-login a i.fa',
			'property'	 => 'color',
		),
		array(
			'choice'	 => 'hover',
			'element'	 => '.header-login:hover a i.fa',
			'property'	 => 'color',
		),
	),
) );


/**
 * Add custom class to body
 */
function futurio_pro_body_class( $classes ) {

    if ( get_theme_mod( 'woo_popup_cart', 0 ) == 1 ) {
  		$classes[] = 'open-middle-cart';
  	}
    if ( get_theme_mod( 'woo_ajax_single_add_to_cart', 1 ) == 1 && is_product() ) {
  		$classes[] = 'single-ajax-add-to-cart';
  	}
    return $classes;
}

add_filter( 'body_class', 'futurio_pro_body_class' );