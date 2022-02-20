<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


/**
 * Custom widgets for Elementor
 *
 * This class handles custom widgets for Elementor
 *
 * @since 1.0.0
 */
final class Futurio_PRO_Elementor_Extension {

  private static $_instance = null;

  public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}
	/**
	 * Registers widgets in Elementor
	 *
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function register_widgets() {
		/** @noinspection PhpIncludeInspection */
		// require_once FUTURIO_PRO_PATH . 'lib/elementor/widgets/menu.php';
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Futurio_PRO_Menu() );
    if ( class_exists( 'WooCommerce' ) ) {
      require_once FUTURIO_PRO_PATH . 'lib/elementor/widgets/woo-products-carousel.php';
      \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Futurio_Pro_Woo_Carousel() );
       require_once FUTURIO_PRO_PATH . 'lib/elementor/widgets/woo-products-grid.php';
      \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Futurio_Pro_Woo_Grid() );
    }
		require_once FUTURIO_PRO_PATH . 'lib/elementor/widgets/slider-widget.php';
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Futurio_Elementor_Widget\Widget\Slider() );
    
    require_once FUTURIO_PRO_PATH . 'lib/elementor/widgets/search.php';
      \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Search() );
      
    require_once FUTURIO_PRO_PATH . 'lib/elementor/widgets/off-canvas.php';
      \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Off_Canvas() );
	}


	/**
	 * Registers widgets scripts
	 *
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function widget_scripts() {
 
		wp_register_script(
			'slick-q',
			FUTURIO_PRO_PLUGIN_DIR .'js/slick.min.js' ,
			[
				'jquery',
			],
			FUTURIO_PRO_CURRENT_VERSION
		);
    wp_register_script(
			'futurio-elementor-woo',
			FUTURIO_PRO_PLUGIN_DIR .'js/elementor-woo.js' ,
			[
				'jquery',
			],
			FUTURIO_PRO_CURRENT_VERSION
		);
    wp_register_script(
			'futurio-elementor-slider',
			FUTURIO_PRO_PLUGIN_DIR .'js/elementor-slider.js' ,
			[
				'jquery',
			],
			FUTURIO_PRO_CURRENT_VERSION
		);
    wp_register_script(
			'futurio-search',
			FUTURIO_PRO_PLUGIN_DIR .'js/search.js' ,
			[
				'jquery',
			],
			FUTURIO_PRO_CURRENT_VERSION
		);
    wp_register_script(
			'futurio-off-canvas',
			FUTURIO_PRO_PLUGIN_DIR .'js/off-canvas.js' ,
			[
				'jquery',
			],
			FUTURIO_PRO_CURRENT_VERSION
		);
	}


	/**
	 * Enqueue widgets scripts in preview mode, as later calls in widgets render will not work,
	 * as it happens in admin env
	 *
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function widget_scripts_preview() {
	 wp_enqueue_script( 'slick-q' );
	}

	/**
	 * Registers widgets styles
	 *
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function widget_styles() {
	 wp_register_style( 'slick-stylesheet', FUTURIO_PRO_PLUGIN_DIR .'css/slick.css' );
   wp_register_style( 'futurio-search', FUTURIO_PRO_PLUGIN_DIR .'css/search.css' );
   wp_register_style( 'futurio-off-canvas', FUTURIO_PRO_PLUGIN_DIR .'css/off-canvas.css' );		
	}
  
  public function widget_styles_preview() {
	 wp_enqueue_style( 'slick-stylesheet' );
   wp_enqueue_style( 'futurio-search' );
   wp_enqueue_style( 'futurio-off-canvas' );
	}

  public function add_elementor_widget_categories( $elements_manager ) {
    
  }
  
	/**
	 * Widget constructor.
	 *
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
		// Register Widget Styles
		add_action( 'elementor/frontend/after_register_styles', [ $this, 'widget_styles' ] );
		// Register Widget Scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );
		// Enqueue ALL Widgets Scripts for preview
		add_action( 'elementor/preview/enqueue_scripts', [ $this, 'widget_scripts_preview' ] );

    add_action( 'elementor/preview/enqueue_styles', [ $this, 'widget_styles_preview' ] );


	}
}

Futurio_PRO_Elementor_Extension::instance();
