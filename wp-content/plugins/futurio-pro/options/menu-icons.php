<?php

if ( !class_exists( 'Kirki' ) ) {
	return;
}

Kirki::add_section( 'main_menu_icons', array(
	'title'		 => esc_attr__( 'Main menu', 'futurio-pro' ),
	'priority'	 => 10,
) );

Kirki::add_field( 'futurio_extra', array(
	'type'        => 'toggle',
	'settings'    => 'unstick_menu',
	'label'		 => esc_attr__( 'Sticky main menu', 'futurio-pro' ),
	'section'     => 'main_menu_icons',
	'default'     => '1',
	'priority'    => 10,
) );

add_filter( 'body_class', 'futurio_pro_body_class_unstick' );

function futurio_pro_body_class_unstick( $classes ) {

	$content = get_theme_mod( 'unstick_menu', '1' );
        if ( $content == 0 ) {
               $classes[]	 = 'unstick-menu';
        }
	return $classes;
}