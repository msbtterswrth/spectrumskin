<?php

if ( !class_exists( 'Kirki' ) ) {
	return;
}


Kirki::add_panel( 'colors', array(
	'priority'	 => 10,
	'title'		 => esc_attr__( 'Colors and Typography', 'futurio-pro' ),
) );

Kirki::add_section( 'top_bar_colors_section', array(
	'title'		 => esc_attr__( 'Top bar', 'futurio-pro' ),
	'panel'		 => 'colors',
	'priority'	 => 10,
) );

/**
 * Top Menu Colors
 */
Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'color',
	'settings'	 => 'header_bg_color_topmenu',
	'label'		 => esc_attr__( 'Top bar background', 'futurio-pro' ),
	'section'	 => 'top_bar_colors_section',
	'default'	 => '',
	'choices'	 => array(
		'alpha' => true,
	),
	'transport'	 => 'auto',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.top-bar-section',
			'property'	 => 'background-color',
		),
	),
) );

Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'multicolor',
	'settings'	 => 'top_bar_links_color',
	'label'		 => esc_attr__( 'Links', 'futurio-pro' ),
	'section'	 => 'top_bar_colors_section',
	'priority'	 => 10,
	'transport'	 => 'auto',
	'choices'	 => array(
		'link'	 => esc_attr__( 'Color', 'futurio-pro' ),
		'hover'	 => esc_attr__( 'Hover', 'futurio-pro' ),
	),
	'default'	 => array(
		'link'	 => '',
		'hover'	 => '',
	),
	'output'	 => array(
		array(
			'choice'	 => 'link',
			'element'	 => '.top-bar-section a',
			'property'	 => 'color',
		),
		array(
			'choice'	 => 'hover',
			'element'	 => '.top-bar-section a:hover',
			'property'	 => 'color',
		),
	),
) );
