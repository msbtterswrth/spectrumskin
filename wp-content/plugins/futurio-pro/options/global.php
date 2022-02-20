<?php

if ( !class_exists( 'Kirki' ) ) {
	return;
}

Kirki::add_section( 'global_section', array(
	'title'		 => esc_attr__( 'Global Options', 'futurio-pro' ),
	'priority'	 => 10,
) );

Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'radio-buttonset',
	'settings'	 => 'content_width',
	'label'		 => __( 'Content width', 'futurio-pro' ),
	'section'	 => 'global_section',
	'default'	 => '1170',
	'priority'	 => 10,
	'choices'	 => array(
		'980'	 => esc_attr__( '980', 'futurio-pro' ),
		'1024'	 => esc_attr__( '1024', 'futurio-pro' ),
		'1170'	 => esc_attr__( '1170', 'futurio-pro' ),
		'1280'	 => esc_attr__( '1280', 'futurio-pro' ),
		'1440'	 => esc_attr__( '1440', 'futurio-pro' ),
	),
	'output'	 => array(
		array(
			'choice'		 => '1440',
			'element'		 => '.futurio-content-1440 .container',
			'property'		 => 'width',
			'media_query'	 => '@media (min-width: 1480px)',
			'units'			 => 'px',
		),
		array(
			'choice'		 => '1280',
			'element'		 => '.futurio-content-1280 .container',
			'property'		 => 'width',
			'media_query'	 => '@media (min-width: 1320px)',
			'units'			 => 'px',
		),
		array(
			'choice'		 => '1170',
			'element'		 => '.futurio-content-1170 .container',
			'property'		 => 'width',
			'media_query'	 => '@media (min-width: 1200px)',
			'units'			 => 'px',
		),
		array(
			'choice'		 => '1024',
			'element'		 => '.futurio-content-1024 .container',
			'property'		 => 'width',
			'media_query'	 => '@media (min-width: 1200px)',
			'units'			 => 'px',
		),
		array(
			'choice'		 => '980',
			'element'		 => '.futurio-content-980 .container',
			'property'		 => 'width',
			'media_query'	 => '@media (min-width: 1200px)',
			'units'			 => 'px',
		),
	),
) );

Kirki::add_field( 'futurio_extra', array(
	'type'        => 'toggle',
	'settings'    => 'back_to_top',
	'label'		 => esc_attr__( 'Back to top button', 'futurio-pro' ),
	'section'     => 'global_section',
	'default'     => '1',
	'priority'    => 10,
) );

add_filter( 'body_class', 'futurio_pro_body_class_width' );

function futurio_pro_body_class_width( $classes ) {

	$content = get_theme_mod( 'content_width', '1170' );

	$classes[]	 = 'futurio-content-' . $content;

	return $classes;
}