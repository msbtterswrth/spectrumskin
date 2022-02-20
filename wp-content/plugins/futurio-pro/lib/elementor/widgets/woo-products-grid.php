<?php

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Futurio_Pro_Woo_Grid extends Widget_Base {

	public function get_name() {
		return 'futurio-woocommerce-grid';
	}

	public function get_title() {
		return __( 'Woo Products Grid', 'futurio-pro' );
	}

	public function get_icon() {
		return 'eicon-posts-grid';
	}

	public function get_categories() {
		return [ 'woocommerce' ];
	}
  
	protected function _register_controls() {

		$this->start_controls_section(
			'section_style_text',
  			[
  				'label' => __( 'Options', 'futurio-pro' ),
  				'tab' => Controls_Manager::SECTION,
  			]
  		);
      
      
      $this->add_control(
  			'type',
  			[
  				'label' => __( 'Products', 'futurio-pro' ),
  				'type' => Controls_Manager::SELECT,
  				'default' => '',
  				'options' => [
  					''  => __( 'Recent', 'elementor' ),
  					'best_selling' => __( 'Best selling', 'elementor' ),
  					'on_sale' => __( 'On sale', 'elementor' ),
  					'featured' => __( 'Featured', 'elementor' ),
  				],
  			]
  		);
      
      $this->add_control(
  			'orderby',
  			[
  				'label' => __( 'Order by', 'futurio-pro' ),
  				'type' => Controls_Manager::SELECT,
  				'default' => 'date',
  				'options' => [
  					'date'  => __( 'Date', 'elementor' ),
  					'title' => __( 'Title', 'elementor' ),
  					'ID' => __( 'ID', 'elementor' ),
  					'rand' => __( 'Rand', 'elementor' ),
  				],
  			]
  		);
      
      $this->add_control(
  			'columns',
  			[
  				'label' => __( 'Columns', 'elementor' ),
  				'type' => Controls_Manager::NUMBER,
  				'default' => 4,
  			]
  		);
      
      $this->add_control(
  			'limit',
  			[
  				'label' => __( 'Items', 'futurio-pro' ),
  				'type' => Controls_Manager::NUMBER,
  				'default' => 8,
  			]
  		);
      $this->add_control(
  			'product_IDS',
  			[
  				'label' => __( 'Product ID\'s', 'futurio-pro' ),
          'description' => __( 'Comma separated (eg. 5,9,36). Leave blank to show all.', 'futurio-pro' ),
  				'type' => Controls_Manager::TEXT,
  				'condition' => [
						'cat_IDS'  => '',
            'type!'  => 'featured',
					],
  			]
  		);
      $this->add_control(
  			'cat_IDS',
  			[
  				'label' => __( 'Category (Slug)', 'futurio-pro' ),
          'description' => __( 'Comma separated (eg. hoodies, tshirts). Leave blank to show all.', 'futurio-pro' ),
  				'type' => Controls_Manager::TEXT,
  				'condition' => [
						'product_IDS'  => '',
            'type!'  => 'featured',
					],
  			]
  		);  
          

		$this->end_controls_section();
    
    /**
		 * Tab Style.
		 */
		$this->start_controls_section(
			'section_products_slider_layout_style',
			[
				'label' => __( 'Product Layout', 'futurio-pro' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		/**
		 * Layout Tabs Background.
		 */
		$this->start_controls_tabs( 'section_products_slider_layout_tabs_background' );

		$this->start_controls_tab(
			'section_products_slider_layout_tab_background_normal',
			[
				'label' => __( 'Normal', 'futurio-pro' ),
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'section_products_slider_layout_background',
				'selector' => '{{WRAPPER}} .woocommerce ul.products li.product',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'section_products_slider_layout_tab_background_hover',
			[
				'label' => __( 'Hover', 'futurio-pro' ),
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'section_products_slider_layout_background_hover',
				'selector' => '{{WRAPPER}} .woocommerce ul.products li.product:hover',
			]
		);

		$this->add_control(
			'section_products_slider_layout_background_hover_transition',
			[
				'label' => __( 'Transition Duration', 'futurio-pro' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0.25,
				],
				'range' => [
					'px' => [
						'max' => 3,
						'step' => 0.1,
					],
				],
				'render_type' => 'ui',
				'selectors' => [
					'{{WRAPPER}} .woocommerce ul.products li.product' => 'transition: all {{SIZE}}s ease-in-out;',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		// End Layout Background.


		$this->add_responsive_control(
			'layout_content_padding',
			[
				'label' => __( 'Content Padding', 'futurio-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce ul.products li.product' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          '{{WRAPPER}} .futurio-has-gallery .secondary-image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} 0 {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_border_style',
			[
				'label' => __( 'Border', 'futurio-pro' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'layout_border_width',
			[
				'label' => __( 'Border Width', 'futurio-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce ul.products li.product' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'layout_border_style',
			[
				'label'     => __( 'Border Style', 'futurio-pro' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => array(
					'solid'  => esc_html__( 'Solid', 'futurio-pro' ),
					'dashed' => esc_html__( 'Dashed', 'futurio-pro' ),
					'dotted' => esc_html__( 'Dotted', 'futurio-pro' ),
					'double' => esc_html__( 'Double', 'futurio-pro' ),
					'groove' => esc_html__( 'Groove', 'futurio-pro' ),
					'inset'  => esc_html__( 'Inset', 'futurio-pro' ),
					'outset' => esc_html__( 'Outset', 'futurio-pro' ),
					'ridge'  => esc_html__( 'Ridge', 'futurio-pro' ),
				),
				'selectors' => [
					'{{WRAPPER}} .woocommerce ul.products li.product' => 'border-style: {{VALUE}}', // Harder selector to override text color control
				],
			]
		);

		$this->add_responsive_control(
			'layout_border_color',
			[
				'label' => __( 'Border Color', 'futurio-pro' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce ul.products li.product' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'layout_border_radius',
			[
				'label' => __( 'Border Radius', 'futurio-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce ul.products li.product' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_products_slider_header_style',
			[
				'label' => __( 'Sale flash', 'futurio-pro' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);



		/**
		 * Sale Flash Tabs Background.
		 */
		$this->start_controls_tabs( 'header_sale_flash_tabs_background' );

		$this->start_controls_tab(
			'header_sale_flash_tab_background_normal',
			[
				'label' => __( 'Normal', 'futurio-pro' ),
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'header_sale_flash_background',
				'selector' => '{{WRAPPER}} .woocommerce ul.products li.product .onsale',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'header_sale_flash_tab_background_hover',
			[
				'label' => __( 'Hover', 'futurio-pro' ),
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'header_sale_flash_background_hover',
				'selector' => '{{WRAPPER}} .woocommerce ul.products li.product:hover .onsale',
			]
		);

		$this->add_control(
			'header_sale_flash_background_hover_transition',
			[
				'label' => __( 'Transition Duration', 'futurio-pro' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0.25,
				],
				'range' => [
					'px' => [
						'max' => 3,
						'step' => 0.1,
					],
				],
				'render_type' => 'ui',
				'selectors' => [
					'{{WRAPPER}} .woocommerce ul.products li.product .onsale' => 'transition: all {{SIZE}}s ease-in-out;',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		// End Sale Flash Background.

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'header_sale_flash_typography',
				'selector' => '{{WRAPPER}} .woocommerce ul.products li.product .onsale',
			]
		);

		$this->add_responsive_control(
			'header_sale_flash_color',
			[
				'label'     => __( 'Color', 'futurio-pro' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce ul.products li.product .onsale' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'header_sale_flash_width',
			[
				'label' => __( 'Width', 'futurio-pro' ),
				'type'  => Controls_Manager::SLIDER,
				'default' => [
					'size' => '',
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce ul.products li.product .onsale' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'header_sale_flash_height',
			[
				'label' => __( 'Height', 'futurio-pro' ),
				'type'  => Controls_Manager::SLIDER,
				'default' => [
					'size' => '',
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce ul.products li.product .onsale' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'header_sale_flash_border_radius',
			[
				'label' => __( 'Border Radius', 'futurio-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce ul.products li.product .onsale' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'header_sale_flash_position_top',
			[
				'label' => __( 'Top', 'futurio-pro' ),
				'type'  => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0,
				],
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce ul.products li.product .onsale' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'header_sale_flash_position_right',
			[
				'label' => __( 'Right', 'futurio-pro' ),
				'type'  => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0,
				],
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce ul.products li.product .onsale' => 'right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'header_sale_flash_position_bottom',
			[
				'label' => __( 'Bottom', 'futurio-pro' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce ul.products li.product .onsale' => 'bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'header_sale_flash_position_left',
			[
				'label' => __( 'Left', 'futurio-pro' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce ul.products li.product .onsale' => 'left: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'after',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_products_slider_footer_style',
			[
				'label' => __( 'Content', 'futurio-pro' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'footer_align',
			[
				'label' => __( 'Alignment', 'futurio-pro' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'futurio-pro' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'futurio-pro' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'futurio-pro' ),
						'icon' => 'fa fa-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'futurio-pro' ),
						'icon' => 'fa fa-align-justify',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .woocommerce ul.products li.product' => 'text-align: {{VALUE}};',
				],
			]
		);
    
    $this->end_controls_section();

		$this->start_controls_section(
			'heading_title_style',
			[
				'label' => __( 'Title', 'futurio-pro' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'footer_title_typography',
				'selector' => '{{WRAPPER}} .woocommerce ul.products li.product h2.woocommerce-loop-product__title',
			]
		);
    
		/**
		 * Start Footer Title Tabs Background.
		 */
		$this->start_controls_tabs( 'footer_title_tabs_title' );

		$this->start_controls_tab(
			'footer_title_tab_title_normal',
			[
				'label' => __( 'Normal', 'futurio-pro' ),
			]
		);

		$this->add_responsive_control(
			'footer_title_color',
			[
				'label'     => __( 'Color', 'futurio-pro' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce ul.products li.product h2.woocommerce-loop-product__title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'footer_title_tab_title_hover',
			[
				'label' => __( 'Hover', 'futurio-pro' ),
			]
		);

		$this->add_responsive_control(
			'footer_title_color_hover',
			[
				'label'     => __( 'Color', 'futurio-pro' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce ul.products li.product h2.woocommerce-loop-product__title:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		// End Footer Title Background.

    $this->end_controls_section();

		$this->start_controls_section(
			'heading_regular_price_style',
			[
				'label' => __( 'Price', 'futurio-pro' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'footer_regular_price_typography',
				'selector' => '{{WRAPPER}} .woocommerce ul.products li.product .price',
			]
		);

		$this->add_responsive_control(
			'footer_regular_price_color',
			[
				'label'     => __( 'Regular Price Color', 'futurio-pro' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce ul.products li.product .price' => 'color: {{VALUE}}',
				],
			]
		);

    $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'footer_sale_price_typography',
				'selector' => '{{WRAPPER}} .woocommerce ul.products li.product .price ins',
			]
		);

		$this->add_responsive_control(
			'footer_sale_price_color',
			[
				'label'     => __( 'Sale Price Color', 'futurio-pro' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce ul.products li.product .price ins' => 'color: {{VALUE}}',
				],
			]
		);

    $this->end_controls_section();

		$this->start_controls_section(
			'heading_add_to_cart_style',
			[
				'label' => __( 'Add To Cart', 'futurio-pro' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		/**
		 * Add To Cart
		 */

		/**
		 * Add To Cart Tabs Background.
		 */
		$this->start_controls_tabs( 'add_to_cart_tabs_background' );

		$this->start_controls_tab(
			'add_to_cart_tab_background_normal',
			[
				'label' => __( 'Normal', 'futurio-pro' ),
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'add_to_cart_background',
				'selector' => '{{WRAPPER}} .woocommerce ul.products li.product a.button.add_to_cart_button',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'add_to_cart_tab_background_hover',
			[
				'label' => __( 'Hover', 'futurio-pro' ),
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'add_to_cart_background_hover',
				'selector' => '{{WRAPPER}} .woocommerce ul.products li.product a.button.add_to_cart_button:hover',
			]
		);

		$this->add_control(
			'add_to_cart_background_hover_transition',
			[
				'label' => __( 'Transition Duration', 'futurio-pro' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0.25,
				],
				'range' => [
					'px' => [
						'max' => 3,
						'step' => 0.1,
					],
				],
				'render_type' => 'ui',
				'selectors' => [
					'{{WRAPPER}} .woocommerce ul.products li.product a.button.add_to_cart_button' => 'transition: all {{SIZE}}s ease-in-out;',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		// End Add To Cart Background.

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'header_add_to_cart_typography',
				'selector' => '{{WRAPPER}} .woocommerce ul.products li.product a.button.add_to_cart_button',
			]
		);

		$this->add_responsive_control(
			'add_to_cart_color',
			[
				'label'     => __( 'Color', 'futurio-pro' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce ul.products li.product a.button.add_to_cart_button' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'add_to_cart_padding',
			[
				'label' => __( 'Padding', 'futurio-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce ul.products li.product a.button.add_to_cart_button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'add_to_cart_margin',
			[
				'label' => __( 'Margin', 'futurio-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce ul.products li.product a.button.add_to_cart_button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'add_to_cart_border_radius',
			[
				'label' => __( 'Border Radius', 'futurio-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce ul.products li.product a.button.add_to_cart_button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
    
    $this->add_responsive_control(
			'add_to_cart_border_width',
			[
				'label' => __( 'Border Width', 'futurio-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce ul.products li.product a.button.add_to_cart_button' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'add_to_cart_border_style',
			[
				'label'     => __( 'Border Style', 'futurio-pro' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => array(
					'solid'  => esc_html__( 'Solid', 'futurio-pro' ),
					'dashed' => esc_html__( 'Dashed', 'futurio-pro' ),
					'dotted' => esc_html__( 'Dotted', 'futurio-pro' ),
					'double' => esc_html__( 'Double', 'futurio-pro' ),
					'groove' => esc_html__( 'Groove', 'futurio-pro' ),
					'inset'  => esc_html__( 'Inset', 'futurio-pro' ),
					'outset' => esc_html__( 'Outset', 'futurio-pro' ),
					'ridge'  => esc_html__( 'Ridge', 'futurio-pro' ),
				),
				'selectors' => [
					'{{WRAPPER}} .woocommerce ul.products li.product a.button.add_to_cart_button' => 'border-style: {{VALUE}}', // Harder selector to override text color control
				],
			]
		);

		$this->add_responsive_control(
			'add_to_cart_border_color',
			[
				'label' => __( 'Border Color', 'futurio-pro' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce ul.products li.product a.button.add_to_cart_button' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
    
           
    $this->start_controls_section(
			'heading_cats_style',
			[
				'label' => __( 'Categories', 'futurio-pro' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
    
		/**
		 * Start cats Background.
		 */
		$this->start_controls_tabs( 'heading_cats_style_colors' );

		$this->start_controls_tab(
			'footer_cats_normal',
			[
				'label' => __( 'Normal', 'futurio-pro' ),
			]
		);

		$this->add_responsive_control(
			'footer_cats_color',
			[
				'label'     => __( 'Color', 'futurio-pro' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .archive-product-categories a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'footer_cats_hover',
			[
				'label' => __( 'Hover', 'futurio-pro' ),
			]
		);

		$this->add_responsive_control(
			'footer_cats_hover_color',
			[
				'label'     => __( 'Color', 'futurio-pro' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .archive-product-categories a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		// End Footer Title Background.

    $this->end_controls_section();
	}

	protected function render() {
  
	  $settings = $this->get_settings_for_display();
        if ( !empty( $settings[ 'limit' ] ) ) {
  				$attr[] = 'limit="' . $settings[ 'limit' ] . '"';
  			}
  			if ( !empty( $settings[ 'columns' ] ) ) {
  				$attr[] = 'columns="' . $settings[ 'columns' ] . '"';
  			}
  			if ( !empty( $settings[ 'orderby' ] ) ) {
  				$attr[] = 'orderby="' . $settings[ 'orderby' ] . '"';
  			}
        if ( !empty( $settings[ 'product_IDS' ] ) ) {
  				$attr[] = 'ids="' . $settings[ 'product_IDS' ] . '"';
  			}
        if ( !empty( $settings[ 'cat_IDS' ] ) ) {
  				$attr[] = 'category="' . $settings[ 'cat_IDS' ] . '"';
  			}
        
        if ( $settings['type'] == 'best_selling' ) {
					$attr[] = 'best_selling="true"';
				} elseif ( $settings['type'] == 'on_sale' ) {
					$attr[] = 'on_sale="true"';
				} elseif ( $settings['type'] == 'top_rated' ) {
					$attr[] = 'top_rated="true"';
				} elseif ( $settings['type'] == 'featured' ) {
					$attr[] = 'visibility="featured"';
				}
        
  
      $shortcode = '[products]';
			if ( !empty( $attr ) ) {
				$shortcode = '[products ' . implode( ' ', $attr ) . ']';
			}
  
		?>
	<div class="futurio-grid-products" >
		 <?php echo do_shortcode( $shortcode ); ?>
	</div>				
	<?php

  
  
	}

	protected function _content_template() {
  
  }
}