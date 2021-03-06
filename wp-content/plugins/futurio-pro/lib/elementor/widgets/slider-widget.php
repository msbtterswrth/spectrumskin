<?php
namespace Futurio_Elementor_Widget\Widget;

/**
 * Slider Hero with Elementor Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Slider extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Slider Hero with Elementor widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'futurio-elementor-slider';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Slider Hero with Elementor widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Slider', 'futurio-pro' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Slider Hero widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-post-slider';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Slider Hero widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'slides', 'carousel', 'slider' ];
	}

	public function get_script_depends() {
		return [ 'futurio-elementor-slider', 'imagesloaded', 'slick-q' ];
	}
        public function get_style_depends() {
            return [ 'slick-stylesheet' ];
        }
	/**
	 * Register Slider Hero widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'futurio-pro' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$library_ids = get_posts( array(
			'post_type'      => 'elementor_library',
			'fields'         => 'ids',
			// 'meta_key'       => 'elementor_library_type',
			// 'meta_value'     => 'header',
			'posts_per_page' => -1
		));

		$templates = array();

		if ( $library_ids ) {
			foreach ( $library_ids as $id ) {
				$templates[ $id ] = get_the_title( $id );
			}
		}

		$this->add_control(
			'slides',
			[
				'label'       => __( 'Select Slides', 'futurio-pro' ),
				'type'        => \Elementor\Controls_Manager::SELECT2,
				'options'     => $templates,
				'label_block' => true,
				'multiple'    => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_slider_options',
			[
				'label' => __( 'Slider Options', 'futurio-pro' ),
				'type'  => \Elementor\Controls_Manager::SECTION,
			]
		);

		$this->add_control(
			'navigation',
			[
				'label'   => __( 'Navigation', 'futurio-pro' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'both',
				'options' => [
					'both'   => __( 'Arrows and Dots', 'futurio-pro' ),
					'arrows' => __( 'Arrows', 'futurio-pro' ),
					'dots'   => __( 'Dots', 'futurio-pro' ),
					'none'   => __( 'None', 'futurio-pro' ),
				],
			]
		);

		$this->add_control(
			'pause_on_hover',
			[
				'label'   => __( 'Pause on Hover', 'futurio-pro' ),
				'type'    => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label'   => __( 'Autoplay', 'futurio-pro' ),
				'type'    => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'autoplay_speed',
			[
				'label'     => __( 'Autoplay Speed', 'futurio-pro' ),
				'type'      => \Elementor\Controls_Manager::NUMBER,
				'default'   => 5000,
				'condition' => [
					'autoplay' => 'yes',
				],
			]
		);

		$this->add_control(
			'infinite',
			[
				'label'   => __( 'Infinite Loop', 'futurio-pro' ),
				'type'    => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'transition',
			[
				'label'   => __( 'Transition', 'futurio-pro' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'slide',
				'options' => [
					'slide' => __( 'Slide', 'futurio-pro' ),
					'fade'  => __( 'Fade', 'futurio-pro' ),
				],
			]
		);

		$this->add_control(
			'transition_speed',
			[
				'label'   => __( 'Transition Speed (ms)', 'futurio-pro' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'default' => 500,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_navigation',
			[
				'label' => __( 'Navigation', 'futurio-pro' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'navigation' => [ 'arrows', 'dots', 'both' ],
				],
			]
		);

		$this->add_control(
			'heading_style_arrows',
			[
				'label' => __( 'Arrows', 'futurio-pro' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'navigation' => [ 'arrows', 'both' ],
				],
			]
		);

		$this->add_responsive_control(
			'arrows_size',
			[
				'label' => __( 'Arrows Size', 'futurio-pro' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 60,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .futurio-elementor-slider-wrapper .slick-slider > .slick-prev:before, {{WRAPPER}} .futurio-elementor-slider-wrapper .slick-slider > .slick-next:before' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'navigation' => [ 'arrows', 'both' ],
				],
			]
		);

		$this->add_responsive_control(
			'arrows_color',
			[
				'label' => __( 'Arrows Color', 'futurio-pro' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .futurio-elementor-slider-wrapper .slick-slider > .slick-prev:before, {{WRAPPER}} .futurio-elementor-slider-wrapper .slick-slider > .slick-next:before' => 'color: {{VALUE}};',
				],
				'condition' => [
					'navigation' => [ 'arrows', 'both' ],
				],
			]
		);

		$this->add_control(
			'heading_style_dots',
			[
				'label' => __( 'Dots', 'futurio-pro' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'navigation' => [ 'dots', 'both' ],
				],
			]
		);

		$this->add_responsive_control(
			'dots_size',
			[
				'label' => __( 'Dots Size', 'futurio-pro' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 15,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .futurio-elementor-slider-wrapper .futurio-elementor-slider > .slick-dots li button:before,{{WRAPPER}} .elementor-slick-slider ul.slick-dots li button' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'navigation' => [ 'dots', 'both' ],
				],
			]
		);

		$this->add_responsive_control(
			'dots_color',
			[
				'label' => __( 'Dots Color', 'futurio-pro' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .futurio-elementor-slider-wrapper .futurio-elementor-slider > .slick-dots li button:before' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'navigation' => [ 'dots', 'both' ],
				],
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render Slider Hero widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		if ( empty( $slides = $settings['slides'] ) ) {
			return;
		}

		$is_rtl      = is_rtl();
		$direction   = $is_rtl ? 'rtl' : 'ltr';
		$show_dots   = ( in_array( $settings['navigation'], [ 'dots', 'both' ] ) );
		$show_arrows = ( in_array( $settings['navigation'], [ 'arrows', 'both' ] ) );

		$slick_options = [
			'slidesToShow'  => absint( 1 ),
			'autoplaySpeed' => absint( $settings['autoplay_speed'] ),
			'autoplay'      => ( 'yes' === $settings['autoplay'] ),
			'infinite'      => ( 'yes' === $settings['infinite'] ),
			'pauseOnHover'  => ( 'yes' === $settings['pause_on_hover'] ),
			'speed'         => absint( $settings['transition_speed'] ),
			'arrows'        => $show_arrows,
			'dots'          => $show_dots,
			'rtl'           => $is_rtl,
		];

		if ( 'fade' === $settings['transition'] ) {
			$slick_options['fade'] = true;
		}

		$this->add_render_attribute( 'slides', [
			'class'               => [ 'futurio-elementor-slider', 'slick-arrows-inside', 'slick-dots-inside' ],
			'data-slider_options' => wp_json_encode( $slick_options ),
		] );
		?>

		<div class="futurio-elementor-slider-wrapper elementor-slick-slider" dir="<?php echo esc_attr( $direction ); ?>">
			<div <?php echo $this->get_render_attribute_string( 'slides' ); ?>>

				<?php foreach ( $slides as $key => $id ) : ?>
					<div class="futurio-elementor-slider-item futurio-elementor-slider-item-<?php echo esc_attr( $key + 1 ); ?>">
						<?php echo do_shortcode( '[elementor-template id="' . $id . '"]' ); ?>
					</div>
				<?php endforeach; ?>

			</div>
		</div>
		<?php
	}
}
