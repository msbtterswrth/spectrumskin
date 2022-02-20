<?php

if ( !class_exists( 'Kirki' ) ) {
	return;
}

function futurio_pro_do_not_filter_anything( $value ) {
	return $value;
}

Kirki::add_section( 'custom_code_section', array(
	'title'		 => esc_attr__( 'Custom Codes', 'futurio-pro' ),
	'priority'	 => 10,
) );

Kirki::add_field( 'futurio_extra', array(
	'type'			 => 'textarea',
	'settings'		 => 'header-code',
	'label'			 => __( 'Code to be added to the HEAD', 'futurio-pro' ),
	'description'	 => __( 'Suitable for Google Analytics code', 'futurio-pro' ),
	'section'		 => 'custom_code_section',
	'transport'		 => 'postMessage',
	'sanitize_callback' => 'futurio_pro_do_not_filter_anything',
	'default'		 => '',
	'priority'		 => 10,
) );

add_action( 'wp_head', 'futurio_pro_add_googleanalytics', 10 );

function futurio_pro_add_googleanalytics() {
 $header_code = get_theme_mod( 'header-code', '' );
 if ( $header_code ) {
  echo get_theme_mod( 'header-code', '' );
 }
} 


Kirki::add_field( 'futurio_extra', array(
	'type'			 => 'textarea',
	'settings'		 => 'footer-code',
	'label'			 => __( 'Code to be added to the footer', 'futurio-pro' ),
	'section'		 => 'custom_code_section',
	'transport'		 => 'postMessage',
	'sanitize_callback' => 'futurio_pro_do_not_filter_anything',
	'default'		 => '',
	'priority'		 => 10,
) );

add_action( 'wp_footer', 'futurio_pro_add_footer_code' );

function futurio_pro_add_footer_code() {
 $header_code = get_theme_mod( 'footer-code', '' );
 if ( $header_code ) {
  echo get_theme_mod( 'footer-code', '' );
 }
} 