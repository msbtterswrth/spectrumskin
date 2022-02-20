<?php

// Elementor Classes
use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Widget_Base;

if(! defined('ABSPATH')) exit; // Exit if accessed directly

class Search extends Widget_Base {

    public function get_name() {
		return 'futurio-search';
	}

	public function get_title() {
		return __('Ajax Search', 'futurio-pro');
	}

	public function get_icon() {
		// Upload "eicons.ttf" font via this site: http://bluejamesbond.github.io/CharacterMap/
		return 'eicon-search';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_script_depends() {
		return [ 'futurio-search' ];
	}

	public function get_style_depends() {
		return [ 'futurio-search' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_search',
			[
				'label' 		=> __('Search', 'futurio-pro'),
			]
		);

		$this->add_responsive_control(
			'width',
			[
				'label' 		=> __('Width', 'futurio-pro'),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px', '%' ],
				'default' => [
					'unit' => 'px',
					'size' => 250,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .futurio-search-wrap' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'height',
			[
				'label' 		=> __('Height', 'futurio-pro'),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px', '%' ],
				'default' => [
					'unit' => 'px',
					'size' => 40,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .futurio-searchform, {{WRAPPER}} .futurio-searchform input.field' => 'min-height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'placeholder',
			[
				'label' 		=> __('Placeholder', 'futurio-pro'),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __('Search', 'futurio-pro'),
				'placeholder' 	=> __('Search', 'futurio-pro'),
				'dynamic' 		=> [ 'active' => true ],
			]
		);

		$this->add_control(
			'enable_ajax',
			[
				'label' 		=> __('Enable Ajax', 'futurio-pro'),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __('Show', 'futurio-pro'),
				'label_off' 	=> __('Hide', 'futurio-pro'),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' 		=> __('Alignment', 'futurio-pro'),
				'type' 			=> Controls_Manager::CHOOSE,
				'options' 		=> [
					'left'    => [
						'title' => __('Left', 'futurio-pro'),
						'icon' 	=> 'fa fa-align-left',
					],
					'center' => [
						'title' => __('Center', 'futurio-pro'),
						'icon' 	=> 'fa fa-align-center',
					],
					'right' => [
						'title' => __('Right', 'futurio-pro'),
						'icon' 	=> 'fa fa-align-right',
					],
				],
				'default' 		=> '',
				'prefix_class' => 'futurio%s-align-',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_input',
			[
				'label' 		=> __('Input', 'futurio-pro'),
				'tab' 			=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs('tabs_input_style');

		$this->start_controls_tab(
			'tab_input_normal',
			[
				'label' => __('Normal', 'futurio-pro'),
			]
		);

		$this->add_control(
			'input_bg',
			[
				'label' 		=> __('Background', 'futurio-pro'),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .futurio-searchform input.field' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'input_color',
			[
				'label' 		=> __('Color', 'futurio-pro'),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .futurio-searchform input.field' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_input_hover',
			[
				'label' => __('Hover', 'futurio-pro'),
			]
		);

		$this->add_control(
			'input_bg_hover',
			[
				'label' 		=> __('Background', 'futurio-pro'),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .futurio-searchform input.field:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'input_color_hover',
			[
				'label' 		=> __('Color', 'futurio-pro'),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .futurio-searchform input.field:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'input_border_color_hover',
			[
				'label' 		=> __('Border Color', 'futurio-pro'),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .futurio-searchform input.field:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_input_focus',
			[
				'label' => __('Focus', 'futurio-pro'),
			]
		);

		$this->add_control(
			'input_bg_focus',
			[
				'label' 		=> __('Background', 'futurio-pro'),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .futurio-searchform input.field:focus' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'input_color_focus',
			[
				'label' 		=> __('Color', 'futurio-pro'),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .futurio-searchform input.field:focus' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'input_border_color_focus',
			[
				'label' 		=> __('Border Color', 'futurio-pro'),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .futurio-searchform input.field:focus' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 			=> 'input_focus_box_shadow',
				'selector' 		=> '{{WRAPPER}} .futurio-searchform input.field:focus',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'input_border',
				'label' 		=> __('Border', 'futurio-pro'),
				'placeholder' 	=> '1px',
				'default' 		=> '1px',
				'selector' 		=> '{{WRAPPER}} .futurio-searchform input.field',
				'separator' 	=> 'before',
			]
		);

		$this->add_control(
			'input_border_radius',
			[
				'label' 		=> __('Border Radius', 'futurio-pro'),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .futurio-searchform input.field' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'input_padding',
			[
				'label' 		=> __('Padding', 'futurio-pro'),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .futurio-searchform input.field' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'newsletter_input',
				'selector' 		=> '{{WRAPPER}} .futurio-searchform input.field',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_icon',
			[
				'label' 		=> __('Icon Button', 'futurio-pro'),
				'type' 			=> Controls_Manager::SECTION,
				'tab' 			=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label' 		=> __('Font Size', 'futurio-pro'),
				'type' 			=> Controls_Manager::SLIDER,
				'default' => [
					'size' => 12,
				],
				'range' => [
					'min' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .futurio-searchform button' => 'font-size: {{SIZE}}px;',
				],
			]
		);

		$this->add_responsive_control(
			'icon_position',
			[
				'label' 		=> __('Position', 'futurio-pro'),
				'type' 			=> Controls_Manager::SLIDER,
				'default' => [
					'size' => 0,
				],
				'range' => [
					'min' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .futurio-searchform button' => is_rtl() ? 'left: {{SIZE}}px;' : 'right: {{SIZE}}px;',
				],
			]
		);

		$this->start_controls_tabs('tabs_icon_style');

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __('Normal', 'futurio-pro'),
			]
		);

		$this->add_control(
			'btn_color',
			[
				'label' 		=> __('Color', 'futurio-pro'),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .futurio-searchform button' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __('Hover', 'futurio-pro'),
			]
		);

		$this->add_control(
			'btn_color_hover',
			[
				'label' 		=> __('Color', 'futurio-pro'),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .futurio-searchform button:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'section_search_results',
			[
				'label' 		=> __('Search Results', 'futurio-pro'),
				'type' 			=> Controls_Manager::SECTION,
				'tab' 			=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'results_bg',
			[
				'label' 		=> __('Background Color', 'futurio-pro'),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .futurio-search-wrap .futurio-search-results' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'results_border_radius',
			[
				'label' 		=> __('Border Radius', 'futurio-pro'),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .futurio-search-wrap .futurio-search-results' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' 	=> 'after',
			]
		);

		$this->start_controls_tabs('tabs_results_links_style');

		$this->start_controls_tab(
			'tab_results_links_normal',
			[
				'label' => __('Normal', 'futurio-pro'),
			]
		);

		$this->add_control(
			'results_links_bg',
			[
				'label' 		=> __('Links Background', 'futurio-pro'),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .futurio-search-wrap .futurio-search-results ul li a.search-result-link' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'results_links_color',
			[
				'label' 		=> __('Links Color', 'futurio-pro'),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .futurio-search-wrap .futurio-search-results ul li a.search-result-link' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'results_links_border_color',
			[
				'label' 		=> __('Links Border Color', 'futurio-pro'),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .futurio-search-wrap .futurio-search-results ul li a' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'results_icons_color',
			[
				'label' 		=> __('Icons Color', 'futurio-pro'),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .futurio-search-wrap .futurio-search-results ul li a i.icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'results_all_links_color',
			[
				'label' 		=> __('All Results Color', 'futurio-pro'),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .futurio-search-wrap .futurio-search-results ul li a.all-results' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'results_links_hover',
			[
				'label' => __('Hover', 'futurio-pro'),
			]
		);

		$this->add_control(
			'results_links_hover_bg',
			[
				'label' 		=> __('Links Background', 'futurio-pro'),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .futurio-search-wrap .futurio-search-results ul li a.search-result-link:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'results_links_hover_color',
			[
				'label' 		=> __('Links Color', 'futurio-pro'),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .futurio-search-wrap .futurio-search-results ul li a.search-result-link:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'results_links_hover_border_color',
			[
				'label' 		=> __('Links Border Color', 'futurio-pro'),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .futurio-search-wrap .futurio-search-results ul li a:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'results_icons_hover_color',
			[
				'label' 		=> __('Icons Color', 'futurio-pro'),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .futurio-search-wrap .futurio-search-results ul li a:hover i.icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'results_all_links_hover_color',
			[
				'label' 		=> __('All Results Color', 'futurio-pro'),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .futurio-search-wrap .futurio-search-results ul li a.all-results:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'results_links_padding',
			[
				'label' => __('Links Padding', 'futurio-pro'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .futurio-search-wrap .futurio-search-results ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'results_search_typo',
				'selector' 		=> '{{WRAPPER}} .futurio-search-wrap .futurio-search-results ul li a',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_no_search_results',
			[
				'label' 		=> __('No Results Found', 'futurio-pro'),
				'type' 			=> Controls_Manager::SECTION,
				'tab' 			=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'no_results_heading_color',
			[
				'label' 		=> __('Heading Color', 'futurio-pro'),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .futurio-search-wrap .futurio-no-search-results h6' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'no_results_heading_typo',
				'selector' 		=> '{{WRAPPER}} .futurio-search-wrap .futurio-no-search-results h6',
			]
		);

		$this->add_control(
			'no_results_text_color',
			[
				'label' 		=> __('Text Color', 'futurio-pro'),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .futurio-search-wrap .futurio-no-search-results p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'no_results_text_typo',
				'selector' 		=> '{{WRAPPER}} .futurio-search-wrap .futurio-no-search-results p',
			]
		);

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		// Admin ajax, put it in data so that it works in the edit mode of Elementor
		$ajax = admin_url('admin-ajax.php');

		// If ajax
		$classes = 'futurio-searchform';
		if('yes' == $settings['enable_ajax']) {
			$classes .= ' futurio-ajax-search';
		}

		// Placeholder
		$placeholder = '';
		if(! empty($settings['placeholder'])) {
			$placeholder = ' placeholder="'. $settings['placeholder'] .'"';
		} ?>

		<div class="futurio-search-wrap" data-ajaxurl="<?php echo esc_url($ajax); ?>">
			<form method="get" class="<?php echo esc_attr($classes); ?>" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
				<input type="text" class="field" name="s" id="s"<?php echo $placeholder; ?>>
				<button type="submit" class="search-submit" value=""><i class="fa fa-search"></i></button>
			</form>
			<?php
			if('yes' == $settings['enable_ajax']) { ?>
				<div class="futurio-ajax-loading"></div>
				<div class="futurio-search-results"></div>
			<?php
			} ?>
		</div>

	<?php
	}

	// No template because it cause a js error in the edit mode
	protected function _content_template() {}

}