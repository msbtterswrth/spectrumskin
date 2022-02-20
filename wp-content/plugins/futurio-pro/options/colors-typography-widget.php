<?php

if ( !class_exists( 'Kirki' ) ) {
	return;
}


Kirki::add_panel( 'colors', array(
	'priority'	 => 10,
	'title'		 => esc_attr__( 'Colors and Typography', 'futurio-pro' ),
) );

Kirki::add_section( 'sidebar_widget_section', array(
	'title'		 => esc_attr__( 'Widget', 'futurio-pro' ),
	'panel'		 => 'colors',
	'priority'	 => 10,
) );

/**
 * Widgets colors
 */

Kirki::add_field('futurio_extra', array(
    'type' => 'multicolor',
    'settings' => 'sidebar_color_links',
    'label' => esc_attr__('Links', 'futurio-pro'),
    'section' => 'sidebar_widget_section',
    'priority' => 10,
    'transport' => 'auto',
    'choices' => array(
        'link' => esc_attr__('Color', 'futurio-pro'),
        'hover' => esc_attr__('Hover', 'futurio-pro'),
    ),
    'default' => array(
        'link' => '',
        'hover' => '',
    ),
    'output' => array(
        array(
            'choice' => 'link',
            'element' => '#sidebar a, .offcanvas-sidebar a',
            'property' => 'color',
        ),
        array(
            'choice' => 'hover',
            'element' => '#sidebar a:hover, .offcanvas-sidebar a:hover',
            'property' => 'color',
        ),
    ),
));